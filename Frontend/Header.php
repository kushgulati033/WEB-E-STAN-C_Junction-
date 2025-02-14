<!-- File: index.php -->
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
</head>
<body class="bg-gray-900 text-white">
    <!-- Navigation Bar -->
    <nav class="bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-8 w-auto" src="logo.png" alt="Skills Logo">
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <div class="relative">
                            <button id="courses-button" class="inline-flex items-center px-1 py-2 text-gray-300 hover:text-white focus:outline-none mt-2">
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
                        <a href="#" class="inline-flex items-center px-1 py-2 text-gray-300 hover:text-white">
                            IIT & IIM Online Programs
                        </a>
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
                    <div class="ml-4">
                        <a href="Login.php" class="inline-flex items-center px-4 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-colors">
                            Login / Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        document.getElementById('courses-button').addEventListener('click', function() {
            var dropdown = document.getElementById('courses-dropdown');
            dropdown.classList.toggle('hidden');
        });
    </script>
</body>
</html>