<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R&C - About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000;
            overflow-x: hidden;
            overflow-y: hidden; /* Default to hidden for desktop scroll-wrapper */
        }

        .navbar {
            background-color: transparent;
            background: rgba(46, 46, 46, 0.25);
            backdrop-filter: blur(4px);
            z-index: 1000;
            transition: background 0.3s ease; /* Smooth transition for background change */
            position: fixed; /* Ensure navbar stays fixed */
            top: 0;
            width: 100%;
        }

        .nav-item {
            margin: 0px 2rem;
        }

        .nav-link,
        .navbar-brand {
            color: white !important;
            font-size: 1rem;
        }

        .navbar-brand img {
            height: 64px;
        }

        .navbar-collapse {
            flex-grow: 0;
        }

        .nav-link:hover {
            color: rgb(255, 119, 0) !important;
        }

        .navbar-toggler {
            color: white;
        }

        .navbar-toggler-icon {
            filter: invert();
        }

        /* Scroll Container */
        .scroll-wrapper {
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .scroll-container {
            height: 100vh;
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Section Styling */
        .scroll-section {
            height: 100vh;
            width: 100vw;
            position: relative;
            display: flex; /* Use flexbox to stack header and content */
            flex-direction: column; /* Stack vertically */
            background-color: #1a1a1a; /* Solid dark background for all sections */
        }

        /* New style for the top 20% header area within a scroll-section */
        .section-top-20 {
            height: 20vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10; /* Ensure it's above any background layers */
            color: white; /* Ensure text is visible */
            text-align: center; /* Center text within the header */
            padding-top: 12%; /* Account for fixed navbar */
        }

        /* Existing .section-content now takes the remaining 80% */
        .section-content {
            height: 80vh; /* Takes the remaining 80% of the 100vh scroll-section */
            width: 100%;
            display: flex;
            align-items: center; /* Center content vertically */
            justify-content: center; /* Center content horizontally */
            position: relative; /* Ensure z-index works if needed */
            z-index: 2; /* Ensure it's above background but below header */
            padding-bottom: 20px; /* Add some padding at the bottom */
        }

        /* About Hero */
        #about-hero {
            background-image: url('./imgs/2.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #about-hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            z-index: 1;
        }
        #about-hero .section-content {
            height: 100vh; /* Hero takes full 100vh */
            padding-top: 80px; /* Account for fixed navbar */
            flex-direction: column; /* Stack title and lead */
            position: relative; /* Ensure content is above overlay */
            z-index: 2;
        }
        #about-hero .section-top-20 {
            display: none; /* Hide top-20 for hero as it's full height */
        }

        /* Company Journey */
        #company-journey {
            background-image: url('./imgs/3.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #company-journey::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.8); /* Dark overlay */
            z-index: 1;
        }
        .journey-card {
            padding: 1.5rem;
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }
        .journey-card:hover {
            transform: translateY(-10px);
        }
        .journey-year {
            font-size: 2rem;
            font-weight: bold;
            color: #ff7700;
            margin-bottom: 0.5rem;
        }

        /* Management Team */
        #management-team {
            background-image: url('./imgs/1.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #management-team::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            z-index: 1;
        }

        .team-card {
            padding: 2rem;
            text-align: center;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
        }

        .team-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ff7700;
        }

        .designation {
            color: #ff7700;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        /* Global Operations Section */
        
        #global-operations-section {
            background-image: url('./imgs/4.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #global-operations-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            z-index: 1;
        }
        .country-item {
            padding: 0.5rem 0;
            color: #fff;
        }

        /* Global Stats Section */
        

        #global-stats-section {
            background-image: url('./imgs/4.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #global-stats-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            z-index: 1;
        }
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ff7700;
        }

        .stat-label {
            font-size: 1rem;
            color: #ccc;
        }

        /* Financial Chart Section */
        #financial-chart-section {
            background-color: #0e0e0e;
        }
        #financial-chart-section {
            background-image: url('./imgs/6.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #financial-chart-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            z-index: 1;
        }

        /* Financial Highlights Section */
        
        #financial-highlights-section {
            background-image: url('./imgs/7.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #financial-highlights-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            z-index: 1;
        }

        .highlight-value {
            font-size: 2rem;
            font-weight: bold;
            color: #ff7700;
        }

        .highlight-label {
            color: #ccc;
        }

        /* Awards */
        #awards {
            background-color: #0e0e0e;
        }

        .awards-slider-container {
            overflow: hidden;
            width: 100%;
        }

        .awards-slider {
            display: flex;
            animation: scroll 20s linear infinite;
            width: calc(300px * 14); /* Adjusted for 7 unique items + 7 duplicates */
        }

        .award-item {
            min-width: 300px;
            margin: 0 1rem;
            padding: 2rem;
            text-align: center;
            flex-shrink: 0;
        }

        .award-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 1rem;
            object-fit: cover;
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-300px * 7)); } /* Scroll by 7 items */
        }

        /* Strategic Equipment */
        #strategic-equipment {
            background-image: url('./imgs/8.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        #strategic-equipment::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            z-index: 1;
        }
        .equipment-card {
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .equipment-card:hover {
            transform: translateY(-5px);
        }

        .equipment-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Annual Turnover Section */
        #annual-turnover-section {
            background-color: #0e0e0e;
        }

        .turnover-amount {
            font-size: 3rem;
            font-weight: bold;
            color: #ff7700;
        }

        .turnover-year {
            font-size: 1.2rem;
            color: #ccc;
        }

        .growth-rate {
            color: #28a745;
            font-size: 1.2rem;
            font-weight: 600;
        }

        /* Strategic Investments Section */
        #strategic-investments-section {
            background-color: #1a1a1a;
        }

        .investment-list {
            list-style: none;
            padding: 0;
        }

        .investment-list li {
            padding: 0.5rem 0;
            color: #fff;
        }

        /* Growth Projections Section */
        #growth-projections-section {
            background-color: #0e0e0e;
        }

        .projection-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ff7700;
        }

        .projection-label {
            color: #ccc;
            margin-top: 0.5rem;
        }

        /* Glass Card Effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        /* Footer */
        .footer-nav-glass {
            position: absolute; /* Position absolutely within the last scroll-section */
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px 0;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 9999;
            color: #fff;
            font-size: 14px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
        }

        .footer-nav-glass a {
            color: #ddd;
            text-decoration: none;
            margin: 0 12px;
            transition: color 0.3s ease;
        }

        .footer-nav-glass a:hover {
            color: #fff;
        }

        .footer-nav-glass .social-icons a {
            margin-left: 12px;
            font-size: 16px;
            color: #bbb;
        }

        .footer-nav-glass .social-icons a:hover {
            color: #fff;
        }

        /* Scroll Indicators */
        .scroll-indicators {
            position: fixed;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .scroll-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .scroll-dot.active {
            background: rgb(255, 119, 0);
            transform: scale(1.3);
        }

        .scroll-dot:hover {
            background: rgba(255, 255, 255, 0.6);
        }

        /* Mobile Responsive */
        @media (max-width: 992px) {
            body {
                overflow-y: auto; /* Enable natural scrolling on mobile */
            }
            
            .scroll-wrapper {
                height: auto !important; /* Allow natural height on mobile */
                overflow: visible !important; /* Allow content to overflow and enable scrolling */
                position: relative; /* Revert to relative positioning */
            }

            .scroll-container {
                height: auto !important; /* Allow natural height on mobile */
                transform: none !important; /* Disable any JS-applied transforms */
                transition: none !important; /* Disable transitions for natural scroll */
            }

            .scroll-indicators {
                display: none;
            }
            .scroll-section {
                height: auto; /* Allow sections to take natural height */
                padding-top: 80px; /* Account for fixed navbar */
                padding-bottom: 20px; /* Add some bottom padding */
                display: block; /* Revert to block for natural flow */
                width: 100%; /* Ensure full width */
            }
            .section-top-20 {
                height: auto; /* Allow header to take natural height */
                padding-top: 1rem; /* Add some top padding for mobile headers */
                padding-bottom: 0.5rem;
                width: 100%; /* Ensure it takes full width */
                text-align: center; /* Center text for mobile headers */
            }
            .section-content {
                height: auto; /* Revert to auto height for mobile */
                padding-bottom: 1rem; /* Adjust padding for mobile content */
                width: 100%; /* Ensure it takes full width */
                display: flex; /* Make it a flex container for its children (the row) */
                flex-direction: column; /* Stack the row vertically if needed, though row already handles this */
                align-items: center; /* Center children (the row) horizontally */
                justify-content: flex-start; /* Align content to the top within this section */
            }
            #about-hero .section-content {
                height: auto; /* Revert to auto height for mobile */
                padding-top: 0; /* No extra padding as section handles it */
            }
            #about-hero .section-top-20 {
                display: flex; /* Show top-20 for hero on mobile if needed, or keep hidden */
            }

            /* Company Journey Mobile */
            .journey-card {
                margin-bottom: 1rem;
            }

            /* Global Presence Mobile */
            .presence-row-item {
                height: auto; /* Allow natural height on mobile */
                margin-bottom: 1rem; /* Adjust margin */
            }
            .presence-row-item:last-child {
                margin-bottom: 0;
            }

            /* General Card Responsiveness for Mobile */
            .team-card, .equipment-card, .glass-card,
            .presence-map, .presence-stats, .financial-chart, .financial-highlights,
            .investment-card, .growth-projections {
                margin: 1rem auto; /* Center cards and add vertical spacing */
                width: 90%; /* Ensure cards take up a good width */
                max-width: 400px; /* Prevent cards from getting too wide on tablets */
            }

            /* Ensure rows are centered and don't cause horizontal scroll */
            .row {
                justify-content: center;
                margin-left: 0;
                margin-right: 0;
            }
            .col-lg-4, .col-md-6, .col-lg-8, .col-lg-6, .col-12, .col-lg-3 {
                padding-left: var(--bs-gutter-x, 0.75rem); /* Reset padding to default Bootstrap */
                padding-right: var(--bs-gutter-x, 0.75rem);
                display: flex; /* Use flex to center content within columns */
                justify-content: center;
            }

            /* Awards Slider Mobile */
            .awards-slider {
                animation: scroll 15s linear infinite; /* Adjust speed for mobile */
                width: calc(250px * 14); /* Adjust width based on new min-width */
            }
            .award-item {
                min-width: 250px; /* Smaller min-width for mobile */
                margin: 0 0.5rem; /* Reduce margin */
                padding: 1.5rem; /* Adjust padding */
            }
            @keyframes scroll {
                0% { transform: translateX(0); }
                100% { transform: translateX(calc(-250px * 7)); } /* Scroll by 7 items based on new min-width */
            }

            /* Footer on Mobile */
            .footer-nav-glass {
                position: relative; /* Revert to relative positioning on mobile */
                bottom: auto;
            }
        }

        @media (max-width: 576px) {
            .scroll-section {
                padding: 80px 15px 15px 15px;
            }
            .team-card {
                padding: 1.5rem;
            }
            .equipment-card {
                margin-bottom: 1rem;
            }
            .footer-nav-glass {
                font-size: 12px;
            }
            .footer-nav-glass a {
                margin: 0 8px;
            }
            .journey-year {
                font-size: 1.5rem;
            }
            .timeline-content {
                padding: 1rem;
            }
            .stat-number {
                font-size: 2rem;
            }
            .stat-label {
                font-size: 0.9rem;
            }
            .highlight-value {
                font-size: 1.8rem;
            }
            .turnover-amount {
                font-size: 2.5rem;
            }
            .turnover-year, .growth-rate {
                font-size: 1rem;
            }
            .projection-value {
                font-size: 2rem;
            }
            .projection-label {
                font-size: 0.9rem;
            }
            .awards-slider {
                width: calc(200px * 14); /* Even smaller width for very small screens */
            }
            .award-item {
                min-width: 200px;
            }
            @keyframes scroll {
                0% { transform: translateX(0); }
                100% { transform: translateX(calc(-200px * 7)); }
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-5 py-1 justify-content-center" style="width: 80%;">
            <a class="navbar-brand" href="#hero">
                <img src="./imgs/logo.png" alt="Logo" height="40" />
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="projects.php">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Scroll Indicators -->
    <div class="scroll-indicators">
        <button class="scroll-dot active" data-section="0"></button>
        <button class="scroll-dot" data-section="1"></button>
        <button class="scroll-dot" data-section="2"></button>
        <button class="scroll-dot" data-section="3"></button>
        <button class="scroll-dot" data-section="4"></button>
        <button class="scroll-dot" data-section="5"></button>
        <button class="scroll-dot" data-section="6"></button>
        <button class="scroll-dot" data-section="7"></button>
        <button class="scroll-dot" data-section="8"></button>
        <button class="scroll-dot" data-section="9"></button>
        <!-- <button class="scroll-dot" data-section="10"></button> -->
    </div>
    <div class="scroll-wrapper">
        <div class="scroll-container" id="scrollContainer">
            <!-- Hero Section -->
            <section id="about-hero" class="scroll-section">
                <div class="section-content">
                    <div class="container text-center position-relative z-2">
                        <h1 class="display-2 fw-bold mb-4 text-white">About R&C</h1>
                        <p class="lead fs-4 text-white">Building Tomorrow's Infrastructure Today</p>
                    </div>
                </div>
            </section>
            <!-- Company Journey Cards -->
            <section id="company-journey" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Our Journey</h2>
                        <p class="lead text-white">From Foundation to Present Day</p>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="row g-4 justify-content-center">
                            <div class="col-lg-4 col-md-6">
                                <div class="journey-card glass-card">
                                    <div class="journey-year">1978</div>
                                    <h4 class="text-white">Foundation</h4>
                                    <p class="text-white">R&C was established with a vision to transform India's infrastructure landscape.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="journey-card glass-card">
                                    <div class="journey-year">1990</div>
                                    <h4 class="text-white">First Major Project</h4>
                                    <p class="text-white">Completed our first major highway project, setting new standards in construction.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="journey-card glass-card">
                                    <div class="journey-year">2005</div>
                                    <h4 class="text-white">International Expansion</h4>
                                    <p class="text-white">Expanded operations to Africa and Middle East, taking Indian expertise global.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="journey-card glass-card">
                                    <div class="journey-year">2015</div>
                                    <h4 class="text-white">Technology Integration</h4>
                                    <p class="text-white">Adopted cutting-edge technology and sustainable construction practices.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="journey-card glass-card">
                                    <div class="journey-year">2024</div>
                                    <h4 class="text-white">Present Day</h4>
                                    <p class="text-white">Leading infrastructure company with projects across 15+ countries.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Management Team -->
            <section id="management-team" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Leadership Team</h2>
                        <p class="lead text-white">Meet the visionaries behind our success</p>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="row g-4 justify-content-center">
                            <div class="col-lg-3 col-md-6">
                                <div class="team-card glass-card text-center">
                                    <img src="https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341" alt="CEO" class="team-img mb-3">
                                    <h4 class="text-white">Rajesh Kumar</h4>
                                    <p class="designation">Chairman & Managing Director</p>
                                    <p class="bio text-white">With over 30 years of experience in infrastructure development, Rajesh has led the company to new heights of success.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="team-card glass-card text-center">
                                    <img src="https://www.perfocal.com/blog/content/images/size/w960/2021/01/Perfocal_17-11-2019_TYWFAQ_100_standard-3.jpg" alt="COO" class="team-img mb-3">
                                    <h4 class="text-white">Priya Sharma</h4>
                                    <p class="designation">Chief Operating Officer</p>
                                    <p class="bio text-white">Priya oversees all operational aspects and has been instrumental in our international expansion strategy.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="team-card glass-card text-center">
                                    <img src="https://t4.ftcdn.net/jpg/03/64/21/11/360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg" alt="CTO" class="team-img mb-3">
                                    <h4 class="text-white">Amit Patel</h4>
                                    <p class="designation">Chief Technology Officer</p>
                                    <p class="bio text-white">Leading our technology initiatives and digital transformation across all project verticals.</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="team-card glass-card text-center">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw0PDKrErulLlbJkbv5KtsCeICczdgJSyurA&s" alt="CFO" class="team-img mb-3">
                                    <h4 class="text-white">Sunita Gupta</h4>
                                    <p class="designation">Chief Financial Officer</p>
                                    <p class="bio text-white">Managing financial strategy and investor relations with expertise in infrastructure financing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Global Operations Section -->
            <section id="global-operations-section" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Global Presence</h2>
                        <p class="lead text-white">Our Operations Worldwide</p>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="presence-map glass-card p-4 w-100">
                            <h4 class="mb-4 text-white">Our Operations Worldwide</h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="country-item">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <strong>India:</strong> Mumbai, Delhi, Kolkata, Chennai, Bangalore
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="country-item">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <strong>UAE:</strong> Dubai, Abu Dhabi
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="country-item">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <strong>Mauritania:</strong> Nouakchott
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="country-item">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <strong>Zambia:</strong> Lusaka
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="country-item">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <strong>Oman:</strong> Muscat, Sohar
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="country-item">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <strong>Bangladesh:</strong> Dhaka
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Global Stats Section -->
            <section id="global-stats-section" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Global Statistics</h2>
                        <p class="lead text-white">Key figures from our worldwide operations</p>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="presence-stats glass-card p-4 w-100">
                            <h4 class="mb-4 text-white">Global Stats</h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="stat-item mb-3">
                                        <div class="stat-number">15+</div>
                                        <div class="stat-label">Countries</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stat-item mb-3">
                                        <div class="stat-number">50+</div>
                                        <div class="stat-label">Cities</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stat-item mb-3">
                                        <div class="stat-number">200+</div>
                                        <div class="stat-label">Active Projects</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="stat-item">
                                        <div class="stat-number">25,000+</div>
                                        <div class="stat-label">Employees</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Financial Chart Section -->
            <section id="financial-chart-section" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Financial Performance</h2>
                        <p class="lead text-white">Turnover Growth</p>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="financial-chart glass-card p-4">
                            <h4 class="mb-4 text-white">Turnover Growth (₹ Crores)</h4>
                            <div class="chart-container">
                                <canvas id="turnoverChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Financial Highlights Section -->
            <section id="financial-highlights-section" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Financial Highlights</h2>
                        <p class="lead text-white">Key financial indicators</p>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="financial-highlights glass-card p-4">
                            <h4 class="mb-4 text-white">Key Highlights</h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="highlight-item mb-3">
                                        <div class="highlight-value">₹8,200 Cr</div>
                                        <div class="highlight-label">Current Turnover</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="highlight-item mb-3">
                                        <div class="highlight-value">16%</div>
                                        <div class="highlight-label">YoY Growth</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="highlight-item mb-3">
                                        <div class="highlight-value">₹15,000 Cr</div>
                                        <div class="highlight-label">Order Book</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="highlight-item">
                                        <div class="highlight-value">AAA</div>
                                        <div class="highlight-label">Credit Rating</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Awards & Recognitions -->
            <section id="awards" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Awards & Recognition</h2>
                        <p class="lead text-white">Excellence recognized globally</p>
                    </div>  
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="awards-slider-container">
                            <div class="awards-slider" id="awardsSlider">
                                <div class="award-item glass-card">
                                    <!-- <img src="/placeholder.svg?height=100&width=100" alt="Award 1" class="award-logo"> -->
                                    <h5 class="text-white">Best Infrastructure Company</h5>
                                    <p class="text-white">Construction World Awards 2023</p>
                                </div>
                                <div class="award-item glass-card">
                                    <!-- <img src="/placeholder.svg?height=100&width=100" alt="Award 2" class="award-logo"> -->
                                    <h5 class="text-white">Excellence in Engineering</h5>
                                    <p class="text-white">Indian Engineering Excellence Awards 2023</p>
                                </div>
                                <div class="award-item glass-card">
                                    <!-- <img src="/placeholder.svg?height=100&width=100" alt="Award 3" class="award-logo"> -->
                                    <h5 class="text-white">Sustainability Champion</h5>
                                    <p class="text-white">Green Construction Awards 2022</p>
                                </div>
                                <div class="award-item glass-card">
                                    <!-- <img src="/placeholder.svg?height=100&width=100" alt="Award 4" class="award-logo"> -->
                                    <h5 class="text-white">Innovation in Construction</h5>
                                    <p class="text-white">Technology Excellence Awards 2022</p>
                                </div>
                                <div class="award-item glass-card">
                                    <!-- <img src="/placeholder.svg?height=100&width=100" alt="Award 5" class="award-logo"> -->
                                    <h5 class="text-white">Best Employer</h5>
                                    <p class="text-white">Great Place to Work 2023</p>
                                </div>
                                <!-- Duplicate items for seamless loop -->
                                <div class="award-item glass-card">
                                    <!-- <img src="/placeholder.svg?height=100&width=100" alt="Award 1" class="award-logo"> -->
                                    <h5 class="text-white">Best Infrastructure Company</h5>
                                    <p class="text-white">Construction World Awards 2023</p>
                                </div>
                                <div class="award-item glass-card">
                                    <!-- <img src="/placeholder.svg?height=100&width=100" alt="Award 2" class="award-logo"> -->
                                    <h5 class="text-white">Excellence in Engineering</h5>
                                    <p class="text-white">Indian Engineering Excellence Awards 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Strategic Equipment -->
            <section id="strategic-equipment" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Strategic Equipment</h2>
                        <p class="lead text-white">State-of-the-art machinery for complex projects</p>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="row g-4 justify-content-center">
                            <div class="col-lg-4 col-md-6">
                                <div class="equipment-card glass-card">
                                    <!-- <img src="/placeholder.svg?height=200&width=300" alt="Tower Crane" class="equipment-img"> -->
                                    <div class="equipment-info p-3">
                                        <h5 class="text-white">Tower Cranes</h5>
                                        <p class="text-white">High-capacity tower cranes for high-rise construction and heavy lifting operations.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="equipment-card glass-card">
                                    <!-- <img src="/placeholder.svg?height=200&width=300" alt="Concrete Pump" class="equipment-img"> -->
                                    <div class="equipment-info p-3">
                                        <h5 class="text-white">Concrete Pumps</h5>
                                        <p class="text-white">Advanced concrete pumping systems for efficient and precise concrete placement.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="equipment-card glass-card">
                                    <!-- <img src="/placeholder.svg?height=200&width=300" alt="TBM" class="equipment-img"> -->
                                    <div class="equipment-info p-3">
                                        <h5 class="text-white">Tunnel Boring Machines</h5>
                                        <p class="text-white">State-of-the-art TBMs for underground construction and tunneling projects.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="equipment-card glass-card">
                                    <!-- <img src="/placeholder.svg?height=200&width=300" alt="Excavator" class="equipment-img"> -->
                                    <div class="equipment-info p-3">
                                        <h5 class="text-white">Heavy Excavators</h5>
                                        <p class="text-white">Large-scale excavators for earthwork and foundation construction.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="equipment-card glass-card">
                                    <!-- <img src="/placeholder.svg?height=200&width=300" alt="Piling Rig" class="equipment-img"> -->
                                    <div class="equipment-info p-3">
                                        <h5 class="text-white">Piling Rigs</h5>
                                        <p class="text-white">Specialized piling equipment for deep foundation and marine construction.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="equipment-card glass-card">
                                    <!-- <img src="/placeholder.svg?height=200&width=300" alt="Bridge Girder" class="equipment-img"> -->
                                    <div class="equipment-info p-3">
                                        <h5 class="text-white">Bridge Girder Launchers</h5>
                                        <p class="text-white">Precision equipment for bridge construction and girder installation.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Annual Turnover Section -->
            <!-- <section id="annual-turnover-section" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Annual Turnover</h2>
                        <p class="lead text-white">Consistent growth and financial stability</p>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="investment-card glass-card p-4">
                            <h4 class="mb-4 text-white">Annual Turnover</h4>
                            <div class="turnover-info">
                                <div class="current-turnover mb-3">
                                    <span class="turnover-amount">₹8,200 Crores</span>
                                    <span class="turnover-year">(2023-24)</span>
                                </div>
                                <div class="growth-rate">
                                    <i class="fas fa-arrow-up me-2"></i>
                                    <span>16% Year-over-Year Growth</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- Strategic Investments Section -->
                <!-- <section id="strategic-investments-section" class="scroll-section">
                    <div class="section-top-20">
                        <div class="container">
                            <h2 class="display-5 fw-bold text-white">Strategic Investments</h2>
                            <p class="lead text-white">Driving future growth</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="container">
                            <div class="investment-card glass-card p-4">
                                <h4 class="mb-4 text-white">Strategic Investments</h4>
                                <ul class="investment-list">
                                    <li><i class="fas fa-check me-2"></i>₹500 Cr in new equipment and technology</li>
                                    <li><i class="fas fa-check me-2"></i>₹200 Cr in R&D and innovation</li>
                                    <li><i class="fas fa-check me-2"></i>₹300 Cr in international expansion</li>
                                    <li><i class="fas fa-check me-2"></i>₹150 Cr in sustainability initiatives</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section> -->
            <!-- Growth Projections Section -->
            <section id="growth-projections-section" class="scroll-section">
                <div class="section-top-20">
                    <div class="container">
                        <h2 class="display-5 fw-bold text-white">Growth Projections</h2>
                        <p class="lead text-white">Future targets</p>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="growth-projections glass-card p-4 text-center">
                            <h4 class="mb-4 text-white">Growth Projections</h4>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="projection-item">
                                        <div class="projection-value">₹12,000 Cr</div>
                                        <div class="projection-label">Target Turnover 2025</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="projection-item">
                                        <div class="projection-value">20+</div>
                                        <div class="projection-label">Countries by 2025</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="projection-item">
                                        <div class="projection-value">₹25,000 Cr</div>
                                        <div class="projection-label">Order Book Target</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-outline-light btn-lg">Investor Relations</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer positioned absolutely at bottom of this section -->
                <footer style="display:none" class="footer-nav-glass">
                    <div class="container d-flex justify-content-center align-items-center flex-wrap">
                        <a href="#">Be a Vendor</a>
                        <a href="#">Investors</a>
                        <a href="#">Contact Us</a>
                        <a href="#">About Us</a>
                        <a href="#">Careers</a>
                        <a href="#">Clientele</a>
                        <a href="#">Community Development</a>
                        <div class="social-icons ms-3">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    
    <script>
        // Check if device is mobile
        function isMobile() {
            return window.innerWidth <= 992;
        }

        // Financial Chart
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('turnoverChart');
            if (!canvas) return; // Exit if canvas not found

            const ctx = canvas.getContext('2d');

            // Chart data
            const years = ['2019-20', '2020-21', '2021-22', '2022-23', '2023-24'];
            const turnover = [4800, 5200, 6200, 7100, 8200];

            // Chart dimensions (will adapt to canvas element's responsive size)
            const chartWidth = canvas.width - 100;
            const chartHeight = canvas.height - 80;
            const startX = 50;
            const startY = 50;

            // Clear canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Set styles
            ctx.strokeStyle = '#0066ff';
            ctx.fillStyle = '#0066ff';
            ctx.lineWidth = 3;
            ctx.font = '12px Arial';

            // Draw axes
            ctx.beginPath();
            ctx.moveTo(startX, startY);
            ctx.lineTo(startX, startY + chartHeight);
            ctx.lineTo(startX + chartWidth, startY + chartHeight);
            ctx.strokeStyle = '#fff';
            ctx.lineWidth = 1;
            ctx.stroke();

            // Calculate points
            const maxTurnover = Math.max(...turnover);
            const minTurnover = Math.min(...turnover);
            const range = maxTurnover - minTurnover;

            const points = turnover.map((value, index) => ({
                x: startX + (index * chartWidth) / (years.length - 1),
                y: startY + chartHeight - ((value - minTurnover) / range) * chartHeight
            }));

            // Draw line
            ctx.beginPath();
            ctx.strokeStyle = '#0066ff';
            ctx.lineWidth = 3;
            ctx.moveTo(points[0].x, points[0].y);

            for (let i = 1; i < points.length; i++) {
                ctx.lineTo(points[i].x, points[i].y);
            }
            ctx.stroke();

            // Draw points and labels
            ctx.fillStyle = '#ff7700';
            points.forEach((point, index) => {
                // Draw point
                ctx.beginPath();
                ctx.arc(point.x, point.y, 5, 0, 2 * Math.PI);
                ctx.fill();

                // Draw year label
                ctx.fillStyle = '#fff';
                ctx.textAlign = 'center';
                ctx.fillText(years[index], point.x, startY + chartHeight + 20);

                // Draw value label
                ctx.fillText(`₹${turnover[index]}`, point.x, point.y - 10);
                ctx.fillStyle = '#ff7700';
            });

            // Y-axis labels
            ctx.fillStyle = '#fff';
            ctx.textAlign = 'right';
            for (let i = 0; i <= 5; i++) {
                const value = minTurnover + (range * i) / 5;
                const y = startY + chartHeight - (i * chartHeight) / 5;
                ctx.fillText(`₹${Math.round(value)}`, startX - 10, y + 5);
            }
        });

        // Awards slider auto-scroll
        const awardsSlider = document.getElementById('awardsSlider');
        if (awardsSlider) {
            awardsSlider.addEventListener('mouseenter', () => {
                awardsSlider.style.animationPlayState = 'paused';
            });
            awardsSlider.addEventListener('mouseleave', () => {
                awardsSlider.style.animationPlayState = 'running';
            });
        }

        // SCROLL ANIMATION FUNCTIONALITY (Desktop Only)
        document.addEventListener("DOMContentLoaded", () => {
            if (isMobile()) {
                // Enable smooth scroll for navbar links on mobile
                document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
                    link.addEventListener('click', function(e) {
                        const href = this.getAttribute('href');
                        if (href && href.startsWith('#')) {
                            e.preventDefault();
                            const targetId = href.substring(1);
                            const targetElement = document.getElementById(targetId);
                            if (targetElement) {
                                targetElement.scrollIntoView({ behavior: 'smooth' });
                            }
                        }
                    });
                });
                return; // Exit if mobile, desktop scroll logic won't apply
            }

            const scrollContainer = document.getElementById("scrollContainer");
            const sections = document.querySelectorAll(".scroll-section");
            const scrollDots = document.querySelectorAll(".scroll-dot");
            let currentSection = 0;
            let isScrolling = false;

            // Hammer.js setup for desktop
            const hammer = new Hammer(document.body, {
                recognizers: [
                    [Hammer.Pan, { direction: Hammer.DIRECTION_VERTICAL }],
                    [Hammer.Swipe, { direction: Hammer.DIRECTION_VERTICAL }]
                ]
            });

            // Update scroll indicators
            function updateScrollDots() {
                scrollDots.forEach((dot, index) => {
                    dot.classList.toggle("active", index === currentSection);
                });
            }

            // Scroll to specific section
            function scrollToSection(index) {
                if (isScrolling || index < 0 || index >= sections.length) return;
                
                isScrolling = true;
                currentSection = index;
                
                const translateY = -index * 100;
                scrollContainer.style.transform = `translateY(${translateY}vh)`;
                
                updateScrollDots();
                
                setTimeout(() => {
                    isScrolling = false;
                }, 800);
            }

            // Enhanced wheel event with better trackpad support
            let wheelTimeout;
            let wheelDelta = 0;
            
            document.addEventListener("wheel", (e) => {
                e.preventDefault();
                
                if (isScrolling) return;
                
                wheelDelta += e.deltaY;
                
                clearTimeout(wheelTimeout);
                wheelTimeout = setTimeout(() => {
                    const threshold = 100;
                    
                    if (Math.abs(wheelDelta) > threshold) {
                        if (wheelDelta > 0 && currentSection < sections.length - 1) {
                            scrollToSection(currentSection + 1);
                        } else if (wheelDelta < 0 && currentSection > 0) {
                            scrollToSection(currentSection - 1);
                        }
                    }
                    
                    wheelDelta = 0;
                }, 150);
            }, { passive: false });

            // Hammer.js events for desktop
            let panStartY = 0;
            let panDeltaY = 0;

            hammer.on('panstart', (e) => {
                panStartY = e.center.y;
                panDeltaY = 0;
            });

            hammer.on('panmove', (e) => {
                panDeltaY = e.center.y - panStartY;
            });

            hammer.on('panend', (e) => {
                const threshold = 80;
                
                if (Math.abs(panDeltaY) > threshold && !isScrolling) {
                    if (panDeltaY > 0 && currentSection > 0) {
                        scrollToSection(currentSection - 1);
                    } else if (panDeltaY < 0 && currentSection < sections.length - 1) {
                        scrollToSection(currentSection + 1);
                    }
                }
            });

            hammer.on('swipeup', () => {
                if (!isScrolling && currentSection < sections.length - 1) {
                    scrollToSection(currentSection + 1);
                }
            });

            hammer.on('swipedown', () => {
                if (!isScrolling && currentSection > 0) {
                    scrollToSection(currentSection - 1);
                }
            });

            // Scroll dot click handlers
            scrollDots.forEach((dot, index) => {
                dot.addEventListener("click", () => {
                    scrollToSection(index);
                });
            });

            // Keyboard navigation
            document.addEventListener("keydown", (e) => {
                if (isScrolling) return;
                
                switch (e.key) {
                    case "ArrowDown":
                    case "PageDown":
                    case " ": // Spacebar
                        e.preventDefault();
                        if (currentSection < sections.length - 1) {
                            scrollToSection(currentSection + 1);
                        }
                        break;
                    case "ArrowUp":
                    case "PageUp":
                        e.preventDefault();
                        if (currentSection > 0) {
                            scrollToSection(currentSection - 1);
                        }
                        break;
                    case "Home":
                        e.preventDefault();
                        scrollToSection(0);
                        break;
                    case "End":
                        e.preventDefault();
                        scrollToSection(sections.length - 1);
                        break;
                }
            });

            // Initialize
            updateScrollDots();
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(46, 46, 46, 0.9)';
            } else {
                navbar.style.background = 'rgba(46, 46, 46, 0.25)';
            }
        });
    </script>
</body>
</html>
