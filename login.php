<?php
include 'db_conntect/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON input since we're using AJAX
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $username = isset($data['username']) ? trim($data['username']) : null;
    $password = isset($data['password']) ? trim($data['password']) : null;


    // Query the database for the user
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify the password
    if ($user && password_verify($password, $user['password'])) {
        echo json_encode(["status" => "success", "userId" => $user['id']]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="CSS/login-style.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
   <header>
        <nav class="navbar selection-content">
            <a href="#" class="nav-logo">
                <h2 class="logo-text">SHOES-X</h2>
            </a>
        </nav>
    </header>
    <main>
        <section class="wrapper">
            <div>
                <form class="login-form" method="POST" action="login.php">
                    <h1 class="login-h1">Login</h1>
                    <div class="input-box">
                        <input type="text" name="username" placeholder="Username" required />
                        <i class="bx bxs-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" required />
                        <i class="bx bxs-lock-alt"></i>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <div class="register-link">
                        <p>Don't have an Account? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Script/main.js"></script>

</body>

</html>