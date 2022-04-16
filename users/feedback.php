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
                <h1 class="text-center"><mark>Feedback</mark> </h1>
              </div>
            <div class="module-body">

                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-info">
                
            <div class="panel-body">
                    

 <?php $query=mysqli_query($con,"SELECT * from tblfeedback where reciever = '".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) { ?>   
<h4 style="background-color: cyan; border-radius: 5px; padding-left: 5px;"><br>
<p class="fa fa-user"> <mark><?php echo htmlentities($row['Sender']);?></mark></p><br>
<p class="fa fa-inbox"> <?php echo htmlentities($row['msg']);?></p><br>
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
<?php } ?>

          </div>

                </div>

            </div>
            </section>
      </section>


      <!-- Modal                <form class="form-login" name="forgot1" method="post">
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="my" class="modal fade modal-md">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header ">
                            FEEDBACK SYSTEM
                          </div>
                          <div class="modal-body ">
                          <label>Supervisor Message</label>
                             <p style="background-color: cyan; border-radius: 5px; margin: 10px; padding: 10px;">
                                <?//php echo htmlentities($row['msg']);?>
                              </p>
                                           <?php } ?>
                                                                     <br>
                               <label>Your Reply</label>
                                <textarea cols="" rows="4" name="SendMsg" class="form-control"></textarea>

                            </form>
                             


          </div>
                          <div class="modal-footer">
                            <button class="btn btn-success" type="submit" name="submit">Reply</button>
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            
                          </div>
                      </div>
                  </div>
              </div>
            -->
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