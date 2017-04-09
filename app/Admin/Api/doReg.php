<?php
require '../../../config/config.php';
require SITE_DIR . 'core/db/Pdo.php';

$db = new Core\Db\Pdo(DB_USER,DB_PASS);
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($username && $password) {
    $res = $db->conn->query("insert into account(username,password) values('{$username}','{$password}')");
} else {
    die('username cant null');
}


if ($res) {
    $response = [
        'status' => 'success',
        'data' => [
            'username' => $username
        ]
    ];
}

$response = [
    'status' => 'failed'
];

return json_encode($response);
