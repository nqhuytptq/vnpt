<?php
require_once 'src/Config/Database.php';

$db = new Database();
$pdo = $db->connect();

if ($pdo) {
    echo "✅ Kết nối database thành công!";
}
