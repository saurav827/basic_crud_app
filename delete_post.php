<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
  die("Please login first.");
}

if (!isset($_GET['id'])) {
  die("No post ID specified.");
}

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Post deleted! <a href='index.php'>Go Back</a>";
} else {
  echo "Error: " . $conn->error;
}
?>
