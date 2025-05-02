<?php
include 'db_conntect/db.php';

function send_json_response($status, $message) {
    header('Content-Type: application/json');
    echo json_encode(['status' => $status, 'message' => $message]);
    exit;
}

// Enable error logging
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if request is AJAX (JSON)
    $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
    if (strpos($contentType, 'application/json') !== false) {
        $input = json_decode(file_get_contents('php://input'), true);
        $name = isset($input['name']) ? $input['name'] : '';
        $email = isset($input['email']) ? $input['email'] : '';
        $phone = isset($input['phone']) ? $input['phone'] : '';
        $message = isset($input['message']) ? $input['message'] : '';
    } else {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $message = isset($_POST['message']) ? $_POST['message'] : '';
    }


    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        error_log('Prepare failed: ' . $conn->error);
        send_json_response('error', 'Database error.');
    }
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    if ($stmt->execute()) {
        if (strpos($contentType, 'application/json') !== false) {
            send_json_response('success', 'Message sent successfully!');
        } else {
            echo "<script>alert('Message sent successfully!');</script>";
        }
    } else {
        error_log('Execute failed: ' . $stmt->error);
        if (strpos($contentType, 'application/json') !== false) {
            send_json_response('error', 'Error: ' . $conn->error);
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SHOES-X</title>
    <link rel="stylesheet" href="CSS/contact-style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar selection-content">
            <a href="index.php" class="nav-logo">
                <h2 class="logo-text">SHOES-X</h2>
            </a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="product.php" class="nav-link">Products</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link active">Contact</a></li>
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
    <main class="contact-page">
        <section class="contact-details">
            <h1 class="contact-title">Contact Us</h1>
            <p class="contact-desc">We'd love to hear from you! Reach out to us through the details below or fill out
                the form.</p>
                <div class="contact-info">
                    <div class="info-item">
                        <i class='bx bxs-map'></i> 
                        <h3>Address:</h3>
                        <p>123 Shoe Avenue, Fashion City, Style Country</p>
                    </div>
                    <div class="info-item">
                        <i class='bx bxs-phone'></i> 
                        <h3>Phone:</h3>
                        <p>+123-456-7890</p>
                    </div>
                    <div class="info-item">
                        <i class='bx bxs-envelope'></i> 
                        <h3>Email:</h3>
                        <p>support@shoesx.com</p>
                    </div>
                </div>
        </section>
        <section class="contact-form">
            <h2 class="contact-form-head">Send Us a Message</h2>
            <form action="#" method="post" class="contact-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Enter your message" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Script/main.js"></script>
    </body>

</html>