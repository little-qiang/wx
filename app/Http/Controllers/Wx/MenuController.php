<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Curl;

class MenuController extends Controller
{
	public function create()
	{
		$accesstoken = 'fzPLv--CjEIG5drsypbTXEwnAgtIF_LFDlXXNOsSC3rMcxNg5AaYYtXhA1pgbDpYH2ZpDAoU8OiJ3yKiYmhSaS6k_3ffzv_KUAhLASsnIbnIEwkPG_w7pBlwkJNooowxEBOhABAAXK';
		$url = sprintf("https://api.weixin.qq.com/cgi-bin/menu/create?access_token=%s", $accesstoken);
    	$paramsStr = '{
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
					"name":"搜索",
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
		$bool = Curl::to($url)->withData(json_decode($paramsStr, true))->post();
		dd($bool);
	}
}
