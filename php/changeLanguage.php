<?php
session_start();

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    if (in_array($lang, ['pt', 'en'])) {
        $_SESSION['lang'] = $lang;
    }
}

$referer = $_SERVER['HTTP_REFERER'] ?? 'index.php';
header("Location: $referer");
exit();
