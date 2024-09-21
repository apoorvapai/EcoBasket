<?php session_start();
error_reporting(0);
include_once('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eco Basket </title>
        
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
       <!--  <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
<style>
.container {
  position: relative;
  font-family: Arial;
}

.text-block {
  position: absolute;
  bottom: 20px;
  left: 20px;
  background-color: black;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}
</style>
    </head>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <div class="container">
  

        </header>
        <!-- Section-->
<br>
<br>
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
<img class="card-img-top" src="assets/pro.png" />
        <h5 class="card-title">		</h5>
        
        <div class="text-center"><a href="my-profile.php" class="btn btn-outline-dark mt-auto">My Profile</a></div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
<img class="card-img-top" src="assets/add.png" />
        <h5 class="card-title">		</h5>
        <div class="text-center"><a href="manage-addresses.php" class="btn btn-outline-dark mt-auto">My Address</a></div>
      </div>
    </div>
  </div>
<div class="col-sm-4">
    <div class="card">
      <div class="card-body">
<img class="card-img-top" src="assets/pass.png" />
        <h5 class="card-title">		</h5>
        <div class="text-center"><a href="change-password.php" class="btn btn-outline-dark mt-auto">My Password</a></div>
      </div>
    </div>
  </div>
</div>

<br>
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
<img class="card-img-top" src="assets/wish.png" />
        <h5 class="card-title">		</h5>
        
        <div class="text-center"><a href="my-wishlist.php" class="btn btn-outline-dark mt-auto">My Wishlist</a></div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
<img class="card-img-top" src="assets/order.png" />
        <h5 class="card-title">		</h5>
        <div class="text-center"><a href="my-orders.php" class="btn btn-outline-dark mt-auto">My Orders</a></div>
      </div>
    </div>
  </div>
<div class="col-sm-4">
    <div class="card">
      <div class="card-body">
<img class="card-img-top" src="assets/book.png" />
        <h5 class="card-title">		</h5>
        <div class="text-center"><a href="my-bookings.php" class="btn btn-outline-dark mt-auto">My Bookings</a></div>
      </div>
    </div>
  </div>
</div>
</section>
        <!-- Footer-->
   
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
