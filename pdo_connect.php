<?php
$host_name = "db-mysql-1.cgyknklpvgjc.us-east-1.rds.amazonaws.com";
$db_name = "testDB11";
$user_name = "admin";
$password = "Pdas##2015";
try {
$pdo = new PDO("mysql:host=$host_name;dbname=$db_name", $user_name, $password);
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// sql to create table
$sql1 = "CREATE TABLE IF NOT EXISTS `testDB11`.`user_details` (`id` INT(11) NOT NULL AUTO_INCREMENT , `in_name` VARCHAR(100) NOT NULL ,`in_address` VARCHAR(200) NOT NULL , UNIQUE KEY(`id`), PRIMARY KEY (`in_name`,`in_address`)) ENGINE = InnoDB;";
// use exec() because no results are returned
$pdo->exec($sql1);
///
echo "<h1>Sample Page</h2>";
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();  
// sql to create db
if ($e->getCode() == "1049")
$pdod = new PDO("mysql:host=$host_name;", $user_name, $password);
// set the PDO error mode to exception
$pdod->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// sql to create db
$sqls = "CREATE DATABASE IF NOT EXISTS `testDB11`;";
$pdod->exec($sqls);
}
?>
