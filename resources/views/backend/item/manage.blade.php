@include("backend.product.header") 
  <h1>All Products</h1>
  <a class="btn btn-info mb-3" href="{{ Route('subcat') }}">Add New</a>
  <table class="table" border="1">
    <tr>
      <th>#Sl No</th>
      <th>Item Name</th>
      <th>Image</th>
      <th>Status</th>
      <th colspan="2">Action</th>
    </tr>
    @php $sl=1; @endphp
    @foreach($items as $item)
      <tr>
        <td>{{ $sl }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->image }}</td>
        <td>{{ $item->status }}</td>
        <td><a class="btn btn-sm btn-info" href="{{ route('edititem',$item->id) }}">View</a></td>
      </tr>
    @endforeach
   
  @include("backend.product.footer") 

