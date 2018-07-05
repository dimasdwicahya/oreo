<?php
include "dbconfig.php";

echo'
<form name="add_name_pekerjaan" id="add_name_pekerjaan" action="POST">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Material</label>
                             <div class="table-responsive">  
                                      <table class="table table-bordered" id="dynamic_field_pekerjaan">  
                                          <tr>
                                              <td><input type="text" name="name_pekerjaan[]" placeholder="Material" class="form-control name_list" required="" /></td>  
                                              <td><input type="text" name="unit_pekerjaan[]" placeholder="Unit" class="form-control name_list" required="" /></td>  
                                              <td><input type="text" name="volume_pekerjaan[]" placeholder="Volume" class="form-control name_list" required="" /></td>  
                                              <td><button type="button" name="add" id="add_pekerjaan" class="btn btn-success">+</button></td>  
                                          </tr>  
                                      </table>  
                                      <input type="button" name="submit_pekerjaan" id="submit_pekerjaan" class="btn btn-info" value="Submit" /> 
                                  </div>
                    </div>

                    </form>


';

?>
  <!--  SCRIPT UNTUK AJAX WITEL DAN STO -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">

// UNTUK MATERIAL
      $(document).ready(function(){      
      var postURL = "addpekerjaan.php";
      var i=1;  


      $('#add_pekerjaan').click(function(){  
           i++;  
           $('#dynamic_field_pekerjaan').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Material" class="form-control name_list" required /></td><td><input type="text" name="unit[]" placeholder="Unit" class="form-control name_list" required /></td><td><input type="text" name="volume[]" placeholder="Volume" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });


      $(document).on('click', '.btn_remove_pekerjaan', function(){  
           var button_id = $(this).attr("id_pekerjaan");   
           $('#row_pekerjaan'+button_id+'').remove();  
      });  


      $('#submit_pekerjaan').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name_pekerjaan').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added_pekerjaan').remove();
                    $('#add_name_pekerjaan')[0].reset();
                }  
           });  
      });


    }); 


</script>



