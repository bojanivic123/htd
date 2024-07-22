<?php  

session_start();

if (!isset($_SESSION["currentUserEmail"])) {
    header("Location: login.php"); 
}

function getAllUsers()
{
    $users = "";
    foreach ($_SESSION["users"] as $user) {
        $name = $user["name"];
        $lastName = $user["lastname"];
        $users .= "<li>$name $lastName</li>";
    }
    return $users;
}

function getCurrentUser()
{
    $currentUserEmail = $_SESSION["currentUserEmail"];
    foreach ($_SESSION["users"] as $user) {
        if ($user["email"] === $currentUserEmail) {
            return $user["name"];
        }
    }
}

if (isset($_GET["option"]) && $_GET["option"] === "logout") {
    unset($_SESSION["currentUserEmail"]);
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <header>
        <p>Dobrodosao/la, <?php echo getCurrentUser(); ?></p>
        <a href="home.php?option=logout">Logout</a>
    </header>
    <main>
        <ul><?php echo getAllUsers(); ?></ul>
    </main> 
    <?php include "footer.php"; ?>
</body>
</html>

