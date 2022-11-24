@include("backend.product.header") 
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form action="{{ route('insertitem') }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group mt-2">
          <label for="">Item Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group mt-2">
          <label for="">Description</label>
          <input type="text" class="form-control" name="des">
        </div>
        <div class="form-group mt-2">
          <label for="">Item Single Image</label>
          <input type="file" class="form-control" name="pic">
        </div>
        <div class="form-group mt-2">
          <label for="">Gallery Images</label>
          <input type="file" class="form-control" name="galleries[]" multiple>
        </div>
        <div class="form-group mt-2">
          <label for="">Select Status</label>
          <select name="status" id="" class="form-control">
              <option value="">----Select Status -----</option>
              <option value="1">Active</option>
              <option value="2">Inactive</option>
          </select>
        </div>
        <button class="btn btn-info mt-2">Add Item</button>
      </form>
      </div>
    </div>
  </div>  
@include("backend.product.footer") 