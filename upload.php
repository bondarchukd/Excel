<?php
$target_dir = "uploads/"; //specifies the directory where the file is going to be placed
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // specifies the path of the file to be uploaded
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // holds the file extension of the file (in lower case)
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "xlsx" && $imageFileType != "xls" && $imageFileType != "png") {
    echo "Sorry, only xlsx and xls files are allowed.";
    $uploadOk = 0;
}
?>
