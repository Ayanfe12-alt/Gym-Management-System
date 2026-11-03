<?php
include 'db.php';
if(isset($_POST['register'])){
$username = htmlspecialchars(trim($_POST['username']));
$email = htmlspecialchars(trim($_POST['email']));
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users(username,email,password) VALUES(?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss",$username,$email,$password);

if($stmt->execute()){
echo "Registration Successful";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel='stylesheet' href='style.css'>
</head>
<body>
<div class='container'>
<h2>User Registration</h2>
<form method='POST'>
<input type='text' name='username' placeholder='Username' required>
<input type='email' name='email' placeholder='Email' required>
<input type='password' name='password' placeholder='Password' required>
<button type='submit' name='register'>Register</button>
</form>
</div>
</body>
</html>