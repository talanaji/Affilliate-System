<?php include("conn/conn.php");?>
<title>Control panel login</title>
<meta name="robots" content="noindex" />

<link href="css/bootstrap.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<style>
        /* BASIC */

        html {
          background-color: #56baed;
        }

        body {
          font-family: "Poppins", sans-serif;
          height: 100vh;
        }

        a {
          color: #92badd;
          display:inline-block;
          text-decoration: none;
          font-weight: 400;
        }

        h2 {
          text-align: center;
          font-size: 16px;
          font-weight: 600;
          text-transform: uppercase;
          display:inline-block;
          margin: 40px 8px 10px 8px; 
          color: #cccccc;
        }



        /* STRUCTURE */

        .wrapper {
          display: flex;
          align-items: center;
          flex-direction: column; 
          justify-content: center;
          width: 100%;
          min-height: 100%;
          padding: 20px;
        }

        #formContent {
          -webkit-border-radius: 10px 10px 10px 10px;
          border-radius: 10px 10px 10px 10px;
          background: #fff;
          padding: 30px;
          width: 90%;
          max-width: 450px;
          position: relative;
          padding: 0px;
          -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
          box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
          text-align: center;
        }


        #formFooter {
          background-color: #f6f6f6;
          border-top: 1px solid #dce8f1;
          padding: 25px;
          text-align: center;
          -webkit-border-radius: 0 0 10px 10px;
          border-radius: 0 0 10px 10px;
        }



        /* TABS */

        h2.inactive {
          color: #cccccc;
        }

        h2.active {
          color: #0d0d0d;
          border-bottom: 2px solid #5fbae9;
        }



        /* FORM TYPOGRAPHY*/

        input[type=button], input[type=submit], input[type=reset]  {
          background-color: #56baed;
          border: none;
          color: white;
          padding: 15px 80px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          text-transform: uppercase;
          font-size: 13px;
          -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
          box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
          -webkit-border-radius: 5px 5px 5px 5px;
          border-radius: 5px 5px 5px 5px;
          margin: 5px 20px 40px 20px;
          -webkit-transition: all 0.3s ease-in-out;
          -moz-transition: all 0.3s ease-in-out;
          -ms-transition: all 0.3s ease-in-out;
          -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
        }

        input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
          background-color: #39ace7;
        }

        input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
          -moz-transform: scale(0.95);
          -webkit-transform: scale(0.95);
          -o-transform: scale(0.95);
          -ms-transform: scale(0.95);
          transform: scale(0.95);
        }

        input[type=text] {
          background-color: #f6f6f6;
          border: none;
          color: #0d0d0d;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 5px;
          width: 85%;
          border: 2px solid #f6f6f6;
          -webkit-transition: all 0.5s ease-in-out;
          -moz-transition: all 0.5s ease-in-out;
          -ms-transition: all 0.5s ease-in-out;
          -o-transition: all 0.5s ease-in-out;
          transition: all 0.5s ease-in-out;
          -webkit-border-radius: 5px 5px 5px 5px;
          border-radius: 5px 5px 5px 5px;
        }

        input[type=text]:focus {
          background-color: #fff;
          border-bottom: 2px solid #5fbae9;
        }

        input[type=text]:placeholder {
          color: #cccccc;
        }



        /* ANIMATIONS */

        /* Simple CSS3 Fade-in-down Animation */
        .fadeInDown {
          -webkit-animation-name: fadeInDown;
          animation-name: fadeInDown;
          -webkit-animation-duration: 1s;
          animation-duration: 1s;
          -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
        }

        @-webkit-keyframes fadeInDown {
          0% {
            opacity: 0;
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
          }
          100% {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
          }
        }

        @keyframes fadeInDown {
          0% {
            opacity: 0;
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
          }
          100% {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
          }
        }

        /* Simple CSS3 Fade-in Animation */
        @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

        .fadeIn {
          opacity:0;
          -webkit-animation:fadeIn ease-in 1;
          -moz-animation:fadeIn ease-in 1;
          animation:fadeIn ease-in 1;

          -webkit-animation-fill-mode:forwards;
          -moz-animation-fill-mode:forwards;
          animation-fill-mode:forwards;

          -webkit-animation-duration:1s;
          -moz-animation-duration:1s;
          animation-duration:1s;
        }

        .fadeIn.first {
          -webkit-animation-delay: 0.4s;
          -moz-animation-delay: 0.4s;
          animation-delay: 0.4s;
        }

        .fadeIn.second {
          -webkit-animation-delay: 0.6s;
          -moz-animation-delay: 0.6s;
          animation-delay: 0.6s;
        }

        .fadeIn.third {
          -webkit-animation-delay: 0.8s;
          -moz-animation-delay: 0.8s;
          animation-delay: 0.8s;
        }

        .fadeIn.fourth {
          -webkit-animation-delay: 1s;
          -moz-animation-delay: 1s;
          animation-delay: 1s;
        }

        /* Simple CSS3 Fade-in Animation */
        .underlineHover:after {
          display: block;
          left: 0;
          bottom: -10px;
          width: 0;
          height: 2px;
          background-color: #56baed;
          content: "";
          transition: width 0.2s;
        }

        .underlineHover:hover {
          color: #0d0d0d;
        }

        .underlineHover:hover:after{
          width: 100%;
        }

        h1{
            color:#60a0ff;
        }

        /* OTHERS */

        *:focus {
            outline: none;
        } 

        #icon {
          width:30%;
        }
        @media only screen and (max-width: 600px) {
        #formContent {
          max-width: initial;
          }
        }
