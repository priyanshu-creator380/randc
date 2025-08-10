<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R&C - Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Hammer.js for touch gestures -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>

    <style>
        /* Consistent Root Variables from Projects/Services Page */
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

        /* Navbar Styles (Consistent with Projects/Services Page) */
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

        .nav-link.active { /* Specific for Contact page active link */
            color: var(--orange-default) !important;
        }

        .navbar-toggler {
            color: white;
        }

        .navbar-toggler-icon {
            filter: invert();
        }

        /* Scroll Container (Consistent with Projects/Services Page) */
        .scroll-wrapper {
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .scroll-container {
            height: 100vh;
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Section Styling (Consistent with Projects/Services Page) */
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
        #contact-intro {
            background-image: url('https://images.unsplash.com/photo-1523961131990-5ea7c61b2107?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
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
            justify-content: center; /* Center content vertically within overlay */
            align-items: center;
            z-index: 1; /* Ensure it's above the background image */
        }

        /* Specific styles for contact sections */
        .contact-section {
            background-color: var(--dark-background); /* Ensure consistent background */
            color: white;
            padding: 2rem 0; /* Add some padding for content */
        }

        /* Glass Card Styles (Consistent with Projects/Services Page) */
        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            height: 100%; /* Ensure cards fill their column height */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
        }

        .contact-info-card, .office-hours-card {
            padding: 2.5rem;
            width: 100%; /* Ensure cards take full width of their column */
        }
        .contact-info-card h2, .office-hours-card h2 {
            color: var(--orange-default);
            margin-bottom: 1.5rem;
            font-size: 2rem;
            font-weight: bold;
        }
        .contact-info-card p, .office-hours-card p {
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
        .contact-info-card i, .office-hours-card i {
            color: var(--blue-default);
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }

        /* Contact Form Card Specifics */
        .contact-form-card {
            padding: 2rem; /* Adjusted padding for smaller form */
            max-width: 650px; /* Increased max-width for the form */
            width: 100%; /* Ensure it's responsive */
        }
        .contact-form-card h2 {
            font-size: 1.8rem; /* Slightly smaller heading for compact form */
        }
        .contact-form .form-control, .contact-form .form-select {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 8px;
        }
        .contact-form .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .contact-form .form-control:focus, .contact-form .form-select:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: var(--blue-default);
            box-shadow: 0 0 0 0.25rem rgba(0, 102, 255, 0.25);
            color: white;
        }
        .contact-form .btn-primary {
            background-color: var(--orange-default);
            border-color: var(--orange-default);
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .contact-form .btn-primary:hover {
            background-color: var(--orange-darker);
            border-color: var(--orange-darker);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 119, 0, 0.3);
        }
        .map-container {
            height: 300px;
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
        .whatsapp-cta {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
        .whatsapp-cta .btn {
            background-color: #25D366;
            border-color: #25D366;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        .whatsapp-cta .btn:hover {
            background-color: #1DA851;
            border-color: #1DA851;
            transform: scale(1.1);
        }
        .whatsapp-qr-code {
            background: rgba(255, 255, 255, 0.9);
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            position: absolute;
            bottom: 70px;
            right: 0;
            display: none;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            color: #333;
        }
        .whatsapp-qr-code.show {
            display: flex;
        }
        .whatsapp-qr-code img {
            width: 100px;
            height: 100px;
        }
        .whatsapp-qr-code p {
            font-size: 0.85rem;
            margin: 0;
        }

        /* Footer (Consistent with Projects/Services Page) */
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

        /* Scroll Indicators (Consistent with Projects/Services Page) */
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

        /* Mobile Responsive (Consistent with Projects/Services Page) */
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

            #contact-intro .content-wrapper {
                padding-top: 0 !important; /* No extra padding as section handles it */
            }

            .full-height-overlay {
                height: auto !important; /* Allow overlay to take natural height on mobile */
                justify-content: flex-start !important; /* Align content to top on mobile */
                position: relative !important; /* Crucial: Make it relative on mobile */
                padding-top: 1rem; /* Add some top padding to separate from header if no header is present */
                padding-bottom: 1rem; /* Add some bottom padding */
            }

            /* Mobile adjustments for cards */
            .contact-info-card, .office-hours-card {
                margin-bottom: 1.5rem; /* Add spacing between stacked cards */
                padding: 1.5rem;
                height: auto !important; /* Allow cards to take natural height */
            }
            .map-container {
                height: 250px;
                margin-bottom: 1.5rem;
            }
            .whatsapp-cta .btn {
                width: 50px;
                height: 50px;
                font-size: 1.75rem;
            }
            .whatsapp-qr-code {
                bottom: 60px;
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

            #contact-intro .display-2 {
                font-size: 2.5rem;
            }
            #contact-intro .lead {
                font-size: 1.2rem;
            }
            .contact-info-card h2, .contact-form-card h2, .office-hours-card h2 {
                font-size: 1.5rem;
            }
            .contact-info-card p, .office-hours-card p {
                font-size: 1rem;
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
            <section id="contact-intro" class="scroll-section">
                <div class="full-height-overlay">
                    <div class="container">
                        <h1 class="display-2 fw-bold mb-4">Get in Touch</h1>
                        <p class="lead fs-4">We're here to answer your questions and help with your next project.</p>
                    </div>
                </div>
            </section>

            <!-- Map Section -->
            <section id="map-section" class="scroll-section contact-section">
                <div class="full-height-overlay">
                    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
                        <h2 class="text-center mb-4">📍 Our Location</h2>
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0193450000003!2d144.9631!3d-37.814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b05d2c2d01%3A0x504567846297620!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1678901234567!5m2!1sen!2sau" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Merged Contact Details Section (Office & Hours) -->
            <section id="contact-details-section" class="scroll-section contact-section">
                <div class="full-height-overlay">
                    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
                        <div class="row justify-content-center w-100">
                            <div class="col-md-6 mb-4 mb-md-0 d-flex">
                                <div class="contact-info-card glass-card flex-grow-1">
                                    <h2>Our Office</h2>
                                    <p><i class="fas fa-map-marker-alt"></i> 123 Construction Blvd, City, State, 12345</p>
                                    <p><i class="fas fa-phone-alt"></i> +1 (555) 123-4567</p>
                                    <p><i class="fas fa-envelope"></i> info@randcprojects.com</p>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="office-hours-card glass-card flex-grow-1">
                                    <h2>🕘 Office Hours</h2>
                                    <p><i class="fas fa-calendar-alt"></i> Monday - Friday: 9:00 AM - 5:00 PM</p>
                                    <p><i class="fas fa-clock"></i> Saturday: 10:00 AM - 2:00 PM</p>
                                    <p><i class="fas fa-times-circle"></i> Sunday: Closed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Form Section (Redesigned and Smaller) -->
            <section id="contact-form-section" class="scroll-section contact-section">
                <div class="full-height-overlay">
                    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
                        <div class="contact-form-card glass-card" style="height: 60%">
                            <h2 class="text-center mb-4">📬 Send Us a Message</h2>
                            <form class="contact-form row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label visually-hidden">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label visually-hidden">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label visually-hidden">Phone</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="Your Phone (Optional)">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="message" class="form-label visually-hidden">Message</label>
                                    <textarea class="form-control" id="message" rows="3" placeholder="Your Message" required></textarea>
                                </div>
                                <div class="col-12 d-grid">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="whatsapp-cta">
        <button class="btn" id="whatsapp-btn" aria-label="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </button>
        <div class="whatsapp-qr-code" id="whatsapp-qr">
            <img src="/placeholder.svg?height=100&width=100" alt="WhatsApp QR Code">
            <p>Scan to chat on WhatsApp</p>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <script>
        let currentSection = 0; // Tracks the current section index for desktop scroll
        let isScrolling = false; // Prevents multiple scrolls at once
        let hammerInstance = null; // Hammer.js instance
        let wheelTimeout; // Debounce for wheel events
        let wheelDelta = 0; // Accumulates wheel delta

        const scrollContainer = document.getElementById("scrollContainer");
        const scrollIndicatorsContainer = document.querySelector(".scroll-indicators");
        const navbar = document.querySelector(".navbar");

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
            // Update navbar background based on section
            navbar.classList.toggle("scrolled", currentSection > 0);
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
            // Find the last scroll-section and append the footer
            const lastSection = document.querySelector('.scroll-section:last-of-type');
            if (lastSection) {
                // Remove existing footer if any to prevent duplicates on re-render
                const existingFooter = lastSection.querySelector('.footer-nav-glass');
                if (existingFooter) {
                    existingFooter.remove();
                }
                lastSection.insertAdjacentHTML('beforeend', footerHtml);
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

        // WhatsApp QR code toggle
        const whatsappBtn = document.getElementById('whatsapp-btn');
        const whatsappQr = document.getElementById('whatsapp-qr');
        whatsappBtn.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent closing QR when clicking button
            whatsappQr.classList.toggle('show');
        });
        document.addEventListener('click', (event) => {
            if (!whatsappQr.contains(event.target) && !whatsappBtn.contains(event.target)) {
                whatsappQr.classList.remove('show');
            }
        });

        // Initial setup on DOMContentLoaded
        document.addEventListener("DOMContentLoaded", () => {
            applyScrollBehavior(); // Apply initial behavior based on screen size
        });

        // Re-apply scroll behavior on window resize
        window.addEventListener('resize', applyScrollBehavior);
    </script>
</body>
</html>