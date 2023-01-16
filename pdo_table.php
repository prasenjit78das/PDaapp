<!-- Table -->
<div class="table-responsive">
<table id="tbl" class="table display table-sm table-striped" style="font-family: Calibri;">
<thead class="bg-success">
<tr style="text-align:center;">
<th scope="col">#</th>
<th scope="col">Name</th>
<th scope="col">Address</th>
</tr>
</thead>
<tbody id="table-body">
<?php
try {
$sql = $pdo->prepare("SELECT * FROM `user_details` ORDER BY `id` DESC");
$sql->setFetchMode(PDO::FETCH_ASSOC);
$sql->execute();
if($sql->rowCount() != 0) {
while($row=$sql->fetch()) 
{
echo "<tr>".
"<td>".$row["id"]."</td>".
"<td>".$row["in_name"]."</td>".
"<td>".$row["in_address"]."</td>".
"</tr>";
}}
else
{
echo "Records not found";
}
} catch(PDOException $e) {
echo "Records not found: " . $e->getMessage();
}
?>
</tbody>
</table>
</div>