<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{ 

$title=$_POST['topic'];
$case=$_POST['case'];
$type=$_POST['type'];

$super=$_SESSION['login'];

$sql=mysqli_query($con, "INSERT INTO tbl_suggest (id, suggester, title, TopiCase, projecType) VALUES (NULL, '$super', '$title', $case, '$type')");
 
 $_SESSION['msg']="Added Successfully";
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

    <title>OSPMS | Suggest</title>

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

              <div class="span9">
          <div class="content">

            <div class="module">
              <div class="module-head">
                <h1>Student Management</h1>
              </div>
              <div class="module-body">

                  <?php if(isset($_POST['submit']))
{?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong></strong><?php echo htmlentities($_SESSION['msg']);

                  ?>

                  </div>
<?php } ?>


                  <?php if(isset($_GET['del']))
{?>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']="Student data deleted !!");?>
                  </div>
<?php } ?>

                  <br />
     <div class="col-md-5 ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center text-uppercase">Suggest Project Topic </h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                          <div class="form-group col-lg-12">
                      <label>Topic Title <span style="color: red;" class="fa fa-star warning"></span></label>
                        <textarea name="topic" class="form-control" cols="4" rows="3" required=""></textarea>
                </div>
               
                       <div class="form-group col-lg-12">
                      <label>Case Study <sub>if any</sub> </label>
                        <textarea name="case" class="form-control" cols="4" rows="3"></textarea>
                </div>

                       <div class="form-group col-lg-12">
                      <label>Project Type <span class="fa fa-briefcase"></span></label>
                    <select name="type" class="form-control" required="">
                      <option disabled=""> Select Project Type</option>
                  
                      <option value="Software"> Software</option>
                          <option value="Research"> Research</option>

                    </select>
                       </div>

               
               <div class="col-lg-6">
                <button name="submit" class="btn btn-info" >
                Query
              </button>
            </div>
                                
                        </form>
                    </div>
                </div>
            </div>
              <div class="col-md-7">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center text-uppercase">Students List </h3>
                    </div>
                    <div class="panel-body">
                                <div class="module-body table">

                <table cellpadding="0" cellspacing="0" border="3" class="datatable-2 table table-bordered table-striped  display" width="100%">
                  <thead>

                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Name</th>           
                     
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
<?php $quy=mysqli_query($con,"SELECT * from tbl_suggest where suggester = '".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($quy))
{
?>                  

                    <tr>
                       <td align="center"><?php echo htmlentities($cnt);?></td>
                      <td align="center"><?php echo htmlentities($row['title']);?></td>
                      <td align="center"><?php echo htmlentities($row['title']);?></td>
</tbody>                     


       
                    </tr>
                    <?php  $cnt=$cnt+1;} ?>
                    
                </table>
              </div>
            </div>            
                       </div>
                </div>
            </div>
              

  

            


                  	
                  	
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

