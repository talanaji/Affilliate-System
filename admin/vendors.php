<?php include "header.php";
if(USER_TYPE == "admin"){
?>
<div class="col-md-12">
      <h2>View Vendors</h2>
      <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th>#</th>
                <th>Vendor Name</th>
                <th>Active</th>
                <th>Opt</th>
                </tr>
            </thead>
            <tbody id="data_rows">
            
            </tbody>
            </table>
      </div>
 </div>
    

 <script type="TEXT/JAVASCRIPT">
    $(document).ready(function(e) {
     
        draw("ajax/get_vendors.php", "#data_rows");
            $(document).on('click','.Del' , function(e){
                e.preventDefault();
               if(confirm("Are you sure")){
                        var pk = $(this).attr('title');
                        var act = $(this).attr('ven_active');
                   $.ajax({
                        url: 'ajax/del_vendor.php' ,
                        type:'POST',
                        data:{random:Math.random(),
                            ven_code : pk , 
                            ven_active : act
                        },
                        success: function(data)
                        {
                            var sp = data.split('╩');
                           toast(sp[1], "Note", sp[0]);
                           draw("ajax/get_vendors.php", "#data_rows");

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
