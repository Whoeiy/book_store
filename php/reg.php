<?php
$file = fopen("../dataFile/user.txt", "r");
$finduser = false;
while (!feof($file)) {
    $line = fgets($file);
    $array = explode(",", $line);
    if (trim($array[2]) == $_POST['email']) {
        $finduser = true;
        break;
    }
}
fclose($file);

// register user or pop up message
if ($finduser) {
    echo $_POST["email"];
    echo "<script type='text/javascript'>";
    echo "alert(' The email is exist!');";
    echo "history.back();";
    echo "</script>";

} else {

    while (true) {
        $userId = getRandomId();
        if (getAccountById($userId) == null) {
            break;
        }
    }
    $file = fopen("../dataFile/user.txt", "at");
    fputs($file, $_POST["fname"] . "," . $_POST["lname"] . "," . $_POST["email"] . "," . $_POST["pwd"] . "," . $userId . "\r\n");
    fclose($file);

    echo "<script>alert('Register successful！');</script>";
    echo "<script>alert('Your unique userId is " . $userId . ". Please keep it carefully!!');</script>";
    echo '<script type="text/javascript"> window.open("login.html","_self");</script>';
}
function getRandomId()
{

    $Num1 = rand(10000000, 99999999);
    return $Num1;
}

function getAccountById($id)
{
    $file = fopen("../dataFile/user.txt", "r");
    $finduser = false;
    while (!feof($file)) {
        $line = fgets($file);
        $array = explode(",", $line);
        if (trim($array[4]) == $id) {
            fclose($file);
            return $id;
        }
    }
    fclose($file);
    return null;
}

?>
