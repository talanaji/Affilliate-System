<?php include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);
 
     
    $selcurr = mysqli_query($conf, "select * from photos  where ph_code = '".$ph_code."'") or die(mysqli_error($conf));
    $rowcurr = mysqli_fetch_array($selcurr);

    unlink(str_replace($base_url,"../../",$rowcurr["ph_url"]));
    
    $up = mysqli_query($conf, "delete from photos where ph_code = '$ph_code'") or die(mysqli_error($conf));
    
 

if ($up ) {
    echo "-1╩" . "Photo deleted successfuly";
} else {
    echo "1╩" . "Error in delete photo";
}
