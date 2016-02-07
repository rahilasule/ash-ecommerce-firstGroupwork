<?php
	$targetDir="uploads"; //specify directory where uploads will be saved
	$targetFile=$targetDir . basename($_FILES["fileToUpload"]["name"]); //specifies the path of the file to be uploaded
	$uploadOk=1;
	$imageFileType=pathinfo($targetFile,PATHINFO_EXTENSION);

	//check if image is actual image or fake image
	if(isset($_POST["submit"])){
		$check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false){
			//echo "FIle is an image - ".$check["mime"]. ".";
			$uploadOk=1;
		} else{
			echo "File is not an image.";
			$uploadOk=0;
		}
	}

	//check if file being uploaded already exists
	if(file_exists($targetFile)){
		echo "Sorry, this file already exists.";
		$uploadOk=0;
	}

	//check that correct file formats are used
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
		echo "Sorry, only JPG, PNG, JPEG and GIF files are allowed.";
		$uploadOk=0;
	} 

	//check that $uploadOk has not been wrongly set
	if($uploadOk==0){
		echo "Oops! Your file was not uploaded.";
	} else{
			echo "File ". basename($_FILES["fileToUpload"]["name"])." has been uploaded.";
			header("location:addwine.php");
	} 
?>