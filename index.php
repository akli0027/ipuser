<?php session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit'])) {
  $_SESSION['submit']='';
}
if(isset($_POST['submit']))
{

  $ret=mysqli_query($con,"SELECT * FROM users WHERE userEmail='".$_POST['username']."' and password='".md5($_POST['password'])."'");
  $num=mysqli_fetch_array($ret);
  if($num>0)
  {
$extra="dashbord.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
  $_SESSION['login']=$_POST['username'];  
  $uip=$_SERVER['REMOTE_ADDR'];
  $status=0;
  mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
  $errormsg="Invalid username or password";
  $extra="login.php";
}
}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="images/profile.gif">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="login/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Example</title>
  <script type="text/javascript">
    function valid()
    {
      if(document.forgot.password.value!= document.forgot.confirmpassword.value)
      {
        alert("Password and Confirm Password Field do not match  !!");
        document.forgot.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
  <section class="material-half-bg">
    <div class="cover">
    </div>
    
  </section>
  <section class="login-content">
    <div class="login-box">
     <p style="padding-left:20%; color:red">
      <?php if($errormsg){
        echo htmlentities($errormsg);
      }?>
    </p>
    <p style="padding-left:20%;  color:green">
      <?php if($msg){
        echo htmlentities($msg);
      }?></p>
      
      <form class="login-form" method="post">
        <a class="brand" href="../index.html">
          <div class="thumbnail"><center><img src="images/profile.gif" height="100"/></center></div></a><p/>
          <div class="form-group">
            <input class="form-control" name="username" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>

          <div class="form-group btn-container">
            <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="login/js/jquery-3.2.1.min.js"></script>
    <script src="login/js/popper.min.js"></script>
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="login/js/plugins/pace.min.js"></script>
  </body>
  </html>