<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ 
  if (isset($_POST['upload'])) {

    $super=$_SESSION['login'];
  $stdYearr = $_POST['prjectyear'];
  $file=$_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"],"Uploadeddocs/".$_FILES["file"]["name"]);

$sql2=mysqli_query($con,"UPDATE students set yearProject='$stdYearr',projectFile='$file',NewStatus ='published'  where SupervisorMail= '$super'");

if ($sql2) {
     $successmsg = 'Student PROJECT Details Published Successfully';
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

    <title>OSMPMS | Student Details</title>

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
            <h3><i class="fa fa-angle-right"></i> Student Particulars</h3>
            <hr />

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

 <?php $query=mysqli_query($con,
  "select * from students where SupervisorMail='".$_SESSION['login']."' and RegNo='".$_GET['cid']."'"
);
while($row=mysqli_fetch_array($query)){
  $stdName = $row['fullName'];
  $stdRegNo = $row['RegNo'];
  $StdSuperName = $row['SupervisorName'];
  // $stdFile = $row['file'];
  $stdTopic = $row['projectTopic'];
//  $StdSuperName = $row['ProjectDetails'];
}

{?>




            <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Student Reg No : </b></label>
              <div class="col-sm-4">
              <p><?php echo strtoupper($stdRegNo);?></p>
              </div>

            </div>

             <div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Student Fullname : </b></label>
              <div class="col-sm-4">
              <p><?php echo strtoupper($stdName);?></p>
              </div>

            </div>


<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Project Title :</b></label>
              <div class="col-sm-8">
              <p><?php echo strtoupper($stdTopic);?></p>
              </div>
            </div>

<div class="row mt">
            <label class="col-sm-2 col-sm-2 control-label"><b>Name of  Supervisor :</b></label>
              <div class="col-sm-4">
              <p><?php echo strtoupper($StdSuperName);?></p>
              </div>
            </div>




 


<form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >


<div class="row mt">           
<label class="col-sm-2 col-sm-2 control-label"><b>Complete Project File :</b></label>
<div class="col-sm-4">
  <input type="file" name="file" class="form-control" />
</div>
</div> 
<div class="row mt">           
<label class="col-sm-2 col-sm-2 control-label"><b>Year of Completion :</b></label>
<div class="col-sm-4">
  <input type="year" name="prjectyear" placeholder="2019" value="2019" class="form-control" />
</div>
</div> 
      <div class="row mt"> 
      <label class="col-sm-2 col-sm-2 control-label"><b></b></          
<div class="col-sm-6">
  <input type="submit" name="upload" class="form-control btn btn-info" />
</div>
</div> 
      </form>      </div> 
            




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
