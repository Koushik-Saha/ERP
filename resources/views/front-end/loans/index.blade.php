@extends('layouts/contentLayoutMaster')

@section('title', 'Loans')

@section('content')

    <section id="bg-variants">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h4 class="text-uppercase">Account Information</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-success text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/loan.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Make New Loan</h4>
                            <p class="card-text mb-25">Borrowing new loan</p>
                            <button class="btn btn-success btn-darken-3" data-toggle="modal"
                                    data-target="#createAccount">Taking Loan
                            </button>

                            {{-- Create Bank Account Modal --}}
                            <div class="modal fade text-left" id="createAccount" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{route('loan-new') }}" method="post"
                                              onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-success">
                                                <h4 class="modal-title" id="myModalLabel17">Make New Loan</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="loan_name" class="col-form-label">Loan Name: <span style="color: red">*</span></label>
                                                    <input type="text" name="loan_name" class="form-control" required
                                                           id="loan_name" value="{{ old('loan_name') }}"
                                                           data-validation-required-message="Loan name contain alphabetic characters. "
                                                           placeholder="Loan Name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="loan_from" class="col-form-label">Loan From : <span style="color: red">*</span></label>
                                                    <input type="text" name="loan_from" class="form-control" required
                                                           id="loan_from" value="{{ old('loan_from') }}"
                                                           data-validation-required-message="Loan name contain alphabetic characters. "
                                                           placeholder="Loan Name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="loan_no" class="col-form-label">Loan No : <span style="color: red">*</span></label>
                                                    <input type="number" name="loan_no" class="form-control" required
                                                           id="loan_no" value="{{ old('loan_no') }}"
                                                           data-validation-required-message="Loan Number & min field must be at least 5 digit"
                                                           minlength="5" placeholder="Loan Number">
                                                </div>

                                                <div class="form-group">
                                                    <label for="loan_amount" class="col-form-label">Amount :  <span style="color: red">*</span></label>
                                                    <input type="number" name="loan_amount" class="form-control" required
                                                           id="loan_amount" value="{{ old('loan_amount') }}"
                                                           data-validation-required-message="Loan Amount & min field must be at least 3 digit"
                                                           minlength="3" placeholder="Loan Amount">
                                                </div>

                                                <div class="form-group">
                                                    <label for="loan_note" class="col-form-label">Note :</label>
                                                    <fieldset class="form-group">
                                                        <textarea type="text" class="form-control" id="loan_note"
                                                                  rows="3" placeholder="Note" name="loan_note">{!! old('loan_note') !!}</textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn bg-gradient-success" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-gradient-success">Make New Loan</button>
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
                        <img src="{{ asset('images/elements/payLoan.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Pay Due Loan</h4>
                            <p class="card-text mb-25">Pay due loan to bank</p>
                            <button class="btn btn-danger btn-darken-3" data-toggle="modal"
                                    data-target="#transferEmployee">Pay Loan
                            </button>

                            {{-- Transfer To Employee Modal --}}
                            <div class="modal fade text-left" id="transferEmployee" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{route('loan-pay')}}" method="post"
                                              onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-danger">
                                                <h4 class="modal-title" id="myModalLabel17">Pay Due Loan</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="loan_id" class="col-form-label">Loan: <span style="color: red">*</span></label>
                                                    <select name="loan_id" id="loan_id" class=" select2 form-control" required>
                                                        <option selected disabled>--- Select Loan ---</option>
                                                        @foreach($loans as $loan)
                                                            <option value="{{ $loan->loan_id }}">{{ $loan->loan_name . ' --- ' . $loan->loan_from }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="payment_by" class="col-form-label">By: <span style="color: red">*</span></label>
                                                    <select name="payment_by" id="payment_by" class="select2 form-control" required>
                                                        <option value="cash">Cash</option>
                                                        <option value="check">Check</option>
                                                        <option value="bank">Bank</option>
                                                    </select>
                                                </div>
                                                <div id="bankAccounts"></div>
                                                <div class="form-group">
                                                    <label for="amount" class="col-form-label">Amount :  <span class="red">*</span></label>
                                                    <input type="number" name="amount" class="form-control" required
                                                           id="amount" value="{{ old('amount') }}"
                                                           data-validation-required-message="Loan Amount & min field must be at least 2 digit"
                                                           minlength="2" placeholder="Loan Amount">
                                                </div>
                                                <div class="form-group">
                                                    <label for="loan_note" class="col-form-label">Note :</label>
                                                    <fieldset class="form-group">
                                                        <textarea type="text" class="form-control" id="loan_note"
                                                                  rows="3" placeholder="Note" name="loan_note">{!! old('loan_note') !!}</textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn bg-gradient-danger"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn bg-gradient-danger">Pay Loan</button>
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

    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Loans</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Remaining</th>
                                        <th>Date</th>
                                        <th>Note</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($loans as $index => $loan)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>
                                                <a href="{{ route('loan-show', ['id' => $loan->loan_id]) }}" class="font-weight-bold" style="font-size: 14px;">
                                                    From: {{ $loan->loan_from }}
                                                    <br>
                                                    Loan No: {{ $loan->loan_no }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ number_format($loan->loan_amount, 2) }}
                                            </td>
                                            <td>
                                                {{ number_format(($loan->loan_amount - $loan->loan_paid), 2) }}
                                            </td>
                                            <td>
                                                {{ $loan->created_at->format('d M, y ') }}
                                            </td>
                                            <td>
                                                {!! $loan->loan_note !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Details</th>
                                        <th>Amount</th>
                                        <th>Remaining</th>
                                        <th>Date</th>
                                        <th>Note</th>
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

@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            $('#payment_by').change(function() {
                let payment_by = this.value;
                if(payment_by !== 'cash') {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url  : "{{ route('loan-banks') }}",
                        type : "GET",
                        success : function(response){
                            $('#bankAccounts').html(response);
                        },
                        error : function(xhr, status){
                            console.log(xhr);
                        }
                    });
                }
                else {
                    $('#bankAccounts').html(null);
                }
            });
        });
    </script>
@endsection
