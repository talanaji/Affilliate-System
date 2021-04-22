<?php include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}
  extract($_POST);
 if(USER_TYPE !='admin')
    $usercode = $usr_code ;
  else
    $usercode = $p_user_id;

  $upzero = mysqli_query($conf, "update products set p_ismain='0' where  p_user_id = '" . $usercode . "' ") or die(mysqli_error($conf));

if($p_ismain == 1 ){     
        $up = mysqli_query($conf, "update products set p_ismain='".$p_ismain."' where  p_user_id = '". $usercode."' and p_code='".$p_code."'") or die(mysqli_error($conf));
  }
 
if ($up) 
         echo "1╩"."Product checked Mained successfuly";
     else
        echo "-1╩"."Product inchecked Mained successfuly";
 
