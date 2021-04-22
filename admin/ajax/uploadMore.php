<?php include "../../conn/conn.php";

if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
 } else {
    $usr_code = 0;
}

extract($_POST);
extract($_FILES);
 
 
$p_date = date('Y-m-d h:i:s');
$picuploaded = "";

 
 foreach ($_FILES["extraPhoto"]["name"] as $key=>$value) {
       
                $basefile = $extraPhoto["name"][$key];
                $tempfile = $extraPhoto["tmp_name"][$key];
                $typfile = $extraPhoto["type"][$key];
                $sizefile = $extraPhoto["size"][$key];
                $filetype = "pic";
                $picuploaded = upload_file($imgFolder, $basefile, $tempfile, $filetype);
     
      $ins = mysqli_query($conf, "INSERT INTO `photos` ( `ph_url`, `ph_mime_type`, `ph_width`,
                                                         `ph_height` ,  `ph_prod_id`,  
                                                         `ph_is_main`,  `ph_active`  )  
                                   VALUES ('" . $base_url . str_replace("../../", "", $imgFolder).$picuploaded."',
                                           '" . trim(clean_value($conf, $typfile)) . "',
                                           '" . clean_value($conf, $sizefile) . "',
                                           '" . clean_value($conf, $sizefile) . "',
                                            '" . clean_value($conf, $curr_code) . "' ,
                                            '0' ,'1' )") or die(mysqli_error($conf));
            }

  if ($ins) {
        echo "1╩"."The data saved successfuly";
    }
