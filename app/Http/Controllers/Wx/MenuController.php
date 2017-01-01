<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Curl;

class MenuController extends Controller
{

	private $url_menu_prefix = 'https://api.weixin.qq.com/cgi-bin/menu';
	private $accesstoken = 'q0dCWjObOQuniEybTmpxH_i32WWSuUb3M9CQjxJR-gJH1KRCVZB0XTsV80zHa63i6DDvk02CwEf-t1EXWSl1dgu8heljENWs7axt0u_E4T--tU8B6phxYCBB_9dWzFMNEXYdAAAPIJ';


	public function create()
	{
		$url = sprintf('%s/create?access_token=%s', $this->url_menu_prefix, $this->accesstoken);
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
				->post();
		dd($bool);
	}

	public function get()
	{
		$url = sprintf('%s/get?access_token=%s', $this->url_menu_prefix, $this->accesstoken);
		echo Curl::to($url)->get()
	}

	public function delete()
	{
		$url = sprintf('%s/delete?access_token=%s', $this->url_menu_prefix, $this->accesstoken);
		$bool = Curl::to($url)->get();
		dd($bool);	
	}
}

