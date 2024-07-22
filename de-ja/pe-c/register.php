<?php  

session_start();

if (isset($_SESSION["currentUserEmail"])) {
    header("Location: home.php");
}

if (!isset($_SESSION["users"])) {
    $_SESSION["users"] = [];
}

function doesUserWithThisEmailExists($email)
{
    foreach ($_SESSION["users"] as $user) {
        if ($user["email"] === $email) {
            return true;
        }
    }
    return false;
}

function register($data)
{
    $_SESSION["users"][] = $data;
    $_SESSION["currentUserEmail"] = $data["email"];
    header("Location: home.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (doesUserWithThisEmailExists($_POST["email"])) {
        $errorMessage = "User with this email already exists";
    } else {
        register($_POST);
    }
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
    <?php include "header.php"; ?>
    <main class="main-register">
        <h1>Registracija</h1>
        <form method="POST" action="">
            <label for="name">Ime</label><br>
            <input id="name" name="name"><br>
            <label for="lastname">Prezime</label><br>
            <input id="lastname" name="lastname"><br>
            <label for="email">E-mail</label><br>
            <input id="email" name="email"><br>
            <label for="password">Lozinka</label><br>
            <input id="password" name="password"><br><br>
            <button type="submit">Registruj se</button>
        </form>
        <p><?php  
        if (isset($errorMessage)) {
            echo $errorMessage;
        }
        ?></p>
    </main> 
    <?php include "footer.php"; ?>
</body>
</html>

