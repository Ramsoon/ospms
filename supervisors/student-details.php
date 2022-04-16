<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SMPMS | Student Details</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
<?php include('includes/header.php');?>
<?php include('includes/sidebar.php');?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Student Proposal Details</h3>
            <hr />

 <?php $query=mysqli_query($con,"select * from tblproject where SupervisorMail='".$_SESSION['login']."' and ProjectNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{?>




          	<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Student Reg No : </b></label>
          		<div class="col-sm-4">
          		<p><?php echo strtoupper($row['StudentId']);?></p>
          		</div>

          	</div>


<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Project Title :</b></label>
              <div class="col-sm-4">
              <p><?php echo strtoupper($row['ProjectDetails']);?></p>
              </div>
            </div>

<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Name of  Supervisor :</b></label>
              <div class="col-sm-4">
              <p><?php echo strtoupper($row['supervisor']);?></p>
              </div>
            </div>




  <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Type :</b></label>
              <div class="col-sm-4">
              <p><?php echo strtoupper($row['projectType']);?></p>
              </div>
            </div>  



  <div class="row mt">
            
<label class="col-sm-2 col-sm-2 control-label"><b>File :</b></label>
              <div class="col-sm-4">
              <p><?php $cfile=$row['projecttFile'];
if($cfile=="" || $cfile=="NULL")
{
  echo strtoupper("File NA");
}
else{ ?>
<a href="../users/uploadeddocs/<?php echo strtoupper($row['projecttFile']);?>" target='_blank'> <span class="fa fa-download"></span> Download File</a>
<?php } ?>

              </p>

              </div>


            </div> 
            <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b></b></label>
              <div class="col-sm-4">
            <a class="btn btn-info" href="updateProposal.php?cid=<?php echo htmlentities($row['ProjectNumber']);?>" onClick="return confirm('Are you sure you want to details?')">Take Action
</a>
              </div>

            </div>

            </div> 
            




<?php } ?>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
<?php include('includes/footer.php');?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
