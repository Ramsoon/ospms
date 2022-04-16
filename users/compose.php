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
$sender=$_SESSION['login'];
$content=$_POST['msg'];
$reciever=$_POST['Supervisor'];
$topic=$_POST['topic'];
$file=$_FILES["file"]["name"];

//move_uploaded_file($_FILES["file"]["tmp_name"],"Uploadeddocs/".$_FILES["file"]["name"]);

move_uploaded_file($_FILES["file"]["tmp_name"],"Uploadeddocs/".$_FILES["file"]["name"]);


$sql=mysqli_query($con, "INSERT INTO tblfeedback (id, Sender, reciever, topic, Nfile, msg, Ntime) VALUES (NULL,'$sender','$reciever','$topic','$file','$content', CURRENT_TIME)
");

// INSERT INTO `tblfeedback` (`id`, `Sender`, `reciever`, `topic`, `Nfile`, `msg`, `Ntime`) VALUES (NULL, '', '', '', NULL, '', CURRENT_TIMESTAMP)


if($sql)
        {
  $successmsg = 'FeedBack Sent Successfully';;
        

        }
        else{
            
$errormsg = 'Error had occured';
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

    <title>OSMPMS | feedBack</title>

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


            <h3><i class="fa fa-angle-right"></i> Send Message </h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                    

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

                      <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
 <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Reciever</label>
<div class="col-sm-10">
<select name="Supervisor" class="form-control"  readonly>
  <?php $ret=mysqli_query($con,"select * from students where RegNo = '".$_SESSION['login']."'");
  $cnt = 1;
while($result=mysqli_fetch_array($ret))
{?>
 
<option value="<?php echo htmlentities($result['SupervisorMail']);?>"><?php echo htmlentities($result['SupervisorName']);?></option>

 
<?php } ?>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Topic</label>
<div class="col-sm-10">
<input type="text" name="topic" required="" class="form-control">
</div>
</div>






<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Message</label>
<div class="col-sm-10">
  <textarea class="form-control" cols="3" rows="5" name="msg" required=""></textarea>

</div>
</div>



<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">File</label>
<div class="col-sm-10">
<input type="file" name="file" val class="form-control">
</div>
</div>



                          <div class="form-group">
                           <div class="col-sm-4" style="padding-left:18% ">
<button type="submit" name="submit" class="btn btn-primary form-control">Send</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
            
            
    </section>
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
