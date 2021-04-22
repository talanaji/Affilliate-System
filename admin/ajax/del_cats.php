<?php include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);


$up = mysqli_query($conf, "update categories set cat_active='".$cat_active."'  where cat_code = '$cat_code'") or die(mysqli_error($conf));
$up = mysqli_query($conf, "update products set p_active='".$cat_active."'  where p_cat_id = '$cat_code'") or die(mysqli_error($conf));

if ($up) {
    if($cat_active == 0)
        echo "-1╩"."Category deleted successfuly";
     else
        echo "1╩"."Category activated successfuly";
} else {
    echo "";
}
