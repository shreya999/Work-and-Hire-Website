
<?php
session_start();
$con=mysqli_connect("localhost","pal","pal123","worknhire");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$proj_id=uniqid();

$insert="INSERT INTO main ( project_id, hire_name, project_name, project_desc, project_cat, job_type, budget)
VALUES('".$proj_id."','".$_SESSION['uname']."','$_POST[pname]','$_POST[pdesc]','$_POST[pcat]','$_POST[jtype]','$_POST[brange]')";

if (!mysqli_query($con,$insert))
  {
  echo "Please Go Back To Make The Required Changes<br>";
  die('Error: ' . mysqli_error($con));
  }

  mysqli_close($con);
?>
<meta http-equiv="refresh" content="2; hire.html"><br><br>
<?php
die("Redirecting Back...");