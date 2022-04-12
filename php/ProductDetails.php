<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka">
    <title>Product Details</title>
    <link rel="stylesheet" type="text/css" href="../css/product_detail.css">

</head>
<body>

<?php
$bookid = $_GET['new'];
$data = file("../dataFile/book.txt");
//在book。txt 中逐行读数据，将读到的数据存入到data数组中，每个元素是一行并转化为字符串
for ($i = 0; $i < sizeof($data); $i++) {
    $bookarray[$i] = "$data[$i]";
}
//book是拆完的书的信息
for ($i = 0; $i < count($bookarray); $i++) {
    $book = explode(",", $bookarray[$bookid]);
}

?>

<!--导航栏-->
<ul id="d2" style="width: 100%; font-size: 1vw;">

    <li><a href="shoppingcart.php"><img src="../img/Cart.png" width="50" height="50"></a></li>
    <li><a href="login.html"><img src="../img/login.png" width="50" height="50"></a></li>

    <li style="float:left"><a href="MainPage.php"><img src="../img/logo.png" height="50"> </a></li>

</ul>
<!--总布局-->
<div id="all" style="width: 100%; font-size: 1vw;">

    <!--正式页面信息-->
    <div class="bookinfo">
        <!--    图片-->
        <div class="photo">
            <img width="300px" style="max-width:80%;overflow:hidden;" src="<?php echo $book[0] ?>">
        </div>
        <!--    介绍-->
        <div class="intro">
            <!--        书名-->
            <h1><?php echo $book[1] ?></h1>
            <!--        作者-->
            <h2><?php echo $book[2] ?></h2>
            <h2>Paperback (20 Aug 2013)</h2>
            <!--        价格-->
            <h2 style="color: lightcoral;"><?php echo "HKD" . $book[3]; ?></h2>
            <!--            点击add to cart后，在add to cart 表增加，需要用户id-->
            <!--            <a href="" onclick="removeday()" class="deletebtn">Delete</a>-->
            <!--            <button onclick=""><img src="../img/addtocart.png" id="cart" width="180"></button>-->
            <!--            <a href="" onclick="addBook()"> <img src="../img/addtocart.png" id="cart" width="180"></a>-->
            <?php
            $link = "../php/ProductDetails.php?new=" . $bookid."&buy=1";
            echo "<a href='".$link."'> <img src='../img/addtocart.png' id='cart' width='180'></a>"
            ?>

<!--            <a href=""> <img src="../img/addtocart.png" id="cart" width="180"></a>-->

            <!--            如果缺货会显示缺货信息，如果不缺提示有货-->
            <h2><?php
                if ($book[4] == 0) {
                    //相等
                    echo("There is no stock available at the moment, so stay tuned.");
                } else {
                    echo("10+ copies available online - Usually dispatched within two working days");
                } ?>
            </h2>
        </div>
    </div>


    <?php

    //    function addBook() { ... }


    //    找到最后一个元素：书本存货量。设为1，加入用户id来合并 辨别记录
    //    $book[sizeof($book) - 1] = '1';
    //
    //    $cart = implode(",", $book);
    function addBook()
    {
//        echo "<h1>hahaha</h1>";
        $cart = "XXX" . "," . $_GET['new'] . "," . "4" . "\r\n";
        $file = fopen("../dataFile/cart.txt", "at");
        fputs($file, $cart);
        fclose($file);

    }
    if (isset($_GET['buy'])) {
        addBook();
    }

    //    $numbytes = file_put_contents('../dataFile/cart.txt', $cart, FILE_APPEND); //如果文件不存在创建文件，并写入内容

    ?>
    <!--    不知道下面这句是干啥的-->
    <div class="bl"></div>


    <!--    信息块1 左侧的简介-->
    <div class="bookinformation1">
        <h2>Publisher's Synopsis</h2>
        <p>

            A spirited volume on the great adventures of science throughout history, for curious readers of all ages
        </p>
        <p>
            Science is fantastic. It tells us about the infinite reaches of space, the tiniest living organism, the
            human body, the history of Earth. People have always been doing science because they have always wanted to
            make sense of the world and harness its power. From ancient Greek philosophers through Einstein and Watson
            and Crick to the computer-assisted scientists of today, men and women have wondered, examined, experimented,
            calculated, and sometimes made discoveries so earthshaking that people understood the world-or themselves-in
            an entirely new way.
        </p>
        <p>
            This inviting book tells a great adventure story: the history of science. It takes readers to the stars
            through the telescope, as the sun replaces the earth at the center of our universe. It delves beneath the
            surface of the planet, charts the evolution of chemistry's periodic table, introduces the physics that
            explain electricity, gravity, and the structure of atoms. It recounts the scientific quest that revealed the
            DNA molecule and opened unimagined new vistas for exploration.
        </p>
        <p>
            Emphasizing surprising and personal stories of scientists both famous and unsung, A Little History of
            Science traces the march of science through the centuries. The book opens a window on the exciting and
            unpredictable nature of scientific activity and describes the uproar that may ensue when scientific findings
            challenge established ideas. With delightful illustrations and a warm, accessible style, this is a volume
            for young and old to treasure together.
        </p>
    </div>
    <!--    信息块2 右侧的简介-->
    <div class="bookinformation2">
        <h2>&nbsp;&nbsp;Book Information</h2>
        <p class="d6"> &emsp;ISBN: 9780300197136</p>
        <p class="d6"> &emsp; Publisher: Yale University Press</p>
        <p class="d6"> &emsp;Imprint: Yale University Press</p>
        <p class="d6"> &emsp; Pub date: 20 Aug 2013</p>
        <p class="d6"> &emsp; DEWEY: 509</p>
        <p class="d6"> &emsp; DEWEY edition: 23</p>
        <p class="d6"> &emsp; Language: English</p>
        <p class="d6"> &emsp; Number of pages: vi, 263</p>
        <p class="d6"> &emsp; Weight: 370g</p>
        <p class="d6"> &emsp; Height: 214mm</p>
        <p class="d6"> &emsp; Width: 139mm</p>
        <p class="d6"> &emsp; Spine width: 23mm</p>
    </div>
</div>


<!--底部contactus拦-->
<img class="zp" src="../img/block.png" height="1px">
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
        <a href="MainPage.php"> <img src="../img/logo.png" width="200px"></a>
    </div>
    <div id="Footer_Copyright">
        <a href="www.bookstore.com" class="Link" style="padding-left: 40%">© BOOKSTORE POWERED BY GOZILLA</a>
    </div>

</div>


</body>
</html>