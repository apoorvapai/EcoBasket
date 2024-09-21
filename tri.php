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
  <img src="assets/tri.png" height="450" style="width:100%;">
</div>
<div class="text-center text-black">
<br>
                    <h1 class="display-4 fw-bolder">Trichakra</h1>
                </div>

        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-4 row-cols-4 row-cols-md-4 row-cols-xl-4 justify-content-center">
<div class="rowimg">
<div class="columnimg">
<img src="assets/r1.jpg" width="80%;"><br>
Reduce means choosing to use things with care to reduce the amount of waste generated.
<div class="card-footer p-6 pt-2 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="reduce.php">Reduce</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-6  pt-2 border-top-0 bg-transparent">
<div class="columning">
<img src="assets/r2.jpg" width="80%;"><br>
 Reusing involves the repeated use of items or parts of items which still have useable aspects.
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="reusee.php">Reuse</a>

</div>
</div>
</div>
<div class="card-footer p-6 pt-2 border-top-0 bg-transparent">
    <div class="rowing">
<div class="columnimg">
<img src="assets/r3.jpg" width="80%;"><br>
Recycling is when you recover scrap or waste and reprocessing the material into useful products.
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="recycled.php">Recycle</a>

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