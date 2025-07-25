<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
  die("Please login first. <a href='login.php'>Login here</a>");
}

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

echo "<h2>All Posts</h2>";

while($row = $result->fetch_assoc()) {
  echo "<h3>" . $row['title'] . "</h3>";
  echo "<p>" . $row['content'] . "</p>";
  echo "<a href='edit_post.php?id=" . $row['id'] . "'>Edit</a> | ";
  echo "<a href='delete_post.php?id=" . $row['id'] . "'>Delete</a>";
  echo "<hr>";
}

echo "<a href='create_post.php'>Add New Post</a> | ";
echo "<a href='logout.php'>Logout</a>";
?>
