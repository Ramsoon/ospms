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
$uid=$_SESSION['id'];
$reg = $_SESSION['login'];
$category=$_POST['category'];
$subcat=$_POST['subField'];
$super=$_POST['Supervisor'];
$superName=$_POST['SupervisorName'];
$projectdetials=$_POST['ProjectDetails'];
$file=$_FILES["file"]["name"];
$chapter = "Chapter";
$type = $_POST['type'];
$new = $chapter . $type;



$student_sql = "SELECT DISTINCT StudentId FROM tblproject WHERE StudentId ='$reg'and projectType = '$new' and (Mstatus = 'waiting' or Mstatus = 'Approved')";

//echo $reg;
$student_query = mysqli_query($con, $student_sql);
$student_data = mysqli_fetch_array($student_query);
if($student_data > 0 && $student_data[0] != ""){
    echo '<script>alert("You have already submitted your" + " '.$new.' " + "and it been Processed, please wait for your supervisors Feedback , if you are having any issue please logged a complain to Project Coordinator")</script>';
}else{

move_uploaded_file($_FILES["file"]["tmp_name"],"Uploadeddocs/".$_FILES["file"]["name"]);

$query=mysqli_query($con,"INSERT INTO tblproject(ProjectNumber, StudentId, category, subField, supervisor, projectType, SupervisorMail, ProjectDetails, projecttFile, regDate, Mstatus) VALUES   (null,'$reg','$category','$subcat','$superName','$new','$super','$projectdetials','$file',CURRENT_TIME,'waiting')");

// code for show PROJECT number
$sql=mysqli_query($con,"select ProjectNumber from tblproject  order by ProjectNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $pms=$row['ProjectNumber'];
}
$no=$pms;
echo '<script> alert("Your document has been successfully filled and your Documentno is  "+"'.$no.'")</script>';
}}?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>OSPMS | Project Chapters</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
    
  }
  });
  }
  </script>
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
  <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Upload Document </h3>
          	
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


<?php 

$reg = $_SESSION["login"];
$sql=mysqli_query($con,"SELECT * from tblproject WHERE StudentId = '$reg' and projectType = 'Proposal'");
while ($rw=mysqli_fetch_array($sql)) {
   ?>

<?php $accept=$rw['Mstatus'];
if($accept=="Approved") { ?>

<div class="form-group" hidden="">
  <label class="col-sm-2 col-sm-2 control-label">Project Category</label>
<div class="col-sm-4">
<input type="text" name="category" required="required" value="<?php echo htmlentities($rw['category']);?>" required="" class="form-control" readonly="">
</div>
<label class="col-sm-2 col-sm-2 control-label">Project SubField</label>
<div class="col-sm-4">
<input type="text" name="subField" required="required" value="<?php echo htmlentities($rw['subField']);?>" required="" class="form-control" readonly="">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label"> Select Chapter  <span style="color: red" class="fa fa-star"></span></option>
</label>
<div class="col-sm-4">
<select name="type"  id="category" class="form-control " onChange="getCat(this.value);" required=""> 
<option value="" active disabled="">Select Chapter

<option ></option>
<option value="1">chapter 1</option>
<option value="2">Chapter 2</option>
<option value="3">Chapter 3</option>
<option value="4">Chapter 4</option>
<option value="5">Chapter 5</option>
</select>
 </div>

<label class="col-sm-2 col-sm-2 control-label">Project Supervisor</label>
<div class="col-sm-4">
<input type="text" name="Supervisor" required="required" value="<?php echo htmlentities($rw['SupervisorMail']);?>" required="" class="form-control" readonly="">
<input type="text" name="SupervisorName" required="required" value="<?php echo htmlentities($rw['supervisor']);?>" required="" class="form-control hidden" readonly="" >


</div>

</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Title of Project </label>
<div class="col-sm-10">
<input type="text" name="ProjectDetails" required="required" value="<?php echo htmlentities($rw['ProjectDetails']);?>" required="" class="form-control" readonly="">
</div>

</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Project Doc  <span style="color: red" class="fa fa-star"></span></label>
<div class="col-sm-10">
<input type="file" name="file" class="form-control" value="" required="">
</div>
</div>



                          <div class="form-group">
                           <div class="col-sm-4" style="padding-left:18% ">
<button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
</div>
</div>

                          </form>
                           </div>
     
                         

  <?php }else if($accept=="waiting") {?>
<h1 class="text-success text-center">Your Project Proposal is been Processed.........  <i></h1>
<br>
<marquee>
<h1>Please Check your dashboard for update ....  </h1>
</marquee>
  <?php }else if($accept=="Rejected") {?>
<h1 class="text-success text-center">Your Project Proposal has been rejected.........  <i></h1>
<br>
<marquee>
<h1>Please Check your dashboard for update ....  </h1>
</marquee>
<?php}?>

                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
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
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php }}} ?>