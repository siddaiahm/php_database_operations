<?php
$db_host='localhost';
$db_user='root';
$db_password='root';
$db_name='neDB';
$con=mysqli_connect($db_host,$db_user,$db_password,$db_name);
if(!$con){

	die("Error connecting to the database".mysqli_connect_error($con));
}
$sql = "select * from data";
if($res=mysqli_query($con,$sql)) {
if(mysqli_num_rows($res)>0){
echo "<center>";
echo "<table bgcolor='yellow' border=1>";
echo "<tr>";
echo "<th>FirstName</th>";
echo "<th>LastName</th>";
echo "<th>Age</th>";
echo "</tr>";

while($row = mysqli_fetch_array($res)){
echo "<tr>";
echo "<td>".$row['FirstName']."</td>";
echo "<td>".$row['LastName']."</td>";
echo "<td>".$row['Age']."</td>";
echo "</tr>";
}

echo "</table>";
echo "</centre>";
mysqli_free_result($res);
}
else{
echo "Matching data is not found";
}
}
else{
echo "error in collecting data";
}
mysqli_close($con);
?>
