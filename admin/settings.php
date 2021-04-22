<?php include "header.php";?>
<div class="col-md-12">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_title">Site title</label>
              <input type="text" class="form-control" id="s_title" name="s_title" placeholder="Full name" dir="ltr" required>
        </div>
    </div>
    <?php 
        if (USER_TYPE ==  "admin") {
    ?>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_u_code">User name </label>
             <select  id="s_u_code" class="form-control filter" name="s_u_code" dir="ltr">
                <?php 
                    draw_ddl($conf, "u_code" , "u_fname" , "users","u_active", 1, "" ,"u_type")
                ?>
            </select>
        </div>
    </div>
    <?php }else{
        ?>
        <input type="hidden" name="s_u_code" id="s_u_code" value="<?=$_SESSION["User_code"]?>" />
    <?php
    }?>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_keyword">Keywords </label>
                <input type="text" class="form-control" id="s_keyword" name="s_keyword" placeholder="Keywords" dir="ltr">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-<?=USER_TYPE ==  "admin"?"6":"12"?>">
            <label for="s_background_color"> Background color </label>
                <input type="text" class="form-control colorpickers" readonly id="s_background_color" name="s_background_color"  dir="ltr">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="pURL">Description </label>
                <textarea type="text" class="form-control" id="s_desc" name="s_desc" placeholder="Description" dir="ltr"></textarea>
        </div>
    </div>
     <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_font_color">Font color </label>
                <input type="text" class="form-control colorpickers" readonly id="s_font_color" name="s_font_color"   dir="ltr">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_btn_color">Buttons color </label>
                <input type="text" class="form-control colorpickers" readonly id="s_btn_color" name="s_btn_color"  dir="ltr">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_labels_color">Labels color ( Bars and Navs) </label>
                <input type="text" class="form-control colorpickers" readonly id="s_labels_color" name="s_labels_color"  dir="ltr" >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_slider_btn_color">Slider Buttons color</label>
                <input type="text" class="form-control colorpickers" readonly id="s_slider_btn_color" name="s_slider_btn_color"  dir="ltr">
        </div>
    </div> 
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_email">Email </label>
             <input type="email" class="form-control" id="s_email" name="s_email" placeholder="Your email" dir="ltr">
         </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_address">Address </label>
             <input type="text" class="form-control" id="s_address" name="s_address" placeholder="Shop address" dir="ltr">
         </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_whatsapp_link">Whatsapp </label>
                <input type="text" class="form-control" id="s_whatsapp_link" name="s_whatsapp_link" placeholder="Phone Mobile" dir="ltr">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_twitter_link">Twitter </label>
                <input type="text" class="form-control" id="s_twitter_link" name="s_twitter_link"  dir="ltr">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_fb_link">Facebook page </label>
                <input type="phone" class="form-control" id="s_fb_link" name="s_fb_link"   dir="ltr" >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pURL">Facebook messanger </label>
                <input type="text" class="form-control" id="s_fbmessanger_link" name="s_fbmessanger_link" dir="ltr" >
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_pinterest">Pinterest </label>
                <input type="text" class="form-control" id="s_pinterest" name="s_pinterest" dir="ltr" >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_pinterest">Instagram </label>
                <input type="text" class="form-control" id="s_instagram" name="s_instagram" dir="ltr" >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="s_contact_phone">Open Time </label>
                <select class="form-control" id="s_opentime" name="s_opentime" dir="ltr">
                 <option value="">Choose</option>
                 <option value="10:00AM-20:00PM">10:00AM-20:00PM</option>
                 <option value="Open Always">Open Always</option>
                </select>
         </div>
    </div>  
    <div class="form-row">
            <div class="form-group col-md-6">
                <label for="s_contact_phone">Contact Phone </label>
                    <input type="phone" class="form-control" id="s_contact_phone" name="s_contact_phone" dir="ltr" >
            </div>
    </div>  
    
    <div class="form-row">
            <div class="form-group col-md-6">
                <label for="s_contact_phone">Latitude </label>
                    <input type="phone" class="form-control" id="s_latitude" name="s_latitude" dir="ltr" readonly>
            </div>
    </div>  
    <div class="form-row">
            <div class="form-group col-md-6">
                <label for="s_contact_phone">Longitude </label>
                    <input type="phone" class="form-control" id="s_longitude" name="s_longitude" dir="ltr" readonly>
            </div>
    </div>  
        <div class="form-row">
            <div id="maparea" class="form-group col-md-12">
                <div id="mapitems" style="width:100%; height: 540px"></div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="s_contact_phone">Site Logo </label>
                <input type="file" class="form-control" id="s_logo" name="s_logo" dir="ltr" >
                <span>Max dimenssion 120px × 100px optional</span>
                 <center>
                    <div id="curr_photo" clas="row" style="display:none">
                        <a href="" data-lightbox="" id="currphoto_link" target="_blank">
                        <img src="" width="150" height="150" />
                    </a>
                    </div>
                </center>
        </div>
    </div>  
     
    <div class="form-group">
        <div class="form-group col-md-6">
            <button type="submit" id="btn_add" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
