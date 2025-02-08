<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $ipAddress = null;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTPX_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTPX_FORWARDED_FOR'];
        } else {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        echo "<p>IP Address: " . $ipAddress . "</p>";
    }
?>