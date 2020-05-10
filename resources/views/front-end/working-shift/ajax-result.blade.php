<br>
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <br>
                <h4 style="text-align: center;">Shifts of <span
                            style="color: #f91484;">{{$project->project_name}}</span> Project</h4>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Shift Name</th>
                                    <th>Shift Start</th>
                                    <th>Shift End</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project->shifts as $index => $shift)
                                    <tr>
                                        <td scope="row">{{ $index+1 }}</td>
                                        <td>
                                            {{ $shift->shift_name }}
                                        </td>
                                        <td>
                                            {{ $shift->shift_start }}
                                        </td>
                                        <td>
                                            {{ $shift->shift_end }}
                                        </td>
                                        <td>
                                            <button title="Delete This Shift" shift-id="{{ $shift->shift_id }}"
                                                    data-toggle="modal" data-target="#dltBtnModal" type="button"
                                                    class="btn btn-link p-0 dltBtn" style="width: auto; height: auto;">
                                                <i class="feather icon-trash-2" style="width: auto; height: auto;"></i>
                                            </button>

                                            <button type="button" class="btn btn-link p-0 dltBtn"
                                                    style="width: auto; height: auto;" data-toggle="modal"
                                                    data-target="#info">
                                                <i class="feather icon-edit-1"
                                                   style="width: auto; height: auto; padding-left: 17px;"></i>
                                            </button>

                                            {{-- Modal --}}
                                            <div class="modal fade text-left" id="info" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <form action="{{route('working-shift-edit', ['id' => $shift->shift_id])}}" method="post"
                                                              onsubmit="this.submit.disabled = true;">
                                                            @csrf
                                                            <div class="modal-header bg-gradient-info white">
                                                                <h4 class="modal-title" id="myModalLabel33">Inline Login
                                                                    Form </h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="project_id">Project: </label>
                                                                    <br>
                                                                    <select class="select2 form-control" id="project_id"
                                                                            name="shift_project_id">
                                                                        <option selected disabled>Select Project
                                                                        </option>
                                                                        @foreach($projects as $project)
                                                                            <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Shift Name:</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="shift_name"
                                                                               class="form-control" required
                                                                               data-validation-required-message="Client Full Name & only contain alphabetic characters. "
                                                                               placeholder="Enter Shift Name"
                                                                               value="{{ (old('shift_name') == null || strlen(old('shift_name') < 5) ? $shift->shift_name : old('shift_name') ) }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <label for="project_date">Project Start
                                                                                Time: </label>
                                                                            <div class="form-group">
                                                                                <input type='text'
                                                                                       class="form-control pickatime"
                                                                                       name="shift_start"
                                                                                       value="{{ (old('shift_start') == null || strlen(old('shift_start') < 5) ? $shift->shift_start : old('shift_start') ) }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12 mb-1">
                                                                            <label for="project_date">Project End
                                                                                Time: </label>
                                                                            <div class="form-group">
                                                                                <input type='text'
                                                                                       class="form-control pickatime"
                                                                                       name="shift_end"
                                                                                       value="{{ (old('shift_end') == null || strlen(old('shift_end') < 5) ? $shift->shift_end : old('shift_end') ) }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-info"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit" class="btn bg-gradient-info">
                                                                    Update
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Shift Name</th>
                                    <th>Shift Start</th>
                                    <th>Shift End</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Delete Modal --}}
        <div class="modal fade text-left" id="dltBtnModal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel120" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger white">
                        <h5 class="modal-title" id="myModalLabel120">Delete Working Shift</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are You Sure Want to Delete This Shift?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('shift.delete') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="shift_id" id="dltShiftID" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.dltBtn').click(function (e) {
                    console.log($(this).attr('shift-id'));
                    $('#dltShiftID').val($(this).attr('shift-id'));
                });
            });
        </script>
    </div>
</section>