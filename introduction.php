<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // If not logged in, redirect to the login page
    header("Location: login.html");
    exit(); // Ensure no further code is executed after redirect
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calender</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
      
        body {
            cursor: none;
        }
        .cursor-dot {
            width: 10px;
            height: 10px;
            background-color: #3b82f6; 
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
        .cursor-outline {
            width: 30px;
            height: 30px;
            border: 2px solid rgba(59, 130, 246, 0.5); 
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            transform: translate(-50%, -50%);
            z-index: 9998;
        }
    
         
    </style>
</head>
<body class="bg-gray-900 text-white">

    <div id="cursor-dot" class="cursor-dot"></div>
    <div id="cursor-outline" class="cursor-outline"></div>

    <div class="bg-gray-950 flex items-center justify-center text-xs py-2">
        We believe in good management. Do you?
    </div>

    <nav class="bg-gradient-to-r from-indigo-300 via-purple-300 to-pink-300 p-6 text-black font-bold shadow-lg">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
            <a href="#" class="text-3xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600 flex items-center gap-2 mb-4  md:mb-0 hover:scale-105 transition-transform duration-300">
                TIME IS MONEY
            </a>
            <ul class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
                <li><a href="aboutus.html" class="hover:underline italic text-lg hover:text-purple-600 transition-all duration-300 hover:scale-110">About</a></li>
                <li><a href="services.html" class="hover:underline italic text-lg hover:text-purple-600 transition-all duration-300 hover:scale-110">Services</a></li>
                <li><a href="contact.html" class="hover:underline italic text-lg hover:text-purple-600 transition-all duration-300 hover:scale-110">Contact</a></li>
            </ul>
        </div>
    </nav>

    <section id="home" class="relative overflow-hidden">
        <div class="container mx-auto px-4 md:px-6 py-20 md:py-32 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 text-center md:text-left mb-12 md:mb-0 animate__animated animate__fadeInLeft animate_delay-2000">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 text-gray-300">
                        Revolutionize Your <span class="gradient-text">Event Management</span>
                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 mb-8">
                        The world's most advanced event management platform powered by AI. Schedule, organize, and collaborate like never before.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center md:justify-start">
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full font-semibold shadow-lg transition duration-300 transform hover:scale-105 shadow-violet-600 delay-200ms">
                            <a href="calendar.html "> Get Started Free</a>
                        </button>
                    </div>
                </div>
                <div class="md:w-1/2 animate__animated animate__fadeInRight w-full">
                    <img class="rounded-xl w-full h-auto" src="https://media.wired.com/photos/653bddf62692abf70732f95b/master/w_2560%2Cc_limit/Google-Calendar-Appointments-Gear-GettyImages-1385868923.jpg" alt="Event Management Dashboard">
                </div>
            </div>
        </div>
    </section>

    <div class="flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-20 px-4 md:px-20 py-10">
        <div class="md:w-1/2">
            <h1 class="text-3xl md:text-4xl font-bold py-4 text-blue-600 italic">More than just planning</h1>
            <p class="text-lg md:text-xl font-bold">Organize meetings and events, invite your team members and external users, plan your day.</p>
            <button class="mt-5 text-lg md:text-2xl font-bold bg-lime-600 text-white px-5 py-2 border rounded italic hover:text-black duration-300 ease-in">
                <a href="calendar.html">Start For Free</a>
            </button>
        </div>
        <div class="md:w-1/2">
            <img class="rounded-xl w-full h-auto" src="https://www.bitrix24.in/upload/optimizer/converted/images/content_en/product/collaboration/free_online_calendar_software/box_img_1.jpg.webp?1741952127945" alt="">
        </div>
    </div>

    <div class="flex flex-col md:flex-row space-y-10 md:space-y-0 md:space-x-20 px-4 md:px-20 py-10">
        <div class="md:w-1/2">
            <img class="rounded-xl w-full h-auto" src="https://www.bitrix24.in/upload/optimizer/converted/images/content_en/product/collaboration/free_online_calendar_software/box_img_2.jpg.webp?1741952127945" alt="">
        </div>
        <div class="md:w-1/2">
            <h1 class="text-3xl md:text-4xl py-4 text-blue-600 italic">More than just organizing</h1>
            <p class="text-lg md:text-xl font-bold">There’s so much you can do with a simple event in Bitrix24 Calendar: create a quick chat, set up an online meeting, or assign a task.</p>
            <button class="mt-5 text-lg md:text-2xl font-bold bg-lime-600 text-white px-5 py-2 border rounded italic hover:text-black">
                <a href="calendar.html">Start For Free</a>
            </button>
        </div>
    </div>

    <footer class="bg-gray-950 py-[50px] text-center text-sm md:text-base">
        <div>Privacy Policy | Terms of Service | Official Community | Creation Guideline | HOME Terms of Service</div>
        <div class="flex flex-wrap justify-center gap-4 p-3">
            <div>--@亗卄iṁąのれu</div>
            <div>--@ḐɽヤḌ٥٥m</div>
            <div>--@ŠØUL๛Vivek</div>
            <div>--@Lîôṅ๛heart</div>
        </div>
    </footer>

    <!-- <script>
        const backToTopButton = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });

        backToTopButton?.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script> -->

    <script>
        const cursorDot = document.querySelector('#cursor-dot');
        const cursorOutline = document.querySelector('#cursor-outline');

        document.addEventListener('mousemove', (e) => {
            gsap.to(cursorDot, { x: e.clientX, y: e.clientY, duration: 0.01 });
            gsap.to(cursorOutline, { x: e.clientX, y: e.clientY, duration: 0.2, ease: "power2.out" });
        });
    </script>
</body>
</html>