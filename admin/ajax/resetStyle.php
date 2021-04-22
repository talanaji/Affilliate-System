<?php include "../../conn/conn.php";
if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
    $usr_code = $_SESSION["User_code"];
} else {
    $usr_code = 0;
}

extract($_POST);

$up = mysqli_query($conf, "update settings set 
                            s_background_color=''  ,
                            s_font_color='',  
                            s_btn_color=''  ,
                            s_labels_color=''  ,
                            s_slider_btn_color=''  
                            
                            where s_code = '$curr_codePost'") or die(mysqli_error($conf));

if ($up) {
    echo "The style reset successfuly ";
} else {
    echo "";
}
