<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Washway</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Inria+Sans:wght@400;700&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
    /* Font setup */
    body {
        font-family: 'Inria Sans', sans-serif;
        background-color: #d4e0e7;
    }

    h1,
    .logo-text,
    .tagline {
        font-family: 'Fredoka One', cursive;
    }

    /* Custom colors */
    header {
        background-color: #D9D9D9;
    }

    .logo-wash {
        color: #2A79B2;
    }

    .logo-way {
        color: #74B3E0;
    }

    .login-btn {
        background-color: #6ea4d9;
        color: white;
    }

    .login-btn:hover {
        background-color: #5a8acb;
    }

    .title-text {
        color: #6ea4d9;
    }

    .text-gray {
        color: #4b5563;
    }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="flex justify-between items-center px-6 py-4 shadow-sm">
        <div class="text-2xl font-bold logo-text select-none">
            <span class="logo-wash">WASH</span><span class="logo-way">WAY</span>
        </div>
        <nav class="space-x-6 text-gray font-medium text-sm sm:text-base">
            <a class="hover:underline transition" href="home.php">Home</a>
            <a class="hover:underline transition" href="about.php">About</a>
            <a class="hover:underline transition" href="#">Contact</a>
            <a class="login-btn px-4 py-1 rounded-md font-semibold hover:transition" href="login.php">Login</a>
        </nav>
    </header>


    <main class="flex flex-col md:flex-row items-center justify-center px-6 md:px-20 py-16 md:py-24 gap-10 md:gap-20">
        <div class="text-center md:text-left max-w-md md:max-w-xl">
            <h1 class="title-text font-extrabold text-5xl md:text-7xl leading-tight tracking-wide">
                WE DO<br />LAUNDRY<br />FOR YOU
            </h1>
            <div class="flex justify-start mt-4 space-x-3 md:space-x-4">

                <img src="img/bubble.png" alt="Tiny bubble" class="w-4 h-4 md:w-5 md:h-5" />
            </div>
            <p class="mt-4 tagline font-black text-black text-xl md:text-2xl">
                super clean, fresh, and fast
            </p>
        </div>

        <div class="flex-shrink-0">
            <img src="img/home.png" alt="Woman holding laundry" class="w-95 md:w-[700px] object-contain" />
        </div>
    </main>
</body>

</html>