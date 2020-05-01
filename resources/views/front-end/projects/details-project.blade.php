@extends('layouts/contentLayoutMaster')

@section('title', 'Client Details')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/pages/dashboard-ecommerce.css')) }}">

    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/pages/card-analytics.css')) }}">

    <style>
        .project-card{
            height: 335px !important;
        }
        .manager-card{
            height: 416px !important;
        }
    </style>
@endsection
@section('content')
    <!-- Basic example and Profile cards section start -->
    <section id="basic-examples">
        <div class="row match-height">
            <!-- Profile Cards Starts -->
            <div class="col-xl-4 col-md-6 col-sm-12 profile-card-1">
                <div class="card project-card">
                    <div class="card-header mx-auto pb-0">
                        <div class="row m-0">
                            <div class="col-sm-12 text-center">
                                <h4>{{$project->project_name}}</h4>
                            </div>
                            <div class="col-sm-12 text-center">
                                <p class="">{{$project->project_location}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body text-center mx-auto">
                            <div class="avatar avatar-xl">
                                @if($project->project_image !== null)
                                    <img class="img-fluid" src="{{ asset($project->project_image) }}" alt="{{ $project->project_name }}">
                                @else
                                    <img class="img-fluid" src="{{asset('images/labour-image/man.png')}}" alt="None">
                                @endif
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="uploads">
                                    <button class="btn btn-success bsoft-btn" data-toggle="modal" data-target="#completeProjectModal" title="Mark as Complete">
                                        <i class="feather icon-check-circle"></i>
                                    </button>
                                </div>
                                <div class="followers">
                                    @if($project->project_status !== 'hold')
                                        <button class="btn btn-warning bsoft-btn" data-toggle="modal" data-target="#holdProjectModal" title="Hold This Project">
                                            <i class="feather icon-alert-triangle"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-primary bsoft-btn" data-toggle="modal" data-target="#activeProjectModal" title="Start This Project Again">
                                            <i class="feather icon-alert-triangle"></i>
                                        </button>
                                    @endif
                                </div>
                                <div class="following">
                                    <button class="btn btn-danger bsoft-btn" data-toggle="modal" data-target="#cancelProjectModal" title="Cancel This Project">
                                        <i class="feather icon-x-circle"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn gradient-light-primary btn-block mt-2">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12 profile-card-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Project Money</h4>
                        <div class="dropdown chart-dropdown">
                            <button class="btn btn-sm border-0 dropdown-toggle px-50" type="button" id="dropdownItem2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Last 7 Days
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem2">
                                <a class="dropdown-item" href="#">Last 28 Days</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-50">
                            <div id="product-order-chart" class="mb-2"></div>
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="series-info d-flex align-items-center">
                                    <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                    <span class="text-bold-600 ml-50">Estimated Cost</span>
                                </div>
                                <div class="product-result">
                                    <span>{{$project->project_price}}</span>
                                </div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="series-info d-flex align-items-center">
                                    <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                    <span class="text-bold-600 ml-50">Received Balance</span>
                                </div>
                                <div class="product-result">
                                    <span>5000000</span>
                                </div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-25">
                                <div class="series-info d-flex align-items-center">
                                    <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                    <span class="text-bold-600 ml-50">Total Expenses</span>
                                </div>
                                <div class="product-result">
                                    <span>1000000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12 profile-card-3">
                <div class="card project-card">
                    <div class="card-header mx-auto pb-0">
                        <div class="row m-0">
                            <div class="col-sm-12 text-center">
                                <h4>{{$project->client->name}}</h4>
                            </div>
                            <div class="col-sm-12 text-center">
                                <p>{{\App\Helpers\Helper::mobileNumber($project->client->mobile)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body text-center mx-auto">
                            <div class="avatar avatar-xl">
                                @if($project->project_image !== null)
                                    <img class="img-fluid" src="{{ asset($project->client->image) }}" alt="{{ $project->project_name }}">
                                @else
                                    <img class="img-fluid" src="{{asset('images/labour-image/man.png')}}" alt="None">
                                @endif
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="uploads">
                                    <p class="font-weight-bold font-medium-2 mb-0">01</p>
                                    <span class="">Projects</span>
                                </div>
                                <div class="followers">
                                    <p class="font-weight-bold font-medium-2 mb-0">10k</p>
                                    <span class="">Cost</span>
                                </div>
                                <div class="following">
                                    <p class="font-weight-bold font-medium-2 mb-0">3</p>
                                    <span class="">Vendor</span>
                                </div>
                            </div>
                            <button class="btn gradient-light-primary btn-block mt-2">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Cards Ends -->
        </div>
    </section>
    <!-- // Basic example and Profile cards section end -->

    <!-- Timeline Starts -->
    <section id="card-caps">
        <div class="row my-3">
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card manager-card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title text-center" style="padding-bottom: 30px">Assign Manager to This Project</h4>
                            <form action="{{route('project.assign', ['id' => $project->project_id])}}" method="post" style="padding-top: 90px">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label sr-only">Manager Name: <span class="red">*</span></label>
                                    <select class="custom-select" id="recipient-name" name="admin" required>
                                        <option selected>----- Select Manager -----</option>
                                        @foreach($user as $users)
                                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" align="center">
                                    <button type="submit" class="btn btn-mat btn-primary"> Assign</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title text-center">Managers Assigned To This Project</h4>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors ">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($projectLogs as $index => $projectLog)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
{{--                                                    <td><a href="{{ route('administrators.show', $adm->id) }}">{{ $adm->name }}</a></td>--}}
                                                    <td>{{ $projectLog->projectLogsUser->name }}</td>
                                                    <td>{{ \App\Helpers\Helper::mobileNumber($projectLog->projectLogsUser->mobile) }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Timeline Ends -->

    <!-- Column selectors with Export Options and print table -->
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title" style="padding-left: 700px">Received From Client</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Project Location</th>
                                        <th>Project Client Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @foreach($project as $index => $projects)--}}
{{--                                        <tr>--}}
{{--                                            <td scope="row">{{ $index+1 }}</td>--}}
{{--                                            <td>--}}
{{--                                                {{ $projects->project_name }}--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                {{ $projects->project_location }}--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Project Location</th>
                                        <th>Project Client Name</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Column selectors with Export Options and print table -->

    <!-- Column selectors with Export Options and print table -->
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="padding-left: 700px">Expenses of The Project</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Project Location</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @foreach($project as $index => $projects)--}}
{{--                                        <tr>--}}
{{--                                            <td scope="row">{{ $index+1 }}</td>--}}
{{--                                            <td>--}}
{{--                                                {{ $projects->project_name }}--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                {{ $projects->project_location }}--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Project Location</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Column selectors with Export Options and print table -->
@endsection
@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/app-chat.js')) }}"></script>

    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/cards/card-analytics.js')) }}"></script>
@endsection
