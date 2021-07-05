<?php
session_start();
 
if(!$_SESSION['email'])
{
 
    header("Location: login.php");
}
include("database/db_conection.php");
 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>User Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel='icon' href="bootstrap-3.2.0-dist\logoMini.png" type='image/x-icon' >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
  </head>
  <body>
  <style>
body {
  font-family: Arial;
  color: white;
}
 
.split {
  height: 100%;
  width: 35%;
  position: fixed;
  top: 0;
  overflow-x: hidden;
  padding-top: 1px;
}
 
.left {
  left: 0;
  background-color: gray;
  
}
 
.right {
  right: 0;
  background-color: transparent;
  color: black;
}
 
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
 
.centered img {
  width: 200px;
  border-radius: 50%;
}
.split2 {
  height: 100%;
  width: 65%;
  position: fixed;
  background-image: url('https://i.pinimg.com/originals/5b/b0/10/5bb01097e72421de5876d42ff5de60ef.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  top: 0;
  overflow-x: hidden;
  padding-top: 1px;
}
 
.left2 {
  left: 0;
  background-color: gray;
  
}
 
.right2 {
  right: 0;
  background-color: transparent;
  color: black;
}
 
.centered2 {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
 
.centered img2 {
  width: 200px;
  border-radius: 50%;
}
</style>
    <div class="container">
      <div class="panel panel-default">     
        <div class="split left">
        <div class="centered">
         <h1 align="center">Login To Your Account</h1>
        <img src="https://icon-library.com/images/shield-png-icon/shield-png-icon-8.jpg"  width="200"  height="200">
 
        <form action="reg.php" method="POST" autocomplete="off">
          <div class="form-group">
            <br/>
            <br/>
            <br/>
            <br/>
            <label>Select Country *</label>
            <select name="category_item" id="category_item" class="form-control input-lg" data-live-search="true" title="Select Country">
            </select>
          </div>
             <div class="form-group">
            <label>Select City *</label>
            <select name="sub_category_item" id="sub_category_item" class="form-control input-lg" data-live-search="true" title="Select City">
            </select>
          </div>
          <input class="btn btn-lg btn-success btn-block" method="post" type="submit" value="Proceed" name="submit" >
        </div>
        <div class="split2 right2">
        <div class="centered">
        <form action="reg.php" method="POST" autocomplete="off">
          <div class="form-group">
    <div class="form-group">
            <label>Login *</label>
            <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
          </div>
              <div class="form-group">
            <label>Password*</label>
            <input class="form-control" placeholder="Password" name="Password" type="Password" autofocus>
          </div>   
          </form>
        </div>
      </div>
      </div>
      </div>
  </div>
</div>
  </body>
</html>
 
 
 
<?php
include("database/db_conection.php");//make connection here
if(isset($_POST['submit']))
{
    $country=$_POST['category_item'];//here getting result from the post array after submitting the form.
    $city=$_POST['sub_category_item'];//here getting result from the post array after submitting the form.
 
    
        if($name=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please select the country')</script>";
echo"<script>window.open('reg.php','_self')</script>";
    }
    if($city=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please select the city')</script>";
echo"<script>window.open('reg.php','_self')</script>";  
}
    if(($country=='86') && ($city=='5203'||$city=='5207'||$city=='5210'||$city=='5211'||$city=='13100'||$city=='13101'||$city=='13102'||$city=='13103'||$city=='13104'||$city=='13105'))
    {
echo"<script>window.open('$reg.php','_self')</script>";  
    }   
 
}
 
?>
 
 
<script>
$(document).ready(function(){
 
  $('#category_item').selectpicker();
 
  $('#sub_category_item').selectpicker();
 
  load_data('category_data');
 
  function load_data(type, category_id = '')
  {
    $.ajax({
      url:"load_data.php",
      method:"POST",
      data:{type:type, category_id:category_id},
      dataType:"json",
      success:function(data)
      {
        var html = '';
        for(var count = 0; count < data.length; count++)
        {
          html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';
        }
        if(type == 'category_data')
        {
          $('#category_item').html(html);
          $('#category_item').selectpicker('refresh');
        }
        else
        {
          $('#sub_category_item').html(html);
          $('#sub_category_item').selectpicker('refresh');
        }
      }
    })
  }
 
  $(document).on('change', '#category_item', function(){
    var category_id = $('#category_item').val();
    load_data('sub_category_data', category_id);
  }); 
});
</script>
