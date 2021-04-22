<?php include "../conn/conn.php";
    extract($_POST);
    //$imgFolder   is a variable declared in conn file
    if (empty($u_fname ) || $u_fname  == '') {
        echo "-1╩Enter your full name  ";
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
    $p_datetime = date('Y-m-d h:i:s');
    //$picuploaded = "";
   if (empty($u_password) || $u_password == '') {
        echo "-1╩Enter correct password ";
        exit;
    }
 
    if (redundancy_where_value_s($conf, "users", "u_email", trim(clean_value($conf, $u_email)), " or u_username = '".$u_username."'") > 0) {
        echo "-1╩"."The User already exist! ";
        exit;
    }
     $d = date("Y-m-d");
     $u_active = 1 ;
      $ins = mysqli_query($conf, "INSERT INTO `users` ( `u_fname`, `u_IP`, `u_email`,
														`u_username` , `u_password` ,  
                                                        `u_type`,
                                                        `u_reffer_from`,
                                                        -- `u_mobile` , 
                                                        `u_active` )  
                                                            VALUES ('" . 
                                                                    trim(clean_value($conf, $u_fname)) . "',  '" . 
                                                                    trim(clean_value($conf, ip_get("IP"))) . "',  '" . 
                                                                    clean_value($conf, $u_email) . "', '" . 
                                                                    clean_value($conf, $u_username) . "', '" . 
                                                                    md5($u_password) . "', 
                                                                    'user',  
                                                                    '".$_SESSION["reffer_from"]."', '" . 
                                                                   // clean_value($conf, $u_mobile) .  "' ,'" . 
                                                                     $u_active  . "')") //, '".$base_url.str_replace("../../","",$imgFolder).$picuploaded."'  )
                                or die(mysqli_error($conf));
            $new_id = mysqli_insert_id($conf);
 
if ($ins) {
    $ins_set =mysqli_query($conf, "INSERT INTO `settings` ( `s_title`, `s_u_code`, `s_keyword`,
														    `s_desc` , `s_email`  )
                                                            VALUES ('" .
                                                                trim(clean_value($conf, $u_fname)) . "',  '" .
                                                                clean_value($conf, $new_id) . "', '" .
                                                                clean_value($conf, $u_fname) . "', '" .
                                                                clean_value($conf, $u_fname) . "', '" .
                                                                clean_value($conf, $u_email) . "')") //, '".$base_url.str_replace("../../","",$imgFolder).$picuploaded."'  )
                                                                or die(mysqli_error($conf));
                                                            
    mysqli_query($conf, "INSERT INTO `log` ( `log_u_code`, `log_country`, `log_country_code`,
											 `log_state` , `log_city` , `log_location` , `log_address`   )
                                             VALUES ('" .
                                                    trim(clean_value($conf, $new_id)) . "',  '" .
                                                    clean_value($conf, ip_info("Visitor", "Country")) . "', '" .
                                                    clean_value($conf, ip_info("Visitor", "Country Code")) . "', '" .
                                                    clean_value($conf, ip_info("Visitor", "State")) . "', '" .
                                                    clean_value($conf, ip_info("Visitor", "City")) . "', '" .
                                                    clean_value($conf, ip_info("Visitor", "location")) . "', '" .
                                                    clean_value($conf, ip_info("Visitor", "Address")) . "')") //, '".$base_url.str_replace("../../","",$imgFolder).$picuploaded."'  )
                                                or die(mysqli_error($conf));

            $_SESSION['User_code_frontend'] = $new_id;

    echo "1╩"."The data saved successfuly╩".$_SESSION['User_code_frontend'];
}
