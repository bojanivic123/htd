<?php  

session_start();

if (!isset($_SESSION["currentUserEmail"])) {
    header("Location: login.php");
}

function getUser()
{
    $currentUserEmail = $_SESSION["currentUserEmail"];
    foreach ($_SESSION["users"] as $user) {
        if ($user["email"] === $currentUserEmail) {
            return $user["name"];
        }
    }
    return "";
}

function getUsers()
{
    $users = "";
    foreach ($_SESSION["users"] as $user) {
        $name = $user["name"];
        $surname = $user["surname"];
        $users .= "<li>$name $surname</li>";
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
        <p>Welcome, <?php echo getUser(); ?> </p>
        <a href="home.php?action=logout">Log out</a>
    </header>

    <main>
        <h2>There are users</h2>
        <ul>
            <?php echo getUsers(); ?>
        </ul>
    </main>

    <?php include "footer.php"; ?>
</body>
</html>

