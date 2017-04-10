
<?php
$con=mysqli_connect("localhost","pal","pal123","worknhire");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
session_start();
$proj_id=$_SESSION['proj_id'];
/************************************************/
$submit2=$_SESSION['submit1']+1;
$update="UPDATE main SET submit='$submit2' WHERE project_id='$proj_id'";
if (!mysqli_query($con,$update))
  {
  echo "Update Failed!!!<br>";
  die('Error: ' . mysqli_error($con));
  }
/*************************************************/
    /***  get the image info. ***/
    $size = getimagesize($_FILES['image1']['tmp_name']);
    /*** assign our variables ***/
    $type = $size['mime'];
    $imgfp = fopen($_FILES['image1']['tmp_name'], 'rb');
	$image_size = $size[3];
    $name = $_FILES['image1']['name'];
    $maxsize = 99999999;
	
	//thumbnail logic
	$thumb_data = $_FILES['image1']['tmp_name']; //second variable copy
	$src = ImageCreateFromjpeg($thumb_data);
	$aspectRatio=(float)($size[0] / $size[1]);
	$thumb_height = 100;
	$thumb_width = $thumb_height * $aspectRatio;
	
	$destImage = ImageCreateTrueColor($thumb_width, $thumb_height);
	ImageCopyResampled($destImage, $src, 0,0,0,0, $thumb_width, $thumb_height, $size[0], $size[1]);
	ob_start();
	imageJPEG($destImage);
	$image_thumb = ob_get_contents();
	ob_end_clean();



    /***  check the file is less than the maximum file size ***/
    if($_FILES['image1']['size'] < $maxsize )
        {
        /*** connect to db ***/
        $dbh = new PDO("mysql:host=localhost;dbname=worknhire", 'pal', 'pal123');

                /*** set the error mode ***/
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /*** our sql query ***/
        $stmt = $dbh->prepare("INSERT INTO solution (image_type ,image, image_size, image_name, project_id, email_id, solution_desc, solution_name,image_thumb) VALUES (? ,?, ?, ?, ?, ?, ?, ?,?)");

        /*** bind the params ***/
        $stmt->bindParam(1, $type);
        $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
        $stmt->bindParam(3, $image_size);
        $stmt->bindParam(4, $name);
		$stmt->bindParam(5, $proj_id);
		$stmt->bindParam(6,$_POST["email1"]);
		$stmt->bindParam(7,$_POST["sdesc"]);
		$stmt->bindParam(8,$_POST["sname"]);
		$stmt->bindParam(9,$image_thumb, PDO::PARAM_LOB);
        /*** execute the query ***/
        $stmt->execute();
        }
    
	else
    {
    // if the file is not less than the maximum allowed, print an error
    throw new Exception("Unsupported Image Format!");
    }
unset($_SESSION['proj_id']);
die("Please Select The Above Group Types To Continue...");
?>