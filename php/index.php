<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/loginPage.css?v=<?php echo time(); ?>">
    <title>Login Page</title>
</head>
<body>
    <div class="formContainer">
        <h1>Login Form</h1>
        <form action="" method="post">
            <div class="inputContainer">
                <div>
                    <label for="userName">UserName</label>
                </div>
                <input type="text" name="userName" placeholder="UserName" required>
            </div>
            <div class="inputContainer">
                <div>
                <label for="password">Password</label>
                </div>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="buttonContainer">
                <button type="submit">LogIn</button>
                <button type="reset">Cancel</button>
                <a href="signUp.php">Sign up</a>
            </div>
        </form>
    </div>
</body>
</html>