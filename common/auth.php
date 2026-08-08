<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['login']) || empty($_SESSION['user_id']) || empty($_SESSION['userName'])) {
    header('Location: signin.php');
    exit;
}

if (($_SESSION['user_type'] ?? '') !== 'Admin') {
    header('Location: signin.php');
    exit;
}
