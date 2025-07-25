<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
  die("Please login first.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];

  $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
  if ($conn->query($sql) === TRUE) {
    echo "Post created! <a href='index.php'>Go Back</a>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<form method="POST">
  Title: <input type="text" name="title"><br>
  Content: <textarea name="content"></textarea><br>
  <input type="submit" value="Create Post">
</form>
