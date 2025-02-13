<?php
// Mock data for the dashboard
$user = [
    'name' => 'Brooklyn Simmons',
    'role' => 'UI/UX Designer & Developer',
    'points' => 876,
    'avatar' => 'https://example.com/avatar.jpg',
    'stats' => [
        'streak' => 54,
        'goals' => 6,
        'place' => 2
    ]
];

$inProgressCourses = [
    [
        'title' => 'Advance UI/UX Design',
        'category' => 'DESIGN',
        'progress' => '18/40',
        'timeLeft' => '2 hours left'
    ],
    [
        'title' => 'Basic Web Development',
        'category' => 'DEVELOPMENT',
        'progress' => '18/40',
        'timeLeft' => '2 hours left'
    ]
];

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
    <title>Focotech Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <h1 class="text-xl font-bold text-white">Focotech</h1>
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
            
            <div class="mt-12 mx-6">
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-6 text-white relative overflow-hidden">
                    <div class="absolute right-0 bottom-0">
                        <i class="fas fa-flag text-green-300 text-7xl opacity-50"></i>
                    </div>
                    <h3 class="text-lg font-bold mb-2">Get Premium Now!</h3>
                    <p class="text-sm mb-4">Reach our special feature by subscribe our plan.</p>
                    <button class="bg-white text-green-500 px-4 py-2 rounded-md text-sm">
                        Upgrade Now <i class="fas fa-arrow-up ml-1"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold">Dashboard</h2>
                <div class="relative">
                    <input type="text" placeholder="Search here..." class="pl-10 pr-4 py-2 rounded-md border border-gray-700 bg-gray-800 text-gray-300 w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
            
            <!-- Continue Learning Section -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold mb-6">Continue Learning</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($inProgressCourses as $course): ?>
                    <div class="bg-gray-800 p-6 rounded-lg shadow">
                        <div class="flex items-start">
                            <div class="<?= $course['category'] === 'DESIGN' ? 'bg-green-500 text-white' : 'bg-blue-500 text-white' ?> p-3 rounded-md mr-4">
                                <i class="<?= $course['category'] === 'DESIGN' ? 'fas fa-paint-brush' : 'fas fa-code' ?> text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm text-gray-400 mb-1"><?= $course['category'] ?></div>
                                <h3 class="font-bold text-lg mb-3 text-white"><?= $course['title'] ?></h3>
                                <div class="relative w-full h-2 bg-gray-700 rounded-full mb-3">
                                    <div class="absolute left-0 top-0 h-2 bg-green-500 rounded-full" style="width: 45%"></div>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400"><i class="fas fa-book mr-1"></i> <?= $course['progress'] ?> Lessons</span>
                                    <span class="text-gray-400"><i class="far fa-clock mr-1"></i> <?= $course['timeLeft'] ?></span>
                                </div>
                            </div>
                        </div>
                        <button class="mt-4 w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition">
                            Resume Course <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                    <?php endforeach; ?>
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
        <div class="w-80 bg-gray-800 p-6 shadow-md">
            <div class="flex justify-end mb-4">
                <button class="text-green-500 text-sm">
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
</body>
</html>