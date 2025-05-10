<!-- register صفحة الاتصال بقاعدة البيانات والتحقق من فورم ال -->
<?php
if ($_SERVER["REQUEST_METHOD"]==="POST"){
$Name = trim($_POST['Name'] ?? '');
$email = trim($_POST['Email'] ?? '');
$password = trim($_POST['Password'] ?? '');
$confirem_Password = trim($_POST['Confirem_Password'] ?? '');
}
session_start();

$errors = [];
$old = [
    'Name' => $Name,
    'Email' => $email
];
if (empty($Name)) {
    $errors['Name'] = "Name is required";
}
if (empty($email)) {
    $errors['email'] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
}


if (empty($password)) {
    $errors['password'] = "Password is required";
} elseif (strlen($password) < 6) {
    $errors['password'] = "Password must be at least 6 characters";
}

if (empty($confirem_Password)) {
    $errors['confirem_Password'] = "Confirm password is required";
} elseif ($confirem_Password !== $password) {
    $errors['confirem_Password'] = "Passwords do not match";
}


if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $old;
    header("Location: register.php");
    exit;
}else{    
    header("Location:index.php ");
}
echo "<h2 style='color: green;'>Registration completed successfully!</h2>";
?>
<?php
$serverName="localhost";
$userename="root";
$Password="";
$databaseName="database";
$conn=new mysqli($serverName,$userename,$Password,$databaseName);
if($conn->connect_error){
    die("coneection filed :". $conn->connect_error);
}

//إنشاء جدول ال users
$usertable="CREATE TABLE IF NOT EXISTS users (
 id INT AUTO_INCREMENT PRIMARY KEY , 
  UserName VARCHAR(100) NOT NULL ,
  email VARCHAR(100) NOT NULL,
  Password VARCHAR(255) NOT NULL,
   role VARCHAR(50)  DEFAULT 'users'
   )";
   $table1= $conn->query($usertable);
   $insert="INSERT INTO users(UserName,email,Password) VALUES('$Name','$email','$password')";
   $ins=$conn->query($insert);
   
   
   $query = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($query);
if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['user']=[
      'email' => $user['email'],
      'role' => $user['role']];
}
?>