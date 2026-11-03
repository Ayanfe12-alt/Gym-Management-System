<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
header("Location: login.php");
}

if(isset($_POST['add'])){
$name = htmlspecialchars(trim($_POST['full_name']));
$age = $_POST['age'];
$gender = $_POST['gender'];
$membership = $_POST['membership_type'];
$joining = $_POST['joining_date'];

$sql = "INSERT INTO members(full_name,age,gender,membership_type,joining_date)
VALUES(?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sisss",$name,$age,$gender,$membership,$joining);

if($stmt->execute()){
echo "Member Added Successfully";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Member</title>
<link rel='stylesheet' href='style.css'>
</head>
<body>
<div class='container'>
<h2>Add Gym Member</h2>
<form method='POST'>
<input type='text' name='full_name' placeholder='Full Name' required>
<input type='number' name='age' placeholder='Age' required>

<select name='gender'>
<option>Male</option>
<option>Female</option>
</select>

<select name='membership_type'>
<option>Monthly</option>
<option>Quarterly</option>
<option>Yearly</option>
</select>

<input type='date' name='joining_date' required>

<button type='submit' name='add'>Add Member</button>
</form>
</div>
</body>
</html>