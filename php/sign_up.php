<?php 

require_once 'db_connect.php';

$username = $_POST['user'];
$name = $_POST['name'];
$email = $_POST['email'];
$psw = $_POST['psw'];
$hashed_pass = password_hash($psw, PASSWORD_DEFAULT);
    
    $sql = "SELECT user FROM login WHERE user=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "Error Occured";
        echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rst = mysqli_stmt_num_rows($stmt);
        if ($rst > 0) {
            echo "Username Already Taken";
            echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';

        }
        else { 
            $sql = "INSERT INTO login (user, name, email, pass) VALUES ('$username', '$name', '$email', '$hashed_pass')";
            mysqli_query( $conn, $sql);
            header("Location: ../index.html");
        }
    }

?>