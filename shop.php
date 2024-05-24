<?php 


include('server/connection.php');

$stmt = $conn->prepare("SELECT * FROM products");


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
    <style>
        .produit img{
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }
        .pagination{
            color: coral;
        }
        .pagination li:hover a{
            color: white;
            background-color: coral;
        }
    </style>
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
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                        <a href="account.php"><i class="fas fa-user"></i></a>
                    </li>
                    
                </ul>
               
            </div>
        </div>
    </nav>


    <section style="float: left;" class="my-5 py-5 ms-2">

        <div class="container mt-5 py-5">
            <p>Search Products</p>
            <hr>
        </div>

        <form action="">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <p>Catrgory</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category_one" checked>
                        <label for="fleRadioDefault1" class="form-check-label">Coats</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category_two" checked>
                        <label for="fleRadioDefault1" class="form-check-label">Shoes</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category_two" checked>
                        <label for="fleRadioDefault1" class="form-check-label">Watches</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="category_two" checked>
                        <label for="fleRadioDefault1" class="form-check-label">Bags</label>
                    </div>
                </div>
            </div>

            <div class="row mx-auto container mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input type="range" class="form-range w-50" name="" min="1" max="1000" id="custonRange2">
                    <div class="w-50">
                        <span style="float: left;">1</span>
                        <span style="float: right;">1000</span>
                    </div>
                </div>
            </div>
            
            <div class="form-group my-3 mx-3">
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>
        </form>

    </section>

    <section id="featured" class="my-5 py-5">
        <div class="container mt-5 py-5">
            <h3>Our Products</h3>
            <hr>
            <p>Here you can check out our featured products</p>
        </div>

        <div class="row mx-auto container">
            <div onclick="window.location.href='single_product.html'" class="product text-center col-lg-3 col-md-4 col-sm-12">
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
            <nav aria-label="page navigation example">
                <ul class="pagination nt-5"> 
                    <li class="page-item"><a href="#" class="page-link" >Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link" >1</a></li>
                    <li class="page-item"><a href="#" class="page-link" >2</a></li>
                    <li class="page-item"><a href="#" class="page-link" >3</a></li>
                    <li class="page-item"><a href="#" class="page-link" >Next</a></li>
                </ul>
            </nav>
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