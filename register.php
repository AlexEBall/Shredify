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
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <?php

    if(isset($_POST['registerButton'])) {
        echo '<script>
                $(document).ready(function() {
                    $("#loginForm").hide();
                    $("#registerForm").show();
                });
            </script>';
    } else {
        echo '<script>
                $(document).ready(function() {
                    $("#loginForm").show();
                    $("#registerForm").hide();
                });
            </script>';
    }


    ?>

    <div class="background">
        <div class="loginContainer">

            <div class="inputContainer"> 
                <form id="loginForm" action="register.php" method="POST">
                    <h2 class="heading-2">Login to your Account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed) ?>
                        <label for="loginUserName">Username: </label>
                        <input class="input" id="loginUserName" name="loginUserName" type="text" placeHolder="e.g. Dimebag Darrell" value="<?php getInputValue('loginUserName') ?>" required>
                    </p>
                    <p> 
                        <label for="loginPassword">Password: </label>
                        <input type="password" id="loginPassword" name="loginPassword" required>
                    </p>

                    <button type="submit" name="loginButton">Log In</button>

                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account yet? Signup here.</span>
                    </div>
                </form>

                <form id="registerForm" action="register.php" method="POST">
                    <h2 class="heading-2">Create your Free Account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$userNameCharacters) ?>
                        <?php echo $account->getError(Constants::$userNameTaken) ?>
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
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="email">Email: </label>
                        <input id="email" name="email" type="email" value="<?php getInputValue('email') ?>" placeHolder="cowboysfromhell@gmail.com" required>
                    </p>
                    <p>
                        <label for="email2">Confirm Email: </label>
                        <input id="email2" name="email2" type="email" value="<?php getInputValue('email2') ?>" placeHolder="cowboysfromhell@gmail.com" required>
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
                        <input type="password" id="password2" name="password2" required>
                    </p>

                    <button type="submit" name="registerButton">Sign Up</button>

                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Log in here.</span>
                    </div>
                </form>
            </div>

            <div class="loginText">
                <h1>Melt your ears!</h1>
                <h2>Listen to loads of blistering tunes</h2>
                <ul>
                    <li>Everything from the classics to the technical</li>
                    <li>Create your own playlist</li>
                    <li>Follow the best shredders</li>
                </ul>
            </div>

        </div>
    </div>
    
</body>
</html>