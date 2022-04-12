<?php
$file=fopen("user.txt","r");
    $finduser = false;
    while(!feof($file))
    {
        $line = fgets($file);
        $array = explode(",",$line);
        if(trim($array[2]) == $_POST['email'])
        {
            $finduser=true;
            break;
        }
    }
    fclose($file);
 
    // register user or pop up message
    if( $finduser )
    {
        echo $_POST["email"];
        echo "<script type='text/javascript'>";
	echo "alert(' The email is exist!');";
	echo "history.back();";
	echo "</script>";

    }
    else
    {
        $file = fopen("user.txt", "at");
        fputs($file,$_POST["fname"].",".$_POST["lname"].",".$_POST["email"].",".$_POST["pwd"]."\r\n");
        fclose($file);
     
        echo "<script>alert('Register successful！');</script>"; 
      echo '<script type="text/javascript"> window.open("login.html","_self");</script>'; 
    }
?>
