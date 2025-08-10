<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R&C - Services</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Hammer.js for touch gestures -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>

    <style>
        /* Consistent Root Variables from Projects Page */
        :root {
            --orange-default: #ff7700;
            --orange-darker: #e66700;
            --blue-default: #0066ff;
            --blue-light: rgba(0, 102, 255, 0.1);
            --dark-background: #1a1a1a;
            --navbar-bg-initial: rgba(46, 46, 46, 0.25);
            --navbar-bg-scrolled: rgba(46, 46, 46, 0.9);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--dark-background);
            overflow-x: hidden;
            overflow-y: hidden; /* Default to hidden for desktop scroll-wrapper */
            font-family: sans-serif; /* Fallback font */
        }

        /* Navbar Styles (Consistent with Projects Page) */
        .navbar {
            background: var(--navbar-bg-initial);
            backdrop-filter: blur(4px);
            z-index: 1000;
            position: fixed;
            top: 0;
            width: 100%;
            transition: background 0.3s ease;
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
            color: var(--orange-default) !important;
        }

        .nav-link.active { /* Specific for Services page active link */
            color: var(--orange-default) !important;
        }

        .navbar-toggler {
            color: white;
        }

        .navbar-toggler-icon {
            filter: invert();
        }

        /* Scroll Container (Consistent with Projects Page) */
        .scroll-wrapper {
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .scroll-container {
            height: 100vh;
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Section Styling (Consistent with Projects Page) */
        .scroll-section {
            height: 100vh;
            width: 100vw;
            position: relative; /* Needed for absolute positioning of overlay/footer */
            display: flex;
            flex-direction: column;
            background-color: var(--dark-background); /* Solid dark background for all sections */
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            justify-content: center; /* Center content vertically */
            align-items: center; /* Center content horizontally */
            text-align: center;
            color: white;
        }

        /* Intro Section Specifics */
        #services-intro {
            background-image: url('./imgs/2.jpeg'); /* Updated image URL */
        }

        #services-intro::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            z-index: 1;
        }

        #services-intro .content-wrapper {
            position: relative;
            z-index: 2;
            padding-top: 80px; /* Account for fixed navbar */
        }

        /* Backgrounds for dynamically generated sections */
        .scroll-section.service-group-section {
            background-image: url('https://images.unsplash.com/photo-1505798577917-f62c70567924?q=80&w=2070');
        }
        .scroll-section.tool-group-section, #safety-summary-section {
            background-image: url('https://images.unsplash.com/photo-1517030120962-f2648047757f?q=80&w=2070');
        }

        /* Overlay for content within sections that have background images */
        .scroll-section .full-height-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            z-index: 1; /* Ensure it's above the background image */
        }

        /* Layout for sections with a header and a main content body */
        .section-header-content {
            height: 20vh; /* Fixed height for the header part */
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 20px; /* Horizontal padding */
            color: white;
            position: relative; /* For z-index context */
            z-index: 2; /* Ensure content is above overlay */
            margin-top: 12%; /* Add some top margin for spacing */
        }

        .section-body-content {
            height: 80vh; /* Remaining height for the main content */
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px; /* Horizontal padding */
            position: relative; /* For z-index context */
            z-index: 2; /* Ensure content is above overlay */
        }

        /* Ensure no gaps between columns within the section-body-content */
        .section-body-content .row {
            width: 100%;
            height: 100%; /* Make row fill section-body-content */
            margin: 0; /* Remove default row margins */
        }
        .section-body-content .col-12,
        .section-body-content .col-md-6,
        .section-body-content .col-lg-4 {
            padding: 0; /* Remove default column padding */
            height: 100%; /* Make column fill row height */
            display: flex; /* Use flex to center content within column */
            justify-content: center;
            align-items: center;
        }

        /* Glass Card Styles (Self-contained) */
        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
        }

        /* Service Card Specifics */
        .service-card {
            padding: 2rem;
            width: 100%; /* Make card fill its column */
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            /* height: auto; Let content define height, centered by parent col */
        }
        .service-card .initial-content {
            transition: opacity 0.4s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
        }
        .service-card .icon-wrapper {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: rgba(0, 102, 255, 0.2); /* Blue from logo with transparency */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            border: 2px solid var(--blue-default); /* Blue from logo */
        }
        .service-card .icon-wrapper i {
            font-size: 2.5rem;
            color: var(--orange-default); /* Orange from logo */
        }
        .service-card h4 {
            color: var(--orange-default); /* Orange from logo */
            margin-bottom: 1rem;
        }
        .service-card p {
            font-size: 0.95rem;
            line-height: 1.6;
            flex-grow: 1; /* Allows summary to take available space */
        }
        .service-card .description-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 102, 255, 0.9); /* Blue from logo with transparency */
            border-radius: 16px; /* Match card border-radius */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
            opacity: 0;
            transform: translateY(100%); /* Start off-screen */
            transition: opacity 0.4s ease, transform 0.4s ease;
            color: white; /* Ensure text is white on blue background */
        }
        .service-card:hover .initial-content {
            opacity: 0; /* Hide initial content */
        }
        .service-card:hover .description-overlay {
            opacity: 1;
            transform: translateY(0); /* Slide in */
        }
        .description-overlay h4 {
            color: var(--orange-default); /* Orange for title in overlay */
            margin-bottom: 1rem;
        }
        .description-overlay p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        .description-overlay .btn-link {
            color: white; /* White link on blue background */
            text-decoration: none;
            font-weight: 600;
            border: 1px solid white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .description-overlay .btn-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            text-decoration: none;
        }

        /* Technical Tools & Processes Specifics */
        .tool-logo-item {
            padding: 1.5rem;
            width: 200px; /* Increased size */
            height: 200px; /* Increased size */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .tool-logo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        .tool-logo-item img {
            max-width: 110px; /* Increased image size */
            max-height: 110px; /* Increased image size */
            filter: brightness(0) invert(1); /* Makes logos white for dark theme */
            margin-bottom: 0.5rem;
        }
        .tool-logo-item p {
            font-size: 1rem;
            color: #ccc;
        }
        .safety-summary {
            padding: 2rem;
            background: rgba(0, 102, 255, 0.1); /* Blue from logo with transparency */
            border-radius: 16px;
            border: 1px solid var(--blue-default); /* Blue from logo */
            text-align: center;
            max-width: 700px; /* Limit width for readability */
            margin: auto; /* Center summary within its section */
        }
        .safety-summary h4 {
            color: var(--orange-default); /* Orange from logo */
            margin-bottom: 1rem;
        }

        /* Footer (Consistent with Projects Page) */
        .footer-nav-glass {
            position: absolute; /* Position absolutely within the last scroll-section */
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px 0;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 9999; /* Ensure it's on top */
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

        /* Scroll Indicators (Consistent with Projects Page) */
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
            background: var(--orange-default);
            transform: scale(1.3);
        }

        .scroll-dot:hover {
            background: rgba(255, 255, 255, 0.6);
        }

        /* Mobile Responsive (Consistent with Projects Page) */
        @media (max-width: 992px) {
            body {
                overflow-y: auto !important; /* Enable natural scrolling on mobile */
            }

            .scroll-wrapper {
                height: auto !important; /* Allow natural height on mobile */
                overflow: visible !important; /* Allow content to overflow and enable scrolling */
                position: relative !important; /* Revert to relative positioning */
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
                height: auto !important; /* Allow sections to take natural height */
                padding-top: 80px; /* Account for fixed navbar */
                padding-bottom: 20px; /* Add some bottom padding */
                display: flex !important; /* Keep flex for centering content */
                flex-direction: column;
                width: 100%; /* Ensure full width */
            }

            #services-intro .content-wrapper {
                padding-top: 0 !important; /* No extra padding as section handles it */
            }

            .full-height-overlay {
                height: auto !important; /* Allow overlay to take natural height on mobile */
                justify-content: flex-start !important; /* Align content to top on mobile */
                position: relative !important; /* Crucial: Make it relative on mobile */
                padding-top: 1rem; /* Add some top padding to separate from header if no header is present */
                padding-bottom: 1rem; /* Add some bottom padding */
            }

            /* Mobile adjustments for sections with header and body content */
            .section-header-content {
                height: auto !important; /* Allow header to take natural height */
                padding-top: 1rem; /* Add some top padding for mobile headers */
                padding-bottom: 0.5rem;
            }
            .section-body-content {
                height: auto !important; /* Revert to auto height for mobile */
                padding-bottom: 1rem; /* Adjust padding for mobile content */
                flex-direction: column; /* Stack cards/tools vertically on mobile */
            }
            .section-body-content .col-12,
            .section-body-content .col-md-6,
            .section-body-content .col-lg-4 {
                padding: 0.5rem !important; /* Add back some padding between cards on mobile */
                width: 100% !important; /* Ensure columns take full width on mobile */
                height: auto !important; /* Allow cards to take natural height */
            }

            /* Responsive adjustments for cards/logos */
            .service-card {
                padding: 1.5rem;
                width: 100%; /* Allow full width on mobile */
                height: auto !important; /* Allow card to take natural height on mobile */
            }
            .service-card .icon-wrapper {
                width: 60px;
                height: 60px;
            }
            .service-card .icon-wrapper i {
                font-size: 2rem;
            }
            .tool-logo-item {
                width: 120px;
                height: 120px;
                padding: 1rem;
            }
            .tool-logo-item img {
                max-width: 60px;
                max-height: 60px;
            }
            .safety-summary {
                max-width: 100%; /* Allow full width on mobile */
            }

            /* Footer on Mobile */
            .footer-nav-glass {
                position: relative !important; /* Revert to relative positioning on mobile */
                bottom: auto !important;
            }
        }

        @media (max-width: 576px) {
            .scroll-section {
                padding: 80px 15px 15px 15px;
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
    <!-- Scroll Indicators (Desktop Only) -->
    <div class="scroll-indicators">
        <!-- Dots will be dynamically generated by JavaScript -->
    </div>

    <!-- Desktop Scroll Container -->
    <div class="scroll-wrapper">
        <div class="scroll-container" id="scrollContainer">
            <!-- Intro Section -->
            <section id="services-intro" class="scroll-section">
                <div class="content-wrapper">
                    <div class="container text-center position-relative z-2">
                        <h1 class="display-2 fw-bold mb-4">Our Capabilities</h1>
                        <p class="lead fs-4">Delivering comprehensive construction and infrastructure solutions with excellence.</p>
                    </div>
                </div>
            </section>

            <!-- Dynamic Service and Tool Sections will be injected here by JavaScript -->

            <!-- Footer will be injected into the last dynamically created section -->
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

    <script>
        // Data for Services
        const servicesData = [
            {
                id: 'residential',
                name: "Residential Construction",
                summary: "Building modern and sustainable homes, apartments, and residential complexes.",
                description: "Our expertise spans from custom-built luxury homes to large-scale residential complexes, focusing on modern design, sustainable practices, and superior craftsmanship. We ensure every residential project meets the highest standards of quality and comfort.",
                icon: "fas fa-home"
            },
            {
                id: 'commercial',
                name: "Commercial & Office Spaces",
                summary: "Constructing state-of-the-art commercial buildings, offices, and retail centers.",
                description: "We specialize in creating functional and aesthetically pleasing commercial environments, including office buildings, retail spaces, and mixed-use developments, designed to enhance productivity and client experience.",
                icon: "fas fa-building"
            },
            {
                id: 'design-build',
                name: "Design-Build Services",
                summary: "Integrated design and construction services for seamless project execution.",
                description: "Our integrated approach combines design and construction under one roof, streamlining the project lifecycle, reducing risks, and ensuring cost-effectiveness and timely delivery from concept to completion.",
                icon: "fas fa-drafting-compass"
            },
            {
                id: 'civil-structural',
                name: "Civil & Structural Engineering",
                summary: "Expertise in foundational civil works and robust structural designs for all projects.",
                description: "We provide comprehensive civil and structural engineering solutions, from foundational analysis and design to complex structural frameworks, ensuring safety, durability, and compliance with all regulatory standards.",
                icon: "fas fa-hard-hat"
            },
            {
                id: 'renovation',
                name: "Renovation & Retrofitting",
                summary: "Modernizing existing structures with advanced techniques and sustainable materials.",
                description: "Our renovation and retrofitting services breathe new life into existing buildings, enhancing their functionality, energy efficiency, and aesthetic appeal while preserving their structural integrity and historical value.",
                icon: "fas fa-paint-roller"
            },
            {
                id: 'interior-fit-out',
                name: "Interior Fit-Out",
                summary: "Delivering complete interior solutions from design to execution for various spaces.",
                description: "From conceptual design to final execution, we offer complete interior fit-out services for commercial, residential, and hospitality spaces, creating bespoke interiors that reflect client vision and functional needs.",
                icon: "fas fa-couch"
            },
            {
                id: 'project-management',
                name: "Project Management",
                summary: "Efficient oversight and coordination of projects from inception to completion.",
                description: "Our expert project management ensures seamless coordination, strict adherence to timelines and budgets, and effective risk mitigation, guaranteeing successful project delivery from initiation to closeout.",
                icon: "fas fa-tasks"
            },
            {
                id: 'turnkey',
                name: "Turnkey Execution",
                summary: "Comprehensive solutions handling every aspect of your project from start to finish.",
                description: "We offer comprehensive turnkey solutions, managing every phase of your project from initial concept and design to construction, commissioning, and handover, providing a single point of responsibility and maximum convenience.",
                icon: "fas fa-key"
            }
        ];

        // Data for Technical Tools
        const toolsData = [
            { name: "AutoCAD", image: "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Autodesk_AutoCAD_logo.svg/1200px-Autodesk_AutoCAD_logo.svg.png" },
            { name: "Revit (BIM)", image: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Autodesk_Revit_logo.svg/1200px-Autodesk_Revit_logo.svg.png" },
            { name: "Primavera P6", image: "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Oracle_Primavera_P6_logo.svg/1200px-Oracle_Primavera_P6_logo.svg.png" },
            { name: "SAP ERP", image: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/SAP_2011_logo.svg/1200px-SAP_2011_logo.svg.png" },
            { name: "Trimble", image: "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Trimble_logo.svg/1200px-Trimble_logo.svg.png" },
            { name: "Bentley Systems", image: "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/Bentley_Systems_logo.svg/1200px-Bentley_Systems_logo.svg.png" }
        ];

        let currentSection = 0; // Tracks the current section index for desktop scroll
        let isScrolling = false; // Prevents multiple scrolls at once
        let hammerInstance = null; // Hammer.js instance
        let wheelTimeout; // Debounce for wheel events
        let wheelDelta = 0; // Accumulates wheel delta

        const scrollContainer = document.getElementById("scrollContainer");
        const scrollIndicatorsContainer = document.querySelector(".scroll-indicators");

        function isMobile() {
            return window.innerWidth <= 992;
        }

        function updateScrollDots() {
            scrollIndicatorsContainer.innerHTML = ''; // Clear existing dots
            const sections = document.querySelectorAll(".scroll-section"); // Count all sections
            sections.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.classList.add('scroll-dot');
                dot.dataset.section = index;
                if (index === currentSection) {
                    dot.classList.add('active');
                }
                dot.addEventListener('click', () => scrollToSection(index));
                scrollIndicatorsContainer.appendChild(dot);
            });
        }

        function scrollToSection(index) {
            const sections = Array.from(document.querySelectorAll(".scroll-section"));
            if (isScrolling || index < 0 || index >= sections.length) return;

            isScrolling = true;
            currentSection = index;

            const translateY = -index * 100;
            scrollContainer.style.transform = `translateY(${translateY}vh)`;

            updateScrollDots();

            setTimeout(() => {
                isScrolling = false;
            }, 800); // Match CSS transition duration
        }

        function handleWheel(e) {
            e.preventDefault();
            if (isScrolling) return;

            wheelDelta += e.deltaY;
            clearTimeout(wheelTimeout);
            wheelTimeout = setTimeout(() => {
                const threshold = 100;
                if (Math.abs(wheelDelta) > threshold) {
                    if (wheelDelta > 0) {
                        scrollToSection(currentSection + 1);
                    } else {
                        scrollToSection(currentSection - 1);
                    }
                }
                wheelDelta = 0;
            }, 150);
        }

        function handleKeyDown(e) {
            if (isScrolling) return;

            const sections = Array.from(document.querySelectorAll(".scroll-section"));
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
        }

        function handleMobileNavLinkClick(e) {
            const href = this.getAttribute('href');
            if (href && href.startsWith('#')) {
                e.preventDefault();
                const targetId = href.substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }
        }

        function setupDesktopScroll() {
            if (hammerInstance) {
                hammerInstance.destroy(); // Destroy existing instance if any
            }
            hammerInstance = new Hammer(document.body, {
                recognizers: [
                    [Hammer.Pan, { direction: Hammer.DIRECTION_VERTICAL }],
                    [Hammer.Swipe, { direction: Hammer.DIRECTION_VERTICAL }]
                ]
            });

            let panStartY = 0;
            let panDeltaY = 0;

            hammerInstance.on('panstart', (e) => { panStartY = e.center.y; panDeltaY = 0; });
            hammerInstance.on('panmove', (e) => { panDeltaY = e.center.y - panStartY; });
            hammerInstance.on('panend', (e) => {
                const threshold = 80;
                if (Math.abs(panDeltaY) > threshold && !isScrolling) {
                    if (panDeltaY > 0) { scrollToSection(currentSection - 1); }
                    else if (panDeltaY < 0) { scrollToSection(currentSection + 1); }
                }
            });
            hammerInstance.on('swipeup', () => { if (!isScrolling) { scrollToSection(currentSection + 1); } });
            hammerInstance.on('swipedown', () => { if (!isScrolling) { scrollToSection(currentSection - 1); } });

            document.addEventListener("wheel", handleWheel, { passive: false });
            document.addEventListener("keydown", handleKeyDown);
        }

        function removeDesktopScrollListeners() {
            if (hammerInstance) {
                hammerInstance.destroy();
                hammerInstance = null;
            }
            document.removeEventListener("wheel", handleWheel);
            document.removeEventListener("keydown", handleKeyDown);
            clearTimeout(wheelTimeout);
        }

        function renderContentSections() {
            // Remove all existing dynamic sections (keep intro)
            const existingDynamicSections = document.querySelectorAll('.scroll-section:not(#services-intro)');
            existingDynamicSections.forEach(section => section.remove());

            // --- Render Service Sections (3 cards per section, header only on first group) ---
            for (let i = 0; i < servicesData.length; i += 3) {
                const section = document.createElement('section');
                section.id = `services-group-${Math.floor(i / 3) + 1}`;
                section.classList.add('scroll-section', 'service-group-section');

                let headerHtml = '';
                if (i === 0) { // Only add header to the first service group section
                    headerHtml = `
                        <div class="section-header-content">
                            <div class="container">
                                <h2 class="display-5 fw-bold">Our Services</h2>
                                <p class="lead">Innovative solutions tailored to your project needs.</p>
                            </div>
                        </div>
                    `;
                }

                const serviceCard1 = servicesData[i];
                const serviceCard2 = servicesData[i + 1];
                const serviceCard3 = servicesData[i + 2];

                section.innerHTML = `
                    <div class="full-height-overlay">
                        ${headerHtml}
                        <div class="section-body-content">
                            <div class="container-fluid h-100">
                                <div class="row g-0 h-100">
                                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center">
                                        <div class="service-card glass-card">
                                            <div class="initial-content">
                                                <div class="icon-wrapper">
                                                    <i class="${serviceCard1.icon}"></i>
                                                </div>
                                                <h4>${serviceCard1.name}</h4>
                                                <p>${serviceCard1.summary}</p>
                                            </div>
                                            <div class="description-overlay">
                                                <h4>${serviceCard1.name}</h4>
                                                <p>${serviceCard1.description}</p>
                                                <a href="projects.html" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    ${serviceCard2 ? `
                                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center">
                                        <div class="service-card glass-card">
                                            <div class="initial-content">
                                                <div class="icon-wrapper">
                                                    <i class="${serviceCard2.icon}"></i>
                                                </div>
                                                <h4>${serviceCard2.name}</h4>
                                                <p>${serviceCard2.summary}</p>
                                            </div>
                                            <div class="description-overlay">
                                                <h4>${serviceCard2.name}</h4>
                                                <p>${serviceCard2.description}</p>
                                                <a href="projects.html" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    ` : '<div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center"></div>'}
                                    ${serviceCard3 ? `
                                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center">
                                        <div class="service-card glass-card">
                                            <div class="initial-content">
                                                <div class="icon-wrapper">
                                                    <i class="${serviceCard3.icon}"></i>
                                                </div>
                                                <h4>${serviceCard3.name}</h4>
                                                <p>${serviceCard3.summary}</p>
                                            </div>
                                            <div class="description-overlay">
                                                <h4>${serviceCard3.name}</h4>
                                                <p>${serviceCard3.description}</p>
                                                <a href="projects.html" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    ` : '<div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center"></div>'}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                scrollContainer.appendChild(section);
            }

            // --- Render Tool Sections (3 tools per section, header only on first group) ---
            for (let i = 0; i < toolsData.length; i += 3) {
                const section = document.createElement('section');
                section.id = `tools-group-${Math.floor(i / 3) + 1}`;
                section.classList.add('scroll-section', 'tool-group-section');

                let headerHtml = '';
                if (i === 0) { // Only add header to the first tool group section
                    headerHtml = `
                        <div class="section-header-content">
                            <div class="container">
                                <h2 class="display-5 fw-bold">Technical Tools & Processes</h2>
                                <p class="lead">Leveraging cutting-edge technology for precision and efficiency.</p>
                            </div>
                        </div>
                    `;
                }

                const toolItem1 = toolsData[i];
                const toolItem2 = toolsData[i + 1];
                const toolItem3 = toolsData[i + 2];

                section.innerHTML = `
                    <div class="full-height-overlay">
                        ${headerHtml}
                        <div class="section-body-content">
                            <div class="container-fluid h-100">
                                <div class="row g-0 h-100">
                                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center">
                                        <div class="tool-logo-item glass-card">
                                            <p>${toolItem1.name}</p>
                                        </div>
                                    </div>
                                    ${toolItem2 ? `
                                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center">
                                        <div class="tool-logo-item glass-card">
                                            <p>${toolItem2.name}</p>
                                        </div>
                                    </div>
                                    ` : '<div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center"></div>'}
                                    ${toolItem3 ? `
                                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center">
                                        <div class="tool-logo-item glass-card">
                                            <p>${toolItem3.name}</p>
                                        </div>
                                    </div>
                                    ` : '<div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center align-items-center"></div>'}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                scrollContainer.appendChild(section);
            }

            // Render Safety Summary Section (always has its own header)
            const safetySection = document.createElement('section');
            safetySection.id = 'safety-summary-section';
            safetySection.classList.add('scroll-section');
            safetySection.innerHTML = `
                <div class="full-height-overlay">
                    <div class="section-header-content">
                        <div class="container">
                            <h2 class="display-5 fw-bold">Commitment to Safety & Quality</h2>
                            <p class="lead">Our unwavering dedication to excellence.</p>
                        </div>
                    </div>
                    <div class="section-body-content">
                        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
                            <div class="safety-summary glass-card">
                                <p>At R&C, safety is paramount. We adhere to the highest international safety standards and implement rigorous quality control processes across all our projects. Our commitment ensures a safe working environment and delivers superior results, every time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            scrollContainer.appendChild(safetySection);

            // Append Footer to the very last section
            const footerHtml = `
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
            `;
            safetySection.insertAdjacentHTML('beforeend', footerHtml);


            // Re-evaluate sections for desktop scroll and dots
            if (!isMobile()) {
                updateScrollDots();
                // Ensure we scroll to a valid section after rendering
                const newSections = Array.from(document.querySelectorAll(".scroll-section"));
                if (currentSection >= newSections.length) {
                    currentSection = newSections.length > 0 ? newSections.length - 1 : 0;
                }
                scrollToSection(currentSection);
            }

            // Re-observe sections for fade-in animation
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('section').forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(section);
            });
        }

        // Function to apply/remove desktop scroll behavior
        function applyScrollBehavior() {
            if (!isMobile()) {
                // Desktop: Enable full-page scroll
                document.body.style.overflowY = "hidden";
                scrollContainer.style.height = "100vh";
                scrollContainer.style.transition = "transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)";
                document.querySelector(".scroll-wrapper").style.height = "100vh";
                document.querySelector(".scroll-wrapper").style.overflow = "hidden";
                document.querySelector(".scroll-wrapper").style.position = "relative";
                scrollIndicatorsContainer.style.display = 'flex'; // Show dots

                setupDesktopScroll();
                renderContentSections(); // Render all content sections for desktop view
                scrollToSection(currentSection); // Ensure correct section is shown
            } else {
                // Mobile: Enable natural scroll
                document.body.style.overflowY = "auto";
                scrollContainer.style.height = "auto";
                scrollContainer.style.transform = "none";
                scrollContainer.style.transition = "none";
                document.querySelector(".scroll-wrapper").style.height = "auto";
                document.querySelector(".scroll-wrapper").style.overflow = "visible";
                document.querySelector(".scroll-wrapper").style.position = "relative";
                scrollIndicatorsContainer.style.display = 'none'; // Hide dots

                removeDesktopScrollListeners();
                renderContentSections(); // Render all content sections for mobile view
                
                // Enable smooth scroll for navbar links on mobile
                document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
                    link.removeEventListener('click', handleMobileNavLinkClick); // Prevent double attachment
                    link.addEventListener('click', handleMobileNavLinkClick);
                });
            }
        }

        // Initial setup on DOMContentLoaded
        document.addEventListener("DOMContentLoaded", () => {
            applyScrollBehavior(); // Apply initial behavior based on screen size
        });

        // Re-apply scroll behavior on window resize
        window.addEventListener('resize', applyScrollBehavior);
    </script>
</body>
</html>