<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{ 

$title=$_POST['topic'];
$case=$_POST['case'];
$type=$_POST['type'];
$radio=$_POST['radio'];

$super=$_SESSION['login'];


$sql=mysqli_query($con, "INSERT INTO tblSuggest (id, poster, topic, caseStudy,radio, regDate) VALUES (NULL,'$super', '$title','$case','$radio', CURRENT_TIMESTAMP)");
 if($sql)
        {
    
   $successmsg = 'PROJECT TOPIC added Successfully';
            

        }
        else{
            
$errormsg = 'Error had occured';
            }


}
if(isset($_GET['del']))
          {
                  mysqli_query($con,"DELETE from tblsuggest where id = '".$_GET['id']."'");
                  
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

    <title>OSPMS | Suggest</title>

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
               </div>
              <div class="module-body">


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



                  <br />
     <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center text-uppercase">Suggest Project Topic </h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                          <div class="form-group col-lg-12">
                      <label>Topic Title <span style="color: red;" class="fa fa-star warning"></span></label>
                        <textarea name="topic" class="form-control" cols="4" rows="3" required=""></textarea>
                </div>
               
                       <div class="form-group col-lg-12">
                      <label>Case Study <sub>if any</sub> </label>
                        <textarea name="case" class="form-control" cols="4" rows="3"></textarea>
                </div>


                       <div class="form-group col-lg-12">
                      <label>Category</label><br>
                      <input type="radio" name="radio" value="Software Development" active required=""> SOFTWARE <br> 
                      <input type="radio" name="radio" value="Research" required=""> RESEARCH
                            </div>

                     

               
               <div class="col-lg-6">
                <button name="submit" class="btn btn-info" >
                Query
              </button>
            </div>
                                
                        </form>
                    </div>
                </div>
            </div>
              <div class="col-md-12">
               
    <div class="content-panel">

        <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr class="info">
                                  <th class="text-center">#</th>
                                  <th class="text-center"> Project Topic</th>
                                  <th class="text-center"> Project Case Study</th>
                                  <th class="text-center">Category</th>
                                  <th class="text-center">Action</th>
                                  
                              </tr>
        </thead>
          <tbody>
  <?php 
$super=$_SESSION['login'];
$query=mysqli_query($con,"SELECT *  from tblSuggest");
  $cg=1;
while($row=mysqli_fetch_array($query))
{
  ?>
  <tr>
      <td align="center"><?php echo htmlentities($cg);?></td>
     
       <td align="center"><?php echo strtoupper($row['topic']);?></td>
       <td align="center"><?php echo strtoupper($row['caseStudy']);?></td>
         <td align="center">
<?php 
$status=$row['radio'];
if($status==NULL){?>
<button type="button" class="btn btn-warning">NULL</button>
<?php }
if($status=='Software Development'){ ?>
<button type="button" class="btn btn-primary">Software Develpoment</button>
<?php }

if($status=='Research'){ ?>
<button type="button" class="btn btn-success">Research</button>
<?php }
?>

        </td>
<td align="center">
<?php 
$status=$row['publish'];
if($status=='Approved' )
{ ?>
<button type="button" class="btn btn-success" disabled="">Approved</button>
<?php }
else{ ?>
  <a href="suggest.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
<button type="button" class="btn btn-danger  fa fa-trash-o"></button></a>
<?php }
?>

        </td>




                                </tr>
                              <?php $cg =$cg+1;} ?>
                            
                              </tbody>
                          </table>
 
</div>


                          <section id="unseen">
                          </section>
                  </div><!-- /content-panel -->

                
                   
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

