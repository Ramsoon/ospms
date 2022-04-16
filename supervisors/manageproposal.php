<?php session_start();
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

    <title>SMPMS | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">      
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script src="assets/js/chart-master/Chart.js"></script>
    
  
  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">


            <h3><i class="fa fa-angle-right"></i> Proposal Approval </h3>
            <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="info">
                <th class="text-center">#</th>
                <th class="text-center">Student Reg No</th>
                <th class="text-center">Student Project Topic</th>
                <th class="text-center">Status</th>
                <th class="text-center">Approve</th>
                <th class="text-center">Action</th>
              
            </tr>
        </thead>
         <tbody>
  <?php $query=mysqli_query($con,"select * from tblproject where SupervisorMail='".$_SESSION['login']."' AND projectType = 'Proposal'");
  $co = 1;
while($row=mysqli_fetch_array($query))
{
  ?>
  <tr>
      <td align="center"><?php echo htmlentities($co);?></td>
     
       <td align="center"><?php echo htmlentities($row['StudentId']);?></td>
      <td align="center"><?php echo  htmlentities($row['ProjectDetails']);?></td>
      <td align="center">
<?php 
$status=$row['Mstatus'];
if($status=='waiting' )
{ ?>
<button type="button" class="btn btn-info">in process</button>
<?php }
if($status=='Approved'){ ?>
<button type="button" class="btn btn-success">Approved</button>
<?php }
if($status=='Rejected') {
?>
<button type="button" class="btn btn-danger">Rejected</button>
<?php }
?>

        </td>

        <td align="center">
             <a href="updateProject.php?cid=<?php echo htmlentities($row['ProjectNumber']);?>">
<button type="button" class="btn btn-primary">Take Action</button></a>


        </td>
                                   <td align="center">
                                   <a href="student-details.php?cid=<?php echo htmlentities($row['ProjectNumber']);?>">
<button type="button" class="btn btn-primary">View Details</button></a>
                                   </td>
                                </tr>
                            <?php $co=$co+1; } ?>
                            
                              </tbody>    </table>
</div>

                          <section id="unseen">
                            
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->
        
            
                    

          </section>
      </section>

       
<?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
  </body>
</html>
<?php } ?>
