<?php
require_once '../Backend/session_handler.php';
// Remove the session_start() call since it's handled by session_handler.php

// PHP for dynamic course data
$courses = [
    [
        'title' => 'Web Development',
        'description' => 'Learn full-stack web development',
        'image' => 'https://media.istockphoto.com/id/1201166649/photo/office-responsive-devices-web-design-website.jpg?s=2048x2048&w=is&k=20&c=7OQhRq_0EWxf4EQL66TQ6qRiPtpkmJKl33wM4PPnNM8=',
        'price' => '$49.99'
    ],
    [
        'title' => 'Data Science',
        'description' => 'Master data analysis and ML',
        'image' => 'https://cdn.pixabay.com/photo/2017/10/29/14/49/data-2899903_640.jpg',
        'price' => '$59.99'
    ],
    [
        'title' => 'Data Structures and Algorithms',
        'description' => 'Master DSA concepts with practical implementations in Java and Python',
        'image' => 'https://cdn.pixabay.com/photo/2016/11/30/20/58/programming-1873854_1280.png',
        'price' => '$54.99'
    ]
];
?>

<!-- Courses Section -->
<div class="bg-gray-900 py-16 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">Popular Courses</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($courses as $course): ?>
            <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <img src="<?php echo htmlspecialchars($course['image']); ?>" 
                     alt="<?php echo htmlspecialchars($course['title']); ?>" 
                     class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">
                        <?php echo htmlspecialchars($course['title']); ?>
                    </h3>
                    <p class="text-gray-300 mb-4">
                        <?php echo htmlspecialchars($course['description']); ?>
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-green-400 font-bold">
                            <?php echo htmlspecialchars($course['price']); ?>
                        </span>
                        <form action="../Backend/purchase_course.php" method="POST">
                            <input type="hidden" name="course_title" value="<?php echo htmlspecialchars($course['title']); ?>">
                            <input type="hidden" name="course_description" value="<?php echo htmlspecialchars($course['description']); ?>">
                            <input type="hidden" name="course_image" value="<?php echo htmlspecialchars($course['image']); ?>">
                            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                                Buy Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
