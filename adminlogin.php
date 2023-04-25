<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S-CAR RENTALS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="forms.css">
    <link rel="stylesheet" href="registration.css">
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
    
        /*- adminlogin.php  Start-*/
        body {
        background-color: black;
      }
.banner-text {
  color: white;
  padding: 100px 0;
}
.content {
  display: flex;
  justify-content: center;
  align-items: center;
  
}
            
  .form {
    background-color: black;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    padding: 40px;
    width: 400px;
  }
  
  .h {
    background-color: white;
    border: none;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    margin: 10px 0;
    padding: 10px;
    width: 100%;
  }
  
  .btnn {
    background-color: crimson;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    margin: 10px 0;
    padding: 10px;
    transition: all 0.3s ease;
    width: 100%;
  }
  
  .btnn:hover {
    background-color: black;
  }
  
  h2 {
    margin-bottom: 20px;
    text-align: center;
  }
  
  
  
  

/*- adminloginphp  END-*/
</style>


<!--PHP CODE-->

<?php
    ob_start();
    require_once('connection.php');
    if(isset($_POST['adlog'])){
        $email=$_POST['ademail'];
        $pass=$_POST['adpass'];
        
        if(empty($email)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }
        else{
            $query="select *from admin where ADMIN_EMAIL='$email'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['ADMIN_PASSWORD'];
                $pass_md5 = md5($pass); 
                if($pass_md5  == $db_password)
                {
                    session_start();
                    $_SESSION['ADMIN_EMAIL'] = $email;
                    header("location: admindash.php");
                    exit;
                    
                }
                else{
                    echo '<script>alert("INCORRECT PASSWORD")</script>';
                }
            }
            else{
                echo '<script>alert("INCORRECT EMAIL")</script>';
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
           
                        <div class="banner-text">
                            <h2>SYS ADMIN LOGIN</h2>
                            <div class="content">
                                    
                                            <form class="form" method="POST">
                                                
                                                <input class="h" type="text" name="ademail" placeholder="Enter admin email">
                                                <input class="h" type="password" name="adpass" placeholder="Enter admin password">
                                                <input type="submit" class="btnn" value="LOGIN" name="adlog" >
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    
   
    <!--- Script Source Files -->

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
 <!--- End of Script Source Files -->

  
</body>

</html>
