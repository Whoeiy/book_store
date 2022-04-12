<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"/>

    <title>Welcome to MiniBookStore!</title>

    <link href="../css/MainPage.css" rel="stylesheet" type="text/css"/>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
</head>
<body>


<ul id="d2">
    <li style="float:left"><a href="MainPage.html"><img src="../img/logo.png" height="50"> </a></li>

    <?php session_start(); ?>
    <?php
//    var $src;
    // $_SESSION = array();
    if (isset($_SESSION['lname'])) {  // Checking whether the session is already there or not if
        // true then header redirect it to the home page directly

        echo 'Welcome! &nbsp' . $_SESSION['lname'] . '';
        $src = "account.php";
    }else{
        $src = "login.html";
    }
    ?>

    <!-- <li><a href="#More"><img src="../img/More.png" width="50" height="50"></a></li> -->
    <li><a href="ShoppingCart.php"><img src="../img/Cart.png" width="50" height="50"></a></li>
    <!-- <li><a href="#Search"><img src="../img/search.png" width="50" height="50"></a></li> -->

<!--    <li><a href="account.php"><img src="../img/login.png" width="50" height="50"></a></li>-->
    <?php
    echo "<li><a href=" . $src . "><img src='../img/login.png' width='50' height='50'></a></li>"
    ?>


</ul>


<header class="tm-welcome-section">
    <h2 class="col-12 text-center tm-section-title">Welcome to MiniBookStore!</h2>
    <p class="col-12 text-center">Here are some selected book we recommend!</p>
</header>

</div>
<div id="tm-gallery-page-pizza" class="tm-gallery-page">
    <?php
    $file = 'book.txt';
    $content = file_get_contents($file);
    $array = explode("\n", $content);

    //各个系统下的换行符可能会有所不同，不过用得比较多的好像是"\n"
    for ($i = 0; $i < count($array); $i++) {
        //读取一行的信息，如："29384733----2013-12-29 19:57:20"
        $temp = $array[$i];
        $array[$i] = explode(",", $temp);
        //假设如题设中的以","为不同字段之间的分隔符，如果是其他的，相应修改即可，视具体分隔符而定

    }

    function bookItem($img, $bookname, $price, $detailpath)
    {

        echo "    <article class=' col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item '> ";
        echo "        <figure> ";
        echo "<a href=  ";
        echo $detailpath;
        echo " style='text-decoration: none'>";
        echo "            <img src=";
        echo $img;
        echo " alt='Image' class='img-fluid tm-gallery-img'  /> ";

        echo "            <figcaption> ";
        echo "                <h4 class='tm-gallery-title'>";
        echo $bookname;
        echo "</h4> ";
        echo "                <p class='tm-gallery-description'>Nam in suscipit nisi, sit amet consectetur metus. Ut sit amet tellus accumsan</p> ";
        echo "                <p class='tm-gallery-price'>";
        echo $price;
        echo "</p> ";
        echo "            </figcaption> ";
        echo "        </figure> ";
        echo "    </article> ";
    }

    bookItem($array[0][0], $array[0][1], $array[0][2], "../php/ProductDetails.php?new=0");
    bookItem($array[1][0], $array[1][1], $array[1][2], "../php/ProductDetails.php?new=1");
    bookItem($array[2][0], $array[2][1], $array[2][2], "../php/ProductDetails.php?new=2");
    echo "   </div>  ";
    echo "   <div id='tm-gallery-page-pizza' class='tm-gallery-page'> ";
    bookItem($array[3][0], $array[3][1], $array[3][2], "../php/ProductDetails.php?new=3");
    bookItem($array[4][0], $array[4][1], $array[4][2], "../php/ProductDetails.php?new=4");
    bookItem($array[5][0], $array[5][1], $array[5][2], "../php/ProductDetails.php?new=5");
    echo "   </div>  ";
    ?>


    <div class="Footer">
        <div class="Footer_item" id="Footer_Subscirbe">
            <form class="subscribe" accept-charset="UTF-8">
                <h2 class="Footer_Title">Updates</h2>
                <p class="Footer_Ins">Sign up for product teasers, deals, and more</p>
                <div class="form-item">
                    <input type="email" class="Form-Input" id="subemail" required="required"
                           placeholder="Enter your email" name="subemail">
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

</div>

</body>
</html>