<div class="card rounded" style="box-shadow: none !important">
    <div class="card-header">
        <h4 class="text-primary">{{ $product->name }}</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable">
                <thead class="bg-primary">
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Stocks</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th>{{ $item->product_variants }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $colors->where('color_id',$item->color_id)->value('name') }}</td>
                            <td>{{ $sizes->where('size_id',$item->size_id)->value('name') }}</td>
                            <td>{{ $item->available_stock }}</td>
                            <td>
                                <a href="" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
</div>
