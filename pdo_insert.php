<?php
require_once "pdo_connect.php";
// Get the form data
$in_name =  $_POST["in_name"];
$in_address = $_POST["in_address"];
// Add more variables for each form field
$data = [
["$in_name","$in_address"],
//["Jane","Roe"],
];
$stmt = $pdo->prepare("INSERT INTO user_details (in_name, in_address) VALUES (?,?)");
try {
$pdo->beginTransaction();
foreach ($data as $row)
{
$stmt->execute($row);
}
$pdo->commit();
}catch (Exception $e){
$pdo->rollback();
throw $e;
echo $e;
}
$pdo ==null;
?>