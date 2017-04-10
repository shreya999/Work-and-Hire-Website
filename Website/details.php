<?php
session_start();
$_SESSION['proj_id'] = $_GET["proj_id"];
$con=mysqli_connect("localhost","pal","pal123","worknhire");
$cat = $_SESSION['proj_cat'];
$display = mysqli_query($con,"SELECT * FROM main where project_id='".$_SESSION['proj_id']."'")or
die(mysqli_connect_errno());
$row = mysqli_fetch_array($display);

$display2 = mysqli_query($con,"SELECT * FROM signup where uname='".$row['hire_name']."'")or
die(mysqli_connect_errno());
$row2 = mysqli_fetch_array($display2);

$_SESSION['submit1'] = $row['submit'];
?>
<style>
td,th {
	text-align: left;
	width:30%;
}
</style>
<html>
    <table cellspacing="10"> 
	 <tr><th>Category: </th>
	 <td>
	 <?php switch($cat) 
	  { case '1':echo "Android-Programming Project"; break;
		case '2':echo "Logo-Design Project"; break;
		case '3':echo "Web-Design Project"; break;
	  } 
	 ?>
	 </td></tr>
     <tr><th>Project Name</th><th>Sponsored By</th><th>Company</th><th>Budget</th></tr>
     <tr>
	 <td><?php echo $row['project_name']?></td>
     <td><?php echo $row2['fname']?></td>
     <td><?php echo $row2['company']?></td>
     <td><?php echo $row['budget']?></td>
	 </tr>
	 <tr><th>Job Type:</th><td><?php echo $row['job_type']?></td></tr>
	 <tr><th>Description</th></tr>
	 <tr><td width=><?php echo $row['project_desc']?></td></tr>
	 <tr><td><a href="psubmit.html">SUBMIT YOUR PROJECT</a></td></tr>
</table>
</html>


<?php 
?>









