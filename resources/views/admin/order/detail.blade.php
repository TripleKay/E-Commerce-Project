@extends('admin.layouts.app')
@section('content')
<div class="row pt-4">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row pb-4">
    <div class="col-6">
        <div class="card shadow-none my-3">
            <div class="card-header bg-transparent">
                <div class="">
                    <div class="h5">Order Detail</div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody class="">
                        <tr>
                            <th>Invoice Number</th>
                            <td>{{ $order->invoice_number }}</td>
                        </tr>
                        <tr>
                            <th>Payment</th>
                            <td>{{ $order->payment_method }}</td>
                        </tr>
                        <tr>
                            <th>Sub Total</th>
                            <td>{{ $order->sub_total }}</td>
                        </tr>
                        @if (!empty($order->coupon_id))
                        <tr>
                            <th>Coupon Discount</th>
                            <td>{{ $order->coupon_discount }} Ks</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Grand Total</th>
                            <td>{{ $order->grand_total }} Ks</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->order_date }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <div class="badge bg-success">{{ $order->status }}</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-3 py-3 float-right">
                    @if ($order->status == 'pending')

                        <a href="{{ route('admin#confirmOrder',$order->order_id) }}" class="orderStatusBtn btn btn-primary shadow-lg">Confirm Order</a>

                    @elseif ($order->status == 'confirmed')

                        <a href="{{ route('admin#processOrder',$order->order_id) }}" class="orderStatusBtn btn btn-primary shadow-lg">Process Order</a>

                    @elseif ($order->status == 'processing')

                        <a href="{{ route('admin#pickOrder',$order->order_id) }}" class="orderStatusBtn btn btn-primary shadow-lg">Pick Order</a>

                    @elseif ($order->status == 'picked')

                        <a href="{{ route('admin#shipOrder',$order->order_id) }}" class="orderStatusBtn btn btn-primary shadow-lg">Ship Order</a>

                    @elseif ($order->status == 'shipped')

                        <a href="{{ route('admin#deliverOrder',$order->order_id) }}" class="orderStatusBtn btn btn-primary shadow-lg">Deliver Order</a>

                    @elseif ($order->status == 'delivered')

                        <a href="{{ route('admin#completeOrder',$order->order_id) }}" class="orderStatusBtn btn btn-primary shadow-lg">Complete Order</a>

                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow-none my-3">
            <div class="card-header bg-transparent">
                <div class="">
                    <div class="h5">Delivery Detail</div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody class="">
                        <tr>
                            <th>Name</th>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <th>Region</th>
                            <td>{{ $order->stateDivision->name }}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{ $order->city->name }}</td>
                        </tr>
                        <tr>
                            <th>Township</th>
                            <td>{{ $order->township->name }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $order->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="col-12">
        <div class="card shadow-none">
            <div class="card-header bg-transparent">
                <div class="d-flex justify-content-between my-1 align-items-center">
                    <h4 class="mb-0">Order Items</h4>
                    {{-- <button class="btn btn-dark">Download Invoice</button> --}}
                </div>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-nowrap">
                            <tr>
                                <th>id</th>
                                <th>Image</th>
                                <th>product</th>
                                <th>color</th>
                                <th>size</th>
                                <th>unit Price</th>
                                <th>quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $item)
                            <tr>
                                <td scope="row">{{ $item->order_item_id }}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/'.$item->product->preview_image) }}" class="shadow-sm" alt="" srcset="" style="width: 100px; height: 100px">
                                </td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ empty($item->color) ? '---' : $item->color->name}}</td>
                                <td>{{ empty($item->size) ? '---' : $item->size->name}}</td>
                                <td>{{ $item->unit_price }} Ks</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total_price }} Ks</td>

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
    <script>
        $('document').ready(function(){
            $('.orderStatusBtn').on('click',function(e){
                e.preventDefault();
                let link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure to change order status?',
                    // text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Change Status!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        // Swal.fire(
                        // 'Updated!',
                        // 'Order Status has been changed.',
                        // 'success'
                        // )
                    }
                    })
            })
        })
    </script>
@endsection
