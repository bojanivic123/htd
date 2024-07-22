<?php
    include "connection.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php include "header.php"; ?>

    <div class="va-l-container">
    <main class="va-l-page-content">

        <?php
            $sqlComments = "SELECT * FROM comments";
            $statement = $connection->prepare($sqlComments);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $comments = $statement->fetchAll();

                echo "<pre>";
               // var_dump($comments);
                echo "</pre>";
        ?>

            <div class="comments">
                <p>Comments</p>
                <ul>
                    <?php foreach ($comments as $comment) { ?>
                        <li>
                            <p><?php echo $comment["author"]; ?></p>
                            <p><?php echo $comment["content"]; ?></p>
                        </li>   
                        <?php } ?> 
                </ul>
            </div>
            
            <?php include "footer.php"; ?>
</body>
</html>

