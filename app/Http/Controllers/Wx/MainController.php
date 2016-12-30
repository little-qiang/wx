<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function checkSignature()
    {
    	$data = request()->all();

    	$signature = $data["signature"];
        $timestamp = $data["timestamp"];
        $nonce = $data["nonce"];	
        		
		$token = 'helloxq';
		$tmpArr = [$token, $timestamp, $nonce];
		sort($tmpArr);
		$tmpStr = sha1( implode( $tmpArr ) );

		if( $tmpStr == $signature ){
			return $data['echostr'];
		} else {
			info(sprintf('valid failed, tmpstr:%s, signature:%s', $tmpStr, $signature));
		}

    }
}
