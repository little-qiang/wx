<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Curl;
use App\Models\Wx\Base;

class MaterialController extends Controller
{
    //
    public function add(){
		$url = sprintf('https://api.weixin.qq.com/cgi-bin/media/upload?access_token=%s&type=image', session('wx_tokeninfo.access_token'));
echo $url;

		$res = Curl::to($url)
			->withOption('POST', true)
			->containsFile()
	        ->withData( [ "media" => curl_file_create('/Users/zq/Pictures/test.png')] )
	        ->asJsonResponse(1)
	        ->post();

	    dd($res);

    }		

    public function list()
    {
    	$url = sprintf('https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=%s&type=image', session('wx_tokeninfo.access_token'));

    	$res = Curl::to($url)
    			->asJson(1)
    			->withData(["type"=>'image', "offset"=>0, "count"=>20])
    			->post();

    	dd($res);
    }
}
