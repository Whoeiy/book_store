
<?php
    function getItems($userid) {
        $items = array();
        $fp = fopen('../dataFile/cart.txt', 'r');
        while(!feof($fp)){
            $line = fgets($fp);
            $arr = explode(',', $line);
            if($userid == $arr[0]){
                $items[] = $line;
            }
        }
        fclose($fp);
        return $items;
    }

    if(isset($_POST['userId'])){
        $items = getItems($_POST['userId']);
    } else {
        $items = getItems(trim($_SESSION["userId"]));
    }

    $item_price = array();

    for($i = 0; $i < sizeof($items); $i++){
        $item = explode(',', $items[$i]);
        echo("<div class='order_item'>");
        echo("<div class='book_img'>");
        echo("<img src=" . $item[2] . ">");
        echo("</div>");
        echo(" <div class='item_middle'><div class='item_detail'>");
        echo("<p id='item_name'>" . $item[3] . "</p>");
        echo("<p id='item_quan'>Quantity:" . $item[6] . "</p>");
        echo("</div></div>");
        echo("<div class='item_price'>");
        $price = doubleval($item[5]) * intval($item[6]);
        $item_price[] = $price;
        echo("<p id='order_price'>" . $price . " HKD</p>");
        echo("</div></div>");
    }
    echo("<div class='total'>");
        echo("<p id='total_attri'>Total</p>");
        echo("<p id='total_price'>" . array_sum($item_price) . " HKD</p>");
    echo("</div>");
?>