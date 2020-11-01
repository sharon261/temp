<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
.bg{
  background: linear-gradient(87deg, #172b4d 0, #1a174d 100%)
}
</style>
<script type="text/javascript" >

function Validate() {
  
  var alpha=/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/;
  var num=/^\[0-9]{10}$/;
  
//var username = document.forms['vform']['user'];
var email = document.forms['vform']['email'];
var password = document.forms['vform']['password'];
var password_confirm = document.forms['vform']['password_confirm'];
var name = document.forms['vform']['name'];
var phone= document.forms['vform']['mobile'];

//var username_error = document.getElementById('username_error');
var email_error = document.getElementById('email_error');
var password_error = document.getElementById('password_error');
var name_error = document.getElementById('name_error');
var phone_error = document.getElementById('phone_error');

  
  

  if (name.value == "") {
    name.style.border = "1px solid red";
    document.getElementById('name_div').style.color = "red";
    document.getElementById('name_error').style.fontSize = "17px";
    name_error.textContent = "**Name is required";
    name.focus();
    return false;

  }

  if(!alpha.test(name.value)){
    
    name.style.border = "1px solid red";
    document.getElementById('name_div').style.color = "red";
    document.getElementById('name_error').style.fontSize = "17px";
    name_error.textContent = "**Name should contain only alphabets";
    name.focus();
    return false;

  }

// validate email
if (email.value == "") {
	  alert("hey");
    email.style.border = "1px solid red";
    document.getElementById('email_div').style.color = "red";
    document.getElementById('email_error').style.fontSize = "17px";
    email_error.textContent = "**Email is required";
    email.focus();
    return false;
  }
  
  if (phone.value == "") {
    phone.style.border = "1px solid red";
    document.getElementById('phone_div').style.color = "red";
    document.getElementById('phone_error').style.fontSize = "17px";
    phone_error.textContent = "**Phone Number is required";
    phone.focus();
    return false;

  }
  
  if(num.test(phone.value)){
   
    phone.style.border = "1px solid red";
    document.getElementById('phone_div').style.color = "red";
    document.getElementById('phone_error').style.fontSize = "17px";
    phone_error.textContent = "**Invalid number";
    phone.focus();
    return false;

  }
  // validate password

  if (password.value == "") {
     
     password.style.border = "1px solid red";
     document.getElementById('password_div').style.color = "red";
     document.getElementById('password_confirm_div').style.color = "red";
     document.getElementById('password_error').style.fontSize = "17px";
     password_confirm.style.border = "1px solid red";
     password_error.textContent = "**Password is required";
     password.focus();
     return false;
   }
   // check if the two passwords match
   if (password.value != password_confirm.value) {
     
     password.style.border = "1px solid red";
     document.getElementById('password_confirm_div').style.color = "red";
     document.getElementById('password_error').style.fontSize = "17px";
     password_confirm.style.border = "1px solid red";
     password_error.textContent = "**The two passwords do not match";
     return false;
   }


  }
  </script>
</head>
<body>
<div class="container">
    <div class="bg">
    <h1 style="color:white;padding:15px;">Edit Profile</h1>
	</div>
  
	<div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <form class="form-horizontal" role="form" onSubmit="return Validate()" action="" name="vform" method="post" enctype="multipart/form-data">
          <div class="form-group" id="name_div" >
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="name" id="name">
              <div id="name_error"></div> 
            </div>
          </div>
          <div class="form-group" id="email_div">
            <label class="col-lg-3 control-label">Email address:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" id="email">
              <div id="email_error"></div>

            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Mobile:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="mobile" id="mobile">
              <div id="phone_error"></div>
            </div>
          </div>
          <div class="form-group" id="password_div">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="password" id="password">
            </div>
          </div>
          <div class="form-group"  id="password_confirm_div">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="password_confirm">
              <div id="password_error"></div>   
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
			  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
$account_id=1;
$db = mysqli_connect("localhost", "root", "", "clinic") or die("Unable to connect");
$pass=$_POST['password'];
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$reg="UPDATE users SET name='$name',password='$pass',email='$email',mobile='$mobile' where account_id=1";
mysqli_query($db,$reg);
}
?>