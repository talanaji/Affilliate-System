<?php include "header.php";?>
<title>Manage Products</title>

<?php 
    if (USER_TYPE ==  "admin") {
        $whereST = "";
        $hideUsrDDL = "0";
    } else {
        $whereST = " and cat_user_id = '" . USER_CODE . "'";
        $hideUsrDDL = "1";
    }

?>
<div class="col-md-12 contents_1">
  <div class="form-row">
    <div class="form-group col-md-12">
        <label for="p_cat_id">Product Category</label>
         <select  class="form-control selectpicker"  id="p_cat_id" value="" name="p_cat_id" dir="ltr" required>
          <?php
                 draw_ddl($conf, "cat_code" , "cat_title" , "categories ,users","cat_active", 1, $whereST."  and cat_user_id = u_code " ,"u_username");
          ?>
        </select>
     </div>
  </div>
    <div class="form-row">
        <div class="form-group col-md-12">
        <label for="pURL">Product URL </label>
         <input type="text" class="form-control" id="p_url" name="p_url" placeholder="Product URL" dir="ltr" required>
        </div>
        <div id="prod_attrs" class="row">
        </div>
        <div id="prod_editable" class="row"></div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox"  id="p_is_featured" name="p_is_featured">
            <label class="form-check-label" for="p_is_featured"> Is Featured </label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input type='hidden' name="p_user_id" id="p_user_id" />
            <input class="form-check-input" type="checkbox"  id="p_ismain" name="p_ismain">
            <label class="form-check-label" for="p_is_featured"> Main? </label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" checked="checked" id="p_active" name="p_active">
            <label class="form-check-label" for="p_active"> Active </label>
        </div>
    </div>
    <button type="submit" id="btn_add" class="btn btn-primary">Save</button>
</div>

