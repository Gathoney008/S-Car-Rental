<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S-CAR Rentals</title>
    <link rel="stylesheet" href="slick.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fixed.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
    
    <body  data-spy="scroll" data-target="#navbarResponsive">
    <style>
.main {
  background-color: black;
  color: white;
  font-family: Arial, sans-serif;
  font-size: 16px;
}

.register {
  margin: auto;
  max-width: 500px;
  text-align: center;
  margin: 30px auto;
  padding: 60px;
}

h2 {
  font-size: 32px;
  margin-bottom: 10px;
}

label {
  display: block;
  font-size: 20px;
  margin-top: 60px;
  text-align: left;
}
input[type="email"],
input[type="text"],
input[type="number"],
input[type="tel"],
input[type="password"],
input[type="gender"] {
  background-color: #1c1c1c;
  border: none;
  border-radius: 5px;
  color: white;
  font-size: 16px;
  padding: 10px;
  margin-bottom: 20px;
  width: 100%;
}

input[type="submit"] {
  background-color: crimson;
  border: none;
  border-radius: 5px;
  color: white;
  cursor: pointer;
  font-size: 20px;
  margin-top: 20px;
  padding: 10px 30px;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: black;
}

#message {
  display: none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message h3 {
  margin-top: 0;
}

#message p {
  margin: 10px 0 0 0;
}

.invalid {
  color: #ff0000;
}

.valid {
  color: #00ff00;
}

#letter,
#capital,
#number,
#length {
  display: none;
}

#psw:focus + #message {
  display: block;
}

body {
  background-color: black;
  color: white;
}
.banner-btn {
  background-color: crimson;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
}
  


    </style>


<!--PHP CODE-->


<?php

require_once('connection.php');
if(isset($_POST['regs']))
{
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $lic=mysqli_real_escape_string($con,$_POST['lic']);
    $ph=mysqli_real_escape_string($con,$_POST['ph']);
   
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $Pass=md5($pass);
    if(empty($fname)|| empty($lname)|| empty($email)|| empty($lic)|| empty($ph)|| empty($pass) || empty($gender))
    {
        echo '<script>alert("please fill all fields")</script>';
    }
    else{
        if($pass==$cpass){
        $sql2="SELECT *from users where EMAIL='$email'";
        $res=mysqli_query($con,$sql2);
        if(mysqli_num_rows($res)>0){
            echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
            echo '<script> window.location.href = "index.php";</script>';

        }
        else{
        $sql="insert into users (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD,GENDER) values('$fname','$lname','$email','$lic',$ph,'$Pass','$gender')";
        $result = mysqli_query($con,$sql);
        if($result){
            echo '<script>alert("Registration Successful Press ok to login")</script>';
            echo '<script> window.location.href = "index.php";</script>';       
           }
        else{
            echo '<script>alert("please check the connection")</script>';
        }
    
        }

        }
        else{
            echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
            echo '<script> window.location.href = "register.php";</script>';
        }
    }
}


?>





<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="index.php">
            <h2>S-CAR RENTALS</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="about.php">ABOUT US</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="contact.php">CONTACT</a>
                </li>
                <li  class="nav-item">
                    <a class="nav-link"  href="adminlogin.php">SYSTEM ADMIN</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main">
        
        <div class="register">
                <form method="POST" action="register.php">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" required>

                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="lic">License Number:</label>
                    <input type="text" id="lic" name="lic" required>

                    <label for="ph">Phone Number:</label>
                    <input type="tel" id="ph" name="ph" required>

                    <label for="pass">Password:</label>
                    <input type="password" id="pass" name="pass" required>

                    <label for="cpass">Confirm Password:</label>
                    <input type="password" id="cpass" name="cpass" required>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">--Select--</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                    <br><br>
                  <input type="submit" class="banner-btn" name="regs" value="Register"></input>
                </form>

        </div>
</div>
<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<script>
var myInput = document.getElementById("pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>  
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>

              <!--- Script Source Files -->
              <script src="jquery-3.3.1.min.js"></script>
              <script src="bootstrap.min.js"></script>
              <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
  <!--- End of Script Source Files -->
</body>

</html>
