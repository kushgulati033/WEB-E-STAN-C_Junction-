<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Login - PW Skills</title>
=======
    <title>Login - C-Junction</title>
>>>>>>> 6b3030f9f3eafef10ba18029038c266e874d3eee
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .bg-cyberpunk {
            background: linear-gradient(135deg, rgba(0, 0,0,100), rgba(0, 0, 40, 0.8)), url('cyberpunk-background.jpg');
            background-size: cover;
            background-position: center;
        }
        .translucent-box {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
        }
<<<<<<< HEAD
=======
        @import url('https://fonts.googleapis.com/css2?family=Anton&family=Creepster&family=Dancing+Script:wght@400..700&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Wet+Paint&display=swap');

>>>>>>> 6b3030f9f3eafef10ba18029038c266e874d3eee
    </style>
</head>
<body class="bg-cyberpunk text-white">
    <div class="flex min-h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 p-8 rounded-lg shadow-lg translucent-box">
            <div>
<<<<<<< HEAD
                <img class="mx-auto h-12 w-auto" src="logo.png" alt="PW Skills">
=======
                <!-- <img class="mx-auto h-12 w-auto" src="logo.png" alt="PW Skills"> -->
                <div class="text-xl flex items-center ">
                    <div class="text-green-500 mr-2">
                        <i class="fas fa-cube text-2xl"></i>
                    </div>
                        <!-- <img class="h-8 w-auto" src="logo.png" alt="Skills Logo"> -->
                        <h1 class="font-['Pacifico'] text-2xl tracking-wide">C-Junc<sup>n</sup></h1>

                    </div>
>>>>>>> 6b3030f9f3eafef10ba18029038c266e874d3eee
                <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
                    Sign in to your account
                </h2>
            </div>
<<<<<<< HEAD
            <form class="mt-8 space-y-6" action="#" method="POST">
=======
            <form class="mt-8 space-y-6" action="../Backend/authenticate.php" method="POST">
>>>>>>> 6b3030f9f3eafef10ba18029038c266e874d3eee
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-700 placeholder-gray-500 text-gray-300 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm bg-gray-800" placeholder="Email address">
                    </div>
                    <div>
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-700 placeholder-gray-500 text-gray-300 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm bg-gray-800" placeholder="Password">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-300">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-green-400 hover:text-green-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Sign in
                    </button>
                </div>
            </form>
            <p class="mt-2 text-center text-sm text-gray-300">
                Or
                <a href="#" class="font-medium text-green-400 hover:text-green-500">
                    create a new account
                </a>
            </p>
        </div>
    </div>
</body>
</html>