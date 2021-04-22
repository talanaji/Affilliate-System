<?php include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);


$up = mysqli_query($conf, "update products set p_active='".$p_active."'  where p_code = '".$p_code."'") or die(mysqli_error($conf));
if($p_active == 1)
$upcat = mysqli_query($conf, "update categories set cat_active='1'  where cat_code = '$p_cat_id'") or die(mysqli_error($conf));

if ($up) {
    if($p_active == 0)
        echo "-1╩"."Product deleted successfuly";
     else
        echo "1╩"."Product activated successfuly";
} else {
    echo "";
}
