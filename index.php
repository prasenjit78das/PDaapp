<?php
require_once "pdo_connect.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Sample page</title>
<!--Bootstrap5-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head><body >
<div class="container-fluid">
<div class="row justify-content-between">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">Add Data</button>
</div>
</div>
<?php
include "pdo_table.php";
include "pdo_modal.php";
?>
<script>
function insertRecord() {
//alert("Clicked");
// Get the values of the form fields
var in_name = $("#in_name").val();
var in_address = $("#in_address").val();
// Add more variables for each form field

// Make an AJAX request to the server-side script
$.ajax({
url: "pdo_insert.php",
type: "post",
data: {in_name: in_name, in_address: in_address},
// Add more data for each form field
success: function(response) {
// Insert was successful, close the modal and refresh the table
$("#insertModal").modal("hide");
window.location.reload();
},
error: function(response) {
// Insert failed, show an error message
alert("Insert failed");
}
});
}</script>
<style>
tr {text-align:center;}
</style>