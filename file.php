<?php
	$currentDir = getcwd();
	$uploadDirectory = "/uploads/";
	$errors = [];
	$fileExtensions = ['jpeg','jpg'];
	$fileName=$_FILES['myfile']['name'];
	$fileSize=$_FILES['myfile']['size'];
	$fileTmpName=$_FILES['myfile']['tmp_name'];
	$imageFileType=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	$uploadPath=$currentDir . $uploadDirectory . basename($fileName);
	if(isset($_POST['submit'])) 
	{
		if(! in_array($imageFileType,$fileExtensions)) 
		{
			$errors[] = "This file extensions is not allowed. Please upload another file";
		}
		if($fileSize > 2000000) 
		{
			$errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
		}
		if(empty($error))
		{
			$didUpload = move_uploaded_file($fileTmpName, $uploadPath);
			
			if($didUpload)
			{
				echo "The file " . basename($fileName) . "has been uploaded";
			}
			else
			{
				echo "An error occured somewhere. Try again or contact the admin";
			}
		}
		else{
			foreach ($errors as $error) {
				echo $error . "These are the errors" . "\n";
			}
		}
	}
?>	
