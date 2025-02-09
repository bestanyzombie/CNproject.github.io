<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the user's IP address
    $ipAddress = null;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  // Fixed a typo in 'HTTPX_FORWARDED_FOR'
        $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    }

    // Get the hostname of the user (if resolvable)
    $host = gethostbyaddr($ipAddress);

    // Get the server type
    $server = $_SERVER['SERVER_SOFTWARE']; // More reliable than getservbyport

    // Display the results
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>Network Info</title>
        <link rel='stylesheet' href='./style.css'>
        <style>
            body { font-family: Arial, sans-serif; text-align: center; padding: 20px; background-color: #f8f9fa; }
            .container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); max-width: 400px; margin: auto; }
            h1 { color: #007bff; }
            p { color: #333; font-size: 18px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Network Information</h1>
            <p><strong>Host Name:</strong> $host</p>
            <p><strong>IP Address:</strong> $ipAddress</p>
            <p><strong>Server Type:</strong> $server</p>
        </div>
    </body>
    </html>";
}
?>
