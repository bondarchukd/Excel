<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data">
<input type="file"  name="filepath" id="filepath"/></td><td><input type="submit" name="SubmitButton"/>
</body>
</html>

<?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted

$target_dir = 'uploads/';
$target_file = $target_dir . basename($_FILES["filepath"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

require_once dirname(__FILE__) . '/Classes/PHPExcel/IOFactory.php';

$inputFileType = PHPExcel_IOFactory::identify($target_file);

$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($target_file);

$i=2;
$val=array();
$count=0;
for($i=2;$i<34;$i++)
{
$val[$count++]=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue();
}
//echo'<pre>';print_r($val);
}    
?>
<!-- http://www.techchattr.com/how-to-read-excel-files-with-php -->

<!-- Echoing array in table 
echo "<table>";
foreach ($res as $result){
        echo "<tr>";
        foreach ($result as $rValue){
                echo "<td>{$rValue}</td>";
        }
        echo "</tr>";
}
echo "</table>";
 -->