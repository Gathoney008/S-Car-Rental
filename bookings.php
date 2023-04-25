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
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
</head>

<body  data-spy="scroll" data-target="#navbarResponsive">

<style>
/* Set background color to black and text color to white */
body {
  background-color: black;
  color: white;
}
h2 {
  font-family: Arial, sans-serif;
  
}

/* Style form inputs and labels */
input[type="text"],
input[type="tel"],
input[type="date"],
input[type="number"],
label {
  display: block;
  font-family: Arial, sans-serif;
  font-size: 16px;
  margin-bottom: 10px;
  color: crimson;
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  border: 2px solid crimson;
  border-radius: 4px;
}

/* Style form submit button */
.btnn {
  background-color: crimson;
  border: none;
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}

/* Style form container */
.main {
  display: flex;
  justify-content: center;
  align-items: center;
  height:;
}

/* Style registration form */
.register {
  background-color: black;
  border-radius: 10px;
  box-shadow: 0px 0px 10px 0px white;
  padding: 20px;
  text-align: center;
}


</style>
<?php 

    require_once('connection.php');
    session_start();
 
    $carid=$_GET['id'];
    
    $sql="select *from cars where CAR_ID='$carid'";
    $cname = mysqli_query($con,$sql);
    $email = mysqli_fetch_assoc($cname);
    
    $value = $_SESSION['email'];
    $sql="select * from users where EMAIL='$value'";
    $name = mysqli_query($con,$sql);
    $rows=mysqli_fetch_assoc($name);
    $uemail=$rows['EMAIL'];
    $carprice=$email['PRICE'];
    if(isset($_POST['book'])){
       
        $bplace=mysqli_real_escape_string($con,$_POST['place']);
        $bdate=date('Y-m-d',strtotime($_POST['date']));;
        $dur=mysqli_real_escape_string($con,$_POST['dur']);
        $phno = $rows['PHONE_NUMBER'];
        $des=mysqli_real_escape_string($con,$_POST['des']);
        $rdate=date('Y-m-d',strtotime($_POST['rdate']));
         
        if(empty($bplace)|| empty($bdate)|| empty($dur)|| empty($phno)|| empty($des)|| empty($rdate)){
            echo '<script>alert("please fill all fields")</script>';

        }
        else{
            if($bdate<$rdate){
            $price=($dur*$carprice);
            $sql="insert into booking (CAR_ID,USER_EMAIL,BOOK_PLACE,BOOK_DATE,DURATION,PHONE_NUMBER,DESTINATION,PRICE,RETURN_DATE) values($carid,'$uemail','$bplace','$bdate',$dur,$phno,'$des',$price,'$rdate')";
            $result = mysqli_query($con,$sql);
            
            if($result){
                
                $_SESSION['email'] =$uemail;
                header("Location: payment.php");
            }
            else{
                echo '<script>alert("please check the connection")</script>';
            }
        }
        else{
            echo  '<script>alert("please enter a correct return date")</script>';
        }
    
        }
    }
    
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
                    <a class="nav-link"  href="cardetails.php">HOME</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="bookingstatus.php">BOOKINGS</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="index.php">LOG OUT</a>
                </li>
                <li>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main"> 
        
        <div class="register">
            <h2>BOOKING</h2>
        <form id="register" method="POST"  >
            <h2>VEHICLE: <?php echo "".$email['CAR_NAME']?></h2>
            <label>BOOKING PLACE : </label>
            <br>
            <input type="text" name="place"
            id="name" placeholder="Where are you booking from?">
            <br><br>

            <label>BOOKING DATE : </label>
            <br>
            <input type ="date" name="date"
            id="datefield" min='1899-01-01' max='2000-13-13'  placeholder="ENTER THE DATE FOR BOOKING">
            <br><br>

            <label>DURATION : </label>
            <br>
            <input type ="number" name="dur" min="1" max="30" 
            id="duration" placeholder="Enter Rent Period (in days)">
            <br><br>

            <label>PHONE NUMBER : </label>
            <br>
            <input type="tel" name="ph" maxlength="10"
            id="name" placeholder="Enter Your Phone Number">
            <br><br>
            
            <label>DESTINATION : </label>
            <br>
            <input type="text" name="des"
            id="name" placeholder="Enter Your Destination">
            <br><br>

            <label>Return date : </label>
            <br>
            <input type ="date" name="rdate"
            id="returnDate"  min='1899-01-01' placeholder="Enter The Return Date">
            <br><br>
            <input type="submit"  class="btnn" value="BOOK" name="book" >
            
        </form>
        </div>
    
    
        <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("min", today);
        document.getElementById("returnDate").setAttribute("min", today);

          // add event listener to duration input field
        document.getElementById("duration").addEventListener("input", function() {
        var startDate = new Date(document.getElementById("datefield").value);
        var duration = document.getElementById("duration").value;
        var returnDate = new Date(startDate.getTime() + (duration * 24 * 60 * 60 * 1000));
        var dd = returnDate.getDate();
        var mm = returnDate.getMonth() + 1; //January is 0!
        var yyyy = returnDate.getFullYear();
        if (dd < 10) {
        dd = '0' + dd
        }
        if (mm < 10) {
        mm = '0' + mm
        }
        var formattedReturnDate = yyyy + '-' + mm + '-' + dd;
        document.getElementById("returnDate").value = formattedReturnDate;
        document.getElementById("returnDate").setAttribute("min", formattedReturnDate);
        });
        </script>

    <!--- Script Sousrce Files -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <!--- End of Script Source Files -->
    
</body>

</html>