@include("backend.product.header") 
  <div class="container">
    <div class="row">
      <form action="{{ route('updatesubcat',$SubCats->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="col-md-8 offset-md-2">
        <div class="form-group">
          <label for="">Select Category</label>
          <select name="cat_id" id="" class="form-control">
            @foreach($cats as $cat)
              <option value="{{ $cat->id }}">{{ $cat->name }}</option>  
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="">Sub-Category Name</label>
          <input type="text" class="form-control" value="{{ $SubCats->name }}" name="name">
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <input type="text" class="form-control" value="{{ $SubCats->des }}" name="des">
        </div>
        <div class="form-group">
          <img height="100" src="{{ asset('backend/subcatimage/'.$SubCats->image) }}" alt="">
        </div>
        <div class="form-group">
          <label for="">Image</label>
          <input type="file" class="form-control" name="pic">
        </div>
        <div class="form-group">
          <label for="">Select Status</label>
          <select name="status" id="" class="form-control">
              <option value="">----Select Status -----</option>
              <option value="1" @if ($SubCats->status == 1) selected @endif>Active</option>
              <option value="2" @if ($SubCats->status == 2) selected @endif>Inactive</option>
          </select>
        </div>
        <button class="btn btn-info mt-2">Add Item</button>
      </div>
      </form>
    </div>
  </div>  
@include("backend.product.footer") 