@extends('layouts/contentLayoutMaster')

@section('title', 'Bank Details')

@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
@endsection
@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/pages/card-analytics.css')) }}">
@endsection

@section('content')

    <section id="analytics-card">
        <div class="row">
            <div class="col-lg-6 col-12 offset-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="card-title">Name: {{ $loan->loan_name }}</h4>
                        <h4 class="card-title offset-4">Number: {{ $loan->loan_no }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body py-0">
                            <div id="customer-chart"></div>
                        </div>
                        <h4 class="card-title offset-5">From: {{ $loan->loan_from }}</h4>
                        <ul class="list-group list-group-flush customer-info">
                            <li class="list-group-item d-flex justify-content-between">
                                <div class="series-info">
                                    <i class="fa fa-circle font-small-3 text-primary"></i>
                                    <span class="text-bold-600">Amount</span>
                                </div>
                                <div class="product-result">
                                    <span>{{$loan->loan_amount}}</span>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between ">
                                <div class="series-info">
                                    <i class="fa fa-circle font-small-3 text-danger"></i>
                                    <span class="text-bold-600">Remaining</span>
                                </div>
                                <div class="product-result">
                                    <span>{{ ($loan->loan_amount - $loan->loan_paid) }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>

    <script>
        var r = {
            chart: {
                type: "pie",
                height: 325,
                dropShadow: {enabled: !1, blur: 5, left: 1, top: 1, opacity: .2},
                toolbar: {show: !1}
            },
            labels: ["Total Cash Balance", "Cash Balance in Office"],
            series: [{{$loan->loan_amount}}, {{ ($loan->loan_amount - $loan->loan_paid) }}],
            dataLabels: {enabled: !1},
            legend: {show: !1},
            stroke: {width: 5},
            colors: ["#7367F0", "#EA5455"],
            fill: {type: "gradient", gradient: {gradientToColors: ["#9c8cfc", "#DF4755"]}}
        };
        new ApexCharts(document.querySelector("#customer-chart"), r).render();
    </script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/cards/card-analytics.js')) }}"></script>
@endsection
