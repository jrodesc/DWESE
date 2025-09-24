<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="index.php" method="post">
        <label id="username" value="username">username:</label>
        <br>
        <input type="text" name="username" required>
        <br>
        <label id="password" value="password">password:</label>
        <br>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="login" value="login">
    </form>
</body>

</html>

<?php
if (isset($_POST["login"])) {

    if (!empty($_POST["username"]) && !empty($_POST["password"])) {

        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];

        header("Location: home.php");

    }
    else {
        echo "missing username or password";
    }
}


?>