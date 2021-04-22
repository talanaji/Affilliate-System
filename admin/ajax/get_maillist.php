<?php include "../../conn/conn.php";
if ($_SESSION["User_code"] != '') {

    extract($_POST);
 if (USER_TYPE == "admin") {
        $whereST = " where m_u_code = u_code ";
    } else {
        $whereST = " where m_u_code =  '" . USER_CODE . "'";
    }

    $sel_all = mysqli_query($conf, "select *  from maillist,users ".$whereST." order by m_code desc") or die(mysqli_error($conf));
    while ($rows = mysqli_fetch_array($sel_all)) {
    

        echo '<tr>
                <td>' . $rows["m_email"] . '</td>
 				<td>' . $rows["m_email"] . '</td>
		 	    <td>' . $rows["m_country"] . '</td>
				<td>' . $rows["m_reffer_from"] . '</td>
				<td>' . $rows["m_enterdate"] . '</td>
 				<td><button title="' . $rows["m_code"] . '"   type="button"  class="Del btn btn-dark">Delete</button></td>
 			  </tr>';
    }
}
