<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Projects;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function vendorList()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/vendor/vendor-list", 'name' => "Vendor"], ['name' => "Vendor Lists"]
        ];

        $user = User::where('role_id', '=', '6')->get();

        return view('front-end.vendor.vendor-list')->with([
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function addVendor()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/vendor/add-vendor", 'name' => "Vendor"], ['name' => "Add Vendor"]
        ];

        $project = Projects::where('project_status', '=', '1')->get();

        return view('front-end.vendor.add-vendor')->with([
            'breadcrumbs' => $breadcrumbs,
            'project' => $project,
        ]);
    }


    public function processAddVendor(Request $request)
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

        $vendor = new User();

        $vendor->role_id = $request->post('role_id');
        $vendor->name = $request->post('name');
        $vendor->fathers_name = $request->post('fathers_name');
        $vendor->email = $request->post('email');
        $vendor->username = $request->post('username');
        $vendor->mobile = $request->post('mobile');
        $vendor->address = $request->post('address');
        $vendor->email_verified_at = Carbon::now();
        $vendor->password = Hash::make($request->post('password'));
        $vendor->image = $request->post('image');
        $vendor->can_login = $request->post('can_login');
        $vendor->salary = $request->post('salary');
        $vendor->note = $request->post('note');
        $vendor->status = $request->post('status');
        $vendor->project_id = $request->post('project_id');

        $vendor->save();

        Helper::addActivity('vendor', $vendor->id, 'Vendor Created');

        return Helper::redirectBackWithNotification('success', 'Vendor Successfully Created!');

    }
}
