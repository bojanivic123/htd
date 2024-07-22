<?php  

session_start();

if (isset($_SESSION["currentUserEmail"])) {
    header("Location: home.php");
}

if (!isset($_SESSION["users"])) {
    $_SESSION["users"] = [];
}

function doesUserWithTheseCredentialsExist($email, $password)
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
    if (doesUserWithTheseCredentialsExist($_POST["email"], $_POST["password"])) {
        login($_POST["email"]);
    } else {
        $errorMessage = "Invalid credentials!";
    }
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
    <?php include "header.php"; ?>

    <h2>Login</h2>
    <form method="post" action="login.php">
        <label>E-mail</label><br>
        <input type="email" name="email" required /><br>
        <label>Password</label><br>
        <input type="password" name="password" required /><br><br>
        <button type="submit">Sign in</button><br> 
    </form> 

    <p>
        <?php  
        if (isset($errorMessage)) {
            echo $errorMessage;
        }
        ?>
    </p>

    <?php include "footer.php"; ?>
</body>
</html>

