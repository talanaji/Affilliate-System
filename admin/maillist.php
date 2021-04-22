<?php include "header.php";?>
<title>Manage Categories</title>
<?php
if (USER_TYPE == "admin") {
    $whereST = "";
    $hideUsrDDL = "0";
} else {
     $hideUsrDDL = "1";
}
?>

<div class="col-md-12" dir="ltr">

    <div class="form-row">
      
        <div class="form-group col-md-6">
            <label for="inputPassword4">Send letter</label>
                <textarea  id="summernote" id="pa_text" name="pa_text" placeholder="Description" dir="ltr" required></textarea>
        </div>
    
 
 
       <div class="form-group col-md-12">
            <button type="submit" id="btn_add" class="btn btn-primary">Send</button>
       </div>
  </div>



</div>
<div class="col-md-12" dir="ltr">
      <h2>View Email List</h2>
       <div class="row">
     <?php if ($hideUsrDDL == 0) { //show ddl of users ?>
       <div class="col-md-6">
         <label>User Name:</label>
         <select id="usrddl"  class="form-control filter" dir="ltr">
            <?php
                draw_ddl($conf, "u_code", "u_fname", "users", "u_active", 1, " and u_type <>'admin' ", "")
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
              <th>eMail</th>
              <th>Country</th>
              <th>Reffer from</th>
              <th>Enter Date</th>
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
         $('#summernote').summernote();
        draw("ajax/get_maillist.php", "#data_rows");

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
