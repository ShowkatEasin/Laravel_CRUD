@include("backend.product.header") 

<div class="container">
  <div class="row">
    <div class="col-md-4">
    <form action="{{ route('insertitem') }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group mt-2">
          <label for="">Item Name</label>
          <input type="text" class="form-control" value="{{ $item->name }}" name="name">
        </div>
        <img height="70" src="{{ asset('backend/items/'.$item->image) }}" alt="">
        <div class="form-group mt-2">
          <label for="">Item Single Image</label>
          <input type="file" class="form-control" name="pic">
        </div>
        <div class="form-group mt-2">
          <label for="">Select Status</label>
          <select name="status" id="" class="form-control">
              <option value="">----Select Status -----</option>
              <option value="1" @if($item->status == 1) selected @endif>Active</option>
              <option value="2" @if($item->status == 2) selected @endif>Inactive</option>
          </select>
        </div>
        <button class="btn btn-info mt-2">Update</button>
      </form>
    </div>
    <div class="col-md-8">
    <form action="{{ route('addnewGallery',$item->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group mt-2">
            <label for="">Gallery Images</label>
            <input type="file" class="form-control" name="galleries[]" multiple>
        </div>
        <button class="btn btn-info mt-2">Add Gallery Image</button>
</form>
        @foreach($images as $gallery)
          <div class="images">
            <img src="{{ asset('backend/items/gallery/'.$gallery->galleries_image) }}" alt="">
            <div class="delete">
              <a href="{{ Route('deletegallery',$gallery->id) }}"><i class="btn btn-danger">X</i></a>
            </div>
          </div>
        @endforeach
    </div>
  </div>
</div>
<style>
    .images{
      margin:20px;
      padding:10px;
      width:160px;
      position:relative;
    }
    .images img{
      width:150px;
      height:150px;
    }
    .images img:hover + .delete{
      display:flex;
    }
    .delete{
      background:rgba(0,0,0,.3);
      position:absolute;
      top:0;
      left:0;
      right:0;
      bottom:0;
      display:none;
      justify-content:center;
      align-items:center;
    
    }
</style>
   
@include("backend.product.footer") 