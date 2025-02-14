<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Frontend/Login.php');
    exit();
}
?>