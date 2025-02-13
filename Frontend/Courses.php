<?php
    // PHP for dynamic course data
    $courses = [
        [
            'title' => 'Web Development',
            'description' => 'Learn full-stack web development',
            'image' => 'web-dev.jpg'
        ],
        [
            'title' => 'Data Science',
            'description' => 'Master data analysis and ML',
            'image' => 'data-science.jpg'
        ],
        // Add more courses as needed
    ];
    ?>

    <!-- Courses Section -->
    <div class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Popular Courses</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($courses as $course): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="<?php echo htmlspecialchars($course['image']); ?>" 
                         alt="<?php echo htmlspecialchars($course['title']); ?>" 
                         class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">
                            <?php echo htmlspecialchars($course['title']); ?>
                        </h3>
                        <p class="text-gray-600">
                            <?php echo htmlspecialchars($course['description']); ?>
                        </p>
                        <a href="#" class="mt-4 inline-block text-red-500 hover:text-red-600">
                            Learn More →
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>