@extends('layouts/contentLayoutMaster')

@section('title', 'Category')

@section('content')
    <!-- Background variants section start -->
    <section id="bg-variants">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h4 class="text-uppercase">Account Information</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-primary text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/mother-category.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Create Mother Category </h4>
                            <p class="card-text mb-25">Create mother category for item</p>
                            <button class="btn btn-primary btn-darken-3" data-toggle="modal"
                                    data-target="#createAccount">Mother Category
                            </button>

                            {{-- Create Mother Category Modal --}}
                            <div class="modal fade text-left" id="createAccount" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{route('add-mother-category')}}" method="post"
                                              onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-primary">
                                                <h4 class="modal-title" id="myModalLabel17">Mother Category Name</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Mother Category Name:
                                                        <span style="color: red">*</span></label>
                                                    <input type="text" name="name" class="form-control" required
                                                           id="recipient-name"
                                                           data-validation-required-message="Mother Category name contain alphabetic characters. "
                                                           placeholder="Mother Category Name">
                                                </div>

                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn bg-gradient-primary"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn bg-gradient-primary">Add Name
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-success text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/category.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Create Category Name</h4>
                            <p class="card-text mb-25">Create category name for item</p>
                            <button class="btn btn-success btn-darken-3" data-toggle="modal"
                                    data-target="#transferEmployee">Create Category
                            </button>

                            {{-- Transfer To Employee Modal --}}
                            <div class="modal fade text-left" id="transferEmployee" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{route('add-category')}}" method="post"
                                              onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-success">
                                                <h4 class="modal-title" id="myModalLabel17">Category Name</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="managerForProjects" class="col-form-label">Mother Category
                                                        <span class="required">*</span></label>
                                                    <select name="mother_category_id" id="managerForProjects"
                                                            class="select2 form-control" required="">
                                                        <option selected disabled>--- Select Mother Category ---</option>
                                                        @foreach($motherCategory as $motherCategories)
                                                            <option value="{{ $motherCategories->mother_category_id }}">{{ $motherCategories->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Category Name:
                                                        <span style="color: red">*</span></label>
                                                    <input type="text" name="name" class="form-control" required
                                                           id="recipient-name"
                                                           data-validation-required-message="Category name contain alphabetic characters. "
                                                           placeholder="Category Name">
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn bg-gradient-success"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn bg-gradient-success">Add Name</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-info text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/sub-category.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Create Sub Category Name</h4>
                            <p class="card-text mb-25">Create sub category name for item</p>
                            <button class="btn btn-info btn-darken-3" data-toggle="modal" data-target="#refundMoney">
                                Create Sub Category
                            </button>

                            {{-- Refund From Employee Modal --}}
                            <div class="modal fade text-left" id="refundMoney" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('add-sub-category') }}" method="post" onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-info">
                                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Sub Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="motherCategory" class="col-form-label">Mother Category
                                                        <span class="required">*</span></label>
                                                    <select name="mother_category_id" id="motherCategory"
                                                            class="select2 form-control" required="">
                                                        <option selected disabled>--- Select Mother Category ---</option>
                                                        @foreach($motherCategory as $motherCategories)
                                                            <option value="{{ $motherCategories->mother_category_id }}">{{ $motherCategories->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category3" class="col-form-label">Category
                                                        <span class="required">*</span></label>
{{--                                                    <select name="category_id" id="category3"--}}
{{--                                                            class="select2 form-control" required="">--}}
{{--                                                        <option selected disabled>--- Select Category ---</option>--}}
{{--                                                        @foreach($category as $categories)--}}
{{--                                                            <option value="{{ $categories->category_id }}">{{ $categories->name }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
                                                    <select id="category" name="category_id" class="select2 form-control" required>
                                                        <option selected>-----Select Category-----</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="subCategory" class="col-form-label">Sub Category Name:
                                                        <span style="color: red">*</span></label>
                                                    <input type="text" name="name" class="form-control" required
                                                           id="subCategory"
                                                           data-validation-required-message="Sub Category name contain alphabetic characters. "
                                                           placeholder="Sub Category Name">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-info" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-gradient-info ">Add Name</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-danger text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/manufacturer.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Create Manufacturer</h4>
                            <p class="card-text mb-25">Create Manufacturer name for item</p>
                            <button class="btn btn-danger btn-darken-3" data-toggle="modal" data-target="#manufacturer">
                                Manufacturer
                            </button>

                            {{-- Refund From Employee Modal --}}
                            <div class="modal fade text-left" id="manufacturer" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('add-manufacturer') }}" method="post" onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-danger">
                                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Manufacturer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="motherCategory2" class="col-form-label">Mother Category
                                                        <span class="required">*</span></label>
                                                    <select name="mother_category_id" id="motherCategory2"
                                                            class="select2 form-control" required="">
                                                        <option selected disabled>--- Select Mother Category ---</option>
                                                        @foreach($motherCategory as $motherCategories)
                                                            <option value="{{ $motherCategories->mother_category_id }}">{{ $motherCategories->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category" class="col-form-label"> Category
                                                        <span class="required">*</span></label>
                                                    {{--<select name="category_id" id="category"
                                                            class="select2 form-control" required="">
                                                        <option selected disabled>--- Select Category ---</option>
                                                        @foreach($category as $categories)
                                                            <option value="{{ $categories->category_id }}">{{ $categories->name }}</option>
                                                        @endforeach
                                                    </select>--}}
                                                    <select id="category2" name="category_id" class="select2 form-control" required>
                                                        <option selected>-----Select Category-----</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="subCategory" class="col-form-label">Mother Category
                                                        <span class="required">*</span></label>
                                                    <select name="sub_category_id" id="subCategory"
                                                            class="select2 form-control" required="">
                                                        <option selected disabled>--- Select Sub Category ---</option>
                                                        @foreach($subCategory as $subCategories)
                                                            <option value="{{ $subCategories->sub_category_id }}">{{ $subCategories->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Manufacturer Name:
                                                        <span style="color: red">*</span></label>
                                                    <input type="text" name="name" class="form-control" required
                                                           id="recipient-name"
                                                           data-validation-required-message="Manufacturer  name contain alphabetic characters. "
                                                           placeholder="Manufacturer Name">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-gradient-danger ">Add Name</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Background variants section end -->

    <br>
    <br>
    <br>

    <section id="content-types">
        <div class="row">
            <div class="col-md-4 ">
                <div class="card comp-card">
                    <div class="card-body">
                        <form action="{{ route('manpower-search_staff') }}" method="post" id="labSearch">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <button type="button" class="btn mb-1 btn-outline-primary btn-icon btn-lg btn-block btn-sm" style="color: green">See Labour List</button>
                                    <label for="pid">Project: </label>
                                    <br>
                                    <select class="select2 form-control" id="pid"
                                            name="shift_project_id">
                                        <option selected disabled>Select Project</option>
{{--                                        @foreach($projects as $project)--}}
{{--                                            <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 text-center btn-block">
                                        See List
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card comp-card">
                    <div class="card-body">
                        <form action="{{ route('manpower-staff-attendance') }}" method="post" id="labAttendence">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <button type="button" class="btn mb-1 btn-outline-primary btn-icon btn-lg btn-block btn-sm" style="color: green">Take Staff Attendance</button>
                                    <label for="pid">Project: </label>
                                    <br>
                                    <select class="select2 form-control" name="pid1" id="pid1">
                                        <option selected disabled>Select Project</option>
{{--                                        @foreach($projects as $project)--}}
{{--                                            <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 text-center btn-block">
                                        Take Attendance
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="card comp-card">
                    <div class="card-body">
                        <form action="{{ route('manpower-monthly') }}" method="post" id="salaryReportForm">
                            @csrf
                            <div class="form-body">
                                <div class="form-group">
                                    <button type="button" class="btn mb-1 btn-outline-primary btn-icon btn-lg btn-block btn-sm" style="color: green">Staff Monthly Salary Report</button>
                                    <label for="pids">Project: </label>
                                    <br>
                                    <select class="select2 form-control" name="pid" id="pids">
                                        <option selected disabled>Select Project</option>
{{--                                        @foreach($projects as $project)--}}
{{--                                            <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <br>
                                <div class="form-group text-center">
                                    <label for="month" class="btn mb-1 btn-outline-primary btn-icon btn-block btn-sm" style="color: green">Select Month</label>
                                    <input type="month" name="month" id="month" class="form-control " value="{{ date('Y-m') }}" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1 text-center btn-block">
                                        See Report
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div id="ajaxResult">
            <div class="row" align="center">
                <div class="col-md-12">
                    <div class="card proj-t-card">
                        <div class="card-body">
                            <div class="row align-items-center m-b-30">
                                <div class="col-auto" style="font-size: 24px; color: red">
                                    <i class="fa fa-search fa-xs"></i>
                                </div>
                                <div class="col p-l-0">
                                    <h2 class="m-b-5">Your Search Result Will Appear Here!</h2>
                                    <h6 class="badge badge-pill badge-danger">Live Update</h6>
                                </div>
                                <div class="col-auto" style="font-size: 24px; color: red">
                                    <i class="fa fa-users fa-xs"></i>
                                </div>
                            </div>
                            <div class="row align-items-center text-center">
                                <div class="col">
                                    <h4 class="m-b-0"><label class="badge badge-pill badge-success badge-lg mr-1 mb-1">Category</label> </h4></div>
                                <div class="col"><i class="fa fa-exchange fa-sm"></i></div>
                                <div class="col">
                                    <h4 class="m-b-0"><label class="badge badge-pill badge-success badge-lg mr-1 mb-1">Category </label></h4></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/modal/components-modal.js')) }}"></script>

    <script>

        $('#motherCategory').on('change', e => {
            e.preventDefault();
            $('#category').empty();
            $('#category').append(`<option>Please Select Category</option>`);

            var mcId = $('#motherCategory').find(":selected").val();
            console.log(mcId);
            $.ajax({
                url: `sub-category/${mcId}`,
                success: data => {
                    data.categories.forEach(category =>
                        $('#category').append(`<option value="${category.category_id}">${category.name}</option>`)
                    )
                }
            })
        });

        $('#category').on('change', e => {
            document.getElementById("subCategory").removeAttribute("disabled");
        });
    </script>

@endsection



