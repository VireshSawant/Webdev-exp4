<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="CSS/product-style.css">
</head>

<body>
    <header>
        <nav class="navbar selection-content">
            <a href="index.php" class="nav-logo">
                <h2 class="logo-text">SHOES-X</h2>
            </a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="product.php" class="nav-link active">Products</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                <li class="login"><a href="login.php" class="login-link">Logout</a></li>
                <li class="cart-container">
                    <a href="cart.php" class="cart-link">
                        <span class="cart-icon">🛒</span>
                        <span id="cart-count">0</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="product-section">
            <h1 class="section-title">Our Products</h1>
            <div class="product-grid">
                <!-- Card 1 -->
                <a href="javascript:void(0);" class="product-card">
                    <div class="card-image">
                        <img src="iamges/shoe1.png" alt="Monte Carlo">
                    </div>
                    <div class="card-details">
                        <h2 class="product-name">Sneakers</h2>
                        <p class="product-description">Stylish Sneakers </p>
                        <p class="product-price">Rs. 2499</p>
                        <div class="card-footer">
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </a>
                <!-- Card 2 -->
                <a href="javascript:void(0);" class="product-card">
                    <div class="card-image">
                        <img src="iamges/shoe2.png" alt="Classic Formal">
                    </div>
                    <div class="card-details">
                        <h2 class="product-name">Classic Formal</h2>
                        <p class="product-description">Stylish formal shoes for events</p>
                        <p class="product-price">Rs. 2999</p>
                        <div class="card-footer">
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </a>
                <!-- Card 3 -->
                <a href="javascript:void(0);" class="product-card">
                    <div class="card-image">
                        <img src="iamges/shoe3.png" alt="Outdoor Boots">
                    </div>
                    <div class="card-details">
                        <h2 class="product-name">Outdoor Boots</h2>
                        <p class="product-description">Durable boots for all terrains</p>
                        <p class="product-price">Rs. 3499</p>
                        <div class="card-footer">
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </a>
                <!-- Card 4 -->
                <a href="javascript:void(0);" class="product-card">
                    <div class="card-image">
                        <img src="iamges/shoe4.png" alt="Elegant Loafers">
                    </div>
                    <div class="card-details">
                        <h2 class="product-name">Elegant Loafers</h2>
                        <p class="product-description">Stylish loafers for formal occasions</p>
                        <p class="product-price">Rs. 1899</p>
                        <div class="card-footer">
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </a>
                <!-- Card 5 -->
                <a href="javascript:void(0);" class="product-card">
                    <div class="card-image">
                        <img src="iamges/shoe5.png" alt="Comfy Slippers">
                    </div>
                    <div class="card-details">
                        <h2 class="product-name">Comfy Slippers</h2>
                        <p class="product-description">Soft slippers for home comfort</p>
                        <p class="product-price">Rs. 1299</p>
                        <div class="card-footer">
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </a>
                <!-- Card 6 -->
                <a href="javascript:void(0);" class="product-card">
                    <div class="card-image">
                        <img src="iamges/shoe6.png" alt="Running Shoes">
                    </div>
                    <div class="card-details">
                        <h2 class="product-name">Running Shoes</h2>
                        <p class="product-description">Lightweight shoes for daily runs</p>
                        <p class="product-price">Rs. 2199</p>
                        <div class="card-footer">
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </a>
                <!-- Card 7 -->
                <a href="javascript:void(0);" class="product-card">
                    <div class="card-image">
                        <img src="iamges/shoe7.png" alt="Athletic Sneakers">
                    </div>
                    <div class="card-details">
                        <h2 class="product-name">Athletic Sneakers</h2>
                        <p class="product-description">High-performance sneakers for sports</p>
                        <p class="product-price">Rs. 3999</p>
                        <div class="card-footer">
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </a>
                <!-- Card 8 -->
                <a href="javascript:void(0);" class="product-card">
                    <div class="card-image">
                        <img src="iamges/shoe8.png" alt="Party Wear Shoes">
                    </div>
                    <div class="card-details">
                        <h2 class="product-name">Party Wear Shoes</h2>
                        <p class="product-description">Premium shoes for special occasions</p>
                        <p class="product-price">Rs. 2599</p>
                        <div class="card-footer">
                            <button class="add-to-cart">Add to Cart</button>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Script/main.js"></script>

</body>

</html>