<?php
session_start();
if(isset($_SESSION['orderid']) and !isset($_POST["ostatus"])){
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
						<li><a href="shoppingcart.php?quantity=1">Cart ></a></li>
						<li><a href="#">Information ></a></li>
						<li><a href="#">Shipping ></a></li>
						<li><a href="#">Payment</a></li>
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
							<?php echo $_SESSION["shippingMethod"];?>
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

   // store order information
   $toorder = array();
   $toorder[] = $_SESSION['orderid'];
   $toorder[] = trim($_SESSION['userId']);
   $toorder[] = $_SESSION['name'];
   $toorder[] = $_SESSION['phone'];
   $toorder[] = $_SESSION['email'];
   $toorder[] = $_SESSION['news'];
   $toorder[] = $_SESSION['province'];
   $toorder[] = $_SESSION['city'];
   $toorder[] = $_SESSION['area'];
   $toorder[] = $_SESSION['postcode'];
   $toorder[] = $_SESSION['address'];
   $toorder[] = $_SESSION['shippingMethod'];
   $toorder[] = $_SESSION['status'];
   $str = implode(',', $toorder) . "\n";
   // data format: 
   // orderid,userid,name,phone,email,news,province,city,area,postcode,address,shippingMethod,status
   file_put_contents("../dataFile/order.txt", $str, FILE_APPEND);

   
	// store order items information
   function insertItems($orderid, $userid) {
		$items = array();
		$books_paid = array();
		$fp = fopen('../dataFile/cart.txt', 'r');
		while(!feof($fp)){
			$line = fgets($fp);
			$arr = explode(',', $line);
			if($userid == $arr[0]){
				// record book information that are paid
				// bookid,quantity
				$temp = $arr[1] . "," . $arr[6];
				$books_paid[] = $temp;
				// add orderid for each orderitem
				$orderitem = trim($orderid) . "," . $line;
				$items[] = $orderitem;
			}
		}
		fclose($fp);
		// data format:
		// orderid,userid,bookid,img_url,bookname,author,price,quantity
		file_put_contents("../dataFile/orderitem.txt", $items, FILE_APPEND);
		return $books_paid;
	}

	$paid = insertItems($toorder[0], $toorder[1]);
	print_r($paid);

	// reduct inventory
	$data = file("../dataFile/book.txt");
	//在book.txt 中逐行读数据，将读到的数据存入到data数组中，每个元素是一行并转化为字符串
	for ($i = 0; $i < sizeof($data); $i++) {
		$books[$i] = "$data[$i]";
	}

	// print_r($books);

	for($i=0; $i<sizeof($books); $i++){
		$barr = explode(',', $books[$i]);
		for($j=0; $j<sizeof($paid); $j++){
			$parr = explode(',', $paid[$j]);
			if($i == $parr[0]){ // match the bookid
				$barr[4] = intval($barr[4]) - intval($parr[1]);
				$barr[4] = $barr[4] . "\n";
				$books[$i] = implode(",", $barr);
			}
		}
	}
	print_r($books);
	file_put_contents('../dataFile/book.txt', $books);

?>

<html>
    <body>
        <script type="text/javascript">
            alert("Success!!");
			window.location.href = "account.php";
        </script>
    </body>
</html>

<?php
}
?>