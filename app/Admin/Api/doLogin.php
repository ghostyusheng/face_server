<?php
require '../../../config/config.php';
require SITE_DIR . 'core/db/Pdo.php';

$db = new Core\Db\Pdo(DB_USER,DB_PASS);
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($username && $password) {
    $password = md5($password . 'FACE');
    $res = $db->conn->query("select * from account where password = '{$password}' and username = '{$username}'")->fetch();
} else {
    die('username/password cant null');
}


if ($res) {
    $response = [
        'status' => 'success',
        'data' => [
            'username' => $username
        ]
    ];

    goto output;
}

$response = [
    'status' => 'failed'
];

output:
echo json_encode($response);
