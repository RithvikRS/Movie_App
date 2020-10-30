<?php

require 'db_connect.php';

$user = $_POST['user'];
$psw = $_POST['psw'];


if(empty($user)|| empty($psw)) {
    echo "Username or password is empty";
    echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
}
else {
    $sql = "SELECT * FROM login WHERE user=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Error Occured";
        echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            $pdwCheck = password_verify($psw, $row['pass']);
            if($pdwCheck == false)
            {
                echo "Wrong Password";
                echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>'; 
            }
            else if($pdwCheck == true) {
                echo "Correct Password";
                session_start();
                $_SESSION["name"]=$user;
                header("location: ../Website/index.php");
            }
            else {
                echo "Wrong Password";
                echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
            }
        }
        else {
            echo "No user";
            echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
        }
    }

}

?>