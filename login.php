<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s",$username);
$stmt->execute();

$result = $stmt->get_result();

if($row = $result->fetch_assoc()){
if(password_verify($password,$row['password'])){
$_SESSION['user'] = $username;
header("Location: dashboard.php");
}else{
echo "Invalid Password";
}
}else{
echo "User Not Found";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel='stylesheet' href='style.css'>
</head>
<body>
<div class='container'>
<h2>User Login</h2>
<form method='POST'>
<input type='text' name='username' placeholder='Username' required>
<input type='password' name='password' placeholder='Password' required>
<button type='submit' name='login'>Login</button>
</form>
</div>
</body>
</html>