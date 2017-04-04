<?php
function curl ($c_url, $c_url_data) {
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL,$c_url); 
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $c_url_data); 
	$result = curl_exec($ch);
	$face_json = json_decode($result);
	curl_close ($ch); 
	unset($ch); 
    return $result;
}