</style>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="<?=$base_url?>imgs/aditya-300x177.png" id="icon" alt="User Icon" />
      <h1>Dashboard Login</h1>
    </div>
<?php
    if (isset($_POST['btn_submit'])) {
    $u = $_POST["User_name"];
    $p = md5($_POST["User_password"]);
    if ($u == '' || empty($u)) {
        header("location:login.php?err=1");
    } elseif ($p == '' || empty($p)) {
        header("location:login.php?err=2");
    } else {
      //   if(!empty(USER_CODE) || USER_CODE == 1)
      //   $stm = "SELECT * FROM `users` WHERE `u_username`='" . $u . "' and `u_password`='" . $p . "' and u_code='".USER_CODE."'   and `u_active` = '1'";
      // else
        $stm = "SELECT * FROM `users` WHERE `u_username`='" . $u . "' and `u_password`='" . $p . "'   and `u_active` = '1'";
        //echo $stm; exit;

        $sqls = mysqli_query($conf, $stm) or die(mysqli_error($conf));
        // Mysql_num_row is counting table row
        $count = mysqli_num_rows($sqls);
        // If result matched $myusername and $mypassword, table row must be 1 row
        if ($count == 1) {
            $row_usr_data = mysqli_fetch_array($sqls);
            session_start();
            $_SESSION['User_code'] = $row_usr_data['u_code'];
            $_SESSION['User_name'] = $row_usr_data["u_username"];
            $_SESSION['User_fullname'] = $row_usr_data['u_fname'];
            $_SESSION['User_email'] = $row_usr_data['u_email'];
            $_SESSION['usr_type'] = $row_usr_data['u_type'];
            $_SESSION['usr_sex'] = $row_usr_data['u_sex'];
            $_SESSION['u_active'] = $row_usr_data['u_active'];
            mysqli_query($conf, "INSERT INTO `log` ( `log_u_code`, `log_country`, `log_country_code`,
											 `log_state` , `log_city` , `log_location` , `log_address`   )
                                             VALUES ('" .
                                                  trim(clean_value($conf, $row_usr_data['u_code'])) . "',  '" .
                                                  clean_value($conf, ip_info("Visitor", "Country")) . "', '" .
                                                  clean_value($conf, ip_info("Visitor", "Country Code")) . "', '" .
                                                  clean_value($conf, ip_info("Visitor", "State")) . "', '" .
                                                  clean_value($conf, ip_info("Visitor", "City")) . "', '" .
                                                  clean_value($conf, ip_info("Visitor", "location")) . "', '" .
                                                  clean_value($conf, ip_info("Visitor", "Address")) . "')") //, '".$base_url.str_replace("../../","",$imgFolder).$picuploaded."'  )
                                              or die(mysqli_error($conf));

             header("location:admin/index.php");
            
        } else {
            echo "<b style='color:#f00;'>Incorrect login try again</b>";
        }
    }
    unset($_POST);
}

?>
    <!-- Login Form -->
    <form method="post">
      <input type="text" id="User_name" name="User_name" class="fadeIn second" name="login" placeholder="Username">
      <input type="text" id="User_password" name="User_password" class="fadeIn third" name="login" placeholder="Password">
      <input type="submit" name="btn_submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" target="_blank" href="<?=$base_url;?>">Go to website</a>
    </div>

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.2/dist/js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>