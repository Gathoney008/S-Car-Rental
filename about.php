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
     body{
        background:black;
    }
    .banner-area {
    margin: 50px auto;
    padding: 10px;
    max-width: 800px;
    text-align: center;
}


    .banner-text {
  color: white;
  padding: 100px;
  align-items: center;
}

.banner-btn1 {
  background-color: crimson;
  color: white;
  border: none;
  padding: 9px 19px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;}

.banner-btn1:hover {
    background-color: black;
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
  font-size: 20px;
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
  background-color: crimson;
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
  font-size: 18px;
}

.link a {
  color: crimson;
  text-decoration: none;
}

.link a:hover {
  text-decoration: underline;
}
</style>
<body  data-spy="scroll" data-target="#navbarResponsive">

<body style="background-image: url('IMAGINE\ 2.jpg');"></body>data-spy="scroll" data-target="#navbarResponsive">
    
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
                    <P>
                    <br>Welcome to S-car Rentals! We are a leading online marketplace for car rentals, connecting both individuals and rental companies with those in need of affordable and reliable transportation. 
                    Our mission is to make car rental easy and accessible to everyone, while also supporting the growth of local rental businesses.
                    <br>Our platform also allows rental companies to list their cars for rent, providing them with a convenient way to reach a wider audience and grow their business. We value transparency and strive to maintain the highest standards of trust and integrity in all of our transactions, 
                    ensuring that both renters and rental companies can benefit from our services.
                    <br>Thank you for choosing S-car Rentals, and we look forward to helping you find the perfect car rental for your needs!
                     <br> 
                     <br> 
                     </P>
                     <br>Already a Member? 
                    <div class="banner-btn1"><a href="login.php">Login</a>
                  </div>
                    <p class="link"><a href="register.php">Sign up </a> here </a></p>
                    <p class="link">Do You Offer <a href="companyregister.php">Car Rental Services?</a></p>
                            

                    </div>
                </div>
            </div>
        </div>










 

    


    <!--- Script Source Files -->

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
