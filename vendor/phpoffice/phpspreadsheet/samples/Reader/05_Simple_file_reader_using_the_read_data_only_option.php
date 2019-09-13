<?php
require $_SERVER['DOCUMENT_ROOT'] . '/divoff/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Helper\Sample;	

require_once  '../../src/Bootstrap.php';



$inputFileType = 'Xlsx';
$inputFileName = __DIR__ . '/sampleData/demo.Xlsx';

$helper = new Sample();

$helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory with a defined reader type of ' . $inputFileType);
$reader = IOFactory::createReader($inputFileType);
$helper->log('Turning Formatting off for Load');
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($inputFileName);

$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
var_dump($sheetData);
