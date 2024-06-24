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
            background-color: #333;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 40px;
        }
        .road-container {
            width: 80%;
            background-color: #444;
            border-radius: 25px;
            overflow: hidden;
            position: relative;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .road-line {
            height: 10px;
            background-color: yellow;
            width: 100%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
        }
        .road-line div {
            width: 10%;
            height: 100%;
            background-color: #333;
        }
        .car {
            position: absolute;
            width: 100px;
            height: auto;
            top: 50%;
            transform: translateY(-50%);
            left: 0;
        }
        @keyframes drive {
            0% { left: 0; }
            100% { left: calc(100% - 100px); }
        }
    </style>
</head>
<body>
    <h1>Logout realizado com sucesso!</h1>
    <div class="road-container">
        <div class="road-line">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <img src="../img/supercar.png" alt="Carro" class="car" id="car">
    </div>

    <script>
        function move() {
            var elem = document.getElementById("car"); 
            elem.style.animation = "drive 1.5s forwards";
            setTimeout(function() {
                window.location.href = '../index.php';
            }, 3000);
        }
        move();
    </script>
</body>
</html>
