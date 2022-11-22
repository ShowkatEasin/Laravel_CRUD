@include("backend.product.header")
    <h1>All Products</h1>
    <a class="btn btn-info mb-3" href="{{Route('product')}}">Add New</a>
    <table class="table" class="" border="1">
        <tr>
            <th>#sl No</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        @php $sl=1 @endphp
       @foreach($products as $product)
         <tr>
            <td>{{ $sl }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->des }}</td>
            <td>@if($product->status==1)

            <a class="btn btn-sm btn-warning" href="{{Route('active',$product->id)}}">Active</a>
                 @else 
                 <a class="btn btn-sm btn-secondary" href="{{Route('inactive',$product->id)}}">Inactive</a>

                  @endif</td> 
            <td><a class="btn btn-sm btn-success" href="{{Route('edit',$product->id)}}">Edit</a></td>
            <td><button data-bs-toggle="modal" data-bs-target="#delete{{$product->id}}" class="btn btn-sm btn-danger" href="">Delete</button></td>
         </tr>
         @php $sl++ @endphp
         <div class="modal" id="delete{{$product->id}}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this product</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a type="button" href="{{Route('delete',$product->id)}}" class="btn btn-primary">Delete</a>
      </div>
    </div>
  </div>
</div>
       @endforeach

    </table>
    @include("backend.product.footer")