<?php
    session_start();
    require_once 'assets/connection.php';
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Parque Cafe Landing Page</title>
        <link rel="stylesheet" href="assets/css/index.css" />
        <link rel="stylesheet" href="assets/css/menu.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    </head>
    <body>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <i class="fa-solid fa-mug-hot"></i>
                    <span>Parque Cafe</span>
                </div>

                <div class="nav-links" id="navLinks">
                    <a href="index.php">Menu</a>
                    <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
                        <a href="auth/logout.php">Logout</a>
                    <?php else: ?>
                        <button class="order-btn">
                            <a href="auth/login.php">Login</a>
                        </button>
                    <?php endif; ?>
                    <a href="cart/cart.php" class="cart-link">
                        <i class="fa-solid fa-shopping-cart"></i> Cart
                    </a>
                </div>
            </div>
        </nav>

        <main>
            <section id="home" class="hero">
                <div class="hero-content">
                    <h1>Parque Cafe</h1>
                    <p>Where every cup tells a story of craftsmanship and passion</p>
                </div>
            </section>

            <section id="menu" class="menu-interactive">
                <div class="container menu-container-flex">
                    <div class="menu-sidebar">
                        <h3>Categories</h3>
                        <ul id="menu-categories">
                            <li data-category="hot-coffee" class="active">Hot Coffee</li>
                            <li data-category="iced-coffee">Iced Coffee</li>
                            <li data-category="frappe">Frappe</li>
                            <li data-category="milk-tea">Milk Tea</li>
                            <li data-category="milk-shake">Milk Shake</li>
                        </ul>
                    </div>

                    <div class="menu-items">
                        <?php
                        $categories = [
                            'hot-coffee' => "Hot Coffee",
                            'iced-coffee' => "Iced Coffee",
                            'frappe' => "Frappe",
                            'milk-tea' => "Milk Tea",
                            'milk-shake' => "Milk Shake",
                        ];

                        foreach ($categories as $css_class => $category_name) {
                            echo "<div id='{$css_class}-category-content' class='menu-category {$css_class}'>";
                            echo "<h2>{$category_name}</h2>";

                            $sql = "SELECT prod_id, prod_name, regular_price, upsize_price FROM products WHERE prod_category = ?";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "s", $category_name);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            if (mysqli_num_rows($result) > 0) {
                                while ($product = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <div class="coffee-card">
                                        <div class="coffee-header">
                                            <?php echo htmlspecialchars($product['prod_name']); ?>
                                        </div>
                                        <div class="coffee-content">
                                            <form action="cart/add_to_cart.php" method="post" class="add-to-cart-form">
                                                <input type="hidden" name="prod_id" value="<?php echo htmlspecialchars($product['prod_id']); ?>">

                                                <div class="price-options">
                                                    <?php if ($product['regular_price'] > 0): ?>
                                                        <label>
                                                            <input type="radio" name="price_type" value="regular" data-price="<?php echo htmlspecialchars($product['regular_price']); ?>" checked>
                                                            Regular: ₱<?php echo number_format($product['regular_price'], 2); ?>
                                                        </label>
                                                    <?php endif; ?>
                                                    <?php if ($product['upsize_price'] > 0): ?>
                                                        <label>
                                                            <input type="radio" name="price_type" value="upsize" data-price="<?php echo htmlspecialchars($product['upsize_price']); ?>">
                                                            Upsize: ₱<?php echo number_format($product['upsize_price'], 2); ?>
                                                        </label>
                                                    <?php endif; ?>
                                                    <?php if ($product['regular_price'] <= 0 && $product['upsize_price'] <= 0): ?>
                                                        <span class="price-unavailable">Price not available</span>
                                                    <?php endif; ?>
                                                </div>

                                                <input type="number" name="quantity" value="1" min="1" class="quantity-input">
                                                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<p>No products found in this category.</p>";
                            }
                            mysqli_stmt_close($stmt);
                            echo "</div>"; // Close menu-category div
                        }
                        ?>
                    </div>
                </div>
            </section>


            <section id="about" class="about-us">
                <div class="container">
                    <div class="about-content">
                        <h2>Our Story</h2>
                        <p>
                            At Parque Cafe, we believe coffee is more than just a drink—it's an experience.
                            Founded with a passion for quality and community, we meticulously source the finest beans
                            from around the world. Our expert baristas craft each cup with precision, ensuring
                            a perfect balance of flavor and aroma. We're committed to creating a welcoming space
                            where you can relax, connect, and savor the moment.
                        </p>
                        <p>
                            From our signature blends to seasonal specialties, every offering is a testament to
                            our dedication to excellence. Join us and discover your new favorite brew.
                        </p>
                    </div>
                    <div class="about-image">
                        <img src="assets/images/about.jpg" alt="About Us">
                    </div>
                </div>
            </section>

            <section id="location" class="location-section">
                <div class="container">
                    <h2>Find Us Here</h2>
                    <div class="location-content">
                        <div class="map-container">
                            <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.915833446654!2d120.93288427503794!3d14.49215098587123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cd2b2d309067%3A0xb351479836376510!2sRosario%2C%20Cavite!5e0!3m2!1sen!2sph!4403!2m1!1srosario%20cavite%20coffee%20shop!5e0!3m2!1sen!2sph!4v1700662768516!5m2!1sen!2sph"
                                    width="100%"
                                    height="450"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                        <div class="address-details">
                            <h3>Visit Our Cafe!</h3>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer-section">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-contact">
                        <h3>Contact Us</h3>
                        <p><i class="fa-solid fa-map-marker-alt"></i> Macabebe, apalit, Robinsons San Fernando , Macabebe, Philippines</p>
                        <p><i class="fa-solid fa-phone"></i> +63 955 354 7292</p>
                        <p><i class="fa-solid fa-envelope"></i> parquecafes2015@gmail.com</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>

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
                    <p>© <span id="year"></span> Artisan Brew. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <script src="assets/js/mainpage.js"></script>
        <script src="assets/js/index.js"></script>
        <script src="assets/js/menu.js"></script>
    </body>
</html>