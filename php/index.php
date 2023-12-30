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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    if (!preg_match('/^[a-zA-Z0-9._%+-]{6,}$/', $userName)) {
        echo '<script>alert("Invalid UserName. Must be at least 6 characters and can only contain letters, digits, and the following special characters: . _ % + -");</script>';
    }
    if (!preg_match('/^.*(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
        echo '<script>alert("Invalid Password. Must be at least 8 characters and contain at least one uppercase and one lowercase letter.");</script>';
    }
}
?>

</html>