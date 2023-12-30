<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/signUp.css?v=<?php echo time() ?>">
    <title>Sign up</title>
</head>

<body>
    <div class="formContainer">
        <h1>SignUp Form</h1>
        <form action="" method="post">
            <div class="row">
                <div class="inputContainer">
                    <div>
                        <label for="firs_name">First Name</label>
                    </div>
                    <input type="text" name="firstName" placeholder="First Name" required>
                </div>
                <div class="inputContainer">
                    <div>
                        <label for="lastName">Last Name</label>
                    </div>
                    <input type="text" name="lastName" placeholder="Last Name" required>
                </div>
            </div>
            <div class="inputContainer">
                <div>
                    <label for="userName">UserName</label>
                </div>
                <input type="text" name="userName" placeholder="UserName" required>
            </div>
            <div class="inputContainer">
                <div>
                    <label for="email">Email</label>
                </div>
                <input type="text" name="email" placeholder="example@gmail.com" required>
            </div>
            <div class="inputContainer">
                <div>
                    <label for="gender">Gender</label>
                </div>
                <select name="gender" id="">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="row">
                <div class="inputContainer">
                    <div>
                        <label for="password">Password</label>
                    </div>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="inputContainer">
                    <div>
                        <label for="conPassword">Confirm Password</label>
                    </div>
                    <input type="password" name="conPassword" placeholder="Confirm Password" required>
                </div>
            </div>
            <div class="buttonContainer">
                <button type="submit" value="LogIn">signUp</button>
                <button type="reset" value="Cancel">Cancel</button>
            </div>
        </form>
    </div>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $conPassword = $_POST["conPassword"];

    if (!preg_match('/^[a-zA-Z]{6,}$/', $firstName)) {
        echo '<script>alert("Invalid First Name. Enter a valid first name (at least 6 characters, letters only)");</script>';
    }
    if (!preg_match('/^[a-zA-Z]{6,}$/', $lastName)) {
        echo '<script>alert("Invalid Last Name. Enter a valid last name (at least 6 characters, letters only)");</script>';
    }
    if (!preg_match('/^[a-zA-Z0-9._%+-]{5,}$/', $userName)) {
        echo '<script>alert("Invalid UserName. Enter a valid username (at least 5 characters, letters, digits, and the following special characters: . _ % + -)");</script>';
    }
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/', $email)) {
        echo '<script>alert("Invalid Email. Enter a valid email address.");</script>';
    }
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
        echo '<script>alert("Invalid Password. Password must be at least 8 characters and contain at least one uppercase and one lowercase letter.");</script>';
    }
    if ($password !== $conPassword) {
        echo '<script>alert("Passwords do not match.");</script>';
    }
}
?>

</html>