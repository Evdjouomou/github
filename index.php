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
                        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                        <a href="account.html"><i class="fas fa-user"></i></a>
                    </li>
                    
                </ul>
               
            </div>
        </div>
    </nav>

    <!--Home-->
    <section id="home">
        <div class="container">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices</span> This Season</h1>
            <p>Eshop offers the best products for the most affordable prices</p>
            <button>Shop Now</button>
        </div>
    </section>

    <!--Brand-->
    <section id="brand" class="container">
        <div class="row">
            <img class="img-fluid col-lg-2 col-md-5 col-sm-12" src="assets/imgs/Samsung.png">
            <img class="img-fluid col-lg-2 col-md-5 col-sm-12" src="assets/imgs/iphone.png">
            <img class="img-fluid col-lg-2 col-md-5 col-sm-12" src="assets/imgs/huawei.png">
            <img class="img-fluid col-lg-2 col-md-5 col-sm-12" src="assets/imgs/xiaomi.jpg">
            <img class="img-fluid col-lg-2 col-md-5 col-sm-12" src="assets/imgs/lenovo.png">
            <img class="img-fluid col-lg-2 col-md-5 col-sm-12" src="assets/imgs/lg.jpg"> 
        </div>
    </section>
    <!--New-->
    <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!--one-->
            <div class="one col-lg-4 col-md-12 col-sm-12 ">
                <img class="img-fluid" src="assets/imgs/phone.jpg">
                <div class="details">
                    <h3>Awesome Phones</h3>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div> 
            <!--two-->
            <div class="one col-lg-4 col-md-12 col-sm-12 ">
                <img class="img-fluid" src="assets/imgs/phone.jpg">
                <div class="details">
                    <h3>Awesome Phones</h3>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div> 
            <!--three-->
            <div class="one col-lg-4 col-md-12 col-sm-12 ">
                <img class="img-fluid" src="assets/imgs/photo.jpg">
                <div class="details">
                    <h3>Awesome Phones</h3>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div> 
        </div>
    </section>

    <!--Featured-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our featured</h3>
            <hr>
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">

            <?php include("server/get_fetured_products.php"); ?>

            <?php while($row= $featured_products->fetch_assoc()){ ?>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="<?php $row['product_image'] ?>" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'] ?></h4> 
                <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>

            <?php } ?>
        </div>
    </section>

    <!--Banner-->
    <section id="banner">
        <div class="container">
            <h4>MID SEASON SALE</h4>
            <h1>Autunn Collection <br> Up to 30% off</h1>
            <button class="buy-btn">Buy Now</button>
        </div>
    </section>

    <!--Clothers-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our featured</h3>
            <hr>
            <p>Here you can check out our featured products</p>
        </div>
        <?php include("server/get_coats.php"); ?>

        <?php while($row= $featured_products->fetch_assoc()){ ?>

        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="<?php echo $row['product_image'] ?>" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-namr"><?php echo $row['product_name'] ?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'] ?></h4> 
                <a href="single_product.php"><button class="buy-btn">Buy Now</button></a>
            </div>
           
            <?php } ?>
        </div>
    </section> 
    
    <!--watch-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our featured</h3>
            <hr>
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-namr">Apple phone</h5>
                <h4 class="p-price">$160.0</h4> 
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-namr">Apple phone</h5>
                <h4 class="p-price">$160.0</h4> 
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-namr">Apple phone</h5>
                <h4 class="p-price">$160.0</h4> 
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-namr">Apple phone</h5>
                <h4 class="p-price">$160.0</h4> 
                <button class="buy-btn">Buy Now</button>
            </div>
        </div>
    </section>

    <!--shoes-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our featured</h3>
            <hr>
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-namr">Apple phone</h5>
                <h4 class="p-price">$160.0</h4> 
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-namr">Apple phone</h5>
                <h4 class="p-price">$160.0</h4> 
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-namr">Apple phone</h5>
                <h4 class="p-price">$160.0</h4> 
                <button class="buy-btn">Buy Now</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb3" src="" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-namr">Apple phone</h5>
                <h4 class="p-price">$160.0</h4> 
                <button class="buy-btn">Buy Now</button>
            </div>
        </div>
    </section>

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