<?php
$serverName = "localhost";
$username = "root";
$Password = "";
$databaseName = "database";
$conn = new mysqli($serverName, $username, $Password, $databaseName);
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

session_start();
$email_user = '';
$password_user = '';
$errors_input = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_user = isset($_POST['Email']) ? $_POST['Email'] : '';
    $password_user = isset($_POST['Pass']) ? $_POST['Pass'] : '';
    $query = "SELECT * FROM users WHERE email = '$email_user' AND Password = '$password_user'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = [
            'email' => $user['email'],
            'role' => $user['role']
        ];
        header("Location: index.php");
        exit;
    } else {
        $errors_input['login'] = "البريد الإلكتروني أو كلمة السر غير صحيحة";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <link rel="stylesheet" href="login_style.css" />
</head>
<body>
    <div class="container1">
        <div class="login-box">
            <h2>مرحبا بك في معرضنا </h2>
            <p>لكي تكون من أسرتنا,قم بتسجيل الدخول إلى المنصة </p>
            <form method="POST">
                <label>User Email</label>
                <input type="email" name="Email" placeholder="your-email@gmail.com" />
                <?php if(isset($errors_input['Email'])):?>
                <p><?= $errors_input['Email'] ?></p>
                <?php endif;?>
                
                <label>Password</label>
                <input type="password" name="Pass" placeholder="Your Password" />
                <?php if(isset($errors_input['Pass'])):?>
                <p><?= $errors_input['Pass'] ?></p>
                <?php endif;?>
                
                <?php if(isset($errors_input['login'])):?>
                <p style="color:red;"><?= $errors_input['login'] ?></p>
                <?php endif;?>
              
                <button type="submit">Log In</button>         
            </form>
            <style>
              a {
                text-decoration: none;
                color: #000;
              }
            </style>
            <p class="Login" style="text-align: center; padding: 15px;">Don't have an account? <a href="register.php">create Acount</a></p>
        </div>      
        <div class="image-box">
            <img class="image-1" src="imege/S817340ed50694deb910a304c258258b8k.avif" alt="">
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-7n4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</html>
