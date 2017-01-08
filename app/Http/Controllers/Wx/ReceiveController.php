<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceiveController extends Controller
{
    public function subscribe()
    {
    	$message = file_get_contents("php://input");
    	$message = simplexml_load_string($message, 'SimpleXMLElement', LIBXML_NOCDATA);
    	echo '<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[fromUser]]></FromUserName>
<CreateTime>12345678</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[你好]]></Content>
</xml>';
    }

    public function cancel()
    {
    	echo 'cancel';
    }
}
