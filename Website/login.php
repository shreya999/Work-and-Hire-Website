<?php
session_start();
session_unset();

$_SESSION['uname'] = $_POST["uname"];
$con=mysqli_connect("localhost","pal","pal123","worknhire");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$a=$_POST["uname"];
$b=$_POST["psd"];
$qz=mysqli_query($con,"SELECT * FROM signup where uname='".$a."' and psd='".$b."'" );
$row=mysqli_fetch_array($qz);


if(mysqli_num_rows($qz))
{
?>
<meta http-equiv="refresh" content="3; hire.html"><br><br>
<?php
die("Generating Your Environment...");
mysqli_close($con);
}
else
{
?>
<meta http-equiv="refresh" content="3; login.html"><br><br>
<?php
echo "Wrong Password or UserName!<br>";
die("Redirecting Back...");
mysqli_close($con);
}
?>