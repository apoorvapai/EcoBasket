<?php session_start();
error_reporting(0);
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Eco basket | Order Details</title>
        
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
        <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

    </head>
<style type="text/css"></style>
    <body>
<?php include_once('includes/header.php');?>    
        <!-- Header-->
        <div class="container">
  <img src="assets/slider6.png" height="450" style="width:100%;">


                <div class="text-block">
                    <h6 class="display-6 fw-bolder">#<?php echo intval($_GET['onumber']);?> Order Details</h6>
                </div>

            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4  mt-5">
<h5>Order Details</h5>
<hr />
     <?php
$uid=$_SESSION['id'];
$orderno=intval($_GET['onumber']);
$ret=mysqli_query($con,"select *,orders.id as orderid from orders 
left join addresses on addresses.id=orders.addressId
    where orders.userId='$uid' and orders.orderNumber='$orderno'");
while ($row=mysqli_fetch_array($ret)) {?>
<div class="row">
<div class="col-6">
    <table class="table table-bordered" border="1">
<tr>
    <th>Order Number</th>
    <td><?php echo htmlentities($row['orderNumber']);?></td>
</tr>
<tr>
    <th>Order Date</th>
    <td><?php echo htmlentities($row['orderDate']);?></td>
</tr>
<tr>
    <th>Total Amount</th>
    <td><?php echo htmlentities($row['totalAmount']);?></td>
</tr>
<tr>
    <th>Txn Type</th>
    <td><?php echo htmlentities($row['txnType']);?></td>
</tr>

<tr>
    <th>Status</th>
    <td><?php $ostatus=$row['orderStatus'];
                    if( $ostatus==''): echo "Not Processed Yet";
                        else: echo $ostatus; endif;?>
                            <br />
<a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo $row['orderid'];?>');" title="Track order"> Track order
</a>

                        </td>
</tr>
    </table>
</div>
<div class="col-6">
    <table class="table table-bordered" border="1">
<tr>
    <th>Billing Address</th>
    <td><address><?php echo htmlentities($row['billingAddress']);?><br />
<?php echo htmlentities($row['biilingCity']);?>,<?php echo htmlentities($row['billingState']);?><br />
<?php echo htmlentities($row['billingPincode']);?>, <?php echo htmlentities($row['billingCountry']);?>
</address>
    </td>
</tr>
<tr>
    <th>Shipping Address</th>
    <td><address><?php echo htmlentities($row['shippingAddress']);?><br />
<?php echo htmlentities($row['shippingCity']);?>,<?php echo htmlentities($row['shippingState']);?><br />
<?php echo htmlentities($row['shippingPincode']);?>, <?php echo htmlentities($row['shippingCountry']);?>
</address>
    </td>
</tr>
<tr><td colspan="2"><a href="javascript:void(0);" onClick="popUpWindow('cancelorder.php?oid=<?php echo $row['orderid'];?>');" title="Cancel Order" class="btn-upper btn btn-danger">Cancel this Order
</a></td></tr>
    </table>
</div>

</div>
<?php } ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4"><h4>Order Products / Items</h4></th>
                </tr>
            </thead>
            <tr>
                <thead>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                </thead>
            </tr>
            <tbody>
<?php
$ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,ordersdetails.productId as pid,ordersdetails.id as cartid,products.productPriceBeforeDiscount,ordersdetails.quantity from ordersdetails join products on products.id=ordersdetails.productId where ordersdetails.userId='$uid'  and ordersdetails.orderNumber='$orderno'");
$num=mysqli_num_rows($ret);
    if($num>0)
    {
while ($row=mysqli_fetch_array($ret)) {

?>

                <tr>
                    <td class="col-md-2"><img src="admin/productimages/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="100" height="100"></td>
                    <td>
                       <a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?></a></td>
<td>
                           <span class="text-decoration-line-through">Rs<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
                            <span>Rs<?php echo htmlentities($row['pprice']);?></span>
                    </td>
                    <td><?php echo htmlentities($row['quantity']);?></td>
                     <td><?php echo htmlentities($totalamount=$row['quantity']*$row['pprice']);?></td>
        
                </tr>
            
                <?php $grantotal+=$totalamount; } ?>
<tr>
    <th colspan="4">Grand Total</th>
    <th colspan="2"><?php echo $grantotal;?></th>
</tr>
                <?php } else{ ?>
                <tr>
                    <td style="font-size: 18px; font-weight:bold; color:red;">Invalid Request

                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
              
            </div>

 
</div>
        </section>
        <!-- Track Order Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        <!-- Footer-->
   
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>


</html>
<?php } ?>
