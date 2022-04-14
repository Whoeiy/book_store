<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
    <title>Order Management</title>

    <link rel="stylesheet" type="text/css" href="../css/Inventory.css">
</head>
<body>


 <?php
$orderid=0;
$data = file("../dataFile/order.txt");
for ($i=0; $i<sizeof($data); $i++) {
$orderarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($orderarray); $i++) {
$order0 = explode("," , $orderarray[$orderid]);
}
?> 




<ul id="d2" style="width: 100%; font-size: 1vw;">

    <!-- <li><a href="ShoppingCart.html"><img src="../img/Cart.png" width="50" height="50"></a></li> -->
    <li><a href="#"><img src="../img/login.png" width="50" height="50"></a></li>
    <li><a href="InventoryManagement.php"><p style="color: black">Order Manager</p></a></li>
    <li style="float:left"><a href="MainPage.php"><img src="../img/logo.png" height="50" > </a> </li>

</ul>




<div class="bookinfo">

    <div class="inventory">
    <br><br><br><br>
    <form action="OrderManagement2.php" method="post">
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Telephone number</th>
                <th>Email</th>
                <th>Province</th>
                <th>City</th>
                <th>Area</th>
                <th>Zipcode</th>
                <th>Address</th>
                <th>Method</th>
                <th>Status</th>
                <th>Update Status</th>
            </tr>
            <tr>
                <input type="hidden" name="orderid" value="<?php echo $order0[0]?>">
                <input type="hidden" name="userid" value="<?php echo $order0[1]?>">
                <td><input style="width: 50px" type="text" value="<?php echo $order0[2]?>" name="name"></td>
                <td><input type="text" value="<?php echo $order0[3]?>" name="tel"></td>
                <td><input type="text" value="<?php echo $order0[4]?>" name="email"></td>
                <input type="hidden" name="news" value="<?php echo $order0[5]?>">
                <td><input style="width: 50px" type="text" value="<?php echo $order0[6]?>" name="pro"></td>
                <td><input style="width: 50px" type="text" value="<?php echo $order0[7]?>" name="city"></td>
                <td><input style="width: 50px" type="text" value="<?php echo $order0[8]?>" name="area"></td>
                <td><input type="text" value="<?php echo $order0[9]?>" name="zipcode"></td>
                <td><input type="text" value="<?php echo $order0[10]?>" name="add"></td>
                <td><input style="width: 50px" type="text" value="<?php echo $order0[11]?>" name="method"></td>
                <td><input type="text" value="<?php echo $order0[12]?>" name="status"></td>
                <td><select name="status">
                        <option value="paid" selected>paid</option>
                        <option value="Shipping">Shipping</option>
                        <option value="Complete" >Complete</option>
                    </select>
                </td>
            </tr>

            
        </table>
        <input type="submit" value="Update Status">
    </form>
    </div>
  </div>
    





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
      <a href="MainPage.php" > <img src="../img/logo.png" width="200px"></a>
    </div>
    <div id="Footer_Copyright">
        <a href="www.bookstore.com" class="Link" style="padding-left: 40%">© BOOKSTORE POWERED BY GROUP 6 CityU</a>
    </div>

</div>


</body>
</html>