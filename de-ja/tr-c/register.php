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
    foreach ($_SESSION["users"] as $user)
    {
        if ($user["email"] === $email) {
            return true;
        }
    }
    return false;
}

function register($user)
{
    $_SESSION["users"][] = $user;
    $_SESSION["currentUserEmail"] = $user["email"];
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
    <main class="register-main-content">
        <h1>Register</h1>
        <form method="POST" action="register.php">
            <label for="fname">First name</label><br>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Last name</label><br>
            <input type="text" id="lname" name="lname"><br>
            <label for="email">E-mail</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br><br>
            <button type="submit">Register</button>
        </form>
        <p>
            <?php  
            if (isset($errorMessage)) {
                echo $errorMessage;
            }
            ?>
        </p>
    </main> 
    <?php include "footer.php"; ?>
</body> 
</html> 

