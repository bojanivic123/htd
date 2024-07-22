<?php
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create post</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>


    <?php  
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
           if (!empty($_POST["title"]) && !empty($_POST["body"]) && !empty($_POST["author"]) && !empty($_POST["createdAt"])) {
             $title = $_POST["title"];
             $body = $_POST["body"];
             $author = $_POST["author"];
             $createdAt = $_POST["createdAt"];
             $sqlPosts = "INSERT INTO posts (title, body, author, created_at) VALUES ('$title', '$body', '$author', '$createdAt')";
             $statement = $connection->prepare($sqlPosts);
             $statement->execute();
    }
}
?>

    <form action="" method="post">
        <label for="title">Title</label><br>
        <input type="text" name="title" required><br>
        <label for="body">Body</label><br>
        <input type="text" name="body" required><br>
        <label for="author">Author</label><br>
        <input type="text" name="author" required><br>
        <label for="createdAt">Created at</label><br>
        <input type="text" name="createdAt" required><br><br>
        <input type="submit" value="Create post">
    </form>

    <?php include "posts.php"; ?>
</body>
</html>





