<?php include "../../conn/conn.php";

if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
 } else {
    $usr_code = 0;
}

    extract($_POST);
    extract($_FILES);
 
    if(empty($p_user_id) || $p_user_id == '')
    {
        echo "Please select category for user ";
        exit;
    }
    
     
     //$imgFolder   is a variable declared in conn file
    if (empty($p_cat_id ) || $p_cat_id  == '') {
        echo "Please Choose Category name  ";
        exit;
    }
    if (empty($p_url) || $p_url == '') {
        echo "Enter the Product URL title ";
        exit;
    }
    if (empty($p_name) || $p_name == '') {
        echo "Enter the Product Name title ";
        exit;
    }
    if (isset($p_active) && $p_active == "on") {
        $p_active = 1;
    } else {
        $p_active = 0;
    }
    $usercode = $p_user_id; // variable stored in the row

    if (isset($p_is_featured) && $p_is_featured == "on") {
            $p_is_featured = 1;
        } else {
            $p_is_featured = 0;
        }
        if (isset($p_ismain) && $p_ismain == "on") {
            $p_ismain = 1;
        } else {
            $p_ismain = 0;
        }
    
    $p_date = date('Y-m-d h:i:s');
    $picuploaded = "";

    if (isset($curr_code) && $curr_code != '') //edit mode
    {
            if ($p_ismain == 1)  
              $upmain = mysqli_query($conf, "update products SET p_ismain = 0 where  p_user_id ='".  $usercode."'  and p_ismain = 1 ") or die(mysqli_error($conf));
          
        $ins = mysqli_query($conf, "update `products` set `p_cat_id` ='" . trim(clean_value($conf, @$p_cat_id)) . "',
                                                            `p_name` ='" . trim(clean_value($conf, @$p_name)) . "',
                                                            `p_brand` = '" . clean_value($conf, @$p_brand) . "',
                                                            `p_productCategory` = '" . clean_value($conf, @$p_productCategory) . "',
                                                            `p_model` = '" . clean_value($conf, @$p_model) . "',
                                                            `price` = '" . clean_value($conf, @$price) . "',
                                                            `priceCurrencyCode` = '" . clean_value($conf, @$priceCurrencyCode) . "',
                                                            `p_description` = '" . nl2br($p_description) . "',
                                                            `p_is_featured` = '" .  $p_is_featured  . "',
                                                            `p_ismain` = '" .   $p_ismain . "',
                                                            `p_user_id` = '" .   $p_user_id . "',
                                                            `p_active` = '" . clean_value($conf, $p_active) . "'
                                                             where p_code='$curr_code' ") or die(mysqli_error($conf));
    } 
    else // insert mode
    {
    if ($p_ismain == 1)   
        $upmain = mysqli_query($conf, "update products SET p_ismain = 0 where   p_user_id='" . $usercode . "' and p_ismain = 1 ") or die(mysqli_error($conf));
 

    $ins = mysqli_query($conf,"INSERT INTO products(`p_url`, `p_domain_name` , `p_name`, `p_brand`, 
                                                    `p_productCategory`, `p_model`, `p_manufacturerUrl`, 
                                                    `p_description`, `p_cat_id`, `p_date`, `p_views`, `p_active`, `p_is_featured`, `p_ismain` ,`priceCurrencyCode`,`price` ,`p_user_id`) 
                                                    VALUES('".@$p_url."','".@$p_domain_name."','".@$p_name."','".@$p_brand."','".@$p_productCategory."','".@$p_model."',
                                                            '".@$p_manufacturerUrl."','". nl2br($p_description)."','".@$p_cat_id."','".$p_date."','0','".$p_active."' ,'".$p_is_featured."' ,'".$p_ismain."' , '" . clean_value($conf, $priceCurrencyCode) . "','" . clean_value($conf, $price) . "', '".clean_value($conf, $usercode)."')") or die(mysqli_error($conf));
    $NEW_ID = mysqli_insert_id($conf);
        
        for ($photo = 0; $photo <= count($ph_url)-1; $photo++) {
            if($photo == 0)
            $is_main = 1;
            else
            $is_main = 0;
                // Your file
                $expPh = explode("╦",$ph_url[$photo]);
                $file =  $expPh[0];
                $ext = pathinfo(parse_url( $file, PHP_URL_PATH), PATHINFO_EXTENSION );
                // Open the file to get existing content
                $data = file_get_contents($file);
                // New file
                $new = '../../uploads/'.rand(0,999).$photo.".".$ext;
                // Write the contents back to a new file
                file_put_contents($new , $data);
            $photoCol = $base_url.str_replace('../../','',$new);
            $insP = mysqli_query($conf,"INSERT INTO photos( `ph_url`, `ph_mime_type`, `ph_width`, `ph_height`, 
                                                                `ph_prod_id`, `ph_is_main`, `ph_active`) 
                                                                VALUES('".$photoCol."','".$expPh[3]."','".$expPh[1]."','".$expPh[2]."','".$NEW_ID."','".$is_main."','1')") or die(mysqli_error($conf));
            }
        }
     if ($ins) {
                echo "1╩" . "The data saved successfuly";
            }
            else
            {
                echo "-1╩" . "The data saved successfuly";
            }
