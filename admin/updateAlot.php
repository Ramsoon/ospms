<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else {
  if(isset($_POST['update']))
  {
$id=$_GET['cid'];
//$ProjectNumber=$_GET['cid'];
$status=$_POST['status'];
$super=$_POST['Sname'];
$Topic=$_POST['topic'];




$sql=mysqli_query($con,"UPDATE students SET SupervisorName='$super' WHERE id = '$id';'");

echo "<script>alert('Project details updated successfully');</script>";

  }

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Project Proposal</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Supervisor Alotment</b></td>
     
    </tr>

    <tr height="50">
      <td>
        
        <option value="">Select Category</option> 
      </td>
       <td>
<select>
<?php $query=mysqli_query($con,"SELECT s1 from students where id='$id'");
while($row=mysqli_fetch_array($query))

{?>
 

<option value="<?php echo $row['id'];?>"><?php echo $row['s1'];?></option>
<?php } ?>
</select>
      </td> 
    </tr>

    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" required="required">
      <option value="" disabled="">Select Status</option>
      <option value="2">Approved</option>
    <option value="1">Reject</option>
        
      </select></td>
    </tr>


      <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" value="Submit"></td>
    </tr>



    <tr>
  <td></td>
      <td >   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   

 
</table>
 </form>
</div>

</body>
</html>

     <?php } ?>