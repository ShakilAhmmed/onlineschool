<?php
include_once '../Config/Config.php';
include_once '../Database/Database.php';
include_once '../Format/Format.php';
spl_autoload_register(function($class){
   include_once '../Class/'.$class.".php";
  });
?>
<?php
  $login=new Login;
  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['sign_up']))
  {
   $login->user_signup($_POST);
  }
  if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login']))
  {
   $login->user_login($_POST);
  }
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Online School Log In</title>

  <script src="https://use.fontawesome.com/c6a0be9dda.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="first_name" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="last_name" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label> 
            <input type="text" name="admin_email" id="email" required autocomplete="off">
            <br/>
             <span id="em" style="color: red;"></span><span id="valid""></span>
          </div>
          <div class="field-wrap">
            <label>
              Confirm Email Address<span class="req">*</span>
            </label> 
            <input type="text" name="confirm_email" id="confirm_email" required autocomplete="off">
           <br/>
            <span id="cem""></span>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password" id="password" required autocomplete="off"><br/>
            <div class="text-center">
            <button type="button" class="btn btn-info" id="show"><i id="eyeshow" class="fa fa-eye" aria-hidden="true"></i></button>
               <button type="button" class="btn btn-danger" id="hide" style="display: none;"> <i class="fa fa-eye-slash" aria-hidden="true"></i></button>
              </div>
            <br/>
       <span id="pass""></span>
          </div>
           
          <div class="field-wrap">
            <label>
              Confirm  Password<span class="req">*</span>
            </label>
            <input type="password" name="confirm_password" id="confirm_passowrd" required autocomplete="off">
            <br/>
           <span id="cpass""></span>
          </div>
          <button type="submit" name="sign_up" id="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
      
          <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post">
         
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block" type="submit" name="login" />Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
<script src="https://ajax.googleapis.com/…/li…/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#email").unbind().keyup(function(){
var email=$(this).val();
$.ajax({
url:'report.php',
type:'post',
data:{'email':email},
success:function(data)
{
  //console.log(data);
  if(!empty(data))
  {
  $("#em").html(data);
  }
}
});
});
$("#confirm_email").unbind().keyup(function(){
var email =$("#email").val();
var confirm_email=$("#confirm_email").val();
if(email==confirm_email)
{
$("#cem").html("<font color='green'>Email Matched</font>");
$("#submit").removeAttr('disabled');
}
else
{
$("#cem").html("<font color='red'>Email Not Match</font>");
$("#submit").attr("disabled","disabled");
}
});
$("#password").unbind().keyup(function(){
var password=$(this).val().length;
if(password<9)
{
$("#pass").html("<font color='red'>Password Weak</font>");
}
else
{
$("#pass").html("<font color='green'>Password Strong</font>");
}
});
$("#confirm_passowrd").unbind().keyup(function(){
var password =$("#password").val();
var confirm_password=$("#confirm_passowrd").val();
if(password==confirm_password)
{
$("#cpass").html("<font color='green'>Password Match</font>");
$("#submit").removeAttr('disabled');
}
else
{
$("#cpass").html("<font color='red'>Password Not Match</font>");
$("#submit").attr("disabled","disabled");
}
});
$("#show").unbind().click(function(){
$('#password').prop('type', 'text');
$("#show").hide();
$("#hide").show();
});
$("#hide").unbind().click(function(){
$('#password').prop('type', 'password');
$("#show").show();
$("#hide").hide();
});
$("#email").keyup(function(){
var email = $("#email").val();
if(email != 0)
{
if(isValidEmailAddress(email))
{
$("#valid").html("<font color='green'> Email Is Valid</font>");
$("#submit").removeAttr('disabled');
} 
else {
$("#valid").html("<font color='red'>Email Is Not Valid</font>");
$("#submit").attr("disabled","disabled");
}
}
else {
$("#valid").html("<font color='red'>You Must Put Email</font>");
$("#submit").attr("disabled","disabled");
}
});
function isValidEmailAddress(emailAddress) {
var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
return pattern.test(emailAddress);
}
});
</script>
