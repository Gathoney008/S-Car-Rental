<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S-CAR RENTALS</title>
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fixed.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body  data-spy="scroll" data-target="#navbarResponsive">

<style>
/*- companyregister.php  Start-*/
.main {
    background-color: black;
    color: white;
    font-family: Arial, sans-serif;
    font-size: 16px;
    padding: 40px;
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
    margin-bottom: 40px;
  }
  
  label {
    display: block;
    font-size: 20px;
    margin-bottom: 10px;
    text-align: left;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="tel"],
  input[type="password"] {
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
    background-color:rgb(220, 20, 60);
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
  
  #letter, #capital, #number, #length {
    display: none;
  }
  
  #psw:focus + #message {
    display: block;
  }
  

/*- companyregister.php  END-*/
</style>
<?php
require_once('connection.php');

// check if the form has been submitted
if(isset($_POST['regs']))
{
    // retrieve the form data and escape any special characters to prevent SQL injection
    $cname=mysqli_real_escape_string($con,$_POST['cname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $lic=mysqli_real_escape_string($con,$_POST['lic']);
    $ph=mysqli_real_escape_string($con,$_POST['ph']);
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
    $Pass=md5($pass);

    // check if any required field is empty
    if(empty($cname)|| empty($email)|| empty($lic)|| empty($ph)|| empty($pass) || empty($cpass))
    {
        echo '<script>alert("please fill the form")</script>';
    }
    else{
        // check if the password and confirm password fields match
        if($pass==$cpass){
            // check if the email already exists in the database
            $sql2="SELECT * FROM company WHERE email='$email'";
            $res=mysqli_query($con,$sql2);
            if(mysqli_num_rows($res)>0){
                echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
                echo '<script> window.location.href = "index.php";</script>';

            }
            else{
                // insert the data into the database
                $sql="INSERT INTO company (cname, email, lic_num, phone_number, password) VALUES('$cname','$email','$lic','$ph','$Pass')";
                $result = mysqli_query($con,$sql);

                // display appropriate message depending on the success of the insertion
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
            echo '<script> window.location.href = "companyregister.php.php";</script>';
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
        <h2>Register Here</h2>
        
        <form id="register" action="companyregister.php" method="POST">    
            <label>Company Name : </label>
            <br>
            <input type ="text" name="cname"
            id="name" placeholder="Enter Your Company Name" required>
            <br><br>

            <label>Email : </label>
            <br>
            <input type="email" name="email"
            id="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex: example@ex.com"placeholder="Enter Valid Email" required>
            <br><br>
            
            <label>Your License number : </label>
            <br>
            <input type="text" name="lic"
            id="name" placeholder="Enter Your License number" required>
            <br><br>

            <label>Phone Number : </label>
            <br>
            <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)"
            id="name" placeholder="Enter Your Phone Number" required>
            <br><br>

            

            <label>Password : </label>
            <br>
            <input type="password" name="pass" maxlength="12"
            id="psw" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <br><br>
            <label>Confirm Password : </label>
            <br>
            <input type="password" name="cpass" 
            id="cpsw" placeholder="Renter the password" required>
            <br><br>
           
            
            <br><br>

            <input type="submit" class="banner-btn"  value="REGISTER" name="regs">
            
        
        
        </input>
            
        </form>
        </div> 
              <div id="message">
                  <h3>Password must contain the following:</h3>
                  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                  <p id="number" class="invalid">A <b>number</b></p>
                  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
          </div>
<script>
var myInput = document.getElementById("psw");
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
 <!--- Script Sousrce Files -->

    
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="slick.min.js"></script>
    
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <!--- End of Script Source Files -->

</body>
</html>