<!-- The Insert Modal -->
<div class="modal" id="insertModal">
<div class="modal-dialog">
<div class="modal-content">      <!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Insert</h4>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>      <!-- Modal body -->
<div class="modal-body">
<form>
<div class="form-group">
<label for="column1">User</label>
<input type="text" class="form-control" id="in_name">
</div>
<div class="form-group">
<label for="column2">Address</label>
<input type="text" class="form-control" id="in_address">
</div>
<!-- Add more form fields for each column in the table -->
</form>
</div>      <!-- Modal footer -->
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary" onclick="insertRecord()">Insert</button>
</div>    
</div>
</div>
</div>