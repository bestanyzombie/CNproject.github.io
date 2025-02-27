<!DOCTYPE html>
<html lang="en">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KS475VE2S3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-KS475VE2S3');
    </script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Computer Network Website Project</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="p-6">

    <h1 class="text-2xl font-bold">User Page</h1>
    <p class="mb-4">This is the user page.</p>

    <button id="theme-toggle" class="bg-blue-500 text-white px-4 py-2 rounded">
        Toggle Dark Mode
    </button>

    <!-- User Info Section -->
    <div id="user-info" class="mt-6 hidden">
        <h2 class="text-xl font-semibold">Welcome, <span id="user-name"></span>!</h2>
        <img id="user-avatar" src="" alt="User Avatar" class="mt-4 rounded-full w-24 h-24">
        <p><strong>GitHub:</strong> <a id="user-profile" href="#" target="_blank" class="text-blue-600"></a></p>
        <button id="logout" class="bg-red-500 text-white px-4 py-2 mt-4 rounded">Logout</button>
    </div>

    <!-- Load External JavaScript File -->
    <script src="oauthAPI.js"></script>
</body>
</html>
