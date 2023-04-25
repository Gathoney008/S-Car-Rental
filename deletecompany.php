<?php

require_once('connection.php');
$email=$_GET['id'];

$sql="DELETE from company where email='$email'";
$result=mysqli_query($con,$sql);

echo '<script>alert("USER DELETED SUCCESFULLY")</script>';
echo '<script> window.location.href = "admincompanymanagement.php";</script>';

?>