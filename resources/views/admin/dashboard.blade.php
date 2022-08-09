@extends('admin.layouts.app')
@section('content')
    <div class="row pt-4 mb-3">
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class="p-3 rounded">
                        <i class="fas fa-shopping-bag text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="mb-0 font-weight-bolder">23</h3>
                        <h5 class="mb-0">Total Orders</h5>
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
                        <h3 class="mb-0 font-weight-bolder">23</h3>
                        <h5 class="mb-0">Total Products</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-3 rounded">
                        <i class="fas fa-users text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="mb-0 font-weight-bolder">23</h3>
                        <h5 class="mb-0">Total Customers</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow-none">
                <div class="card-body d-flex align-items-center">
                    <div class=" p-3 rounded">
                        <i class="fas fa-map-marker-alt text-primary" style="font-size: 40px"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="mb-0 font-weight-bolder">23</h3>
                        <h5 class="mb-0">Support Location</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <div class="card shadow-none rounded">
                <div class="card-header">
                    <h5 class="mb-0">Product By Category</h5>
                </div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow-none rounded">
                <div class="card-header">
                    <h5 class="mb-0">Order By Months</h5>
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
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead class="bg-primary text-nowrap">
                          <tr>
                            <th>#</th>
                            <th>Preview Image</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Category</th>

                            <th>Color</th>
                            <th>Size</th>
                            <th>Stocks</th>
                            <th>Publish Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>
                                    <img src="http://127.0.0.1:8000/uploads/products/62b1bcc72863c_mobilePhone4.jpg" class="rounded shadow-sm" alt="" srcset="" style="width: 90px; height: 90px;">
                                </td>
                                <td>Iphone 11 (16:128)</td>
                                <td>Apple</td>
                                <td>Mobile Phone</td>

                                <td>White</td>
                                <td>---</td>
                                <td>5</td>
                                <td>Publish</td>
                                <td class="text-wrap">
                                    <a href="http://127.0.0.1:8000/admin/product/detail/1" class="btn btn-info btn-sm mb-2"><i class="fas fa-eye "></i></a>
                                    <a href="http://127.0.0.1:8000/admin/product/edit/1" class="btn btn-success btn-sm mb-2"><i class="fas fa-edit "></i></a>
                                    <a href="http://127.0.0.1:8000/admin/product/variant/create/1" class="btn btn-dark btn-sm mb-2"><i class="fas fa-plus-circle"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>
                                    <img src="http://127.0.0.1:8000/uploads/products/62b1bcc72863c_mobilePhone4.jpg" class="rounded shadow-sm" alt="" srcset="" style="width: 90px; height: 90px;">
                                </td>
                                <td>Iphone 11 (16:128)</td>
                                <td>Apple</td>
                                <td>Mobile Phone</td>

                                <td>White</td>
                                <td>---</td>
                                <td>5</td>
                                <td>Publish</td>
                                <td class="text-wrap">
                                    <a href="http://127.0.0.1:8000/admin/product/detail/1" class="btn btn-info btn-sm mb-2"><i class="fas fa-eye "></i></a>
                                    <a href="http://127.0.0.1:8000/admin/product/edit/1" class="btn btn-success btn-sm mb-2"><i class="fas fa-edit "></i></a>
                                    <a href="http://127.0.0.1:8000/admin/product/variant/create/1" class="btn btn-dark btn-sm mb-2"><i class="fas fa-plus-circle"></i></a>
                                </td>
                            </tr>
                            
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
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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


        const orderByMonth = document.getElementById('orderByMonth').getContext('2d');
        const orderByMonthChart = new Chart(orderByMonth, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
