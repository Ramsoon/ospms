<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$regno=$_POST['regno'];
	$Cgpa=$_POST['cgpa'];
	$password=md5($_POST['password']);
	$status=1;
	
	$query=mysqli_query($con,"SELECT RegNo AND Cgpa FROM students WHERE RegNo='$regno' and Cgpa='$Cgpa' ");
	$num=mysqli_fetch_array($query);
	
	if($num>0)
		{
			$new=mysqli_query($con,"UPDATE students SET password='$password', status = '1' WHERE RegNo='$regno' and Cgpa='$Cgpa'");
				if ($new){
						$msg="Authentication successfull,  " . "Your Password is " . $_POST['password'];
						}
					else{
						$err="Authentication Failed. XX";
							}
			}
	else{
			$err="RegNo not found in DB";
			}
			
		

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>OSPMS | Student Authentication</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'regNo='+$("#regno").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="post">
		        <h2 class="form-login-heading">Student Authentication</h2>
		        <p class="text-center" style="padding-left: 1%; color: green">
		        	<?php if($msg){
						echo htmlentities($msg);
						}
		        			?>


<p class="text-center" style="padding-left: 1%; color: red">
		        	<?php if($err){
						echo htmlentities($err);
						}
		        			?>


		      
		        <div class="login-wrap">
		         <input type="text" class="form-control" placeholder="Registration No" name="regno" required="required" onBlur="userAvailability()" autofocus>
		           <span id="user-availability-status1" style="font-size:12px;"></span>
		            <br>
		            <input type="text" class="form-control" placeholder="CGPA" id="cgpa"  name="cgpa" required="required">
		
		            <br>
		            <input type="password" class="form-control" placeholder="" required="required" name="password"><br >
		            <br>
		            
		            <button class="btn btn-theme btn-block"  type="submit" name="submit" id="submit"><i class="fa fa-check"></i> Submit</button>
		            <hr>
		            
		            <div class="registration">
		                Already Authenticated<br/>
		                <a class="" href="index.php">
		                   Log in
		                </a>
		            </div>
		
		        </div>
		
		      
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/ui-sam.jpg", {speed: 500});
    </script>


  </body>
</html>
