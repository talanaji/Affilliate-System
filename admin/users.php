<?php include "header.php";
if(USER_TYPE == "admin"){
?>
<div class="col-md-12">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="p_cat_id">User full name</label>
              <input type="text" class="form-control" id="u_fname" name="u_fname" placeholder="Full name" dir="ltr" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pURL">User Gender </label>
            <select  class="form-control" id="u_sex" name="u_sex" placeholder="Sex" dir="ltr" required>
            <option value="">choose</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pURL">User Email </label>
                <input type="email" class="form-control" id="u_email" name="u_email" placeholder="Email" dir="ltr" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pURL">UserName (Nickname) </label>
                <input type="text" class="form-control" id="u_username" name="u_username" placeholder="Email" dir="ltr" required>
        </div>
 
        <div id="prod_editable" class="row"></div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pURL">Password (contain letter and numbers) </label>
                <input type="text" class="form-control" id="u_password" name="u_password" placeholder="Password" dir="ltr" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pURL">User Type </label>
            <select  class="form-control" id="u_type" name="u_type" placeholder="Sex" dir="ltr" required>
                <option value="">choose</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>        
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pURL">User Mobile </label>
                <input type="phone" class="form-control" id="u_mobile" name="u_mobile" placeholder="Phone Mobile" dir="ltr" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pURL">User Birthdate </label>
                <input type="date" class="form-control" id="u_birthday" name="u_birthday" placeholder="_/_/_" dir="ltr" required>
        </div>
    </div>
    
    <div class="form-group">
        <div class="form-group col-md-6">
            <input class="form-check-input" type="checkbox" checked="checked" id="u_active" name="u_active">
            <label class="form-check-label" for="gridCheck"> Active </label>
        </div>
    </div>
    <button type="submit" id="btn_add" class="btn btn-primary">Save</button>
</div>
<div class="col-md-12">
      <h2>View Users</h2>
      <div class="table-responsive">
      <table class="table table-striped table-sm" dir="ltr">
        <thead>
            <tr>
                <th>User name </th>
                <th>User fullname </th>
                <th>User email </th>
                <th>User mobile </th>
                <th>Date </th>
                <th>Active ?</th>
                 <th>Delete</th>
            </tr>
        </thead>
        <tbody id="data_rows">

        </tbody>
    </table>
      </div>
 </div>
    

 <script type="TEXT/JAVASCRIPT">
    $(document).ready(function(e) {
     
        draw("ajax/get_users.php", "#data_rows");
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
                       
                        toast(sp[1],"Note",sp[0]);
                        draw("ajax/get_users.php", "#data_rows");
                    },
					cache: false,
					contentType: false,
					processData: false 
                });
            });
        $(document).on('click','.edit' , function(){
 
                var curr_code = $(this).attr('title');
                var u_username = $(this).attr('u_username');
                var u_fname = $(this).attr('u_fname');
                var u_email = $(this).attr('u_email');
                var u_mobile = $(this).attr('u_mobile');
                var u_sex = $(this).attr('u_sex');
                var u_birthday = $(this).attr('u_birthday');
                var u_active = $(this).attr('u_active');
               
                var u_type = $(this).attr('u_type');
                if(u_active == 0)
                    $("#u_active").attr('checked' , true);
                else
                    $("#u_active").attr('checked' , false);
               
                    $("#u_password").attr("required",false);
                    $("#curr_code").val(curr_code);
                    $("#u_username").val(u_username);
                    $("#u_fname").val(u_fname);
                    $("#u_email").val(u_email);
                    $("#u_mobile").val(u_mobile);
                    $("#u_sex").val(u_sex);
                    $("#u_birthday").val(u_birthday);
                    $("#u_type").val(u_type);
                    $("#btn_add").text("Edit");
 		});
             $(document).on('click','.Del' , function(){
                  if(confirm("Are you sure")){
                       var pk = $(this).attr('title');
                       var act = $(this).attr('u_active');
                    $.ajax({
                        url: 'ajax/del_users.php' ,
                        type:'POST',
                        data:{random:Math.random(),
                            u_code : pk , 
                            u_active:act
                        },
                        success: function(data)
                        {
                            location.reload();
                        }
                    });
                    }
              });
                
             
          });
</script>
<?php }else{
    ?>
    <div class="col-md-12">
        <h2>You don't have prevlige to log this page </h2>
    </div>
    <?php
} ?>
<?php include "footer.php";?>
