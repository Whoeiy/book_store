
<?php
    function getItems($orderid) {
        $items = array();
        $fp = fopen('./orderItem.txt', 'r');
        while(!feof($fp)){
            $line = fgets($fp);
            $arr = explode(',', $line);
            if($orderid == $arr[0])
            $items[] = $line;
        }
        fclose($fp);
        return $items;
    }

    if(isset($_GET['orderid'])){
        $items = getItems($_GET["orderid"]);
    } else {
        $items = getItems($_SESSION["orderid"]);
    }

    $item_price = array();

    for($i = 0; $i < sizeof($items); $i++){
        $item = explode(',', $items[$i]);
        echo("<div class='order_item'>");
        echo("<div class='book_img'>");
        echo("<img src=" . $item[4] . ">");
        echo("</div>");
        echo(" <div class='item_middle'><div class='item_detail'>");
        echo("<p id='item_name'>" . $item[5] . "</p>");
        echo("<p id='item_quan'>Quantity:" . $item[2] . "</p>");
        echo("</div></div>");
        echo("<div class='item_price'>");
        $price = doubleval($item[3]) * intval($item[2]);
        $item_price[] = $price;
        echo("<p id='order_price'>" . $price . " HKD</p>");
        echo("</div></div>");
    }
    echo("<div class='total'>");
        echo("<p id='total_attri'>Total</p>");
        echo("<p id='total_price'>" . array_sum($item_price) . " HKD</p>");
    echo("</div>");
?>