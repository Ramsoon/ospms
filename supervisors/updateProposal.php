<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ 
 if(isset($_POST['update'])){
$ProposalNo=$_GET['cid'];
$status=$_POST['Mstatus'];
//intval($)
$query=mysqli_query($con,
  "SELECT * from tblproject where ProjectNumber='$ProposalNo'"
);
while ($row=mysqli_fetch_array($query)) {
  $std = $row['StudentId'];
  $topic = $row['ProjectDetails'];
}
  $stdd = $std;
  $topicc = $topic;
// echo $stdd;
// echo $topicc;

$sql2=mysqli_query($con,"UPDATE students set status='$status',projectTopic='$topicc' where RegNo= '$stdd'");
 $result=mysqli_query($con,"UPDATE tblproject set Mstatus='$status' where ProjectNumber='$ProposalNo' and projectType = 'Proposal'");

if ($sql2 and $result) {
                    echo "<script>alert('Project Proposal Status have been updated successfully');</script>";
                    }else{
                    echo "<script>alert('Project Proposal Status have not been updated');</script>";} 

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
    <title>Proposal Status</title>
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


    <div class="container">
                       

        <br><br><br><br>

        <br><br><br><br>
              <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center text-uppercase">Project Proposal </h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                          
                                <div class="form-group">
                                  <h3> <b>proposal Number :
                 <?php echo htmlentities($_GET['cid']); ?>
                </h3>
                                </div>
                                <div class="form-group">
                                 


      <select name="Mstatus" required="required" class="form-control ">
      <option value="">Select Status</option>
      <option value='Approved'>Approved</option>
      <option value='Rejected'>Rejected</option>        
      </select>


                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="update" name="update" class="btn btn-lg btn-primary ">
                       
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



      
       
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
