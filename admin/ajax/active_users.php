<?php session_start();
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);
include "../../conn/conn.php";

$up = mysqli_query($conf, "update users set u_active=1  where u_code = '$p_code'") or die(mysqli_error($conf));

if ($up) {
    echo "User deleted successfuly";
} else {
    echo "";
}
