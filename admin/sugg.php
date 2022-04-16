<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['change']))
{
	$mail=$_POST['mail'];
	$fullName=$_POST['fullName'];
	$phone=$_POST['phone'];
	$auth=0;
$sql=mysqli_query($con,"INSERT INTO tblsupervisor (id, username, fullName, phoneNo, Password, auth) VALUES (NULL, '$mail', '$fullName', '$phone', NULL, '$auth')");

if ($sql) {
	# code...
echo "<script> 'Supervisor profile Created !!' </script>";

	
}else{
	echo "<script> 'oops error encountered !!' </script>";


}

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Manage Supervisors</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Manage Supervisors, Suggested Topic</h3> 
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

<div class="table-responsive">							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th> Name of Contributor</th>
											<th>Topic </th>
											<th>Case Study </th>
											<th>Project Category </th>
											<th>Action</th>
										
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select * from tblsuggest");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['poster']);?></td>
											
											<td><?php echo htmlentities($row['topic']);?></td>
											<td><?php echo htmlentities($row['caseStudy']);?></td>
											<td><?php echo htmlentities($row['radio']);?></td>


								
												<!-- <td>


											</td> -->

<td align="center">
<?php 
$status=$row['publish'];
if($status=='Approved' )
{ ?>
<button type="button" class="btn btn-success" disabled="">Done</button>
<?php }
else{ ?>
	<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/major/ospms/admin/suggApproval.php?uid=<?php echo htmlentities($row['id']);?>');" title="Update user"><i class="icon-edit btn btn-info"></i></a>
<?php }
?>

        </td>




																					
										<?php $cnt=$cnt+1; } ?>
								</tr>
								</tbody>		
								</table>
</div>

							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

		          </form>
		
		      	  	
	  	
<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>