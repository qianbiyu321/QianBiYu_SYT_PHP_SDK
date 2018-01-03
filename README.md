## QianBiYu_SYT_PHP_SDK

千币鱼API为有支付需求的站长朋友提供快捷方便可靠即时的支付解决方案，您所需要做的就只是引入qianbiyu_class.php
具体接入方案如下：

##### 请到https://api.qianbiyu.com  申请apiid 和 apikey 

> PHP 调用SDK方法：
> 
> require '/qianbiyu_class.php';
> $qianbiyu = new qianbiyu('1111111111','2222222222222222222222222222');
> 
> //这边填写平台后台生成的  apiid   ，   apikey
> 
> 
> $qianbiyuInfo = $qianbiyu->pay('1.55','https://xxx.com/pay/callback.php','https://xxx.com/pay/asyn_callback.php',$return_param);
> 
> //这边填写  金额，同步回调地址，异步回调地址，$return_param写需要原样回调的内容 最大长度为10位 可填写用户UID之类的
> 
> $orderno = $qianbiyuInfo['orderno'];  
> 
> //返回生成的订单号
> 
> echo $qianbiyuInfo['to'];
> 
> //返回生成的订单号  返回请求支付的post参数 直接echo  浏览器就会自动请求了。
> 



平台客服可以帮助接入网站，官网地址https://api.qianbiyu.com，欢迎加群询问~~