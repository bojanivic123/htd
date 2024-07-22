<?php
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="sidebar-contain">
    <main class="side-content">

        <?php

            $sqlPosts = "SELECT * FROM posts ORDER BY posts.created_at DESC LIMIT 1";
            $statement = $connection->prepare($sqlPosts);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $posts = $statement->fetchAll();

                echo "<pre>";
              //  var_dump($posts);
                echo "</pre>";
        ?>

        <aside class="blog-sidebar">
            <div class="sidebar-module">
                <h5>The newest post</h5>
                <ul>
                    <?php foreach ($posts as $post) { ?>
                        <li><a href="http://localhost/vezba-zadnja/single-post.php?post_id=<?php echo $post["id"]; ?>"><?php echo $post["title"]; ?></a></li>
                        <?php } ?>
                </ul>
            </div>
        </aside>
</body>
</html>


