<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "header.php"; ?>

    <a href="time.php">Time</a> 

    <?php  
    $assArray = [
        "list" => "To do",
        "items" => ["Buy groceries", "Return books", "Fix the light"]
    ];
    ?>

    <h3><?php echo $assArray["list"]; ?></h3>
    <ul>
        <?php  
        foreach ($assArray["items"] as $item) {
            echo "<li>$item</li>";
        }
        ?>
    </ul>

    <?php $query = "Mercedes Benz";  $realQuery = str_replace(" ", "+", $query); ?>
    <a href="http://www.google.com/search?q=<?php echo $realQuery; ?>"><?php echo $query; ?></a>

    <?php include "footer.php"; ?>
</body>
</html>

