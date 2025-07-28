<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>R&C - Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
      :root {
          --rc-blue: #0066ff;
          --rc-orange: #ff7700;
          --rc-white: #ffffff;
          --rc-dark-overlay: rgba(0, 0, 0, 0.7);
      }
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
          background-color: rgba(46, 46, 46, 0.25);
          backdrop-filter: blur(4px);
          z-index: 1000;
          transition: background 0.3s ease;
      }
      .navbar.scrolled {
          background: rgba(46, 46, 46, 0.9);
      }
      .nav-item {
          margin: 0px 2rem;
      }
      .nav-link, .navbar-brand {
          color: white !important;
          font-size: 1rem;
      }
      .nav-link.active {
          color: var(--rc-orange) !important;
      }
      .nav-link:hover {
          color: var(--rc-orange) !important;
      }
      .navbar-brand img {
          height: 64px;
      }
      .navbar-collapse {
          flex-grow: 0;
      }
      .navbar-toggler {
          color: white;
      }
      .navbar-toggler-icon {
          filter: invert();
      }
      .scroll-wrapper {
          height: 100vh;
          overflow: hidden;
          position: relative;
      }
      .scroll-container {
          transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      }
      .scroll-section {
          height: 100vh;
          width: 100vw;
          position: relative;
          display: flex;
          align-items: center;
          justify-content: center;
      }
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
          background: var(--rc-orange);
          transform: scale(1.3);
      }
      .scroll-dot:hover {
          background: rgba(255, 255, 255, 0.6);
      }
      #contact-intro {
          background: linear-gradient(var(--rc-dark-overlay), var(--rc-dark-overlay)), url('https://images.unsplash.com/photo-1523961131990-5ea7c61b2107?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center center / cover no-repeat;
          color: var(--rc-white);
          text-align: center;
      }
      .contact-section {
          background-color: #1a1a1a;
          color: var(--rc-white);
          padding: 2rem 0;
      }
      .contact-info-card, .contact-form-card, .office-hours-card {
          background: rgba(255, 255, 255, 0.08);
          border-radius: 16px;
          padding: 2.5rem;
          color: #fff;
          backdrop-filter: blur(10px);
          border: 1px solid rgba(255, 255, 255, 0.2);
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
          height: 100%;
      }
      .contact-info-card h2, .contact-form-card h2, .office-hours-card h2 {
          color: var(--rc-orange);
          margin-bottom: 1.5rem;
          font-size: 2rem;
          font-weight: bold;
      }
      .contact-info-card p, .office-hours-card p {
          font-size: 1.1rem;
          margin-bottom: 1rem;
      }
      .contact-info-card i, .office-hours-card i {
          color: var(--rc-blue);
          margin-right: 0.75rem;
          font-size: 1.25rem;
      }
      .contact-form .form-control, .contact-form .form-select {
          background-color: rgba(255, 255, 255, 0.1);
          border: 1px solid rgba(255, 255, 255, 0.3);
          color: var(--rc-white);
          padding: 0.75rem 1rem;
          border-radius: 8px;
      }
      .contact-form .form-control::placeholder {
          color: rgba(255, 255, 255, 0.6);
      }
      .contact-form .form-control:focus, .contact-form .form-select:focus {
          background-color: rgba(255, 255, 255, 0.15);
          border-color: var(--rc-blue);
          box-shadow: 0 0 0 0.25rem rgba(0, 102, 255, 0.25);
          color: var(--rc-white);
      }
      .contact-form .btn-primary {
          background-color: var(--rc-orange);
          border-color: var(--rc-orange);
          padding: 0.75rem 2rem;
          font-size: 1.1rem;
          border-radius: 50px;
          transition: all 0.3s ease;
      }
      .contact-form .btn-primary:hover {
          background-color: #e66700;
          border-color: #e66700;
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
      @media (max-width: 768px) {
          .scroll-indicators {
              display: none;
          }
          #contact-intro {
              min-height: 50vh;
          }
          .contact-section {
              padding: 1.5rem 0;
          }
          .contact-info-card, .contact-form-card, .office-hours-card {
              margin-bottom: 1.5rem;
              padding: 1.5rem;
          }
          .contact-info-card h2, .contact-form-card h2, .office-hours-card h2 {
              font-size: 1.75rem;
          }
          .map-container {
              height: 250px;
          }
          .whatsapp-cta .btn {
              width: 50px;
              height: 50px;
              font-size: 1.75rem;
          }
          .whatsapp-qr-code {
              bottom: 60px;
          }
      }
      @media (max-width: 576px) {
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
      }
  </style>
