<?php include("../../conn/conn.php");
 
  extract($_POST);
     if($correct_type == 'cats')
     {
        $qr = "select cat_code as code , cat_photo as photos from categories ";
        $table = "categories";
        $col = "cat_photo";
        $code = "cat_code";
     }
    elseif($correct_type == 'prods')
    {
        $qr = "select ph_code as code , ph_url as photos from photos";
        $table = "photos";
        $col = "ph_url";
        $code = "ph_code";
      }
     else // correct setting photos
      {
         $qr = "select s_code as code , s_logo as photos from settings";
         $table = "settings";
         $col = "s_logo";
         $code = "s_code";
      }
     
        $sel = mysqli_query($conf,$qr) or die(mysqli_error($conf));
        while($rows = mysqli_fetch_array($sel)){
            $allp = explode("uploads/",$rows["photos"]);
            $replaced = str_replace($allp[0], $base_url, $rows["photos"]);
            mysqli_query($conf,"update ".$table." set ".$col." ='".$replaced."' where ".$code."=".$rows["code"]);
         }
?>