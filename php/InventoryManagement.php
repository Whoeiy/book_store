<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
    <title>Inventory Management</title>

    <link rel="stylesheet" type="text/css" href="../css/Inventory.css">
</head>
<body>

<?php
$bookid=4;
$data = file("../dataFile/book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book4 = explode("," , $bookarray[$bookid]);
}

?>

<?php
$bookid=3;
$data = file("../dataFile/book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book3 = explode("," , $bookarray[$bookid]);
}

?>
<?php
$bookid=2;
$data = file("../dataFile/book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book2 = explode("," , $bookarray[$bookid]);
}

?>
<?php
$bookid=1;
$data = file("../dataFile/book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book1 = explode("," , $bookarray[$bookid]);
}

?>
<?php
$bookid=0;
$data = file("../dataFile/book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book0 = explode("," , $bookarray[$bookid]);
}


?>


<ul id="d2" style="width: 100%; font-size: 1vw;">

    <!-- <li><a href="ShoppingCart-.html"><img src="../img/Cart.png" width="50" height="50"></a></li> -->
    <li><a href="#"><img src="../img/login.png" width="50" height="50"></a></li>
    <li><a href="OrderManagement.php"><p style="color: black">Inventory Manager</p></a></li>
    <li style="float:left"><a href="MainPage.php"><img src="../img/logo.png" height="50" > </a> </li>

</ul>


<div class="bookinfo">

    <div class="inventory">
    <br><br><br><br>

   				<h2>Inventory&nbsp; &nbsp;&nbsp;<select><option>Page1</option></select></h2><br>
                   					<form action="InventoryManagement.php" method="post" >
                   					<label for="inbook1" class="label1class">1.<?php echo"$book0[1]"?>:</label> <input type="text" id="inbook1" style="width:30px; " name = "book0" value=" <?php echo"$book0[4]" ?>"><br><br>
                   					<label for="inbook2" class="label1class" >2.<?php echo"$book1[1]"?>:</label> <input type="text"  id="inbook2" style="width:30px; "name="book1" value=" <?php echo"$book1[4]" ?>"><br><br>
                   					<label for="inbook3"  class="label1class">3.<?php echo"$book2[1]"?>:</label><input type="text"  id="inbook3" name="book2"style="width:30px; " value=" <?php echo"$book2[4]" ?>"><br><br>
                                    <label for="inbook4" class="label1class" >4.<?php echo"$book3[1]"?>:</label> <input type="text" id="inbook4" style="width:30px; "  name = "book3"value=" <?php echo"$book3[4]" ?>"><br><br>
                   					<label for="inbook5"  class="label1class">5.<?php echo"$book4[1]"?>:</label><input type="text" id="inbook5" style="width:30px; " name="book4" value=" <?php echo"$book4[4]" ?>"> <br><br>
                   					<label for="inbook6"  class="label1class" >6.<?php echo $_POST["bookname"];?>:</label><input type="text" id="inbook6" name="book5" style="width:30px; "> <br><br>
                 <p>Revised stock levels are<?php echo $_POST["book0"]; ?>&nbsp; &nbsp;
                 <?php echo $_POST["book1"]; ?> &nbsp; &nbsp;
                 <?php echo $_POST["book2"]; ?>&nbsp; &nbsp;
                 <?php echo $_POST["book3"]; ?>&nbsp; &nbsp;
                 <?php echo $_POST["book4"]; ?>&nbsp; &nbsp;
                 <?php echo $_POST["book5"]; ?>&nbsp;
                 <?php echo $_POST["bookstoreage"]; ?> </p>
                        </div>
    <div class="intro">

        <h2>New books on the shelves</h2>
				<div >

					<span>BookImg:</span>  &nbsp; &nbsp;  <input type="text" class="Form-Input2" style="height:20px" id="subbook"  name="bookaddress"><br><br>
					<span>Name:</span> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  <input type="text" class="Form-Input2" style="height:20px" id="subbook"  name="bookname"><br><br>
					<span>Author:</span>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input type="text" class="Form-Input2" style="height:20px" id="subbook"  name="bookauthor"><br><br>
					<span>Price:</span>  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  <input type="text" class="Form-Input2" style="height:20px" id="subbook"  name="bookprice"><br><br>
                    <span>Inventory:</span>  &nbsp;&nbsp;&nbsp; <input type="text" class="Form-Input2" style="height:20px" id="subbook"  name="bookstoreage"><br><br>


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


$new[0] = implode(",", $book0);
$new[1] = implode(",", $book1);
$new[2] = implode(",", $book2);
$new[3] = implode(",", $book3);
$new[4] = implode(",", $book4);



$book5[0]=$_POST["bookaddress"];

$book5[1]=$_POST["bookname"];
$book5[2]=$_POST["bookauthor"];
$book5[3]=$_POST["bookprice"];
$book5[4]=$_POST["bookstoreage"];
$new[5] = implode(",", $book5);

$newarray=implode("\n", $new);
if(isset($_POST['book5'])){
    $numbytes = file_put_contents('../dataFile/book.txt', $newarray); //???????????????????????????????????????????????????
}

?>
<?php
$bookid=5;
$data = file("../dataFile/book.txt");
for ($i=0; $i<sizeof($data); $i++) {
$bookarray[$i]= "$data[$i]";
}
for ($i=0; $i<count($bookarray); $i++) {
$book0 = explode("," , $bookarray[$bookid]);
}


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
      <a href="MainPage.php" > <img src="../img/logo.png" width="200px"></a>
    </div>
    <div id="Footer_Copyright">
        <a href="www.bookstore.com" class="Link" style="padding-left: 40%">?? BOOKSTORE POWERED BY GROUP 6 CityU</a>
    </div>

</div>


</body>
</html>