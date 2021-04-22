<?php   include "../../conn/conn.php";
if ($_SESSION["User_code"] != '') {
   
    extract($_POST);
    $hide = 0;
    $whereST = " WHERE 1=1 and s_u_code = u_code";
    if(USER_TYPE !='admin')
    {
        $hide = 1; // to hide some thing to user 
        $whereST .= " and s_u_code='".$_SESSION["User_code"]."'";
    }
    $sel_all = mysqli_query($conf, "select *  from settings , users ".$whereST) or die(mysqli_error($conf));
    while ($rows = mysqli_fetch_array($sel_all)) {
        

        echo '<tr>
 				<td>' . $rows["s_title"] . '</td>';
                 if($hide == 0)
 			echo'<td>' . $rows["u_username"] . '</td>';
 		    echo'<td><span style="background-color:'.$rows["s_background_color"].'">' . $rows["s_background_color"] . '</span></td>
 				<td><span style="background-color:'.$rows["s_font_color"].'">' . $rows["s_font_color"] . '</span></td>
 				<td><span style="background-color:'.$rows["s_btn_color"].'">' . $rows["s_btn_color"] . '</span></td>
 				<td><span style="background-color:'.$rows["s_labels_color"].'">' . $rows["s_labels_color"] . '</span></td>
		 	    <td><span style="background-color:'.$rows["s_slider_btn_color"].'">' . $rows["s_slider_btn_color"] . '</span></td>
				<td>' . $rows["s_email"] . '</td>
				<td>' . $rows["s_contact_phone"] . '</td>
                <td><button title="' . $rows["s_code"] . '" type="button"  class="reset btn btn-dark">Reset</button></td>
 				<td><button title="' . $rows["s_code"] . '" 
                            u_username="'.$rows["u_username"].'" 
                            s_keyword="'.$rows["s_keyword"].'" 
                            s_desc="'.$rows["s_desc"].'" 
                            s_background_color="'.$rows["s_background_color"].'" 
                            s_font_color="'.$rows["s_font_color"].'" 
                            s_btn_color="'.$rows["s_btn_color"].'" 
                            s_labels_color="'.$rows["s_labels_color"].'" 
                            s_whatsapp_link="'.$rows["s_whatsapp_link"].'" 
                            s_twitter_link="'.$rows["s_twitter_link"].'" 
                            s_fb_link="'.$rows["s_fb_link"].'" 
                            s_fbmessanger_link="'.$rows["s_fbmessanger_link"].'" 
                             s_email="'.$rows["s_email"].'" 
                            s_contact_phone="'.$rows["s_contact_phone"].'" 
                            s_title="'.$rows["s_title"].'" 
                            s_pinterest="'.$rows["s_pinterest"].'" 
                            s_instagram="'.$rows["s_instagram"].'" 
                            s_opentime="'.$rows["s_opentime"].'" 
                            s_address="'.$rows["s_address"].'" 
                            s_latitude="'.$rows["s_latitude"].'" 
                            s_longitude="'.$rows["s_longitude"].'" 
                            s_logo="'.$rows["s_logo"].'" 
                            s_u_code="'.$rows["s_u_code"].'" 
                            type="button"  class="edit btn btn-dark">Edit</button></td>
 			  </tr>';
    }
}
