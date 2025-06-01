<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Parque Cafe Landing Page</title>
        <link rel="stylesheet" href="mainpage.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    </head>
    <body>
        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <i class="fa-solid fa-mug-hot"></i>
                    <span>Parque Cafe</span>
                </div>

                <div class="nav-links" id="navLinks">
                    <a href="#home">Home</a>
                    <a href="#menu">Menu</a>
                    <a href="#about">About</a>
                    <a href="#location">Location</a>
                    <button class="order-btn">Login</button>
                </div>

                <div class="menu-toggle" id="menuToggle">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            <!-- Hero Section -->
            <section id="home" class="hero">
                <div class="hero-content">
                    <h1>Parque Cafe</h1>
                    <p>Where every cup tells a story of craftsmanship and passion</p>
                    <button class="cta-btn">Explore Our Menu <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </section>

            <!-- Featured Coffee Section -->
            <section id="menu" class="featured-coffee">
                <div class="container">
                    <div class="section-header">
                        <div class="title-with-icon">
                            <i class="fa-solid fa-mug-hot"></i>
                            <h2>Our Specialty Coffee</h2>
                        </div>
                        <p>Handcrafted with love and precision</p>
                    </div>

                    <!-- Specialty Coffees here -->
                    <div class="coffee-grid">
                        <div class="coffee-card">
                            <div class="coffee-img">
                                <img src="#" alt="Text Here"/>
                            </div>
                            <div class="coffee-header">
                                <h3>LOREM IPSUM</h3>
                                <p class="price">₱ 100</p>
                            </div>
                            <div class="coffee-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div>
                            <div class="coffee-footer">
                                <button>Order Now</button>
                            </div>
                        </div>

                        <div class="coffee-card">
                            <div class="coffee-img">
                                <img src="#" alt="Text Here"/>
                            </div>
                            <div class="coffee-header">
                                <h3>LOREM IPSUM</h3>
                                <p class="price">₱ 100</p>
                            </div>
                            <div class="coffee-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div>
                            <div class="coffee-footer">
                                <button>Order Now</button>
                            </div>
                        </div>

                        <div class="coffee-card">
                            <div class="coffee-img">
                                <img src="#" alt="Text Here"/>
                            </div>
                            <div class="coffee-header">
                                <h3>LOREM IPSUM</h3>
                                <p class="price">₱ 100</p>
                            </div>
                            <div class="coffee-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div>
                            <div class="coffee-footer">
                                <button>Order Now</button>
                            </div>
                        </div>

                        <div class="coffee-card">
                            <div class="coffee-img">
                                <img src="#" alt="Text Here"/>
                            </div>
                            <div class="coffee-header">
                                <h3>LOREM IPSUM</h3>
                                <p class="price">₱ 100</p>
                            </div>
                            <div class="coffee-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div>
                            <div class="coffee-footer">
                                <button>Order Now</button>
                            </div>
                        </div>

                        <div class="coffee-card">
                            <div class="coffee-img">
                                <img src="#" alt="Text Here"/>
                            </div>
                            <div class="coffee-header">
                                <h3>LOREM IPSUM</h3>
                                <p class="price">₱ 100</p>
                            </div>
                            <div class="coffee-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div>
                            <div class="coffee-footer">
                                <button>Order Now</button>
                            </div>
                        </div>

                        <div class="coffee-card">
                            <div class="coffee-img">
                                <img src="#" alt="Text Here"/>
                            </div>
                            <div class="coffee-header">
                                <h3>LOREM IPSUM</h3>
                                <p class="price">₱ 100</p>
                            </div>
                            <div class="coffee-content">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                </p>
                            </div>
                            <div class="coffee-footer">
                                <button>Order Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="view-more">
                        <button><i class="fa-solid fa-mug-hot"></i> Check our Menu!</button>
                    </div>
                </div>
            </section>

            <!-- Design Showcase Section -->
            <section id="about" class="design-showcase">
                <div class="container">
                    <div class="section-header">
                        <h2>Our Aesthetic</h2>
                        <p>
                            Experience the unique atmosphere and design elements that make our
                            coffee shop special. From our carefully curated interior to our
                            custom cup designs, every detail is crafted to enhance your coffee
                            experience.
                        </p>
                    </div>

                    <div class="tabs">
                        <div class="tab-buttons">
                            <button class="tab-btn" data-tab="interior">Interior</button>
                            <button class="tab-btn" data-tab="branding">Branding</button>
                            <button class="tab-btn" data-tab="cups">Cup Designs</button>
                        </div>
                        <div class="tab-content active" id="interior">
                            <div class="design-grid">

                                <div class="design-card">
                                    <div class="design-img">
                                        <img src="mainsittingarea.jpg" alt="Main Seating Area"/>
                                    </div>
                                    <div class="design-content">
                                        <h3>Main Seating Area</h3>
                                        <p>Comfortable seating with natural light and plants</p>
                                    </div>
                                </div>
                                <div class="design-card">
                                    <div class="design-img">
                                        <img src="coffeebarparque.jpg" alt="Coffee Bar"/>
                                    </div>
                                    <div class="design-content">
                                        <h3>Coffee Bar</h3>
                                        <p>Lorem Ipsum</p>
                                    </div>
                                </div>
                                <div class="design-card">
                                    <div class="design-img">
                                        <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Reading Nook"/>
                                    </div>
                                    <div class="design-content">
                                        <h3>Reading Nook</h3>
                                        <p>A cozy corner to enjoy your coffee with a good book</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-content" id="branding">
                            <div class="design-grid">

                                <div class="design-card">
                                    <div class="design-img">
                                        <img src="parquecafelogo.png.jpg" alt="Logo Design"/>
                                    </div>
                                    <div class="design-content">
                                        <h3>Logo Design</h3>
                                        <p>Our signature logo representing our coffee philosophy</p>
                                    </div>
                                </div>
                                <div class="design-card">
                                    <div class="design-img">
                                        <img src="mainparque.jpg" alt="Menu Design"/>
                                    </div>
                                    <div class="design-content">
                                        <h3>Menu Design</h3>
                                        <p>Elegant menu layouts that showcase our offerings</p>
                                    </div>
                                </div>
                                <div class="design-card">
                                    <div class="design-img">
                                        <img src="https://images.unsplash.com/photo-1611854779393-1b2da9d400fe?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Packaging"/>
                                    </div>
                                    <div class="design-content">
                                        <h3>Packaging</h3>
                                        <p>Sustainable packaging for our coffee beans and products</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-content" id="cups">
                            <div class="design-grid">

                                <div class="design-card">
                                    <div class="design-img">
                                        <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Signature Cups"/>
                                    </div>
                                    <div class="design-content">
                                        <h3>Signature Cups</h3>
                                        <p>Our custom-designed ceramic cups for in-house enjoyment</p>
                                    </div>
                                </div>
                                <div class="design-card">
                                    <div class="design-img">
                                        <img src="https://images.unsplash.com/photo-1589985270958-bf087b2d8ed7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="To-Go Cups"/>
                                    </div>
                                    <div class="design-content">
                                        <h3>To-Go Cups</h3><p>Eco-friendly to-go cups with our distinctive design</p>
                                    </div>
                                </div>
                                <div class="design-card">
                                    <div class="design-img">
                                        <img src="https://images.unsplash.com/photo-1572286258217-215cf8e8e48e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Limited Edition Series"/>
                                    </div>
                                    <div class="design-content">
                                        <h3>Limited Edition Series</h3>
                                        <p>Seasonal and limited edition cup designs</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="view-gallery">
                            <button>View Full Gallery <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact & Location Section -->
            <section id="location" class="contact-location">
                <div class="container">
                    <div class="section-header">
                        <h2>Visit Our Coffee Shop</h2>
                        <p>We'd love to see you in person. Drop by for a cup or get in touch with us.</p>
                    </div>

                    <div class="contact-grid">
                        <div class="location-info">
                            <!-- Map and Info -->
                            <div class="map-container">
                                <div class="map-placeholder">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p><b>Macabebe, apalit, Robinsons San Fernando , Macabebe, Philippines</b></p>
                                </div>
                                <div class="map-pin"></div>
                            </div>
                            <div class="store-info">
                                <h3><i class="fa-regular fa-clock"></i> Store Hours</h3><ul class="hours-list">
                                    <li>
                                        <span>Monday - Sunday</span><span>10:00 AM - 10:00 PM</span>
                                    </li>
                                </ul>

                                <div class="contact-details">
                                    <p>
                                        <i class="fa-solid fa-phone"></i>
                                        <a href="tel:5551234567">0955 354 7292</a>
                                    </p>
                                    <p>
                                        <i class="fa-solid fa-envelope"></i>
                                        <a href="parquecafes2015@gmail.com">parquecafes2015@gmail.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="footer-grid">
                    <!-- Logo and About -->
                    <div class="footer-about">
                        <div class="footer-logo">
                            <i class="fa-solid fa-mug-hot"></i>
                            <span>Parque Cafe</span>
                        </div>
                        <p>Parque café is a one stop cafe for your appetite. We serve light to heavy snacks.</p>
                        <div class="social-links">
                            <a href="https://www.instagram.com/parquecafe/"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://www.facebook.com/ParqueCafePampanga"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="footer-links">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#menu">Menu</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#location">Location</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>

                    <!-- Newsletter -->
                    <div class="footer-newsletter">
                        <h3>Stay Updated</h3>
                        <p>Subscribe to our newsletter for updates on new coffee offerings and events.</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Your email" />
                            <button>Subscribe</button>
                        </div>
                    </div>
                </div>

                <div class="copyright">
                    <p>&copy; <span id="year"></span> Artisan Brew. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <script src="mainpage.js"></script>
  </body>
</html>
