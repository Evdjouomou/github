<?php 

session_start();
include("server/connection.php");


if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;
}


if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location: login.php');
        exit;
    }
}


if(isset($_POST['change_password'])){
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];

    //if passwords dont match
    if($password !== $confirm_password){
        header('location: account.php?error=passwords dont match');
    }

    //if password is less than 8 chars
    elseif(strlen($password) < 8){
        header('location: account.php?error=passwords must be at least 8 charachters');
    
    //no errors
    }else{
        $stmt=$conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss', md5($password), $user_email);

        if($stmt->execute()){
            header('location: account.php?message=password has been update successfully');
        }else{
            header('location: account.php?error=could not update password');
        }
    }
}


//get orders
if(isset($_SESSION['logged_in'])){

    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM orders where user_id=?");

    $stmt->bind_param('i', $user_id);

    $stmt->execute();

    $orders = $stmt->get_result();//[]

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


    <!--Account-->
    <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
            <p style="color: green; font-weight:bold;"><?php if(isset($_GET['register'])){echo $_GET['register'];}?></p>
            <p style="color: green; font-weight:bold;"><?php if(isset($_GET['login'])){echo $_GET['login'];}?></p>
                <h3 class="font-weight-bold">Account info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name:  <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?></span></p>
                    <p>Email:  <span><?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} ?></span></p>
                    <p><a href="#orders" id="order-btn">Your orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p> 
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="account.php" id="account-form" method="POST">
                <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p> 
                <p style="color: green; font-weight:bold;"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></p>
                    <h3>Change Password</h3>
                    <hr>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="account-password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="account-password-confirm" placeholder="confrim password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="change_password" value="Change Password" class="btn" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!--Orders-->
    <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Orders</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5 mx-auto">
            <tr>
                <th>Order id</th>
                <th>Order cost</th>
                <th>Order statut</th>
                <th>Order Date</th>
                <th>Order info</th>
            </tr>

            <?php while($row=$orders->fetch_assoc()){ ?>
            <tr>
                <td>
                    <!-- <div class="product-info">
                        <img src="assets/imgs/imge.jpg">
                        <div>
                            <p class="mt-3"><?php echo $row['order_id']; ?>
                        </div>
                    </div> -->
                    <span><?php echo $row['order_id']; ?></span>
                </td>
                <td>
                    <span><?php echo $row['order_cost']; ?></span>
                </td>
                <td>
                    <span><?php echo $row['order_statut']; ?></span>
                </td>
                <td>
                    <span><?php echo $row['order_date']; ?></span>
                </td>
                <td>
                    <form action="order_details.php" method="POST">
                    <input type="hidden" value="<?php echo $row['order_statut']; ?>" name="order_status">
                        <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id">
                        <input type="submit" class="btn order-details-btn" value="detail" name="order_details_btn">
                    </form>
                </td>
               
            </tr>
            <?php }?>
        </table>

        
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