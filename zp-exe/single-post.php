<?php
    include "connection.php"; 
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single post</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <main>
        <?php 
            if (isset($_GET["post_id"])) {
            $sqlSP = "SELECT * FROM posts WHERE posts.id = {$_GET["post_id"]}";
            $statement = $connection->prepare($sqlSP);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $singlePost = $statement->fetch();   
            }
        ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
           if (!empty($_POST["author"]) && !empty($_POST["content"])) {
            $author = $_POST["author"];
            $content = $_POST["content"];
            $postId = $_POST["postId"];
            $sqlComments = "INSERT INTO comments (post_id, author, content) VALUES ('$postId', '$author', '$content' )";
            $statement = $connection->prepare($sqlComments);
            $statement->execute();
       }
    }   
    ?>
        <article class="single-article">
             <header>
                <h1 class="single-post"><?php echo $singlePost["title"]; ?></h1>

                <div class="va-c-article__meta"><?php echo $singlePost["created_at"]; ?> by <?php echo $singlePost["author"]; ?></div>
            </header>
                <div>
                   <p><?php echo $singlePost["body"]; ?></p>
                </div>
    </main>
    <form action="" method="POST">
        <label for="author">Author</label><br>
        <input type="text" name="author" required><br>
        <label for="content">Content</label><br>
        <input type="text" name="content" required><br><br>
        <input type="hidden" id="postId" name="postId" value="<?php echo $_GET["post_id"]; ?>"><br>
        <input type="submit" name="submit" value="Create comment"><br><br>
    </form>
    
    <?php include "comments.php"; ?>
</body>
</html>








 