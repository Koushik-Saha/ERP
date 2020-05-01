<br>
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                    <br>
                    <h4 style="text-align: center;" >Shifts of <span style="color: #f91484;">{{$project->project_name}}</span> Project</h4>
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
                                            <button title="Delete This Shift" shift-id="{{ $shift->shift_id }}" data-toggle="modal" data-target="#dltBtnModal" type="button" class="btn btn-link p-0 dltBtn"  style="width: auto; height: auto;">
                                                <i class="feather icon-trash-2" style="width: auto; height: auto;"></i>
                                            </button>
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