<?php
session_start();
require_once '../Backend/session_handler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PW Skills - Learning Platform</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Anton&family=Creepster&family=Dancing+Script:wght@400..700&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Wet+Paint&display=swap');
</style>
</head>
<body class="bg-gray-900 text-white">
    <!-- Navigation Bar -->
    <nav class="bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    
                    <div class="text-xl flex items-center ">
                    <div class="text-green-500 mr-2">
                        <i class="fas fa-cube text-2xl"></i>
                    </div>
                        <!-- <img class="h-8 w-auto" src="logo.png" alt="Skills Logo"> -->
                        <h1 class="font-['Pacifico'] text-2xl tracking-wide">C-Junc<sup>n</sup></h1>

                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <div class="relative">
                            <button id="courses-button" class=" inline-flex items-center px-1 py-5 text-gray-300 hover:text-white focus:outline-none">
                                <span>Courses</span>
                                <i class="fas fa-chevron-down ml-2 text-xs"></i>
                            </button>
                            <div id="courses-dropdown" class="absolute hidden mt-2 w-48 bg-gray-800 rounded-md shadow-lg z-10">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Data Science</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Web Development</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Python</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">C</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">C++</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">Machine Learning</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">AI</a>
                            </div>
                        </div>
                        <button id="ai-learn-button" class="inline-flex items-center px-1 py-2 text-gray-300 hover:text-white focus:outline-none">
                            <span>Learn with AI</span>
                            <i class="fas fa-robot ml-2"></i>
                        </button>
                        <a href="Mylearning.php" class="inline-flex items-center px-1 py-2 text-gray-300 hover:text-white">
                            My Learning
                        </a>
                    </div>
                </div>
                <!-- Search and Login -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="relative">
                            <input type="text" 
                                   class="w-64 pl-10 pr-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-blue-500" 
                                   placeholder="Search Course">
                            <div class="absolute left-3 top-2">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    <div class="ml-4 flex items-center">
                        <?php if(isset($_SESSION['user'])): ?>
                            <span class="text-white mr-4"><?= $_SESSION['user']['name'] ?></span>
                            <a href="../Backend/logout.php" class="inline-flex items-center px-4 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-colors">
                                Logout
                            </a>
                        <?php else: ?>
                            <a href="Login.php" class="inline-flex items-center px-4 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-colors">
                                Login / Register
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        // Wait for DOM content to be loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Courses dropdown toggle
            document.getElementById('courses-button').addEventListener('click', function() {
                var dropdown = document.getElementById('courses-dropdown');
                dropdown.classList.toggle('hidden');
            });

            // // AI Learn button click event
            // document.getElementById('ai-learn-button').addEventListener('click', function() {
            //     alert('Learn with AI button clicked!');
            // });
        });
    </script>
</body>
</html>