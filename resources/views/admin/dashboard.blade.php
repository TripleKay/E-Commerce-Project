@extends('admin.layouts.app')
@section('content')
    @php
        $now = Carbon\Carbon::now();
        $todaySales = App\Models\Order::where('order_date',$now->format('d F Y'))->sum('grand_total');
        $monthlySales = App\Models\Order::where('order_month',$now->format('F'))->sum('grand_total');
        $yearlySales = App\Models\Order::where('order_year',$now->format('Y'))->sum('grand_total');
        $pendingOrders = App\Models\Order::where('status','pending')->count();

    @endphp
    <div class="row pt-4 mb-3">
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class="p-3 rounded">
                        <i class="fas fa-calendar-day text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h6 class="mb-0 text-secondary">Today's Sale</h6>
                        <h4 class="mb-0 font-weight-bolder">{{ number_format($todaySales) }} Ks</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-3 rounded">
                        <i class="fas fa-th text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h6 class="mb-0 text-secondary">Monthly's Sale</h6>
                        <h4 class="mb-0 font-weight-bolder">{{ number_format($monthlySales) }} Ks</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-3 rounded">
                        <i class="fas fa-calendar-alt text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h6 class="mb-0 text-secondary">Yearly Sale</h6>
                        <h4 class="mb-0 font-weight-bolder">{{ number_format($yearlySales) }} Ks</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-3 rounded">
                        <i class="fas fa-shopping-bag text-primary" style="font-size: 40px"></i>

                    </div>
                    <div class="ml-3">
                        <h6 class="mb-0 text-secondary">Pending Order</h6>
                        <h4 class="mb-0 font-weight-bolder">{{ $pendingOrders }} Orders</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <div class="card shadow-none rounded">
                <div class="card-header">
                    <h5 class="mb-0">Orders By Month ( {{ date('Y')}} )</h5>
                </div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow-none rounded">
                <div class="card-header">
                    <h5 class="mb-0">Sales By Month ( {{ date('Y')}} )</h5>
                </div>
                <div class="card-body">
                    <canvas id="orderByMonth"></canvas>
                </div>
            </div>
        </div>
    </div>

<div class="row pb-4">
    <div class="col-12">
        <div class="card rounded" style="box-shadow: none !important">
            <div class="card-header">
               <div class="d-flex align-items-center justify-content-between my-1">
                    <h4 class="mb-0">Products less than 5 Stocks</h4>
               </div>
            </div>
            <div class="card-body">
                @php
                    $products = App\Models\ProductVariant::query()->with(['product' => function($query){
                                    $query->select('product_id','name','publish_status');
                                },'color','size'])->where('available_stock','<=','5')->get();
                @endphp
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead class="bg-primary text-nowrap">
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Stocks</th>
                            <th>Publish Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <th>{{ $item->product_variant_id }}</th>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->color_id != null ? $item->color->name : '---'  }}</td>
                                    <td>{{ $item->size_id != null ? $item->size->name : '---'  }}</td>
                                    <td>{{ $item->available_stock }}</td>
                                    <td>
                                        @if ($item->product->publish_status == 1)
                                            <div class="badge badge-success">Publish</div>
                                        @else
                                            <div class="badge badge-danger">Unpublish</div>
                                        @endif
                                    </td>
                                    <td class="text-wrap">
                                        <a href="{{ route('admin#showProduct',$item->product_id) }}" class="btn btn-info btn-sm mb-2"><i class="fas fa-eye "></i></a>
                                        <a href="{{ route('admin#editVariant',$item->product_variant_id) }}" class="btn btn-success btn-sm mb-2"><i class="fas fa-edit "></i></a>
                                        <a href="{{ route('admin#createVariant',$item->product_id) }}" class="btn btn-dark btn-sm mb-2"><i class="fas fa-plus-circle"></i></a>
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
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        var data = {!! json_encode($data) !!};
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun' , 'Jul' , 'Aug' , 'Sep' , 'Oct' , 'Nov' , 'Dec'],
                datasets: [{
                    label: 'orders by month {{ date('Y') }}',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        '#4B445320',
                        'rgba(255, 159, 64, 0.2)',
                        '#66BEA020',
                        '#D65DB120',
                        '#926C0020',
                        '#005B4420',
                        '#6100FF20',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        '#4B4453',
                        'rgba(255, 159, 64, 1)',
                        '#66BEA0',
                        '#D65DB1',
                        '#926C00',
                        '#005B44',
                        '#6100FF',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        @php

        @endphp
        var salesByMonth = {!! json_encode($salesByMonth) !!};
        const orderByMonth = document.getElementById('orderByMonth').getContext('2d');
        const orderByMonthChart = new Chart(orderByMonth, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun' , 'Jul' , 'Aug' , 'Sep' , 'Oct' , 'Nov' , 'Dec'],
                datasets: [{
                    label: 'sales by month {{ date('Y') }}',
                    data: salesByMonth,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        '#4B445320',
                        'rgba(255, 159, 64, 0.2)',
                        '#66BEA020',
                        '#D65DB120',
                        '#926C0020',
                        '#005B4420',
                        '#6100FF20',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        '#4B4453',
                        'rgba(255, 159, 64, 1)',
                        '#66BEA0',
                        '#D65DB1',
                        '#926C00',
                        '#005B44',
                        '#6100FF',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });



    </script>


@endsection
