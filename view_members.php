<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
header("Location: login.php");
}

$result = $conn->query("SELECT * FROM members");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Members</title>
<link rel='stylesheet' href='style.css'>
</head>
<body>

<div class='container' style='width:80%;'>
<h2>Gym Members</h2>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Membership</th>
<th>Joining Date</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['membership_type']; ?></td>
<td><?php echo $row['joining_date']; ?></td>
<td><a href='delete_member.php?id=<?php echo $row['id']; ?>'>Delete</a></td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>