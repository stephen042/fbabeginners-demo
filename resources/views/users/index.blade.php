@extends('layouts.users')

@section('content')
<div class="pagetitle">
    <h1> Dashboard </h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<div class="alert alert-light my-3" role="alert" style="background-color: rgb(217, 217, 217)">
    <h6 style="color: #FF9900;" class="m-0">COVID-19 Related Announcements</h6>
    <span style="font-size: 13px">Stay informed of changes that may impact your business at amazon</span>
</div>
<x-error-message />
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-12">
            <div class="d-flex flex-wrap justify-content-between text-dark mt-1 mb-3">
                <div class="p-2 flex-fill text-center">
                    <h4><b>${{format_number_shorthand(auth()->user()->account_bal)}}</b></h4>
                    <small>Balance</small>  
                </div>
                <div class="p-2 flex-fill text-center">
                    <h4><b>{{format_number_shorthand(auth()->user()->number_of_sales)}}</b></h4>
                    <small>Sales </small>
                </div>
                <div class="p-2 flex-fill text-center">
                    <h4><b>{{format_number_shorthand(auth()->user()->total_sales)}}</b></h4>
                    <small>Total Sales </small>
                </div>
                <div class="p-2 flex-fill text-center">
                    <h4><b>{{format_number_shorthand(auth()->user()->total_product)}}</b></h4>
                    <small>Total Products </small>
                </div>
            </div>
            <div class="flex-container-user">
                <div class="flex-item-user">
                    <h6><b>Product</b></h6>
                    <br>
                    <p class="m-0"><b>USD</b></p>
                    <span>Last 30 days</span>
                </div>
                <div class="flex-item-user">
                    <h6><b><i class="bi bi-caret-down-fill me-2"></i>  Last 30 Days</b></h6>
                    <br>
                    <p class="m-0 text-success"><b>+{{auth()->user()->last_30_days}} %</b></p>
                    <span>Previous 30 days</span>
                </div>
                <div class="flex-item-user">
                    <h6><b><i class="bi bi-caret-down-fill me-2"></i> </b></h6>
                    <br>
                    <p class="m-0 text-success"><b>+{{auth()->user()->last_year}} %</b></p>
                    <span>Last year</span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="card">
                    <div class="row pt-3">
                        <div class="col-md-11 col-11">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <a href="{{route('add_product')}}">
                                        <li class="list-group-item d-flex flex-row justify-content-between  p-3 my-2 rounded-1"
                                            style="background-color: #FF9B05;">
                                            <div class="text-white">Add a Product</div>
                                            <div><i class="bi bi-arrow-right-circle-fill text-white"></i></div>
                                        </li>
                                    </a>

                                    <a href="mailto:support@fbabeginners.live">
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 my-2 rounded-1"
                                            style="background-color: #FF9B05;">
                                            <div class="text-white">Manage
                                                Orders</div>
                                            <div><i class="bi bi-arrow-right-circle-fill text-white"></i></div>
                                        </li>
                                    </a>
                                    <a href="mailto:support@fbabeginners.live">
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 my-2 rounded-1"
                                            style="background-color: #FF9B05;">
                                            <div class="text-white">Manage
                                                Returns</div>
                                            <div><i class="bi bi-arrow-right-circle-fill text-white"></i></div>
                                        </li>
                                    </a>
                                    <a href="{{route('catalog')}}">
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 my-2 rounded-1"
                                            style="background-color: #FF9B05;">
                                            <div class="text-white">Manage
                                                Catalog</div>
                                            <div><i class="bi bi-arrow-right-circle-fill text-white"></i></div>
                                        </li>
                                    </a>
                                    <a href="{{route('affiliate_marketing')}}">
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 my-2 rounded-1"
                                            style="background-color: #FF9B05;">
                                            <div class="text-white"> Affiliate Marketing </div>
                                            <div><i class="bi bi-arrow-right-circle-fill text-white"></i></div>
                                        </li>
                                    </a>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#fund">
                                        <li class="list-group-item d-flex flex-row justify-content-between p-3 my-2 rounded-1"
                                            style="background-color: #FF9B05;">
                                            <div class="text-white">Add Funds</div>
                                            <div><i class="bi bi-arrow-right-circle-fill text-white"></i></div>
                                        </li>
                                    </a>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<livewire:user.fund-modal />
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('copyButton').addEventListener('click', function() {
            var copyText = document.getElementById('copyAddress');

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            document.execCommand("copy");

            // Change button text to "Copied"
            this.textContent = 'Copied';

            // Optional: change the button text back to "Copy" after 3 seconds
            setTimeout(() => {
                this.textContent = 'Copy';
            }, 3000);
        });
    });
</script>

@endsection