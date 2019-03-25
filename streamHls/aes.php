<?php
header('Access-Control-Allow-Origin: *');
@$requestUrl = $_GET['key'];
$requestUrl = str_replace(array('https://www.facebook.com/video?key=', ' '), array('http://immortal.hydrax.net?hash=', '+'), $requestUrl);
echo godEyes($requestUrl);

function godEyes($service_url) {
    $handle = curl_init($service_url);
    curl_setopt_array($handle, array(
        CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
        CURLOPT_ENCODING => '',
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_FOLLOWLOCATION => 1
    ));
    $curl_response = curl_exec($handle);
    curl_close($handle);
    return $curl_response;
}
