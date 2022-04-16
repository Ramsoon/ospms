<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login1'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{ 
$fname=$_POST['Stdname'];
$RegNo=$_POST['StdReg'];
$super=$_SESSION['login1'];
$password = null;

$sql=mysqli_query($con, "INSERT INTO tblstudent(id, RegNo, fullname, password, supervisor, projectTopic, projectDocx, ProjectStatus, ProjectAction) VALUES (NULL, '$RegNo', '$fname', '$password', '$super', NULL, NULL, NULL, NULL)");




  

      

  
}
if(isset($_GET['del']))
          {
                  mysqli_query($con,"delete from tblstudent where id = '".$_GET['id']."'");
                  
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

    <title>OSPMS | Dashboard</title>

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
                  <strong>Well done!</strong><?php echo htmlentities($_SESSION['msg']="Student added Successfully");

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

              <div class="col-md-6 ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <P class="panel-title text-center text-uppercase">LIST OF ASSIGNED STUDENTS UNDER YOUR SUPERVISION </P>
                    </div>
                    <div class="panel-body">
                         <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Reg No</th>
                     
                     
                    </tr>
                  </thead>
                  <tbody>

  <?php 
  $super=$_SESSION['login1'];
  $query=mysqli_query($con,"select * from tblassignment where supervisor = '$super'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
                    <tr>
                      <td align="center"><?php echo htmlentities($cnt);?></td>
                      <td align="center"><?php echo htmlentities($row['FullName']);?></td>
                      <td align="center"><?php echo htmlentities($row['RegNo']);?></td>
                     </tr>
               

                <?php $cnt=$cnt+1; } ?>
                    
                </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center text-uppercase">Insert Assigned Students Detail </h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                          <div class="form-group col-lg-12">
                      <label>Full Name</label>
                         <input class="form-control" type="text" name="Stdname" required="">
                         <p class="help-block"></p>
                </div>
                <div class="form-group col-lg-12">
                      <label>Reg No</label>
                         <input required="" class="form-control" type="text" name="StdReg">
                         <p class="help-block"></p>
                </div>
               <div class="col-lg-6">
                <button name="submit" class="btn btn-primary" >
                Register
              </button>
            </div>
                                
                        </form>
                    </div>
                </div>
            </div>
              <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center text-uppercase">Manage List </h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                          </div>
              <div class="module-body table">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Reg No</th>
                     
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>

<?php $query=mysqli_query($con,"select * from tblstudent where supervisor = '$super'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                  
                    <tr>
                      <td align="center"><?php echo htmlentities($cnt);?></td>
                      <td align="center"><?php echo htmlentities($row['fullname']);?></td>
                      <td align="center"><?php echo htmlentities($row['RegNo']);?></td>
                     
                      <td align="center">
                     
                      <a class="btn btn-primary"  href="addStudent.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" tooltip="Remove"><i class="fa  fa-trash-o"></i></a></td>
                    </tr>
                    <?php $cnt=$cnt+1; } ?>
                    
                </table>
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

