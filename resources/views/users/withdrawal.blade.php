@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1>Withdrawal</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">withdrawal</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<div class="m-3">
    <button class="btn btn-primary" onclick="window.location.href='{{ route('dashboard')}}'"><i class="bi bi-house"></i>
        Back </button>
</div>
<x-error-message textColor="text-white" />
<hr>
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Withdrawal to bank</h5>
                    <div class="card">
                        <livewire:user.withdrawal />
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Transactions History</h5>
                    <div class="table-responsive table-responsive-x">
                        <table class="table datatable table-responsive-x">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Account Number</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Status</dth>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($withdrawals as $item => $withdrawal)
                                <tr>
                                    <th scope="row">{{ $item+1}}</th>
                                    <td>{{ date('Y/M/d h:i a', strtotime($withdrawal->created_at)) }}</td>
                                    <td>${{ number_format($withdrawal->amount) }}</td>
                                    <td>{{ $withdrawal->account_name }}</td>
                                    <td>Bank - {{$withdrawal->bank_name}}</td>
                                    <td>
                                        @if ($withdrawal->status == 1)
                                        <span class="badge rounded-pill bg-primary">PENDING</span>
                                        @elseif($withdrawal->status == 2)
                                        <span class="badge rounded-pill bg-success">Completed</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Denied</span>
                                        @endif
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