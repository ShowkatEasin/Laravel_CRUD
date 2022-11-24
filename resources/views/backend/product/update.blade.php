@include("backend.product.header") 
  <form action="{{ route('update',$edit->id) }}" method="POST">
    @csrf
    <input type="text" value="{{ $edit->name }}" name="name" placeholder="Enter Name">
    <input type="text" value="{{ $edit->des }}"  name="des" placeholder="Enter Des">
    <select name="status">
      <option value="1" @if ($edit->status == 1) selected @endif >Active</option>
      <option value="2" @if ($edit->status == 2) selected @endif >Inactive</option>
    </select>
    <button>Save Change</button>
  </form>
  @include("backend.product.footer") 