<?php
/*
这是千币鱼  异步回调接收的PHP

这边接收千币鱼回调过来的支付数据

 */
header("Content-Type: text/html;charset=utf-8"); 
require dirname(__FILE__).'/qianbiyu_class.php';//调用千币鱼PHPsdk


if(isset($_POST['return_data'])){

	$return_info = json_decode(base64_decode($_POST['return_data']),true);//接收回调信息   必须先进行base64解码   $return 为数组
	$qianbiyu = new qianbiyu('1111111111','2222222222222222222222222222');;//这边填写平台后台生成的  apiid   ，   apikey
	if($qianbiyuInfo = $qianbiyu->checkSign($return_info['order_num'],$return_info['signkey'])){
		$order_num = $return_info['order_num'];//这是回调的订单号
		$return_param = $return_info['return_param'];//这是原样返回的你内容
		$amount = $return_info['amount'];//这是金额
		echo 'success';   //回调成功必须输出success  并且 不允许输出任何其他的字符！！！！
	}

}