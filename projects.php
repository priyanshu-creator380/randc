<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R&C - Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="styles.css"> <!-- Assuming this contains common styles like navbar, footer, glass-card -->
    <style>
        /* Specific styles for Projects page */
        :root {
            --rc-blue: #0066ff; /* Derived from logo */
            --rc-orange: #ff7700; /* Derived from logo */
            --rc-white: #ffffff;
            --rc-dark-overlay: rgba(0, 0, 0, 0.7); /* Adjusted for better readability */
        }

        .nav-link.active {
            color: var(--rc-orange) !important;
        }

        /* Intro Section */
        #projects-intro {
            background: linear-gradient(var(--rc-dark-overlay), var(--rc-dark-overlay)), url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=2070') center center / cover no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--rc-white);
            text-align: center;
        }

        /* Project Grid Section */
        #project-grid {
            background-color: #1a1a1a; /* Dark background for the grid section */
            color: var(--rc-white);
        }

        .project-card-wrapper {
            height: 100vh; /* Each card wrapper takes full viewport height */
            padding: 0; /* Remove padding from columns */
            overflow: hidden; /* Hide overflow for hover effects */
        }

        .project-card {
            position: relative;
            width: 100%;
            height: 100%; /* Card fills its 100vh wrapper */
            background-size: cover;
            background-position: center center;
            display: flex;
            align-items: flex-end; /* Align overlay to bottom */
            justify-content: center;
            cursor: pointer;
            transition: transform 0.3s ease;
            border-radius: 0; /* No rounded border */
        }

        .project-card:hover {
            transform: scale(1.03); /* Slight zoom on hover */
        }

        .project-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0)); /* Dark gradient fade */
            color: var(--rc-white);
            opacity: 0; /* Hidden by default */
            transition: opacity 0.4s ease;
            text-align: center;
        }

        .project-card:hover .project-overlay {
            opacity: 1; /* Show on hover */
        }

        .project-overlay h3 {
            color: var(--rc-orange);
            margin-bottom: 0.5rem;
            font-size: 2.5rem; /* Larger title */
            font-weight: bold;
        }

        .project-overlay p {
            font-size: 1.2rem;
            color: #ccc;
        }

        /* Filters */
        .filter-buttons {
            padding: 3rem 0;
            text-align: center;
            background-color: #222; /* Slightly lighter dark background for filters */
        }

        .filter-buttons .btn {
            background-color: rgba(0, 102, 255, 0.1); /* Blue from logo with transparency */
            border: 1px solid var(--rc-blue);
            color: var(--rc-white);
            margin: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 50px; /* Pill shape */
            transition: all 0.3s ease;
        }

        .filter-buttons .btn:hover,
        .filter-buttons .btn.active {
            background-color: var(--rc-blue);
            color: var(--rc-white);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 102, 255, 0.3);
        }

        /* Load More Button */
        .load-more-container {
            padding: 3rem 0;
            text-align: center;
            background-color: #1a1a1a;
        }

        .load-more-container .btn {
            background-color: var(--rc-orange);
            border: none;
            color: var(--rc-white);
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .load-more-container .btn:hover {
            background-color: #e66700; /* Darker orange */
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 119, 0, 0.3);
        }

        /* Project Detail Modal */
        .modal-content {
            background-color: rgba(26, 26, 26, 0.95); /* Dark transparent background */
            color: var(--rc-white);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-title {
            color: var(--rc-orange);
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
            color: var(--rc-blue);
            font-weight: 600;
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-footer .btn-secondary {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: var(--rc-white);
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) { /* For md and smaller screens */
            .project-card-wrapper {
                height: 60vh; /* Adjust height for smaller screens */
            }
            .project-overlay h3 {
                font-size: 2rem;
            }
            .project-overlay p {
                font-size: 1rem;
            }
        }
        @media (max-width: 767.98px) { /* For sm and smaller screens */
            .project-card-wrapper {
                height: 50vh; /* Further adjust height for mobile */
            }
            .project-overlay h3 {
                font-size: 1.8rem;
            }
            .project-overlay p {
                font-size: 0.9rem;
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
                      <a class="nav-link text-white " href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white active" href="projects.php">Projects</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="services.php">Services</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white " href="contact.php">Contact</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

    <!-- Intro Header -->
    <section id="projects-intro">
        <div class="container">
            <h1 class="display-2 fw-bold mb-4">Our Portfolio</h1>
            <p class="lead fs-4">Crafting Structures That Inspire</p>
        </div>
    </section>

    <!-- Filterable Grid Layout -->
    <section id="project-grid">
        <div class="container-fluid">
            <div class="filter-buttons">
                <button class="btn active" data-filter="all">All Projects</button>
                <button class="btn" data-filter="residential">Residential</button>
                <button class="btn" data-filter="commercial">Commercial</button>
                <button class="btn" data-filter="industrial">Industrial</button>
                <button class="btn" data-filter="infrastructure">Infrastructure</button>
            </div>

            <div class="row g-0" id="projects-container">
                <!-- Project Card 1 -->
                <div class="col-lg-6 col-md-12 project-card-wrapper" data-category="residential">
                    <div class="project-card" style="background-image: url('https://images.unsplash.com/photo-1582268611958-abfd6592fdc6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
                        data-bs-toggle="modal" data-bs-target="#projectDetailModal"
                        data-project-id="1">
                        <div class="project-overlay">
                            <h3>Luxury Villa Complex</h3>
                            <p>Beverly Hills, CA</p>
                        </div>
                    </div>
                </div>
                <!-- Project Card 2 -->
                <div class="col-lg-6 col-md-12 project-card-wrapper" data-category="commercial">
                    <div class="project-card" style="background-image: url('https://images.unsplash.com/photo-1544737000-82060382704c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
                        data-bs-toggle="modal" data-bs-target="#projectDetailModal"
                        data-project-id="2">
                        <div class="project-overlay">
                            <h3>Downtown Office Tower</h3>
                            <p>New York, NY</p>
                        </div>
                    </div>
                </div>
                <!-- Project Card 3 -->
                <div class="col-lg-6 col-md-12 project-card-wrapper" data-category="industrial">
                    <div class="project-card" style="background-image: url('https://images.unsplash.com/photo-1563472900-222d2752808a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
                        data-bs-toggle="modal" data-bs-target="#projectDetailModal"
                        data-project-id="3">
                        <div class="project-overlay">
                            <h3>Advanced Manufacturing Plant</h3>
                            <p>Detroit, MI</p>
                        </div>
                    </div>
                </div>
                <!-- Project Card 4 -->
                <div class="col-lg-6 col-md-12 project-card-wrapper" data-category="infrastructure">
                    <div class="project-card" style="background-image: url('https://images.unsplash.com/photo-1517030120962-f2648047757f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
                        data-bs-toggle="modal" data-bs-target="#projectDetailModal"
                        data-project-id="4">
                        <div class="project-overlay">
                            <h3>Urban Bridge Renovation</h3>
                            <p>Chicago, IL</p>
                        </div>
                    </div>
                </div>
                <!-- Project Card 5 (Initially hidden for "Load More") -->
                <div class="col-lg-6 col-md-12 project-card-wrapper hidden" data-category="residential">
                    <div class="project-card" style="background-image: url('https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
                        data-bs-toggle="modal" data-bs-target="#projectDetailModal"
                        data-project-id="5">
                        <div class="project-overlay">
                            <h3>Suburban Housing Development</h3>
                            <p>Austin, TX</p>
                        </div>
                    </div>
                </div>
                <!-- Project Card 6 (Initially hidden for "Load More") -->
                <div class="col-lg-6 col-md-12 project-card-wrapper hidden" data-category="commercial">
                    <div class="project-card" style="background-image: url('https://images.unsplash.com/photo-1505798577917-f62c70567924?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
                        data-bs-toggle="modal" data-bs-target="#projectDetailModal"
                        data-project-id="6">
                        <div class="project-overlay">
                            <h3>Retail Shopping Complex</h3>
                            <p>Miami, FL</p>
                        </div>
                    </div>
                </div>
                <!-- Project Card 7 (Initially hidden for "Load More") -->
                <div class="col-lg-6 col-md-12 project-card-wrapper hidden" data-category="industrial">
                    <div class="project-card" style="background-image: url('https://images.unsplash.com/photo-1533109721025-dc5544966058?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
                        data-bs-toggle="modal" data-bs-target="#projectDetailModal"
                        data-project-id="7">
                        <div class="project-overlay">
                            <h3>Logistics & Distribution Center</h3>
                            <p>Dallas, TX</p>
                        </div>
                    </div>
                </div>
                <!-- Project Card 8 (Initially hidden for "Load More") -->
                <div class="col-lg-6 col-md-12 project-card-wrapper hidden" data-category="infrastructure">
                    <div class="project-card" style="background-image: url('https://images.unsplash.com/photo-1517030120962-f2648047757f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"
                        data-bs-toggle="modal" data-bs-target="#projectDetailModal"
                        data-project-id="8">
                        <div class="project-overlay">
                            <h3>High-Speed Rail Expansion</h3>
                            <p>California, USA</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="load-more-container">
                <button class="btn" id="load-more-btn">Load More Projects</button>
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

        // Project Data (for modal and filtering)
        const projectsData = [
            {
                id: 1,
                name: "Luxury Villa Complex",
                category: "residential",
                location: "Beverly Hills, CA",
                completionDate: "October 2023",
                description: "A sprawling complex of modern luxury villas, featuring sustainable design, smart home technology, and breathtaking views. The project involved complex landscape integration and high-end interior finishes.",
                images: [
                    "https://images.unsplash.com/photo-1582268611958-abfd6592fdc6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1564013799907-f01017062c07?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1570129477492-45c003edd2be?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
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
                    "https://images.unsplash.com/photo-1544737000-82060382704c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1523961131990-5ea7c61b2107?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
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
                    "https://images.unsplash.com/photo-1563472900-222d2752808a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1581092336000-3e022855777a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1521737711867-e3b973753422?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
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
                    "https://images.unsplash.com/photo-1517030120962-f2648047757f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1505798577917-f62c70567924?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1533109721025-dc5544966058?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                ]
            },
            {
                id: 5,
                name: "Suburban Housing Development",
                category: "residential",
                location: "Austin, TX",
                completionDate: "March 2024",
                description: "Development of a new suburban community with 150 single-family homes. Focused on energy efficiency and community amenities, including parks and recreational facilities.",
                images: [
                    "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1580582932707-52c5df75d54e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1576941089067-2de3c901e126?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                ]
            },
            {
                id: 6,
                name: "Retail Shopping Complex",
                category: "commercial",
                location: "Miami, FL",
                completionDate: "September 2023",
                description: "Construction of a multi-level retail and entertainment complex. The design incorporated open-air spaces and modern architectural elements to create a vibrant shopping experience.",
                images: [
                    "https://images.unsplash.com/photo-1505798577917-f62c70567924?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1523961131990-5ea7c61b2107?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                ]
            },
            {
                id: 7,
                name: "Logistics & Distribution Center",
                category: "industrial",
                location: "Dallas, TX",
                completionDate: "February 2024",
                description: "Development of a large-scale logistics and distribution center with automated warehousing systems. The project focused on maximizing operational efficiency and scalability.",
                images: [
                    "https://images.unsplash.com/photo-1533109721025-dc5544966058?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1563472900-222d2752808a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1581092336000-3e022855777a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                ]
            },
            {
                id: 8,
                name: "High-Speed Rail Expansion",
                category: "infrastructure",
                location: "California, USA",
                completionDate: "June 2025",
                description: "Extension of a high-speed rail line, including new tracks, stations, and associated infrastructure. A complex project requiring extensive coordination with local authorities and environmental considerations.",
                images: [
                    "https://images.unsplash.com/photo-1517030120962-f2648047757f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1505798577917-f62c70567924?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                    "https://images.unsplash.com/photo-1533109721025-dc5544966058?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                ]
            }
        ];

        const projectsContainer = document.getElementById('projects-container');
        const loadMoreBtn = document.getElementById('load-more-btn');
        const filterButtons = document.querySelectorAll('.filter-buttons .btn');
        const projectDetailModal = document.getElementById('projectDetailModal');

        let visibleProjectsCount = 4; // Start with 4 projects (2 rows)

        function renderProjects(filter = 'all') {
            projectsContainer.innerHTML = ''; // Clear existing projects
            let count = 0;
            projectsData.forEach(project => {
                const isVisible = (filter === 'all' || project.category === filter);
                if (isVisible && count < visibleProjectsCount) {
                    const projectCardHtml = `
                        <div class="col-lg-6 col-md-12 project-card-wrapper" data-category="${project.category}">
                            <div class="project-card" style="background-image: url('${project.images[0]}');"
                                data-bs-toggle="modal" data-bs-target="#projectDetailModal"
                                data-project-id="${project.id}">
                                <div class="project-overlay">
                                    <h3>${project.name}</h3>
                                    <p>${project.location}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    projectsContainer.insertAdjacentHTML('beforeend', projectCardHtml);
                    count++;
                }
            });

            // Show/hide load more button
            const remainingProjects = projectsData.filter(p => filter === 'all' || p.category === filter).length - visibleProjectsCount;
            if (remainingProjects > 0) {
                loadMoreBtn.style.display = 'block';
            } else {
                loadMoreBtn.style.display = 'none';
            }
        }

        // Initial render
        renderProjects();

        // Load More functionality
        loadMoreBtn.addEventListener('click', () => {
            visibleProjectsCount += 4; // Load 4 more projects
            const activeFilter = document.querySelector('.filter-buttons .btn.active').dataset.filter;
            renderProjects(activeFilter);
        });

        // Filter functionality
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                visibleProjectsCount = 4; // Reset visible count on filter change
                renderProjects(button.dataset.filter);
            });
        });

        // Modal content population
        projectDetailModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget; // Button that triggered the modal
            const projectId = button.dataset.projectId;
            const project = projectsData.find(p => p.id == projectId);

            if (project) {
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
            }
        });
    </script>
</body>
</html>