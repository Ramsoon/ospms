<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ 

if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from tblfeedback where id = '".$_GET['id']."'");
                echo "<script> Message  deleted !!! </script>";

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
      <link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">      
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script src="assets/js/chart-master/Chart.js"></script>
    
  
  </head>
  <style type="text/css">
    

.panel-footer{
  height: 100px;
}

  </style>

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
                <h1 class="text-center"><mark>Message History</mark> </h1>
              </div>
            <div class="module-body">

                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-info">
                
            <div class="panel-body">
                    

 <?php $query=mysqli_query($con,"SELECT * from tblfeedback where Sender = '".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) { ?>   
<h4 style="background-color: rgb(213, 222, 220); border-radius: 5px; padding-left: 5px;"><br>
<p class=""> Recieved By <mark><?php echo htmlentities($row['reciever']);?></mark></p><br>
<p class=""> <?php echo htmlentities($row['msg']);?></p><br>
<p class="fa fa-download"> 

<b>File :</b>          
   <?php $cfile=$row['Nfile'];
if($cfile=="" || $cfile=="NULL")
{
  echo strtoupper("File NA");
}
else{ ?>
<a href="../supervisors/uploadeddocs/<?php echo strtoupper($row['Nfile']);?>" target='_blank'> Download File</a>
<?php } ?>
</p>
<p class="fa fa-clock-o pull-right" style="margin: 5px;"> <?php echo ($row['Ntime']);?></p> <br>

<a href="sent.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o btn btn-warning" style="margin: 5px;"></i></a>
<?php } }?>

          </div>

                </div>

            </div>
            </section>
      </section>

       <!-- modal -->
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