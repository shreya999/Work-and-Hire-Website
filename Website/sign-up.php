<?php
$con=mysqli_connect("localhost","pal","pal123","worknhire");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



$insert="INSERT INTO signup ( fname, uname, psd, email, company)
VALUES('$_POST[fname]','$_POST[uname]','$_POST[psd]','$_POST[email]','$_POST[cname]')";

if (!mysqli_query($con,$insert))
  {
  echo "Please Go Back To Make The Required Changes<br>";
  die('Error: ' . mysqli_error($con));
  }
echo "<center><h1>You Have Successfully Registered<br></h1><hr><hr>";
echo "</h2><hr><hr><br><br>";
session_start();
$_SESSION['uname'] = $_POST["uname"];

mysqli_close($con);
?>
<meta http-equiv="refresh" content="3; hire.html"><br><br>
<?php
die("Redirecting....");
?>