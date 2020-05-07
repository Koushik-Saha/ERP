@extends('layouts/contentLayoutMaster')

@section('title', 'Administrator Lists')

@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cash Transaction History</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors ">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Type</th>
                                        <th>Amounts</th>
                                        <th>Purpose</th>
                                        <th>Project</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Received By</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $index => $payment)
                                        <tr>
                                            <td class="font-weight-bold">
{{--                                                        {{ \Carbon\Carbon::parse($payment->payment_date)->toFormattedDateString() }}--}}
                                                {{ \Carbon\Carbon::parse($payment->payment_date)->format('Y M d') }}
                                            </td>
                                            <td>
                                                {{ ucfirst(strtolower($payment->payment_by)) }}
                                            </td>
                                            <td>
                                                {{ ucfirst(strtolower($payment->payment_type)) }}
                                            </td>
                                            <td class="font-weight-bold">
                                                {{ number_format($payment->payment_amount,2)}}
                                            </td>
                                            <td>
                                                {{ ucfirst(strtolower($payment->payment_purpose)) }}
                                            </td>
                                            <td>
                                                @if( $payment->payment_for_project === null)
                                                    <span class="label label-danger">NULL</span>
                                                @else
                                                    <a href="{{ route('project-details', $payment->project->project_id) }}"
                                                       title="See Project Details">
                                                        {{ $payment->project->project_name }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if( $payment->payment_from_user === null)
                                                    <span class="label label-danger">NULL</span>
                                                @else
                                                    {{$payment->fromUser->name}}
                                                @endif
                                            </td>
                                            <td>
                                                @if( $payment->payment_to_user === null)
                                                    <span class="label label-danger">NULL</span>
                                                @else
                                                    {{$payment->toUser->name}}
                                                @endif
                                            </td>
                                            <td>
                                                {{ $payment->activity->activityBy->name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Type</th>
                                        <th>Amounts</th>
                                        <th>Purpose</th>
                                        <th>Project</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Received By</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Loans</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors ">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                        <th>Received By</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($paymentsloanacash as $index => $payment)
                                        <tr>
                                            <td class="font-weight-bold">
                                                {{--                                                        {{ \Carbon\Carbon::parse($payment->payment_date)->toFormattedDateString() }}--}}
                                                {{ \Carbon\Carbon::parse($payment->payment_date)->format('Y M d') }}
                                            </td>
                                            <td>
                                                {{ ucfirst(strtolower($payment->payment_by)) }}
                                            </td>
                                            <td class="font-weight-bold">
                                                {{ number_format($payment->payment_amount,2)}}
                                            </td>
                                            <td>
                                                {{ $payment->activity->activityBy->name }}
                                            </td>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Method</th>
                                        <th>Amount</th>
                                        <th>Received By</th>
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