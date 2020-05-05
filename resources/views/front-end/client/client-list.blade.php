@extends('layouts/contentLayoutMaster')

@section('title', 'Client Lists')

@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Client Lists</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors ">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Father's Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Salary</th>
                                        <th>Address</th>
                                        <th>Note</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user as $index => $users)
                                        <tr>
                                            <td scope="row">{{ $index+1 }}</td>
                                            <td>
                                                <a href="{{ route('client-details', ['id' => $users->id]) }}" title="See Client Details">
                                                    {{ $users->name }}
                                                </a>
                                            </td>
                                            <td>
                                                {{ $users->fathers_name }}
                                            </td>
                                            <td>
                                                {{ $users->username }}
                                            </td>
                                            <td>
                                                {{ $users->email }}
                                            </td>
                                            <td>
                                                {{ \App\Helpers\Helper::mobileNumber($users->mobile) }}
                                            </td>
                                            <td>
                                                {{ $users->salary }}
                                            </td>
                                            <td>
                                                {{ $users->address }}
                                            </td>
                                            <td>
                                                {{ $users->note }}
                                            </td>
                                            <td>
                                                <div class="avatar mr-1 avatar-xl">
                                                    <img src="{{ asset($users->image) }}" alt="avtar img holder">
                                                    @if($users->status != 1)
                                                        <span class="avatar-status-busy"></span>
                                                    @else
                                                        <span class="avatar-status-online"></span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a type="button" class="btn btn-outline-success" title="Edit Client" href="{{ route('client-edit', ['id' => $users->id]) }}">
                                                    <i class="feather icon-edit-1"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Father's Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Salary</th>
                                        <th>Address</th>
                                        <th>Note</th>
                                        <th>Image</th>
                                        <th>Action</th>
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
