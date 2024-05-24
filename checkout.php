<?php

use function PHPSTORM_META\elementType;

session_start();

if(!empty($_SESSION['cart']) && isset($_POST['checkout'])){
    //let user in

    //sent user to home page
}else{
    header('location: index.php');
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
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                        <a href="account.html"><i class="fas fa-user"></i></a>
                    </li>
                    
                </ul>
               
            </div>
        </div>
    </nav>

    <!--Checkout-->
     <section class="my-5 py-5">
        <div class="container text-center mt-5 pt-5">
            <h2 class="form-weight-bold">Check Out</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="server/place_order.php" method="POST" id="checkout-form">
                <div class="form-group checkout-small-element">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="checkout-name" placeholder="name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="checkout-email" placeholder="Email" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="checkout-phone" placeholder="Phone number" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="city" id="checkout-city" placeholder="City" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">Adress</label>
                    <input type="text" class="form-control" name="adress" id="checkout-adress" placeholder="Adress" required>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total amount: <?php echo $_SESSION['total'] ?></p>
                    <input type="submit" class="btn" name="place_order" id="checkout-btn" value="Place Order">
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