<div class="col-md-12">
      <h2>View Settings</h2>
      <div class="table-responsive">
      <table class="table table-striped table-sm" dir="ltr">
        <thead>
            <tr>
                <th>Site title </th>
                <?=USER_TYPE == 'admin'? "<th>Username </th>":""?>
                <th>Background color </th>
                <th>Font Color </th>
                <th>Buttons Color </th>
                <th>Labels Color</th>
                <th>Slider Buttons color</th>
                <th>Email</th>
                <th>Contact Phone</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="data_rows"></tbody>
    </table>
      </div>
 </div>
 <script type="TEXT/JAVASCRIPT">
    $(document).ready(function(e) {
         draw("ajax/get_settings.php", "#data_rows");
         $('.colorpickers').colorpicker({});
         $(".colorpickers").click(function(){
             $(this).val('');
         });
         $("input[type=color]").val('');
         $("#c_form").submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                 $("#btn_add").attr("disabled",true);
                $.ajax({
                    url: 'ajax/addEdit_settings.php' ,
                    type:'POST',
                    data:formData,
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        var typ = '';
                        $("#btn_add").attr("disabled",false);
                       
                        toast(sp[1],"Note",sp[0]);
                        draw("ajax/get_settings.php", "#data_rows");
                    },
					cache: false,
					contentType: false,
					processData: false 
                });
            });
        $(document).on('click','.reset' , function(){
            if(confirm("Are You Sure ?")){ 
                var params = {
                   curr_codePost : $(this).attr('title')
                 };
                 draw_such_params("ajax/resetStyle.php", "", params);
                 draw("ajax/get_settings.php", "#data_rows");

            }
        });  
        $(document).on('click','.edit' , function(){
                var curr_code = $(this).attr('title');
                var s_title = $(this).attr('s_title');
                var s_u_code = $(this).attr('s_u_code');
                var s_keyword = $(this).attr('s_keyword');
                var s_desc = $(this).attr('s_desc');
                var s_background_color = $(this).attr('s_background_color');
                var s_font_color = $(this).attr('s_font_color');
                var s_btn_color = $(this).attr('s_btn_color');
                var s_labels_color = $(this).attr('s_labels_color');
                var s_email = $(this).attr('s_email');
                var s_whatsapp_link = $(this).attr('s_whatsapp_link');
                var s_twitter_link = $(this).attr('s_twitter_link');
                var s_fbmessanger_link = $(this).attr('s_fbmessanger_link');
                var s_fb_link = $(this).attr('s_fb_link');
                var s_contact_phone = $(this).attr('s_contact_phone');
               var s_slider_btn_color = $(this).attr('s_slider_btn_color');
               var s_pinterest = $(this).attr('s_pinterest');
               var s_instagram = $(this).attr('s_instagram');
               var s_latitude = $(this).attr('s_latitude');
               var s_longitude = $(this).attr('s_longitude');
               var s_opentime = $(this).attr('s_opentime');
               var s_address = $(this).attr('s_address');
               var s_logo = $(this).attr('s_logo');
                
                     $("#curr_code").val(curr_code);
                    $("#s_title").val(s_title);
                    $("#s_u_code").val(s_u_code);
                    $("#s_keyword").val(s_keyword);
                    $("#s_desc").val(s_desc);
                    $("#s_background_color").val(s_background_color);
                    $("#s_font_color").val(s_font_color);
                    $("#s_btn_color").val(s_btn_color);
                    $("#s_labels_color").val(s_labels_color);
                    $("#s_email").val(s_email);
                    $("#s_whatsapp_link").val(s_whatsapp_link);
                    $("#s_twitter_link").val(s_twitter_link);
                    $("#s_fbmessanger_link").val(s_fbmessanger_link);
                    $("#s_fb_link").val(s_fb_link);
                    $("#s_contact_phone").val(s_contact_phone);
                    $("#s_slider_btn_color").val(s_slider_btn_color);
                    
                    
                    $("#s_pinterest").val(s_pinterest);
                    $("#s_instagram").val(s_instagram);
                    $("#s_latitude").val(s_latitude);
                    $("#s_longitude").val(s_longitude);
                    if_gmap_loadpicker();
                    $("#s_opentime").val(s_opentime);
                    $("#s_address").val(s_address);
                    
                    
                    $("#curr_photo").css("display","block");
                        $("#currphoto_link").attr("href",s_logo);
                        $("#currphoto_link").attr("data-lightbox",s_logo);
                        $("#curr_photo img").attr("src",s_logo);
                     $("#btn_add").text("Edit");
 		        });
            });
</script>
 
<?php include "footer.php";?>
