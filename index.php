<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website</title>
    <link rel="stylesheet" href="CSS/index-style.css" />
</head>

<body>
    <header>
        <nav class="navbar selection-content">
            <a href="index.php" class="nav-logo">
                <h2 class="logo-text">SHOES-X</h2>
            </a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="product.php" class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
                </li>
                <li class="login">
                    <a href="login.php" class="login-link">Logout</a>
                </li>
                <li class="cart-container"><a href="cart.php" class="cart-link">🛒 <span id="cart-count">0</span></a></li>

            </ul>
        </nav>
    </header>
    <main>
        <section class="hero-section">
            <div class="section-content">
                <div class="hero-details">
                    <h2 class="title">Elevate Your Style</h2>
                    <h3 class="subtitle">Make your day great with our shoes</h3>
                    <p class="discription">
                        Step into the future of fashion with SHOES-X, crafted for comfort,
                        engineered for performance.
                    </p>
                    <div class="buttons">
                        <a href="#" class="button order-now">ODER NOW</a>
                        <a href="contact.php" class="button contact-us">CONTACT US</a>
                    </div>
                </div>
                <div class="hero-img-wrapper">
                    <img src="iamges/shoe-img.png" alt="" class="shoe-img" />
                </div>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Script/main.js"></script>
</body>

</html>