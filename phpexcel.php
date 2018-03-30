<?php
/* 
 * Считывает данные из любого excel файла и созадет из них массив.
 * $filename (строка) путь к файлу от корня сервера
 */

function parse_excel_file( $filename ){
	// подключаем библиотеку
	require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';

	$result = array();

	// получаем тип файла (xls, xlsx), чтобы правильно его обработать
	$file_type = PHPExcel_IOFactory::identify( $filename );
	// создаем объект для чтения
	$objReader = PHPExcel_IOFactory::createReader( $file_type );
	$objPHPExcel = $objReader->load( $filename ); // загружаем данные файла в объект
	$result = $objPHPExcel->getActiveSheet()->toArray(); // выгружаем данные из объекта в массив

	return $result;
}

?>