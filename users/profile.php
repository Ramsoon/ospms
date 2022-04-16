<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}   
else{
  if(isset($_POST['submit']))
{

  include('imageUpload.php');

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

    <title>OSPMS | Students' Profile</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Profile info</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-8  col-md-offset-2">
                  <div class="form-panel">
                  	

 <?php $query=mysqli_query($con,"SELECT * from students where RegNo='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

  <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo strtolower($row['fullName']);?>'s  Profile</h4>
   
<form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
	<div class="form-group">

	 <label class="col-sm-2 col-sm-2 control-label">Full Name</label>
	<div class="col-sm-10">
	 <input type="text" name="fullname" readonly="" required="required" value="<?php echo strtoupper($row['fullName']);?>" class="form-control" >
	</div>
  
    <hr>
 
   <br>
   	<label class="col-sm-2 col-sm-2 control-label">Registeration No </label>
	<div class="col-sm-10">
  	<input type="text" readonly="" name="regno" required="required" value="<?php echo strtoupper($row['RegNo']);?>" class="form-control" readonly>
  </div>
 <hr>


    <!--   <?php if($row['StudentImage']==""){ ?>
   <img src="ppic/noimage.png" width="200" height="200"><?php } else {?>
   <img src="<?php echo strtoupper($row['StudentImage']);?>" width="200" height="200">
   <?php } ?> 
     --><br>
    <label class="col-sm-2 col-sm-2 control-label">Upload New Photo  </label>
    <div class="col-sm-10">
    <input type="file" class="form-control" id="photo" name="myPhoto"/>
    <div class="" disabled="" hidden="">
      <input type="text" name="previousImage" id="previousImage" readonly="" value="<?php echo htmlentities($row['StudentImage']);?>">
     </div>


  </div>

<?php } ?>

  
   <br>
<hr>

 <?php $query=mysqli_query($con,"SELECT * from students where RegNo='".$_SESSION['login']."'");
 while($ro=mysqli_fetch_array($query)) 
 {
 ?>   
<label class="col-sm-2 col-sm-2 control-label">Supervisors' Name</label>
	<div class="col-sm-10">
	<input type="text" name="fullname" readonly="" required="required" value="<?php echo strtoupper($ro['SupervisorName']);?>" class="form-control" >
	 </div>
<br>
<br>
<br>


	<label class="col-sm-2 col-sm-2 control-label">Project Title </label>
	 <div class="col-sm-10">
	<input type="text" readonly="" name="regno" required="required" value="<?php echo strtoupper($ro['projectTopic']);?>" class="form-control" readonly>
	</div>

<?php } ?>

  <br>
<br>
<br>
<br>
  <label class="col-sm-2 col-sm-2 control-label"> </label>
   <div class="col-sm-10">
 <button class="btn btn-theme btn-lg col-sm-4" name="submit" type="submit"><i class="fa fa-camera"></i> Update Photo</button>
  </div>

</div>
   
	





                          

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
