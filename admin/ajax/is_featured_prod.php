<?php include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);
  $whereST = " where   p_code = '".$p_code."' and p_cat_id ='".$p_cat_id."'" ; 
  
 
 
if($p_is_featured == 1 ){
      $up = mysqli_query($conf, "update products set p_is_featured='".$p_is_featured."'". $whereST) or die(mysqli_error($conf));
  }
else
 $up2 = mysqli_query($conf, "update products set p_is_featured='1' ". $whereST) or die(mysqli_error($conf));

if ($up) 
         echo "1╩"."Product checked featured successfuly";
     else
        echo "-1╩"."Product inchecked featured successfuly";
 
