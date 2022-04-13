<?php
session_start();
if(isset($_SESSION['orderid']) and !isset($_POST["ushippingMethod"]) ){

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shipping</title>
    <link rel="stylesheet" type="text/css" href="../css/nshipping.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">


</head>
<body>
<div class="content">
    <div class="main">
        <div class="p_header">
            <img src="../img/logo.png">
            <ul>
                <li><a href="shoppingcart.php?quantity=1">Cart ></a></li>
                <li><a href="#">Information ></a></li>
                <li><a href="#">Shipping ></a></li>
                <li><a href="#">Payment</a></li>
            </ul>
        </div>
        <form  action="shipping.php" method="post">
            <div class = "box">
                <br>
                <h2>Shipping informaiton</h2>
<!--                <span>Contact:</span><input type="text" name="fcontact" ><br><br>-->
                <span>Contact:</span> <?php echo $_SESSION['phone'];?>  <br><br>
<!--                <span>Ship to:</span><input type="text" name="fshipto" ><br><br>-->
                <span>Ship to:</span><?php 
                    echo $_SESSION['province'] . "&nbsp" . $_SESSION['city'] . "&nbsp" . 
                    $_SESSION['area'] . "&nbsp" . $_SESSION['address']; 
                ?><br><br>
                <span>Method:</span>
                <select name = "ushippingMethod">
                    <option value="SF">SF Express</option>
                    <option value="DHL">DHL</option>
                </select>
            </div>
            <div class="bottom">
                <!-- <a href="javascript:history.go(-1);"><p>< Return to information</p></a> -->
                <input type="submit" value="Continue to payment">
            </div>
        </form>

    </div>

    <div class="sidebar">
        <?php include("sidebar.php");?>
        <!-- <div class="order_item">
            <div class="book_img">
                <img src="../img/book1.jpg">
            </div>
            <div class="item_middle">
                <div class="item_detail">
                    <p id="item_name">JavaScript from Beginner to Professional</p>
                    <p id="item_quan">Quantity: 1</p>
                </div>
            </div>
            <div class="item_price">
                <p id="order_price">$34.97</p>
            </div>
        </div>
        <div class="total">
            <p id="total_attri">Total</p>
            <p id="total_price">$34.97</p>
        </div> -->
    </div>
</div>
</body>
</html>
<?php



}else{
   $_SESSION['shippingMethod'] = $_POST['ushippingMethod'];
   header("Location: payment.php");
}

?>