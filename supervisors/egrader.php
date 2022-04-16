<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit'])){ 

            $RegNo=$_POST['std'];
            $super=$_SESSION['login'];
            $Abstract= $_POST['Abstract'];
            $Background= $_POST['Background'];
            $Statement= $_POST['Statement'];
            $A_O_S= $_POST['A_O_S'];
            $Literature= $_POST['Literature'];
            $SAD= $_POST['SAD'];
            $Implementation= $_POST['Implementation'];
            $Conclusion= $_POST['Conclusion'];
            $Referencing= $_POST['Referencing'];
            $Quality= $_POST['Quality'];
           // $Defense = $_POST['Defense'];
            $counter = $Abstract+$Background+$Statement+$A_O_S+$Literature+$SAD+$Implementation+$Conclusion+$Referencing+$Quality;
           // $counter2 = $Defense;
            $score = $counter; 
        if ($score >=0 and $Score<=100 ) 
        {
              if ($score >=70 and $Score<=100) {
                $grade = 'A';
              }
              elseif ($score >=60 and $Score<=69) {
                $grade = 'B';
              }
              elseif ($score >=50 and $Score<=59) {
                $grade = 'C';
              }
              elseif ($score >=45 and $Score<=49) {
                $grade = 'D';
              }else{
                 $grade = 'F';
              }
        }else{
             echo '<script>alert("Invalid Score")</script>';}
            $sql=mysqli_query($con,"UPDATE students set gradeA = '$counter' where RegNo = '$RegNo' and SupervisorMail = '$super'");
   echo '<script>alert("'.$RegNo.' graded Successfully")</script>';
                if (!$sql) {
                     echo '<script>alert("INternal ErroR")</script>';
                     }
                     header('location: egrader.php');
              }

}
if(isset($_GET['del']))
          {
              $id=intval($_GET['id']);
    mysqli_query($con,"UPDATE students set gradeA = NULL, gradeB = NULL, grade = NULL where id = '".$_GET['id']."'");
                  
                  header('location: egrader.php');
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
  <style type="text/css">
    

.panel-footer{
  height: 100px;
}

  </style>

  <script type="text/javascript">
     
  </script>

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
                <h1 class="text-center">Grader</h1>
              </div>
              <div class="module-body">

              <div class="col-md-12">
                <div class="panel panel-info">
                   
                    <div class="panel-body">
                <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" style="padding: 5px;">


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Student Reg No</label>
<div class="col-sm-10">
<select name="std" class="form-control"  required="required">
  <?php 
  $ret=mysqli_query($con,"select * from students where SupervisorMail = '".$_SESSION['login']."'");
while($result=mysqli_fetch_array($ret)){?>
 <option value="0"></option>
<option value="<?php echo htmlentities($result['RegNo']);?>"><?php echo htmlentities($result['RegNo']); echo" "; ?> <?php echo strtoupper(htmlentities($result['fullName']));?> </option>

 
<?php } ?>
</select>
</div>
</div>




 <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Abstract</label>
<div class="col-sm-4">
<input min="0" max="6" type="number" name="Abstract" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>

</div>
<label class="col-sm-2 col-sm-2 control-label">Background of the Study</label>
<div class="col-sm-4">
<input min="0" max="6" type="number" name="Background" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>

</div>

</div>
<div class="form-group">
<label class="col-s4-2 col-sm-2 control-label">Statement of the Problem</label>
<div class="col-sm-4">
<input min="0" max="6" type="number" name="Statement" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>
</div>
<label class="col-s4-2 col-sm-2 control-label">Aim and Objectives/Significance</label>
<div class="col-sm-4">
<input min="0" max="6" type="number" name="A_O_S" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Literature Review</label>
<div class="col-sm-4">
<input min="0" max="6" type="number" name="Literature" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>
</div>
<label class="col-sm-2 col-sm-2 control-label">System Analysis and Design</label>
<div class="col-sm-4">
<input min="0" max="6" type="number" name="SAD" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Implementation</label>
<div class="col-sm-4">
<input min="0" max="6" type="number" name="Implementation" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>
</div>
<label class="col-sm-2 col-sm-2 control-label">Conclusion(s)</label>
<div class="col-sm-4">
<input min="0" max="6" type="number" name="Conclusion" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Referencing</label>
<div class="col-sm-4">
<input min="0" max="6"  type="number" name="Referencing" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>
</div>




<div class="form-group">
<label class="col-sm-4 control-label">Overall Quality of the work (
Structure and English)</label>
<div class="col-sm-2">
<input type="number"6in="0" max="6" name="Quality" required="" class="form-control">
<p class="help-text text-danger text-center">Score for each 0 - 6</p>
</div>
</div>

<div class="form-group">
<div class="col-sm-3">
<button onClick="return confirm('Are you sure you want to Submit?')" class="form-control btn-success" name="submit"><span  class="fa fa-save"> GRADE</span></button>
</div>
</div>
                                </form>

                        <div class="table-responsive">
    <table class="table table-bordered" style="padding: 5px; border-radius: 5px;">
        <thead>
            <tr class="info">
                <th class="text-center"># </th>
                <th class="text-center">Student Reg No </th>
                <th class="text-center">Student Project Topic </th>
                <th class="text-center">Supervisor Grade </th>
                  <th class="text-center">Defense Grade </th>
                <th class="text-center">Grade </th>
                <th class="text-center">Action </th>
            </tr>
        </thead>
        <tbody>
          <?php $query=mysqli_query($con,"select * from students where SupervisorMail='".$_SESSION['login']."'");
  $c = 1;
while($row=mysqli_fetch_array($query))
{
  ?>
  <tr>
      <td align="center"><?php echo htmlentities($c);?></td>
     
       <td align="center"><?php echo htmlentities($row['RegNo']);?></td>
      <td align="center"><?php echo  strtoupper($row['projectTopic']);?></td>
         <td align="center">
<?php 
$status=$row['gradeA'];
if($status==NULL)
{ ?>
Not Yet Graded
<?php }
else {
?>
<?php echo ($status);?>
<?php }
?>

        </td>
        <td align="center">
<?php 
$status=$row['gradeB'];
if($status==NULL)
{ ?>
Not Yet Inputed
<?php }
else {
?>
<?php echo ($status);?>
<?php }
?>

        </td>
        <td align="center">
<?php 
$status=$row['gradeB'];
$statusN=$row['grade'];

if($status==NULL)
{ ?>
Awaiting Total Compliation
<?php }
else {
?>
<?php

 echo ($statusN);
 }
?>

        </td>
                                           <td align="center">
<?php 
$statusN=$row['grade'];

if ($statusN==NULL)
{?>
  <a class="fa fa-edit" href="edit-grade.<?php  ?>?id=<?php echo htmlentities($row['id']);?>" onClick="return confirm('Are you sure you want to edit grades?')"></a>
  <a class="fa fa-trash-o" href="egrader.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to empty grades?')">
</a>
<?php }
else{   
 echo "DONE";
 }
?>

        </td>
                

                                </tr>
                              <?php $c=$c+1;} ?>
                            
                              </tbody>
    </table>
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