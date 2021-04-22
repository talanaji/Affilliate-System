<?php include("header_details.php");?>
<section class="breadcrumb-section set-bg" data-setbg="<?=$rowprodcategory["cat_photo"]?>"
    style="background-image: url('<?=$rowprodcategory["cat_photo"]?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?=$title?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?=$base_url?>">Home</a>
                        <span><?=$title?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shoping-cart spad">
    <div class="container">
                    <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select style="display: none;">
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                                <div class="nice-select" tabindex="0"><span class="current">Default</span>
                                    <ul class="list">
                                        <li data-value="0" class="option selected focus">Default</li>
                                        <li data-value="0" class="option">Default</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products Of <?=$title?></th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody id="getData">
                        <?php 
                            while($rowcprods = mysqli_fetch_array($selprodcDetails)){ // $selprodcDetails declared in top_head.php
                                $curency2 = get_currency_symbol($rowcprods["priceCurrencyCode"]);
                                $cphoto = get_where_value_s($conf, "photos", "ph_prod_id", $rowcprods["p_code"], " and  ph_is_main=1 ");
                        ?>
                            <tr>
                                <td class="shoping__cart__item">
                                    <a href="prod/<?=$rowcprods["p_code"]?>">
                                        <img src="<?=$cphoto["ph_url"]?>" style="width:101px important; height:100px !important;" alt="<?=$rowcprods["p_name"]?>">
                                        <h5><?=$rowcprods["p_name"]?></h5>
                                    </a>
                                </td>
                                <td class="shoping__cart__total">
                                    <a href="prod/<?=$rowcprods["p_code"]?>">
                                        <?=!empty($curency2)? $curency2 :""?><?=!empty($rowcprods["price"])? $rowcprods["price"]:"-"?>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("footer.php");?>