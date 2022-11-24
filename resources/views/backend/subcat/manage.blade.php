@include("backend.product.header") 
  <h1>All Products</h1>
  <a class="btn btn-info mb-3" href="{{ Route('subcat') }}">Add New</a>
  <table class="table" border="1">
    <tr>
      <th>#Sl No</th>
      <th>Category Id</th>
      <th>Category Name</th>
      <th>Sub Category Name</th>
      <th>Description</th>
      <th>Image</th>
      <th>Status</th>
      <th colspan="2">Action</th>
    </tr>
    @php $sl=1; @endphp
    @foreach($SubCats as $subcat)
    <tr>
      <td>{{ $sl }}</td>
      <td>{{ $subcat->cat_id }}</td>
      <td>{{ $subcat->catName->name }}</td>
      <td>{{ $subcat->name }}</td>
      <td>{{ $subcat->des }}</td>
      <td><img src=" {{ asset('backend/subcatimage/'.$subcat->image) }} " alt="" height="30"></td>
      <td>{{ $subcat->status }}</td>
      <td><a class="btn btn-info btn-sm" href="{{ route('editsubcat',$subcat->id) }}">Edit</a></td>
      <td><a class="btn btn-danger btn-sm" href="{{ route('deletesubcat',$subcat->id) }}">Delete</a></td>
    </tr>
    @php $sl++; @endphp
    @endforeach
  </table>
  @include("backend.product.footer") 

