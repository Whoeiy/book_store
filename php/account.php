<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="../css/account.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
</head>
<body>
	<!-- Navigation -->

	<div class="nav">
		<ul id="d2" style="width: 100%; font-size: 1vw;">
		    <li><a href="ShoppingCart.html"><img src="../img/Cart.png" width="50" height="50"></a></li>
		    <li><a href="account.html"><img src="../img/login.png" width="50" height="50"></a></li>
		    <li style="float:left"><a href="MainPage.html"><img src="../img/logo.png" height="50" > </a> </li>
		</ul>
	</div>

	<!-- Content -->
	
	<div class="main">
		<div class="content">
			<div class="page_header">
				<a href="logout.php">LOGOUT</a>
				<div class="page_header_content">
					<h1>MY ACCOUNT</h1>
					<p><?php echo("Welcome back, " . $user["name"] ."!")?></p>
				</div>
			</div>
			<div class="page_content">
				<!-- Left -->
				<div class="orders">
					<h2 class="section_header">MY ORDERS</h2>
					<div class="order_item">
						<div class="book_img"><img src="../img/book1.jpg"></div>
						<div class="item_detail">
							<p class="order_id">Order ID: 1Xfwer3234235</p>
							<p id="item_name">JavaScript from Beginner to Professional</p>
							<p class="item_quan">Quantity: 1</p>
							<p id="order_price">$34.97</p>
							<p class="order_status">Shipped</p>
						</div>
					</div>
				</div>
				<!-- Right -->
				<div class="address">
					<h2 class="section_header">PRIMARY ADDRESS</h2>
					<p class="addr_row">1 XXX XXX ROAD, TAI WEI, NT</p>
					<p class="addr_row">XXXX, TWX, PHASEX</p>
					<button id="edit_addr">EDIT ADDRESS</button>
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
	        <a href="www.bookstore.com" class="Link" style="padding-left: 40%">© BOOKSTORE POWERED BY GOZILLA</a>
	    </div>
	</div>


</body>
</html>