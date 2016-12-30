<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
    	$data = request()->all();

    	$data = [
    		"signature" => '1',
    		"timestamp" => '1',
    		"nonce" => '1',
    		"echostr" => '1',
    		"token" => '1',
    	];

    	$signature = $data["signature"];
        $timestamp = $data["timestamp"];
        $nonce = $data["nonce"];	
        		
		$token = 'helloxq';
		$tmpArr = [$token, $timestamp, $nonce];
		sort($tmpArr);
		$tmpStr = sha1( implode( $tmpArr ) );

		info(json_encode($data));

		if( $tmpStr == $signature ){
			return 'true';
		}else{
			return 'false';
		}

    }
}