<!-- صقحة تسجيل الحساب -->
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
  <link rel="stylesheet" href="register_style.css">
  <style>.error { color: red; font-size: 13px; }</style>
</head>
<body>
<div class="container">
  <div class="Left_session">
    <img src="imege/image_1.jpeg" alt="">
  </div>
  <div class="Right_sestion">
    <div class="Welcome">
      <p style="text-align:center" >مرحبا بك قم بتسجيل حساب على منصتنا لتكون من أعضاء هذه المنصة </p>
    </div>
    <div class="Form">
      <form action="handle_register.php" method="POST">
        <div class="Form_row">
              <div>
                  <input type="text" id="Name" name="Name"  placeholder=" Name" value="<?= htmlspecialchars($old['Name'] ?? '') ?>">
                  <?php if (isset($errors['Name'])): ?>
                    <div class="error">
                      <?= htmlspecialchars($errors['Name']) ?></div> 
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
