<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once(dirname(__FILE__) .  "/connection/connection.php");
include_once(dirname(__FILE__) .  "/funcs/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @font-face {
            font-family: 'Kanit';
            src: url('../font/Kanit-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Kanit', sans-serif;
        }

        body {
            background-color: #f0f0f0;
            /* สีเทาอ่อน */
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body style="background-image: url(img/Well.png)">

</body>
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

</html>