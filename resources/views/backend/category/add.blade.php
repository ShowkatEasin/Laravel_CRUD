

@include("backend.product.header") 
   <div class="container">
    <div class="row">
      <div class="col-md-4 border rounded my-3 p-2">
        <div class="form-group mt-2">
            <label for="name">Category Name</label>
            <input type="text" class="name form-control" >
        </div>
        <div class="form-group mt-2">
            <label for="des">Category Name</label>
            <input type="text" class="des form-control" >
        </div>
        <div class="form-group mt-2">
            <label for="code">Category Name</label>
            <input type="text" class="code form-control" >
        </div>
        <div class="form-group mt-2">
            <label for="name">Category Name</label>
            <select class="status form-control">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
        </div>
        <button class="save mt-2 btn btn-info">Save</button>
        <button style="display:none" class="update mt-2 btn btn-info">Update</button>
      </div>
      <div class="col-md-8">
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addupdate">Add New</button>
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

  <!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="mdelete btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New or Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group mt-2">
            <label for="name">Category Name</label>
            <input type="text" id="name" class=" form-control" >
        </div>
        <div class="form-group mt-2">
            <label for="des">Category Name</label>
            <input type="text" id="des" class=" form-control" >
        </div>
        <div class="form-group mt-2">
            <label for="code">Category Name</label>
            <input type="text" id="code" class=" form-control" >
        </div>
        <div class="form-group mt-2">
            <label for="name">Category Name</label>
            <select id="status" class=" form-control">
              <option value="1">Active</option>
              <option value="2">Inactive</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save" class="btn btn-primary">Save changes</button>
        <button style="display:none" type="button" id="update" class="btn btn-success">Update</button>
      </div>
    </div>
  </div>
</div>
@include("backend.product.footer") 
