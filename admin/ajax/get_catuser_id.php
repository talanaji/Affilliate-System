<?php session_start();
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}
 if(!empty($_POST["cat_code_post"]))
{
    extract($_POST);
    include "../../conn/conn.php";
    
    $seluserid = mysqli_query($conf,"select cat_user_id from categories where cat_code='".$cat_code_post."'") or die(mysqli_error($conf));
    $row = mysqli_fetch_array($seluserid);
    echo $row["cat_user_id"];
}

?>