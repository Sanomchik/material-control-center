<?php 

$db_host = 'localhost';
$db_name = 'materials';
$db_username = 'root';
$id = $_POST['id'];
$Mat_name = $_POST['Mat_name'];
$Store_name = $_POST['Store_name'];
$Date =$_POST['Date'];
$Count = $_POST['Count'];
$Cost = $_POST['Cost'];
$Cech = $_POST['Cech'];
$con = mysql_connect($db_host, $db_username);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$sql = "INSERT INTO `materials`.$Cech (id,Mat_name,Date,Count,Cost)
VALUES ('$id','$Mat_name','$Date','$Count','$Cost')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$sql = "INSERT INTO `materials`.history (Mat_name,Store_name,Date,Count,Cost)
VALUES ('$Mat_name','$Store_name','$Date','$Count','$Cost')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$sql = "DELETE FROM `materials`.sklad WHERE id='$id'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($con)
?>
