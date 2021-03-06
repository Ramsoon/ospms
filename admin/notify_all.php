
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
		header('location:index.php');
}else{
if(isset($_POST['submit']))
{
	$sender = $_SESSION['alogin'];
	$category=$_POST['category'];
	$Message=$_POST['Message'];



// INSERT INTO `notify` (`id`, `category`, `Message`, `PostDate`) VALUES ('', '', '', CURRENT_TIMESTAMP)


$sql=mysqli_query($con,"INSERT INTO notify (id, category, Message, PostDate) VALUES (NULL,'$category','$Message', CURRENT_TIMESTAMP)");
$_SESSION['msg']="Notification Created !!";

}


if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from notify where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Post deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Category</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">

										<div class="module">
							<div class="module-head">
								<h3>Notification Panel </h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="category" method="post" >

									
<div class="control-group">
<label class="control-label" for="basicinput">Receiver</label>
<div class="controls">
<select class="span8 tip" name="category" >
	<option >please select </option>
	<option disabled=""> </option>
	<option value="allSupervisors">SUPERVISORS</option>
	<option value="allStudents">STUDENTS</option>

</select>
</div>
</div>

									
<div class="control-group">
<label class="control-label" for="basicinput">Message</label>
<div class="controls">
<textarea name="Message" cols="9" rows="5" class="span8 tip" ></textarea></div>
</div>



	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn btn-primary">Post</button>
											</div>
										</div>
									</form>
							</div>
						</div>



					<div class="content">

						
							<div class="module-body">

							</div>
						</div>


	<div class="module">
							<div class="module-head">
								<h3>Notification</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Category</th>
											<th>Message</th>
											<th>Post date</th>
												<th>Action</th>
	
										</tr>
									</thead>
									<tbody>

		<?php $query=mysqli_query($con,"SELECT * FROM notify");
				$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['category']);?></td>
											<td><?php echo htmlentities($row['Message']);?></td>
											<td> <?php echo htmlentities($row['PostDate']);?></td>
											<td>
														<a href="edit-notice.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
											<a href="notify_all.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

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
										