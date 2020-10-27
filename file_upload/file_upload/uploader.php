<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOADER</title>
</head>
<body>
    <form action="uploader.php" method="post" enctype="multipart/form-data">
        <h3>Select image to upload:</h3>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <br/>
    <br/>
    <hr/>

<?php

$target_dir = "upload/";
$target_file = $target_dir . (basename($_FILES["fileToUpload"]["name"]));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$whitelist_type = array('image/jpeg', 'image/png');

if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == true){
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
}

if(isset($_GET['img'])){
    $image = $_GET['img'];
    $imageExt = strtolower(pathinfo($image,PATHINFO_EXTENSION));
    if($imageExt != "jpg" && $imageExt != "png"  && $imageExt != "jpeg"){
        echo "sorry, Only JPG, JPEG, PNG files are allowed.";
    }else{
        echo '<img src= "'.$image.'">';
    }
}

#if (file_exists($target_file)){
#    echo "Sorry, file already exists.";
#    $uploadOk = 0;
#}

if ($_FILES["fileToUpload"]["size"] > 6000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if (!in_array($_FILES['fileToUpload']['type'], $whitelist_type)){
    #echo "<h1>HERE</h1>";
    echo $_FILES['fileToUpload']['type'];
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    
} else {
    // Upload file
    $moved = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    if( $moved ) {
        echo "<br>Successfully uploaded </br>";
         header('Location: http://localhost/file_upload/uploader.php?img='.$target_file);
    }else {
        echo "<br/>Sorry, there was an error uploading your file.";
    }
}
?>
        <hr/>
    </body>
</html>
