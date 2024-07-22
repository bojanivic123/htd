<?php  

session_start();

if (isset($_SESSION["currentUserEmail"])) {
    header("Location: home.php");
}

if (!isset($_SESSION["users"])) {
    $_SESSION["users"] = [];
}

function areCredentialsValid($email, $password)
{   
    foreach ($_SESSION["users"] as $user) {
        if ($user["email"] === $email && $user["password"] === $password) {
            return true;
        }
    }
    return false;
}

function login($email)
{
    $_SESSION["currentUserEmail"] = $email;
    header("Location: home.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (areCredentialsValid($_POST["email"], $_POST["password"])) {
        login($_POST["email"]);
    } else {
        $errorMessage = "Invalid credentials.";
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
    <main class="main-login">
        <h1>Logovanje</h1>
        <form action="" method="POST">
            <label for="email">E-mail</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br><br>
            <button type="submit">Uloguj se</button>
        </form>
        <p><?php if (isset($errorMessage)) {
            echo $errorMessage;
        } ?></p>
    </main>
    <?php include "footer.php"; ?>
</body>
</html>

