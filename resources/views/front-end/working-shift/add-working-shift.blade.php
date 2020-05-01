@extends('layouts/contentLayoutMaster')

@section('title', 'Add WorkingShift')

@section('content')
    <!-- Content types section start -->
    <section id="content-types">
        <div class="row">
            <div class="col-md-6">
                <div class="card comp-card">
                    <div class="card-body">
                        <form action="{{ route('working-shift-list') }}" method="post" id="labSearch">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="pid">Project: </label>
                                    <br>
                                    <select class="select2 form-control" id="pid"
                                            name="shift_project_id">
                                        <option selected disabled>Select Project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="col-12 text-center">
                                    <button id="submit-all" type="submit" class="btn btn-primary mr-1 mb-1 text-center">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">Add Shift</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('add-working-shift') }}" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="project_id">Project: </label>
                                        <br>
                                        <select class="select2 form-control" id="project_id"
                                                name="shift_project_id">
                                            <option selected disabled>Select Project</option>
                                            @foreach($projects as $project)
                                                <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Shift Name:</label>
                                        <div class="controls">
                                            <input type="text" name="shift_name" class="form-control" required
                                                   data-validation-required-message="Client Full Name & only contain alphabetic characters. "
                                                   placeholder="Enter Shift Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-1">
                                                <label for="project_date">Project Start Time: </label>
                                                <div class="form-group">
                                                    <input type='text' class="form-control pickatime"
                                                           name="shift_start"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-1">
                                                <label for="project_date">Project End Time: </label>
                                                <div class="form-group">
                                                    <input type='text' class="form-control pickatime" name="shift_end"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button id="submit-all" type="submit" class="btn btn-primary mr-1 mb-1">Submit
                                    </button>
                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content types section end -->

    <div id="ajaxResult">
        <div class="row" align="center">
            <div class="col-md-12">
                <div class="card proj-t-card">
                    <div class="card-body">
                        <div class="row align-items-center m-b-30">
                            <div class="col-auto">
                                <i class="feather icon-search "></i>
                            </div>
                            <div class="col p-l-0">
                                <h2 class="m-b-5">Your Search Result Will Appear Here!</h2>
                                <h6 class="m-b-0 text-c-red">Live Update</h6>
                            </div>
                        </div>
                        <div class="row align-items-center text-center">
                            <div class="col">
                                <h3 class="m-b-0"><label class="label label-primary">Projects</label> </h3></div>
                            <div class="col"><i class="feather icon-exchange-alt"></i></div>
                            <div class="col">
                                <h3 class="m-b-0"><label class="label label-primary">Shifts </label></h3></div>
                        </div>
{{--                        <h6 class="pt-badge bg-c-red"><i class="feather icon-users"></i></h6>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('page-script')
    <script type="text/javascript">
        $(document).ready(function() {

            $("#labSearch").submit(function(e) {
                e.preventDefault();
                let pid=$("#pid").val();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url  : "{{ route('working-shift-list') }}",
                    type : "POST",
                    data : {pid:pid},
                    success : function(response){
                        $("#ajaxResult").html(response);
                    },

                    error : function(xhr, status){
                    }
                });
            });
        });

    </script>
@endsection