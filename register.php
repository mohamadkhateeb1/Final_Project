<!-- صفحة تسجيل الحساب -->
<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register an account</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f9;
      color: #333;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      min-height: 100vh;
    }

    .Left_session, .Right_sestion {
      flex: 1 1 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    .Left_session img {
      max-width: 100%;
      height: auto;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .Right_sestion {
      background-color: #ffffff;
      flex-direction: column;
    }

    .Welcome p {
      font-size: 1.1rem;
      margin-bottom: 20px;
      color: #444;
    }

    .Form {
      width: 100%;
      max-width: 500px;
      background-color: #fdfdfd;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }

    .Form_row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 20px;
    }

    .Form_row > div {
      flex: 1 1 45%;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
    }

    .Button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    .Button:hover {
      background-color: #0056b3;
    }

    .Login {
      text-align: center;
      margin-top: 15px;
    }

    .Login a {
      text-decoration: none;
      color: #007bff;
    }

    .Login a:hover {
      text-decoration: underline;
    }

    .error {
      color: red;
      font-size: 13px;
      margin-top: 5px;
      display: block;
    }

    @media (max-width: 768px) {
      .Left_session {
        display: none;
      }

      .Right_sestion {
        flex: 1 1 100%;
        padding: 20px;
      }

      .Form_row {
        flex-direction: column;
      }

      .Form_row > div {
        flex: 1 1 100%;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="Left_session">
    <img src="imege/image_1.jpeg" alt="">
  </div>

  <div class="Right_sestion">
    <div class="Welcome">
      <p style="text-align:center">مرحبا بك قم بتسجيل حساب على منصتنا لتكون من أعضاء هذه المنصة</p>
    </div>

    <div class="Form">
      <form action="handle_register.php" method="POST">
        <div class="Form_row">
          <div>
            <input type="text" id="Name" name="Name" placeholder=" Name" value="<?= htmlspecialchars($old['Name'] ?? '') ?>">
            <?php if (isset($errors['Name'])): ?>
              <div class="error"><?= htmlspecialchars($errors['Name']) ?></div>
            <?php endif; ?>
          </div>
          <div>
            <input type="email" id="Email" name="Email" placeholder="Email" value="<?= htmlspecialchars($old['Email'] ?? '') ?>">
            <?php if (isset($errors['email'])): ?>
              <div class="error"><?= htmlspecialchars($errors['email']) ?></div>
            <?php endif; ?>
          </div>
        </div>

        <div class="Form_row">
          <div>
            <input type="password" id="Password" name="Password" placeholder="Password">
            <?php if (isset($errors['password'])): ?>
              <div class="error"><?= htmlspecialchars($errors['password']) ?></div>
            <?php endif; ?>
          </div>
          <div>
            <input type="password" id="Confirem_Pasword" name="Confirem_Password" placeholder="Confirm Password">
            <?php if (isset($errors['confirem_Password'])): ?>
              <div class="error"><?= htmlspecialchars($errors['confirem_Password']) ?></div>
            <?php endif; ?>
          </div>
        </div>

        <button class="Button" type="submit">Create Account</button>
      </form>

      <p class="Login">Do you have an account? <a href="login.php">Login</a></p>
    </div>
  </div>
</div>

</body>
</html>
