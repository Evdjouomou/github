<?php

session_start();
 
include("server/connection.php");


if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
}

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email=? AND user_password=? ");

    $stmt->bind_param('ss', $email, $password);

    if($stmt->execute()){
        $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
        $stmt->store_result();

        if($stmt->num_rows() == 1){
            $stmt->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_password'] = $user_password;
            $_SESSION['logged_in'] = true;

            header('location: account.php?login=logged in successfully');

        }else{
            header('location: login.php?error=could not verify your account');
        }
    }else{
        //error
        header('location: login.php?error=something went wrong');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>evariste | projet-ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
     crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white bg-body-tertiary py-3 fixed-top">
        <div class="container">
            <img class="logo" src="assets/imgs/logo.jpg" class="logo" alt="logo">
            <h2 class="brand">Orange</h2>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.html">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <i class="fas fa-shopping-cart"></i>
                        <i class="fas fa-user"></i>
                    </li>
                    
                </ul>
               
            </div>
        </div>
    </nav>


    <!--login-->
    <section class="my-5 py-5">
        <div class="container text-center mt-5 pt-5">
            <h2 class="form-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="login.php" id="login-form" method="POST">
                <p style="color: red;" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="login-email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id="login-passwprd" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" name="login_btn" id="login-btn" value="Login">
                </div>
                <div class="form-group">
                    Don't have account? <a href="register.php" id="register-url" class="btn">Register</a>
                </div>
            </form>
        </div>
    </section>

    <!--footer-->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img class="logo" src="assets/imgs/logo.jpg" class="logo" alt="logo">
                <p class="pt-3">We provice the best products for the most affordable prices</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Feature</h5>
                <ul class="text-uppercase">
                    <li><a href="#">men</a></li>
                    <li><a href="#">women</a></li>
                    <li><a href="#">boys</a></li>
                    <li><a href="#">girls</a></li>
                    <li><a href="#">new arrivals</a></li>
                    <li><a href="#">clothes</a></li>
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Adress</h6>
                    <p>1234 Street Name, City</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p>123 235 456 6787</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>info@gmail.com</p>
                </div>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                    <img src="assets/imgs/instagram.jpg" alt="insta" class="img-fluid w-25 f-100 m-2">
                    <img src="assets/imgs/instagram.jpg" alt="insta" class="img-fluid w-25 f-100 m-2">
                    <img src="assets/imgs/instagram.jpg" alt="insta" class="img-fluid w-25 f-100 m-2">
                    <img src="assets/imgs/instagram.jpg" alt="insta" class="img-fluid w-25 f-100 m-2">
                    <img src="assets/imgs/instagram.jpg" alt="insta" class="img-fluid w-25 f-100 m-2">
                </div>
            </div>
        </div>

        <div class="copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <img src="assets/imgs/payment.jpg" alt="payment"> 
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-2">
                    <p>eCommerce @ 2024 All Right Reserved</p>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
</body>
</html>