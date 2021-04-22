<?php  include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);


$up = mysqli_query($conf, "update users set u_active='".$u_active."'  where u_code = '$u_code'") or die(mysqli_error($conf));

if ($up) {
    echo "User deleted successfuly";
} else {
    echo "";
}
