<?php include "../conn/conn.php";
    extract($_POST);
        if (redundancy_where_value_s($conf, "maillist", "m_email", trim(clean_value($conf, $mailpost)), "") > 0) {
            echo "-1╩" . "You have added this email before";
            exit;
        }
   
          $ins = mysqli_query($conf, "INSERT INTO `maillist` ( `m_u_code`,  `m_email`, `m_IP`, `m_country`,
                                                                `m_region` , `m_reffer_from` )
                VALUES ('" . trim(clean_value($conf, $_SESSION['User_code_frontend'])) . "',
                        '" . trim(clean_value($conf, $mailpost)) . "',  
                        '" . trim(clean_value($conf, ip_get("IP"))) . "',  
                        '" . clean_value($conf, ip_info("Visitor", "Country")) . "', 
                        '" . clean_value($conf, ip_info("Visitor", "Region")). "', 
                        '" . $_SESSION["reffer_from"] . "')") //, '".$base_url.str_replace("../../","",$imgFolder).$picuploaded."'  )
        or die(mysqli_error($conf));
    if($ins )
        echo "1╩"."Thanks for subscribe with us";
?>