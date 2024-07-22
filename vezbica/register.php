<?php  

session_start();

if (isset($_SESSION["currentUserEmail"])) {
    header("Location: home.php");
}

if (!isset($_SESSION["users"])) {
    $_SESSION["users"] = [];
}

function doesUserWithThisEmailExist($email)
{
    foreach ($_SESSION["users"] as $user) {
        if ($user["email"] === $email) {
            return true;
        }
    }
    return false;
}

function register($newUser)
{
    $_SESSION["users"][] = $newUser;
    $_SESSION["currentUserEmail"] = $newUser["email"];
    header("Location: home.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (doesUserWithThisEmailExist($_POST["email"])) {
        $errorMessage = "User with this email already exists!";
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
</head>
<body>
    <?php include "header.php"; ?>

    <h2>Register</h2>
    <form method="post" action="register.php">
        <label>Name</label><br>
        <input type="text" name="name" required /><br>
        <label>Surname</label><br>
        <input type="text" name="surname" required /><br>
        <label>E-mail</label><br>
        <input type="email" name="email" required /><br>
        <label>Password</label><br>
        <input type="password" name="password" required /><br><br>
        <button type="submit">Sign up</button><br> 
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

