<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
if (isset($_POST['submit'])) {
  # code...
  $id=$_GET['uid'];
  $Approv = $_POST['approval'];
  $sql=mysqli_query($con,"update tblsuggest set publish='$Approv' where id='$id'");
if ($sql) {
  # code...
echo "<script>alert('Project details Publlished successfully');</script>";
}else{
  echo "<script>alert('Internal Error');</script>";

}}
  
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
<title>students Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="5" cellspacing="4" cellpadding="0" style="border-radius: 10px; border-color: blue;">
<?php 
if(empty($_GET['uid'])){
echo "Unauthorized access deniad";
}else{
//tblsupervisor

$ret1=mysqli_query($con,"select * FROM tblsuggest where id='".$_GET['uid']."'");  


while($row=mysqli_fetch_array($ret1))
{
?>

    
   
    
    <tr>
      <td align="center" colspan="2"><b><?php echo $row['topic'];?></b></td>    
    </tr>
    
  </table>
     <form class="" name="forgot" method="post">
     

       <p style="text-align: center; padding-top: 20px; padding-bottom: 20px; font-size: 40px;"><b>Action:</b> 

        <select name="approval" style="border-radius: 10px; height: 35px; height: 35px; width: 200px;">
          <option></option>
          <option value="Approved">Approved</option>

        </select>


       
      </p>
   <p style="text-align: center; padding-top: 20px; padding-bottom: 20px">
      <input name="submit" type="submit" class="txtbox4" value="Save"  style="color: black; height: 40px;  border-radius: 10px; background-color: cyan; width: 100px;"  />
    <input name="Submit2" type="submit" class="txtbox4" value="Close" onclick="f2();" style="color: black; height: 40px; border-radius: 10px; background-color: cyan; width: 100px;"   /></td>
    </tr>
   </p>
    <?php } 

 
    ?>
 
</table>
 </form>
</div>

</body>
</html>

     <?php }} ?>