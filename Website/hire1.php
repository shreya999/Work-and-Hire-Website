<?php
session_start();
$hire=$_SESSION['uname'];
$con=mysqli_connect("localhost","pal","pal123","worknhire");

//check if the starting row variable was passed in the URL or not
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
  //we give the value of the starting row to 0 because nothing was found in URL
  $startrow = 0;
//otherwise we take the value from the URL
} else {
  $startrow = (int)$_GET['startrow'];
}

//this part goes after the checking of the $_GET var
$display = mysqli_query($con,"SELECT * FROM main WHERE hire_name='$hire' ORDER BY project_cat,project_name LIMIT $startrow, 10")or
die(mysqli_connect_errno());
?>
<style>
td,th {
    text-align: left;
    width:30%;
}
</style>

<html>
    <table cellspacing="10"> 
     <tr><th>Project Name</th><th>Project ID</th><th>Project Category</th><th>Submit</th></tr>
     <?php while($row = mysqli_fetch_array($display)) { ?>
     <tr><td><?php echo $row['project_name'] ?></td>
     <td><?php echo $row['project_id']     ?></td>
     <td>
	 <?php 
	 if($row['project_cat']==1)
	  echo "Android Development";
	 if($row['project_cat']==2)
	  echo "Logo Development";
	 if($row['project_cat']==3)
	  echo "Web Development";
	 ?>
	 </td>
	 <td><?php echo $row['submit']     ?></td>
     <td><a href="details1.php?proj_id=<?php echo $row['project_id'] ?>">View</a></td>
     <?php } ?>
</tr>
</table>
</html>

<?php
$prev = $startrow - 10;
$count= mysqli_num_rows($display);
//only print a "Previous" link if a "Next" was clicked
if ($prev >= 0)
    echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'"> <-Previous </a>';

//now this is the link..
if ($startrow < $count)
echo '<a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+10).'"> Next-> </a>';
?>