<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S-CAR RENTALS</title>
    <link rel="stylesheet" href="slick.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fixed.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body  data-spy="scroll" data-target="#navbarResponsive">

<style>
body {
  background-color: black;
  color: white;
  font-family: Arial, sans-serif;
}

input[type="text"], input[type="number"], input[type="file"] {
  background-color: transparent;
  border: none;
  border-bottom: 1px solid white;
  color: white;
  font-size: 18px;
  margin-bottom: 20px;
  padding: 10px;
  width: 100%;
}

label {
  display: block;
  font-size: 20px;
  margin-bottom: 10px;
}

.btnn {
  background-color: crimson;
  border: none;
  color: white;
  cursor: pointer;
  font-size: 18px;
  margin-top: 20px;
  padding: 10px 20px;
}

.btnn:hover {
  background-color: #ff6666;
}

.register {
  background-color: rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
  margin: 30px auto;
  padding: 60px;
  width: 80%;
}

h2 {
  font-size: 30px;
  
  text-align: center;
  text-transform: uppercase;
}

</style>

<?php 
require_once('connection.php');

session_start();

$value = $_SESSION['email'];
$_SESSION['email'] = $value;

$sql="select * from company where EMAIL='$value'";
$name = mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($name);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="companydash.php">
            <h2>COMPANY DASHBOARD</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="companydash.php">CAR MANAGEMENT</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="companybooking.php">BOOKING REQUESTS</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="index.php">LOG OUT</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main">
        
        <div class="register">
        <h2>Enter Details Of New Car</h2>
        <form id="register"  action="companyupdate.php" method="POST" enctype="multipart/form-data">    
        <label>Fuel Type : </label>
    <br>
    <input type ="text" name="ftype"
    id="name" placeholder="Enter Fuel Type" required>
    <br><br>

    <label>Capacity : </label>
    <br>
    <input type="number" name="capacity" min="1"
    id="name" placeholder="Enter Capacity Of Car" required>
    <br><br>

    <label>Price : </label>
    <br>
    <input type="number" name="price" min="1"
    id="name" placeholder="Enter Price Of Car for One Day(in Ksh)" required>
    <br><br>

    <label>Company Name: </label>
    <br>
    <input type="text" name="cname"
    id="name" placeholder="Enter Name of the Company Renting" required>
    <br><br>

    <label>Car Image : </label>
    <br>
    <input type="file" name="image" required>
    <br><br>

    <input type="hidden" name="carid" value="">
    <input type="submit" class="btnn" value="UPDATE CAR" name="updatecar">

</form>

        </div> 
    </div>
    
</body>

</html>