</head>
<body>
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
                      <a class="nav-link text-white" href="services.php">Services</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white active" href="contact.php">Contact</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  <div class="scroll-indicators">
      <button class="scroll-dot active" data-section="0" aria-label="Go to Contact Intro"></button>
      <button class="scroll-dot" data-section="1" aria-label="Go to Location and Map"></button>
      <button class="scroll-dot" data-section="2" aria-label="Go to Contact Form"></button>
  </div>

  <div class="scroll-wrapper">
      <div class="scroll-container" id="scrollContainer">
          <section id="contact-intro" class="scroll-section">
              <div class="container">
                  <h1 class="display-2 fw-bold mb-4">Get in Touch</h1>
                  <p class="lead fs-4">We're here to answer your questions and help with your next project.</p>
              </div>
          </section>

          <section class="scroll-section contact-section">
              <div class="container">
                  <h2 class="text-center mb-4">📍 Location & Map</h2>
                  <div class="map-container">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0193450000003!2d144.9631!3d-37.814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b05d2c2d01%3A0x504567846297620!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1678901234567!5m2!1sen!2sau" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                  <div class="row justify-content-center">
                      <div class="col-md-6 mb-4 mb-md-0">
                          <div class="contact-info-card glass-card">
                              <h2>Our Office</h2>
                              <p><i class="fas fa-map-marker-alt"></i> 123 Construction Blvd, City, State, 12345</p>
                              <p><i class="fas fa-phone-alt"></i> +1 (555) 123-4567</p>
                              <p><i class="fas fa-envelope"></i> info@randcprojects.com</p>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="office-hours-card glass-card">
                              <h2>🕘 Office Hours</h2>
                              <p><i class="fas fa-calendar-alt"></i> Monday - Friday: 9:00 AM - 5:00 PM</p>
                              <p><i class="fas fa-clock"></i> Saturday: 10:00 AM - 2:00 PM</p>
                              <p><i class="fas fa-times-circle"></i> Sunday: Closed</p>
                          </div>
                      </div>
                  </div>
              </div>
          </section>

          <section class="scroll-section contact-section">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-lg-10">
                          <div class="contact-form-card glass-card">
                              <h2 class="text-center mb-4">📬 Contact Form</h2>
                              <form class="contact-form">
                                  <div class="mb-3">
                                      <label for="name" class="form-label visually-hidden">Name</label>
                                      <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                  </div>
                                  <div class="mb-3">
                                      <label for="email" class="form-label visually-hidden">Email</label>
                                      <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                                  </div>
                                  <div class="mb-3">
                                      <label for="phone" class="form-label visually-hidden">Phone</label>
                                      <input type="tel" class="form-control" id="phone" placeholder="Your Phone (Optional)">
                                  </div>
                                  <div class="mb-3">
                                      <label for="inquiryType" class="form-label visually-hidden">Inquiry Type</label>
                                      <select class="form-select" id="inquiryType" required>
                                          <option selected disabled value="">Select Inquiry Type</option>
                                          <option>General Inquiry</option>
                                          <option>Project Proposal</option>
                                          <option>Partnership</option>
                                          <option>Careers</option>
                                          <option>Other</option>
                                      </select>
                                  </div>
                                  <div class="mb-4">
                                      <label for="message" class="form-label visually-hidden">Message</label>
                                      <textarea class="form-control" id="message" rows="5" placeholder="Your Message" required></textarea>
                                  </div>
                                  <div class="d-grid">
                                      <button type="submit" class="btn btn-primary">Send Message</button>
                                  </div>
                              </form>
                          </div>
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
      document.addEventListener("DOMContentLoaded", () => {
          const scrollContainer = document.getElementById("scrollContainer");
          const sections = document.querySelectorAll(".scroll-section");
          const scrollDots = document.querySelectorAll(".scroll-dot");
          const navbar = document.querySelector(".navbar");
          let currentSection = 0;
          let isScrolling = false;

          function updateScrollDots() {
              scrollDots.forEach((dot, index) => {
                  dot.classList.toggle("active", index === currentSection);
              });
              // Update navbar background based on section
              navbar.classList.toggle("scrolled", currentSection > 0);
          }

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
              // console.log(`Scrolled to section ${index}`);
          }

          // Wheel event handler with improved debouncing
          let lastWheelTime = 0;
          document.addEventListener("wheel", (e) => {
              const now = Date.now();
              if (now - lastWheelTime < 100) return; // Debounce: 100ms
              lastWheelTime = now;

              if (isScrolling) return;
              const delta = e.deltaY;
              const threshold = 30; // Lowered for better sensitivity
              if (Math.abs(delta) > threshold) {
                  e.preventDefault(); // Prevent default only for significant scrolls
                  if (delta > 0 && currentSection < sections.length - 1) {
                      scrollToSection(currentSection + 1);
                  } else if (delta < 0 && currentSection > 0) {
                      scrollToSection(currentSection - 1);
                  }
              }
          }, { passive: false });

          // Touch support
          let touchStartY = 0;
          let touchEndY = 0;
          document.addEventListener("touchstart", (e) => {
              touchStartY = e.changedTouches[0].screenY;
          });
          document.addEventListener("touchend", (e) => {
              touchEndY = e.changedTouches[0].screenY;
              const swipeThreshold = 50;
              const diff = touchStartY - touchEndY;
              if (Math.abs(diff) > swipeThreshold) {
                  if (diff > 0 && currentSection < sections.length - 1) {
                      scrollToSection(currentSection + 1);
                  } else if (diff < 0 && currentSection > 0) {
                      scrollToSection(currentSection - 1);
                  }
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

          // Fade-in on scroll for sections
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
          document.querySelectorAll('.scroll-section').forEach(section => {
              section.style.opacity = '0';
              section.style.transform = 'translateY(30px)';
              section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
              observer.observe(section);
          });

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

          // Initialize
          updateScrollDots();
      });
  </script>
</body>
</html>