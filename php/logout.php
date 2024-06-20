<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
        }
        .progress-container {
            width: 100%;
            background-color: #ccc;
            margin-top: 20px;
        }
        .progress-bar {
            width: 0;
            height: 30px;
            background-color: #4caf50;
        }
    </style>
</head>
<body>
    <h1>Logout realizado com sucesso!</h1>
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <script>
        function move() {
            var elem = document.getElementById("progressBar"); 
            var width = 0;
            var id = setInterval(frame, 15);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                    window.location.href = '../index.php';
                } else {
                    width++; 
                    elem.style.width = width + '%'; 
                }
            }
        }
        move();
    </script>
</body>
</html>
