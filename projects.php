<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R&C - Projects</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Hammer.js for touch gestures -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>

    <style>
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

        /* Navbar Styles */
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
            position: relative; /* Needed for absolute positioning of overlay/footer */
            display: flex;
            flex-direction: column;
            background-color: var(--dark-background); /* Solid dark background for all sections */
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        /* Overlay for project sections */
        .scroll-section .project-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0)); /* Dark gradient fade */
            color: #ffffff;
            opacity: 0; /* Hidden by default */
            transition: opacity 0.4s ease;
            text-align: center;
            z-index: 2; /* Ensure it's above the background image */
        }

        .scroll-section:hover .project-overlay {
            opacity: 1; /* Show on hover */
        }

        .scroll-section .project-overlay h3 {
            color: var(--orange-default);
            margin-bottom: 0.5rem;
            font-size: 2.5rem; /* Larger title */
            font-weight: bold;
        }

        .scroll-section .project-overlay p {
            font-size: 1.2rem;
            color: #ccc;
        }

        /* Intro Header */
        #projects-intro {
            background-image: url('./imgs/tunnel.webp');
        }

        #projects-intro::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 14, 14, 0.6); /* Dark overlay */
            z-index: 1;
        }

        #projects-intro .content-wrapper {
            position: relative;
            z-index: 2;
            padding-top: 80px; /* Account for fixed navbar */
        }

        /* Project Detail Modal */
        .modal-content {
            background-color: rgba(26, 26, 26, 0.95); /* Dark transparent background */
            color: #ffffff;
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-title {
            color: var(--orange-default);
            font-weight: bold;
        }

        .modal-body img {
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        .modal-body p {
            font-size: 1.1rem;
            line-height: 1.7;
        }

        .modal-body .info-label {
            color: var(--blue-default);
            font-weight: 600;
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-footer .btn-secondary {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: #ffffff;
        }

        /* Carousel controls */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1); /* Make icons white */
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
            background: var(--orange-default);
            transform: scale(1.3);
        }

        .scroll-dot:hover {
            background: rgba(255, 255, 255, 0.6);
        }

        /* Mobile Responsive */
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

            #projects-intro .content-wrapper {
                padding-top: 0 !important; /* No extra padding as section handles it */
            }

            .scroll-section .project-overlay {
                position: relative; /* Allow overlay to flow naturally */
                opacity: 1; /* Always visible on mobile */
                background: none; /* Remove gradient */
                padding: 1rem;
            }

            .scroll-section .project-overlay h3 {
                font-size: 2rem;
            }

            .scroll-section .project-overlay p {
                font-size: 1rem;
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

            .scroll-section .project-overlay h3 {
                font-size: 1.8rem;
            }

            .scroll-section .project-overlay p {
                font-size: 0.9rem;
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
            <!-- Intro Header -->
            <section id="projects-intro" class="scroll-section">
                <div class="content-wrapper">
                    <div class="container text-center position-relative z-2">
                        <h1 class="display-2 fw-bold mb-4 text-white">Our Portfolio</h1>
                        <p class="lead fs-4 text-white">Crafting Structures That Inspire</p>
                    </div>
                </div>
            </section>

            <!-- Project Sections will be dynamically injected here by JavaScript -->

            <!-- Footer will be injected into the last project section -->
        </div>
    </div>

    <!-- Project Detail Modal -->
    <div class="modal fade" id="projectDetailModal" tabindex="-1" aria-labelledby="projectDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectDetailModalLabel">Project Name</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="carousel-images">
                            <!-- Images will be injected here -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <p class="mt-4" id="project-description"></p>
                    <p><span class="info-label">Completion Date:</span> <span id="project-completion-date"></span></p>
                    <p><span class="info-label">Location:</span> <span id="project-location"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

    <script>
        // Project Data (for modal)
        const projectsData = [
            {
                id: 1,
                name: "Luxury Villa Complex",
                category: "residential",
                location: "Beverly Hills, CA",
                completionDate: "October 2023",
                description: "A sprawling complex of modern luxury villas, featuring sustainable design, smart home technology, and breathtaking views. The project involved complex landscape integration and high-end interior finishes.",
                images: [
                    "https://destinationcompress.s3.ap-south-1.amazonaws.com/bc8ff7d5-b7b4-4271-9f99-5d8df773c24c.jpg",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9gI320Tj1Y1Rnx1Hl25Gq2htK9xj0CitzSA&s",
                    "https://luxurycroatia.net/wp-content/uploads/2018/04/Luxury-sea-view-villa-complex-Ciovo-island-2.jpg"
                ]
            },
            {
                id: 2,
                name: "Downtown Office Tower",
                category: "commercial",
                location: "New York, NY",
                completionDate: "April 2024",
                description: "A 50-story LEED-certified office tower in the heart of Manhattan. This project presented challenges in urban logistics and integrating advanced building management systems. It now serves as a hub for tech startups.",
                images: [
                    "https://smartcdn.gprod.postmedia.digital/calgaryherald/wp-content/uploads/2023/01/20230104-downtown-AG-9994.jpg",
                    "https://static2.gensler.com/uploads/hero_element/21207/thumb_desktop/thumbs/1_St_Clair_West_N7_1676931364_1024x576.jpg",
                    "https://costar.brightspotcdn.com/dims4/default/81ec2a3/2147483647/strip/true/crop/2100x1398+0+0/resize/2100x1398!/quality/100/?url=http%3A%2F%2Fcostar-brightspot.s3.us-east-1.amazonaws.com%2F73%2F44%2Fcf497aee418cba45e63718227d3d%2Fprimaryphoto-2023-02-13t100321.029.jpg"
                ]
            },
            {
                id: 3,
                name: "Advanced Manufacturing Plant",
                category: "industrial",
                location: "Detroit, MI",
                completionDate: "January 2023",
                description: "Construction of a cutting-edge facility for automotive component manufacturing. The project required specialized infrastructure for heavy machinery and strict adherence to industrial safety standards.",
                images: [
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9m-7r1LX-yvte8BJXd764y2cThyPRsjkweA&s",
                    "https://images.ctfassets.net/17si5cpawjzf/79Qm5kWVFRvsDr33wtsz5A/1d3f4e4a7a2ee2db96f7ddf8bd240044/tecnomatix-advanced-manufacturing-visualization-flip-og-1200x630.jpg",
                    "https://www.stantec.com/content/dam/stantec/images/projects/0093/qcells-solar-power-manufacturing-1.jpg.transform/small/image.20230920.jpeg"
                ]
            },
            {
                id: 4,
                name: "Urban Bridge Renovation",
                category: "infrastructure",
                location: "Chicago, IL",
                completionDate: "November 2022",
                description: "Major renovation and seismic retrofitting of a historic urban bridge. The project involved complex engineering to maintain traffic flow during construction and preserve the bridge's architectural integrity.",
                images: [
                    "https://static.vecteezy.com/system/resources/previews/055/248/542/large_2x/urban-bridge-construction-project-with-heavy-machinery-and-structural-development-photo.jpg",
                    "https://images.adsttc.com/media/images/6222/4e8e/3e4b/31c3/2500/0002/newsletter/Footbridge-Photo2.jpg?1646415491",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzyexb5hxxND2tOTi1OOL7WDBVnspbSMdYVQ&s"
                ]
            },
            // {
            //     id: 5,
            //     name: "Suburban Housing Development",
            //     category: "residential",
            //     location: "Austin, TX",
            //     completionDate: "March 2024",
            //     description: "Development of a new suburban community with 150 single-family homes. Focused on energy efficiency and community amenities, including parks and recreational facilities.",
            //     images: [
            //         "/placeholder.svg?height=1080&width=1920&text=Housing Development 1",
            //         "/placeholder.svg?height=1080&width=1920&text=Housing Development 2",
            //         "/placeholder.svg?height=1080&width=1920&text=Housing Development 3"
            //     ]
            // },
            // {
            //     id: 6,
            //     name: "Retail Shopping Complex",
            //     category: "commercial",
            //     location: "Miami, FL",
            //     completionDate: "September 2023",
            //     description: "Construction of a multi-level retail and entertainment complex. The design incorporated open-air spaces and modern architectural elements to create a vibrant shopping experience.",
            //     images: [
            //         "/placeholder.svg?height=1080&width=1920&text=Shopping Complex 1",
            //         "/placeholder.svg?height=1080&width=1920&text=Shopping Complex 2",
            //         "/placeholder.svg?height=1080&width=1920&text=Shopping Complex 3"
            //     ]
            // },
            // {
            //     id: 7,
            //     name: "Logistics & Distribution Center",
            //     category: "industrial",
            //     location: "Dallas, TX",
            //     completionDate: "February 2024",
            //     description: "Development of a large-scale logistics and distribution center with automated warehousing systems. The project focused on maximizing operational efficiency and scalability.",
            //     images: [
            //         "/placeholder.svg?height=1080&width=1920&text=Logistics Center 1",
            //         "/placeholder.svg?height=1080&width=1920&text=Logistics Center 2",
            //         "/placeholder.svg?height=1080&width=1920&text=Logistics Center 3"
            //     ]
            // },
            // {
            //     id: 8,
            //     name: "High-Speed Rail Expansion",
            //     category: "infrastructure",
            //     location: "California, USA",
            //     completionDate: "June 2025",
            //     description: "Extension of a high-speed rail line, including new tracks, stations, and associated infrastructure. A complex project requiring extensive coordination with local authorities and environmental considerations.",
            //     images: [
            //         "/placeholder.svg?height=1080&width=1920&text=High-Speed Rail 1",
            //         "/placeholder.svg?height=1080&width=1920&text=High-Speed Rail 2",
            //         "/placeholder.svg?height=1080&width=1920&text=High-Speed Rail 3"
            //     ]
            // }
        ];

        let currentSection = 0; // Tracks the current section index for desktop scroll
        let isScrolling = false; // Prevents multiple scrolls at once
        let hammerInstance = null; // Hammer.js instance
        let wheelTimeout; // Debounce for wheel events
        let wheelDelta = 0; // Accumulates wheel delta

        const scrollContainer = document.getElementById("scrollContainer");
        const projectDetailModalElement = document.getElementById('projectDetailModal');
        const projectDetailModal = new bootstrap.Modal(projectDetailModalElement);
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

        function renderProjectSections() {
            // Remove all existing project sections (keep intro)
            const existingProjectSections = document.querySelectorAll('.scroll-section:not(#projects-intro)');
            existingProjectSections.forEach(section => section.remove());

            projectsData.forEach((project, index) => {
                const section = document.createElement('section');
                section.id = `project-${project.id}`;
                section.classList.add('scroll-section');
                section.dataset.category = project.category; // Keep category data for potential future use
                section.style.backgroundImage = `url('${project.images[0]}')`;
                section.style.cursor = 'pointer'; // Indicate it's clickable

                section.innerHTML = `
                    <div class="project-overlay">
                        <h3>${project.name}</h3>
                        <p>${project.location}</p>
                    </div>
                `;
                
                // Add click listener to open modal
                section.addEventListener('click', () => {
                    populateModal(project);
                    projectDetailModal.show();
                });

                scrollContainer.appendChild(section); // Append to scrollContainer

                // If this is the last project, add the footer
                if (index === projectsData.length - 1) {
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
                    section.insertAdjacentHTML('beforeend', footerHtml);
                }
            });

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
        }

        function populateModal(project) {
            document.getElementById('projectDetailModalLabel').textContent = project.name;
            document.getElementById('project-description').textContent = project.description;
            document.getElementById('project-completion-date').textContent = project.completionDate;
            document.getElementById('project-location').textContent = project.location;

            const carouselInner = document.getElementById('carousel-images');
            carouselInner.innerHTML = ''; // Clear previous images
            project.images.forEach((imgSrc, index) => {
                const carouselItem = `
                    <div class="carousel-item ${index === 0 ? 'active' : ''}">
                        <img src="${imgSrc}" class="d-block w-100" alt="${project.name} Image ${index + 1}">
                    </div>
                `;
                carouselInner.insertAdjacentHTML('beforeend', carouselItem);
            });
            // Re-initialize carousel if needed (Bootstrap usually handles this on show)
            const carouselElement = document.getElementById('projectCarousel');
            const bsCarousel = bootstrap.Carousel.getInstance(carouselElement);
            if (bsCarousel) {
                bsCarousel.to(0); // Go to the first slide
            } else {
                new bootstrap.Carousel(carouselElement);
            }
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
                renderProjectSections(); // Render all projects for desktop view
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
                renderProjectSections(); // Render all projects for mobile view
                
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

            // Observe sections for fade-in animation (applies to both desktop and mobile)
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

            // Re-observe sections after they are rendered
            // This needs to be called after renderProjectSections
            setTimeout(() => {
                document.querySelectorAll('section').forEach(section => {
                    section.style.opacity = '0';
                    section.style.transform = 'translateY(30px)';
                    section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    observer.observe(section);
                });
            }, 100); // Small delay to ensure sections are in DOM
        });

        // Re-apply scroll behavior on window resize
        window.addEventListener('resize', applyScrollBehavior);
    </script>
</body>
</html>