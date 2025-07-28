<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R&C - About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000;
            overflow-x: hidden;
        }

        .navbar {
            background-color: transparent;
            background: rgba(46, 46, 46, 0.25);
            backdrop-filter: blur(4px);
            z-index: 1000;
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 0 20px 0;
            overflow-y: auto;
        }

        /* About Hero */
        #about-hero {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            padding: 0;
            overflow: hidden;
        }

        /* Company Journey */
        #company-journey {
            background: linear-gradient(135deg, #0f3460, #16537e);
        }

        .timeline-container {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline-item {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-year {
            background: #ff7700;
            color: white;
            padding: 1rem;
            border-radius: 50%;
            font-weight: bold;
            min-width: 80px;
            text-align: center;
            margin: 0 2rem;
            z-index: 2;
            position: relative;
        }

        .timeline-content {
            flex: 1;
            padding: 1.5rem;
            max-width: 300px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: -2rem;
            width: 2px;
            background: #ff7700;
            transform: translateX(-50%);
            z-index: 1;
        }

        .timeline-item:last-child::before {
            display: none;
        }

        /* Management Team */
        #management-team {
            background: linear-gradient(135deg, #2d1b69, #11998e);
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

        /* Global Presence */
        #global-presence {
            background: linear-gradient(135deg, #134e5e, #71b280);
        }

        .country-item {
            padding: 0.5rem 0;
            color: #fff;
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

        /* Financial Overview */
        #financial-overview {
            background: linear-gradient(135deg, #667db6, #0082c8);
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
            background: linear-gradient(135deg, #8360c3, #2ebf91);
        }

        .awards-slider-container {
            overflow: hidden;
            width: 100%;
        }

        .awards-slider {
            display: flex;
            animation: scroll 20s linear infinite;
            width: calc(300px * 14);
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
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-300px * 7)); }
        }

        /* Strategic Equipment */
        #strategic-equipment {
            background: linear-gradient(135deg, #fc4a1a, #f7b733);
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

        /* Investment & Turnover */
        #investment-turnover {
            background: linear-gradient(135deg, #667db6, #0082c8);
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

        .investment-list {
            list-style: none;
            padding: 0;
        }

        .investment-list li {
            padding: 0.5rem 0;
            color: #fff;
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
            position: relative;
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
        @media (max-width: 768px) {
            .scroll-indicators {
                display: none;
            }

            .timeline-item {
                flex-direction: column !important;
                text-align: center;
            }

            .timeline-year {
                margin: 1rem 0;
            }

            .timeline-content {
                max-width: 100%;
            }

            .timeline-item::before {
                display: none;
            }

            .nav-item {
                margin: 0px 1rem;
            }

            .scroll-section {
                padding: 100px 20px 20px 20px;
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
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid px-5 py-1 justify-content-center" style="width: 80%;">
            <a class="navbar-brand" href="index.php">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/logor_c-removebg-preview-jaaqsGkxz5kBoLckF9BMxkH6qBqRXa.png" alt="Logo" height="40" />
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="about.php">About</a>
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
    </div>

    <div class="scroll-wrapper">
        <div class="scroll-container" id="scrollContainer">

            <!-- Hero Section -->
            <section id="about-hero" class="scroll-section">
                <div class="container text-center position-relative z-2">
                    <h1 class="display-2 fw-bold mb-4 text-white">About R&C</h1>
                    <p class="lead fs-4 text-white">Building Tomorrow's Infrastructure Today</p>
                </div>
            </section>

            <!-- Company Journey Timeline -->
            <section id="company-journey" class="scroll-section">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-white">Our Journey</h2>
                        <p class="lead text-white">From Foundation to Present Day</p>
                    </div>
                    <div class="timeline-container">
                        <div class="timeline-item">
                            <div class="timeline-year">1978</div>
                            <div class="timeline-content glass-card">
                                <h4 class="text-white">Foundation</h4>
                                <p class="text-white">R&C was established with a vision to transform India's infrastructure landscape.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">1990</div>
                            <div class="timeline-content glass-card">
                                <h4 class="text-white">First Major Project</h4>
                                <p class="text-white">Completed our first major highway project, setting new standards in construction.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2005</div>
                            <div class="timeline-content glass-card">
                                <h4 class="text-white">International Expansion</h4>
                                <p class="text-white">Expanded operations to Africa and Middle East, taking Indian expertise global.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2015</div>
                            <div class="timeline-content glass-card">
                                <h4 class="text-white">Technology Integration</h4>
                                <p class="text-white">Adopted cutting-edge technology and sustainable construction practices.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2024</div>
                            <div class="timeline-content glass-card">
                                <h4 class="text-white">Present Day</h4>
                                <p class="text-white">Leading infrastructure company with projects across 15+ countries.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Management Team -->
            <section id="management-team" class="scroll-section">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-white">Leadership Team</h2>
                        <p class="lead text-white">Meet the visionaries behind our success</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card glass-card text-center">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200&h=200&fit=crop" alt="CEO" class="team-img mb-3">
                                <h4 class="text-white">Rajesh Kumar</h4>
                                <p class="designation">Chairman & Managing Director</p>
                                <p class="bio text-white">With over 30 years of experience in infrastructure development, Rajesh has led the company to new heights of success.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card glass-card text-center">
                                <img src="https://images.unsplash.com/photo-1494790108755-2616b332e234?q=80&w=200&h=200&fit=crop" alt="COO" class="team-img mb-3">
                                <h4 class="text-white">Priya Sharma</h4>
                                <p class="designation">Chief Operating Officer</p>
                                <p class="bio text-white">Priya oversees all operational aspects and has been instrumental in our international expansion strategy.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card glass-card text-center">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=200&h=200&fit=crop" alt="CTO" class="team-img mb-3">
                                <h4 class="text-white">Amit Patel</h4>
                                <p class="designation">Chief Technology Officer</p>
                                <p class="bio text-white">Leading our technology initiatives and digital transformation across all project verticals.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card glass-card text-center">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=200&h=200&fit=crop" alt="CFO" class="team-img mb-3">
                                <h4 class="text-white">Sunita Gupta</h4>
                                <p class="designation">Chief Financial Officer</p>
                                <p class="bio text-white">Managing financial strategy and investor relations with expertise in infrastructure financing.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card glass-card text-center">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=200&h=200&fit=crop" alt="Head Engineering" class="team-img mb-3">
                                <h4 class="text-white">Dr. Vikram Singh</h4>
                                <p class="designation">Head of Engineering</p>
                                <p class="bio text-white">Leading our engineering excellence with innovative solutions for complex infrastructure challenges.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card glass-card text-center">
                                <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&w=200&h=200&fit=crop" alt="Head International" class="team-img mb-3">
                                <h4 class="text-white">Sarah Johnson</h4>
                                <p class="designation">Head of International Operations</p>
                                <p class="bio text-white">Spearheading our global presence and managing international partnerships and projects.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Global Presence -->
            <section id="global-presence" class="scroll-section">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-white">Global Presence</h2>
                        <p class="lead text-white">Operating across continents, building the future</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="presence-map glass-card p-4">
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
                        <div class="col-lg-4">
                            <div class="presence-stats glass-card p-4">
                                <h4 class="mb-4 text-white">Global Stats</h4>
                                <div class="stat-item mb-3">
                                    <div class="stat-number">15+</div>
                                    <div class="stat-label">Countries</div>
                                </div>
                                <div class="stat-item mb-3">
                                    <div class="stat-number">50+</div>
                                    <div class="stat-label">Cities</div>
                                </div>
                                <div class="stat-item mb-3">
                                    <div class="stat-number">200+</div>
                                    <div class="stat-label">Active Projects</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">25,000+</div>
                                    <div class="stat-label">Employees</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Financial Overview -->
            <section id="financial-overview" class="scroll-section">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-white">Financial Performance</h2>
                        <p class="lead text-white">Consistent growth and financial stability</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="financial-chart glass-card p-4">
                                <h4 class="mb-4 text-white">Turnover Growth (₹ Crores)</h4>
                                <div class="chart-container">
                                    <canvas id="turnoverChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="financial-highlights glass-card p-4">
                                <h4 class="mb-4 text-white">Key Highlights</h4>
                                <div class="highlight-item mb-3">
                                    <div class="highlight-value">₹8,200 Cr</div>
                                    <div class="highlight-label">Current Turnover</div>
                                </div>
                                <div class="highlight-item mb-3">
                                    <div class="highlight-value">16%</div>
                                    <div class="highlight-label">YoY Growth</div>
                                </div>
                                <div class="highlight-item mb-3">
                                    <div class="highlight-value">₹15,000 Cr</div>
                                    <div class="highlight-label">Order Book</div>
                                </div>
                                <div class="highlight-item">
                                    <div class="highlight-value">AAA</div>
                                    <div class="highlight-label">Credit Rating</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Awards & Recognitions -->
            <section id="awards" class="scroll-section">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-white">Awards & Recognition</h2>
                        <p class="lead text-white">Excellence recognized globally</p>
                    </div>
                    <div class="awards-slider-container">
                        <div class="awards-slider" id="awardsSlider">
                            <div class="award-item glass-card">
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=100&h=100&fit=crop" alt="Award 1" class="award-logo">
                                <h5 class="text-white">Best Infrastructure Company</h5>
                                <p class="text-white">Construction World Awards 2023</p>
                            </div>
                            <div class="award-item glass-card">
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=100&h=100&fit=crop" alt="Award 2" class="award-logo">
                                <h5 class="text-white">Excellence in Engineering</h5>
                                <p class="text-white">Indian Engineering Excellence Awards 2023</p>
                            </div>
                            <div class="award-item glass-card">
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=100&h=100&fit=crop" alt="Award 3" class="award-logo">
                                <h5 class="text-white">Sustainability Champion</h5>
                                <p class="text-white">Green Construction Awards 2022</p>
                            </div>
                            <div class="award-item glass-card">
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=100&h=100&fit=crop" alt="Award 4" class="award-logo">
                                <h5 class="text-white">Innovation in Construction</h5>
                                <p class="text-white">Technology Excellence Awards 2022</p>
                            </div>
                            <div class="award-item glass-card">
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=100&h=100&fit=crop" alt="Award 5" class="award-logo">
                                <h5 class="text-white">Best Employer</h5>
                                <p class="text-white">Great Place to Work 2023</p>
                            </div>
                            <div class="award-item glass-card">
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=100&h=100&fit=crop" alt="Award 1" class="award-logo">
                                <h5 class="text-white">Best Infrastructure Company</h5>
                                <p class="text-white">Construction World Awards 2023</p>
                            </div>
                            <div class="award-item glass-card">
                                <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?q=80&w=100&h=100&fit=crop" alt="Award 2" class="award-logo">
                                <h5 class="text-white">Excellence in Engineering</h5>
                                <p class="text-white">Indian Engineering Excellence Awards 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Strategic Equipment -->
            <section id="strategic-equipment" class="scroll-section">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-white">Strategic Equipment</h2>
                        <p class="lead text-white">State-of-the-art machinery for complex projects</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="equipment-card glass-card">
                                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=300&h=200&fit=crop" alt="Tower Crane" class="equipment-img">
                                <div class="equipment-info p-3">
                                    <h5 class="text-white">Tower Cranes</h5>
                                    <p class="text-white">High-capacity tower cranes for high-rise construction and heavy lifting operations.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="equipment-card glass-card">
                                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=300&h=200&fit=crop" alt="Concrete Pump" class="equipment-img">
                                <div class="equipment-info p-3">
                                    <h5 class="text-white">Concrete Pumps</h5>
                                    <p class="text-white">Advanced concrete pumping systems for efficient and precise concrete placement.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="equipment-card glass-card">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=300&h=200&fit=crop" alt="TBM" class="equipment-img">
                                <div class="equipment-info p-3">
                                    <h5 class="text-white">Tunnel Boring Machines</h5>
                                    <p class="text-white">State-of-the-art TBMs for underground construction and tunneling projects.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="equipment-card glass-card">
                                <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=300&h=200&fit=crop" alt="Excavator" class="equipment-img">
                                <div class="equipment-info p-3">
                                    <h5 class="text-white">Heavy Excavators</h5>
                                    <p class="text-white">Large-scale excavators for earthwork and foundation construction.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="equipment-card glass-card">
                                <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=300&h=200&fit=crop" alt="Piling Rig" class="equipment-img">
                                <div class="equipment-info p-3">
                                    <h5 class="text-white">Piling Rigs</h5>
                                    <p class="text-white">Specialized piling equipment for deep foundation and marine construction.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="equipment-card glass-card">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=300&h=200&fit=crop" alt="Bridge Girder" class="equipment-img">
                                <div class="equipment-info p-3">
                                    <h5 class="text-white">Bridge Girder Launchers</h5>
                                    <p class="text-white">Precision equipment for bridge construction and girder installation.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Investment & Turnover -->
            <section id="investment-turnover" class="scroll-section">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2 class="display-5 fw-bold text-white">Investment & Growth</h2>
                        <p class="lead text-white">Strategic investments driving future growth</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-6">
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
                        <div class="col-lg-6">
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
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="growth-projections glass-card p-4 text-center">
                                <h4 class="mb-4 text-white">Growth Projections</h4>
                                <div class="row">
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
                </div>
            </section>

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-nav-glass">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    
    <script>
        // Financial Chart
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('turnoverChart');
            const ctx = canvas.getContext('2d');
                        
            // Chart data
            const years = ['2019-20', '2020-21', '2021-22', '2022-23', '2023-24'];
            const turnover = [4800, 5200, 6200, 7100, 8200];
                        
            // Chart dimensions
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
                
        awardsSlider.addEventListener('mouseenter', () => {
            awardsSlider.style.animationPlayState = 'paused';
        });
        awardsSlider.addEventListener('mouseleave', () => {
            awardsSlider.style.animationPlayState = 'running';
        });

        // SCROLL ANIMATION FUNCTIONALITY
        document.addEventListener("DOMContentLoaded", () => {
            const scrollContainer = document.getElementById("scrollContainer");
            const sections = document.querySelectorAll(".scroll-section");
            const scrollDots = document.querySelectorAll(".scroll-dot");
            let currentSection = 0;
            let isScrolling = false;

            // Update scroll indicators
            function updateScrollDots() {
                scrollDots.forEach((dot, index) => {
                    dot.classList.toggle("active", index === currentSection);
                });
            }

            // Scroll to specific section
            function scrollToSection(index) {
                if (isScrolling) return;
                
                isScrolling = true;
                currentSection = index;
                
                const translateY = -index * 100;
                scrollContainer.style.transform = `translateY(${translateY}vh)`;
                
                updateScrollDots();
                
                setTimeout(() => {
                    isScrolling = false;
                }, 800);
            }

            // Mouse wheel event handler
            let scrollTimeout;
            document.addEventListener("wheel", (e) => {
                e.preventDefault();
                
                if (isScrolling) return;
                
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    const delta = e.deltaY;
                    const threshold = 50;

                    if (Math.abs(delta) > threshold) {
                        if (delta > 0 && currentSection < sections.length - 1) {
                            // Scroll down - slide up
                            scrollToSection(currentSection + 1);
                        } else if (delta < 0 && currentSection > 0) {
                            // Scroll up - slide down
                            scrollToSection(currentSection - 1);
                        }
                    }
                }, 50);
            }, { passive: false });

            // Touch support for mobile
            let touchStartY = 0;
            let touchEndY = 0;

            document.addEventListener("touchstart", (e) => {
                touchStartY = e.changedTouches[0].screenY;
            });

            document.addEventListener("touchend", (e) => {
                touchEndY = e.changedTouches[0].screenY;
                handleSwipe();
            });

            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartY - touchEndY;

                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0 && currentSection < sections.length - 1) {
                        // Swipe up - go to next section
                        scrollToSection(currentSection + 1);
                    } else if (diff < 0 && currentSection > 0) {
                        // Swipe down - go to previous section
                        scrollToSection(currentSection - 1);
                    }
                }
            }

            // Scroll dot click handlers
            scrollDots.forEach((dot, index) => {
                dot.addEventListener("click", () => {
                    scrollToSection(index);
                });
            });

            // Navigation link handlers
            // const navLinks = document.querySelectorAll(".nav-link");
            // navLinks.forEach((link) => {
            //     link.addEventListener("click", function (e) {
            //         const href = this.getAttribute("href");
            //         if (href && href.startsWith("#")) {
            //             e.preventDefault();
            //             const targetSection = document.querySelector(href);
            //             if (targetSection) {
            //                 const sectionIndex = Array.from(sections).indexOf(targetSection);
            //                 if (sectionIndex !== -1) {
            //                     scrollToSection(sectionIndex);
            //                 }
            //             }
            //         }
            //     });
            // });

            // Keyboard navigation
            document.addEventListener("keydown", (e) => {
                switch (e.key) {
                    case "ArrowDown":
                    case "PageDown":
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
