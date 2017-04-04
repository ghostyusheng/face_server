<?php
//require '../../../config/config.php';
require '../../../lib/functions.php';

$c_url_data = [ 
    'api_key' => 'v7j0pw-2tWVhRv6_GA0zQGd-SgzFRe3W',
    'api_secret' => '5UsgXX43G6qd2Zz0L1OY-8e1LSeUgSws',
    'image_url' => 'http://www.thedragonchina.com/Resume/zhangyusheng.jpg'
];

$c_url = 'https://api-cn.faceplusplus.com/facepp/v3/detect'; 

$result = curl($c_url, $c_url_data);

$face_token = json_decode($result)
    ->faces[0]
    ->face_token;

$analyze_url = 'https://api-cn.faceplusplus.com/facepp/v3/face/analyze';

$c_url_data = [
    'api_key' => 'v7j0pw-2tWVhRv6_GA0zQGd-SgzFRe3W',
    'api_secret' => '5UsgXX43G6qd2Zz0L1OY-8e1LSeUgSws',
    'return_attributes' => 'gender,age,smiling,headpose,facequality,blur,eyestatus,ethnicity',
    'face_tokens' => $face_token
];

$result = curl($analyze_url, $c_url_data);

echo $result;
