<?php
session_start();

function getOrderInfo($userid) {
	$items = array();
	$fp = fopen('../dataFile/order.txt', 'r');
	while(!feof($fp)){
		$line = fgets($fp);
		$arr = explode(',', $line);
		if($userid == $arr[1]){
			$items[] = $line;
			break;
		}
	}
	fclose($fp);
	return $items;
}

function getOrderItems($orderid){
	$items = array();
	$fp = fopen('../dataFile/orderitem.txt', 'r');
	while(!feof($fp)){
		$line = fgets($fp);
		$arr = explode(',', $line);
		if($orderid == $arr[0]){
			$items[] = $line;
		}
	}
	fclose($fp);
	return $items;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="../css/naccount.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
</head>
<body>
	<!-- Navigation -->

    <ul id="d2">
    <li style="float:left"><a href="MainPage.php"><img src="../img/logo.png" height="50"> </a></li>

    <?php
    //    var $src;
    // $_SESSION = array();
    if (isset($_SESSION['lname'])) {  // Checking whether the session is already there or not if
        // true then header redirect it to the home page directly

        echo 'Welcome! &nbsp' . $_SESSION['lname'];
        $src = "account.php";
    } else {
        $src = "login.html";
    }
    ?>
    <li><a href="shoppingcart.php?quantity=1"><img src="../img/Cart.png" width="50" height="50"></a></li>
    <!--    <li><a href="account.php"><img src="../img/login.png" width="50" height="50"></a></li>-->
    <?php
    echo "<li><a href=" . $src . "><img src='../img/login.png' width='50' height='50'></a></li>"
    ?>
    </ul>
<!--	<div class="nav">-->
<!--		<ul id="d2" style="width: 100%; font-size: 1vw;">-->
<!--		    <li><a href="ShoppingCart.html"><img src="../img/Cart.png" width="50" height="50"></a></li>-->
<!--		    <li><a href="account.html"><img src="../img/login.png" width="50" height="50"></a></li>-->
<!--		    <li style="float:left"><a href="MainPage.html"><img src="../img/logo.png" height="50" > </a> </li>-->
<!--		</ul>-->
<!--	</div>-->

	<!-- Content -->
	<?php
		$uid = trim($_SESSION["userId"]);
		$order = getOrderInfo($uid);
		$orderinfo = explode(',', $order[0]);
		$orderitems = getOrderItems($orderinfo[0]);

		print_r($orderitems);
	?>
	<div class="main">
		<div class="content">
			<div class="page_header">
				<a href="logout.php">LOGOUT</a>
				<div class="page_header_content">
					<h1>MY ACCOUNT</h1>
					<p><?php echo("Welcome back, " . $_SESSION['lname'] ."!")?></p>
				</div>
			</div>
			<div class="page_content">
				<!-- Left -->
				<div class="orders">
					<h2 class="section_header">MY ORDERS</h2>
					<?php
						for($i=0; $i < sizeof($orderitems); $i++){
							$oitem = explode(',', $orderitems[$i]);
					?>
							<div class="order_item">
								<div class="book_img"><img src= <?php echo $oitem[3];?>></div>
								<div class="item_detail">
									<p class="order_id">
										<?php echo "Order ID: " . $oitem[0]; ?>
									</p>
									<p id="item_name">
										<?php echo $oitem[4]; ?>
									</p>
									<p class="item_quan">
										<?php echo "Quantity: " . $oitem[7]; ?>
									</p>
									<p id="order_price">
										<?php echo "HKD " . $oitem[6]; ?>
									</p>
									<p class="order_status">
										<?php echo "Status: " . $orderinfo[12]; ?>
									</p>
								</div>
							</div>
					<?php } ?>	
				</div>
				<!-- Right -->
				<div class="address">
					<h2 class="section_header">ADDRESS</h2>
					<p class="addr_row">
						<?php echo $orderinfo[10] ?>
					</p>
					<p class="addr_row">
						<?php 
							echo $orderinfo[8] . ",&nbsp" .  $orderinfo[7] . ",&nbsp" . $orderinfo[6];
						?>
					</p>
					<!-- <button id="edit_addr">EDIT ADDRESS</button> -->
				</div>
			</div>		
		</div>
	</div>

	<!-- Footer -->

	<div class="Footer"  >
	    <div class="Footer_item" id="Footer_Subscirbe" >
	        <form class="subscribe" accept-charset="UTF-8">
	            <h2 class="Footer_Title">Updates</h2>
	            <p class="Footer_Ins">Sign up for product teasers, deals, and more</p>
	            <div class="form-item">
	                <input type="email" class="Form-Input" id="subemail" required="required" placeholder="Enter your email" name="subemail">
	            </div>
	            <button type="submit" class="Submit_Botton" id="subscribesub">Subscribe</button>
	    </div>

	    <div class="Footer_item" id="Footer_Support">
	        <h2 class="Footer_Title">Support</h2>
	        <a href="mailto:support@bookstore.com" class="Link1">support@bookstore.com</a>
	    </div>
	    <div class="Footer_item" id="Footer_Info">
	        <h2 class="Footer_Title">Info</h2>

	        <a href="" class="Link1">Shipping Policy</a><br><br>
	        <a href="" class="Link1">Return Policy</a><br><br>
	        <a href="" class="Link1">Terms and Conditions</a>
	        <br><br>

	        <a href="" class="Link1">Privacy Policy</a>

	    </div>
	    <div class="Footer_item" id="Footer_img">
	        <a href="MainPage.html" > <img src="../img/logo.png" width="200px"></a>
	    </div>
	    <div id="Footer_Copyright">
	        <a href="www.bookstore.com" class="Link" style="padding-left: 40%">© BOOKSTORE POWERED BY GROUP 6 CityU</a>
	    </div>
	</div>


</body>
</html>