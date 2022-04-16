<?php 
require_once("includes/config.php");
if(!empty($_POST["regno"])) {
	$regno= $_POST["regno"];
	
		$result =mysqli_query($con,"SELECT * FROM students WHERE RegNo='$regno'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> RegNo already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> RegNo available in DB for Authentication .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
