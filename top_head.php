<?php include "conn/conn.php";
$parse = parse_url($_SERVER['HTTP_REFERER']);
$pasreBase = parse_url($base_url);
if($parse["host"] != $pasreBase["host"])
    $_SESSION["reffer_from"] = $_SERVER['HTTP_REFERER'];
 
$selcats = mysqli_query($conf, "select * from categories where cat_active = 1 and cat_user_id='" . $_SESSION['User_code_frontend'] . "'") or die(mysqli_error($conf));
if(isset($_GET["p_code"]) ||  !empty($_GET["p_code"])){
            $pcode = $_GET["p_code"];
 //////  /// //// // select product details 
            $selprodDetails = mysqli_query($conf, "select * from products where p_code ='".$pcode."' and p_active = 1 ") or die(mysqli_error($conf));
            $rowprodDetails = mysqli_fetch_array($selprodDetails);
  /////  //// //// // select main photo of product
            $selmainphoto = mysqli_query($conf,"select ph_url from photos where ph_prod_id = '".$rowprodDetails["p_code"]."' and ph_is_main = 1 and ph_active =1 ") or die(mysqli_error($conf));
            $rowmainphotos = mysqli_fetch_array($selmainphoto);
  /////  //// //// // select product's categories 
            $selprodcategory =  mysqli_query($conf, "select * from categories where cat_code ='".$rowprodDetails["p_cat_id"]."'") or die(mysqli_error($conf));
            $rowprodcategory = mysqli_fetch_array($selprodcategory);
            
  /////  //// //// //
            $selallprodphotos = mysqli_query($conf, "select * from photos where ph_prod_id = '" . $rowprodDetails["p_code"] . "'  and ph_active =1 ") or die(mysqli_error($conf));
 ///// //// //// // select related products
            $selrelatedprod = mysqli_query($conf,"select * from products where p_cat_id = '".$rowprodcategory["cat_code"]."' and p_code <> '".$pcode."' and p_active = 1 order by p_code desc") or die (mysqli_error($conf));   
}
if(!empty($_GET["cat_code"])){
        $selprodcategory = mysqli_query($conf, "select * from categories where cat_code ='" . $_GET["cat_code"] . "'") or die(mysqli_error($conf));
        $rowprodcategory = mysqli_fetch_array($selprodcategory);
        $selprodcDetails = mysqli_query($conf, "select * from products where p_cat_id ='" . $rowprodcategory["cat_code"] . "' and p_active = 1 order by p_code desc") or die(mysqli_error($conf));
  }

        if (!empty($rowprodDetails["p_name"]))  {
            $title =  $rowprodDetails["p_name"] . '-' . $settings["s_title"];
            $desc  =  $rowprodDetails["p_description"];
            $keyw  =  $rowprodDetails["p_model"] . ','. $rowprodDetails["p_productCategory"] . ','.$rowprodDetails["p_brand"];
            $url   =  $base_url."prod/".$rowprodDetails["p_code"];
            $photo =  $rowmainphotos["ph_url"];
        }
        elseif (!empty($rowprodcategory["cat_title"]))  {
            $title =  $rowprodcategory["cat_title"] . '-' . $settings["s_title"];
            $desc  = $rowprodcategory["cat_desc"];
            $keyw = str_replace(" ","," ,$rowprodcategory["cat_desc"]) ;
            $url = $base_url . "cat/" . $rowprodcategory["cat_code"];
            $photo = $rowprodcategory["cat_photo"];

        }
        else  
        {
            $title = $settings["s_title"];
            $desc = $settings["s_desc"];
            $keyw = $settings["s_keyword"];
            $url  = $base_url;
            $photo = $settings["s_logo"];
        }
       
      
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?=$base_url?>"/>
    <meta charset="UTF-8">
    <meta name="description" content="<?=$desc?>" />
    <meta name="keywords" content="<?=$keyw?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="p:domain_verify" content="153096b28769a361ecf5d4966ee98a0e"/>
    
    <title><?=$title ?> </title>
    
    <!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?=$url?>">
<meta property="og:title" content="<?=$title?>">
<meta property="og:description" content="<?=$desc?>">
<meta property="og:image" content="<?=$photo?>">

