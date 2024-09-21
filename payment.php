<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
if($_SESSION['address']==0):
    echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
endif;    



//Order details
if(isset($_POST['submit']))
{
$orderno= mt_rand(100000000,999999999);
$userid=$_SESSION['id'];
$address=$_SESSION['address'];
$totalamount=$_SESSION['gtotal'];
$txntype=$_POST['paymenttype'];
$d=strtotime("10:30pm next Thursday");
$query=mysqli_query($con,"insert into orders(orderNumber,userId,addressId,totalAmount,txnType) values('$orderno','$userid','$address','$totalamount','$txntype')");
if($query)
{

$sql="insert into ordersdetails (userId,productId,quantity) select userID,productId,productQty from cart where userID='$userid';";
$sql.="update ordersdetails set orderNumber='$orderno' where userId='$userid' and orderNumber is null;";
$sql.="delete from  cart where userID='$userid'";
$result = mysqli_multi_query($con, $sql);
if ($query) {
unset($_SESSION['address']);
unset($_SESSION['gtotal']);    
echo '<script>alert("Your order successfully placed. Order number is "+"'.$orderno.'"+" Will deliver to you by "+"'.date("d-m-Y",$d).'")</script>';
    echo "<script type='text/javascript'> document.location ='my-orders.php'; </script>";
} } else{
echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script type='text/javascript'> document.location ='payment.php'; </script>";
} }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eco Basket| Payment</title>
        
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
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
<style type="text/css"></style>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <div class="container">
  <img src="assets/slider6.png" height="450" style="width:100%;">
  <div class="text-block">
    <h4>Payment</h4>
    <p>     </p>
  </div>
</div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4  mt-5">
     

<form method="post" name="signup">
     <div class="row">
         <div class="col-2">Total Payment</div>
         <div class="col-6"><input type="text" name="totalamount" value="<?php echo  $_SESSION['gtotal'];?>" class="form-control" readonly ></div>
     </div>
       <div class="row mt-3">
         <div class="col-2">Payment Type</div>
         <div class="col-6">

            <select class="form-control" name="paymenttype" id="paymenttype" required>
                <option value="">Select</option>
                
                <option value="Debit/Credit Card">Debit/Credit Card</option>
                <option value="Cash on Delivery">Cash on Delivery (COD)</option>
            </select>
         </div>
          
     </div>

      <div class="row mt-3" id="txnno">
	<div class="col-2">Card Number</div>
	<div class="col-6"><input type="text" name="cardno" id="cardno" pattern="[0-9]{16}" title="16 numeric characters only" class="form-control"></div>
     </div>

<div class="row mt-3" id="txnn">
	<div class="col-2">Card Name</div>
	<div class="col-6"><input type="text" name="cardname" id="cardname" pattern="[A-Za-z]{7}" title="Alphabetic characters only" class="form-control"></div>
     </div>

<div class="row mt-3" id="expm">
	<div class="col-2">Month of Expiry</div>
	<div class="col-6">
<select class="form-control" name="expm" id="expm">
                <option value="">Select</option>
                
                <option value="Jan">January</option>
                <option value="Feb">February</option>
			<option value="Mar">March</option>
			<option value="Apr">April</option>
			<option value="may">May</option>
			<option value="Jub">June</option>
			<option value="Jul">July</option>
			<option value="aug">August</option>
			<option value="sep">September</option>
			<option value="oct">October</option>
			<option value="now">November</option>
			<option value="dec">December</option>
            </select>
</div>
     </div>

<div class="row mt-3" id="expy">
	<div class="col-2">Year of Expiry</div>
	<div class="col-6">
<select class="form-control" name="expy" id="expy" >
                <option value="">Select</option>
                
                <option value="22">2022</option>
                <option value="23">2023</option>
			<option value="24">2024</option>
			<option value="25">2025</option>
                 <option value="26">2026</option>
                <option value="27">2027</option>
			<option value="28">2028</option>
			<option value="29">2029</option>
                  <option value="30">2030</option>
            </select>
</div>
     </div>

<div class="row mt-3" id="cvv">
	<div class="col-2">Cvv</div>
	<div class="col-6"><input type="password" name="cvv" id="cvv" pattern="[0-9]{3}" title="3 numeric characters only" class="form-control"></div>
     </div>


               <div class="row mt-3">
                 <div class="col-4">&nbsp;</div>
         <div class="col-6"><input type="submit" name="submit" id="submit" class="btn btn-primary" required></div>
     </div>
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
<script type="text/javascript">

  //For report file
  $('#txnno').hide();
  $('#txnn').hide();
  $('#expm').hide();
  $('#expy').hide();
  $('#cvv').hide();

  $(document).ready(function(){
  $('#paymenttype').change(function(){
  if($('#paymenttype').val()=='Cash on Delivery')
  {
  $('#txnno').hide();
  $('#txnn').hide();
  $('#expm').hide();
  $('#expy').hide();
  $('#cvv').hide();

  } else if($('#paymenttype').val()==''){
      $('#txnno').hide();
      $('#txnn').hide();
      $('#expm').hide();
      $('#expy').hide();
      $('#cvv').hide();

  } else{
    $('#txnno').show();
    $('#txnn').show();
    $('#expm').show();
    $('#expy').show();
    $('#cvv').show();
    jQuery("#cardno").prop('required',true);
    jQuery("#cardname").prop('required',true);
    jQuery("#expm").prop('required',true);
    jQuery("#expy").prop('required',true);
    jQuery("#cvv").prop('required',true);
  }
})}) 
</script>
<?php } ?>
