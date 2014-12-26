<?php

$fac = $_REQUEST['fac'];
$code = $_REQUEST['code'];

$target_dir = "/var/www/html/images/". $fac . "/";
$target_file = $target_dir . basename($_FILES["upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(!is_file($target_dir)){
    chmod($target_dir, 0755);
    mkdir($target_dir, 0755);
}

$code = preg_replace('/^0+/', '',  $code);


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["upload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;

    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        exit;
    }
}

// Check file size
if ($_FILES["upload"]["size"] > 9000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    exit;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

$temp = explode(".",$_FILES["upload"]["name"]);
$newfilename = $code

    if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_dir . $newfilename . 'jpg')) {
        echo "The file " . basename($_FILES["upload"]["tmp_name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>