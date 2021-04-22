<?php include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);
 
     
    $up = mysqli_query($conf, "update photos set ph_active='" . $ph_active . "'  where ph_code = '$ph_code'") or die(mysqli_error($conf));
 
 

if ($up && $ph_active == 0) {
    echo "-1╩" . "Photo checked successfuly";
} else {
    echo "1╩" . "Photo inchecked successfuly";
}
