<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&family=Creepster&family=Dancing+Script:wght@400..700&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&family=Rubik+Wet+Paint&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-900 text-white font-sans">
    <div class="flex min-h-screen justify-center items-center">
        <div class="bg-gray-800 p-10 rounded-lg shadow-lg w-96">
            <h2 class="text-3xl font-bold mb-6">Calculator</h2>
            <form method="post" action="">
                <div class="mb-4">
                    <input type="text" name="display" id="calculator-display" class="w-full p-4 text-right bg-gray-900 text-white rounded-lg text-2xl" value="<?php echo isset($_POST['display']) ? htmlspecialchars($_POST['display']) : ''; ?>" readonly>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <button type="submit" name="button" value="7" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">7</button>
                    <button type="submit" name="button" value="8" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">8</button>
                    <button type="submit" name="button" value="9" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">9</button>
                    <button type="submit" name="button" value="/" class="calculator-button bg-green-500 p-4 rounded-lg text-white text-xl">/</button>
                    <button type="submit" name="button" value="4" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">4</button>
                    <button type="submit" name="button" value="5" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">5</button>
                    <button type="submit" name="button" value="6" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">6</button>
                    <button type="submit" name="button" value="*" class="calculator-button bg-green-500 p-4 rounded-lg text-white text-xl">*</button>
                    <button type="submit" name="button" value="1" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">1</button>
                    <button type="submit" name="button" value="2" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">2</button>
                    <button type="submit" name="button" value="3" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">3</button>
                    <button type="submit" name="button" value="-" class="calculator-button bg-green-500 p-4 rounded-lg text-white text-xl">-</button>
                    <button type="submit" name="button" value="0" class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">0</button>
                    <button type="submit" name="button" value="." class="calculator-button bg-gray-700 p-4 rounded-lg text-white text-xl">.</button>
                    <button type="submit" name="button" value="=" class="calculator-button bg-green-500 p-4 rounded-lg text-white text-xl">=</button>
                    <button type="submit" name="button" value="+" class="calculator-button bg-green-500 p-4 rounded-lg text-white text-xl">+</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $display = isset($_POST['display']) ? $_POST['display'] : '';
        $button = isset($_POST['button']) ? $_POST['button'] : '';

        if ($button == '=') {
            try {
                $display = eval('return ' . $display . ';');
            } catch (Exception $e) {
                $display = 'Error';
            }
        } elseif ($button == 'C') {
            $display = '';
        } else {
            $display .= $button;
        }

        echo "<script>document.getElementById('calculator-display').value = '" . htmlspecialchars($display) . "';</script>";
    }
    ?>
</body>
</html>