<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Attendance;
use App\Models\Project;
use App\Models\Projects;
use App\Models\WorkingShift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{

    public function storeAttendance(Request $request) {

        if(Auth::user()->isAdmin() || Auth::user()->isAccountant()) {
            $project = Projects::findOrFail($request->post('project_id'));
        }
        else {
            $project = Auth::user()->projects()
                ->findOrFail($request->post('project_id'));
        }
        if(!$project) {
            return Helper::sendJsonResponse('error', 'Project not found or you are not authorised!');
        }
        $dtCheck = $this->checkDateTimeForAttendance($request->post('date'), $request->post('shift'));
        if($dtCheck != 'ok') {
            return Helper::sendJsonResponse('error', $dtCheck);
        }

        $staff = $project->users()->find($request->post('labour_id'));
        if(!$staff) {
            return Helper::sendJsonResponse('error', 'Staff not found!');
        }

        $oldAtt = Attendance::whereAttendanceProjectId($project->project_id)
            ->where('attendance_user_id', '=', $staff->id)
            ->where('attendance_date', '=', $request->post('date'))
            ->where('attendance_shift_id', '=', $request->post('shift'))
            ->first();

        if($oldAtt) {
            return Helper::sendJsonResponse('error', 'Attendance already taken!');
        }


        $attendance = new Attendance();

        $attendance->attendance_date = $request->post('date');
        $attendance->attendance_user_id = $request->post('labour_id');
        $attendance->attendance_project_id = $project->project_id;
        $attendance->attendance_shift_id = $request->post('shift');
        $attendance->attendance_payable_amount = number_format($staff->salary / 2, 2);
        $attendance->attendance_paid_amount = $request->post('paid');
        $attendance->attendance_note = $request->post('note');

        $attendance->save();

        Helper::addActivity('attendance', $attendance->attendance_id, 'Attendance Added');
        if($attendance->attendance_paid_amount > 0) {
            $payment = Helper::createNewPayment([
                'type' => 'debit',
                'to_user' => $attendance->attendance_user_id,
                'from_user' => (!Auth::user()->isAdmin() && !Auth::user()->isAccountant()) ? Auth::id() : null,
                'to_bank_account' => null,
                'from_bank_account' => null,
                'amount' => $attendance->attendance_paid_amount,
                'project' => $attendance->attendance_project_id,
                'purpose' => 'salary',
                'by' => 'cash',
                'date' => $attendance->attendance_date,
                'image' => null,
                'note'  => $attendance->attendance_note
            ]);
            if(!$payment) {
                return Helper::redirectBackWithNotification();
            }
        }

        return Helper::sendJsonResponse('success', 'Attendance Added Successfully!');
    }

    protected function checkDateTimeForAttendance(string $date, int $shift_id) {
        $shift = WorkingShift::findOrFail($shift_id);
        $date = Carbon::parse($date);
        $date->setTimeFromTimeString($shift->shift_start);

//        if(!Auth::user()->isAdmin() && !Auth::user()->isAccountant()) {
//            if($date->diffInMinutes(Carbon::now(), false) > 180) {
//                return 'You Can\'t add attendance for the shift now!';
//            }
//        }
//        if($date->diffInMinutes(Carbon::now(), false) < 0) {
//            return 'Shift has\'t started yet!';
//        }
        return 'ok';
    }

}
