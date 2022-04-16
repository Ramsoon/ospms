<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
$Reg_No = $_SESSION['login'];


// $student_sql = "SELECT DISTINCT * FROM tblproject WHERE StudentId ='$Reg_No'";
// //echo $reg;
// $student_query = mysqli_query($con, $student_sql);
// $student_data = mysqli_fetch_array($student_query);
// if($student_data > 0 && $student_data[0] != ""){
//     header('location:submitExtra.php');
// }else{
if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];
$reg = $_SESSION['login'];
$category=$_POST['category'];
$subcat=$_POST['subcategory'];
$super=$_POST['Supervisor'];
$superName=$_POST['SupervisorName'];
$projectdetials=$_POST['ProjectDetails'];
$file=$_FILES["file"]["name"];
$type = "Proposal";


$student_sql = "SELECT DISTINCT StudentId FROM tblproject WHERE StudentId ='$reg'and projectType = '$type'  AND (Mstatus = 'waiting' or Mstatus = 'Approved')";
//echo $reg;
$student_query = mysqli_query($con, $student_sql);
$student_data = mysqli_fetch_array($student_query);
if($student_data > 0 && $student_data[0] != ""){
    echo '<script>alert("You have already submitted your" + " '.$type.' " + "and it been Processed, please wait for your supervisors Feedback , if you are having any issue please logged a complain to Project Coordinator")</script>';
}else{





move_uploaded_file($_FILES["file"]["tmp_name"],"Uploadeddocs/".$_FILES["file"]["name"]);


$query=mysqli_query($con,"INSERT INTO tblproject(ProjectNumber, StudentId, category, subField, supervisor, projectType, SupervisorMail, ProjectDetails, projecttFile, regDate, Mstatus) VALUES   (null,'$reg','$category','$subcat','$superName','$type','$super','$projectdetials','$file',CURRENT_TIME,'waiting')");
// code for show complaint number
$sql=mysqli_query($con,"select ProjectNumber from tblproject  order by ProjectNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $pms=$row['ProjectNumber'];
}
$no=$pms;
echo '<script> alert("Your document has been successfully filled and your Documentno is  "+"'.$no.'")</script>';
}}

    if(isset($_POST['generate'])){
            $reg = $_SESSION["login"];
            $sub_reg_num = strrev(substr(strrev($reg), 0, 3));
            $student_sql = "SELECT DISTINCT SupervisorName FROM students WHERE RegNo ='$reg'";
            $student_query = mysqli_query($con, $student_sql);
            $student_data = mysqli_fetch_array($student_query);
            if($student_data > 0 && $student_data[0] != ""){
                echo '<script>alert("You already have a supervisor assigned to you, if you are having any issue please logged a complain to Project Cordinator")</script>';
              }
            else{
                  $num_of_lecturers = mysqli_fetch_array(mysqli_query($con, "SELECT count(id)FROM tblsupervisor"));
                  $assign_std_to_lecturer = $sub_reg_num%$num_of_lecturers[0];
                  $sql = "SELECT DISTINCT username, fullName FROM tblsupervisor where id = '$assign_std_to_lecturer'";
                  $query = mysqli_query($con, $sql);
                  $data = mysqli_fetch_array($query);
                  $student_supervisor_email = $data[$assign_std_to_lecturer];
                  $student_supervisor_name = $data[1];
                  $student_supervisor = $data[0];
                  $store_supervisor = mysqli_query($con, "UPDATE students SET SupervisorName='$student_supervisor_name',Accept='1', SupervisorMail = '$student_supervisor' WHERE RegNo = '$reg';");
                  if($store_supervisor){
                    echo "<script>alert('Your Supervisor is: ".$student_supervisor_name."')</script>";
                  }else{
                    echo "<script>alert('Internal Error!!!')</script>";
                    }

      }
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

    <title>OSPMS | Project Proposal</title>

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
            <h3><i class="fa fa-angle-right"></i> DOCUMENTS  </h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
        
              <div class="col-lg-12">
                  <div class=" col-lg-5">

                    <h2>USE THIS TEMPLATE FOR YOUR PROJECT</h2>
                    <H6> DOCUMENTS MUST BE IN A Docx. FORMAT</H6>
                <fieldset>
                  <label>PROJECT PROPOSAL  (template)  <span class="fa fa-file-o"></span></label><br>

                  <a class="btn btn-primary" href="../document/proposal.docx" target=''> <span class="fa fa-download"></span> Download File</a>
                </fieldset>

    </div>
    <div class=" col-lg-7">

                    <h2>Suggested Topics and their Case Study</h2>
                    <H6> If Desired please Compose your Proposal, Using the provided Temeplate</H6>
                <fieldset>
                 

                  <a class="btn btn-success" data-toggle="modal" href="#myProject"> <span class="fa fa-eye"></span> Click to View List</a>
                </fieldset>

    </div>
  </div>
            </section>
          </section>
      

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Upload Proposal </h3>
          	
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


<?php 
$reg = $_SESSION["login"];
$sql=mysqli_query($con,"SELECT * from students WHERE RegNo = '$reg'");
while ($rw=mysqli_fetch_array($sql)) {
   ?>

<?php $accept=$rw['SupervisorMail'];
if($accept!=NULL) { ?>

        <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >

<div class="form-group">
<label class="col-sm-1 col-sm-1 control-label">Category</label>
<div class="col-sm-3">
<select name="category" id="category" class="form-control" onChange="getCat(this.value);" required="">
<option value="">Select Category</option>
<?php $sql=mysqli_query($con,"select id,categoryName from category ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['id']);?>"><?php echo htmlentities($rw['categoryName']);?></option>
<?php
}
?>
</select>
 </div>
<label class="col-sm-1 col-sm-1 control-label">Sub Field </label>
 <div class="col-sm-3">
<select name="subcategory" id="subcategory" class="form-control" >
<option value="">Select SubField</option>

</select>
</div>

<label class="col-sm-1 col-sm-1 control-label">Project Supervisor</label>
<div class="col-sm-3">
  <?php $query=mysqli_query($con,"select SupervisorMail,SupervisorName from students where RegNo='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

<input type="text" name="SupervisorName" class="form-control" value="<?php echo htmlentities($row['SupervisorName']);?>" readonly>

<input type="text" name="Supervisor" class="form-control hidden" value="<?php echo htmlentities($row['SupervisorMail']);?>" >

<?php
}
?>

</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Title of Project</label>
<div class="col-sm-10">
<input type="text" name="ProjectDetails" required="required" value="" required="" class="form-control">
</div>

</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Formal Project Proposal Doc </label>
<div class="col-sm-10">
<input type="file" name="file" class="form-control" value="">
</div>
</div>



                          <div class="form-group">
                           <div class="col-sm-4" style="padding-left:18% ">
<button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
</div>
</div>

                          </form>

                        

<?php } else{?>
 
<h1 class="text-success">You Have Not generated your Supervisor........  
</h1>
<?php }}?>
  <form method="POST">
  <button type="submit" name="generate" class="btn btn-primary " >Generate</button>
 
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
