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
        .project-card {
            height: 335px !important;
        }

        .manager-card {
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
                                    <img class="img-fluid" src="{{ asset($project->project_image) }}"
                                         alt="{{ $project->project_name }}">
                                @else
                                    <img class="img-fluid" src="{{asset('images/labour-image/man.png')}}" alt="None">
                                @endif
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin() && $project->project_status !== "3" && $project->project_status !== "4")
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="uploads">
                                        <button class="btn btn-success" data-toggle="modal"
                                                data-target="#completeProjectModal" title="Mark as Complete">
                                            <i class="feather icon-check-circle"></i>
                                        </button>

                                        {{-- Complete Modal --}}
                                        <div class="modal fade text-left" id="completeProjectModal" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="myModalLabel110" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                 role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('project-change-status') }}" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="project"
                                                               value="{{ $project->project_id }}">
                                                        <input type="hidden" name="status" value="4">
                                                        <div class="modal-header bg-gradient-success white">
                                                            <h5 class="modal-title" id="myModalLabel110">Complete
                                                                Project</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are You Sure Complete This Project?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-success"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit" class="btn bg-gradient-success">
                                                                Complete
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="followers">
                                        @if($project->project_status !== "2")
                                            <button class="btn btn-warning btn-darken-3" data-toggle="modal"
                                                    data-target="#holdProjectModal" title="Hold This Project">
                                                <i class="feather icon-alert-triangle"></i>
                                            </button>

                                            {{-- Hold Modal --}}
                                            <div class="modal fade text-left" id="holdProjectModal" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="myModalLabel110" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('project-change-status') }}"
                                                              method="post">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="project"
                                                                   value="{{ $project->project_id }}">
                                                            <input type="hidden" name="status" value="2">
                                                            <div class="modal-header bg-gradient-warning white">
                                                                <h5 class="modal-title" id="myModalLabel110">Hold
                                                                    Project</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are You Sure Hold This Project?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-warning"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit" class="btn bg-gradient-warning">
                                                                    Hold
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <button class="btn btn-primary btn-darken-3" data-toggle="modal"
                                                    data-target="#activeProjectModal" title="Start This Project Again">
                                                <i class="feather icon-alert-triangle"></i>
                                            </button>

                                            {{-- Active Modal --}}
                                            <div class="modal fade text-left" id="activeProjectModal" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="myModalLabel110" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('project-change-status') }}"
                                                              method="post">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="project"
                                                                   value="{{ $project->project_id }}">
                                                            <input type="hidden" name="status" value="1">
                                                            <div class="modal-header bg-gradient-primary white">
                                                                <h5 class="modal-title" id="myModalLabel110">Active
                                                                    Project</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are You Sure Active This Project?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-primary"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit" class="btn bg-gradient-primary">
                                                                    Active
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="following">
                                        <button class="btn btn-danger btn-darken-3" data-toggle="modal"
                                                data-target="#cancelProjectModal" title="Cancel This Project">
                                            <i class="feather icon-x-circle"></i>
                                        </button>

                                        {{-- Cancel Modal --}}
                                        <div class="modal fade text-left" id="cancelProjectModal" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="myModalLabel110" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                 role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('project-change-status') }}" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="project"
                                                               value="{{ $project->project_id }}">
                                                        <input type="hidden" name="status" value="3">
                                                        <div class="modal-header bg-gradient-danger white">
                                                            <h5 class="modal-title" id="myModalLabel110">Cancelled
                                                                Project</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are You Sure Cancelled This Project?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn bg-gradient-danger"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit" class="btn bg-gradient-danger">
                                                                Complete
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                                <a class="text-bold-700 btn gradient-light-primary btn-block mt-2" href="{{ route('project-edit', ['id' => $project->project_id ]) }}" style="color: #0b0b0b">
                                    Edit
                                </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12 profile-card-2">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4>Project Details</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body pt-50">
                            <div id="session-chart" class="mb-1"></div>
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="series-info d-flex align-items-center">
                                    <i class="feather icon-monitor font-medium-2 text-primary"></i>
                                    <span class="text-bold-600 mx-50">Estimated Cost</span>
                                    <span> -  {{ number_format($project->project_price, 2) }}</span>
                                </div>
                                <div class="series-result">
                                    <span>{{ ((($expenses->sum('payment_amount'))*100)/($project->project_price)) }}%</span>
                                    <i class="feather icon-arrow-up text-success"></i>
                                </div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="series-info d-flex align-items-center">
                                    <i class="feather icon-tablet font-medium-2 text-warning"></i>
                                    <span class="text-bold-600 mx-50">Received Balance</span>
                                    <span> -  {{ ($received) ? number_format($received->sum('payment_amount'), 2) : 0 }}</span>
                                </div>
                                <div class="series-result">
                                    <span>{{ ((($received->sum('payment_amount'))*100)/($project->project_price)) }}%</span>
                                    <i class="feather icon-arrow-up text-success"></i>
                                </div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-50">
                                <div class="series-info d-flex align-items-center">
                                    <i class="feather icon-tablet font-medium-2 text-danger"></i>
                                    <span class="text-bold-600 mx-50">Total Expenses</span>
                                    <span> -  {{ number_format($expenses->sum('payment_amount'), 2)}}</span>
                                </div>
                                <div class="series-result">
                                    <span>{{  ((($expenses->sum('payment_amount'))*100)/($project->project_price)) }}%</span>
                                    <i class="feather icon-arrow-down text-danger"></i>
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
                                    <img class="img-fluid" src="{{ asset($project->client->image) }}"
                                         alt="{{ $project->project_name }}">
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
                            <h4 class="card-title text-center" style="padding-bottom: 30px">Assign Manager to This
                                Project</h4>
                            <form action="{{route('project.assign', ['id' => $project->project_id])}}" method="post"
                                  style="padding-top: 90px">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label sr-only">Manager Name: <span
                                                class="red">*</span></label>
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
                                                    <td>
                                                        <a href="{{ route('administrator-details', $projectLog->id) }}">{{ $projectLog->name }}</a>
                                                    </td>
                                                    <td>{{ \App\Helpers\Helper::mobileNumber($projectLog->mobile) }}</td>
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
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($received as $index => $transaction)
                                        <tr>
                                            <td>{{$index+1}}</td>

                                            <td>{{$transaction->payment_date}}</td>
                                            <td class="text-capitalize">{{$transaction->payment_by}}</td>
                                            <td>{{number_format($transaction->payment_amount,2)}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Amount</th>
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
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Manager Name</th>
                                        <th>Purpose</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($expenses as $index => $transaction)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{ \Carbon\Carbon::parse($transaction->payment_date)->toFormattedDateString() }}</td>
                                            <td class="text-capitalize">{{$transaction->payment_by}}</td>
                                            @foreach($projectLogs as $index => $adm)
                                                <td><a href="{{ route('administrator-details', $adm->id) }}">{{ $adm->name }}</a></td>
                                            @endforeach
                                            <td>{{$transaction->payment_purpose}}</td>
                                            <td>{{number_format($transaction->payment_amount,2)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Manager Name</th>
                                        <th>Purpose</th>
                                        <th>Amount</th>
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

    <script>
        var e = {
            chart: {type: "donut", height: 315, toolbar: {show: !1}},
            dataLabels: {enabled: !1},
            series: [{{$project->project_price}}, {{ $received->sum('payment_amount') }}, {{ $expenses->sum('payment_amount')}}],
            legend: {show: !1},
            comparedResult: [2, -3, 8],
            labels: ["Estimated Cost", "Received Balance", "Total Expenses"],
            stroke: {width: 0},
            colors: ["#7367F0", "#FF9F43", "#EA5455"],
            fill: {type: "gradient", gradient: {gradientToColors: ["#9c8cfc", "#FFC085", "#f29292"]}}
        };
        new ApexCharts(document.querySelector("#session-chart"), e).render();
    </script>

@endsection
