<?php  

session_start();

if (!isset($_SESSION["currentUserEmail"])) {
    header("Location: login.php");
}

function getCurrentUserEmail()
{
    $currentUserEmail = $_SESSION["currentUserEmail"];
    foreach ($_SESSION["users"] as $user) {
        if ($user["email"] === $currentUserEmail) {
            return $user["fname"];
        }
    }
    return ""; 
}

function getAllUsers()
{
    $users = "";
    foreach ($_SESSION["users"] as $user) {
        $name = $user["fname"];
        $lastName = $user["lname"];
        $users .= "<li>$name $lastName</li>";
    }
    return $users;
}

if (isset($_GET["action"]) && $_GET["action"] === "logout") {
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
</head>
<body>
    <header>
        <p>Welcome, <?php echo getCurrentUserEmail(); ?></p>
        <a href="home.php?action=logout">Logout</a>
    </header>
    <main>
        <h1>Ovo su korisnici</h1>
        <ul>
            <?php echo getAllUsers(); ?> 
        </ul>
    </main>

    <?php include "footer.php"; ?> 
</body> 
</html> 