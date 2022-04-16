<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{


if(isset($_GET['del']))
          {
              $id=intval($_GET['id']);

    mysqli_query($con,"UPDATE students set yearProject=NULL,projectFile=NULL,NewStatus =NULL  where id = '$id'");
                  
                  header('location: publish.php');
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

    <title>OSPMS |  Publish Project</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  <script type="text/javascript">
</script>
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h2 class="text-center"><i class="fa fa-upload"></i> Publish Completed Project To Faculty Repository</h2>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-8 col-lg-offset-2">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Student FullName and Reg NO</h4>

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


                      <form class="form-horizontal style-form" method="post" name="chngpwd" >
                        <div class="form-group">

<div class="col-sm-12">
<select name="std" class="form-control"  required="required">
  <?php 
  $ret=mysqli_query($con,"select * from students where SupervisorMail = '".$_SESSION['login']."'");
while($result=mysqli_fetch_array($ret)){?>
 <option value="0"></option>
<option value="<?php echo htmlentities($result['RegNo']);?>"><?php echo htmlentities($result['RegNo']); echo" "; ?> <?php echo strtoupper(htmlentities($result['fullName']));?> </option>

 

</select>
</div>
</div>                 <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<a href="upload.php?cid=<?php echo htmlentities($result['RegNo']);?>">
<button type="button" class="btn btn-primary">Search Details</button></a>
</div>
</div>
                            <?php  } ?>

                          </form>
                                                 <div class="table-responsive">
    <table class="table table-bordered" style="padding: 5px; border-radius: 5px;">
        <thead>
            <tr class="info">
                <th class="text-center"># </th>
                <th class="text-center">Student Reg No </th>
                <th class="text-center">Student Project Topic </th>
                <th class="text-center">Supervisor Name </th>
                <th class="text-center">Year </th>
             
                <th class="text-center">Action </th>
            </tr>
        </thead>
        <tbody>
          <?php $query=mysqli_query($con,"select * from students where SupervisorMail='".$_SESSION['login']."' and (NewStatus='published' || NewStatus='UPLOADED')");
  $c = 1;
while($row=mysqli_fetch_array($query))
{
  ?>
  <tr>
      <td align="center"><?php echo htmlentities($c);?></td>
     
       <td align="center"><?php echo htmlentities($row['RegNo']);?></td>
      <td align="center"><?php echo  strtoupper($row['projectTopic']);?></td>
        
      <td align="center"><?php echo htmlentities($row['SupervisorName']);?></td>
      <td align="center"><?php echo  strtoupper($row['yearProject']);?></td>
        
                              
                                   
  <td align="center">
    <?php 
$status=$row['NewStatus'];
if($status=='published'){ ?>
<a class="fa fa-trash-o" href="publish.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to details?')">
</a>
<?php }
else {
?>
<button type="button" class="btn btn-success">Done</button>
<?php }
?>

    
                                   </td>
                                </tr>
                              <?php $c=$c+1;} ?>
                            
                              </tbody>
    </table>
</div>
 
                          </div>

                          </div>
                          
                          </div>
                          
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
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
<?php } ?>
