<?php   include "../../conn/conn.php";
if ($_SESSION["User_code"] != '') {
   
    extract($_POST);
    $sel_all = mysqli_query($conf, "select *  from users where u_type='user'") or die(mysqli_error($conf));
    while ($rows = mysqli_fetch_array($sel_all)) {
        if ($rows["u_active"] == 1) {
            $User_active = "checked=checked";
            $btn_name = "Deactivate";
            $u_active = 0;

        } else {
            $User_active = '';
            $btn_name = "Activate";
            $u_active = 1;
 
        }
 

        echo '<tr>
 				<td>' . $rows["u_username"] . '</td>
		 	    <td>' . $rows["u_fname"] . '</td>
				<td>' . $rows["u_email"] . '</td>
				<td>' . $rows["u_mobile"] . '</td>
                <td>' . $rows["u_enterdate"] . '</td>
 		 		<td><input type="checkbox" disabled="disabled" ' . $User_active . ' /></td>
 				<td><button title="' . $rows["u_code"] . '" 
                            u_username="'.$rows["u_username"].'" 
                            u_fname="'.$rows["u_fname"].'" 
                            u_email="'.$rows["u_email"].'" 
                            u_mobile="'.$rows["u_mobile"].'" 
                            u_sex="'.$rows["u_sex"].'" 
                            u_birthday="'.$rows["u_birthday"].'" 
                            u_type="'.$rows["u_type"].'" 
                            u_active="'.$u_active.'" 
                            type="button"  class="edit btn btn-dark">Edit</button></td>
 				<td><button title="' . $rows["u_code"] . '" u_active="'.$u_active.'" type="button"  class="Del btn btn-dark">'.$btn_name.'</button></td>
 			  </tr>';
    }
}
