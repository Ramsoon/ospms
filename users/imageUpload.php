<?php

$target_dir = "ppic/";
$target_file = $target_dir . basename($_FILES["myPhoto"]["name"]);
$uploadOk = 0;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image


    $previousImage = $_POST['previousImage'];


    $check = getimagesize($_FILES["myPhoto"]["tmp_name"]);
    if($check !== false) {
  //      echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
    //    echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["myPhoto"]["size"] > 50000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"|| $imageFileType == "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 1;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>alert('Internal Error, verify the file Type')</script>.";
// if everything is ok, try to upload file
} else {
    $temp = explode(".", $_FILES["myPhoto"]["name"]);
    $stdmyPhoto = $target_dir . round(microtime(true)) . '.' . end($temp);
    $sqlQuery = "";
    $sqlQuery = "UPDATE students SET StudentImage='$stdmyPhoto'  WHERE RegNo='".$_SESSION['login']."'";
    

    if ((move_uploaded_file($_FILES["myPhoto"]["tmp_name"], $stdmyPhoto)) && mysqli_query($con, $sqlQuery)) {
//        echo "The file ". basename( $_FILES["myPhoto"]["name"]). " has been uploaded.";
        
            unlink($previousImage);
             echo "<script>alert('Update Success')</script>";

    } else {
            echo "<script>alert('Update Failed')</script>";
          
        
    }
}
?> 