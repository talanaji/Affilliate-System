<?php include "header_details.php";
if(isset($_GET["p_code"]) && !empty($_GET["p_code"])){
?>

 <section class="breadcrumb-section set-bg" data-setbg="<?=$rowprodcategory["cat_photo"]?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
 
                    <h2><?=$rowprodDetails["p_name"]?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?=$base_url?>user/<?=isset($_SESSION['User_code'])? $_SESSION['User_code'] : 1?>">Home</a>
                        <a href="cat/<?=$rowprodcategory["cat_code"]?>"><?=$rowprodcategory["cat_title"]?></a>
                        <span><?=$rowprodDetails["p_name"]?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?=$rowmainphotos["ph_url"]?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                     <?php 
                        while($rowphotos = mysqli_fetch_array($selallprodphotos)){
                     ?>
                         <img width="123" height="123" data-imgbigurl="<?=$rowphotos["ph_url"]?>"
                            src="<?=$rowphotos["ph_url"]?>" alt="" />
                        <?php } ?>
                     </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
            <?php 
                // User rating
                    $query = "SELECT * FROM products_rate,users WHERE pr_p_code='" . $_GET["p_code"] . "' and pr_u_code= u_code";
                    $userresult = mysqli_query($conf, $query) or die(mysqli_error());
                    $fetchRating = mysqli_fetch_array($userresult);
                    $rating = $fetchRating['pr_rate'];
                    
                    // get average
                    $query = "SELECT ROUND(AVG(pr_rate),1) as averageRating FROM products_rate WHERE pr_p_code=" . $_GET["p_code"];
                    $avgresult = mysqli_query($conf, $query) or die(mysqli_error());
                    $fetchAverage = mysqli_fetch_array($avgresult);
                    $averageRating = $fetchAverage['averageRating'];
                   
                   $query = "SELECT count(pr_rate) as countRating FROM products_rate WHERE pr_p_code=" . $_GET["p_code"];
                    $countresult = mysqli_query($conf, $query) or die(mysqli_error());
                    $fetchcount = mysqli_fetch_array($countresult);
                    $countRating = $fetchcount['countRating'];
                   
                    if ($averageRating <= 0) {
                        $averageRating = "No rating yet.";
                    }
                    if($countRating <= 0)
                      $countRating = "No Reviews yet";
                      
                    
            ?>
                <div class="product__details__text">
                    <h3><?=$rowprodDetails["p_name"]?></h3>
                    <div class="product__details__rating post post-action">
                        <select class='rating' id='rating_<?php echo $_GET["p_code"]; ?>' data-id='rating_<?php echo $_GET["p_code"]; ?>'>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <div style='clear: both;'></div>
                            Average Rating : <span id='avgrating'><?php echo $averageRating; ?></span>
                        <span>(<?=$countRating?> reviews)</span>
                         <!-- Set rating -->
                            <script type='text/javascript'>
                                $(document).ready(function(){
                                    $('#rating_<?php echo $_GET["p_code"]; ?>').barrating('set',<?=$rating !=0? $rating: 0 ; ?>);
                                });
                            
                            </script>
                    </div>
                    <?php 
                          $cu = get_currency_symbol($rowprodDetails["priceCurrencyCode"]);
                    ?>
                    <div class="product__details__price"><?=!empty($rowprodDetails["p_price"])? $rowprodDetails["p_price"].$cu:""?></div>
                    <p><?=$rowprodDetails["p_description"]?></p>
                    <!-- <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div> -->
                    <a href="<?=$rowprodDetails["p_url"]?>" target="_blank" class="primary-btn">View on <?=$rowprodDetails["p_domain_name"]== "TO"? "AMAZON": $rowprodDetails["p_domain_name"]?></a>
                    <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                    <ul>
                         <li><b>Share on</b>
                            <div class="share">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?=$base_url."prod/".$rowprodDetails["p_code"]?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="https://twitter.com/intent/tweet?original_referer=<?=$base_url."prod/".$rowprodDetails["p_code"]?>&text=Just saw this on <?=$rowprodDetails["p_domain_name"]== "TO"? "AMAZON": $rowprodDetails["p_domain_name"]?>: <?=$rowprodDetails["p_name"]?> <?=$base_url."prod/".$rowprodDetails["p_code"]?>
" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="http://pinterest.com/pin/create/button/?url=<?=$rowprodDetails["p_url"]?>"  target="_blank"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                   <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Reviews <span>(1)</span></a>
                        </li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p><?=$rowprodDetails["p_description"]?></p>
                            </div>
                        </div>
                        <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                    Proin eget tortor risus.</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
          <?php 
            while($rowRelated = mysqli_fetch_array($selrelatedprod)){
              $rowRelatedphoto =  get_where_value_s($conf, "photos", "ph_prod_id", $rowRelated["p_code"], " and ph_is_main = 1 and ph_active =1 ") ; 
              $cur = get_currency_symbol($rowRelated["priceCurrencyCode"]);
           ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?=$rowRelatedphoto["ph_url"]?>">
                        <ul class="product__item__pic__hover">
                            <!-- <li><a href="#"><i class="fab fa-heart"></i></a></li> -->
                            <li><a href="<?=$rowRelated["p_url"]?>" target="_blank"><i class="fa fa-retweet"></i></a></li>
                            <!-- <li><a href="#"><i class="fab fa-shopping-cart"></i></a></li> -->
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="prod/<?=$rowRelated["p_code"]?>"><?=$rowRelated["p_name"]?></a></h6>
                        <h5><?=!empty($rowRelated["price"])? $cur.$rowRelated["price"]:""?></h5>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
    </div>
</section>

<?php 
     }
     else
       header("location:index.php");

include "footer.php";?>