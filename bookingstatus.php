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
<style>
 
    /* Set background color to black and text color to white */
    body {
        background-color: black;
        font-family: Arial, sans-serif;
    }

    /* Set font and text color for headings */
    h1 {
        font-size: 24px;
        color: white;
    }

    /* Style form button */
    .btn {
        background-color: crimson;
        border: none;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 20px;
    }

    /* Style box container */
    .box {
        background-color: black;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px white;
        padding: 20px;
        text-align: center;
        margin: 50px auto;
        max-width: 600px;
    }

    /* Style box content */
    .content {
        margin-top: 20px;
    }
    .firstname, .lastname {
  font-size: 15px;
  color: crimson;
  margin-top: 10px;
  text-align: center;
}

@media print {
  .btn {
    display: none;
  }
  
  .btn::before {
    content: "";
  }
}
</style>

</style>
<style type="text/css" media="print">
    .no-print {
        display: none;
    }
</style>
<body  data-spy="scroll" data-target="#navbarResponsive">


<?php
require_once('connection.php');
session_start();
$email = $_SESSION['email'];

$sql = "SELECT * FROM booking WHERE USER_EMAIL='$email' ORDER BY BOOK_ID DESC";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 0){
    echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
    echo '<script>window.location.href = "cardetails.php";</script>';
}
else {
    $sql2 = "SELECT * FROM users WHERE EMAIL='$email'";
    $result2 = mysqli_query($con, $sql2);
    $rows2 = mysqli_fetch_assoc($result2);

    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="cardetails.php">
            <h2>S-CAR RENTALS</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="bookingstatus.php">BOOKINGS</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="cardetails.php">VIEW CARS</a>
                </li>
            </ul>
        </div>
    </nav>
    ';

    while($row = mysqli_fetch_assoc($result)) {
        $car_id = $row['CAR_ID'];
        $sql3 = "SELECT * FROM cars WHERE CAR_ID='$car_id'";
        $result3 = mysqli_query($con, $sql3);
        $rows3 = mysqli_fetch_assoc($result3);

        echo '
        <div class="box" id="box-'.$car_id.'">
                <div class="content">
                <h1>CAR NAME : '.$rows3['CAR_BRAND'].' '.$rows3['CAR_NAME'].'</h1><br>
                <h1>LICENSE PLATE NO : '.$rows3['LICENSE_PLATE'].'</h1><br>
                <h1>COMPANY : '.$rows3['cname'].'</h1><br>
                <h1>DATES : '.$row['BOOK_DATE'].' to '.$row['RETURN_DATE'].'</h1><br>
                <h1>NO OF DAYS : '.$row['DURATION'].'</h1><br>
                <h1>BOOKING STATUS : '.$row['BOOK_STATUS'].'</h1><br><br>
                <h1>PHONE : '.$rows3['company_phone'].'</h1><br>
                <h1>TOTAL AMOUNT : '.$row['PRICE'].'</h1><br>

                <button class="btn print-button" id="print-button-'.$car_id.'" onclick="printBox('.$car_id.')">Print</button>
                </div>
        </div>
        ';
    }
}
?>
<div style="text-align: center;">
    <button class="btn" onclick="window.print()">Print All</button>
</div>

    
        <!--- Script Source Files -->
        <script>
            function printBox(car_id) {
            var box_id = 'box-' + car_id;
            var content = document.getElementById(box_id).innerHTML;
            var printButton = document.getElementById('print-button-' + car_id);
            printButton.style.display = 'none';
            
            var printWindow = window.open('', '', 'height=500,width=800');
            printWindow.document.write('<html><head><title>S-Car Rentals - Bookings</title>');
            printWindow.document.write('<style>.print-button{display:none;}</style>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            printWindow.onload = function() {
                printWindow.print();
                printButton.style.display = 'block';
            };
            }


        </script>
        <script src="jquery-3.3.1.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
  <!--- End of Script Source Files -->
</body>

</html>
