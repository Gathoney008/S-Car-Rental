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

<body style="background-image: url('IMAGINE\ 2.jpg');" data-spy="scroll" data-target="#navbarResponsive" >
<style>
    body{
        background:black;
    }
    .banner-area {
    margin: 40px auto;
    padding: 10px;
    max-width: 800px;
    text-align: center;
}


    .banner-text {
  color: white;
  padding: 100px;
  align-items: center;
}

.content {
  display: flex;
  justify-content: center;
  align-items: center;
}

.form {
  width: 400px;
  padding: 30px;
  background-color: rgba(255,255,255,0.1);
  border-radius: 10px;
  box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.3);
}

h2 {
  margin-bottom: 20px;
  font-size: 19px;
}
h3{
    font-size: 17px;
}

form input {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: none;
  background-color: rgba(255,255,255,0.2);
  color: white;
  font-size: 18px;
}

form input:focus {
  outline: none;
  background-color: rgba(255,255,255,0.3);
}

.banner-btn {
  background-color: blue;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
}
.banner-btn:hover {
    background-color: black;
  }
.link {
  margin-top: 20px;
  text-align: center;
  font-size: 15px;
}

.link a {
  color: crimson;
  text-decoration: none;
}

.link a:hover {
  text-decoration: underline;
}

</style>

<!--PHP CODE-->
<?php
ob_start();
require_once('connection.php');
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if(empty($email) || empty($pass))
    {
        echo '<script>alert("Please fill in all the fields.")</script>';
    }
    else
    {
        // Check if the email and password match a record in the company table
        $company_query = "SELECT * FROM company WHERE email = '$email' AND password = md5('$pass')";
        $company_result = mysqli_query($con, $company_query);
        $company_row = mysqli_fetch_assoc($company_result);

        if ($company_row)
        {
            // Login is from company table, redirect to company.php
            session_start();
            $_SESSION['email'] = $email;
            header("location: companydash.php");
            exit();
        }
        else
        {
            // Check if the email and password match a record in the users table
            $user_query = "SELECT * FROM users WHERE email = '$email' AND password = md5('$pass')";
            $user_result = mysqli_query($con, $user_query);
            $user_row = mysqli_fetch_assoc($user_result);

            if($user_row)
            {
                // Login is from users table, redirect to cardetails.php
                session_start();
                $_SESSION['email'] = $email;
                header("location: cardetails.php");
                exit();
            }
            else
            {
                echo '<script>alert("Invalid email or password.")</script>';
            }
        }
    }
}
ob_end_flush();
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


        <div class="banner-area">          
            <div class="single-banner">
                <div class="banner-text">
                    <h2>Rent Your Dream Car</h2>
                    <div class="content">
                        <div class="form">
                            <h3>Login Here</h3>
                            <form method="POST"> 
                            <input type="email" name="email" placeholder="Enter Email Here">
                            <input type="password" name="pass" placeholder="Enter Password Here">
                            <input class="banner-btn" type="submit" value="Login" name="login"></input>
                            </form>
                            <p class="link">Don't have an account?<br>
                            <a href="register.php">Sign up</a> here</a></p>
                            <p class="link">Do you offer car rental services?<br>
                            <a href="companyregister.php">Join Us</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!--- Script Source Files -->

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="slick.min.js"></script>
    <script>
        $('.banner-area').slick({
            autoplay: true,
            speed: 300,
            arrows: false,
            dots: true,
            fade: true
        })
    </script>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <!--- End of Script Source Files -->

  
</body>

</html>
