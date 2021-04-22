<?php include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);

$mainv = $ph_is_main;
$ph_cd = $ph_code ; 
$prod_id = $ph_prod_id;
 
if($mainv == 1 ){
    $up =  mysqli_query($conf, "update photos set ph_is_main='".$mainv."'  where ph_code = '$ph_code' and ph_prod_id='".$prod_id."'") or die(mysqli_error($conf));
    $up2 = mysqli_query($conf, "update photos set ph_is_main='0'  where  ph_prod_id='".$prod_id."' and ph_code <>'".$ph_code."'") or die(mysqli_error($conf));
}
else
 $up2 = mysqli_query($conf, "update photos set ph_is_main='1'  where  ph_prod_id='" . $prod_id . "' limit 1 ") or die(mysqli_error($conf));

if ($up) 
         echo "-1╩"."Photo checked successfuly";
     else
        echo "1╩"."Photo inchecked successfuly";
 
