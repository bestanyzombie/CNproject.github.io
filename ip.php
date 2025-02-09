<?php
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $ipAddress = null;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTPX_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTPX_FORWARDED_FOR'];
        } else {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        $host = gethostname();
        $server = getservbyport(22, "tcp");
        echo "<h1>Results</h1>";
        echo "<p>Host name: " . $host . "</p>";
        echo "<p>IP Address: " . $ipAddress . "</p>";
        echo "<p>Server type: " . $server . "</p>";
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
    <link rel="stylesheet" href="./style.css">
    </head>
</html>