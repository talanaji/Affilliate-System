<?php include "../conn/conn.php"; 
if ((!isset($_SESSION["User_code"]) && $_SESSION["User_code"] == '') ||
    (!isset($_SESSION["User_name"]) && $_SESSION["User_name"] == '')) {
    header("location:../login.php");
} else {
         $admin_name = $_SESSION["User_name"];
         $admin_code = $_SESSION['User_code'];
 } ?>
<!doctype html>
<html lang="en" dir="rtl">
  <head>
  <title><?=isset($_GET["action"])? "Manage ".$_GET["action"]:"Control Panel"?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex" />
       <!-- Bootstrap core CSS -->

    <style>
      *{
        font-family:cairo !important;
      } 
      @media only screen and (max-width: 600px) {
        #mainnavbar {
          float: right !important;
          width: 29%  !important;
          position: relative !important;
          top: -31px !important;
        }
        #main_searchbar {
          width: 67% !important;
          padding: 20px !important;
          position: relative !important;
          top: 10px !important;
          left: 15px !important;
        }
      }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
      <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
       <link href="<?=$base_url?>css/lightbox.css" rel="stylesheet" type="text/css">
       <link href="<?=$base_url?>css/jquery.toast.min.css" rel="stylesheet" type="text/css">
      <link href="<?=$base_url?>css/lightbox.css" rel="stylesheet" type="text/css">
       <!-- <link rel="stylesheet" href="<?//=$base_url?>css/cp/bootstrap.min.css"> -->
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
      <script src="<?=$base_url?>js/jquery.toast.min.js"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>  
		<script src="<?=$base_url?>js/if_gmap.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzl87kn6iE7l2dShGV5MPaCU9p7uwzvYw&callback=initMap&libraries=&v=weekly"
      defer></script>
      <!-- include summernote css/js -->
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
      <script type="text/javascript">
          function chkBox(selector) {
                if ($(selector).is(":checked")) {
                    return 1;
                } else {
                    return 0;
                }
            }

            function draw(url, selector) {
                $('#example').dataTable().fnDestroy();

                $.ajax({
                    url: url,
                    beforeSend: function(xhr) {
                        xhr.overrideMimeType("text/plain; charset=utf-8");
                    },
                    type: 'POST',
                    data: {
                        random: Math.random()
                    },
                    success: function(data) {
                        $(selector).html(data);
                        setTimeout(function() {
                            $('#example').DataTable();  
                        }, 700);
                    }
                });
                
            }
            function draw2(url, selector) {
                $('#example2').dataTable().fnDestroy();
                $.ajax({
                    url: url,
                    beforeSend: function(xhr) {
                        xhr.overrideMimeType("text/plain; charset=utf-8");
                    },
                    type: 'POST',
                    data: {
                        random: Math.random()
                    },
                    success: function(data) {
                        $(selector).html(data);
                        setTimeout(function() {
                            $('#example2').DataTable();

                        }, 700);
                    }
                });
            }

            function _PREFIX() {
                return m_PREFIX = document.getElementById("_PRIFIX").value;
            }

            function get_chkbox_val(selector) {
                if ($(selector).is(":checked")) {
                    return 1;
                } else {
                    return 0;
                }
            }

            function fetch_all(url, selector) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        random: Math.random()
                    },
                    success: function(data) {
                        $(selector).html(data);
                        $('#example').DataTable();
                    }
                });
            }

            function fetch_per_params(url, selector, right_val, prfx_type, actv = -1) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        random: Math.random(),
                        post_val: right_val,
                        prefix_type: prfx_type,
                        active: actv
                    },
                    success: function(data) {
                        $(selector).html(data);
                        $('#examplefiles').DataTable();
                    }
                });
            }

            function draw_such_params(url, selector, params) {
                //var arr =  $("param_selector,param_selector").serialize()
                $.ajax({
                    url: url,
                    beforeSend: function(xhr) {
                        xhr.overrideMimeType("text/plain; charset=utf-8");
                    },
                    type: 'POST',
                    data: params,
                    success: function(data) {
                        $(selector).html(data);
                        
                    }
                });
            }
            function toast(text,heading,icon)
            {
              if(icon > 0)
                icon= "success";
              else
                icon = "danger";
              $.toast({
                    text: text, // Text that is to be shown in the toast
                    heading: heading, // Optional heading to be shown on the toast
                    icon: icon, // Type of toast icon
                    showHideTransition: 'fade', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'bottom-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    
                    
                    
                    textAlign: 'left',  // Text alignment i.e. left, right or center
                    loader: true,  // Whether to show loader or not. True by default
                    loaderBg: '#9ec600',  // Background color of the toast loader
                    beforeShow: function () {}, // will be triggered before the toast is shown
                    afterShown: function () {}, // will be triggered after the toat has been shown
                    beforeHide: function () {}, // will be triggered before the toast gets hidden
                    afterHidden: function () {}  // will be triggered after the toast has been hidden
                });
            }
      </script>
      
    
  </head>
  <body onload="if_gmap_init();"> 
  <div class="row">
  <nav class="navbar navbar-dark fixed-top bg-dark shadow" dir="ltr" style="background-color: #F1F2F8;">
    <a class="navbar-brand col-sm-3 col-md-2" href="#">Affilliate System</a>
    <input class="form-control w-50" id="main_searchbar" type="text" placeholder="Search" aria-label="Search" style=" width: 65%;padding: 20px;position: relative;top: 10px;">
    <ul class="nav" id="mainnavbar"  style="float: right;width: 16%;position: relative;top: -31px;">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Sign out (<?=$_SESSION["User_name"].' - '.$_SESSION["usr_type"];?>)</a>
      </li>
    </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-dark sidebar" dir="ltr">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="settings.php?action=Settings">
              <span data-feather="home"></span>
              Settings  </span>
            </a>
          </li>
          <?php if(USER_TYPE == "admin") {?>
          <li class="nav-item">
            <a class="nav-link" href="vendors.php?action=Vendors">
              <span data-feather="layers"></span>
               Vendors 
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="users.php?action=Users">
              <span data-feather="users"></span>
              Users and Customers
            </a>
          </li>
          <?php } ?>
           <li class="nav-item">
            <a class="nav-link" href="categories.php?action=Categories">
              <span data-feather="file"></span>
              Categories 
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="products.php?action=Products">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages.php?action=Pages">
              <span data-feather="shopping-cart"></span>
              Pages
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="maillist.php?action=EmailList">
              <span data-feather="shopping-cart"></span>
              Email List
            </a>
          </li>
        <!--  <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li> -->
        </ul>

        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul> -->
      </div>
    </nav>

   <main role="main" class="col-md-9"  dir="ltr">
      <div class=" justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?=isset($_GET["action"])? $_GET["action"]:"Control Panel"?></h1>
       
           <form class="form-horizontal form-responsive" enctype="multipart/form-data" id="c_form" method="post"  dir="ltr">
            <input id="curr_code" name="curr_code" type="HIDDEN" />