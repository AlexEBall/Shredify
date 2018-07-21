<?php 
    include("includes/classes/Account.php");

    $account = new Account();
    $account -> register();

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Shredify</title>
</head>
<body>
    <div id="inputContainer"> 
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your Account</h2>
            <p>
                <label for="loginUserName">Username: </label>
                <input id="loginUserName" name="loginUserName" type="text" placeHolder="e.g. Dimebag Darrell" required>
            </p>
            <p> 
                <label for="loginPassword">Password: </label>
                <input type="password" id="loginPassword" name="loginPassword" required>
            </p>

            <button type="submit" name="loginButton">Log In</button>
        </form>

        <form id="registerForm" action="register.php" method="POST">
            <h2>Create your Free Account</h2>
            <p>
                <label for="userName">Username: </label>
                <input id="userName" name="userName" type="text" placeHolder="e.g. Dimebag Darrell" required>
            </p>
            <p>
                <label for="firstName">First Name: </label>
                <input id="firstName" name="firstName" type="text" placeHolder="Dave" required>
            </p>
            <p>
                <label for="lastName">Last Name: </label>
                <input id="lastName" name="lastName" type="text" placeHolder="Williams" required>
            </p>
            <p>
                <label for="email">Email: </label>
                <input id="email" name="email" type="text" placeHolder="cowboysfromhell@gmail.com" required>
            </p>
            <p>
                <label for="email2">Confirm Email: </label>
                <input id="email2" name="email2" type="text" placeHolder="cowboysfromhell@gmail.com" required>
            </p>
            <p> 
                <label for="password">Password: </label>
                <input type="password" id="password" name="password" required>
            </p>
            <p> 
                <label for="password2">Confirm Password: </label>
                <input type="password2" id="password2" name="password2" required>
            </p>

            <button type="submit" name="registerButton">Sign Up</button>
        </form>
    </div>
</body>
</html>