

@include("backend.product.header")
<div class="container">
<div class="row">
  <div class="col-md-4 border rounded my-3 p-2">
    <div class="form-group mt-2">
        <label for="name">Category Name</label>
        <input type="text" class="name form-control" >
    </div>
    <div class="form-group mt-2">
        <label for="des">Category Description</label>
        <input type="text" class="des form-control" >
    </div>
    
    <div class="form-group mt-2">
        <label for="code">Code</label>
        <input type="text" class="code form-control" >
    </div>
    <div class="form-group mt-2">
        <label for="name">Status</label>
        <select class="status form-control">
          <option value="1">Active</option>
          <option value="2">Inactive</option>
        </select>
    </div>
    <button class="save mt-2 btn btn-info">Save</button>
  </div>
  <div class="col-md-8">
      <table class="table">
          <thead>
            <tr>
              <th>Sl</th>
              <th>Category Name</th>
              <th>Category Description</th>
              <th>Code</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="tdata">
              
          </tbody>
      </table>
  </div>
</div>
</div>
    @include("backend.product.footer")
