<?php
session_start();
$serverName = "localhost";
$username = "root";
$password = "";
$databaseName = "database";
$conn = new mysqli($serverName, $username, $password, $databaseName);
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
if (!isset($_GET['update'])) {
    header("Location: users.php");
    exit();
}
$id = intval($_GET['update']);
$query = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($query);
if (!$result || $result->num_rows === 0) {
    echo "المستخدم غير موجود.";
    exit();
}
$user = $result->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $role = $_POST['role'];
    $password = trim($_POST['password']);
    $sql = "UPDATE users SET UserName='$name', email='$email', Password='$password', role='$role' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: users.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل المستخدم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #00f2db;">
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="max-width: 500px; width: 100%; border-radius: 20px; background-color: #f8f9fa;">
        <h2 class="mb-4 text-center text-primary">تعديل بيانات المستخدم</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">اسم المستخدم</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['username']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">كلمة المرور</label>
                <input type="password" name="password" class="form-control" value="<?= htmlspecialchars($user['password']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">نوع المستخدم</label>
                <select name="role" class="form-select" required>
                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>مدير</option>
                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>مستخدم</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="update" class="btn btn-success">🔄 تحديث</button>
                <a href="users.php" class="btn btn-danger">❌ إلغاء</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>