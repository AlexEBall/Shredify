<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Shredify</title>
</head>
<body>
    <div id="inputContainer"> 
        <form id="loginForm" action="regiser.php" method="POST">
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
    </div>
</body>
</html>