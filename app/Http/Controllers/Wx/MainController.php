<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function validate()
    {
    	$data = request()->all();

    	$signature = $data["signature"];
        $timestamp = $data["timestamp"];
        $nonce = $data["nonce"];	
        		
		$token = 'helloxq';
		$tmpArr = [$token, $timestamp, $nonce];
		sort($tmpArr);
		$tmpStr = sha1( implode( $tmpArr ) );

		info(json_encode($data));
		$tmpArr1 = [
			'path' => request()->path(),
			'fullpath' => request()->fullpath(),
			'method' => request()->method(),
			'data' => $tmpArr,
		];
		info( json_encode($tmpArr1));

		if( $tmpStr == $signature ){
			return 'true';
		}else{
			return 'false';
		}

    }
}
