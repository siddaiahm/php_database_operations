<?php
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$age=$_POST["age"];
$db_host='localhost';
$db_user='root';
$db_password='root';
$db_name='neDB';
$con=mysqli_connect($db_host,$db_user,$db_password,$db_name);
if(!$con){

	die("Error connecting to the database".mysqli_connect_error($con));
}
$sql = "insert into data values($fname,$lname,$age)";
if(mysqli_query($con,$sql)) {
echo "table value is inseted successfully in table data";
}else{
echo "Erro in inserting value to table".mysqli_connect_error($con);
}
mysqli_close($con);
?>
