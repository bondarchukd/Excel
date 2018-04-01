<?php

if(isset($_POST["submit"])) {

}else{
    die("No file parse"); //needed fo stoping execude
}

$target_dir = "uploads/"; //specifies the directory where the file is going to be placed
$uploadOk = 1;
$unic = md5(uniqid(rand(), true));
$target_file = $target_dir . $unic . basename($_FILES["fileToUpload"]["name"]);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // holds the file extension of the file (in lower case)

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "xlsx" && $fileType != "xls") {
    $uploadOk = 0;
    die("Sorry, only xlsx and xls files are allowed.");
}else{
    echo "All OK";
}

// check moving uploaded file to direction
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //если файл загрузился в нужную папку,то код идет дальше
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
