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
			if(file_exists("upload/".$_FILES["photo"]["tmp_name"]))
			echo $_FILES["photo"]["name"]."is already exist.";
			else{
			move_uploaded_file($_FILES["photo"]["tmp_name"],"uploads/".$_FILES["photo"]["name"]);
			echo "Your file was uploaded successfully.";	
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
