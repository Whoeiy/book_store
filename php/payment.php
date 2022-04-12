<?php
session_start();
if(isset($_SESSION['name']) and !isset($_POST["ostatus"])){

?>


<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="../css/npayment.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
</head>
<body>
	<div class="content">
		<div class="main">
			<div class="payment">
				<div class="p_header">
					<img src="../img/logo.png">
					<ul>
						<li><a href="ShoppingCart.html">Cart ></a></li>
						<li><a href="Information.html">Information ></a></li>
						<li><a href="shipping.html">Shipping ></a></li>
						<li><a href="payment.html">Payment</a></li>
					</ul>
				</div>
				<div class="p_info">
					<div class="p_info_contact">
						<div class="p_info_name">
							Contact
						</div>
						<div class="p_info_content">
							<?php echo $_SESSION["email"];?>
						</div>
						<!-- <span class="p_info_change">
							Change
						</span> -->
					</div>
					<div class="p_info_shipto">
						<div class="p_info_name">
							Ship to
						</div>
						<div class="p_info_content">
                            <?php 
                                echo $_SESSION['province'] . "&nbsp" . $_SESSION['city'] . "&nbsp" . 
                                $_SESSION['area'] . "&nbsp" . $_SESSION['address'];
                            ?>
						</div>
						<!-- <span class="p_info_change">
							Change
						</span> -->
					</div>					
					<div class="p_info_method">
						<div class="p_info_name">
							Method
						</div>
						<div class="p_info_content">
							14-28 Day Delivery · $26.99
						</div>
					</div>
				</div>
				<form action="payment.php" method="post">
					<div class="p_payment">
						<h2>Payment</h2>
						<p>All transactions are secure and encrypted.</p>
						<fieldset class="p_payment_method">
							<div class="row">
								<input type="radio" name="pamyent_method" id="credit card" checked="checked">
								<label for="payment_method">Credit card</label>
							</div>
							<div class="card_info">
								<input type="text" name="card_number" id="card_number" value="Card number">
								<input type="text" name="name_on_card" id="name_on_card" value="Name on card">
								<input type="text" name="exp_date" id="exp_date" value="Expiration date (MM/YY)">
								<input type="text" name="security_code" id="security_code" value="Security code">								
							</div>
							<div class="other">
								<input type="radio" name="pamyent_method" id="paypal">
								<label for="payment_method">Paypal</label>
							</div>
						</fieldset>	
					</div>
					<div class="p_billing_address">
						<h2>Billing address</h2>
						<p>Select the address that matches your card or payment method.</p>
						<fieldset>
							<div>
								<input type="radio" name="billing_addr" id="same_addr" checked="checked">
								<label for="same_addr">Same as shipping address</label>						
							</div>
							<div>
								<input type="radio" name="billing_addr" id="different_addr">
								<label for="different_addr">Use a different billing address</label>
							</div>
						</fieldset>
					</div>	
                    <input type="hidden" name="ostatus" value="paid">
					<div class="p_footer">
						<span>< Return to shipping</span>
						<input type="submit" name="submit" value="Pay now">
					</div>				
				</form>
			</div>
		</div>
		<div class="sidebar">
            <?php include("sidebar.php");?>	
		</div>
	</div>
</body>
</html>

<?php

}else{
   $_SESSION['status'] = $_POST['ostatus'];
   $str = implode(',', $_SESSION) . "\n";
   // data format: 
   // orderid,name,phone,email,news,province,city,area,postcode,address,shippingMethod,status
   file_put_contents("order.txt", $str, FILE_APPEND);
?>

<html>
    <body>
        <script type="text/javascript">
            alert("Success!!")
        </script>
    </body>
</html>

<?php
}
?>