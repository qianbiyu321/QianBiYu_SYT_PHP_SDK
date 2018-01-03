<?php
/*
千币鱼PHPsdk文件  V1.0

正常情况下，请不要修改此文件! 如果被修改的报错了，请在https://api.qianbiyu.com  重新下载！

2017.12.15


本PHP编码UTF8
*/
class qianbiyu{
	const HOST = 'https://api.qianbiyu.com/pay';
	public function __construct($apiid,$apikey) {
		$this->apiid = $apiid;
		$this->apikey = $apikey;
	}
    //创建订单
	public function pay($amount,$return_url,$asyn_return_url,$return_param){
		$data['apiid'] = $this->apiid;
		$data['orderno'] = $this->get_order_num($this->apiid);
		$data['signkey'] = $this->get_signkey($data['orderno'],$this->apikey,$this->apiid);
		$data['amount'] = $amount;
		$data['return_url'] = $return_url;
		$data['asyn_return_url'] = $asyn_return_url;
		$data['return_param'] = $return_param;
        $r['orderno'] = $data['orderno'];
		$r['to'] = $this->post_form(self::HOST,$data);
        return $r;
	}
    public function checkSign($ordernum,$return_ordernum){
        $data['signkey'] = $this->get_signkey($ordernum,$this->apikey,$this->apiid);
        if($data['signkey'] == $return_ordernum){
            return true;
        }else{
            return false;
        }
    }
	//下面都是内部计算的
	private function get_order_num($u_id)
    {
        $orderNo = "pay" . $u_id . time() . $this->GetfourStr(8);
        return $orderNo;
    }
	private function GetfourStr($len)
    {
        $chars_array = array(
            "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
            "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
            "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
            "S", "T", "U", "V", "W", "X", "Y", "Z",
        );
        $charsLen = count($chars_array) - 1;

        $outputstr = "";
        for ($i=0; $i<$len; $i++)
        {
            $outputstr .= $chars_array[mt_rand(0, $charsLen)];
        }
        return $outputstr;
    }
    private function get_signkey($ordernum, $apikey, $uid)
    {
        $signkey = md5($ordernum.$apikey.$uid);
        return $signkey;
    }
    private function post_form($url,$postdata)
    {
        $formstr = "<form name='postform' id='postform' action='".$url."' method='post'>";
        foreach ($postdata as $k => $v)
        {
            $formstr .= "<input type='hidden' name='".$k."' value='".$v."'>";
        }
        $formstr .= "</form><script>document.forms['postform'].submit();</script>";
        return $formstr;
    }
}