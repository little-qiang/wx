<?php
return [
	"appid" => env('WX_APPID'),
	"appsecret" => env('WX_APPSECRET'),
	"token" => env('WX_TOKEN'),
	"url" => [
		"accesstoken" => env('WX_URL_ACCESSTOKEN'),
		"callbackip" => env('WX_URL_CALLBACKIP'),
	],
];