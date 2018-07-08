<!-- 
<script>
        $(document).ready(function(){
            $("#button").click(function(){
                var kd_sto=$("#kd_sto").val();
               
                $.ajax({
                    url:'proses-input-order.php',
                    method:'POST',
                    data:{
                        kd_sto:kd_sto,
                         
                    },
                   success:function(data){
                       alert(data);
                   }
                });
            });
        });
    </script> -->

    
<?php
 //Database Connection
     require "db/dbname.inc";
     require "db/dbconn.inc";
     // Collecting Variable for Inserting in a database.
        //  dbconn("localhost","sap_hygiene","root", "");
        dbconn($strHostName, $strDbName , $strUserName, $strPassword);
 //$cci_no =$_POST['cci_no'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script type="text/javascript" src="script/jquery-1.js"></script>
<script type="text/javascript">
  $(document).ready(function() 
  {
    $('#city').change(function() 
    {
     $.ajax(
      {
          type: "POST",
          contentType: "application/json; charset=utf-8",
          //data: "q=1",
         url: "subcityfetch.php?q=1",
          dataType: "json",
          success: function(data) 
          {
           $("#subcityid").html(data);
          }
        }
       );
      
    });
  });
</script>

</head>
<body>

<form method="post" action="doctors_add.php" enctype="multipart/form-data">


&nbsp;<p>&nbsp; City </p>
<select id="city" name="city_id">
<option value="0">Select City....</option>

<?php 
 
 // Fetching Cities From Database And On Change Function I am calling 

 $query = "select * from cities";
 
 $result = mysql_query("$query",$conn);
 
 while($row=mysql_fetch_array($result))
 {
 
 ?>
 
 <option value="<?php echo $row['city_id']; ?>"> <?php echo $row['city_name'];  ?> </option>"
 
 <?php
 } 
?>
 
</select>

<select id="subcityid" name="sub_city_id">
<option>please slect Subcity</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
</form>
</body>
</html>