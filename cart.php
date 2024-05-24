<?php

include("server/connection.php");
session_start();
if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart'])){

        $product_array_ids = array_column($_SESSION['cart'],"product_id");
        if(!in_array($_POST['product_id'], $product_array_ids)){

           $product_id = $_POST['product_id'];

            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name'=> $_POST['product_name'],
                'product_price'=> $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity'=> $_POST['product_quantity']
            );

            $_SESSION['cart'][$product_id] = $product_array;

        }else{
            echo"<script>alert('product was already to cart')</script>";
            //echo"<script>window.location='index.php'</script>";
        }

    }else{

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'porduct_id' => $product_id,
            'porduct_name'=> $product_name,
            'porduct_price'=> $product_price,
            'porduct_image' => $product_image,
            'porduct_quantity'=> $product_quantity
        );

        $_SESSION['cart'][$product_id] = $product_array;

    }
    //calculatTotal
    calculateTotalCarl();


//remove product from cart
}elseif(isset($_POST['remove_product'])){

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    //calculate
    calculateTotalCarl();

}else if(isset($_POST['edit_quantity'])){

    //we get id and quantity from the form
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    

    //get the product array from the session
    $product_array = $_SESSION['cart'][$product_id];

    //update product quantity
    $product_array['product_quantity']= $product_quantity;

    //return array back it place
    $_SESSION['cart'][$product_id] = $product_array;

    //calculate
    calculateTotalCarl();
}else{
    //header('location: index.php');
}

function calculateTotalCarl(){
    $total = 0;
    foreach($_SESSION['cart'] as $key => $value){
        $product = $_SESSION['cart'][$key];

        $price = $product['product_price'];
        $quantity = $product['product_quantity'];

        $total = $total + ($price * $quantity);
    }

    $_SESSION['total'] = $total; 
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
    <style>
        .cart .product-info .remove_btn{
            color: #fb774b;
            text-decoration: none;
            font-size: 15px;
            background-color: white;
            border: none;
            width: 100%;
        }
        .cart .edit-btn{
            border: none;
            background-color: #fff;
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
                        <a class="nav-link" href="index.php">Home</a>
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

    <!--Cart-->
    <section class="cart container my-5 py-5">
        <div class="container my-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
    
            <?php foreach($_SESSION['cart'] as $key=> $value){?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image']; ?>" alt="tof">
                        <div>
                            <p><?php echo $value['product_name'] ?></p>
                            <small><span>$</span><?php echo $value['product_price']; ?></small>
                            <br>
                            <form method="post" action="cart.php">
                                <input type="hidden" value="<?php echo $value['product_id']; ?>" class="remove_btn" name="product_id" >
                                <input type="submit" value="remove" class="remove_btn" name="remove_product" >
                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    
                    <form action="cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                        <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'] ?>">
                        <input type="submit" value="edit" class="edit-btn" name="edit_quantity">
                    </form>
                </td>
                <td>
                    <span>$</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price'] ?></span>
                </td>
            </tr>
           
            <?php }?>
        </table>

        <div class="cart-total">
            <table>
                <!--<tr>
                    <td>Subtotal</td>
                    <td>$155</td>
                </tr>-->
                <tr>
                    <td>Total</td>
                    <td>$ <?php echo $_SESSION['total'];?></td>
                </tr>
            </table>
        </div>
        <div class="checkout-container">
            <form action="checkout.php" method="POST">
                <input type="submit" value="Checkout" name="checkout" class="btn checkout-btn">
            </form>
            
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