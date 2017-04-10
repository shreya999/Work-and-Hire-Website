<style>
td,th {
    text-align: left;
    width:40%;
}
</style>
<html>
<?php
$proj_id=$_GET["proj_id"];
$con=mysqli_connect("localhost","pal","pal123","worknhire");
$display = mysqli_query($con,"SELECT * FROM main where project_id='$proj_id'")or
die(mysqli_connect_errno());
$row = mysqli_fetch_array($display);

$display2 = mysqli_query($con,"SELECT * FROM signup where uname='".$row['hire_name']."'")or
die(mysqli_connect_errno());
$row2 = mysqli_fetch_array($display2);

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
	 <?php switch($row['project_cat']) 
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
</table><br><br>
</html>


<?php 
?>

<?php

/*** Check the $_GET variable ***/
   try    {
          $dbh = new PDO("mysql:host=localhost;dbname=worknhire", 'pal', 'pal123');
		   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		   $sql = "SELECT * FROM solution WHERE project_id='$proj_id'";

          /*** prepare the sql ***/
          $stmt = $dbh->prepare($sql);

          /*** exceute the query ***/
          $stmt->execute(); 

          /*** set the fetch mode to associative array ***/
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
		  
		  echo '<table text-align="center"> 
					<tr><th>Preview</th><th>Name</th></tr>
					<tr>';
          /*** set the header for the image ***/
          foreach($stmt->fetchAll() as $array)
              {
            echo '  <td><a href="details2.php?image_id='.$array['image_id'].'">
					<img src="showth.php?image_id='.$array['image_id'].'" alt="'.$array['image_name'].' /">
					</a></td>
					<td>'.$array['solution_name'].'</td>
					</tr>';
              }
			echo '</table>';
        }
     catch(PDOException $e)
        {
        echo $e->getMessage();
        }
     catch(Exception $e)
        {
        echo $e->getMessage();
        }
?>
</html>