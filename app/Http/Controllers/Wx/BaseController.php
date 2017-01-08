<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Curl;
use DB;
use App\Models\Wx\Base as ModelWx;

class BaseController extends Controller
{
    public function checkSignature()
    {
    	return ModelWx::checkSignature();
    }

}
