<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['error'] = "Please login to purchase courses";
    header('Location: ../Frontend/Login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newCourse = [
        'title' => $_POST['course_title'],
        'description' => $_POST['course_description'],
        'image' => $_POST['course_image'],
        'progress' => '0/40',
        'timeLeft' => 'Just started'
    ];

    // Initialize courses array if it doesn't exist
    if (!isset($_SESSION['user']['courses'])) {
        $_SESSION['user']['courses'] = [];
    }

    // Add the course to user's courses
    $_SESSION['user']['courses'][] = $newCourse;

    // Redirect to MyLearning page
    header('Location: ../Frontend/Mylearning.php');
    exit();
}