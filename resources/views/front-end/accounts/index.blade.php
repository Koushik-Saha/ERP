@extends('layouts/contentLayoutMaster')

@section('title', 'Accounts')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
@endsection
@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/pages/card-analytics.css')) }}">
@endsection

@section('content')
    <!-- Background variants section start -->
    <section id="bg-variants">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h4 class="text-uppercase">Account Information</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-primary text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/add-account.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Add New Account</h4>
                            <p class="card-text mb-25">Create new bank account</p>
                            <button class="btn btn-primary btn-darken-3" data-toggle="modal"
                                    data-target="#createAccount">Create Account
                            </button>

                            {{-- Create Bank Account Modal --}}
                            <div class="modal fade text-left" id="createAccount" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{route('add-bank-account')}}" method="post"
                                              onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-primary">
                                                <h4 class="modal-title" id="myModalLabel17">Create Account</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="accountFor" class="col-form-label">Account For: <span
                                                                style="color: red">*</span></label>
                                                    <select class="select2 form-control" name="accountFor"
                                                            id="accountFor" required>
                                                        <option selected disabled>--- Select Type ---</option>
                                                        <option value="office">Office</option>
                                                        <option value="manager">Manager</option>
                                                        <option value="accountant">Accountant</option>
                                                    </select>
                                                </div>
                                                <div id="usersForAccount">

                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Account Name:
                                                        <span style="color: red">*</span></label>
                                                    <input type="text" name="name" class="form-control" required
                                                           id="recipient-name"
                                                           data-validation-required-message="Account name contain alphabetic characters. "
                                                           placeholder="Account Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Account Number:
                                                        <span style="color: red">*</span></label>
                                                    <input type="number" name="number" class="form-control" required
                                                           id="recipient-name"
                                                           data-validation-required-message="Account Number & min field must be at least 7 digit"
                                                           minlength="7" placeholder="Account Number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Bank Name: <span
                                                                style="color: red">*</span></label>
                                                    <input type="text" name="bank" class="form-control" required
                                                           id="recipient-name"
                                                           data-validation-required-message="Bank Name contain alphabetic characters. "
                                                           placeholder="Bank Name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Bank Branch:
                                                        <span style="color: red">*</span></label>
                                                    <input type="text" name="branch" class="form-control" required
                                                           id="recipient-name"
                                                           data-validation-required-message="Bank Branch contain alphabetic characters. "
                                                           placeholder="Bank Branch">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Initial Balance:
                                                        <span style="color: red">*</span></label>
                                                    <input type="number" name="balance" class="form-control" required
                                                           id="recipient-name"
                                                           data-validation-required-message="Initial Balance & min field must be at least 3 digit"
                                                           minlength="3" placeholder="Initial Balance">
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn bg-gradient-primary"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn bg-gradient-primary">Add Account
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
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-success text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/employeeTransfer.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Transfer To Employee</h4>
                            <p class="card-text mb-25">Transfer money to manager</p>
                            <button class="btn btn-success btn-darken-3" data-toggle="modal"
                                    data-target="#transferEmployee">Transfer Money
                            </button>

                            {{-- Transfer To Employee Modal --}}
                            <div class="modal fade text-left" id="transferEmployee" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{route('bank-transfer-to-employee')}}" method="post"
                                              onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-success">
                                                <h4 class="modal-title" id="myModalLabel17">Transfer To Employee</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="managerForProjects" class="col-form-label">For Project
                                                        <span class="required">*</span></label>
                                                    <select name="project_id" id="managerForProjects"
                                                            class="select2 form-control" required="">
                                                        <option selected disabled>--- Select Project ---</option>
                                                        @foreach($projects as $project)
                                                            <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div id="managerProjectsResult"></div>
                                                <div class="form-group">
                                                    <label for="paymentType" class="col-form-label">Payment Type <span
                                                                class="required">*</span></label>
                                                    <select name="type" id="paymentType" class="select2 form-control"
                                                            required>
                                                        <option selected disabled>--- Select Payment Type</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="check">Check</option>
                                                        <option value="bank">Bank Transfer</option>
                                                    </select>
                                                    <small class="form-text text-muted">If payment type is CASH or
                                                        CHECK, no Bank Account balance will be updated!</small>
                                                </div>

                                                <div class="form-group" style="display: none;">
                                                    <label for="bank_id" class="col-form-label">Office Account:<span
                                                                class="required">*</span></label>
                                                    <select name="bank_id" id="bank_id" class="select2 form-control">
                                                        @foreach($adminBanks as $bank)
                                                            <option value="{{$bank->bank_id}}">{{$bank->bank_name}}
                                                                --- {{ $bank->bank_account_no }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Amount: <span
                                                                class="required">*</span></label>
                                                    <input type="number" name="amount" class="form-control" required
                                                           id="recipient-name"
                                                           data-validation-required-message="Account Number & min field must be at least 3 digit"
                                                           minlength="3" placeholder="Account Number">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Date: <span
                                                                class="required">*</span></label>
                                                    <input type="date" class="form-control" id="recipient-name"
                                                           name="date" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Note: </label>
                                                    <fieldset class="form-group">
                                                        <textarea type="text" class="form-control" id="recipient-name"
                                                                  rows="3" placeholder="Note" name="note"></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" class="btn bg-gradient-success"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="submit" class="btn bg-gradient-success">Transfer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-danger text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/refundMoney.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Refund From Employee</h4>
                            <p class="card-text mb-25">Refund money from manager</p>
                            <button class="btn btn-danger btn-darken-3" data-toggle="modal" data-target="#refundMoney">
                                Refund Money
                            </button>

                            {{-- Refund From Employee Modal --}}
                            <div class="modal fade text-left" id="refundMoney" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('bank-transfer-to-office') }}" method="post" onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-danger">
                                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Refund Money From Employee</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="managerForProjects1" class="col-form-label">For Project <span class="required">*</span></label>
                                                    <select name="project_id" id="managerForProjects1" class="select2 form-control" required="">
                                                        <option selected disabled>--- Select Project ---</option>
                                                        @foreach($projects as $project)
                                                            <option value="{{ $project->project_id }}">{{ $project->project_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div id="managerProjectsResult1"></div>
                                                <div class="form-group">
                                                    <label for="paymentType" class="col-form-label">Payment Type <span class="required">*</span></label>
                                                    <select name="type" id="paymentType" class="select2 form-control" required>
                                                        <option selected disabled>--- Select Payment Type</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="check">Check</option>
                                                        <option value="bank">Bank Transfer</option>
                                                    </select>
                                                    <small class="form-text text-muted">If payment type is CASH or CHECK, no Bank Account balance will be updated!</small>
                                                </div>

                                                <div class="form-group" style="display: none;">
                                                    <label for="bank_id" class="col-form-label">Office Account:<span class="required">*</span></label>
                                                    <select name="bank_id" id="bank_id" class="select2 form-control">
                                                        @foreach($adminBanks as $bank)
                                                            <option value="{{$bank->bank_id}}">{{$bank->bank_name}} --- {{ $bank->bank_account_no }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Amount: <span class="required">*</span></label>
                                                    <input type="number" name="amount" class="form-control" required id="recipient-name"
                                                           data-validation-required-message="Amount & min field must be at least 3 digit"
                                                           minlength="3" placeholder="Amount">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Date: <span class="required">*</span></label>
                                                    <input type="date" class="form-control" id="recipient-name" name="date" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Note: </label>
                                                    <fieldset class="form-group">
                                                        <textarea class="form-control" id="recipient-name" rows="3" placeholder="Note" name="note"></textarea>
                                                    </fieldset>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-gradient-danger ">Refund</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-warning text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/withdrawMoney.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Withdraw From Bank</h4>
                            <p class="card-text mb-25">Withdraw money from bank</p>
                            <button class="btn btn-warning btn-darken-3" data-toggle="modal"
                                    data-target="#withdrawMoney">Withdraw Money
                            </button>

                            {{-- Withdraw From Bank Modal --}}
                            <div class="modal fade text-left" id="withdrawMoney" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content ">
                                        <form action="{{ route('withdraw-from-bank') }}" method="post" onsubmit="this.submit.disabled = true;">
                                            <div class="modal-header bg-gradient-warning">
                                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Withdraw From Bank</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="bank_id" class="col-form-label">From Account:<span class="required">*</span></label>
                                                    <select name="bank_id" id="bank_id" class="select2 form-control">
                                                        @foreach($adminBanks as $bank)
                                                            <option value="{{$bank->bank_id}}">{{$bank->bank_name}} --- {{ $bank->bank_account_no }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Amount: <span class="required">*</span></label>
                                                    <input type="number" name="amount" class="form-control" required id="recipient-name"
                                                           data-validation-required-message="Amount & min field must be at least 3 digit"
                                                           minlength="3" placeholder="Amount">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Date: <span class="required">*</span></label>
                                                    <input type="date" class="form-control" id="recipient-name" name="date" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Note: </label>
                                                    <fieldset class="form-group">
                                                        <textarea class="form-control" id="recipient-name" rows="3" placeholder="Note" name="note"></textarea>
                                                    </fieldset>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-warning" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-gradient-warning">Withdraw</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-info text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/deposit.png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Deposit From Bank</h4>
                            <p class="card-text mb-25">Deposit money from bank</p>
                            <button class="btn btn-info btn-darken-3" data-toggle="modal" data-target="#depositMoney">
                                Deposit Money
                            </button>

                            {{-- Deposit From Bank Modal --}}
                            <div class="modal fade text-left" id="depositMoney" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('withdraw-from-bank') }}" method="post" onsubmit="this.submit.disabled = true;">
                                            <div class="modal-header bg-gradient-info">
                                                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Deposit To Bank</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="bank_id" class="col-form-label">From Account:<span class="required">*</span></label>
                                                    <select name="bank_id" id="bank_id" class="select2 form-control">
                                                        @foreach($adminBanks as $bank)
                                                            <option value="{{$bank->bank_id}}">{{$bank->bank_name}} --- {{ $bank->bank_account_no }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Amount: <span class="required">*</span></label>
                                                    <input type="number" name="amount" class="form-control" required id="recipient-name"
                                                           data-validation-required-message="Amount & min field must be at least 3 digit"
                                                           minlength="3" placeholder="Amount">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Date: <span class="required">*</span></label>
                                                    <input type="date" class="form-control" id="recipient-name" name="date" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Note: </label>
                                                    <fieldset class="form-group">
                                                        <textarea class="form-control" id="recipient-name" rows="3" placeholder="Note" name="note"></textarea>
                                                    </fieldset>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-info" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-gradient-info">Deposit</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card text-white bg-gradient-dark text-center">
                    <div class="card-content">
                        <img src="{{ asset('images/elements/deposit (1).png') }}" alt="element 04" width="150"
                             class="float-left mt-3 pl-2">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Deposit From Client</h4>
                            <p class="card-text mb-25">Deposit money from client</p>
                            <button class="btn btn-dark btn-darken-4" data-toggle="modal" data-target="#depositClient">
                                Deposit Client Money
                            </button>

                            {{-- Deposit From Client Modal --}}
                            <div class="modal fade text-left" id="depositClient" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel17" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                     role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('recharge-from-client') }}" method="post" onsubmit="this.submit.disabled = true;">
                                            @csrf
                                            <div class="modal-header bg-gradient-dark">
                                                <h5 class="modal-title" id="exampleModalLabel">Receive From Customer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Select Customer <span class="required">*</span></label>
                                                    <select name="user_id" id="clientForProjects" class="select2 form-control" required="">
                                                        <option selected disabled>--- Select Client ---</option>
                                                        @foreach($clients as $client)
                                                            <option value="{{$client->id}}">{{ $client->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div id="clientProjectsResult"></div>

                                                <div class="form-group">
                                                    <label for="paymentType1" class="col-form-label">Payment Type <span class="required">*</span></label>
                                                    <select name="type" id="paymentType1" class="select2 form-control" required>
                                                        <option selected disabled>--- Select Payment Type</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="check">Check</option>
                                                        <option value="bank">Bank Transfer</option>
                                                    </select>
                                                    <small class="form-text text-muted">If payment type is CASH or CHECK, no Bank Account balance will be updated!</small>
                                                </div>

                                                <div class="form-group" style="display: none;">
                                                    <label for="bank_id1" class="col-form-label">To Account <span class="required">*</span></label>
                                                    <select name="bank_id" id="bank_id1" class="select2 form-control">
                                                        <option selected disabled>--- Select Bank ---</option>
                                                        @foreach($adminBanks as $bank)
                                                            <option value="{{$bank->bank_id}}">
                                                                {{$bank->bank_name}} --- {{ $bank->bank_account_no }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Amount: <span class="required">*</span></label>
                                                    <input type="number" name="amount" class="form-control" required id="recipient-name"
                                                           data-validation-required-message="Amount & min field must be at least 3 digit"
                                                           minlength="3" placeholder="Amount">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Date: <span class="required">*</span></label>
                                                    <input type="date" class="form-control" id="recipient-name" name="date" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">note:</label>
                                                    <fieldset class="form-group">
                                                        <textarea class="form-control" id="recipient-name" rows="3" placeholder="Note" name="note"></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-dark btn-darken-3" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn bg-gradient-dark btn-darken-3">Recharge</button>

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
        <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4 class="card-title">Bank Transaction</h4>
                    <div class="dropdown chart-dropdown">
                        <button class="btn btn-sm border-0 dropdown-toggle px-50" type="button" id="dropdownItem3"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Last 7 Days
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem3">
                            <a class="dropdown-item" href="#">Last 28 Days</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body py-0">
                        <div id="customer-chart"></div>
                    </div>
                    <ul class="list-group list-group-flush customer-info">
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="series-info">
                                <i class="fa fa-circle font-small-3 text-primary"></i>
                                <span class="text-bold-600">Total Cash Balance</span>
                            </div>
                            <div class="product-result">
                                <span>{{number_format($totalCash,2)}}</span>
                            </div>
                        </li><li class="list-group-item d-flex justify-content-between ">
                            <div class="series-info">
                                <i class="fa fa-circle font-small-3 text-danger"></i>
                                <span class="text-bold-600">Cash Balance in Office</span>
                            </div>
                            <div class="product-result">
                                <span>৳ {{ number_format($cash, 2) }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end">
                    <h4 class="card-title">Total Bank Transaction</h4>
                    <div class="dropdown chart-dropdown">
                        <button class="btn btn-sm border-0 dropdown-toggle px-50" type="button" id="dropdownItem3"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Last 7 Days
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem3">
                            <a class="dropdown-item" href="#">Last 28 Days</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body py-0">
                        <div id="customer-chart-2"></div>
                    </div>
                    <ul class="list-group list-group-flush customer-info">
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="series-info">
                                <i class="fa fa-circle font-small-3 text-success"></i>
                                <span class="text-bold-600">Transfer To Employee</span>
                            </div>
                            <div class="product-result">
                                <span>{{number_format($transferToEmployee,2)}}</span>
                            </div>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="series-info">
                                <i class="fa fa-circle font-small-3 text-danger"></i>
                                <span class="text-bold-600">Refund From Employee</span>
                            </div>
                            <div class="product-result">
                                <span>{{number_format(-$refundFromEmployee,2)}}</span>
                            </div>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="series-info">
                                <i class="fa fa-circle font-small-3 text-warning"></i>
                                <span class="text-bold-600">Withdraw From Bank</span>
                            </div>
                            <div class="product-result">
                                <span>{{number_format($withdrawFromBank,2)}}</span>
                            </div>
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="series-info">
                                <i class="fa fa-circle font-small-3 text-info"></i>
                                <span class="text-bold-600">Salary</span>
                            </div>
                            <div class="product-result">
                                <span>{{number_format($salary,2)}}</span>
                            </div>
                        </li><li class="list-group-item d-flex justify-content-between ">
                            <div class="series-info">
                                <i class="fa fa-circle font-small-3 text-dark"></i>
                                <span class="text-bold-600">Deposit From Client</span>
                            </div>
                            <div class="product-result">
                                <span>৳ {{ number_format($depositFromClient, 2) }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>

        <section id="column-selectors">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Bank Account List</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors ">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bank Details</th>
                                            <th>Account User</th>
                                            <th>Balance</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($banks as $index => $bank)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>
{{--                                                    <a href="{{ route('bank.show', ['id' => $bank->bank_id]) }}" class="font-weight-bold" style="font-size: 14px;">--}}
                                                        {{$bank->bank_account_name}}
{{--                                                    </a>--}}
                                                    <br>
                                                    {{ $bank->bank_account_no }}
                                                    <br>
                                                    {{ $bank->bank_name }}
                                                    <br>
                                                    {{ $bank->bank_branch }}
                                                </td>
                                                <td>
                                                    {{ ($bank->user) ? $bank->user->name : 'Office' }}
                                                    <br>
                                                    <small>{{ ($bank->user) ? $bank->user->role->role_name : '' }}</small>
                                                </td>
                                                <td>
                                                    {{ number_format($bank->bank_balance, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Bank Details</th>
                                            <th>Account User</th>
                                            <th>Balance</th>
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
    </section>
    <!-- Background variants section end -->

@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/modal/components-modal.js')) }}"></script>

    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/cards/card-analytics.js')) }}"></script>

    <script>
        var r = {
            chart: {
                type: "pie",
                height: 325,
                dropShadow: {enabled: !1, blur: 5, left: 1, top: 1, opacity: .2},
                toolbar: {show: !1}
            },
            labels: ["Total Cash Balance", "Cash Balance in Office"],
            series: [{{ $totalCash }}, {{ $cash }}],
            dataLabels: {enabled: !1},
            legend: {show: !1},
            stroke: {width: 5},
            colors: ["#7367F0", "#EA5455"],
            fill: {type: "gradient", gradient: {gradientToColors: ["#9c8cfc", "#DF4755"]}}
        };
        new ApexCharts(document.querySelector("#customer-chart"), r).render();
    </script>

    <script>
        var r = {
            chart: {
                type: "pie",
                height: 325,
                dropShadow: {enabled: !1, blur: 5, left: 1, top: 1, opacity: .2},
                toolbar: {show: !1}
            },
            labels: ["Transfer To Employee", "Refund From Employee", "Transfer To Employee", "Refund From Employee", "Transfer To Employee"],
            series: [{{ $transferToEmployee }}, {{ -$refundFromEmployee }}, {{ $withdrawFromBank }}, {{ $salary }}, {{ $depositFromClient }}],
            dataLabels: {enabled: !1},
            legend: {show: !1},
            stroke: {width: 5},
            colors: ["#5cb85c", "#EA5455", "#FFCC00","#5bc0de","#292b2c"],
            fill: {type: "gradient", gradient: {gradientToColors: ["#36AD51", "#DE4352","#FFC61B","#28A9BD","#43494E"]}}
        };
        new ApexCharts(document.querySelector("#customer-chart-2"), r).render();
    </script>

    <script>
        $(document).ready(function () {
            $('#accountFor').change(function () {
                let type = this.value;
                if (type !== 'office') {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{route('bank-users-search')}}",
                        type: "POST",
                        data: {type: type},
                        success: function (response) {
                            $('#usersForAccount').html(response);
                        },
                        error: function (xhr, status) {

                        }
                    });
                } else {
                    $('#usersForAccount').html(null);
                }
            });

            $('#clientForProjects').change(function() {
                let client_id = this.value;

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url  : "{{route('bank-client-project-search')}}",
                    type : "POST",
                    data : {client_id: client_id},
                    success : function(response){
                        $('#clientProjectsResult').html(response);
                    },
                    error : function(xhr, status){

                    }
                });
            });

            $('#managerForProjects').change(function () {
                let project_id = this.value;

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{route('bank-project-manager-search')}}",
                    type: "POST",
                    data: {project_id: project_id},
                    success: function (response) {
                        $('#managerProjectsResult').html(response);
                    },
                    error: function (xhr, status) {
                        console.log(xhr);
                    }
                });
            });

            $('#managerForProjects1').change(function () {
                let project_id = this.value;

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{route('bank-project-manager-search')}}",
                    type: "POST",
                    data: {project_id: project_id},
                    success: function (response) {
                        $('#managerProjectsResult1').html(response);
                    },
                    error: function (xhr, status) {
                        console.log(xhr);
                    }
                });
            });

            {{--$('select#paymentType').change(function () {--}}
            {{--    let type = this.value;--}}
            {{--    if(type.toLowerCase() !== 'cash') {--}}
            {{--        $('select#bank_id').parent().css('display', 'block');--}}
            {{--    }--}}
            {{--    else {--}}
            {{--        $('select#bank_id').parent().css('display', 'none');--}}
            {{--    }--}}
            {{--});--}}

            {{--$('select#paymentType1').change(function () {--}}
            {{--    let type = this.value;--}}
            {{--    if(type.toLowerCase() === 'bank' || type.toLowerCase() === 'check') {--}}
            {{--        $('select#bank_id1').parent().css('display', 'block');--}}
            {{--    }--}}
            {{--    else {--}}
            {{--        $('select#bank_id1').parent().css('display', 'none');--}}
            {{--    }--}}
            {{--});--}}
        });
    </script>
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
@endsection


