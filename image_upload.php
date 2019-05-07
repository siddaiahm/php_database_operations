<html>
<head>
<title>File Upload</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
<h2>Upload Image</h2>
<br>
Name: <input type="text" name="name" /><br>
<label for="fileselect">Filename:</label>
<input type="file" name="photo" id="fileselect">
<input type="submit" name="submit" value="Upload">
<p><strong>Note:</strong>Only .jpg, .jpeg, .png formats allowed to a max size of 2MB.</p>
</form>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if( isset($_FILES["photo"])&& $_FILES["photo"]["error"]==0)
	{
		$allowed_ext = array("jpg" => "image/jpg","jpeg" => "image/jpeg","gif" => "image/gif","png" => "image/png");
		$file_name = $_FILES["photo"]["name"];
		$file_type = $_FILES["photo"]["type"];
		$file_size = $_FILES["photo"]["size"];
		//Verify file extension
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
		if(!array_key_exists($ext, $allowed_ext))
			die("Error: Please select a valid format.");
		//Verify the file size 
		$maxsize = 2* 1024 * 1024;

		if($file_size > $maxsize)
		die("Error: File size is larger.");
		//Verify MIME type of the file
		
		if(in_array($file_type, $allowed_ext))
		{
			$name=$_POST['name'];
			$fp= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
			 $link =  mysqli_connect("localhost","root","root","vote_DB");
			$sql="insert into images(name,image)values('{$name}','{$fp}');";
			echo "<img src="$_FILES["photo"]["name"].$_FILES["photo"]["type"]" width='100px' height='100px'/>";
			if(mysqli_query($link,$sql){
				echo "sucessfully installed";
			}
			else{
	
			}
		}
		else{
			echo "Error: please try again.";
			}
		}
	else{
		echo "Error:".$_FILES["photo"]["error"];
		}
	

	}
?>
