<?php
session_start();
?>
<html>
<head>
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="../css/shoppingcart.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
</head>


<body>
<!--导航栏-->
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
<!--<ul id="d2">-->
<!---->
<!--    <li><a href="shoppingcart.php"><img src="../img/Cart.png" width="50" height="50"></a></li>-->
<!---->
<!--    <li><a href="login.php"><img src="../img/login.png" alt="login" width="50" height="50"></a></li>-->
<!--    <li style="float:left"><a href="MainPage.php"><img src="../img/logo.png" height="50"> </a></li>-->
<!--</ul>-->





<!--主页部分-->
<h1 style="text-align: center;letter-spacing: 10px;">YOUR CART</h1>

<?php
function getItems($userid) {
	$items = array();
	$fp = fopen('../dataFile/cart.txt', 'r');
	while(!feof($fp)){
		$line = fgets($fp);
		$arr = explode(',', $line);
		// echo $userid . $arr[0] . "<br>";
		if($userid == $arr[0]){		// 查询userid对应的cart
			$items[] = $line;
		}
	}
	fclose($fp);
	return $items;
}

$user = $_SESSION["userId"];
$quantity = $_GET['quantity'];
$cartarray = getItems(trim($user));		// 清除前后空格 & parameter: userid
$item_price = array();
//print_r($cartarray);
if($cartarray == null){
	echo "
	<h3 style='text-align:center;color:gray;'>Your shopping cart is empty</h3>
	<br><br><br><br><br><br><br>
	";
}else{
	for ($i=0; $i<count($cartarray); $i++) {
		$cart = explode("," , $cartarray[$i]);
		//$bookid = $cart[1];
		//print_r($cart);
		$cartid = $_GET['cartid'];
		if(isset($_GET['addone']) && $i==$cartid){
			$cart[6] = $quantity;
			$fp = fopen('../dataFile/cart.txt',"w");
			$cart = $cart[0] . "," . $cart[1] . "," . $cart[2] . "," . $cart[3] . "," . $cart[4] . "," . $cart[5]. "," . $cart[6] . "\r\n";;
			//print_r($cart);
			//print_r($cartarray);
			$cartarray[$i]=$cart;
			//print_r($cartarray);
  			$numbytes = file_put_contents('../dataFile/cart.txt', $cartarray);
		}
	}
	$cartarray = getItems(trim($user));		// 清除前后空格 & parameter: userid
	$item_price = array();
	for ($i=0; $i<count($cartarray); $i++) {
		$cart = explode("," , $cartarray[$i]);
		//$bookid = $cart[1];
		//print_r($cart);
		echo "
		<div class = 'bookinfo'>
			<div class = 'bookitem'>
				<div class = 'img'>
					<img src = '
			";
			echo $cart[2];
			echo "
			' style='max-width:100%;'' width='200px' alt='BUY IT!''>
				</div>
				<div class = 'des'>
					<h3>";
			echo $cart[3];
			echo "</h3>
					<div style='overflow: hidden;''>
						<p style='color: gray;float: left;''>Paperback</p>
						<h2 style='float: right;''>HKD ";
			// echo $cart[6];
			$price = doubleval($cart[5]) * intval($cart[6]);
			$item_price[] = $price;
			echo $price;
			echo "</h2>
					</div>
					<a href='./shoppingcart.php?quantity=2&cartid=".$i."&addone=1'><input type='submit' value='ADD ONE' style='float:right;' /></a>
					<p style='color: gray;float: left;margin-top: 0px;''>Quantity:" . $cart[6] . "</p>
					
				</div>
			</div>
		</div>";
	}

    echo "
    <div class = 'price'>
		<hr>
		<div style='overflow:hidden;''>
			<div class = 'ordernote'style='float:left;''>
				<h4 style='padding-bottom: 0px;margin-bottom: 2px;margin-left: 5px;''>ADD ORDER NOTE</h4>
				<textarea name='des' cols='50' rows='8'>How can I help you?</textarea>

			</div>
			<div class = 'total' style='float: right;''>
				<h1>Total:&nbsp;&nbsp;HKD ";
    echo array_sum($item_price);

    echo "
			</h1>
				<form action='information.php' method='post'>
					<input type='hidden' name='userId' value='" . trim($_SESSION['userId']) ."'/>
					<input type='submit' value='CHECKOUT' style='float:right;' />
				</form>
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


<div class="Footer">
    <div class="Footer_item" id="Footer_Subscirbe">
        <form class="subscribe" accept-charset="UTF-8">
            <h2 class="Footer_Title">Updates</h2>
            <p class="Footer_Ins">Sign up for product teasers, deals, and more</p>
            <div class="form-item">
                <input type="email" class="Form-Input" id="subemail" required="required" placeholder="Enter your email"
                       name="subemail">
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
        <a href="MainPage.html"> <img src="../img/logo.png" width="200px"></a>
    </div>
    <div id="Footer_Copyright">
        <a href="www.bookstore.com" class="Link" style="padding-left: 40%">© BOOKSTORE POWERED BY GOZILLA</a>
    </div>

</div>


</body>
<script type="text/javascript">
    var text = document.querySelector('textarea');
    text.onfocus = function () {
        this.style = 'background-color: rgb(243,243,243);';
        this.innerText = '';
        //console.log("focus");

    }

    text.onblur = function () {
        this.style = 'background-color: rgb(229,229,229)';
        this.innerText = 'How can I help you?';
    }

    var zipcode = document.querySelector('.zipcode');
    zipcode.onfocus = function () {
        this.style = 'background-color: rgb(243,243,243);';
        this.value = '';

    }

    zipcode.onblur = function () {
        if (this.value === '') {
            this.style = 'background-color: rgb(229,229,229);color: gray;';
            this.value = 'zip code';
        }

    }


</script>

</html>