<?php include "header.php";?>
<title>Manage Categories</title>
<?php
    if (USER_TYPE == "admin") {
        $whereST = "";
        $hideUsrDDL = "0";
    } else {
        $whereST = " and cat_user_id = '" . USER_CODE . "'";
        $hideUsrDDL = "1";
    }
?>
  
<div class="col-md-12" dir="ltr">
  
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Category Name</label>
         <input type="text" class="form-control" id="cat_title" name="cat_title" placeholder="Category Name">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Category description</label>
            <input type="text" class="form-control" id="cat_desc" name="cat_desc" placeholder="Category Description">
        </div>
        <div class="form-group col-md-12">
            <label for="inputphoto">Category picture</label>
            <input type="file" class="form-control" id="cat_photo" name="cat_photo" placeholder="100px × 100px">
       </div> 
       <div class="form-group col-md-12">
         <center>
              <div id="curr_photo" clas="row" style="display:none">
                <a href="" data-lightbox="" id="currphoto_link" target="_blank">
                 <img src="" width="150" height="150" />
               </a>
             </div>
         </center>
       </div>
       <div class="form-group col-md-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cat_active" name="cat_active">
                <label class="form-check-label" for="gridCheck">
                    Active
                </label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="cat_is_slider" name="cat_is_slider">
                <label class="form-check-label" for="gridCheck">
                    Is In Slider
                </label>
            </div>
        </div>
       <div class="form-group col-md-12"> 
            <button type="submit" id="btn_add" class="btn btn-primary">Save</button>
       </div>
  </div>
 

    
</div>
<div class="col-md-12" dir="ltr">
      <h2>View Categories</h2>
       <div class="row">
     <?php if($hideUsrDDL ==0){   //show ddl of users ?>
       <div class="col-md-6">
         <label>User Name:</label>
         <select id="usrddl"  class="form-control filter" dir="ltr">
            <?php 
                draw_ddl($conf, "u_code" , "u_fname" , "users","u_active", 1, " and u_type <>'admin' " ,"")
            ?>
         </select>
       </div>
       <?php }?>
      </div>
      <div class="table-responsive"  dir="ltr">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Desc</th>
              <th>Active</th>
              <th colspan="2">Opt</th>
             </tr>
          </thead>
          <tbody id="data_rows">
           
          </tbody>
        </table>
      </div>
	  </div>
    </main>
 <script type="TEXT/JAVASCRIPT">
    $(document).ready(function(e) {
        draw("ajax/get_cats.php", "#data_rows");
            $("#c_form").submit(function(e){
                e.preventDefault();
                var formData = new FormData(this);
                 $("#btn_add").attr("disabled",true);
                $.ajax({
                    url: 'ajax/addEdit_categories.php' ,
                    type:'POST',
                    data:formData,
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        var typ = '';
                        $("#btn_add").attr("disabled",false);
                       
                        toast(sp[1],"Note",sp[0]);
                        draw("ajax/get_cats.php", "#data_rows");
                    },
					cache: false,
					contentType: false,
					processData: false 
                });
            });
            $(".filter").change(function(e){
               var vu = $("#usrddl").val();
               if(vu != '' ||vu != ''  )
                {
                var params = {
                     ucodepost : vu
                };
                     draw_such_params("ajax/get_cats.php", "#data_rows", params);
                }
            });
            $(document).on('click','.edit' , function(){
                var curr_code = $(this).attr('title');
                var cat_title = $(this).attr('cat_title');
                var cat_desc = $(this).attr('cat_desc');
                var cat_photo = $(this).attr('cat_photo');
                $("#cat_photo").attr('required',false);
                var cat_active = $(this).attr('cat_active');
                var cat_is_slider = $(this).attr('cat_is_slider');
                if(cat_active == 0)
                    $("#cat_active").attr('checked' , true);
                else
                    $("#cat_active").attr('checked' , false);
                    
              if(cat_is_slider == 1)
                    $("#cat_is_slider").attr('checked' , true);
                else
                    $("#cat_is_slider").attr('checked' , false);
                    
                    $("#curr_code").val(curr_code);
                $("#cat_title").val(cat_title);
                $("#cat_desc").val(cat_desc);
                $("#curr_photo").css("display","block");
                $("#currphoto_link").attr("href",cat_photo);
                $("#currphoto_link").attr("data-lightbox",cat_photo);
                $("#curr_photo img").attr("src",cat_photo);
                $("#btn_add").text("Edit");
 		 });
                $(document).on('click','.Del' , function(){
                    if(confirm("Are you sure")){
                        var pk = $(this).attr('title');
                        var act = $(this).attr('cat_active');
                    $.ajax({
                        url: 'ajax/del_cats.php' ,
                        type:'POST',
                        data:{random:Math.random(),
                            cat_code : pk , 
                            cat_active : act
                        },
                        success: function(data)
                        {
                            var sp = data.split('╩');
                           toast(sp[1], "Note", sp[0]);
                           draw("ajax/get_cats.php", "#data_rows");
                        }
                    });
                    }
                });
          });
</script>
<?php include "footer.php";?>
