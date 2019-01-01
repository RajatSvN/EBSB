<?php


	$file = $_FILES['image']; // getting the main file array

	$fileName = $_FILES["image"]["name"]; // getting name of file

	$fileTmpName = $_FILES["image"]["tmp_name"]; // temporary name of the file

    $desc = $_POST['desc']; // form data : description of image uses multipart at the js side

    $err = $_FILES["image"]["error"]; // error count if any , count is 0 if no error

    $size = $_FILES["image"]["size"]; // size of image in bytes

    $fileExt = explode('.',$fileName); // array of filename and extension
    
    $fileActualExt = strtolower(end($fileExt)); // converting extension to a lower case 

    if($err === 0){
 
       if($size < 5000000){

       	$fileNameNew = uniqid('',true).".".$fileActualExt; // making a file name by salting current time to avoid files with same name

       	$fileDestination = "sampleImages/".$fileNameNew; // setting the destination address

		move_uploaded_file($fileTmpName, $fileDestination); // finally uploading the file to the server

		$link = mysqli_connect("localhost","root","","orrisaimg");

		$query = "INSERT INTO image (descr,pathe) VALUES ('".mysqli_real_escape_string($link,$desc)."','".mysqli_real_escape_string($link,$fileDestination)."')";

		if(mysqli_query($link,$query)){

            echo "1";

		}else{

			echo "-1";

		}



       }else{
             
             echo "Your file is greater than 5 MB.";
       }


    }else{

    	echo "There was an error uploading your file!";

    }


?>