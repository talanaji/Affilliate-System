<?php  ob_start(); session_start();
// بيانات الاتصال على قاعدة البيانات 
	$user = 'root';  // اسم المستخدم على القاعدة
	$pass = ''; // كلمة مرور المستحدم
	$server = 'localhost'; // السيرفر 
	$db_name = 'u293020119_affilUSR'; // اسم قاعدة البيانات
	$path = $_SERVER['REQUEST_URI']; // this gives you /folder1/folder2/THIS_ONE/file.php
	
	$folders = explode("/", $path); // splits folders in array
	$Froot = $folders[1];  
	$root = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] .'/';//.$Froot.'/';
    $base_url = $root;
	
 	$conf = mysqli_connect($server,$user , $pass,$db_name); // عمل اتصال على البيانات الي بالاعلى
	$imgFolder = "../../uploads/";
 	$code = '';
	$settings = '';
	define("WHOUS","About Us");
	define("POLICY","Privacy and policy");
	define("FAQs","FAQs");
	/******************************************************************************************************** */
	if(isset($_SESSION['User_code'])){ // if isset session then get all user info
 
 		$_SESSION['User_code_frontend']  = $_SESSION['User_code'];	
		  $get_user = get_where_value_s($conf, "users", "u_code", $_SESSION['User_code_frontend'], "");
		if ($_SESSION['usr_type'] != "admin") // if user type is user
		{
			$settings = get_where_value_s($conf, "settings", "s_u_code", $_SESSION['User_code_frontend'], "");
		}
		// get per user code
		else {
			$settings = get_where_value_s($conf, "settings", "1", "1", "");
		} //get all

		if (isset($_GET["usr_code"])) { // from .htaccess
			$code = $_GET["usr_code"];
			$_SESSION['User_code_frontend'] = $_GET["usr_code"]; //session value for front end
			$settings = get_where_value_s($conf, "settings", "s_u_code", $_SESSION['User_code_frontend'] , "");
		} 
  	 }
	else
	{
 
       if(!empty($_SESSION['User_code_frontend'])) 
	   		 $settings = get_where_value_s($conf, "settings", "s_u_code", $_SESSION['User_code_frontend'], "");

	   else{
			if (isset($_GET["usr_code"])) { // from .htaccess
			 	$code = $_GET["usr_code"];
 				$_SESSION['User_code_frontend'] = $_GET["usr_code"]; //session value for front end
				$settings = get_where_value_s($conf, "settings", "s_u_code", $_SESSION['User_code_frontend'] , "");
			} 
			else {
				$_SESSION['User_code_frontend'] = 1; // admin for front end ...
				$settings = get_where_value_s($conf, "settings", "s_u_code", 1, "");
			}
	   }
 	}
	$user = get_where_value_s($conf, "users", "u_code", $_SESSION['User_code_frontend'], "");
			define("USER_CODE", $user["u_code"]); // User code
			define("USER_TYPE", $user["u_type"]); // User type
			define("USER_EMAIL", $user["u_email"]); // User email
			define("USER_SEX", $user["u_sex"]); // User SEX

	function get_currency_symbol($currency)
	{
	  if(!empty($currency)){
			if($currency == "usd")
				return "$";
			elseif($currency == "gbp")
				return "£";
			elseif($currency == "eur")
				return "€";
			else
			  return ":-";
	  }
	  else
	  			return "";
	} 
    function ip_get($ip=null,$deep_detect=true)
	{
		if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
			$ip = $_SERVER["REMOTE_ADDR"];
			if ($deep_detect) {
				if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				}

				if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
					$ip = $_SERVER['HTTP_CLIENT_IP'];
				}

			}
		}
		return $ip;
	}
 	function ip_info($ip = null, $purpose = "location", $deep_detect = true)
	{
		$output = null;
		if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
			$ip = $_SERVER["REMOTE_ADDR"];
 			if ($deep_detect) {
				if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				}

				if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
					$ip = $_SERVER['HTTP_CLIENT_IP'];
				}

			}
		}
		$purpose = str_replace(array("name", "\n", "\t", " ", "-", "_"), null, strtolower(trim($purpose)));
		$support = array("country", "countrycode", "state", "region", "city", "location", "address");
		$continents = array(
			"AF" => "Africa",
			"AN" => "Antarctica",
			"AS" => "Asia",
			"EU" => "Europe",
			"OC" => "Australia (Oceania)",
			"NA" => "North America",
			"SA" => "South America",
		);
		if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
			$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
			if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
				switch ($purpose) {
					case "location":
						$output_arr = array(
							"city" => @$ipdat->geoplugin_city,
							"state" => @$ipdat->geoplugin_regionName,
							"country" => @$ipdat->geoplugin_countryName,
							"country_code" => @$ipdat->geoplugin_countryCode,
							"continent" => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
							"continent_code" => @$ipdat->geoplugin_continentCode,
						);
						$output = $output_arr["city"] . ' , '.$output_arr["country"] . ' , ' . $output_arr["country_code"]. ' , ' . $output_arr["continent"]  ;
						break;
					case "address":
						$address = array($ipdat->geoplugin_countryName);
						if (@strlen($ipdat->geoplugin_regionName) >= 1) {
							$address[] = $ipdat->geoplugin_regionName;
						}

						if (@strlen($ipdat->geoplugin_city) >= 1) {
							$address[] = $ipdat->geoplugin_city;
						}

						$output = implode(", ", array_reverse($address));
						break;
					case "city":
						$output = @$ipdat->geoplugin_city;
						break;
					case "state":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "region":
						$output = @$ipdat->geoplugin_regionName;
						break;
					case "country":
						$output = @$ipdat->geoplugin_countryName;
						break;
					case "countrycode":
						$output = @$ipdat->geoplugin_countryCode;
						break;
				}
			}
		}
		return $output;
	}
    function checksess($attr,$val)
	{
		if($_SESSION[$attr] == $val)
		 return true ;
		 else
		 return false;
	}
    function numberOfItem($conf,$table,$where)
	{
		$result = mysqli_query($conf, "select *  from $table where $where") or die(mysqli_error($conf));
		$row= 0; 
		if ($result) 
		{ 
			// it return number of rows in the table. 
			$row = mysqli_num_rows($result); 
		} 
		echo $row;
	}  
    function draw_ddl($conf, $code , $title , $table,$where_coll, $val, $other_conds , $master_table_col)
	{
		$sel = mysqli_query($conf, "select * from " . $table . " where " . $where_coll . " = '" . $val . "' " . $other_conds) or die(mysqli_error($conf));
		echo "<option value=''>Choose</option>";
		$mas = '';
		while($row = mysqli_fetch_array($sel))
		{
			if(!empty($master_table_col)){
			  $mas = $row[$master_table_col];  // title for column from master table
			  $alias = " - ( " . $mas . " )";
			}
			else
			$alias = "";
			echo "<option value='".$row[$code]."' title='".$mas."'>".$row[$title].$alias ."</option>";
		}
	}
	function get_where_value_s($conf, $table, $where_coll, $val, $other_conds)
	{
  		$sel = mysqli_query($conf, "select * from " . $table . " where " . $where_coll . " = '" . $val . "' " . $other_conds) or die(mysqli_error($conf));
		$row = mysqli_fetch_array($sel);
		return $row;
	}
	function get_where_result($conf, $table, $where_coll, $val, $other_conds)
	{
  		$sel = mysqli_query($conf, "select * from " . $table . " where " . $where_coll . " = '" . $val . "' " . $other_conds) or die(mysqli_error($conf));
		 while($rowSet =mysqli_fetch_array($sel)){
			$row[] = $rowSet;
		};
		return $row;
	}
	function redundancy_where_value_s($conf, $table, $where_coll, $val, $other_conds)
	{
 		$sel = mysqli_query($conf, "select count(*) CT from " . $table . " where " . $where_coll . " = '" . $val . "' " . $other_conds) or die(mysqli_error($conf));
		$row = mysqli_fetch_array($sel);
		return $row["CT"];
	}
	function clean_value($conf, $var)
	{
		$var = htmlspecialchars($var);
		$var = htmlentities($var);
		$var = mysqli_real_escape_string($conf, $var);
		$var = strip_tags($var);
		$var = trim($var);
		$var = htmlspecialchars_decode($var);
		return $var;
	}
	function upload_file($dir, $basefilename, $filetemp, $filetype)
	{
		$target_dir = $dir; //"uploads/";
		$r = rand(0,999999); 
		$exp = explode(".",$basefilename);
		$newfilename = round($r) . '.' . end($exp);		 
		$target_file = $target_dir . basename($newfilename); //$_FILES["fileToUpload"]["name"]
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		

		// Allow certain file formats
		if ($filetype == "pic") {
			if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif") {
				echo "-1╩"."Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
				exit;
			}
		} elseif ($filetype == "vid") {
			if ($imageFileType != "mp4" && $imageFileType != "flv" && $imageFileType != "avi"
				&& $imageFileType != "mpeg") {
				echo "-1╩"."Sorry, only mp4, flv, avi & mpeg files are allowed.";
				$uploadOk = 0;
				exit;
			}
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($filetemp, $target_file)) { //$_FILES["fileToUpload"]["tmp_name"]
			
 				return basename($newfilename);
			    $uploadOk = 1;
			} else {
				echo "-1╩"."Sorry, there was an error uploading your file.";
				exit;
			}
		}
	}
?>