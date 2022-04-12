<?php
$name = $_POST["name"];
$phone = $_POST["tel"];
$email = $_POST["email"];
$province = $_POST["pro"];
$city = $_POST["city"];
$area = $_POST["area"];
$postcode = $_POST["zipcode"];
$address = $_POST["add"];
$method = $_POST["method"];
// $O = array("",  "Unpaid", "Shipping", "Complete");
// $status= $0[$_POST["status"]];
$status= $_POST["status"];




echo "User submit by POST: '$status'<BR><BR>";



$fp = fopen('order.txt',"w+") or exit("Unable to open file!");



$str = $name . ',' . $phone . ',' . $email . ',' . $province . ',' . $city . ',' . $area . ',' . $postcode . ',' . $address . ',' .$method . ',' .$status . ',' ."\r";
//fwrite($fp,$attribute) or exit("Unable to open file!");;
fwrite($fp,$str);
fclose($fp);
echo "file update succeed!"



?>