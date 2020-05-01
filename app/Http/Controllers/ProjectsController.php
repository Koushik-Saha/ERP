<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\ImageUpload;
use App\Models\MotherCategory;
use App\Models\Project;
use App\Models\ProjectLogs;
use App\Models\Projects;
use App\Models\Role;
use App\Models\Settings;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function addProject()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/project/add-project", 'name' => "Project"], ['name' => "Add Project"]
        ];

        $user = User::where('role_id', '=', '5')->get();

        return view('front-end.projects.add-project')->with([
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
        ]);
    }

    public function processfilemanager()
    {
        return view('back-end.demo');
    }

    public function processAddProject(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'project_name' => ['required', 'string', 'max:191'],
            'project_location' => ['required', 'string', 'max:191'],
            'project_price' => ['required', 'numeric'],
            'project_status' => ['required'],
            'project_description' => ['nullable', 'string'],
            'project_client_id' => ['required'],
            'project_total_member' => ['required'],
            'project_date' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Helper::redirectBackWithValidationError($validator);
        }

        $project = new Projects();

        $project->project_name = $request->post('project_name');
        $project->project_location = $request->post('project_location');
        $project->project_price = $request->post('project_price');
        $project->project_status = $request->post('project_status');
        $project->project_client_id = $request->post('project_client_id');
        $project->project_date = $request->post('project_date');
        $project->project_total_member = $request->post('project_total_member');
        $project->project_description = $request->post('project_description');
        $project->project_image = $request->post('project_image');

        $project->save();

        Helper::addActivity('project', $project->project_id, 'Project Created');

//        $notification = array(
//            'message' => 'Project Create Successfully !',
//            'alert-type' => 'success'
//        );
//
//        return redirect()->route('active-project-list')->with($notification);

        return Helper::redirectUrlWithNotification(route('active-project-list'),
            'success', 'Project Successfully Created!');

    }

    public function activeProjectList()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/project/active-project-list", 'name' => "Project"], ['name' => "Active Project List"]
        ];

        $project = Projects::where('project_status', '=', '1')->get();

        return view('front-end.projects.active-project-list')->with([
            'project' => $project,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function holdProjectList()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/project/hold-project-list", 'name' => "Project"], ['name' => "Hold Project List"]
        ];

        $project = Projects::where('project_status', '=', '2')->get();

        return view('front-end.projects.hold-project-list')->with([
            'project' => $project,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function completedProjectList()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/project/completed-project-list", 'name' => "Project"], ['name' => "Completed Project List"]
        ];

        $project = Projects::where('project_status', '=', '4')->get();

        return view('front-end.projects.completed-project-list')->with([
            'project' => $project,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function cancelledProjectList()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/project/cancelled-project-list", 'name' => "Project"], ['name' => "Cancelled Project List"]
        ];

        $project = Projects::where('project_status', '=', '3')->get();

        return view('front-end.projects.cancelled-project-list')->with([
            'project' => $project,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function allProjectList()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/project/all-project-list", 'name' => "Project"], ['name' => "All Project List"]
        ];

        $project = Projects::all();

        return view('front-end.projects.all-project-list')->with([
            'project' => $project,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function projectDetails($id)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/project/add-project", 'name' => "Project"], ['name' => "Add Project"]
        ];

        $project = Projects::findOrFail($id);

        $user = User::where('role_id','2')->get();

        $projectLogs = ProjectLogs::all();


        return view('front-end.projects.details-project')->with([
            'breadcrumbs' => $breadcrumbs,
            'project' => $project,
            'user' => $user,
            'projectLogs' => $projectLogs,
        ]);
    }

}
