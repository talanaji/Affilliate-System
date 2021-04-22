<?php include "../../conn/conn.php";
if ($_SESSION["User_code"] != '') {
     extract($_POST);
    $path = "";
	if( USER_TYPE =="admin")
	  $whereST = " where cat_user_id = u_code ";
     else
	  $whereST = " where cat_user_id = u_code  and cat_user_id = '".USER_CODE."'";
      
      if (!empty($ucodepost)) {
        $whereST .= " and cat_user_id =" . $ucodepost;
}
    $sel_all = mysqli_query($conf, "select *  from categories,users  $whereST order by cat_code asc") or die(mysqli_error($conf));
    while ($rows = mysqli_fetch_array($sel_all)) {

        if ($rows["cat_active"] == 1) {
            $btn_name = "Deactivate";
            $p_actv = "checked=checked";
            $cat_active = 0 ;
        } else {
            $btn_name = "Activate";
            $cat_active = 1 ; 
            $p_actv = '';
        }
        
        
 
        echo '<tr>
                <td><a href="'.$rows["cat_photo"].'" data-lightbox="'.$rows["cat_photo"].'"><img src="'.$rows["cat_photo"].'" width="80" height="80" /></a></td>
 				<td>' . $rows["cat_title"] . '</td>
		 	    <td>' . $rows["cat_desc"] . '</td>
		 		<td><input type="checkbox" disabled="disabled" ' . $p_actv . ' /></td>
			    <td><button title ="'. $rows["cat_code"] . '"
							cat_title  ="' . $rows["cat_title"]  .'"
							cat_desc   ="' . $rows["cat_desc"]   .'"
                            cat_photo  ="' . $rows["cat_photo"]  .'"
							cat_active ="' .$cat_active .'"
                            cat_is_slider = "' . $rows["cat_is_slider"] .'"
 					   type="button" class="edit btn btn-dark" >Edit</button>
 				</td>
				<td><button title="' . $rows["cat_code"] . '" cat_active="'.$cat_active.'"  type="button"  class="Del btn btn-dark">'.$btn_name.'</button></td>
 			  </tr>';
    }
    
    
    /**
            
     */
}
