<?php
require '../../../config/config.php';
require SITE_DIR . 'core/db/Pdo.php';

$db = new Core\Db\Pdo(DB_USER,DB_PASS);
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if ($username && $password) {
    if ($res = $db->conn->query("select * from account where username='{$username}'")->fetch()) {
        echo json_encode([
            'status' => 'failed',
            'msg' => 'username has existed'
        ]);
        die;
    }

    $password = md5($password . 'FACE');
    $res = $db->conn->exec("insert into account(username,password) values('{$username}','{$password}')");
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
}

echo json_encode($response);
