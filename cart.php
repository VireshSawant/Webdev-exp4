<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="CSS/cart-style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Script/main.js"></script> <!-- Link to main.js -->
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="index.php" class="nav-logo">
                <h2 class="logo-text">SHOES-X</h2>
            </a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="product.php" class="nav-link">Products</a></li>
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
        <section class="cart-section">
            <h1 class="section-title">Your Cart</h1>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th class="ct1"> </th> <!-- column for the image -->
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <!-- Cart items will be dynamically inserted here -->
                </tbody>
            </table>

            <div class="cart-summary">
                <h2>Total: Rs. <span id="total-price">0</span></h2>
                <button id="pay-now">Pay Now</button>
            </div>
        </section>
    </main>

</body>
</html>
