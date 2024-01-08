<?php 
    include '../config/config.php';
    session_start();
?>

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
                <input type="email" name="email" placeholder="example@gmail.com" required>
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
                <button type="submit" name="log" value="LogIn">signUp</button>
                <button type="reset" value="Cancel">Cancel</button>
            </div>
        </form>
    </div>
</body>
<?php 
    $firstName = isset($_POST['firstName'])?mysqli_real_escape_string($conn, trim($_POST['firstName'])):null;
    $lastName = isset($_POST['lastName'])?mysqli_real_escape_string($conn, trim($_POST['lastName'])):null;
    $userName = isset($_POST['userName'])?mysqli_real_escape_string($conn, trim($_POST['userName'])):null;
    $email = isset($_POST['email'])?mysqli_real_escape_string($conn, trim($_POST['email'])):null;
    $gender = isset($_POST['gender'])?mysqli_real_escape_string($conn, trim($_POST['gender'])):null;
    $password = isset($_POST['password'])?mysqli_real_escape_string($conn, trim($_POST['password'])):null;
    $conPassword = isset($_POST['conPassword'])?mysqli_real_escape_string($conn, trim($_POST['conPassword'])):null;
    if(isset($_POST['log'])){
        if (preg_match('/^[a-zA-Z]{6,}$/', $firstName)) {
            if (preg_match('/^[a-zA-Z]{6,}$/', $lastName)) {
                if (preg_match('/^[a-zA-Z0-9._%+-]{5,}$/', $userName)) {
                    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
                        if($password == $conPassword && $password && $conPassword){
                            $query = "
                                        INSERT IGNORE INTO `users` (`U_FirstName`, `U_LastName`, `U_UserName`, `U_Email`, `U_Gender`, `U_password`)
                                        VALUES ('$firstName', '$lastName', '$userName', '$email', '$gender', '$password')
                                    ";
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                if (mysqli_affected_rows($conn) <= 0) {
                                echo "<script>alert('Username already exists. Please choose a different username.')</script>";
                                }else{
                                    $query = "SELECT * FROM `users` WHERE `U_UserName` = '$userName'";
                                    $result = mysqli_query($conn, $query);
                                    $data = mysqli_fetch_assoc($result);
                                    $_SESSION['state'] = $data['U_state'];
                                    $_SESSION['id'] = $data['U_id'];
                                    header("Location: http://localhost/movie/php/userPage", true);
                                    exit();
                                }    
                            } else {
                                echo "<script>alert('Something went wrong, please try again later.')</script>";
                            }
                        }else{
                            echo "<script>alert('password does not match')</script>";
                        }
                    }else{
                        echo '<script>alert("Invalid Password. Password must be at least 8 characters and contain at least one uppercase and one lowercase letter.");</script>';
                    }
                }else{
                    echo '<script>alert("Invalid UserName. Enter a valid username (at least 5 characters, letters, digits, and the following special characters: . _ % + -)");</script>';
                }
            }else{
                echo '<script>alert("Invalid Last Name. Enter a valid last name (at least 6 characters, letters only)");</script>';
            }
        }else{
            echo '<script>alert("Invalid First Name. Enter a valid first name (at least 6 characters, letters only)");</script>';
        }
        
    }

?>

</html>