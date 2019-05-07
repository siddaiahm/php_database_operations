<?php
$db_host='localhost';
$db_user='root';
$db_password='root';
$db_name='neDB';
$con=mysqli_connect($db_host,$db_user,$db_password,$db_name);
if(!$con){

	die("Error connecting to the database".mysqli_connect_error($con));
}
$sql = "update data set age='20' where FirstName='Yeddu'";
if(mysqli_query($con,$sql)) {
echo "table is updated successfully in database newDB";
}else{
echo "Erro in creating database".mysqli_connect_error($con);
}
mysqli_close($con);
?>
