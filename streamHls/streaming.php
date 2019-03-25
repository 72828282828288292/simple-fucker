<?php
header('Access-Control-Allow-Origin: *');
@$requestUrl = $_GET['url'];
$requestUrl = str_replace('https://www.facebook.com/video/embed', 'http://immortal.hydrax.net', $requestUrl);
$ret = godEyes($requestUrl);
header('Location: ' . $ret);
function godEyes($requestUrl){
    $handle = curl_init($requestUrl);
	curl_setopt_array($handle, array(
		CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
		CURLOPT_POST => 1,
		CURLOPT_ENCODING => '',
		CURLOPT_HTTPHEADER => array('Origin: https://hydrax.net'),
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_SSL_VERIFYPEER => 0
	));
    $curl_response = curl_exec($handle);
    curl_close($handle);
	$file = json_decode($curl_response)->url;
	if($file) {
		return strtok($file, '?');
	}
}
