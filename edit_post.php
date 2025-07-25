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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];

  $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Post updated! <a href='index.php'>Go Back</a>";
  } else {
    echo "Error: " . $conn->error;
  }
} else {
  $sql = "SELECT * FROM posts WHERE id=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
?>

<form method="POST">
  Title: <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
  Content: <textarea name="content"><?php echo $row['content']; ?></textarea><br>
  <input type="submit" value="Update">
</form>

<?php
}
?>
