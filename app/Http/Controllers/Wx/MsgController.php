<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Wx\Msg;

class MsgController extends Controller
{
    public function response()
    {
    	$message = file_get_contents("php://input");
    	$message = simplexml_load_string($message, 'SimpleXMLElement', LIBXML_NOCDATA);
    	return view(sprintf('Wx.Msg.%s', $message->MsgType), ['message'=>$message]);
    }
}
