<?php include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);


$up = mysqli_query($conf, "update vendors set ven_active='".$ven_active."'  where ven_code = '$ven_code'") or die(mysqli_error($conf));

if ($up) {
    if($ven_active == 0)
        echo "-1╩"."Vendor deleted successfuly";
     else
        echo "1╩"."Vendor activated successfuly";
} else {
    echo "";
}
