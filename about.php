<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
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
    body {
        font-family: 'Inria Sans', sans-serif;
        background-color: #d4e0e7;
    }

    h1,
    .logo-text,
    .tagline {
        font-family: 'Fredoka One', cursive;
    }

    h2 {
        font-family: 'Fredoka One', cursive;
        color: black;
    }

    .fredoka {
        font-family: 'Fredoka One', cursive;
    }

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

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <!-- Our Services -->
        <section class="mb-20">
            <h2 class="fredoka text-center font-extrabold text-2xl sm:text-3xl mb-4">Our Service</h2>
            <p class="text-center text-sm sm:text-base text-[#2f2f2f] mb-10 max-w-2xl mx-auto">
                Explore our laundry services — washing, drying, ironing, and more. Fresh clothes, made easy.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Service Card -->
                <article class="bg-white rounded-md p-4 shadow-md transition hover:shadow-lg">
                    <img src="https://storage.googleapis.com/a1aa/image/9470eae0-7d68-4d0b-2dd1-d32b75bf3141.jpg"
                        alt="Dry Cleaning" class="rounded-md mb-3 w-full h-40 object-cover" />
                    <h3 class="text-base font-bold mb-1">Dry Cleaning</h3>
                    <p class="text-sm text-[#2f2f2f] leading-snug">
                        Expert stain removal and fabric care — your clothes, refreshed and revived.
                    </p>
                </article>

                <article class="bg-white rounded-md p-4 shadow-md transition hover:shadow-lg">
                    <img src="https://storage.googleapis.com/a1aa/image/631542c9-823d-4bf7-cade-1f129f6994b1.jpg"
                        alt="Wash & Fold" class="rounded-md mb-3 w-full h-40 object-cover" />
                    <h3 class="text-base font-bold mb-1">Wash &amp; Fold</h3>
                    <p class="text-sm text-[#2f2f2f] leading-snug">
                        Clean, folded, and ready to wear — leave the work to us.
                    </p>
                </article>

                <article class="bg-white rounded-md p-4 shadow-md transition hover:shadow-lg">
                    <img src="https://storage.googleapis.com/a1aa/image/87210463-df84-4840-acda-9ae3c787ba53.jpg"
                        alt="Ironing" class="rounded-md mb-3 w-full h-40 object-cover" />
                    <h3 class="text-base font-bold mb-1">Ironing</h3>
                    <p class="text-sm text-[#2f2f2f] leading-snug">
                        Wrinkle-free clothes with professional ironing you can count on.
                    </p>
                </article>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="w-full relative rounded-md text-white py-10 overflow-hidden"
            style="background-image: url('img/bg-about.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <!-- Overlay blur -->
            <div class="absolute inset-0 bg-blue-300/50 backdrop-blur-md z-0"></div>

            <!-- Content di atas blur -->
            <div class="relative z-10 px-4 sm:px-6 lg:px-8">
                <h2 class="text-center font-extrabold text-2xl sm:text-3xl mb-3">Why Choose Us?</h2>
                <p class="text-center text-sm sm:text-base mb-10 max-w-2xl mx-auto">
                    Choose us for reliable, fast, and affordable laundry service — fresh clothes, every time.
                </p>

                <div class="flex flex-wrap justify-center gap-8">
                    <div class="flex flex-col items-center max-w-[120px] text-center">
                        <img src="https://storage.googleapis.com/a1aa/image/d20184c6-4af4-49a3-fa30-694955f85fd2.jpg"
                            alt="Fast Delivery" class="rounded-full w-24 h-24 object-cover mb-2" />
                        <span class="font-bold text-xs">Fast Delivery</span>
                    </div>

                    <div class="flex flex-col items-center max-w-[120px] text-center">
                        <img src="https://storage.googleapis.com/a1aa/image/4c7363be-8b26-439b-fb8d-15fa8d759383.jpg"
                            alt="Affordable Price" class="rounded-full w-24 h-24 object-cover mb-2" />
                        <span class="font-bold text-xs">Affordable Price</span>
                    </div>

                    <div class="flex flex-col items-center max-w-[120px] text-center">
                        <img src="https://storage.googleapis.com/a1aa/image/b3672718-f79c-463f-308e-192859b9b74c.jpg"
                            alt="Eco Friendly" class="rounded-full w-24 h-24 object-cover mb-2" />
                        <span class="font-bold text-xs">Eco-Friendly</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer
        class="bg-[#a9c3e3] py-4 px-6 flex flex-col sm:flex-row justify-between items-center text-xs sm:text-sm text-[#1a1a1a] mt-10 space-y-2 sm:space-y-0">
        <div class="flex items-center space-x-2">
            <i class="fab fa-whatsapp"></i>
            <span>08xxxxxxxx</span>
        </div>
        <div class="flex items-center space-x-2">
            <i class="fas fa-map-marker-alt"></i>
            <span>Jl. Kledokan</span>
        </div>
        <div class="flex items-center space-x-2">
            <i class="fab fa-instagram"></i>
            <span>@laundryshop.id</span>
        </div>
    </footer>
</body>

</html>