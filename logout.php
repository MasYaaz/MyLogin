<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_destroy();
    header('Location: login.php');
    exit;
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    exit('Invalid request');
}