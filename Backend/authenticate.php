<?php
require_once 'session_handler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // For demonstration, using a mock user
    if ($email === 'mahesh@example.com' && $password === 'password') {
        $_SESSION['user'] = [
            'name' => 'Mahesh Das',
            'email' => $email,
            'role' => 'Student',
            'avatar' => 'default-avatar.jpg',
            'points' => 0,
            'stats' => [
                'streak' => 0,
                'goals' => 0,
                'place' => 0
            ],
            'courses' => []
        ];
        header('Location: ../Frontend/Home.php');
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password. Please try again.";
        header('Location: ../Frontend/Login.php');
        exit();
    }
}
?>