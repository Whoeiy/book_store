<?php

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$file = fopen('../dataFile/user.txt', 'rt');
$good = false;
while (!feof($file)) {
    $line = fgets($file);
    $array = explode(",", $line);
    if (trim($array[2]) == $_POST['email'] && trim($array[3]) == $_POST['pwd']) {
        $lname = trim($array[1]);
        $good = true;
        $userId = $array[4];
        break;
    }
}

if ($good) {

    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['lname'] = $lname;
    $_SESSION['userId'] = $userId;
    echo '<script type="text/javascript"> window.open("MainPage.php","_self");</script>';

} else {
    echo "<script type='text/javascript'>";
    echo "alert('invalid UserName or Password');";
    echo "history.back();";
    echo "</script>";
}
fclose($file);


?>