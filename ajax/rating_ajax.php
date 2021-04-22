<?php 
if(isset($_POST["postid"])){
    
    include "../conn/conn.php";
    extract($_POST);
    // // Check entry within table
    $query = "SELECT COUNT(*) AS cntpost FROM products_rate WHERE pr_p_code=" . $postid . " and pr_u_code=" . $_SESSION['User_code_frontend'];

    $result = mysqli_query($conf, $query);
    $fetchdata = mysqli_fetch_array($result);
    $count = $fetchdata['cntpost'];

    if ($count == 0) {
        $insertquery = "INSERT INTO products_rate(pr_u_code,pr_p_code,pr_rate ,pr_country ,pr_country_code ,pr_address ) 
            values('" . $_SESSION['User_code_frontend'] . "','" . $postid . "','" . $rating . "' , '".clean_value($conf, ip_info("Visitor", "Country"))."' ,'".clean_value($conf, ip_info("Visitor", "Country Code"))."' ,'".clean_value($conf, ip_info("Visitor", "Address"))."')";
        mysqli_query($conf, $insertquery);
    } else {
        $updatequery = "UPDATE products_rate SET pr_rate=" . $rating . " where pr_u_code=" . $_SESSION['User_code_frontend'] . " and pr_p_code=" . $postid;
        mysqli_query($conf, $updatequery);
    }

}




// include "config.php";

// $userid = 4;
// $postid = $_POST['postid'];
// $rating = $_POST['rating'];



// // get average
// $query = "SELECT ROUND(AVG(rating),1) as averageRating FROM post_rating WHERE postid=" . $postid;
// $result = mysqli_query($con, $query) or die(mysqli_error());
// $fetchAverage = mysqli_fetch_array($result);
// $averageRating = $fetchAverage['averageRating'];

// $return_arr = array("averageRating" => $averageRating);

// echo json_encode($return_arr);
