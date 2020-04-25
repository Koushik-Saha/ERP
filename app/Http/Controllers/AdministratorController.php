<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Projects;
use App\Models\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdministratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function administratorList()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/administrator/administrator-list", 'name' => "Administrator"], ['name' => "Administrator Lists"]
        ];

        $user = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
            ->select('users.*', 'roles.role_name')
            ->get();

        return view('front-end.administrator.administrator-list')->with([
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function addAdministrator()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/administrator/add-administrator", 'name' => "Administrator"], ['name' => "Add Administrator"]
        ];

        $role = Role::whereNotIn('role_id', [6])->get();

        return view('front-end.administrator.add-administrator')->with([
            'breadcrumbs' => $breadcrumbs,
            'role' => $role,
        ]);
    }


    public function processAddAdministrator(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:191'],
            'fathers_name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email'],
            'username' => ['required'],
            'address' => ['required'],
            'password' => ['required','min:8'],
            'salary' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return Helper::redirectBackWithValidationError($validator);
        }

        $administrator = new User();

        $administrator->role_id = $request->post('role_id');
        $administrator->name = $request->post('name');
        $administrator->fathers_name = $request->post('fathers_name');
        $administrator->email = $request->post('email');
        $administrator->username = $request->post('username');
        $administrator->mobile = $request->post('mobile');
        $administrator->address = $request->post('address');
        $administrator->email_verified_at = Carbon::now();
        $administrator->password = Hash::make($request->post('password'));
        $administrator->image = $request->post('image');
        $administrator->can_login = $request->post('can_login');
        $administrator->salary = $request->post('salary');
        $administrator->note = $request->post('note');
        $administrator->status = $request->post('status');
        $administrator->project_id = $request->post('project_id');

        $administrator->save();

        Helper::addActivity('administrator', $administrator->id, 'Administrator Created');

        return Helper::redirectBackWithNotification('success', 'Administrator Successfully Created!');

    }
}
