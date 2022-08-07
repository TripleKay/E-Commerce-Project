@extends('frontEnd.layouts.app')
@section('content')
    <section class="py-4 min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item"><a href="#">Library</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="list-group">
                        <a href="{{ route('user#profile') }}" class="list-group-item list-group-item-action " aria-current="true">
                          My Profile
                        </a>
                        <a href="{{ route('user#myOrder') }}" class="list-group-item list-group-item-action active">My Orders</a>
                        <a href="#" class="list-group-item list-group-item-action">My Wishlists</a>
                        <a href="#" class="list-group-item list-group-item-action">My Carts</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">A disabled link item</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card bg-white">
                        <div class="card-header bg-transparent">
                            <div class="d-flex justify-content-between my-1 align-items-center">
                                <h4 class="mb-0">My Orders</h4>
                            </div>
                        </div>
                        <div class="card-body">
                           <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Total Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                <tr>
                                    <td scope="row">{{ $item->order_date }}</td>
                                    <td>{{ $item->invoice_number }}</td>
                                    <td>{{ $item->grand_total }} Ks</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>
                                        <div class="badge bg-success">{{ $item->status }}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('user#orderDetail',$item->order_id) }}" class="btn btn-sm btn-info text-white "><i class="fas fa-eye me-2"></i>View</a>
                                        <a target="_blank" href="{{ route('user#download#downloadInvoice',$item->order_id) }}" class="btn btn-sm btn-dark text-white"><i class="fas fa-download me-2"></i>Invoice</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
