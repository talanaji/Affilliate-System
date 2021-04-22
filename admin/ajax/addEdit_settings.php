<?php include "../../conn/conn.php";

if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
 } else {
    $usr_code = 0;
}

extract($_POST);
extract($_FILES);
 //$imgFolder   is a variable declared in conn file
if (empty($s_title ) || $s_title  == '') {
    echo "-1╩Enter your site name  ";
    exit;
}
 $picuploaded = "";
 
if (isset($curr_code) && $curr_code != '') //edit mode
{
    if (redundancy_where_value_s($conf, "settings", "s_u_code", trim(clean_value($conf, $s_u_code)), " and s_code <> '".$curr_code."'") > 0) {
        echo "-1╩"."The settings for this user is already exist !";
        exit;
    }
        if (isset($s_logo["name"]) && !empty($s_logo["name"])) {
            $basefile = $_FILES["s_logo"]["name"];
            $tempfile = $_FILES["s_logo"]["tmp_name"];
            $filetype = "pic";
            $oldphoto_row = get_where_value_s($conf, "settings", "s_code", $curr_code, "");
            if (!empty($oldphoto_row)) {
                $base_photo = str_replace($base_url, "../../", $oldphoto_row["s_logo"]);
                unlink($base_photo);
            }

            $picuploaded = upload_file($imgFolder, $basefile, $tempfile, $filetype);
           
        }

        if ($picuploaded != '') {
            $colup = "`s_logo` = '" . $base_url . str_replace("../../", "", $imgFolder) . $picuploaded . "' ,";
        } else {
            $colup = "";
        }
        
          $ins = mysqli_query($conf, "update `settings` set `s_title` ='" . trim(clean_value($conf, $s_title)) . "',
														 `s_keyword` ='" . trim(clean_value($conf, $s_keyword)) . "',
														 `s_background_color` ='" . trim(clean_value($conf, $s_background_color)) . "',
														 `s_desc` ='" . trim(clean_value($conf, $s_desc)) . "',
														 `s_font_color` ='" . trim(clean_value($conf, $s_font_color)) . "',
														 `s_btn_color` ='" . trim(clean_value($conf, $s_btn_color)) . "',
														 `s_labels_color` ='" . trim(clean_value($conf, $s_labels_color)) . "',
														 `s_slider_btn_color` ='" . trim(clean_value($conf, $s_slider_btn_color)) . "',
														 `s_email` ='" . trim(clean_value($conf, $s_email)) . "',
 														 `s_whatsapp_link` ='" . trim(clean_value($conf, $s_whatsapp_link)) . "',
 														 `s_twitter_link` ='" . trim(clean_value($conf, $s_twitter_link)) . "',
 														 `s_fb_link` ='" . trim(clean_value($conf, $s_fb_link)) . "',
 														 `s_fbmessanger_link` = '" . clean_value($conf, $s_fbmessanger_link) . "' ,
                                                          $colup  
														 `s_pinterest` = '" . clean_value($conf, $s_pinterest) . "' ,
														 `s_instagram` = '" . clean_value($conf, $s_instagram) . "' ,
														 `s_opentime` = '" . clean_value($conf, $s_opentime) . "' ,
														 `s_address` = '" . clean_value($conf, $s_address) . "' ,
														 `s_latitude` = '" . clean_value($conf, $s_latitude) . "' ,
														 `s_longitude` = '" . clean_value($conf, $s_longitude) . "' ,
 														 `s_contact_phone` = '" . clean_value($conf, $s_contact_phone) . "' 
                                                          where s_code='$curr_code'") or die(mysqli_error($conf));
} else // insert mode
{
    if (redundancy_where_value_s($conf, "settings", "s_u_code", trim(clean_value($conf, $s_u_code)), "") > 0) {
        echo "-1╩"."The settings for this user is already exist! ";
        exit;
    }
        if (empty($s_logo["name"])) {
            echo "-1╩"."You must upload correct photo";
            exit;
        } else {
            $basefile = $s_logo["name"];
            $tempfile = $s_logo["tmp_name"];
            $filetype = "pic";
            $picuploaded = upload_file($imgFolder, $basefile, $tempfile, $filetype);
        }
 
       $ins = mysqli_query($conf, "INSERT INTO `settings` ( `s_title`, `s_u_code`, `s_keyword`,
														    `s_desc` , `s_background_color` ,  `s_font_color` ,  
                                                            `s_btn_color` ,  `s_labels_color` ,  `s_slider_btn_color`,
                                                            `s_email` ,  `s_whatsapp_link` ,  `s_twitter_link`,
                                                            `s_fb_link` ,  `s_fbmessanger_link` ,  `s_contact_phone` , `s_logo`, 
                                                                `s_pinterest`, `s_instagram`, `s_opentime`, `s_address`, `s_latitude`, `s_longitude`  )  
                                                            VALUES ('" . 
                                                                    trim(clean_value($conf, $s_title)) . "',  '" . 
                                                                    clean_value($conf, $s_u_code) . "', '" . 
                                                                    clean_value($conf, $s_keyword) . "', '" . 
                                                                    clean_value($conf, $s_desc) . "', '" . 
                                                                    clean_value($conf, $s_background_color) . "', '" . 
                                                                    clean_value($conf, $s_font_color) . "', '" . 
                                                                    clean_value($conf, $s_btn_color) . "' ,'" . 
                                                                    clean_value($conf, $s_labels_color) . "' ,'" . 
                                                                    clean_value($conf, $s_slider_btn_color) . "' ,'" . 
                                                                    clean_value($conf, $s_email) . "' ,'" . 
                                                                    clean_value($conf, $s_whatsapp_link) . "' ,'" . 
                                                                    clean_value($conf, $s_twitter_link) . "' ,'" . 
                                                                    clean_value($conf, $s_fb_link) . "' ,'" . 
                                                                    clean_value($conf, $s_fbmessanger_link) . "' ,'" . 
                                                                    clean_value($conf, $s_contact_phone) . "' ,  '".
                                                                    clean_value($conf, $picuploaded) ."' , '".
                                                                    clean_value($conf, $s_pinterest) ."' , '".
                                                                    clean_value($conf, $s_instagram) ."' , '".
                                                                    clean_value($conf, $s_opentime) ."' , '".
                                                                    clean_value($conf, $s_address) ."' , '".
                                                                    clean_value($conf, $s_latitude) ."' , '".
                                                                    clean_value($conf, $s_longitude) ."')") //, '".$base_url.str_replace("../../","",$imgFolder).$picuploaded."'  )
                                                 or die(mysqli_error($conf));
}
if ($ins) {
    echo "1╩"."The data saved successfuly";
}
