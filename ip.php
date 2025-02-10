<?php
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $ipAddress = null;
        # For client device's address
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        # For proxy device
        } elseif (!empty($_SERVER['HTTPX_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTPX_FORWARDED_FOR'];
        # For remote address
        } else {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        $host = gethostname();
        $server = getservbyport(22, "tcp");
        echo "<h1>Results</h1>";
        echo "<p>Host name: " . $host . "</p>";
        echo "<p>IP Address: " . $ipAddress . "</p>";
        echo "<p>Connection type: " . $server . "</p>";
    }
?>
<html>
    <head>
    <style>
      h1 {text-align: center;}
      p {text-align: center;}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Computer Network Website Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <input type="button" value="Go back" name="goBackButton" class="btn" onclick="history.back()">
        <button id="theme-toggle" class="dark-mode-btn">
            Toggle Dark Mode
        </button>
        <script>
        document.getElementById("theme-toggle").addEventListener("click", function() {
            document.body.classList.toggle("dark-mode");
        });
        </script>
    </body>
</html>