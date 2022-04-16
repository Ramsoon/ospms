<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>OSPMS | Project Proposal</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
    
  }
  });
  }
  </script>
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Project Proposal Feedback  </h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12  col-md-offset">
                  <div class="form-panel">

                  <?php $query=mysqli_query($con,"select status from students where RegNo='".$_SESSION['login']."'");
while($row=mysqli_fetch_array($query))
{
?>
<?php $accept=$row['status'];
if($accept=="Approved") { ?>
  <div class="jumbotron">
    <h2>Your Project Proposal have been Approved</h2>

     <a href="Dashboard.php" class="btn btn-info pull-right">home</a>
  </div>
     <?php }else if($accept=="waiting") {?>
       <div class="jumbotron" style="border-radius: 10px;">
<h2 class="">You Request is Been processed...  </h2>
<h1>Please Wait ...   <!-- <a href="Dashboard.php" class="btn btn-info pull-right">home</a> --></h1>
</div>
     <?php }else if($accept=="Rejected") {?>
       <div class="jumbotron" style="border-radius: 10px;">
<h2 class="">You Request is had been Rejected...  </h2>
<h1>Please Wait ...   <!-- <a href="Dashboard.php" class="btn btn-info pull-right">home</a> --></h1>
 
</div>

     <?php }else{?>
       <div class="jumbotron" style="border-radius: 10px;">
<h1 class="text-success text-center">You Have Not generated your Supervisor........  </h1>
<a href="selectSupervisor.php" class="btn btn-info pull-right">Generate Supervisor</a>
</h1>
 
</div>


<!-- <?//php } else{?>
  <div class="jumbotron">
<h1 class="text-success text-center">You Have Not generated your Supervisor........  </h1>
<a href="selectSupervisor.php" class="btn btn-info pull-right">Generate Supervisor</a>
<br>
</div> -->
<?php }}?>

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
<?php } ?>
