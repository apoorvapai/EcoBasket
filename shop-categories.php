<?php session_start();
include_once('includes/config.php');
error_reporting(0);
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
  <img src="assets/slider4.png" height="450" style="width:100%;">
  <div class="text-block">
    <h4>Shop By Categories</h4>
    <p>		</p>
  </div>
</div>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<?php $query=mysqli_query($con,"select category.id as catid,category.categoryName from category ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?> 

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img src="assets/categoryicon.png"  alt="<?php echo htmlentities($row['categoryName']);?>" width="150" style="display: block;margin-left: auto; margin-right: auto; width: 40%;" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo htmlentities($row['categoryName']);?></h5>
                                    <!-- Product price-->
               
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="categorywise-products.php?cid=<?php echo htmlentities($row['catid']);?>">View</a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
     
    

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
