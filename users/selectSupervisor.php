<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

    if(isset($_POST['submit'])){
    $reg = $_SESSION["login"];
    $sub_reg_num = strrev(substr(strrev($reg), 0, 3));
    $student_sql = "SELECT DISTINCT SupervisorName FROM students WHERE RegNo ='$reg'";
    $student_query = mysqli_query($con, $student_sql);
    $student_data = mysqli_fetch_array($student_query);
    if($student_data > 0 && $student_data[0] != ""){
          echo '<script>alert("You already have a supervisor assigned to you, if you are having any issue please logged a complain to Project Cordinator")</script>';
      }else{
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

    <title>OSPMS | Select Supervisor </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Auto Supervisor Generator <hr>
               <p class="text-primary"> </p>

            </h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      <?php if($msg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($msg);?></div>
                      <?php }?>

                      <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>


<form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >

  <div class="form-group">
  <div class="col-lg-4 pull-right" >
  <button type="submit" name="submit" class="btn btn-primary form-control" >Generate</button>
  </div>
</div>
</form>
                          
                           <!--ALLOTMENT -->
         <button class="btn btn-info" data-target="#composeModal" data-toggle="modal">VIEW GUIDELINE</button>
        <!--modal popup
        data-backdrop="static" will prevent the modal  from closing when clicked outside the modal

        data-keyboard="false" will prevent the Esc key from closing the modal
        -->
    <div  class="modal fade-in"  data-backdrop="static" data-keyboard="false" role="dialog" tabindex="-1" id="composeModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header " style="background-color: brown;">
                    <button type="button " class="close btn-warning btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                    <h4 class="modal-title" >
                         ALLOTMENT GUIDELINES
                    </h4></div>
     <div class="modal-body">
            <li> The last 3 Digits of students Registeration N<u>o</u> is used to auto generate a project supervisor</li>
                     <li> e.g <em><strong>CST/15/COM/00202</strong></em>
                            <ol>202 % 21</ol>
                            <ol> where 21 is the total count(id) of available supervisors in the DB</ol>
                            <ol>the remainder is <strong>13</strong> </ol>
                            <ol>So therefore, the script will automatically allote this Student to generate Supervisor <strong>#13</strong> on the Supervisor List</ol>
                     </li>
     </div>

                <div class="modal-footer">
                   
                   <p>OSPMS buk FCSIT</p>
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
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
  	<script src="assets/js/bootstrap-switch.js"></script>
    <script src="assets/js/jquery.tagsinput.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	<script src="assets/js/form-component.js"></script>      
  <script>
           $(function(){
          $('select.styled').customSelect();
      });
  </script>
  </body>
</html>