<?php include("header.php");?>



                    <form method="post"   enctype="multipart/form-data" id="c_form">
                     <div class="row" style="border:solid 2px <?=$settings["s_labels_color"]?>; border-radius:10px;padding:15px">
                            <div class="col-md-12">
                                <div class="col-lg-3">Full name</div>
                                <div class="col-lg-9"><input type="text" name="u_fname" id="u_fname" class="form-control" required/></div>
                            </div>   
                            <br />                         
                            <div class="col-md-12">
                                <div class="col-lg-3">Username</div>
                                <div class="col-lg-9"><input type="text" name="u_username" id="u_username" class="form-control" required/></div>
                            </div>    
                            <br />                          
                            <div class="col-md-12">
                                <div class="col-lg-3">Email</div>
                                <div class="col-lg-9"><input type="text" name="u_email" id="u_email" class="form-control" required/></div>
                            </div>         
                            <br />                     
                            <div class="col-md-12">
                                <div class="col-lg-3">Password</div>
                                <div class="col-lg-9"><input type="text" name="u_password" id="u_password" class="form-control" required/></div>
                            </div>
                             <div class="col-md-12">
                                <br />
                                 <div class="col-lg-9"><input type="submit" value="Register" name="btn_add" id="btn_add" class="btn btn-primary" style="background-color:<?=$settings["s_btn_color"]?>" /></div>
                            </div>
                     </div>
                    </form>
                 </div>
            </div>
            
        </div>
       
    </section>

 

 
<script type="text/javascript">
    $(document).ready(function(e){
        $("#c_form").submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                 $("#btn_add").attr("disabled",true);
                $.ajax({
                    url: 'ajax/addEdit_users.php' ,
                    type:'POST',
                    data:formData,
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        var typ = '';
                        $("#btn_add").attr("disabled",false);
                       if(sp[0] == 1){}
                         window.location = "user/"+sp[2];
                        toast(sp[1],"Note",sp[0]);
                      
                        
                     },
					cache: false,
					contentType: false,
					processData: false 
                });
            });
    });
</script>

    

 
<?php include("footer.php");?>