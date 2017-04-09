<?php
require '../../../config/config.php';
require SITE_DIR . 'core/db/Pdo.php';

$db = new Core\Db\Pdo(DB_USER,DB_PASS);
$res = $db->query("");
print_r('123123132');
