<html>
<head>
	<title>Your Shopping Cart</title>
	<link rel="stylesheet" type="text/css" href="../css/shoppingcart.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
</head>
<body>
	<ul id="d2">

		<li><a href="shoppingcart.php"><img src="../img/Cart.png" width="50" height="50"></a></li>

		<li><a href="login.php"><img src="../img/login.png" alt="login" width="50" height="50"></a></li>
		<li style="float:left"><a href="#home"><img src="../img/logo.png" height="50" > </a> </li>
	</ul>

	<h1 style="text-align: center;letter-spacing: 10px;">YOUR CART</h1>


<?php

$data = file("cart.txt");
for ($i=0; $i<sizeof($data); $i++) {
$cartarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($cartarray); $i++) {
$cart = explode("," , $cartarray[0]);
}

if($cart[0] == null){
	echo "
	<h3 style='text-align:center;color:gray;'>Your shopping cart is empty</h3>
	<br><br><br><br><br><br><br>


	";
}
else{
	$cart[4]=2;
	$price = (float)$cart[3];
	echo "
	<div class = 'bookinfo'>
		<div class = 'img'>
			<img src = '


	";
	echo $cart[0];
	echo "
	' style='max-width:100%;'' width='200px' alt='BUY IT!''>
		</div>
		<div class = 'des'>
			<h3>";
	echo $cart[1];
	echo "</h3>
			<div style='overflow: hidden;''>
				<p style='color: gray;float: left;''>Paperback</p>
				<h2 style='float: right;''>HK$";
	echo $price * $cart[4];
	echo "</h2>
			</div>

			<a href='shoppingcart3.php'><input type='submit' value='ADD ONE' style='float:right;' /></a>
			<p style='color: gray;float: left;margin-top: 0px;''>Quantity:";
			echo $cart[4];
			echo "</p>
			
		</div>


	</div>
	";
    echo "
    <div class = 'price'>
		<hr>
		<div style='overflow:hidden;''>
			<div class = 'ordernote'style='float:left;''>
				<h4 style='padding-bottom: 0px;margin-bottom: 2px;margin-left: 5px;''>ADD ORDER NOTE</h4>
				<textarea name='des' cols='50' rows='8'>How can I help you?</textarea>

			</div>
			<div class = 'total' style='float: right;''>
				<h1>Total:&nbsp;&nbsp; HK$"; 
			echo $price * $cart[4];
			echo"
			</h1>
				<a href='information.php'><input type='button' value='CHECKOUT' style='float:right;' /></a>
			</div>
		</div>


		<div class = 'shipping'style='float:left'>
			<h4 style='padding-bottom: 0px;margin-bottom: 2px;margin-left: 5px;'>ESTIMATE SHIPPING</h4>

			<select style='background-color: transparent;''>
				<option value='Mainland of China'selected>Mainland of China</option>
				<option value='HongKong'>HongKong</option>
				<option value='America'>America</option>
			</select>

			<select style='background-color: transparent;'>
				<option value='Shanghai' selected>Shanghai</option>
				<option value='Beijing'>Beijing</option>
				<option value='Chongqing'>Chongqing</option>
			</select>
			<input class='zipcode' type='text' value='zip code' style='color: gray;background-color: transparent;' />

		</div>

	</div>
    ";
}
?>

<?php
$fp = fopen('cart.txt',"w");
$cart[4]=2;
$cart = implode($cart,",");
  $numbytes = file_put_contents('cart.txt', $cart); //???????????????????????????????????????????????????

?>
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
        <a href="www.bookstore.com" class="Link" style="padding-left: 40%">?? BOOKSTORE POWERED BY GOZILLA</a>
    </div>

</div>




</body>
<script type="text/javascript">
	var text = document.querySelector('textarea');
	text.onfocus = function(){
		this.style = 'background-color: rgb(243,243,243);';
		this.innerText = '';
		//console.log("focus");

	}

	text.onblur = function(){
		this.style = 'background-color: rgb(229,229,229)';
		this.innerText = 'How can I help you?';
	}

	var zipcode = document.querySelector('.zipcode');
	zipcode.onfocus = function(){
		this.style = 'background-color: rgb(243,243,243);';
		this.value = '';

	}

	zipcode.onblur = function(){
		if(this.value === ''){
			this.style = 'background-color: rgb(229,229,229);color: gray;';
			this.value = 'zip code';
		}
		
	}



</script>

</html>