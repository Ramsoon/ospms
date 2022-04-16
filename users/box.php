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
  $StdId=$_SESSION['id'];
  $reg = $_SESSION['login'];
  $word = $_POST['message'];



$sql=mysqli_query($con,"INSERT INTO tblfeedback (id, Sender, regDate, reciever, msg, Ntime)VALUES (NULL, '$reg', CURRENT_DATE, 'bsani.cs@buk.ng', '$word', CURRENT_TIME)");


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

    <title>OSPMS | Inbox</title>

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
<style type="text/css">


  #type,input{
    font-size: 20px;

  }
  #type{
    padding-left: 10px;
  }

  button{
    border-radius: 10px;
    font-size: 20px;
  }
</style>

  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

            <section id="main-content">
          <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Profile info</h3>
            
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

                          <div class="form-group">

                           <div class="col-sm-6">
                            <input type="text" class="form-control" name="">
                          </div>
                            <div class="col-sm-6">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

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
    

  </body>
</html>

