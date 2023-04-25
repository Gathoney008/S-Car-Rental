<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S-CAR RENTALS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fixed.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body data-spy="scroll" data-target="#navbarResponsive">
   <style>
      /* Set background color to black */
      body {
        background-color: black;
      }

      input[type="search"] {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        background-color: #f1f1f1;
        width: 100%;
      }

      .search-container {
        display: flex;
        justify-content: flex-end;
        max-width: 65%;
        font-size: 16px;

      }


      .firstname, .lastname {
        font-size: 30px;
        color: crimson;
        margin-top: 10px;
        text-align: center;
      }
      /* Style the overview heading */
      .overview {
        color: white;
        font-size: 36px;
        text-align: center;
        margin-top: 50px;
      }

      /* Style the car list */
      .de {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
      }

      /* Style the car list item */
      .de li {
        width: 300px;
        margin: 20px;
        background-color: black;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.5);
      }

      /* Style the car image */
      .imgBx {
        position: relative;
        width: 100%;
        height: 200px;
      }

      .imgBx img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
      }
     
      .user {
        width: 100%; 
        height: 60px; 
        position: relative; 
        overflow: hidden; 
        margin-top: 30px;
        text-align: center;
      }

      .user i {
        position: absolute; 
        top: 50%;
        left: 50%; 
        transform: translate(-50%, -50%); 
        font-size: 80px; 
        color: #ccc;
      }

    

      /* Style the car details */
      .content {
        padding: 20px;
        text-align: center;
        color: white;
      }

      /* Style the car name */
      h1 {
        font-size: 24px;
        margin-top: 0;
        margin-bottom: 10px;
      }

      /* Style the car details */
      h2 {
        font-size: 16px;
        margin-top: 0;
        margin-bottom: 5px;
      }

      /* Style the book button */
      .button {
        background-color: #dc143c;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .button:hover {
        background-color: #b7002d;
      }
    
   </style> 




<!--PHP CODE-->
<?php 
require_once('connection.php');
session_start();

$value = $_SESSION['email'];
$_SESSION['email'] = $value;

$sql="select * from users where EMAIL='$value'";
$name = mysqli_query($con,$sql);
$rows=mysqli_fetch_assoc($name);

if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $sql2 = "select * from cars where AVAILABLE='Y' and (CAR_NAME like '%$keyword%' or CAR_BRAND like '%$keyword%' or DESCRIPTION like '%$keyword%')";
} else {
    $sql2 = "select * from cars where AVAILABLE='Y'";
}
$cars = mysqli_query($con, $sql2);
    
    ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="cardetails.php">
            <h2>S-CAR RENTALS</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li  class="nav-item">
                    <a class="nav-link"  href="bookingstatus.php">BOOKINGS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" onclick="logout()">LOG OUT</a>
                </li>
                <script>
                function logout() {
                  if (confirm("Are you sure you want to log out?")) {
                    window.location.href = "index.php"; 
                  }
                }
                </script>
                <li>
                </li>
            </ul>
        </div>
    </nav>
 

            <div class="container">
                <h1 class="overview">Welcome<br>
                <div class="user">
                  <i class="fas fa-user-circle"></i> 
                </div>

                <p class="firstname">&nbsp;<a id="pname"> 
                  <?php echo $rows['FNAME']." ".$rows['LNAME']?></a></p> <br>

                  <div class="search-container">
                    <form method="POST" action="">
                      <input type="text" name="keyword" placeholder="Search cars..." style="padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                      <button type="submit" name="search" class="button">Search</button>
                    </form>
                  </div>

                        </a><br>OUR CARS OVERVIEW </h1>

                        <div>

                                    <ul class="de">
                                    <?php
                                        while($result= mysqli_fetch_array($cars))
                                        {

                                    ?>    
                                    
                                    <li>
                                    <form method="POST">
                                    <div class="box">
                                    <div class="imgBx">
                                            <img src="photos/<?php echo $result['CAR_IMG']?>">
                                        </div>
                                        <div class="content">
                                            <?php $res=$result['CAR_ID'];?>
                                            <h1><?php echo $result['CAR_BRAND']?></h1>
                                            <h2><a><?php echo $result['CAR_NAME']?></a> </h2>
                                            <h2>Fuel Type : <a><?php echo $result['FUEL_TYPE']?></a> </h2>
                                            <h2>Transmission : <a><?php echo $result['TRANSMISSION']?></a> </h2>
                                            <h2>Capacity : <a><?php echo $result['CAPACITY']?></a> </h2><br>
                                            <h2>Description : <a><?php echo $result['DESCRIPTION']?></a> </h2><br>
                                            <h2>Rental Company : <a><?php echo $result['cname']?></a> </h2>
                                            <h2>Rent Per Day : <a>Ksh<?php echo $result['PRICE']?>/-</a></h2>
                                            <button type="submit"  name="booknow" class="button" style="margin-top: 5px;"><a href="bookings.php?id=<?php echo $res;?>">book</a></button>
                                        </div>
                                    </div></form></li>

                                    
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                </div>
            
                
    




    <!--- Script Sousrce Files -->

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <!--- End of Script Source Files -->

  
</body>

</html>
