@include("backend.product.header")
    <form action="{{route('addproduct')}}" method="POST">
@csrf
    <input type="text" name="name" placeholder="Enter Name">
       <input type="text" name="des" placeholder="Enter Description">
    <select name="status" >
         <option value="1">Active</option>
         <option value="2">Inactive</option>
   </select>
   <button>Save</button>
    </form>
    @include("backend.product.footer")