<!-- Twitter -->
<meta property="twitter:card" content="<?=$keyw?>">
<meta property="twitter:url" content="<?=$url?>">
<meta property="twitter:title" content="<?=$title?>">
<meta property="twitter:description" content="<?=$desc?>">
<meta property="twitter:image" content="<?=$photo?>">


    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link href="<?=$base_url?>css/jquery.toast.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?=$base_url?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?=$base_url?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?=$base_url?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?=$base_url?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?=$base_url?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?=$base_url?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?=$base_url?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?=$base_url?>css/style.php?usr_code=<?=!empty($_GET["usr_code"]) ? $_GET["usr_code"] : ""?>" type="text/css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="<?=$base_url?>js/jquery-3.0.0.js"></script>
    <script src="<?=$base_url?>js/bootstrap.min.js"></script>
    <script src="<?=$base_url?>js/jquery.toast.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
     <link href='<?=$base_url?>css/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
    <script src="<?=$base_url?>js/jquery.barrating.min.js" type="text/javascript"></script>

      <script type="text/javascript">
            function checkval(s)
            {
                if(s!='' || s!=null)
                    return true; 
                  else 
                  {
                      toast("Please enter valid email", "Note", -1);
                       return false;
                  }
            }
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

<body>
<!-- <h2><center>The Website is under development , Wait for us Please </center></h2> -->

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?=$base_url?>user/<?=$_SESSION['User_code']?>"><img src="<?=!empty($settings["s_logo"])?$settings["s_logo"] : $base_url."imgs/default_logo.png" ?>" alt="<?=$settings["s_title"]?>"></a>
        </div>
        <!-- <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div> -->
        <div class="humberger__menu__widget">
             <div class="header__top__right__language">
              <!--  <img src="<?=$base_url?>imgs/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>-->
                <a href="register.php"><i class="fa fa-user"></i> Register</a>
            </div>
            <div class="header__top__right__auth">
                <a href="login.php"><i class="fa fa-user"></i> Login</a>

            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="<?=$base_url?>user/<?=isset($_SESSION['User_code'])? $_SESSION['User_code'] : 1?>">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> <a href="maitto:<?=$settings["s_email"]?>" class="__cf_email__"
                        data-cfemail="maitto:<?=$settings["s_email"]?>"><?=$settings["s_email"]?></a></li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>

     <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <!-- <li><i class="fa fa-envelope"></i> <a href="/cdn-cgi/l/email-protection"
                                        class="__cf_email__"
                                        data-cfemail="">[email&#160;protected]</a>
                                </li>
                                <li>Free Shipping for all Order of $99</li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="<?=$settings["s_twitter_link"]?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="<?=$settings["s_twitter_link"]?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="<?=$settings["s_fbmessanger_link"]?>" target="_blank"><i class="fab fa-facebook-messenger"></i></a>
                                <a href="<?=$settings["s_whatsapp_link"]?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            </div>
                            <?php if (empty($_SESSION["User_code"]) || $_SESSION["User_code"] == '') {?>
                             <div class="header__top__right__language">
                                        <!-- <img src="imgs/language.png" alt="">
                                            <div>English</div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                                <li><a href="#">Spanis</a></li>
                                                <li><a href="#">English</a></li>
                                        </ul> -->
                                    <a href="register.php"><i class="fa fa-user"></i> Register</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="login.php"><i class="fa fa-user"></i> Login</a>
                            </div>
                           <?php } else {?>
                            <div class="header__top__right__language">
                                        <!-- <img src="imgs/language.png" alt="">
                                            <div>English</div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                                <li><a href="#">Spanis</a></li>
                                                <li><a href="#">English</a></li>
                                        </ul> -->
                                    <a href="myaccount.php"><i class="fa fa-user"></i> Myaccount</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="<?=$base_url?>admin/logout.php?usr=1"><i class="fa fa-user"></i> Logout</a>
                            </div>
                           <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?=$base_url?>user/<?=isset($_SESSION['User_code'])? $_SESSION['User_code'] : 1?>"><img src="<?=!empty($settings["s_logo"])?$settings["s_logo"] : $base_url."imgs/default_logo.png" ?>" alt="<?=$settings["s_title"]?>"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="<?=$base_url?>user/<?=$_SESSION['User_code_frontend']?>">Home</a></li>
                            <li><a href="shop">Shop</a></li>
                            <!-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="./blog.html">Blog</a></li> -->
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <!-- <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div> -->
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
     </header>