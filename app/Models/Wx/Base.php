<?php

namespace App\Models\Wx;

use Curl;

class Base 
{


    public static function saveAccessToken2Session($refresh = false)
    {
    	if(!$refresh && session()->has('wx_tokeninfo')){
            $wx_token = session('wx_tokeninfo');
            if($wx_token['expires_in'] > time()){
                return $wx_token['access_token'];
            }
        }

        $arrAccessToken = self::getAccessTokenFromOnline();
        $sessData = [
            'wx_tokeninfo' => [
                'access_token' => $arrAccessToken['access_token'],
                'expires_in' => time()+7000,
            ]
        ];
        session($sessData);
        return $arrAccessToken['access_token'];
    }

    private static function getAccessTokenFromOnline()
    {
        $url = config('wx.url.accesstoken');
        $params = [
            "grant_type" => "client_credential",
            "appid" => config('wx.appid'),
            "secret" => config('wx.appsecret'),
        ];
        return Curl::to($url)->withData($params)->asJson(true)->get();
    }

    public static function checkSignature($data)
    {
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
            return sprintf('valid failed, tmpstr:%s, signature:%s', $tmpStr, $signature);
        }
    }

    public static function getCallbackIp()
    {
        $url = sprintf('%s?access_token=%s', config('wx.url.callbackip'), self::saveAccessToken2Session());
        return Curl::to($url)->asJson(true)->get();
    }

    
}