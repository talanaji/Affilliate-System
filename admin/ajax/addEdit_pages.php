<?php include "../../conn/conn.php";

if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
 } else {
    $usr_code = 0;
}

extract($_POST);
"Array
(
    [curr_code] => 
    [pa_type] => About Us
    [pa_text] => <p>sdsdf werwr wer werwe r wer</p>
    [pa_u_code] => 9
)
";
//$imgFolder   is a variable declared in conn file
if (empty($cat_title ) || $cat_title  == '') {
    echo "Please Choose stream name  ";
    exit;
}
if (empty($cat_desc) || $cat_desc == '') {
    echo "Enter the arabic title ";
    exit;
}
 

    if (isset($cat_active) && ($cat_active == "on" || $cat_active == "0")) 
        $c_active = 1;
     else 
        $c_active = 0;
    
    if (isset($cat_is_slider) && ($cat_is_slider == "on" || $cat_is_slider == "0" )) 
        $cat_is_slider = 1;
     else 
        $cat_is_slider = 0;
    

        $p_datetime = date('Y-m-d h:i:s');
        $picuploaded = "";

        if (isset($curr_code) && $curr_code != '') //edit mode
        {
            if (redundancy_where_value_s($conf, "categories , users", "cat_title", trim(clean_value($conf, $cat_title)), " and cat_user_id = u_code and cat_user_id='".USER_CODE."'  and cat_code <> '$curr_code'") > 0) {
                echo "-1╩"."The Category is already exist !";
                exit;
            }
                if (isset($cat_photo["name"]) && !empty($cat_photo["name"])) {
                    $basefile = $_FILES["cat_photo"]["name"];
                    $tempfile = $_FILES["cat_photo"]["tmp_name"];
                    $filetype = "pic";
                    $picuploaded = upload_file($imgFolder, $basefile, $tempfile, $filetype);
                    
                    $oldphoto_row = get_where_value_s($conf, "categories", "cat_code",$curr_code, "");
                    if(!empty($oldphoto_row))
                    {
                    $base_photo = str_replace($base_url,"../../",$oldphoto_row["cat_photo"]);
                    unlink($base_photo);
                    }
                }

                if ($picuploaded != '') {
                    $colup = ",`cat_photo` = '" . $base_url . str_replace("../../", "", $imgFolder) . $picuploaded . "'";
                } else {
                    $colup = "";
                }

            $ins = mysqli_query($conf, "update `categories` set `cat_title` ='" . trim(clean_value($conf, $cat_title)) . "',
                                                                `cat_desc` ='" . trim(clean_value($conf, $cat_desc)) . "',
                                                                `cat_user_id` = '" . clean_value($conf, USER_CODE) . "',
                                                                `cat_active` = '" . clean_value($conf, $c_active) . "' ,
                                                                `cat_is_slider` = '" . clean_value($conf, $cat_is_slider) . "' 
                                                                $colup
                                                                where cat_code='$curr_code'") or die(mysqli_error($conf));
        } else // insert mode
        {
            if (redundancy_where_value_s($conf, "categories , users", "cat_title", trim(clean_value($conf, $cat_title)), " and cat_user_id = u_code and cat_user_id='".USER_CODE."'") > 0) {
                echo "-1╩"."The Category already exist! ";
                exit;
            }
                if (empty($cat_photo["name"])) {
                    echo "-1╩"."You must upload correct photo";
                    exit;
                } else {
                    $basefile = $cat_photo["name"];
                    $tempfile = $cat_photo["tmp_name"];
                    $filetype = "pic";
                    $picuploaded = upload_file($imgFolder, $basefile, $tempfile, $filetype);
                }

            $d = date("Y-m-d");
            $ins = mysqli_query($conf, "INSERT INTO `categories` ( `cat_title`, `cat_desc`, `cat_user_id`,
                                                                    `cat_active` , `cat_is_slider` ,  `cat_photo`  )  VALUES ('" . trim(clean_value($conf, $cat_title)) . "', '" . 
                                                                                            trim(clean_value($conf, $cat_desc)) . "',  '" . 
                                                                                            clean_value($conf, USER_CODE) . "', '" . 
                                                                                            clean_value($conf, $c_active) . "' ,'" . 
                                                                                            clean_value($conf, $cat_is_slider) . "' , '".$base_url.str_replace("../../","",$imgFolder).$picuploaded."'  )")
            or die(mysqli_error($conf));
        }
        if ($ins) {
            echo "1╩"."The data saved successfuly";
        }
