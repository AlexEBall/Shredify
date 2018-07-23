<?php 
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account($con);

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
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
                <?php echo $account->getError(Constants::$userNameCharacters) ?>
                <label for="userName">Username: </label>
                <input id="userName" name="userName" type="text" value="<?php getInputValue('userName') ?>" placeHolder="e.g. Dimebag Darrell" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <label for="firstName">First Name: </label>
                <input id="firstName" name="firstName" type="text" value="<?php getInputValue('firstName') ?>" placeHolder="Dave" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                <label for="lastName">Last Name: </label>
                <input id="lastName" name="lastName" type="text" value="<?php getInputValue('lastName') ?>" placeHolder="Williams" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <label for="email">Email: </label>
                <input id="email" name="email" type="text" value="<?php getInputValue('email') ?>" placeHolder="cowboysfromhell@gmail.com" required>
            </p>
            <p>
                <label for="email2">Confirm Email: </label>
                <input id="email2" name="email2" type="text" value="<?php getInputValue('email2') ?>" placeHolder="cowboysfromhell@gmail.com" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
                <?php echo $account->getError(Constants::$passwordCharacters); ?>
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