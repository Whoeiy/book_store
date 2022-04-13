
<?php
session_start();

function getRandomId()
{

    $Num1 = rand(100000, 999999);
    return $Num1;
}

if(isset($_POST['userId']) and !isset($_POS['orderid'])){
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Information</title>
    <link rel="stylesheet" type="text/css" href="../css/ninformation.css">
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
        <form action="information.php" method="post">
            <?php 
                $orderid = getRandomId();
                echo("<input type='hidden' name='orderid' value='" . $orderid . "'>");
            ?>

            <div class="box">
                <h2>Contact information</h2>
                <span>Name:</span><input type="text" name="uname"> <br><br>
                <span>Phone:</span><input type="text" name="uphone"> <br><br>
                <span>Email:</span><input type="uemail"  name = "femail"><br><br>
                <input type="checkbox" name="News" value="Y" checked> Email me with news and offers<br><br>

            </div>

            <div class="box">
                <h2>Shipping address</h2>
                <span>Province:</span> <input type="text" name="fprovince"><br><br>
                <span>City:</span> <input type="text" name="fcity"><br><br>
                <span>Area:</span> <input type="text" name="farea"><br><br>
                <span>Postcode:</span> <input type="text" name="fpostcode"><br><br>
                <u>Address:</u> <br>
                <textarea name="faddress" cols="60%" rows="4"></textarea>

                <br><br>

            </div>

            <div class="bottom">
                <a href="javascript:history.go(-1);"><p>< Return to cart</p></a>
                <input type="submit" value="Continue to shipping">
            </div>
        </form>

    </div>


    <div class="sidebar">
        <?php include("sidebar.php");?>
    </div>
</div>
</body>
</html>
<?php
}else{
    $_SESSION['orderid'] = $_POST['orderid'];
    $_SESSION['name'] = $_POST['uname'];
    $_SESSION['phone'] = $_POST['uphone'];
    $_SESSION['email'] = $_POST['femail'];
    $_SESSION['news'] = $_POST['News'];
    $_SESSION['province'] = $_POST['fprovince'];
    $_SESSION['city'] = $_POST['fcity'];
    $_SESSION['area'] = $_POST['farea'];
    $_SESSION['postcode'] = $_POST['fpostcode'];
    $_SESSION['address'] = $_POST['faddress'];
    $order=array("\r\n","\n","\r");
    $replace=' ';
    $address=str_replace($order,$replace,$_SESSION['address']);

//    echo $_SESSION['name'];
    header("Location: shipping.php");

}

?>