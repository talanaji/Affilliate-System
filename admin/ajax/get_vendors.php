<?php  include "../../conn/conn.php";
if ($_SESSION["User_code"] != '') {
    
    extract($_POST);
    $path = "";
	 
    $sel_all = mysqli_query($conf, "select *  from vendors order by ven_code asc") or die(mysqli_error($conf));
    while ($rows = mysqli_fetch_array($sel_all)) {

        if ($rows["ven_active"] == 1) {
            $btn_name = "Deactivate";
            $p_actv = "checked=checked";
            $ven_active = 0;
        } else {
            $btn_name = "Activate";
            $ven_active = 1 ;
            $p_actv = '';
        }

        echo '<tr>
                <th>.</th>
 				<td>' . $rows["ven_name"] . '</td>
 		 		<td><input type="checkbox" disabled="disabled" ' . $p_actv . ' /></td>
 				<td><button title="' . $rows["ven_code"] . '" ven_active="'.$ven_active.' type="button"  class="Del btn btn-dark">'.$btn_name.'</button></td>
 			  </tr>';
    }
    
    
    /**
            
     */
}
