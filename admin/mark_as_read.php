<?php
session_start();
require_once 'db_config.php';

if (!isset($_POST['id'])) {
    header('HTTP/1.1 400 Bad Request');
    exit();
}

try {
    $pdo = new PDO($dsn, $config['user'], $config['pass']);
    $stmt = $pdo->prepare("UPDATE contacts SET is_read = 1 WHERE id = ?");
    $stmt->execute([$_POST['id']]);
    
    // Retourner le nouveau compte de messages non lus
    $unread = $pdo->query("SELECT COUNT(*) FROM contacts WHERE is_read = 0")->fetchColumn();
    echo json_encode(['success' => true, 'unread' => $unread]);
} catch (PDOException $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo json_encode(['success' => false]);
}
?>