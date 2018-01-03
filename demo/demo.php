<?php
/*
千币鱼创建订单demo

也可以看文档自己写
apiid 和 apikey 请到https://api.qianbiyu.com  申请

不允许任何违规网站接入

手续费调整请联系客服

*/
header("Content-Type: text/html;charset=utf-8"); 
require dirname(__FILE__).'/qianbiyu_class.php';//调用千币鱼PHPsdk


$qianbiyu = new qianbiyu('1111111111','2222222222222222222222222222');;//这边填写平台后台生成的  apiid   ，   apikey
$qianbiyuInfo = $qianbiyu->pay('1.55','https://xxx.com/pay/callback.php','https://xxx.com/pay/asyn_callback.php',$return_param);//这边填写  金额，同步回调地址，异步回调地址，$return_param写需要原样回调的内容 最大长度为10位 可填写用户UID之类的
$orderno = $qianbiyuInfo['orderno'];  //返回生成的订单号
echo $qianbiyuInfo['to'];////返回生成的订单号  返回请求支付的post参数 直接echo  浏览器就会自动请求了。