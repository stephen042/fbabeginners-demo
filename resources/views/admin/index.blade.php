@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Admin Dashboard </h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
            <li class="breadcrumb-item active">Admin Dashboard</li>
        </ol>
    </nav>
</div>
<x-error-message/>
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-12">
            <div class="row">
                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$total_users }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Total Deposit <span>USD</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>${{format_number_shorthand($total_balance,2) }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Total Withdrawn <span> USD</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar text-danger"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>- ${{format_number_shorthand($total_withdrawal,2) }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Approved Users</h5>
                    <div class="table-responsive table-responsive-x">
                        <table class="table datatable table-responsive-x">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Approved on</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Action</dth>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $item => $user)
                                <tr>
                                    <th scope="row">{{ $item+1}}</th>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->country}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ date('Y/M/d h:i a', strtotime($user->created_at)) }}</td>
                                    <td>${{ number_format($user->account_bal) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{route('admin_editUser',[$user->id])}}" class="btn btn-sm btn-primary m-1"><i class="bi bi-pencil-square"></i>
                                                manage
                                            </a>
                                            <button class="btn btn-sm btn-danger m-1"><i class="bi bi-archive-fill"></i> Delete</button>
                                        </div>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection