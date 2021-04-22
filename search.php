<?php include "header_details.php";?>
<style> 
@import url(https://fonts.googleapis.com/css?family=Roboto);

 
.title {
  text-align: center;
  position: absolute;
  width: 100%;
  font-size: 27px;
  font-family: 'Roboto';
  font-weight: 600;
  z-index: -1;
}

.buttons {
  max-width: 92%;
  width: 900px;
  text-align: right;
  margin: 20px auto 0;
  padding-right: 3%;
}

button {
  height: 36px;
  width: 40px;
  margin-left: 4px;
  font-size: 24px;
  color: orange;
  text-align: center;
  line-height: 1.4;
  border-radius: 4px;
  border: none;
  outline: none;
  background-color: white;
  box-shadow: 0px 1px 2px #bbb;
}

button:hover {
  cursor: pointer;
  box-shadow: 0px 0px 3px #666;
}

button.on {
  color: white;
  background-color: #ccc;
}

.wrapper {
  max-width: 92%;
  width: 900px;
  margin: 10px auto 40px;
  padding: 20px 20px 0; 
  font-family: Roboto;
  position: relative;
  overflow: hidden;
}

.item {
  background-color: #fff;
  overflow: hidden;
  border-radius: 2px;
  box-shadow: 0px 1px 3px #bbb;
}

img {
  display: inline-block;
  float: left;
  max-height: 90%;
  max-width: 90%;
  padding: 1.2%;
}

a {
  display: block;
  transition: 0.2s;
}

a:hover {
  opacity: 0.9;
  cursor: pointer;
}

h2 {
  transition: 0.2s;
}

h2:hover {
  color: #666;
  cursor: pointer;
}

span {
  font-size: 24px;
}

span.price {
  color: orange;
}

 
 .list .item {
    width: 100%;
    margin: 0 auto 20px;
  }
  
  .list img {
    max-width: 30%;
  }
  
  .list.details {
    float: left;
    max-width: 66%;
    margin-top: 4%;
    margin-left: 1%;
  }
 

 
 .grid .item {
    width: 31%;
    margin: 0 2% 20px 0;
    float: left;
    text-align: center;
  }
  
  .grid.item:nth-child(3n) {
    margin-right: 0;
  }
  
  .grid img {
    padding-top: 0;
    max-width: 90%;
    margin: 0 auto;
    float: none;
  }
  
  .grid .grid h2 {
    font-size: 20px;
    margin: 10px 0;
  }
  
   .grid span {
    display: inline-block;
    margin-top: -6px;
    font-size: 19px;
  }
  
  .grid .details {
    float: none;
    max-width: 90%;
    margin: -20px auto 0;
  }
   .grid .details p {
      margin-top: 8px;
    }
 


</style>

<section class="breadcrumb-section set-bg" data-setbg="imgs/searchbar.jpg" style="background-image: url('imgs/searchbar.jpg');">
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
            <div class="title">Search about <?=isset($_POST["btn_search"])?$_POST["txt_search"]:header("location:user/".$_SESSION["User_code_frontend"])?></div>
                <div class="buttons">
                <button class="list-view on"><i class="fa fa-bars"></i></button>
                <button class="grid-view"><i class="fa fa-th"></i></button>
                </div>
                <div class="wrapper list">
                </div>
                    </div>
</section>

<?php include "footer.php";?>
 
<script type="text/javascript">
    $(document).ready(function(){
        howMany = 12;
        listButton = $('button.list-view');
        gridButton = $('button.grid-view');
        wrapper = $('div.wrapper');

        div = '<div class="item"><a href="javascript:void(0);"><img src="http://files.braadmartin.com/gretsch-catalina-club-in-natural.jpg" /></a><div class="details"><h2>Gretsch Catalina Club Jazz</h2><span>Yours for only <span class="price">$599.99</span></span><p>What a classic kit! Available in several great colors, including Natural (shown), Walnut Glaze, White Marine, Copper Sparkle, and Black Galaxy. Every drummer needs one of these.</p></div></div>';

        // Set up divs
        for (i = 0; i < howMany; i++) { 
            $('.wrapper').append( div );  
        }

        listButton.on('click',function(){
            
        gridButton.removeClass('on');
        listButton.addClass('on');
        wrapper.removeClass('grid').addClass('list');
        
        });

        gridButton.on('click',function(){
            
        listButton.removeClass('on');
        gridButton.addClass('on');
        wrapper.removeClass('list').addClass('grid');
        
        });



    });
</script>