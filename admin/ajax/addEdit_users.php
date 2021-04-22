<?php include "../../conn/conn.php";

if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
 } else {
    $usr_code = 0;
}

extract($_POST);

//$imgFolder   is a variable declared in conn file
if (empty($u_fname ) || $u_fname  == '') {
    echo "-1╩Enter your full name  ";
    exit;
}
if (empty($u_sex) || $u_sex == '') {
    echo "-1╩Choose you gender ";
    exit;
}
if (empty($u_email) || $u_email == '') {
    echo "-1╩ Enter your unique email ";
    exit;
}
if (empty($u_username) || $u_username == '') {
    echo "-1╩ Enter your unique username ";
    exit;
}
if (empty($u_type) || $u_type == '') {
    echo "-1╩ Choose user type ";
    exit;
}

    if (isset($u_active) && ($u_active == "on" || $u_active == "0")) 
        $u_active = 1;
     else 
        $u_active = 0;
    
    
    

$p_datetime = date('Y-m-d h:i:s');
//$picuploaded = "";

if (isset($curr_code) && $curr_code != '') //edit mode
{
    if (redundancy_where_value_s($conf, "users", "(u_email", trim(clean_value($conf, $u_email)), " or u_username = '".$u_username."') and u_code <> '".$curr_code."'") > 0) {
        echo "-1╩"."The User is already exist !";
        exit;
    }
        // if (isset($cat_photo["name"]) && !empty($cat_photo["name"])) {
        //     $basefile = $_FILES["cat_photo"]["name"];
        //     $tempfile = $_FILES["cat_photo"]["tmp_name"];
        //     $filetype = "pic";
        //     $picuploaded = upload_file($imgFolder, $basefile, $tempfile, $filetype);
            
        //     $oldphoto_row = get_where_value_s($conf, "categories", "cat_code",$curr_code, "");
        //     if(!empty($oldphoto_row))
        //     {
        //        $base_photo = str_replace($base_url,"../../",$oldphoto_row["cat_photo"]);
        //        unlink($base_photo);
        //     }
        // }

        // if ($picuploaded != '') {
        //     $colup = ",`cat_photo` = '" . $base_url . str_replace("../../", "", $imgFolder) . $picuploaded . "'";
        // } else {
        //     $colup = "";
        // }
        if(!empty($u_password))
           $pwd = " u_password = '".md5($u_password) ."' ,";
           else
           $pwd = "";
      $ins = mysqli_query($conf, "update `users` set `u_fname` ='" . trim(clean_value($conf, $u_fname)) . "',
														 `u_sex` ='" . trim(clean_value($conf, $u_sex)) . "',
														 `u_email` ='" . trim(clean_value($conf, $u_email)) . "',
														 `u_username` ='" . trim(clean_value($conf, $u_username)) . "',
                                                         $pwd
														 `u_type` ='" . trim(clean_value($conf, $u_type)) . "',
 														 `u_mobile` = '" . clean_value($conf, $u_mobile) . "' ,
														 `u_active` = '" . clean_value($conf, $u_active) . "' 
                                                          where u_code='$curr_code'") or die(mysqli_error($conf));
} else // insert mode
{
   if (empty($u_password) || $u_password == '') {
        echo "-1╩Enter correct password ";
        exit;
    }
 
    if (redundancy_where_value_s($conf, "users", "u_email", trim(clean_value($conf, $u_email)), " or u_username = '".$u_username."'") > 0) {
        echo "-1╩"."The User already exist! ";
        exit;
    }
        // if (empty($cat_photo["name"])) {
        //     echo "-1╩"."You must upload correct photo";
        //     exit;
        // } else {
        //     $basefile = $cat_photo["name"];
        //     $tempfile = $cat_photo["tmp_name"];
        //     $filetype = "pic";
        //     $picuploaded = upload_file($imgFolder, $basefile, $tempfile, $filetype);
        // }

    $d = date("Y-m-d");
      $ins = mysqli_query($conf, "INSERT INTO `users` ( `u_fname`, `u_sex`, `u_email`,
														    `u_username` , `u_password` ,  `u_type` ,  
                                                            `u_birthday` ,  `u_mobile` ,  `u_active` )  
                                                            VALUES ('" . 
                                                                    trim(clean_value($conf, $u_fname)) . "',  '" . 
                                                                    clean_value($conf, $u_sex) . "', '" . 
                                                                    clean_value($conf, $u_email) . "', '" . 
                                                                    clean_value($conf, $u_username) . "', '" . 
                                                                    md5($u_password) . "', '" . 
                                                                    clean_value($conf, $u_type) . "', '" . 
                                                                    clean_value($conf, $u_birthday) . "', '" . 
                                                                    clean_value($conf, $u_mobile) . "' ,'" . 
                                                                    clean_value($conf, $u_active) . "')") //, '".$base_url.str_replace("../../","",$imgFolder).$picuploaded."'  )
    or die(mysqli_error($conf));
}
if ($ins) {
   
    echo "1╩"."The data saved successfuly";
}
