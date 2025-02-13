<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&family=Creepster&family=Dancing+Script:wght@400..700&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&family=Rubik+Wet+Paint&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-900 text-white font-sans">
    <div class="flex min-h-screen justify-center items-center">
        <div class="bg-gray-800 p-10 rounded-lg shadow-lg w-96">
            <h2 class="text-3xl font-bold mb-6">Todo List</h2>
            <form method="post" action="">
                <div class="mb-4">
                    <input type="text" name="new-todo" id="new-todo" class="w-full p-4 bg-gray-900 text-white rounded-lg text-xl" placeholder="Add a new task">
                    <button type="submit" name="add-todo" class="mt-2 w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition text-xl">Add Task</button>
                </div>
            </form>
            <ul id="todo-list" class="space-y-2">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-todo'])) {
                    $newTodo = htmlspecialchars($_POST['new-todo']);
                    if (!empty($newTodo)) {
                        $todos = isset($_COOKIE['todos']) ? json_decode($_COOKIE['todos'], true) : [];
                        $todos[] = $newTodo;
                        setcookie('todos', json_encode($todos), time() + (86400 * 30), "/");
                    }
                }

                if (isset($_COOKIE['todos'])) {
                    $todos = json_decode($_COOKIE['todos'], true);
                    foreach ($todos as $todo) {
                        echo '<li class="bg-gray-700 p-3 rounded-lg text-white flex justify-between items-center">';
                        echo '<span>' . $todo . '</span>';
                        echo '<form method="post" action="" class="inline">';
                        echo '<button type="submit" name="delete-todo" value="' . $todo . '" class="delete-todo-button text-red-500 hover:text-red-700">Delete</button>';
                        echo '</form>';
                        echo '</li>';
                    }
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-todo'])) {
                    $deleteTodo = $_POST['delete-todo'];
                    $todos = isset($_COOKIE['todos']) ? json_decode($_COOKIE['todos'], true) : [];
                    $todos = array_filter($todos, function($todo) use ($deleteTodo) {
                        return $todo !== $deleteTodo;
                    });
                    setcookie('todos', json_encode($todos), time() + (86400 * 30), "/");
                    header("Location: todolist.php");
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>