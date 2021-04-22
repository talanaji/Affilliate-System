<?php include("top_head.php");?>
        <section class="hero">
         <div class="container">
            <div class="row">
                <div class="col-lg-3">
                  <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <?php 
                             while($rowcat = mysqli_fetch_array($selcats)){
                            ?>
                            <li><a href="cat/<?=$rowcat["cat_code"]?>"><?=$rowcat["cat_title"]?></a></li>
                           <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                 <div class="hero__search">
                        <div class="hero__search__form">
                            <form  id="c_form_search" action="search" method="post">
                               
                                <input type="text" name="txt_search" placeholder="What do yo u need?">
                                <button type="submit" name="btn_search" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?=$settings["s_contact_phone"]?></h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>