<style>
td,th {
    text-align: left;
    width:30%;
}
</style>
<html>
<?php
/*** Check the $_GET variable ***/
$image_id=$_GET["image_id"];
  try   {
            $display = mysqli_query(mysqli_connect("localhost","pal","pal123","worknhire"),"SELECT * FROM solution where image_id=$image_id")or 
			die(mysqli_connect_errno());
			$row = mysqli_fetch_array($display);
			echo '<table text-align="left"> 
					<tr><th>Name:</th><td>'.$row['solution_name'].'</td></tr>
					<tr><th>Email-ID:</th><td>'.$row['email_id'].'</td></tr>
					<tr><th>Description:</th></tr>
					<tr><td>'.$row['solution_desc'].'</td></tr>
					<img src="showfile.php?image_id='.$image_id.'" alt="'.$row['image_name'].' /">
					</table>';
	    }
    catch(Exception $e)
        {
        echo $e->getMessage();
        }
?>
</html>
