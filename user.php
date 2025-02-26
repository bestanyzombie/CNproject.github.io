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

    <!-- Link to External CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>User page</h1>
<p>This is the user page.</p>
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