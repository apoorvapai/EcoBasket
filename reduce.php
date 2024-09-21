<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$bookingno= mt_rand(100000000,999999999);
$userid=$_SESSION['id'];
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$phoneno=$_POST['phoneno'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$date=$_POST['date'];
if(strlen($_SESSION['id'])==0){   
echo "<script>alert('Login is required to Book');</script>";
} else{
$query=mysqli_query($con,"insert into bookings(bookingno,userid,name,emailid,phoneno,address,city,state,pincode,appdate) values('$bookingno','$userid','$name','$email','$phoneno','$address','$city','$state','$pincode','$date')");
if($query)
{
    echo "<script>alert('Booking Successful');</script>";
echo "<script>window.location.href='my-bookings.php'</script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
}}}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eco Basket</title>
        
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
       <!--  <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
    </head>
            
<style type="text/css"></style>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
<br>

        <img src="assets/slider3.png" style="width:70%;">

<br>

                
<div class="text-center text-black">
                    <h6 class="display-6 fw-bolder">Reduce</h6>
<p>Reduce your waste by sending us to recycle for a better tommorow</p>
                 </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4  mt-5">
<h6>Book now and we will pick your trash from your door step.<h6>
<br>
<form method="post" name="book">
     <div class="row">
         <div class="col-2">Name</div>
         <div class="col-6"><input type="text" name="fullname" class="form-control" required ></div>
     </div>
       <div class="row mt-3">
         <div class="col-2">Email Id</div>
         <div class="col-6"><input type="email" name="emailid" id="emailid" class="form-control" required>
         </div>
          
     </div>

       <div class="row mt-3">
         <div class="col-2">Contact Number</div>
         <div class="col-6"><input type="text" name="phoneno" pattern="[0-9]{10}" title="10 numeric characters only" class="form-control" required></div>
     </div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Date</div>
<div class="col-6"><input type="date"  name="date" class="form-control"  title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>" required></div>
</div>


          <div class="row mt-3">
         <div class="col-2">Address</div>
         <div class="col-6"><input type="text" name="address" class="form-control" required></div>
     </div>


<div class="row mt-3">
         <div class="col-2">City</div>
         <div class="col-6"><input type="text" name="city" class="form-control" required></div>
     </div>
<div class="row mt-3">
         <div class="col-2">State</div>
         <div class="col-6"><input type="text" name="state" class="form-control" required></div>
     </div>
<div class="row mt-3">
         <div class="col-2">Pincode</div>
         <div class="col-6"><input type="text" name="pincode" class="form-control" required></div>
     </div>
<br><br>
               <div class="row mt-3">
                 <div class="col-4">&nbsp;</div>
         <div class="col-6"><input type="submit" name="submit" id="submit" class="btn btn-primary" required></div>
     </div>
<br>
<br>
<h5>Know where the waste goes<br><a href="organization.php">Click Here</a></h5>
 </form>
              
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
