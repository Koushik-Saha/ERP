@extends('layouts/contentLayoutMaster')

@section('title', 'All Project List')

@section('content')
    <!-- Column selectors with Export Options and print table -->
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Project List</h4>
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
                                        <th>Project Estimated Price</th>
                                        <th>Project Status</th>
                                        <th>Project Start Date</th>
                                        <th>Project Estimated Member</th>
                                        <th>Project Description</th>
                                        <th>Project Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project as $index => $projects)
                                    <tr>
                                        <td scope="row">{{ $index+1 }}</td>
                                        <td>
                                            <a href="{{ route('project-details', ['id' => $projects->project_id]) }}" title="See Project Details">
                                                {{ $projects->project_name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $projects->project_location }}
                                        </td>
                                        <td>
                                            {{ $projects->project_client_id }}
                                        </td>
                                        <td>
                                            {{ number_format($projects->project_price,2) }}
                                        </td>
                                        <td>
                                            @if($projects->project_status === '1')
                                                <span class="badge badge-primary">Active</span>
                                            @elseif($projects->project_status === '2')
                                                <span class="badge badge-warning">Hold</span>
                                            @elseif($projects->project_status === '3')
                                                <span class="badge badge-danger">Cancelled</span>
                                            @else
                                                <span class="badge badge-success">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $projects->project_date }}
                                        </td>
                                        <td>
                                            {{ $projects->project_total_member }}
                                        </td>
                                        <td>
                                            {{ strip_tags($projects->project_description) }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($projects->project_image) }}" alt="{{ $projects->project_name }}" style="max-width: 80px; max-height: 80px">
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Project Location</th>
                                        <th>Project Client Name</th>
                                        <th>Project Estimated Price</th>
                                        <th>Project Status</th>
                                        <th>Project Start Date</th>
                                        <th>Project Estimated Member</th>
                                        <th>Project Description</th>
                                        <th>Project Image</th>
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
