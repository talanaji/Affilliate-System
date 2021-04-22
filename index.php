<?php include("header.php");
     $featur_prod_qr = get_where_value_s($conf, "products , categories ", "cat_user_id", $_SESSION['User_code_frontend'], " and p_cat_id = cat_code and p_user_id = '".$_SESSION['User_code_frontend']."'   and cat_active = 1 and p_active = 1 and p_ismain =1");
     $featur_photo_qr = get_where_value_s($conf, "photos", "ph_prod_id", $featur_prod_qr["p_code"], " and  ph_is_main=1 ");
     $cats_slider = get_where_result($conf, "categories", "cat_user_id", $_SESSION['User_code_frontend'], "  and cat_active = 1 and cat_is_slider=1 ");
     $curency = get_currency_symbol($featur_prod_qr["priceCurrencyCode"]);
 
?>
     
                    <div class="hero__item set-bg" data-setbg="<?=$featur_photo_qr["ph_url"]?>" style="background-size:contain">
                        <div class="hero__text">
                            <span><?=$featur_prod_qr["p_brand"]?></span>
                            <h2><?=$featur_prod_qr["p_name"]?> <br /><?=isset($curency) && isset($featur_prod_qr["price"]) ? $curency.$featur_prod_qr["price"]:""?></h2>
                            <p><?=$featur_prod_qr["p_productCategory"]?></p>
                            <a href="prod/<?=$featur_prod_qr["p_code"]?>" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                <?php 
                 foreach($cats_slider as $cs){?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?=$cs["cat_photo"]?>">
                            <h5><a href="cat/<?=$cs["cat_code"]?>"><?=$cs["cat_title"]?></a></h5>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php 
                                $sel_prodcategory = mysqli_query($conf,"select Distinct p_productCategory from products,categories where p_cat_id = cat_code and cat_user_id ='".$_SESSION["User_code_frontend"]."'") or die(mysqli_error($conf));
                                while($rowpc = mysqli_fetch_array($sel_prodcategory)){
                                    $catrow [] = $rowpc;
                            ?>
                                <li data-filter=".<?=str_replace(" ","-",$rowpc["p_productCategory"])?>"><?=str_replace("and"," & ",$rowpc["p_productCategory"])?></li>
                           <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
             <?php foreach($catrow as $cat){
                  $selprods_under_cat = mysqli_query($conf,"select * from products where p_productCategory = '".$cat["p_productCategory"]."' and p_active = 1 and p_is_featured =1 order by p_code desc") or die(mysqli_error($conf));
                  while($rowprods = mysqli_fetch_array($selprods_under_cat)){
                      $thisprod_photo = get_where_value_s($conf, "photos", "ph_prod_id", $rowprods["p_code"], " and  ph_is_main=1 ");
                      $curencyfprod = get_currency_symbol($rowprods["priceCurrencyCode"]);
                 ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix  <?=str_replace(" ","-",$cat["p_productCategory"])?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?=$thisprod_photo["ph_url"]?>">
                            <ul class="featured__item__pic__hover">
                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                <li><a href="<?=$rowprods["p_url"]?>" target="_blank"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="prod/<?=$rowprods["p_code"]?>"><?=$rowprods["p_name"]?></a></h6>
                            <h5><?=!empty($curencyfprod) && !empty($rowprods["price"]) ? $curencyfprod.$rowprods["price"]:""?></h5>
                        </div>
                    </div>
                </div>
                <?php } 
                    }
                ?>
            </div>
        </div>
    </section>
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <!-- <img src="imgs/banner/banner-1.jpg" alt=""> -->
<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=26&l=ur1&category=kindle&banner=0PK824ECCGEVHTPD8082&f=ifr&linkID=427247d338739138bfc8fb8ef5c0daa0&t=supersnaps20a-20&tracking_id=supersnaps20a-20" width="468" height="60" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <!-- <img src="imgs/banner/banner-2.jpg" alt=""> -->
<iframe src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=13&l=ur1&category=kitchen&banner=0J9GCWM56ZWRSPYPWS82&f=ifr&linkID=2e82b6d71be42af538dccf944d5099d8&t=supersnaps20a-20&tracking_id=supersnaps20a-20" width="468" height="60" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                          <div class="latest-prdouct__slider__item">
                           <?php 
                               $latestQR = mysqli_query($conf,"select * from products where p_active = 1 and p_user_id='".$_SESSION["User_code_frontend"]."' order by p_code desc") or die(mysqli_error($conf));
                               $i = 1 ;
                               while($rowlatest = mysqli_fetch_array($latestQR)){
                                   $latestp_photo = get_where_value_s($conf, "photos", "ph_prod_id", $rowlatest["p_code"], " and  ph_is_main=1 and ph_active = 1");
 
                                   if ($i%3 == 0) {
                                    echo '</div>
                                      <div class="latest-prdouct__slider__item">';
                                    }
                             ?>
                                <a href="prod/<?=$rowlatest["p_code"]?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=$latestp_photo["ph_url"]?>" width="110" height="110" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?=$rowlatest["p_name"]?></h6>
                                        <span><?=$rowlatest["price"]!=""? $rowlatest["p_price"]:""?></span>
                                    </div>
                                </a>
                             <?php 
                              $i++; } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                             <?php 
                               $ratedQR = mysqli_query($conf,"select * from products , products_rate  where pr_p_code = p_code and  p_active = 1 and p_user_id='".$_SESSION["User_code_frontend"]."' order by pr_rate desc") or die(mysqli_error($conf));
                               $j = 1 ;
                               while($rowRated = mysqli_fetch_array($ratedQR)){
                                   $ratedp_photo = get_where_value_s($conf, "photos", "ph_prod_id", $rowRated["p_code"], " and  ph_is_main=1 and ph_active = 1");
 
                                   if ($j%3 == 0) {
                                    echo '</div>
                                      <div class="latest-prdouct__slider__item">';
                                    }
                             ?>
                                <a href="prod/<?=$rowRated["p_code"]?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=$ratedp_photo["ph_url"]?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?=$rowRated["p_name"]?></h6>
                                        <span><?=$rowRated["price"]!=""? $rowRated["p_price"]:""?></span>
                                    </div>
                                </a>
                            <?php $j++ ;} ?>
                            </div>
                        </div>
                    </div>
                </div>
              <!--  <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top views</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="imgs/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="imgs/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="imgs/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="imgs/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="imgs/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="imgs/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
    </section>
  <!--
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="imgs/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="imgs/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="imgs/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
<?php include("footer.php");?>