<div class="col-md-12 contents_1" dir="ltr">
      <h2>View Products</h2>
      <div class="row">
         <div class="col-md-6">
         <label>Category:</label>
         <select  id="catddl" class="form-control filter" dir="ltr">
            <?php 
                draw_ddl($conf, "cat_code" , "cat_title" , "categories","1", 1, $whereST ,"")
            ?>
         </select>
       </div>
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
      <div class="table-responsive">
        <table class="table table-striped table-sm" dir="ltr">
          <thead>
            <tr>

              <th>pic</th>
              <?php if (USER_TYPE == 'admin') {?>
              <th>User</th>
               <?php }?>
              <th>Product Name</th>
              <th>Product Brand</th>
              <th>Category</th>
              <th>Featured?</th>              
              <th>Main?</th>              
              <th>Active</th>              
              <th>photos</th>

              <th colspan="2" ><center>Opt(Edit/Act,deact)</center></th>
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
        var length = $('#catddl > option').length;
        if(length == 1) 
        {
            $(".contents_1").css("display","none");
            toast("There is no category you must add category first", "Note", "-1");
            setTimeout(() => {
                window.location = "categories.php?action=Category";
            }, 3200);
        }
        draw("ajax/get_products.php", "#data_rows");
        $("#p_cat_id").change(function(){ // in case insert moad
            var th = $("#p_cat_id").val();
            if(th != '')
            {
                $.ajax({
                    url: "ajax/get_catuser_id.php", // get the user id from category code in category table ...
                    type:"POST",
                    data:{random:Math.random(),
                      cat_code_post : th
                    },
                    success:function(data){
                        $("#p_user_id").val(data);
                    }
                });
            }
        });
        $('#exampleModalLong11').on('hidden.bs.modal', function () {
            $("#btn_add2").attr("id","btn_add");
            setTimeout(function(){$("#btn_add").attr("type","submit")}, 1000);
            $("#p_cat_id2").attr("id","p_cat_id");
            $("#modal_content").empty();
        });
        $("#p_url").change(function(e){
            var v = $(this);
            $.ajax({
                    url: 'ajax/fetch_url.php' ,
                    type:'POST',
                    data:{random:Math.random(),
                        p_urlV : v.val()   ,
                        insmoad : 1
                    },
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        if(sp[0] < 0)
                        {
                            $("input[type=text]").val('');
                            toast(sp[1], "Note", sp[0]);
                        }
                        $("#prod_attrs").html(sp[1]);
                    }
                });
            });
       
      
        $("#c_form").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
                $("#btn_add").attr("disabled",true);
            $.ajax({
                url: 'ajax/addEdit_products.php' ,
                type:'POST',
                data:formData,
                success: function(data)
                {
                    var sp = data.split('╩');
                    var typ = '';
                    $("#btn_add").attr("disabled",false);
                    toast(sp[1],"Note",sp[0]);
                    draw("ajax/get_products.php", "#data_rows");
                },
                cache: false,
                contentType: false,
                processData: false 
            });
        });
        $(".filter").change(function(e){
            var vu = $("#usrddl").val();
            var vc = $("#catddl").val();
               var params = {
                   catcodepost : vc,
                   ucodepost : vu
               };
             draw_such_params("ajax/get_products.php", "#data_rows", params);
        });
        $(document).on('click','.Del_photo' , function(){
            if(confirm("Are you sure?"))
                $(this).parent().remove();
        });
        $(document).on('click','.edit' , function(){
         //   $("#p_cat_id").attr("id","p_cat_id2"); //change id of select cats in main page to p_cat_id2
              var params = { 
                  curr_code : $(this).attr('title'),
                  p_urlV : $(this).attr('p_url'),
                  p_name :$(this).attr('p_name'),
                  p_brand : $(this).attr('p_brand'),
                  p_productCategory : $(this).attr('p_productCategory'),
                  p_manufacturerUrl : $(this).attr('p_manufacturerUrl'),
                  p_description : $(this).attr('p_description'),
                  p_model : $(this).attr('p_model'),
                  p_cat_id : $(this).attr('p_cat_id') ,
                  priceCurrencyCode : $(this).attr('priceCurrencyCode') , 
                  price : $(this).attr('price'),
                  p_user_id : $(this).attr('p_user_id'),
                  p_active : $(this).attr('p_active'),
                  insmoad : 0
              }
                  $.ajax({
                    url: 'ajax/fetch_url.php' ,
                    type:'POST',
                    data:params,
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        if(sp[0] < 0)
                        {
                            $("input[type=text]").val('');
                            toast(sp[1], "Note", sp[0]);
                        }
                        $("#prod_attrs").html(sp[1]);
                    }
                });
                if(params.p_active == 0)
                  $("#p_active").attr('checked',true);
                  else
                  $("#p_active").attr('checked',false);
 
                $("#curr_code").val(params.curr_code);
                $("#p_urlhid").val(params.p_urlV);
                $("#p_url").val(params.p_urlV);
                $("#p_name").val(params.p_name);
                $("#p_brand").val(params.p_brand);
                $("#p_productCategory").val(params.p_productCategory);
                $("#p_model").val(params.p_model);
                $("#p_manufacturerUrl").val(params.p_manufacturerUrl);
                $("#p_description").val(params.p_description);
                $("#p_model").val(params.p_model);
                $("#p_user_id").val(params.p_user_id);
                setTimeout(() => {
                    $("#priceCurrencyCodes").val(params.priceCurrencyCode);
                }, 1500);
                 $("#p_cat_id").val(params.p_cat_id); //set value in select cat in the modal
             
                

 		});
        $(document).on('click','.Del' , function(){
            if(confirm("Are you sure"))
            {
                var pk = $(this).attr('title');
                var act = $(this).attr('p_active');
                var cat_id = $(this).attr('p_cat_id');
                $.ajax({
                    url: 'ajax/del_product.php' ,
                    type:'POST',
                    data:{random:Math.random(),
                        p_code : pk , 
                        p_active : act , 
                        p_cat_id : cat_id
                    },
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        toast(sp[1], "Note", sp[0]);
                        draw("ajax/get_products.php", "#data_rows");
                    }
                });
             }
        });
        $(document).on('click','.photo_active' , function(){
            if(confirm("Are you sure"))
            {
                var pk = $(this).attr('title');
                var prod_id = $(this).attr('ph_prod_id');
                var act = $(this).attr('ph_active');
                $.ajax({
                    url: 'ajax/update_photo_activity.php' ,
                    type:'POST',
                    data:{
                        random:Math.random(),
                        ph_code : pk , 
                        ph_active : act
                    },
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        toast(sp[1], "Note", sp[0]);
                        setTimeout(function(){
                            var params= {
                                random:Math.random(),
                                p_codePost : prod_id , 
                            };
                            draw_such_params("ajax/fetch_photos.php", "#modal_content", params);   
                            
                        },200);
                       
                     }
                });
             }
        });
        $(document).on('click','.photo_delete' , function(){
            if(confirm("Are you sure"))
            {
                var pk = $(this).attr('title');
                var prod_id = $(this).attr('ph_prod_id');
                 $.ajax({
                    url: 'ajax/remove_photo.php' ,
                    type:'POST',
                    data:{
                        random:Math.random(),
                        ph_code : pk  
                    },
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        toast(sp[1], "Note", sp[0]);
                        setTimeout(function(){
                            var params= {
                                random:Math.random(),
                                p_codePost : prod_id , 
                            };
                            draw_such_params("ajax/fetch_photos.php", "#modal_content", params);   
                        },200);
                     }
                });
             }
        });        
        $(document).on('click','.is_main_v' , function(){ // in fetch photo 
            if(confirm("Are you sure"))
            {
                var pk = $(this).attr('title');
                var main = $(this).attr('ph_is_main');
                var  prod_id = $(this).attr('ph_prod_id');
                $.ajax({
                    url: 'ajax/mainthisphoto.php' ,
                    type:'POST',
                    data:{random:Math.random(),
                        ph_code : pk , 
                        ph_is_main : main ,
                        ph_prod_id: prod_id
                    },
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        toast(sp[1], "Note", sp[0]);
                        var params= {
                                random:Math.random(),
                                p_codePost : prod_id , 
                        };
                       draw_such_params("ajax/fetch_photos.php", "#modal_content", params);
                       draw("ajax/get_products.php", "#data_rows");
                    }
                });
             }
        });
        $(document).on('click','.featur' , function(){ // in fetch photo 
            if(confirm("Are you sure"))
            {
                var pk = $(this).attr('title');
                var p_is_featuredv = $(this).attr('p_is_featured');
                var p_cat_idv = $(this).attr('p_cat_id');
             
                 $.ajax({
                    url: 'ajax/is_featured_prod.php' ,
                    type:'POST',
                    data:{random:Math.random(),
                        p_code : pk , 
                        p_is_featured : p_is_featuredv ,
                        p_cat_id : p_cat_idv 
                    },
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        toast(sp[1], "Note", sp[0]);
                        draw("ajax/get_products.php", "#data_rows");
                     }
                });
             }
        });
        $(document).on('click','.ismainProd123' , function(){ // in fetch photo 
            if(confirm("Are you sure"))
            {
                var pk = $(this).attr('title');
                var p_ismainv = $(this).attr('p_ismain');
                var p_user_idv = $(this).attr('p_user_id');
              
                 $.ajax({
                    url: 'ajax/is_main_prod.php' ,
                    type:'POST',
                    data:{random:Math.random(),
                        p_code : pk , 
                        p_ismain : p_ismainv ,
                        p_user_id: p_user_idv
                    },
                    success: function(data)
                    {
                        var sp = data.split('╩');
                        toast(sp[1], "Note", sp[0]);
                        draw("ajax/get_products.php", "#data_rows");
                     }
                });
             }
        });
        $(document).on('change', '#extraPhoto', function(){
            var ct = this.files.length;
            var pk = $("#curr_code").val();
          
            var i = 0;
            var f = new Array();
           
            var  formdata = new FormData($("#c_form")[0]);
            for(i=0;i<ct;i++){
                var name  = document.getElementById("extraPhoto").files[i].name;
              
                var ext  = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext , ['gif','png','jpg','jpeg']) == -1) 
                {
                    alert("Invalid Image File");
                }
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("extraPhoto").files[i]);
                f[i]  = document.getElementById("extraPhoto").files[i];
                var fsize  = f.size||f.fileSize;
                formdata.append("extraPhoto[]", f[i]);
                
              }
  
              $.ajax({
                    url:"ajax/uploadMore.php",
                    method:"POST",
                    data: formdata ,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend:function(){
                       $('#uploaded_images').html("<label class='text-success'>Image Uploading...</label>");
                    },   
                    success:function(data)
                    {
                       
                        var params= {
                                random:Math.random(),
                                p_codePost : pk , 
                        };
                         setTimeout(function(){draw_such_params("ajax/fetch_photos.php", "#modal_content", params)},1200);
                    }
                });  
         });
  
        $(document).on('click','.Gphoto' , function(){
            var pk = $(this).attr('title');
            $("#curr_code").val(pk);
            var params= {
                    random:Math.random(),
                    p_codePost : pk , 
            };
            $("#exampleModalLong11").modal('show');
            draw_such_params("ajax/fetch_photos.php", "#modal_content", params);
        });    
    });
</script>
<?php include "footer.php";?>
