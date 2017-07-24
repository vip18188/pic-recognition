<?php

// 引入文字识别OCR SDK
require_once '../AipOcr.php';

// 定义常量
const APP_ID = '9923767';
const API_KEY = 'M0NyZq47eoaoF1rALB8ntR74';
const SECRET_KEY = 'sW0jdqsmp4u69EG4AyXXndWLVBkCqiNg';


// 初始化
$aipOcr = new AipOcr(APP_ID, API_KEY, SECRET_KEY);

// 身份证识别
// echo json_encode($aipOcr->idcard(file_get_contents('idcard.jpg'), true), JSON_PRETTY_PRINT);

// 银行卡识别 
// echo json_encode($aipOcr->bankcard(file_get_contents('bankcard.jpg')));

// 通用文字识别(含文字位置信息)
// echo json_encode($aipOcr->general(file_get_contents('general.png')));


// 通用文字识别(不含文字位置信息)
// echo json_encode($aipOcr->basicGeneral(file_get_contents('general.png')), JSON_PRETTY_PRINT);

// 网图OCR识别
// echo json_encode($aipOcr->webImage(file_get_contents('general.png')), JSON_PRETTY_PRINT);

// 生僻字OCR识别
// echo json_encode($aipOcr->enhancedGeneral(file_get_contents('general.png')), JSON_PRETTY_PRINT);

// 行驶证识别
// echo json_encode($aipOcr->vehicleLicense(file_get_contents('vehicleLicense.jpg')), JSON_PRETTY_PRINT);

// 驾驶证
// echo json_encode($aipOcr->drivingLicense(file_get_contents('drivingLicense.jpg')), JSON_PRETTY_PRINT);

// 车牌
// echo json_encode($aipOcr->licensePlate(file_get_contents('licensePlate.jpg')), JSON_PRETTY_PRINT);

$file = $_FILES['file'];

//获取最后一个.的位置
$start = strripos($file['name'],'.');
//获取文件后缀
$suffix = substr($file['name'],$start);

 $path = '/data/wwwroot/sites/photo/';

 $paths = $path.$file['name'];//设置移动路径

 move_uploaded_file($file['tmp_name'],$paths);