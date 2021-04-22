<?php include "../../conn/conn.php";
if ($_SESSION["User_code"] != '') {
   
     extract($_POST);
     $p_isfeat = 0 ; // IS feature flag intial value set to Zero
     $whereST = " where 1= 1  
                    and     cat_user_id = u_code 
                    and     p_cat_id    = cat_code ";
     if( USER_TYPE !="admin")  // check user type 
            $whereST .= " and cat_user_id = '" . USER_CODE . "'";
      if(!empty($catcodepost))
         $whereST .= " and p_cat_id =".$catcodepost;  
     
      if (!empty($ucodepost))  
           $whereST .= " and u_code =" . $ucodepost;
 

    $sel_all = mysqli_query($conf, "select * from products,categories,users  $whereST order by p_code desc") or die(mysqli_error($conf));
    while ($rows = mysqli_fetch_array($sel_all)) {
       $rowPhoto = get_where_value_s($conf, "photos", "ph_prod_id",$rows["p_code"] , " and ph_is_main=1 and ph_active = 1");
       
        if ($rows["p_active"] == 1) {
            $btn_name = "Deactivate";
            $p_actv = "checked=checked";
            $p_active = 0 ;
        } else {
            $btn_name = "Activate";
            $p_active = 1 ; 
            $p_actv = '';
        }
            if ($rows["p_is_featured"] == 1)  
                $featur = "checked=checked";
               else  {
                    $featur = '';
                    $p_isfeat = 1;
               }
              if ($rows["p_ismain"] == 1)  
                $ismain = "checked=checked";
               else  {
                    $ismain = '';
                    $p_ismain = 1;
               }  
                 if (USER_TYPE == 'admin') 
                   $us = '<td>' . $rows["u_username"] . '</td>';
        echo '<tr>
                <td><a data-toggle="tooltip"  href="'.$rowPhoto["ph_url"].'" title="'.$rows["p_date"].'" data-lightbox="'.$rowPhoto["ph_url"].'"><img src="'.$rowPhoto["ph_url"].'" width="80" height="80" /></a></td>'.
                 $us.
 				'<td>' . $rows["p_name"] . '</td>
		 	    <td>' . $rows["p_brand"] . '</td>
		 	    <td title="'.$rows["cat_code"].'">' . $rows["cat_title"] . '</td>
		 		<td><input type="checkbox" p_cat_id ="'.$rows["p_cat_id"].'" title ="'. $rows["p_code"] . '" p_is_featured ="' . $p_isfeat .'"   class="featur" ' . $featur . ' /></td>
		 		<td><input type="checkbox" p_cat_id ="'.$rows["p_cat_id"].'" title ="'. $rows["p_code"] . '" p_user_id="'.$rows['p_user_id'].'" p_ismain ="' . $p_ismain .'"   class="ismainProd123" ' . $ismain . ' /></td>
		 		<td><input type="checkbox" disabled="disabled" ' . $p_actv . ' /></td>
                <td><button title ="'. $rows["p_code"] . '" type="button" class="Gphoto btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalLong11">Edit Photos</button></td>
			    <td><button title ="'. $rows["p_code"] . '"
							p_url  ="' . $rows["p_url"]  .'"
							cat_desc   ="' . $rows["cat_desc"]   .'"
                            p_name  ="' . $rows["p_name"]  .'"
							p_brand ="' . $rows["p_brand"] .'"
							p_productCategory ="' . $rows["p_productCategory"] .'"
							p_model ="' . $rows["p_model"] .'"
							p_manufacturerUrl ="' . $rows["p_manufacturerUrl"] .'"
							p_description ="' . $rows["p_description"] .'"
							p_cat_id ="' . $rows["p_cat_id"] .'"
							p_date ="' . $rows["p_date"] .'"
							p_views ="' . $rows["p_views"] .'"
                            p_is_featured ="' . $rows["p_is_featured"] .'"
                            p_ismain ="' . $rows["p_ismain"] .'"
                            p_active ="' . $p_active .'"
                            price ="' . $rows["price"] .'"
                            p_user_id ="' . $rows["p_user_id"] .'"
                            priceCurrencyCode ="' . $rows["priceCurrencyCode"] .'"
 					   type="button" class="edit btn btn-dark"   >Edit</button>
 				</td>
				<td><button title="' . $rows["p_code"] . '" p_active="'.$p_active.'" p_cat_id="'.$rows["p_cat_id"].'"  type="button"  class="Del btn btn-dark">'.$btn_name.'</button></td>
 			  </tr>';
    }
    
    
    /**
            
     */
}
