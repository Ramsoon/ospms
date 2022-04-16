<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
	$ret=mysqli_query($con,"SELECT * FROM students WHERE RegNo='".$_POST['reg']."' && password='".md5($_POST['password'])."'");
	$num=mysqli_fetch_array($ret);
if($num>0)
{
	$extra="selectSupervisor.php";//
	$_SESSION['login']=$_POST['reg'];
	$_SESSION['id']=$num['id'];
	$host=$_SERVER['HTTP_HOST'];
	$uip=$_SERVER['REMOTE_ADDR'];
	$status=1;
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	header("location:http://$host$uri/$extra");
	exit();

}
else
{

	$_SESSION['login']=$_POST['username'];	
	$uip=$_SERVER['REMOTE_ADDR'];
	$status=0;
	$extra="login.php";

}
 }



if(isset($_POST['change']))
{
   $regNo=$_POST['regNo'];
    $cgpa=$_POST['cgpa'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM students WHERE RegNo='$regNo' and Cgpa='$cgpa'");
$num=mysqli_fetch_array($query);
if($num>0)
{
mysqli_query($con,"update students set password='$password' WHERE RegNo='$regNo' and Cgpa='$cgpa' ");
$msg="Password Changed Successfully";
//echo "<script type='text/javascript'> hw_Document_Attributes(hw_document)	1.location = 'index.php'; </script>";

}
else
{
$errormsg="Invalid RegNo or Incorrect CGPA";
}
}



if(isset($_POST['auth']))
{
   $regNo=$_POST['regNo'];
    $cgpa=$_POST['cgpa'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM students WHERE RegNo='$regNo' and Cgpa='$cgpa'");
$num=mysqli_fetch_array($query);
if($num>0){
	$new=mysqli_query($con,"update students set password='$password' WHERE RegNo='$regNo' and Cgpa='$cgpa'");
		if ($new){
				$msg="Authentication successfull,  " . " Your Password is " . $_POST['password'];
				}
			else{
				$errormsg="Authentication Failed. XX";
				}
}
	else{
		$errormsg="RegNo not found in DB, contact Project Coordinator";
		}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    
    <title>OSPMS | Student Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
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

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" name="login" method="post">
		        <h2 class="form-login-heading">Login</h2>
		        <p style="padding-left:4%; padding-top:2%;  color:red">
		        	<?php if($errormsg){
echo htmlentities($errormsg);
		        		}?></p>

		        		<p style="padding-left:4%; padding-top:2%;  color:green">
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?></p>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="reg" placeholder="CST/15/COM/00202"  required autofocus>
		            <br>
		            <input type="password" class="form-control" name="password" required placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Would you like to recover passcode?</a>
		
		                </span>
		                 <span class="pull-left">
		                    <a data-toggle="modal" href="login.html#myAuth"> Not Yet Authenicated?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> LOG IN</button>
		            <hr> 
		            <span class="pull-center">
		                    <a data-toggle="modal" href="../index.html" class="btn btn-default"> Back to Home portal</a>
		
		                </span>
		           </form>
		            
		
		        </div>
		
		          <!-- Modal -->
		           <form class="form-login" name="forgot" method="post">
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title text-center">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body ">
		                          <p class="text-center">Enter your details below to reset your password.</p>
<input type="text" name="regNo" placeholder="CST/15/COM/00880" autocomplete="off" class="form-control" required><br >
<input type="text" name="cgpa" placeholder="4.33" autocomplete="off" class="form-control" required><br>
 <input type="password" class="form-control" placeholder="New Password" id="password" name="password"  required ><br />
<input type="password" class="form-control unicase-form-control text-input" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" required >

		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="submit" name="change" onclick="return valid();">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		          </form>
		




		          <!-- Modal -->
		           <form class="form-login" name="forgot1" method="post">
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myAuth" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title text-center">STUDENT AUNTHENICATION</h4>
		                      </div>
		                      <div class="modal-body ">
		                          <p class="text-center">Enter your details below to Authenticate.</p>
<input type="text" name="regNo" placeholder="CST/15/COM/00880" autocomplete="off" class="form-control" required><br >
<input type="text" name="cgpa" placeholder="4.03" autocomplete="off" class="form-control" required><br>
 <input type="password" class="form-control" placeholder="New Password" id="password" name="password"  required ><br />
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Abort</button>
		                          <button class="btn btn-theme" type="submit" name="auth" onclick="return valid();">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		          </form>
		
		      	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
   <!--  <script>
        $.backstretch("http://localhost/major/ospms/img/image3.png", {speed: 500});
    </script> -->


  </body>
</html>
