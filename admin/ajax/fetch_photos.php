<?php   include "../../conn/conn.php";
        if ((isset($_SESSION["User_code"]) && $_SESSION["User_code"] != '' && $_SESSION["User_code"] != 'admin')) {
            $usr_code = $_SESSION["User_code"];
        } else {
            $usr_code = 0;
        }
        extract($_POST);
        $ism_value = 0;
        $sel_photo = mysqli_query($conf, "select * from photos where ph_prod_id='".$p_codePost."' order by ph_code desc") or die(mysqli_error($conf));
        echo ' <div class="table-responsive">
                <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Is Main?</th>
                        <th colspan="2" ><center>Opt(Edit/Act,deact)</center></th>
                    </tr>
                </thead>
                <tbody>';
                
              
        while ($rows = mysqli_fetch_array($sel_photo)) {
            if ($rows["ph_active"] == 1) {
                $btn_name = "Deactivate";
                $ph_active = 0;
            } else {
                $btn_name = "Activate";
                $ph_active = 1;
             }
            
            if($rows["ph_is_main"] == 1 )
                 $is_main = "checked=checked";
            else{
                $is_main = "";
                $ism_value = 1;
            }
            echo '<tr>
                    <td><a data-toggle="tooltip"  href="' . $rows["ph_url"] . '"   data-lightbox="' . $rows["ph_url"] . '"><img src="' . $rows["ph_url"] . '" width="80" height="80" /></a></td>
                    <td><input type="checkbox"   ' . $is_main . ' class="is_main_v" ph_is_main="'.$ism_value.'" title="'.$rows["ph_code"].'" ph_prod_id="'.$rows["ph_prod_id"].'" /></td>
                    <td><button title="' . $rows["ph_code"] . '" ph_active="' . $ph_active . '"  ph_prod_id="'.$rows["ph_prod_id"].'" type="button"  class="btn btn-dark photo_active">' . $btn_name . '</button></td>
                    <td><button title="' . $rows["ph_code"] . '" type="button" ph_prod_id="'.$rows["ph_prod_id"].'" class="btn btn-dark photo_delete">Delete Permenant</button></td>
                  </tr>';
        }
          echo '<tr>
                    <td colspan="3">
                        <input type="file" class="form-control uploadP" id="extraPhoto" name="extraPhoto[]" multiple />
                        Upload more
                        <br />
                        <div style="text-align:center" id="uploaded_image">.</div>
                    </td>
                </tr>';

        echo '  </tbody>
                </table>
            </div>';
         