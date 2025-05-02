<?php
include 'db_conntect/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone, gender, dob) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $username, $email, $password, $phone, $gender, $dob);

    if ($stmt->execute()) {
        echo "<script>
            alert('Registration successful!');
            window.location.href = 'login.php';
        </script>";
        exit;
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="CSS/register-style.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
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
                <form class="register-form" method="POST" action="">
                    <h1 class="register-h1">Register</h1>

                    <div class="input-box">
                        <input type="text" name="username" placeholder="Username" required>
                        <i class="bx bxs-user"></i>
                    </div>

                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" required>
                        <i class="bx bxs-envelope"></i>
                    </div>

                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class="bx bxs-lock-alt"></i>
                    </div>

                    <div class="input-box">
                        <input type="tel" name="phone" placeholder="Phone Number" required>
                        <i class="bx bxs-phone"></i>
                    </div>

                    <div class="input-box">
                        <select name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <input type="date" name="dob" required>
                    </div>

                    <button type="submit" class="btn" onclick="submit">Register</button>

                    <div class="login-link">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="Script/main.js"></script>

</body>
</html>
