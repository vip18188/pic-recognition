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

//类型
$type = $_POST['type'];

//获取最后一个.的位置
$start = strripos($file['name'],'.');
//获取文件后缀
$suffix = substr($file['name'],$start+1);

 $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($suffix, $allow_type)){
  exit('图片类型错误');
}
//判断是否是通过HTTP POST上传的
if(!is_uploaded_file($file['tmp_name'])){
  exit('错误');
}
$upload_path = '/data/wwwroot/sites/photo/'; //上传文件的存放路径

$filename = rand(1000,9999).$file['name'];

//开始移动文件到相应的文件夹
if(move_uploaded_file($file['tmp_name'],$upload_path.$filename)){

	$end_path = $upload_path.$filename;
  
	switch ($type)
	{
	case 1: //普通文字识别，不包含位置信息
	  echo json_encode($aipOcr->basicGeneral(file_get_contents($end_path)), JSON_PRETTY_PRINT);
	  break;
	case 2: //普通文字识别 包含位置信息
	  echo json_encode($aipOcr->general(file_get_contents($end_path)));
	  break;
	case 3: //身份证
	  echo json_encode($aipOcr->idcard(file_get_contents($end_path), true), JSON_PRETTY_PRINT);
	  break;
	case 4: //银行卡
	  echo json_encode($aipOcr->bankcard(file_get_contents($end_path)));
	  break;
	case 5: //网图OCR
	  echo json_encode($aipOcr->webImage(file_get_contents($end_path)), JSON_PRETTY_PRINT);
	  break;
	case 6: //生僻字
	  echo json_encode($aipOcr->enhancedGeneral(file_get_contents($end_path)), JSON_PRETTY_PRINT);
	  break;
	case 7: //行驶证
	  echo json_encode($aipOcr->vehicleLicense(file_get_contents($end_path)), JSON_PRETTY_PRINT);
	  break;
	case 8: //驾驶证
	  echo json_encode($aipOcr->drivingLicense(file_get_contents($end_path)), JSON_PRETTY_PRINT);
	  break;
	case 9: //车牌
	  echo json_encode($aipOcr->licensePlate(file_get_contents($end_path)), JSON_PRETTY_PRINT);
	  break;
	default:
	  echo "error";
	}

}else{
  echo "上传失败!";
}