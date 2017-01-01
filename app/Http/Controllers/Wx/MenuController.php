<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Curl;

class MenuController extends Controller
{
	public function create()
	{
		$accesstoken = 'clgf2cqKmmLKvrK5lYwYFJW-cZiD7Zyils4Edt7hotZ8rqV7rNb6JIdCXok1lowz6WuyJ0EWRDt9j9739tWXLBv236O1MyVvv6tq9BNGNY38J5zeNtvMz0Ul5xyDw3t_FTNcAGAIWQ';
		$url = sprintf("https://api.weixin.qq.com/cgi-bin/menu/create?access_token=%s", $accesstoken);
    	$params = [
    		"button" => [
    			[
    				"type" => "click",
		          	"name" => "今日歌曲",
		          	"key" => "V1001_TODAY_MUSIC"
    			],
    			[
    				"name" => "菜单",
		           	"sub_button" => [
		           		[
           					"type" => "view",
		               		"name" => "搜索",
		               		"url" => "http://www.soso.com/"
		           		],
		           		[
		           			"type" => "view",
		               		"name" => "视频",
		               		"url" => "http://v.qq.com/"
		           		],
		           		[
		           			"type" => "click",
		               		"name" => "赞一下我们",
		               		"key" => "V1001_GOOD"
		           		]
	           		]
    			]
    		]
    	];

    	$param1 = '{
     "button":[
     {	
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {	
               "type":"view",
               "name":"搜索11",
               "url":"http://www.soso.com/"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }';
		$bool = Curl::to($url)
				->withHeader( 'Content-Type: application/json' )
				->withData($param1)
				// ->withData(json_encode($params, JSON_UNESCAPED_UNICODE))
				->post();
		dd($bool);
	}
}
