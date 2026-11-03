<?php
session_start();
if(!isset($_SESSION['user'])){
header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel='stylesheet' href='style.css'>
</head>
<body>
<div class='container'>
<h2>Welcome <?php echo $_SESSION['user']; ?></h2>
<a href='add_member.php'><button>Add Member</button></a>
<a href='view_members.php'><button>View Members</button></a>
<a href='logout.php'><button>Logout</button></a>
</div>
</body>
</html>