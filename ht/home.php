<?php  

session_start();

if (!isset($_SESSION["currentUserEmail"])) {
    header("Location: login.php");
}

if (isset($_GET["action"]) && $_GET["action"] === "logout") {
    unset($_SESSION["currentUserEmail"]);
    header("Location: login.php");
}

function getCurrentUser()
{
    foreach ($_SESSION["users"] as $user) {
        if ($user["email"] === $_SESSION["currentUserEmail"]) {
            return $user["name"];
        }
    }
    return "";
}

function getAllUsers()
{
    $users = "";
    foreach ($_SESSION["users"] as $user) {
        $name = $user["name"];
        $surname = $user["surname"];
        $users .= "<li>$name $surname</li>";
    }
    return $users;
}

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header class="home-header">
        <p>Welcome, <?php echo getCurrentUser(); ?></p>
        <a href="home.php?action=logout">Logout</a>
    </header>

    <main class="home-main">
        <h1>These are all users</h1>
        <ul>
            <?php  
                echo getAllUsers(); 
            ?>
        </ul>
    </main>



    <?php include "footer.php"; ?>
</body>
</html>