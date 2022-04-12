<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
    <title>Product Details</title>

    <link rel="stylesheet" type="text/css" href="../css/Inventory.css">
</head>
<body>

<?php
$bookid=4;
$data = file("book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book4 = explode("," , $bookarray[$bookid]);
}

?>
<?php
$bookid=5;
$data = file("book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book5 = explode("," , $bookarray[$bookid]);
}

?>
<?php
$bookid=3;
$data = file("book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book3 = explode("," , $bookarray[$bookid]);
}

?>
<?php
$bookid=2;
$data = file("book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book2 = explode("," , $bookarray[$bookid]);
}

?>
<?php
$bookid=1;
$data = file("book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book1 = explode("," , $bookarray[$bookid]);
}

?>
<?php
$bookid=0;
$data = file("book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book0 = explode("," , $bookarray[$bookid]);
}


?>


<ul id="d2" style="width: 100%; font-size: 1vw;">

    <li><a href="ShoppingCart-.html"><img src="../img/Cart.png" width="50" height="50"></a></li>
    <li><a href="login.html"><img src="../img/login.png" width="50" height="50"></a></li>
    <li><a herf=""><p style="color: black">Inventory Manager</p></a></li>
    <li style="float:left"><a href="MainPage.html"><img src="../img/logo.png" height="50" > </a> </li>

</ul>


<div class="bookinfo">

    <div class="inventory">
    <br><br><br><br>

   					<h2>Inventory&nbsp; &nbsp;&nbsp; &nbsp;<select><option>Page1</option></select></h2><br>
   					<form action="InventoryManagement.php" method="post" >
   					<span>1.<?php echo"$book0[1]"?>: <input type="text" style="width:30px; " name = "book0" value=" <?php echo"$book0[4]" ?>"><br><br>
   					<span>2.<?php echo"$book1[1]"?>: </span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" style="width:30px; "name="book1" value=" <?php echo"$book1[4]" ?>"> <br><br>
   					<span>3.<?php echo"$book2[1]"?>:  </span>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="book2"style="width:30px; " value=" <?php echo"$book2[4]" ?>"> <br><br>
                    <span>4.<?php echo"$book3[1]"?>:  </span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<input type="text" style="width:30px; "  name = "book3"value=" <?php echo"$book3[4]" ?>"><br><br>
   					<span>5.<?php echo"$book4[1]"?>:  </span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<input type="text" style="width:30px; " name="book4" value=" <?php echo"$book4[4]" ?>"> <br><br>
   					<span>6.<?php echo"$book5[1]"?>:  </span>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <input type="text" name="book5" style="width:30px; " value=" <?php echo"$book5[4]" ?>"> <br><br>
 <p>Revised stock levels are<?php echo $_POST["book0"]; ?>，<?php echo $_POST["book1"]; ?> ，<?php echo $_POST["book2"]; ?>，<?php echo $_POST["book3"]; ?>，<?php echo $_POST["book4"]; ?>，<?php echo $_POST["book5"]; ?></p>
     </div>
    <div class="intro">

        <h2>New books on the shelves</h2>
				<div >

					<span>BookImg:</span>  &nbsp; &nbsp;  <input type="text" class="Form-Input2" style="height=20px" id="subbook"  name="bookaddress"><br><br>
					<span>Name:</span> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  <input type="text" class="Form-Input2" style="height=20px" id="subbook"  name="bookname"><br><br>
					<span>Author:</span>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input type="text" class="Form-Input2" style="height=20px" id="subbook"  name="bookauthor"><br><br>
					<span>Price:</span>  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  <input type="text" class="Form-Input2" style="height=20px" id="subbook"  name="bookprice"><br><br>
                    <span>Inventory:</span>  &nbsp;&nbsp;&nbsp; <input type="text" class="Form-Input2" style="height=20px" id="subbook"  name="bookstoreage"><br><br>


   					 <button type="submit" class="Submit_Botton" id="subscribesub" name="updateInventory" >Update Inventory</button>
   					 <br>
				</div>
			</form>

    </div>
</div>


<?php
$book0[4]=$_POST["book0"];
$book1[4]=$_POST["book1"];
$book3[4]=$_POST["book3"];
$book2[4]=$_POST["book2"];
$book4[4]=$_POST["book4"];
$book5[4]=$_POST["book5"];

$new[0] = implode($book0,",");
$new[1] = implode($book1,",");
$new[2] = implode($book2,",");
$new[3] = implode($book3,",");
$new[4] = implode($book4,",");
$new[5] = implode($book5,",");


$book6[0]=$_POST["bookaddress"];

$book6[1]=$_POST["bookname"];
$book6[2]=$_POST["bookauthor"];
$book6[3]=$_POST["bookprice"];
$book6[4]=$_POST["bookstoreage"];
$new[6] = implode($book6,",");

$newarray=implode($new,"\n");
   $numbytes = file_put_contents('book.txt', $newarray); //如果文件不存在创建文件，并写入内容

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
        <a href="www.bookstore.com" class="Link" style="padding-left: 40%">© BOOKSTORE POWERED BY GOZILLA</a>
    </div>

</div>


</body>
</html>