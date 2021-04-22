<div class="modal" id="alertm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="textbody"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="<?=$base_url?>user/<?=$_SESSION['User_code_frontend']?>"><img src="<?=$settings["s_logo"]?>" alt=""></a>
                        </div>
                        <ul>
                            <li><?=$settings["s_address"]?></li>
                            <li>Phone: <?=$settings["s_contact_phone"]?></li>
                            <li>Email: <a href="mailto:<?=$settings["s_email"]?>" class="__cf_email__"
                                    data-cfemail="">[<?=$settings["s_email"]?>]</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Our Services</a></li>
                        </ul>
                    </div>
                </div>
               
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" id="mailform" method="post">
                            <input type="email" id="mailtext" name="mailtext" placeholder="Enter your mail" required/>
                            <button type="submit" name="mailsubmit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="<?=$settings["s_fb_link"]?>"><i class="fab fa-facebook"></i></a>
                            <a href="<?=$settings["s_instagram"]?>"><i class="fab fa-instagram"></i></a>
                            <a href="<?=$settings["s_twitter_link"]?>"><i class="fab fa-twitter"></i></a>
                            <a href="<?=$settings["s_pinterest"]?>"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                     <center>
                                <form action="https://www.paypal.com/donate" method="post" target="_top">
                                    <input type="hidden" name="hosted_button_id" value="SZAWERUX335FG" />
                                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" title="Donate at least $1 to support us" alt="Donate at least $1 to support us" />
                                    <img alt="" border="0" src="https://www.paypal.com/en_SE/i/scr/pixel.gif" width="1" height="1" />
                                </form>
                     </center>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                Copyright &copy; 
                                <script>
                                document.write(new Date().getFullYear());
                                </script> All rights reserved  <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a href="<?=$base_url?>"
                                    target="_blank">BestGadgets</a>
                            </p>
                            
                        </div>
                        <div class="footer__copyright__payment"><img src="imgs/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?=$base_url?>js/jquery.nice-select.min.js"></script>
    <script src="<?=$base_url?>js/jquery-ui.min.js"></script>
    <script src="<?=$base_url?>js/jquery.slicknav.js"></script>
    <script src="<?=$base_url?>js/mixitup.min.js"></script>
    <script src="<?=$base_url?>js/owl.carousel.min.js"></script>
    <script src="<?=$base_url?>js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e){
            
            $("#mailform").submit(function(e){
                e.preventDefault();
                var mtxt = $("#mailtext").val();
                $.ajax({
                    url:"ajax/add_maillist.php" , 
                    type: "POST" , 
                    data: {random:Math.random(),
                      mailpost : mtxt 
                    },
                    success:function(data){
                        var sp = data.split("╩");
                        toast(sp[1], "Note", sp[0]);
                          $("#mailtext").val('');  
                     }
                });
            });
            document.location.hash = "<?=$get_user["u_username"]?>";

        });
    </script>
</body>

</html>