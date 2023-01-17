<?php
echo '<h3>Sample Page</h3><br>';
$host_name = "PUT DB INSTANCE endpoint";
$database_name = "testDB";
$user_name = "admin";
$password = "Pdas#2015";
// Set MySQLi to throw exceptions 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
try {
    $con = @mysqli_connect($host_name,$user_name,$password,$database_name);   
} catch (mysqli_sql_exception $e) {
    echo 'Error-'.mysqli_error($con);
    die("Unfortunately, the details you entered for connection are incorrect!");
}
if(!$con){echo 'Connection error';}
else{ echo 'Connection Successful!';
    $query1='CREATE DATABASE IF NOT EXISTS `testDB`;';
    try {
    mysqli_query($con, $query1);
    }catch(mysqli_sql_exception $e){
        echo 'Error-'.mysqli_error($con);
    }
    $query2='CREATE TABLE IF NOT EXISTS `testDB`.`user_details` (`id` INT(11) NOT NULL AUTO_INCREMENT , `in_name` VARCHAR(100) NOT NULL ,`in_address` VARCHAR(200) NOT NULL , UNIQUE KEY(`id`), PRIMARY KEY (`in_name`,`in_address`)) ENGINE = InnoDB;';
    try {
        mysqli_query($con, $query2);
        }catch(mysqli_sql_exception $e){
            echo 'Error-'.mysqli_error($con);
        }
        //echo 'connected';
        $tbl="
        <style> input{width:80%;}</style>
        <form action='' method='POST'>
        <table style='width:100%;border:none;'>
        <tr>
        <td>Name:<input type='text' name='in_name'/></td>
        <td>Address:<input type='text' name='in_address'/></td>
        <td><input type='submit' name='save' value='Save'/></td>
        </tr>
        </table>
        </form>";
        echo $tbl;
        try {
            if(isset($_POST['save'])){
                $in_name= mysqli_real_escape_string($con,$_POST['in_name']);
                $in_address= mysqli_real_escape_string($con,$_POST['in_address']);
                $ins_statement= "INSERT INTO `user_details` (`in_name`, `in_address`) 
                VALUES ('$in_name', '$in_address');";
                $ins_main = mysqli_query($con, $ins_statement);
            } 
        } catch (mysqli_sql_exception $e) {
            echo 'Insertion Error-'.mysqli_error($con);
        } 
        $fetch_tlb='<table style="width:100%;text-align:center;border:1pt black solid" border="1" rules="all">
        <tr style="background-color:#DDD;"><td>Sl#</td><td>Name</td><td>Address</td></tr>';
        $query3 = "SELECT * FROM `user_details` ORDER BY `id` DESC";
            $result3 = mysqli_query($con, $query3);
            $rowcount = mysqli_num_rows($result3);
            while ($row3 = mysqli_fetch_array($result3)) {
            $fetch_tlb.='<tr><td>'.$row3['id'].'</td><td>'.$row3['in_name'].'</td><td>'.$row3['in_address'].'</td></tr>';
            }
        $fetch_tlb.='</table>';
echo $fetch_tlb;
}
?>