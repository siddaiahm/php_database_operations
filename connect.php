<?php
$db_host='localhost';
$db_user='root';
$db_password='root';
$db_name='neDB';
$con=mysqli_connect($db_host,$db_user,$db_password);
if(!$con){

	die("Error connecting to the database".mysqli_connect_error($con));
}
$sql = "create database newDB";
if(mysqli_query($con,$sql)) {
echo "Database is created successfully as newDB";
}else{
echo "Erroe in creating database".mysqli_connect_error($con);
}
mysqli_close($con);
?>
