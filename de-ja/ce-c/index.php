<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "header.php";  ?>
    <a href="vreme.php">Vreme</a>
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

    <?php  
    $string = "Rafael Nadal";
    $newString = str_replace(" ", "+", $string);
    ?>

    <a href="http://www.google.com/search?q=<?php echo $newString; ?>"><?php echo $string; ?></a>

    <?php include "footer.php"; ?> 
</body> 
</html> 