<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R&C - Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="styles.css"> <!-- Assuming this contains common styles like navbar, footer, glass-card -->
    <style>
        /* Specific styles for Services page */
        :root {
            --rc-blue: #0066ff; /* Derived from logo */
            --rc-orange: #ff7700; /* Derived from logo */
            --rc-white: #ffffff;
            --rc-dark-overlay: rgba(0, 0, 0, 0.7); /* Adjusted for better readability */
        }

        .nav-link.active {
            color: var(--rc-orange) !important;
        }

        /* Re-defining glass-card for self-containment if styles.css is not shared */
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

        /* Intro Section */
        #services-intro {
            background: linear-gradient(var(--rc-dark-overlay), var(--rc-dark-overlay)), url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Screenshot%202025-07-15%20120854-Dn7LkOkuBrAPe1n9Mc1yBYMtKBlbtQ.png') center center / cover no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--rc-white);
            text-align: center;
        }

        /* What We Offer Section */
        #what-we-offer {
            background: linear-gradient(var(--rc-dark-overlay), var(--rc-dark-overlay)), url('https://images.unsplash.com/photo-1505798577917-f62c70567924?q=80&w=2070') center center / cover no-repeat;
            padding: 80px 0;
            color: var(--rc-white);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .service-card {
            padding: 2rem;
            height: 100%; /* Ensure card takes full height of its column */
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative; /* For absolute positioning of overlay */
            overflow: hidden; /* Hide overflow content */
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
            border: 2px solid var(--rc-blue); /* Blue from logo */
        }

        .service-card .icon-wrapper i {
            font-size: 2.5rem;
            color: var(--rc-orange); /* Orange from logo */
        }

        .service-card h4 {
            color: var(--rc-orange); /* Orange from logo */
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
            color: var(--rc-white); /* Ensure text is white on blue background */
        }

        .service-card:hover .initial-content {
            opacity: 0; /* Hide initial content */
        }

        .service-card:hover .description-overlay {
            opacity: 1;
            transform: translateY(0); /* Slide in */
        }

        .description-overlay h4 {
            color: var(--rc-orange); /* Orange for title in overlay */
            margin-bottom: 1rem;
        }

        .description-overlay p {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .description-overlay .btn-link {
            color: var(--rc-white); /* White link on blue background */
            text-decoration: none;
            font-weight: 600;
            border: 1px solid var(--rc-white);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .description-overlay .btn-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            text-decoration: none;
        }

        /* Technical Tools & Processes */
        #technical-tools {
            background: linear-gradient(var(--rc-dark-overlay), var(--rc-dark-overlay)), url('https://images.unsplash.com/photo-1517030120962-f2648047757f?q=80&w=2070') center center / cover no-repeat;
            padding: 80px 0;
            color: var(--rc-white);
            min-height: 100vh;
        }

        .tool-logo-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
            margin-top: 3rem;
        }

        .tool-logo-item {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(8px);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            width: 150px;
            height: 150px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .tool-logo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .tool-logo-item img {
            max-width: 80px;
            max-height: 80px;
            filter: brightness(0) invert(1); /* Makes logos white for dark theme */
            margin-bottom: 0.5rem;
        }

        .tool-logo-item p {
            font-size: 0.9rem;
            color: #ccc;
        }

        .safety-summary {
            margin-top: 4rem;
            padding: 2rem;
            background: rgba(0, 102, 255, 0.1); /* Blue from logo with transparency */
            border-radius: 16px;
            border: 1px solid var(--rc-blue); /* Blue from logo */
            text-align: center;
        }

        .safety-summary h4 {
            color: var(--rc-orange); /* Orange from logo */
            margin-bottom: 1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .service-card {
                padding: 1.5rem;
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
        }
    </style>
</head>
<body>
    <!-- Navigation -->
     <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid px-5 py-1 justify-content-center" style="width: 80%;">
          <a class="navbar-brand" href="#">
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
                      <a class="nav-link text-white" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="projects.php">Projects</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white active" href="services.php">Services</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white " href="contact.php">Contact</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
    <!-- Intro Section -->
    <section id="services-intro">
        <div class="container">
            <h1 class="display-2 fw-bold mb-4">Our Capabilities</h1>
            <p class="lead fs-4">Delivering comprehensive construction and infrastructure solutions with excellence.</p>
        </div>
    </section>

    <!-- What We Offer Section -->
    <section id="what-we-offer">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">What We Offer</h2>
                <p class="lead">Innovative solutions tailored to your project needs.</p>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-6 col-md-6 p-2">
                    <div class="service-card glass-card">
                        <div class="initial-content">
                            <div class="icon-wrapper">
                                <i class="fas fa-home"></i>
                            </div>
                            <h4>Residential Construction</h4>
                            <p>Building modern and sustainable homes, apartments, and residential complexes.</p>
                        </div>
                        <div class="description-overlay">
                            <h4>Residential Construction</h4>
                            <p>Our expertise spans from custom-built luxury homes to large-scale residential complexes, focusing on modern design, sustainable practices, and superior craftsmanship. We ensure every residential project meets the highest standards of quality and comfort.</p>
                            <a href="#" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-2">
                    <div class="service-card glass-card">
                        <div class="initial-content">
                            <div class="icon-wrapper">
                                <i class="fas fa-building"></i>
                            </div>
                            <h4>Commercial & Office Spaces</h4>
                            <p>Constructing state-of-the-art commercial buildings, offices, and retail centers.</p>
                        </div>
                        <div class="description-overlay">
                            <h4>Commercial & Office Spaces</h4>
                            <p>We specialize in creating functional and aesthetically pleasing commercial environments, including office buildings, retail spaces, and mixed-use developments, designed to enhance productivity and client experience.</p>
                            <a href="#" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-2">
                    <div class="service-card glass-card">
                        <div class="initial-content">
                            <div class="icon-wrapper">
                                <i class="fas fa-drafting-compass"></i>
                            </div>
                            <h4>Design-Build Services</h4>
                            <p>Integrated design and construction services for seamless project execution.</p>
                        </div>
                        <div class="description-overlay">
                            <h4>Design-Build Services</h4>
                            <p>Our integrated approach combines design and construction under one roof, streamlining the project lifecycle, reducing risks, and ensuring cost-effectiveness and timely delivery from concept to completion.</p>
                            <a href="#" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-2">
                    <div class="service-card glass-card">
                        <div class="initial-content">
                            <div class="icon-wrapper">
                                <i class="fas fa-hard-hat"></i>
                            </div>
                            <h4>Civil & Structural Engineering</h4>
                            <p>Expertise in foundational civil works and robust structural designs for all projects.</p>
                        </div>
                        <div class="description-overlay">
                            <h4>Civil & Structural Engineering</h4>
                            <p>We provide comprehensive civil and structural engineering solutions, from foundational analysis and design to complex structural frameworks, ensuring safety, durability, and compliance with all regulatory standards.</p>
                            <a href="#" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-2">
                    <div class="service-card glass-card">
                        <div class="initial-content">
                            <div class="icon-wrapper">
                                <i class="fas fa-paint-roller"></i>
                            </div>
                            <h4>Renovation & Retrofitting</h4>
                            <p>Modernizing existing structures with advanced techniques and sustainable materials.</p>
                        </div>
                        <div class="description-overlay">
                            <h4>Renovation & Retrofitting</h4>
                            <p>Our renovation and retrofitting services breathe new life into existing buildings, enhancing their functionality, energy efficiency, and aesthetic appeal while preserving their structural integrity and historical value.</p>
                            <a href="#" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-2">
                    <div class="service-card glass-card">
                        <div class="initial-content">
                            <div class="icon-wrapper">
                                <i class="fas fa-couch"></i>
                            </div>
                            <h4>Interior Fit-Out</h4>
                            <p>Delivering complete interior solutions from design to execution for various spaces.</p>
                        </div>
                        <div class="description-overlay">
                            <h4>Interior Fit-Out</h4>
                            <p>From conceptual design to final execution, we offer complete interior fit-out services for commercial, residential, and hospitality spaces, creating bespoke interiors that reflect client vision and functional needs.</p>
                            <a href="#" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-2">
                    <div class="service-card glass-card">
                        <div class="initial-content">
                            <div class="icon-wrapper">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <h4>Project Management</h4>
                            <p>Efficient oversight and coordination of projects from inception to completion.</p>
                        </div>
                        <div class="description-overlay">
                            <h4>Project Management</h4>
                            <p>Our expert project management ensures seamless coordination, strict adherence to timelines and budgets, and effective risk mitigation, guaranteeing successful project delivery from initiation to closeout.</p>
                            <a href="#" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-2">
                    <div class="service-card glass-card">
                        <div class="initial-content">
                            <div class="icon-wrapper">
                                <i class="fas fa-key"></i>
                            </div>
                            <h4>Turnkey Execution</h4>
                            <p>Comprehensive solutions handling every aspect of your project from start to finish.</p>
                        </div>
                        <div class="description-overlay">
                            <h4>Turnkey Execution</h4>
                            <p>We offer comprehensive turnkey solutions, managing every phase of your project from initial concept and design to construction, commissioning, and handover, providing a single point of responsibility and maximum convenience.</p>
                            <a href="#" class="btn-link">View Related Projects <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technical Tools & Processes -->
    <section id="technical-tools" class="py-5 text-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold">Technical Tools & Processes</h2>
                <p class="lead">Leveraging cutting-edge technology for precision and efficiency.</p>
            </div>
            <div class="tool-logo-grid">
                <div class="tool-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Autodesk_AutoCAD_logo.svg/1200px-Autodesk_AutoCAD_logo.svg.png" alt="AutoCAD">
                    <p>AutoCAD</p>
                </div>
                <div class="tool-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Autodesk_Revit_logo.svg/1200px-Autodesk_Revit_logo.svg.png" alt="Revit">
                    <p>Revit (BIM)</p>
                </div>
                <div class="tool-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Oracle_Primavera_P6_logo.svg/1200px-Oracle_Primavera_P6_logo.svg.png" alt="Primavera P6">
                    <p>Primavera P6</p>
                </div>
                <div class="tool-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/SAP_2011_logo.svg/1200px-SAP_2011_logo.svg.png" alt="SAP">
                    <p>SAP ERP</p>
                </div>
                <div class="tool-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Trimble_logo.svg/1200px-Trimble_logo.svg.png" alt="Trimble">
                    <p>Trimble</p>
                </div>
                <div class="tool-logo-item">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/Bentley_Systems_logo.svg/1200px-Bentley_Systems_logo.svg.png" alt="Bentley">
                    <p>Bentley Systems</p>
                </div>
            </div>
            <div class="safety-summary glass-card mt-5">
                <h4>Commitment to Safety & Quality</h4>
                <p>At R&C, safety is paramount. We adhere to the highest international safety standards and implement rigorous quality control processes across all our projects. Our commitment ensures a safe working environment and delivers superior results, every time.</p>
            </div>
        </div>
    </section>

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
        // Navbar background change on scroll (copied from previous pages for consistency)
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(46, 46, 46, 0.9)';
            } else {
                navbar.style.background = 'rgba(46, 46, 46, 0.25)';
            }
        });

        // Simple fade-in on scroll for sections (copied from previous pages for consistency)
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
    </script>
</body>
</html>