<?php include "top_head.php";?>
        <script type="text/javascript">
                $(function() {
                    $('.rating').barrating({
                        theme: 'fontawesome-stars',
                        onSelect: function(value, text, event) {
                            // Get element id by data-id attribute
                            var el = this;
                            var el_id = el.$elem.data('id');
                            // rating was selected by a user
                            if (typeof(event) !== 'undefined') { 
                                var split_id = el_id.split("_");
                                var postid = split_id[1];  // postid
                                // AJAX Request
                                $.ajax({
                                    url: 'ajax/rating_ajax.php',
                                    type: 'post',
                                    data: {
                                        postid:postid,
                                        rating:value
                                    },
                                    dataType: 'json',
                                    success: function(data){
                                        // Update average
                                        var average = data['averageRating'];
                                        $('#avgrating').text(average);
                                    }
                                });
                            }
                        }
                    });
                });
        </script>
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul style="display: none;">
                        <?php
                                while ($rowcat = mysqli_fetch_array($selcats)) {
                                    ?>
                            <li><a href="cat/<?=$rowcat["cat_code"]?>"><?=$rowcat["cat_title"]?></a></li>
                           <?php }?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                                 <input type="text" name="txt_search" action="search" method="post" placeholder="What do yo u need?">
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
            </div>
        </div>
    </div>
</section>