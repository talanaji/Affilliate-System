<?php include "header.php";?>
<div class="col-md-12">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="s_title">Page Type</label>
               <select class="form-control" id="pa_type" name="pa_type">
                    <option value="">Choose</option>
                    <option value="<?=WHOUS?>"><?=WHOUS?></option>
                    <option value="<?=POLICY?>"><?=POLICY?></option>
                    <option value="<?=FAQs?>"><?=FAQs?></option>
                </select>
        </div>
    </div>
   
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="pURL">Description </label>
                <textarea  id="summernote" id="pa_text" name="pa_text" placeholder="Description" dir="ltr"></textarea>
        </div>
    </div>
 
        <?php
          if (USER_TYPE == "admin") {
        ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="s_u_code">User name </label>
                    <select  id="pa_u_code" class="form-control filter" name="pa_u_code" dir="ltr">
                        <?php
                            draw_ddl($conf, "u_code", "u_fname", "users", "u_active", 1, "", "u_type")
                        ?>
                    </select>
                </div>
            </div>
            <?php } 
                else 
                {
            ?>
                <input type="hidden" name="pa_u_code" id="pa_u_code" value="<?=$_SESSION["User_code"]?>" />
            <?php
                }
            ?>
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
                <?=USER_TYPE == 'admin' ? "<th>Username </th>" : ""?>
                <th>Page type </th>
                <th colspan="2">opt</th>
            </tr>
        </thead>
        <tbody id="data_rows"></tbody>
    </table>
      </div>
 </div>
  <script type="TEXT/JAVASCRIPT">
    $(document).ready(function(e) {
          $('#summernote').summernote();
          draw("ajax/get_pages.php", "#data_rows");
          $("#c_form").submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                 $("#btn_add").attr("disabled",true);
                $.ajax({
                    url: 'ajax/addEdit_pages.php' ,
                    type:'POST',
                    data:formData,
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        var typ = '';
                        $("#btn_add").attr("disabled",false);

                        toast(sp[1],"Note",sp[0]);
                        draw("ajax/get_pages.php", "#data_rows");
                    },
					cache: false,
					contentType: false,
					processData: false
                });
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
