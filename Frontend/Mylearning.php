<?php
require_once '../Backend/session_handler.php';

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header('Location: Login.php');
    exit();
}

// Use session data
$user = $_SESSION['user'];

// Get user's in-progress courses from session, or empty array if none exist
$inProgressCourses = isset($_SESSION['user']['courses']) ? $_SESSION['user']['courses'] : [];

// Recommended courses remain the same as these are available to all users
$recommendedCourses = [
    [
        'title' => 'Webflow Tutorial: Build Your First Portfolio Website In a Minute',
        'author' => 'Adam Smith',
        'price' => '$12.99',
        'rating' => 4.7,
        'reviews' => 32,
        'image' => 'https://example.com/course1.jpg',
        'duration' => '9:32'
    ],
    [
        'title' => 'Basic To Advance Design System With UX Strategies',
        'author' => 'Scott Warden',
        'price' => '$49.99',
        'rating' => 4.7,
        'reviews' => 540,
        'image' => 'https://example.com/course2.jpg',
        'duration' => '9:32'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C-Junction</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&family=Creepster&family=Dancing+Script:wght@400..700&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Wet+Paint&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-900 text-white font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 shadow-md">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="text-green-500 mr-2">
                        <i class="fas fa-cube text-2xl"></i>
                    </div>
                    <h1 class="text-xl font-bold text-white font-['Pacifico'] tracking-wide">C-Junc<sup>n</sup></h1>
                </div>
            </div>
            
            <div class="px-6 py-4">
                <p class="text-gray-400 text-sm mb-4">MENU</p>
                <ul class="space-y-2">
                    <li class="bg-green-500 rounded-md">
                        <a href="#" class="flex items-center p-3 text-white">
                            <i class="fas fa-th-large mr-3"></i>
                            <span>Overview</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-300 hover:bg-gray-700 rounded-md">
                            <i class="fas fa-book mr-3"></i>
                            <span>Lessons</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-300 hover:bg-gray-700 rounded-md">
                            <i class="fas fa-trophy mr-3"></i>
                            <span>Leaderboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-300 hover:bg-gray-700 rounded-md">
                            <i class="fas fa-chart-line mr-3"></i>
                            <span>Skill Graph</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-300 hover:bg-gray-700 rounded-md">
                            <i class="fas fa-graduation-cap mr-3"></i>
                            <span>Courses</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-300 hover:bg-gray-700 rounded-md">
                            <i class="fas fa-certificate mr-3"></i>
                            <span>Certificates</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-300 hover:bg-gray-700 rounded-md">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>Messages</span>
                            <span class="bg-red-500 text-white text-xs rounded-full px-2 ml-auto">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-gray-300 hover:bg-gray-700 rounded-md">
                            <i class="fas fa-cog mr-3"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <a href="Home.php">
                <h2 class="text-2xl font-bold">Home</h2>
                </a>
                <div class="relative">
                    <input type="text" placeholder="Search here..." class="pl-10 pr-4 py-2 rounded-md border border-gray-700 bg-gray-800 text-gray-300 w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <button id="open-details-button" class="ml-4 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">
                    Show Details
                </button>
            </div>
            
            <!-- Continue Learning Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6">Continue Learning</h2>
                <?php if (empty($_SESSION['user']['courses'])): ?>
                    <div class="bg-gray-800 p-6 rounded-lg shadow text-center">
                        <p class="text-gray-400">You haven't purchased any courses yet.</p>
                        <a href="Courses.php" class="text-green-500 hover:text-green-400">Browse our courses</a>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($_SESSION['user']['courses'] as $course): ?>
                            <div class="bg-gray-800 p-6 rounded-lg shadow">
                                <div class="flex items-start">
                                    <div class="flex-1">
                                        <h3 class="font-bold text-lg mb-3 text-white"><?= htmlspecialchars($course['title']) ?></h3>
                                        <div class="relative w-full h-2 bg-gray-700 rounded-full mb-3">
                                            <div class="absolute left-0 top-0 h-2 bg-green-500 rounded-full" style="width: 0%"></div>
                                        </div>
                                        <div class="flex justify-between text-sm">
                                            <span class="text-gray-400"><i class="fas fa-book mr-1"></i> <?= $course['progress'] ?> Lessons</span>
                                            <span class="text-gray-400"><i class="far fa-clock mr-1"></i> <?= $course['timeLeft'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <button class="mt-4 w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition">
                                    Start Learning <i class="fas fa-arrow-right ml-2"></i>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Add this before the Recommended Courses Section -->
            <div id="course-content-section" class="mb-12 hidden">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold">Course Content</h2>
                    <button id="close-course-content" class="text-green-500 hover:text-green-400">
                        <i class="fas fa-times"></i> Close
                    </button>
                </div>
                
                <div class="bg-gray-800 rounded-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold" id="current-course-title"></h3>
                        <div class="text-gray-400">
                            Progress: <span id="progress-percentage">0</span>%
                        </div>
                    </div>
                    
                    <div class="w-full h-2 bg-gray-700 rounded-full mb-6">
                        <div id="progress-bar" class="h-2 bg-green-500 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div id="course-content-container"></div>
                    </div>
                </div>
            </div>
            
            <!-- Recommended Courses Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6">Recommended Courses For You</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($recommendedCourses as $course): ?>
                    <div class="bg-gray-800 rounded-lg overflow-hidden shadow">
                        <div class="relative">
                            <img src="<?= $course['image'] ?>" alt="<?= $course['title'] ?>" class="w-full h-48 object-cover">
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-70 text-white text-sm px-2 py-1 rounded">
                                <?= $course['duration'] ?>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="bg-white bg-opacity-90 rounded-full p-3">
                                    <i class="fas fa-play text-green-500"></i>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2 text-white"><?= $course['title'] ?></h3>
                            <p class="text-gray-400 mb-3"><?= $course['author'] ?></p>
                            <div class="flex items-center mb-3">
                                <div class="flex text-yellow-400 mr-2">
                                    <?php for ($i = 0; $i < 5; $i++): ?>
                                        <i class="fas fa-star<?= $i >= $course['rating'] ? '-o' : '' ?>"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-gray-400 text-sm"><?= $course['rating'] ?> (<?= $course['reviews'] ?>)</span>
                            </div>
                            <div class="font-bold text-lg text-white"><?= $course['price'] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <!-- Right Sidebar - User Profile -->
        <div id="user-profile-sidebar" class="w-80 bg-gray-800 p-6 shadow-md">
            <div class="flex justify-end mb-4">
                <button id="close-details-button" class="text-green-500 text-sm">
                    <i class="fas fa-times mr-1"></i> Close Details
                </button>
            </div>
            
            <div class="flex flex-col items-center mb-6">
                <div class="relative">
                    <img src="<?= $user['avatar'] ?>" alt="<?= $user['name'] ?>" class="w-24 h-24 rounded-full object-cover border-4 border-gray-900 shadow-lg">
                    <div class="absolute -bottom-2 -right-2 bg-blue-500 text-white rounded-full p-1">
                        <i class="fas fa-badge-check"></i>
                    </div>
                </div>
                <h3 class="font-bold text-lg mt-4 text-white"><?= $user['name'] ?></h3>
                <p class="text-gray-400 text-sm"><?= $user['role'] ?></p>
                <div class="flex items-center mt-2">
                    <i class="fas fa-medal text-yellow-500 mr-1"></i>
                    <span class="text-sm text-gray-400"><?= $user['points'] ?> Points</span>
                </div>
            </div>
            
            <div class="grid grid-cols-3 gap-4 mb-8">
                <div class="text-center">
                    <div class="text-amber-500 font-bold text-xl"><?= $user['stats']['streak'] ?></div>
                    <div class="text-xs text-gray-400">Days Streak</div>
                </div>
                <div class="text-center">
                    <div class="text-pink-500 font-bold text-xl"><?= $user['stats']['goals'] ?></div>
                    <div class="text-xs text-gray-400">Goals in Month</div>
                </div>
                <div class="text-center">
                    <div class="text-purple-500 font-bold text-xl"><?= $user['stats']['place'] ?></div>
                    <div class="text-xs text-gray-400">2nd Place</div>
                </div>
            </div>
            
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="font-bold text-white">Weekly Streak</h4>
                    <i class="fas fa-info-circle text-gray-400"></i>
                </div>
                
                <div class="flex justify-between mb-2">
                    <span class="text-sm text-gray-400">4/4 Weeks</span>
                    <div class="flex space-x-1">
                        <i class="fas fa-chevron-left text-gray-400"></i>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>
                </div>
                
                <div class="grid grid-cols-7 gap-2 mb-6">
                    <?php 
                    $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                    foreach ($days as $index => $day): 
                        $isActive = $index <= 2;
                    ?>
                    <div class="text-center">
                        <div class="text-xs text-gray-400 mb-1"><?= $day ?></div>
                        <div class="<?= $isActive ? 'bg-green-500 text-white' : 'bg-gray-700 text-gray-400' ?> rounded-full w-10 h-10 flex items-center justify-center mx-auto">
                            <?= $index + 1 ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="mb-8">
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gray-700 rounded-lg p-4 text-center">
                        <div class="text-green-500 text-3xl mb-1"><i class="fas fa-book"></i></div>
                        <div class="font-bold text-xl mb-1 text-white">3</div>
                        <div class="text-sm text-gray-400">Courses</div>
                        <div class="text-xs text-gray-500">In Progress</div>
                    </div>
                    <div class="bg-gray-700 rounded-lg p-4 text-center">
                        <div class="text-green-500 text-3xl mb-1"><i class="fas fa-check-circle"></i></div>
                        <div class="font-bold text-xl mb-1 text-white">17</div>
                        <div class="text-sm text-gray-400">Courses</div>
                        <div class="text-xs text-gray-500">Completed</div>
                    </div>
                </div>
            </div>
            
            <div>
                <div class="flex justify-between items-center mb-4">
                    <h4 class="font-bold text-white">Weekly Watch Time</h4>
                    <i class="fas fa-info-circle text-gray-400"></i>
                </div>
                
                <div class="flex justify-between mb-2">
                    <span class="text-sm text-gray-400">4/4 Weeks</span>
                    <div class="flex space-x-1">
                        <i class="fas fa-chevron-left text-gray-400"></i>
                        <i class="fas fa-chevron-right text-gray-400"></i>
                    </div>
                </div>
                
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-400">6hrs</span>
                        <span></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-400">4hrs</span>
                        <span></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-400">2hrs</span>
                        <span></span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-400">0hrs</span>
                        <span></span>
                    </div>
                </div>
                
                <div class="relative h-24 mt-4">
                    <div class="absolute inset-0 flex items-end">
                        <div class="w-1/7 h-1/6 bg-gray-700 rounded-t-md mx-1"></div>
                        <div class="w-1/7 h-1/4 bg-gray-700 rounded-t-md mx-1"></div>
                        <div class="w-1/7 h-full bg-green-500 rounded-t-md mx-1"></div>
                        <div class="w-1/7 h-1/3 bg-gray-700 rounded-t-md mx-1"></div>
                        <div class="w-1/7 h-1/5 bg-gray-700 rounded-t-md mx-1"></div>
                        <div class="w-1/7 h-2/3 bg-gray-700 rounded-t-md mx-1"></div>
                        <div class="w-1/7 h-1/2 bg-gray-700 rounded-t-md mx-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('close-details-button').addEventListener('click', function() {
            document.getElementById('user-profile-sidebar').style.display = 'none';
        });

        document.getElementById('open-details-button').addEventListener('click', function() {
            document.getElementById('user-profile-sidebar').style.display = 'block';
        });

        document.getElementById('show-details-btn').addEventListener('click', function() {
            const sidebar = document.getElementById('user-profile-sidebar');
            const showBtn = document.getElementById('show-details-btn');
            
            if (sidebar.style.display === 'none') {
                sidebar.style.display = 'block';
                showBtn.style.display = 'none';
            }
        });

        document.getElementById('close-details-button').addEventListener('click', function() {
            const sidebar = document.getElementById('user-profile-sidebar');
            const showBtn = document.getElementById('show-details-btn');
            
            sidebar.style.display = 'none';
            showBtn.style.display = 'inline-flex';
        });
    </script>
</body>
</html>