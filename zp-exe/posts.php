<?php
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php include "header.php"; ?>

<div class="container">
    <main class="main-content">

        <?php

            $sqlPosts = "SELECT * FROM posts ORDER BY posts.created_at DESC";
            $statement = $connection->prepare($sqlPosts); 
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $posts = $statement->fetchAll();

                echo "<pre>";
              //  var_dump($posts);
                echo "</pre>";
        ?>

        <?php
           foreach ($posts as $post) {
        ?>

           <article class="article-posts">
               <header>
                   <h1 class="posts"><a href="single-post.php?post_id=<?php echo $post["id"]; ?>"><?php echo $post["title"]; ?></a></h1>
                   <div class="more-data"><?php echo $post["created_at"]; ?> by <?php echo $post["author"]; ?></div>
               </header>
                   <p><?php echo $post["body"]; ?></p>
           </article>

       <?php
           }
       ?>

        <?php include "footer.php"; ?>
</body>
</html>



