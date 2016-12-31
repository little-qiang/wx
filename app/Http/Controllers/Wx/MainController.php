<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Curl;

class MainController extends Controller
{
    public function checkSignature()
    {
    	$data = request()->all();

    	$signature = $data["signature"];
        $timestamp = $data["timestamp"];
        $nonce = $data["nonce"];	
        		
		$token = config('wx.token');
		$tmpArr = [$token, $timestamp, $nonce];
		sort($tmpArr);
		$tmpStr = sha1( implode( $tmpArr ) );

		if( $tmpStr == $signature ){
			return $data['echostr'];
		} else {
			info(sprintf('valid failed, tmpstr:%s, signature:%s', $tmpStr, $signature));
		}
    }

    public function getAccesstoken()
    {
    	$url = config('wx.url.accesstoken');
    	$params = [
    		"grant_type" => "client_credential",
    		"appid" => config('wx.appid'),
    		"secret" => config('wx.appsecret'),
    	];
    	return Curl::to($url)->withData($params)->asJson(true)->get();
    }

    public function getCallbackIp()
    {
    	$accesstoken = 'mtjpdKmuxwse8hnghp3upi9_3DJ-n0I7OM57a76Sg_lm8GTJkk2FJQcVKPea3fnoP_T7VXAEi9ggRrLFrbXAaqIKOezJqkIGfp1SQepeiARIrDBOEAdiNGjObnPAydhoJOMeAIAXCA';
    	$params = [ 'access_token' => $accesstoken ];
    	$url = config('wx.url.callbackip');
    	return Curl::to($url)->withData(['access_token'=>$accesstoken])->asJson(true)->get();
    }

    public function test()
    {
		var_dump($this->getCallbackIp());    	
    }
}
