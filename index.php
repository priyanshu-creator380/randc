<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>R&C Construction</title>
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
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(46, 46, 46, 0.25);
            backdrop-filter: blur(4px);
            z-index: 1000;
            position: fixed;
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

        /* Desktop Scroll Container */
        .scroll-wrapper {
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .scroll-container {
            height: 100vh;
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Section Styling for Desktop */
        .scroll-section {
            height: 100vh;
            width: 100vw;
            position: relative;
            display: flex; /* Use flexbox to stack header and content */
            flex-direction: column; /* Stack vertically */
            /* Removed align-items, justify-content, padding-bottom from here */
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
        }

        /* Existing .section-content now takes the remaining 80% */
        .section-content {
            height: 80vh; /* Takes the remaining 80% of the 100vh scroll-section */
            width: 100%;
            display: flex;
            align-items: end; /* Align content to the bottom of this 80vh space */
            justify-content: center;
            padding-bottom: 10vh; /* Keep existing padding for content */
            position: relative; /* Ensure z-index works if needed */
            z-index: 2; /* Ensure it's above background but below header */
        }

        /* Mobile Styles */
        .mobile-container {
            display: none;
            padding-top: 80px;
        }

        .mobile-section {
            min-height: 50vh; /* Adjusted for potentially less content */
            padding: 2rem 0;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center children horizontally */
            justify-content: flex-start; /* Align content to the top */
            position: relative;
            height: auto; /* Allow height to be determined by content */
            width: 100%; /* Ensure mobile section takes full width */
        }

        /* Hero Section */
        .carousel-item {
            height: 100vh;
            width: 100vw;
            max-width: 100vw;
            min-height: 500px;
        }

        .carousel-item img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        #hero .overlay, .mobile-carousel .overlay {
            width: 100%;
            height: 100%;
            color: white;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 6rem;
            background-color: rgba(14, 14, 14, 0.6);
        }

        /* Services Sections */
        #services-1, .mobile-services-1 {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
        }

        #services-2, .mobile-services-2 {
            background: linear-gradient(135deg, #0f3460, #16537e);
        }

        #services-3, .mobile-services-3 {
            position: relative;
            background: #000;
        }

        #services-3 .services-bg, .mobile-services-3 .services-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        #services-3 .services-bg img, .mobile-services-3 .services-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(60%);
        }

        .services-list {
            position: relative;
            z-index: 2;
        }

        .services-list h2 {
            font-size: 2.5rem;
            letter-spacing: 1px;
        }

        .services-list ul li {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            margin: 0.5rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
        }

        .services-list ul li:hover {
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
        }

        /* Area of Operation - Improved */
        #areaofoperation {
            background-color: #000;
            /* position: relative; is on .scroll-section */
        }

        .area-overlay {
            /* Removed position: absolute; top: 10%; z-index: 10; */
            width: 100%; /* Ensure it takes full width of its parent (.section-top-20) */
            text-align: center;
            /* py-3 from HTML will add padding */
        }

        #areaofoperation .area-cards-container {
            height: 100%; /* Make it fill the parent .section-content (which is 80vh) */
            display: flex;
            align-items: end; /* Keep existing alignment */
            padding-bottom: 2rem; /* Keep existing padding */
        }

        .area-card {
            background-size: cover;
            background-position: center;
            flex: 1;
            height: 70vh;
            transition: transform 0.3s ease;
            display: flex;
            align-items: end;
            justify-content: center;
            text-align: center;
            position: relative;
            margin: 0 2px;
        }

        .area-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.1) 100%);
            z-index: 1;
        }

        .overlay-text {
            position: relative;
            z-index: 2;
            padding: 1.5rem;
            color: white;
            width: 100%;
            height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .overlay-text h4 {
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .overlay-text p {
            font-size: 0.85rem;
            margin: 0;
            line-height: 1.3;
        }

        .know-more {
            position: absolute;
            z-index: 3;
            top: 0;
            left: 0;
            opacity: 0;
            text-decoration: none;
            color: white;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(6px);
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 600;
            transition: opacity 0.3s ease;
        }

        .area-card:hover .know-more {
            opacity: 1;
        }

        /* Testimonials - Improved */
        #testimonials {
            background: url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=1200') no-repeat center center / cover;
            /* position: relative; is on .scroll-section */
        }

        #testimonials::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .testimonials-header {
            /* Removed position: absolute; top: 5%; left: 50%; transform: translateX(-50%); z-index: 3; */
            width: 100%; /* Ensure it takes full width of its parent (.section-top-20) */
            text-align: center;
        }

        #testimonials .testimonials-content {
            height: 100%; /* Make it fill the parent .section-content (which is 80vh) */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .testimonial-container {
            width: 90%; /* Overall container width for desktop */
            max-width: 1000px;
            height: 60vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center; /* Center the slider and controls as a group */
            gap: 2rem; /* Space between slider and controls */
        }

        .testimonial-slider {
            flex-grow: 0; /* Prevent growing */
            flex-shrink: 0; /* Prevent shrinking */
            width: 600px; /* Fixed width for the slider on desktop */
            max-width: 90%; /* Max width relative to container, for smaller desktop screens */
            height: 100%;
            overflow: hidden;
            border-radius: 12px;
        }

        .testimonial-track {
            width: 300%;
            height: 100%;
            display: flex;
            transition: transform 0.6s ease;
        }

        .testimonial-slide {
            flex: 0 0 33.333%;
            height: 100%;
            position: relative;
        }

        .testimonial-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.9));
            color: white;
            padding: 2rem;
        }

        .testimonial-controls {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            min-width: 80px; /* Ensure controls have minimum width */
            text-align: center; /* Center text inside controls */
        }

        .testimonial-btn {
            background: rgb(255, 119, 0); /* Vibrant orange background */
            border: none; /* No border */
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: bold; /* Make text bold */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Subtle shadow */
        }

        .testimonial-btn:hover {
            background: rgb(200, 90, 0); /* Slightly darker orange on hover */
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4); /* Enhanced shadow on hover */
        }

        /* Signature Projects - Individual Sections */
        .project-section {
            position: relative;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .project-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .project-content {
            position: relative;
            z-index: 2;
            height: 80vh;
            display: flex;
            align-items: center;
            padding: 0 5%;
        }

        .project-info {
            max-width: 600px;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            padding: 3rem;
            border-radius: 16px;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .project-info h2 {
            font-size: 2.5rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .project-info p {
            font-size: 1.1rem;
            line-height: 1.6;
            opacity: 0.9;
        }

        /* More Projects - Improved */
        .more-projects-section {
            background: linear-gradient(to bottom, #002b5c, #004080);
            color: white;
            position: relative;
        }

        .more-projects-content {
            height: 80vh;
            display: flex;
            align-items: end;
            padding-bottom: 2rem;
        }

        .project-title-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .projects-list-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            height: 60vh;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .project-thumb {
            max-width: 140px;
            text-align: center;
            color: #fff;
            font-size: 0.9rem;
        }

        .project-thumb img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-thumb:hover img {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.4);
        }

        .project-thumb p {
            margin-top: 0.8rem;
            line-height: 1.3;
        }

        /* Turnover Section */
        .turnover-section {
            background: url('https://images.unsplash.com/photo-1713111936537-4fa78ba3bf4d?q=80&w=1025&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') center center / cover no-repeat;
            position: relative;
        }

        .turnover-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 50, 0.6);
            backdrop-filter: blur(4px);
            z-index: 1;
        }

        .turnover-content {
            position: relative;
            z-index: 2;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 16px;
            padding: 30px;
            color: #fff;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(255, 255, 255, 0.2);
        }

        .turnover-card h4 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .turnover-card .amount {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .turnover-card .growth {
            font-size: 1rem;
            color: #b5ffb5;
        }

        /* Footer */
        .footer-nav-glass {
            position: absolute;
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
            .scroll-wrapper {
                display: none;
            }

            .mobile-container {
                display: block;
            }

            .scroll-indicators {
                display: none;
            }

            .mobile-carousel .overlay {
                font-size: 3rem;
            }

            .services-list h2 {
                font-size: 1.8rem;
            }

            .area-cards-container {
                flex-direction: column;
                height: auto;
            }

            .area-card {
                height: 40vh;
                min-height: 300px;
                margin: 2px 0;
            }

            .overlay-text {
                height: 100px;
            }

            .overlay-text h4 {
                font-size: 0.9rem;
            }

            .overlay-text p {
                font-size: 0.8rem;
            }

            .project-info {
                padding: 1.5rem;
            }

            .project-info h2 {
                font-size: 1.5rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .nav-item {
                margin: 0px 1rem;
            }

            .mobile-carousel .carousel-item {
                height: 60vh;
            }

            .footer-nav-glass {
                position: relative;
            }

            .testimonial-container {
                width: 90%; /* Mobile width */
                flex-direction: column; /* Stack controls and slider vertically */
                height: auto;
                gap: 1rem; /* Adjust gap for mobile */
            }

            .testimonial-slider {
                width: 100%; /* Full width on mobile */
                max-width: none; /* No max-width on mobile */
                height: 300px; /* Fixed height for mobile slider */
                margin: 0; /* Remove margin on mobile */
            }

            .testimonial-controls {
                flex-direction: row; /* Controls side-by-side on mobile */
                justify-content: center;
                width: 100%;
                min-width: auto; /* Remove min-width on mobile */
            }

            /* Mobile specific styles */
            .mobile-area-card {
                background-size: cover;
                background-position: center;
                height: auto; /* Changed from 35vh */
                min-height: 250px; /* Keep min-height */
                margin: 0.5rem auto; /* Center the card */
                position: relative;
                display: flex;
                align-items: end;
                justify-content: center;
                border-radius: 8px;
                overflow: hidden;
                width: 90%; /* Ensure it takes up a good width on mobile */
                max-width: 400px; /* Prevent it from getting too wide on tablets */
            }

            .mobile-area-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.1) 100%);
                z-index: 1;
            }

            .mobile-area-card .overlay-text {
                padding: 1rem; /* Adjusted padding for mobile */
                height: auto; /* Let content dictate height */
                min-height: 80px; /* Ensure minimum height for text area */
            }

            .mobile-area-card .overlay-text h4 {
                font-size: 0.9rem; /* Ensure good size */
            }

            .mobile-area-card .overlay-text p {
                font-size: 0.8rem; /* Ensure good size */
            }

            /* New style for mobile testimonial cards */
            .mobile-testimonial-card {
                background: rgba(255, 255, 255, 0.08); /* Slightly more opaque for better contrast */
                backdrop-filter: blur(10px);
                border-radius: 12px;
                padding: 1.5rem; /* Good padding */
                margin: 1rem auto; /* Spacing between cards and center */
                border: 1px solid rgba(255, 255, 255, 0.1);
                color: white; /* Ensure text is white */
                text-align: center; /* Center text within the card */
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); /* Add a subtle shadow */
                width: 90%; /* Ensure it takes up a good width on mobile */
                max-width: 400px; /* Prevent it from getting too wide on tablets */
            }

            .mobile-testimonial-card h4 {
                font-size: 1.2rem; /* Larger heading */
                margin-bottom: 0.8rem;
                font-weight: bold;
            }

            .mobile-testimonial-card p {
                font-size: 0.95rem; /* Readable paragraph text */
                line-height: 1.5;
                margin-bottom: 0.5rem;
            }

            .mobile-testimonial-card small {
                font-size: 0.85rem; /* Readable small text */
                opacity: 0.8;
            }

            /* Ensure the mobile testimonials section itself has proper alignment */
            .mobile-section #testimonials .section-content {
                display: flex;
                flex-direction: column;
                align-items: center; /* Center the cards */
                justify-content: flex-start; /* Align content to the top */
                padding: 1rem; /* Ensure overall padding */
            }

            /* Revert .section-top-20 and .section-content for mobile */
            .mobile-section .section-top-20 {
                height: auto;
                padding-top: 2rem; /* Add some top padding for mobile headers */
                padding-bottom: 1rem;
                width: 100%; /* Ensure it takes full width */
                text-align: center; /* Center text for mobile headers */
            }
            .mobile-section .section-content {
                height: auto; /* Revert to auto height for mobile */
                padding-bottom: 2rem; /* Adjust padding for mobile content */
                width: 100%; /* Ensure it takes full width */
                display: flex; /* Make it a flex container for its children (the row) */
                flex-direction: column; /* Stack the row vertically if needed, though row already handles this */
                align-items: center; /* Center children (the row) horizontally */
                justify-content: flex-start; /* Align content to the top within this section */
            }

            /* Ensure the row within section-content is also centered and takes full width */
            .mobile-section .section-content .row {
                width: 100%;
                justify-content: center; /* Center columns within the row */
                margin-left: 0; /* Remove negative margins if they cause issues */
                margin-right: 0;
            }

            /* Ensure individual col-12 elements are centered if they contain smaller content */
            .mobile-section .section-content .col-12 {
                display: flex;
                justify-content: center;
                width: 100%; /* Ensure it takes full width */
            }

            /* Specific mobile header font sizes */
            .mobile-section #areaofoperation h1,
            .mobile-section #testimonials h1 {
                font-size: 1.8rem;
            }

            /* Ensure testimonial-content inside mobile testimonials section also adapts */
            .mobile-section #testimonials .testimonials-content {
                height: auto;
                padding: 1rem;
                /* Ensure this also stacks its children if needed */
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
            }

            /* New style for mobile project cards */
            .mobile-project-card {
                background: rgba(255, 255, 255, 0.08);
                backdrop-filter: blur(10px);
                border-radius: 12px;
                padding: 1.5rem;
                border: 1px solid rgba(255, 255, 255, 0.1);
                color: white;
                text-align: center; /* Center text inside */
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                width: 90%; /* Give it a defined width */
                max-width: 400px; /* Max width for larger mobile devices */
                margin: 0 auto; /* Center the card itself */
            }
        }

        @media (max-width: 576px) {
            .mobile-carousel .overlay {
                font-size: 2rem;
            }

            .services-list h2 {
                font-size: 1.5rem;
            }

            .services-list ul li {
                font-size: 0.8rem;
                padding: 0.2rem 0.6rem;
                margin: 0.3rem;
            }

            .mobile-area-card {
                height: auto; /* Ensure it remains auto */
                min-height: 200px; /* Slightly smaller min-height for very small screens */
            }

            .overlay-text h4 {
                font-size: 0.8rem;
            }

            .overlay-text p {
                font-size: 0.75rem;
            }

            .project-info h2 {
                font-size: 1.2rem;
            }

            .project-info p {
                font-size: 0.9rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .turnover-card {
                padding: 20px;
            }

            .footer-nav-glass {
                font-size: 12px;
            }

            .footer-nav-glass a {
                margin: 0 8px;
            }

            .mobile-carousel .carousel-item {
                height: 50vh;
            }

            .project-thumb img {
                width: 80px;
                height: 80px;
            }

            .project-thumb {
                max-width: 120px;
                font-size: 0.8rem;
            }

            .mobile-section #areaofoperation h1,
            .mobile-section #testimonials h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
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
        <button class="scroll-dot" data-section="10"></button>
        <button class="scroll-dot" data-section="11"></button>
    </div>

    <!-- Desktop Scroll Container -->
    <div class="scroll-wrapper">
        <div class="scroll-container" id="scrollContainer">
            <!-- Hero Section -->
            <section id="hero" class="scroll-section">
                <div class="section-content">
                    <div id="carouselExample" class="carousel slide w-100 h-100" data-bs-ride="carousel">
                        <div class="carousel-inner h-100">
                            <div class="carousel-item active">
                                <img src="/placeholder.svg?height=800&width=1200&text=Construction+Site" class="d-block w-100 h-100" alt="Construction Site" data-bs-interval="6000">
                                <div class="overlay">
                                    Building Tomorrow
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="/placeholder.svg?height=800&width=1200&text=Engineering+Excellence" class="d-block w-100 h-100" alt="Engineering Project" data-bs-interval="6000">
                                <div class="overlay">
                                    Engineering Excellence
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="/placeholder.svg?height=800&width=1200&text=Infrastructure+Leaders" class="d-block w-100 h-100" alt="Infrastructure" data-bs-interval="6000">
                                <div class="overlay">
                                    Infrastructure Leaders
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="/placeholder.svg?height=800&width=1200&text=Global+Projects" class="d-block w-100 h-100" alt="Global Projects" data-bs-interval="6000">
                                <div class="overlay">Global Projects</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Services Section 1 -->
            <section id="services-1" class="scroll-section">
                <div class="section-content w-100 d-flex flex-column justify-content-center align-items-center text-center text-white px-3">
                    <h2 class="display-4 fw-bold mb-4">Explore Our Capabilities</h2>
                    <p class="lead fs-3">Innovative solutions with a modern approach</p>
                </div>
            </section>

            <!-- Services Section 2 -->
            <section id="services-2" class="scroll-section">
                <div class="section-content w-100 d-flex justify-content-center align-items-center">
                    <h1 class="text-white display-2 fw-bold">Our Services</h1>
                </div>
            </section>

            <!-- Services Section 3 -->
            <section id="services-3" class="scroll-section">
                <div class="services-bg">
                    <img src="/placeholder.svg?height=800&width=1200&text=Tunnel+Construction" alt="Tunnel Construction" />
                </div>
                <div class="section-content">
                    <div class="services-list text-white text-center position-relative z-2 w-100">
                        <h2 class="mb-4 fw-bold">Our Services</h2>
                        <ul class="list-inline fs-5">
                            <li class="list-inline-item mx-3">Tunneling</li>
                            <li class="list-inline-item mx-3">Marine Works</li>
                            <li class="list-inline-item mx-3">Metro Projects</li>
                            <li class="list-inline-item mx-3">Bridges</li>
                            <li class="list-inline-item mx-3">Highways</li>
                            <li class="list-inline-item mx-3">Railways</li>
                            <li class="list-inline-item mx-3">Urban Infra</li>
                            <li class="list-inline-item mx-3">Industrial EPC</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Area of Operation - Improved -->
            <section id="areaofoperation" class="scroll-section position-relative text-white">
                <div class="section-top-20">
                    <div class="area-overlay text-center py-3">
                        <h1 class="display-5 fw-bold">AREAS OF OPERATION</h1>
                    </div>
                </div>
                <div class="section-content">
                    <div class="area-cards-container w-100">
                        <div class="area-card position-relative" style="background-image: url('/placeholder.svg?height=600&width=400&text=Marine+Industrial');">
                            <div class="overlay-text">
                                <h4>MARINE & INDUSTRIAL</h4>
                                <p>Nouakchott Container Terminal, Mauritania</p>
                            </div>
                            <a href="#" class="know-more">Know More</a>
                        </div>
                        <div class="area-card position-relative" style="background-image: url('/placeholder.svg?height=600&width=400&text=Surface+Transport');">
                            <div class="overlay-text">
                                <h4>SURFACE TRANSPORT</h4>
                                <p>Samruddhi Mahamarg, Maharashtra, India</p>
                            </div>
                            <a href="#" class="know-more">Know More</a>
                        </div>
                        <div class="area-card position-relative" style="background-image: url('/placeholder.svg?height=600&width=400&text=Oil+Gas');">
                            <div class="overlay-text">
                                <h4>OIL & GAS</h4>
                            <p>HRD Process Platform, Mumbai High, India</p>
                            </div>
                            <a href="#" class="know-more">Know More</a>
                        </div>
                        <div class="area-card position-relative" style="background-image: url('/placeholder.svg?height=600&width=400&text=Hydro+Underground');">
                            <div class="overlay-text">
                                <h4>HYDRO & UNDERGROUND</h4>
                                <p>Atal Tunnel, Himachal Pradesh, India</p>
                            </div>
                            <a href="#" class="know-more">Know More</a>
                        </div>
                        <div class="area-card position-relative" style="background-image: url('/placeholder.svg?height=600&width=400&text=Urban+Infrastructure');">
                            <div class="overlay-text">
                                <h4>URBAN INFRASTRUCTURE</h4>
                                <p>East-West Metro, Kolkata, India</p>
                            </div>
                            <a href="#" class="know-more">Know More</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials - Improved -->
            <section id="testimonials" class="scroll-section">
                <div class="section-top-20">
                    <div class="testimonials-header text-center">
                        <h1 class="display-6 fw-bold">VALIDATIONS</h1>
                    </div>
                </div>
                <div class="section-content">
                    <div class="testimonials-content">
                        <div class="testimonial-container">
                            <div class="testimonial-controls">
                                <button class="testimonial-btn" id="prevTestimonial">
                                    <i class="fas fa-chevron-up"></i> PREV
                                </button>
                                <button class="testimonial-btn" id="nextTestimonial">
                                    <i class="fas fa-chevron-down"></i> NEXT
                                </button>
                            </div>
                            
                            <div class="testimonial-slider">
                                <div class="testimonial-track" id="testimonialTrack">
                                    <div class="testimonial-slide">
                                        <img src="/placeholder.svg?height=400&width=600&text=Client+Testimonial+1" alt="Testimonial 1">
                                        <div class="testimonial-content">
                                            <h4>"Outstanding Engineering Excellence"</h4>
                                            <p>R&C delivered our marine terminal project ahead of schedule with exceptional quality standards.</p>
                                            <small>- Port Authority, Mauritania</small>
                                        </div>
                                    </div>
                                    <div class="testimonial-slide">
                                        <img src="/placeholder.svg?height=400&width=600&text=Client+Testimonial+2" alt="Testimonial 2">
                                        <div class="testimonial-content">
                                            <h4>"Innovative Infrastructure Solutions"</h4>
                                            <p>The tunnel project showcased remarkable engineering capabilities and attention to safety.</p>
                                            <small>- Highway Development Authority, India</small>
                                        </div>
                                    </div>
                                    <div class="testimonial-slide">
                                        <img src="/placeholder.svg?height=400&width=600&text=Client+Testimonial+3" alt="Testimonial 3">
                                        <div class="testimonial-content">
                                            <h4>"Reliable Project Execution"</h4>
                                            <p>Consistent delivery of complex metro projects with world-class standards and timely completion.</p>
                                            <small>- Metro Rail Corporation, India</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Signature Projects Title -->
            <section class="scroll-section bg-dark text-white">
                <div class="section-content">
                    <div class="text-center">
                        <h1 class="display-2 fw-bold">SIGNATURE PROJECTS</h1>
                        <p class="lead">Engineering marvels that define our legacy</p>
                    </div>
                </div>
            </section>

            <!-- Project 1: Chenab Bridge -->
            <section class="scroll-section project-section" style="background-image: url('/placeholder.svg?height=800&width=1200&text=Chenab+Railway+Bridge');">
                <div class="section-content">
                    <div class="project-content">
                        <div class="project-info">
                            <h2>Chenab Railway Bridge, India</h2>
                            <p>The tallest single arch railway bridge in the world, standing 359 meters above the Chenab River. This engineering marvel is designed to withstand blast loads, extreme weather conditions, and seismic activities, connecting the remote valleys of Kashmir with the rest of India.</p>
                            <div class="mt-3">
                                <span class="badge bg-primary me-2">World's Tallest</span>
                                <span class="badge bg-success me-2">Blast Resistant</span>
                                <span class="badge bg-warning">Seismic Safe</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Project 2: Mumbai Metro -->
            <section class="scroll-section project-section" style="background-image: url('/placeholder.svg?height=800&width=1200&text=Mumbai+Metro+Underground');">
                <div class="section-content">
                    <div class="project-content justify-content-end">
                        <div class="project-info">
                            <h2>Mumbai Metro Underground</h2>
                            <p>Revolutionizing public transport in Mumbai through state-of-the-art underground infrastructure. This project involves complex tunneling through high-density urban zones, featuring advanced safety systems and modern passenger amenities.</p>
                            <div class="mt-3">
                                <span class="badge bg-info me-2">Urban Transit</span>
                                <span class="badge bg-secondary me-2">Underground</span>
                                <span class="badge bg-success">High Capacity</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Project 3: Atal Tunnel -->
            <section class="scroll-section project-section" style="background-image: url('/placeholder.svg?height=800&width=1200&text=Atal+Tunnel+Himachal');">
                <div class="section-content">
                    <div class="project-content">
                        <div class="project-info">
                            <h2>Atal Tunnel, Himachal Pradesh</h2>
                            <p>The longest highway tunnel above 10,000 feet, connecting the remote Lahaul-Spiti valley with the rest of Himachal Pradesh. This strategic tunnel reduces travel time and provides year-round connectivity, withstanding extreme weather conditions and avalanches.</p>
                            <div class="mt-3">
                                <span class="badge bg-primary me-2">Highest Altitude</span>
                                <span class="badge bg-danger me-2">Weather Resistant</span>
                                <span class="badge bg-success">Strategic Importance</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Project 4: Port Terminal -->
            <section class="scroll-section project-section" style="background-image: url('/placeholder.svg?height=800&width=1200&text=Port+Terminal+Mauritania');">
                <div class="section-content">
                    <div class="project-content justify-content-end">
                        <div class="project-info">
                            <h2>Port Terminal, Mauritania</h2>
                            <p>A critical marine infrastructure project that has transformed Mauritania into a major logistics hub for West Africa. The terminal features cutting-edge port facilities, advanced cargo handling systems, and sustainable design principles.</p>
                            <div class="mt-3">
                                <span class="badge bg-primary me-2">Marine Engineering</span>
                                <span class="badge bg-info me-2">Logistics Hub</span>
                                <span class="badge bg-success">Sustainable Design</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- More Projects - Improved -->
            <section class="scroll-section more-projects-section">
                <div class="section-content">
                    <div class="more-projects-content container-fluid">
                        <div class="row g-4 h-100 align-items-end">
                            <div class="col-lg-4 col-md-5">
                                <div class="project-title-card">
                                    <div class="text-center">
                                        <h2 class="text-white display-6 fw-bold">Our Other Projects</h2>
                                        <p class="text-white-50">Expanding horizons across continents</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="projects-list-card">
                                    <div class="project-thumb">
                                        <img src="/placeholder.svg?height=120&width=120&text=Lusaka+Project" alt="Lusaka Project">
                                        <p>Lusaka City<br>Decongestion Project<br><small>Zambia</small></p>
                                    </div>
                                    <div class="project-thumb">
                                        <img src="/placeholder.svg?height=120&width=120&text=Samruddhi+Highway" alt="Samruddhi Project">
                                        <p>Maharashtra Samruddhi<br>Mahamarg<br><small>India</small></p>
                                    </div>
                                    <div class="project-thumb">
                                        <img src="/placeholder.svg?height=120&width=120&text=LNG+Tanks" alt="LNG Tanks">
                                        <p>LNG Storage<br>Tanks<br><small>India</small></p>
                                    </div>
                                    <div class="project-thumb">
                                        <img src="/placeholder.svg?height=120&width=120&text=Sohar+Jetty" alt="Sohar Jetty">
                                        <p>Sohar Port<br>Jetty<br><small>Oman</small></p>
                                    </div>
                                    <div class="project-thumb">
                                        <img src="/placeholder.svg?height=120&width=120&text=Jammu+Highway" alt="Jammu Highway">
                                        <p>Jammu Udhampur<br>Highway<br><small>India</small></p>
                                    </div>
                                    <div class="project-thumb">
                                        <img src="/placeholder.svg?height=120&width=120&text=Delhi+Metro" alt="Delhi Metro">
                                        <p>Delhi Metro<br>Extension<br><small>India</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Turnover Section -->
            <section class="scroll-section turnover-section d-flex align-items-center justify-content-center position-relative">
                <div class="section-content">
                    <div class="turnover-content container text-center">
                        <h2 class="section-title text-white mb-5">Our Turnover Over the Years</h2>
                        <div class="row justify-content-center gy-4">
                            <div class="col-md-4">
                                <div class="turnover-card glass-card">
                                    <h4>2021-22</h4>
                                    <p class="amount">₹ 6,200 Cr</p>
                                    <p class="growth">+14% YoY</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="turnover-card glass-card">
                                    <h4>2022-23</h4>
                                    <p class="amount">₹ 7,100 Cr</p>
                                    <p class="growth">+15% YoY</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="turnover-card glass-card">
                                    <h4>2023-24</h4>
                                    <p class="amount">₹ 8,200 Cr</p>
                                    <p class="growth">+16% YoY</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer positioned absolutely at bottom of this section -->
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
            </section>
        </div>
    </div>

    <!-- Mobile Container -->
    <div class="mobile-container">
        <!-- Mobile Hero -->
        <section class="mobile-section">
            <div class="mobile-carousel carousel slide w-100" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/placeholder.svg?height=400&width=800&text=Building+Tomorrow" class="d-block w-100" alt="Construction Site">
                        <div class="overlay">
                            Building Tomorrow
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/placeholder.svg?height=400&width=800&text=Engineering+Excellence" class="d-block w-100" alt="Engineering Project">
                        <div class="overlay">
                            Engineering Excellence
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/placeholder.svg?height=400&width=800&text=Infrastructure+Leaders" class="d-block w-100" alt="Infrastructure">
                        <div class="overlay">
                            Infrastructure Leaders
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mobile Services Section 1 -->
        <section class="mobile-section mobile-services-1">
            <div class="container text-center text-white">
                <h2 class="display-5 fw-bold mb-4">Explore Our Capabilities</h2>
                <p class="lead">Innovative solutions with a modern approach</p>
            </div>
        </section>

        <!-- Mobile Services Section 2 -->
        <section class="mobile-section mobile-services-2">
            <div class="container text-center">
                <h1 class="text-white display-4 fw-bold">Our Services</h1>
            </div>
        </section>

        <!-- Mobile Services Section 3 -->
        <section class="mobile-section mobile-services-3">
            <div class="services-bg">
                <img src="/placeholder.svg?height=400&width=800&text=Tunnel+Construction" alt="Tunnel Construction" />
            </div>
            <div class="services-list text-white text-center position-relative z-2 w-100 p-4">
                <h2 class="mb-4 fw-bold">Our Services</h2>
                <ul class="list-inline">
                    <li class="list-inline-item">Tunneling</li>
                    <li class="list-inline-item">Marine Works</li>
                    <li class="list-inline-item">Metro Projects</li>
                    <li class="list-inline-item">Bridges</li>
                    <li class="list-inline-item">Highways</li>
                    <li class="list-inline-item">Railways</li>
                    <li class="list-inline-item">Urban Infra</li>
                    <li class="list-inline-item">Industrial EPC</li>
                </ul>
            </div>
        </section>

        <!-- Mobile Area of Operation -->
        <section class="mobile-section" style="background: #000;">
            <div class="section-top-20">
                <h1 class="display-6 fw-bold text-center">AREAS OF OPERATION</h1>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-area-card mb-3" style="background-image: url('/placeholder.svg?height=300&width=800&text=Marine+Industrial');">
                            <div class="overlay-text">
                                <h4>MARINE & INDUSTRIAL</h4>
                                <p>Nouakchott Container Terminal, Mauritania</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-area-card mb-3" style="background-image: url('/placeholder.svg?height=300&width=800&text=Surface+Transport');">
                            <div class="overlay-text">
                                <h4>SURFACE TRANSPORT</h4>
                                <p>Samruddhi Mahamarg, Maharashtra, India</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-area-card mb-3" style="background-image: url('/placeholder.svg?height=300&width=800&text=Oil+Gas');">
                            <div class="overlay-text">
                                <h4>OIL & GAS</h4>
                                <p>HRD Process Platform, Mumbai High, India</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-area-card mb-3" style="background-image: url('/placeholder.svg?height=300&width=800&text=Hydro+Underground');">
                            <div class="overlay-text">
                                <h4>HYDRO & UNDERGROUND</h4>
                                <p>Atal Tunnel, Himachal Pradesh, India</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-area-card mb-3" style="background-image: url('/placeholder.svg?height=300&width=800&text=Urban+Infrastructure');">
                            <div class="overlay-text">
                                <h4>URBAN INFRASTRUCTURE</h4>
                                <p>East-West Metro, Kolkata, India</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mobile Testimonials -->
        <section class="mobile-section position-relative" style="background: url('/placeholder.svg?height=400&width=800&text=Testimonials+Background') center/cover;">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>
            <div class="section-top-20">
                <h1 class="display-6 fw-bold text-center">VALIDATIONS</h1>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-12 mb-4 d-flex justify-content-center">
                        <div class="mobile-testimonial-card">
                            <h4>"Outstanding Engineering Excellence"</h4>
                            <p>R&C delivered our marine terminal project ahead of schedule with exceptional quality standards.</p>
                            <small>- Port Authority, Mauritania</small>
                        </div>
                    </div>
                    <div class="col-12 mb-4 d-flex justify-content-center">
                        <div class="mobile-testimonial-card">
                            <h4>"Innovative Infrastructure Solutions"</h4>
                            <p>The tunnel project showcased remarkable engineering capabilities and attention to safety.</p>
                            <small>- Highway Development Authority, India</small>
                        </div>
                    </div>
                    <div class="col-12 mb-4 d-flex justify-content-center">
                        <div class="mobile-testimonial-card">
                            <h4>"Reliable Project Execution"</h4>
                            <p>Consistent delivery of complex metro projects with world-class standards and timely completion.</p>
                            <small>- Metro Rail Corporation, India</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mobile Signature Projects Title -->
        <section class="mobile-section bg-dark text-white">
            <div class="container text-center">
                <h1 class="display-4 fw-bold mb-3">SIGNATURE PROJECTS</h1>
                <p class="lead">Engineering marvels that define our legacy</p>
            </div>
        </section>

        <!-- Mobile Signature Projects -->
        <section class="mobile-section" style="background: #000;">
            <div class="container text-white">
                <div class="row gy-4">
                    <div class="col-12">
                        <div class="mobile-project-card">
                            <h3 class="fw-bold text-primary">Chenab Railway Bridge, India</h3>
                            <p>The tallest single arch railway bridge in the world, standing 359 meters above the Chenab River. Engineered to withstand blast loads and extreme conditions.</p>
                            <div class="mt-2">
                                <span class="badge bg-primary me-1">World's Tallest</span>
                                <span class="badge bg-success me-1">Blast Resistant</span>
                                <span class="badge bg-warning">Seismic Safe</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-project-card">
                            <h3 class="fw-bold text-info">Mumbai Metro Underground</h3>
                            <p>Revolutionizing public transport through state-of-the-art underground infrastructure in high-density urban zones.</p>
                            <div class="mt-2">
                                <span class="badge bg-info me-1">Urban Transit</span>
                                <span class="badge bg-secondary me-1">Underground</span>
                                <span class="badge bg-success">High Capacity</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-project-card">
                            <h3 class="fw-bold text-success">Atal Tunnel, Himachal Pradesh</h3>
                            <p>The longest highway tunnel above 10,000 feet, connecting remote valleys and withstanding extreme weather conditions.</p>
                            <div class="mt-2">
                                <span class="badge bg-primary me-1">Highest Altitude</span>
                                <span class="badge bg-danger me-1">Weather Resistant</span>
                                <span class="badge bg-success">Strategic</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-project-card">
                            <h3 class="fw-bold text-warning">Port Terminal, Mauritania</h3>
                            <p>A critical marine infrastructure project improving Africa's logistics hub with cutting-edge port facilities.</p>
                            <div class="mt-2">
                                <span class="badge bg-primary me-1">Marine Engineering</span>
                                <span class="badge bg-info me-1">Logistics Hub</span>
                                <span class="badge bg-success">Sustainable</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mobile More Projects -->
        <section class="mobile-section more-projects-section">
            <div class="container">
                <h2 class="text-white text-center mb-4 display-6 fw-bold">Our Other Projects</h2>
                <p class="text-center text-white-50 mb-4">Expanding horizons across continents</p>
                <div class="row gy-3">
                    <div class="col-6 col-md-4">
                        <div class="project-thumb text-center">
                            <img src="/placeholder.svg?height=100&width=100&text=Lusaka" alt="Lusaka Project">
                            <p class="mt-2">Lusaka City Project<br><small>Zambia</small></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="project-thumb text-center">
                            <img src="/placeholder.svg?height=100&width=100&text=Highway" alt="Samruddhi Highway">
                            <p class="mt-2">Samruddhi Mahamarg<br><small>India</small></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="project-thumb text-center">
                            <img src="/placeholder.svg?height=100&width=100&text=LNG" alt="LNG Tanks">
                            <p class="mt-2">LNG Storage Tanks<br><small>India</small></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="project-thumb text-center">
                            <img src="/placeholder.svg?height=100&width=100&text=Jetty" alt="Sohar Jetty">
                            <p class="mt-2">Sohar Port Jetty<br><small>Oman</small></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="project-thumb text-center">
                            <img src="/placeholder.svg?height=100&width=100&text=Highway" alt="Jammu Highway">
                            <p class="mt-2">Jammu Udhampur Highway<br><small>India</small></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="project-thumb text-center">
                            <img src="/placeholder.svg?height=100&width=100&text=Metro" alt="Delhi Metro">
                            <p class="mt-2">Delhi Metro Extension<br><small>India</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mobile Turnover -->
        <section class="mobile-section turnover-section position-relative">
            <div class="container turnover-content text-center">
                <h2 class="section-title text-white mb-4">Our Turnover Over the Years</h2>
                <div class="row gy-3">
                    <div class="col-12">
                        <div class="turnover-card glass-card">
                            <h4>2021-22</h4>
                            <p class="amount">₹ 6,200 Cr</p>
                            <p class="growth">+14% YoY</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="turnover-card glass-card">
                            <h4>2022-23</h4>
                            <p class="amount">₹ 7,100 Cr</p>
                            <p class="growth">+15% YoY</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="turnover-card glass-card">
                            <h4>2023-24</h4>
                            <p class="amount">₹ 8,200 Cr</p>
                            <p class="growth">+16% YoY</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mobile Footer -->
        <footer class="footer-nav-glass">
            <div class="container d-flex justify-content-center align-items-center flex-wrap">
                <a href="#">Be a Vendor</a>
                <a href="#">Investors</a>
                <a href="#">Contact Us</a>
                <a href="#">About Us</a>
                <a href="#">Careers</a>
                <div class="social-icons ms-3">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

    <script>
        // Check if device is mobile
        function isMobile() {
            return window.innerWidth <= 992;
        }

        // Testimonials functionality - Improved
        let currentTestimonial = 0;
        const testimonialTrack = document.getElementById("testimonialTrack");
        const totalTestimonials = 3;

        function updateTestimonialSlider() {
            if (testimonialTrack) {
                const translateX = -currentTestimonial * 33.333;
                testimonialTrack.style.transform = `translateX(${translateX}%)`;
            }
        }

        // Testimonial navigation
        const nextTestimonialBtn = document.getElementById("nextTestimonial");
        const prevTestimonialBtn = document.getElementById("prevTestimonial");

        if (nextTestimonialBtn) {
            nextTestimonialBtn.addEventListener("click", () => {
                currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
                updateTestimonialSlider();
            });
        }

        if (prevTestimonialBtn) {
            prevTestimonialBtn.addEventListener("click", () => {
                currentTestimonial = (currentTestimonial - 1 + totalTestimonials) % totalTestimonials;
                updateTestimonialSlider();
            });
        }

        // Auto-advance testimonials
        setInterval(() => {
            if (!isMobile()) {
                currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
                updateTestimonialSlider();
            }
        }, 5000);

        // Desktop scroll animation functionality - Enhanced
        document.addEventListener("DOMContentLoaded", () => {
            if (isMobile()) return;

            const scrollContainer = document.getElementById("scrollContainer");
            const sections = document.querySelectorAll(".scroll-section");
            const scrollDots = document.querySelectorAll(".scroll-dot");
            let currentSection = 0;
            let isScrolling = false;

            // Enhanced Hammer.js setup
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

            // Enhanced Hammer.js events
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

            // Swipe events for additional gesture support
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

            // Touch support for mobile fallback
            let touchStartY = 0;
            let touchEndY = 0;

            document.addEventListener("touchstart", (e) => {
                touchStartY = e.changedTouches[0].screenY;
            }, { passive: true });

            document.addEventListener("touchend", (e) => {
                touchEndY = e.changedTouches[0].screenY;
                handleSwipe();
            }, { passive: true });

            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartY - touchEndY;
                
                if (Math.abs(diff) > swipeThreshold && !isScrolling) {
                    if (diff > 0 && currentSection < sections.length - 1) {
                        scrollToSection(currentSection + 1);
                    } else if (diff < 0 && currentSection > 0) {
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

            // Enhanced keyboard navigation
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
            updateTestimonialSlider();
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if ((window.innerWidth <= 992 && !document.querySelector('.mobile-container').style.display) ||
                (window.innerWidth > 992 && document.querySelector('.mobile-container').style.display !== 'none')) {
                location.reload();
            }
        });

        // Smooth scroll for navbar links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                if (isMobile()) return; // Let default behavior work on mobile
                
                e.preventDefault();
                const targetId = link.getAttribute('href');
                const targetSection = document.querySelector(targetId);
                
                if (targetSection) {
                    const sectionIndex = Array.from(document.querySelectorAll('.scroll-section')).indexOf(targetSection);
                    if (sectionIndex !== -1) {
                        scrollToSection(sectionIndex);
                    }
                }
            });
        });
    </script>
</body>
</html>
