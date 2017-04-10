<?php
session_start();
$_SESSION['proj_cat'] = 3;
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
$display = mysqli_query($con,"SELECT * FROM main where project_cat='3' LIMIT $startrow, 10")or
die(mysqli_connect_errno());

$display2 = mysqli_query($con,"SELECT * FROM signup where uname='".$_SESSION['uname']."'")or
die(mysqli_connect_errno());
$row2 = mysqli_fetch_array($display2);
?>
<style>
td,th {
    text-align: left;
    width:40%;
}
</style>

<html>
    <table cellspacing="10"> 
     <tr><th>Project Name</th><th>Company</th><th>Budget</th></tr>
     <?php while($row = mysqli_fetch_array($display)) { ?>
     <tr><td><?php echo $row['project_name'] ?></td>
     <td><?php echo $row2['company']     ?></td>
     <td><?php echo $row['budget']     ?></td>
     <td><a href="details.php?proj_id=<?php echo $row['project_id'] ?>">View</a></td>
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