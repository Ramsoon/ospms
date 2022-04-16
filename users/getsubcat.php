<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $id=intval($_POST['catid']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid id");
 	exit;
 }
 else{
 $stmt = mysqli_query($con,"SELECT area FROM subfield WHERE categoryId ='$id'");
 ?><option selected="selected">Select Subcategory </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['area']); ?>"><?php echo htmlentities($row['area']); ?></option>
  <?php
 }
}

}
?>