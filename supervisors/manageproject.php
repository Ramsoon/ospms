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

    <title> Manage </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <link href="assets/css/table-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Student </h3>
		  		<div class="row mt">
			  		<div class="col-lg-12">
                      <div class="content-panel">

                        <div class="table-responsive">
    <table class="table table-bordered" style="padding: 5px; border-radius: 5px;">
        <thead>
            <tr class="info">
                <th class="text-center"># </th>
                <th class="text-center">Student Reg No </th>
                <th class="text-center">Student Project Topic </th>
                <th class="text-center">Category </th>
                <th class="text-center">Status </th>
                <th class="text-center">Approve </th>
                <th class="text-center">Action </th>
            </tr>
        </thead>
        <tbody>
          <?php $query=mysqli_query($con,"select * from tblproject where SupervisorMail='".$_SESSION['login']."' AND NOT projectType = 'Proposal'");
  $c = 1;
while($row=mysqli_fetch_array($query))
{
  ?>
  <tr>
      <td align="center"><?php echo htmlentities($c);?></td>
     
       <td align="center"><?php echo htmlentities($row['StudentId']);?></td>
      <td align="center"><?php echo  strtoupper($row['ProjectDetails']);?></td>
        <td align="center"><?php echo  htmlentities($row['projectType']);?></td>
         <td align="center">
<?php 
$status=$row['Mstatus'];
if($status=='waiting')
{ ?>
<button type="button" class="btn btn-info">In Process</button>
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
                                   <a href="student-details2.php?cid=<?php echo htmlentities($row['ProjectNumber']);?>">
<button type="button" class="btn btn-primary">View Details</button></a>
                                   </td>
                                </tr>
                              <?php $c=$c+1;} ?>
                            
                              </tbody>
    </table>
</div>
                          <section id="unseen">
                            
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->			
		  	</div><!-- /row -->
		  	
		  	

		</section>
      </section><!-- /MAIN CONTENT -->
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
    

  </body>
</html>
<?php } ?>
