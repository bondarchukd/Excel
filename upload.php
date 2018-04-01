<?php

if(isset($_POST["submit"])) {
    // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    // $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    // if($check !== false) {
    //     echo "File is an image - " . $check["mime"] . ".";
    //     $uploadOk = 1;
    // } else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    // }
}else{
    die("No Image parse");
}


$target_dir = "uploads/"; //specifies the directory where the file is going to be placed
$uploadOk = 1;
$unic = md5(uniqid(rand(), true));
$target_file = $target_dir . $unic . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // holds the file extension of the file (in lower case)
// Check if image file is a actual image or fake image

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "xlsx" && $imageFileType != "xls") {
    $uploadOk = 0;
    die("Sorry, only xlsx and xls files are allowed.");
}else{
    echo "All OK";
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //если файл загрузился в нужную папку,то
    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

    $result = array();
    // получаем тип файла (xls, xlsx), чтобы правильно его обработать
    $file_type = PHPExcel_IOFactory::identify($target_file);
    // создаем объект для чтения
    $objReader = PHPExcel_IOFactory::createReader( $file_type );
    $objPHPExcel = $objReader->load($target_file); // загружаем данные файла в объект
    $result = $objPHPExcel->getActiveSheet()->toArray(); // выгружаем данные из объекта в массив
    print_r($result[1]);
}


?>
