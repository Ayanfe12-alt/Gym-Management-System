<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM members WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$id);
$stmt->execute();

header("Location: view_members.php");
?>