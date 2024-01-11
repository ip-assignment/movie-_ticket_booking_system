<?php 
    include '../config/config.php';
    session_start();
    if(isset($_SESSION['state'])){
        if($_SESSION['state'] == 'user'){
            header('Location: http://localhost/movie/php/userPage', true);
            exit();
        }
        if ($_SESSION['state'] == 'admin') {
            header('Location: http://localhost/movie/php/adminPage', true);
            exit();
        }
        if($_SESSION['state'] == 'receptionist'){
            header('Location: http://localhost/movie/php/receptionist/', true);
            exit();
        }
        if($_SESSION['state'] == 'owner'){
            header("Location: http://localhost/movie/php/ownerPage/ownerPage.php", true);
            exit();
        }

    }
?>

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
        $userName = isset($_POST['userName'])?mysqli_real_escape_string($conn, $_POST['userName']):null;
        $password = isset($_POST['password'])?mysqli_real_escape_string($conn, $_POST['password']):null;
        if($userName && $password){
            if (preg_match('/^[a-zA-Z0-9._%+-]{6,}$/', $userName)) {
                if (preg_match('/^.*(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password)) {
                    $query = "SELECT * FROM `users` WHERE `U_UserName` = '".$userName."' AND `U_password` = '".$password."'";
                    $result = mysqli_query($conn, $query);
                    if($data = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $_SESSION['state'] = $data['U_state'];
                        $_SESSION['id'] = $data['U_id'];
                        if($data['U_state'] == 'admin'){
                            header("Location: http://localhost/movie/php/adminPage", true);
                            exit();
                        }elseif($_SESSION['state'] == 'user'){
                            header("Location: http://localhost/movie/php/userPage", true);
                            exit();
                        }elseif($_SESSION['owner']){
                            header("Location: http://localhost/movie/php/ownerPage/ownerPage.php", true);
                            exit();
                        }else{
                            header("Location: http://localhost/movie/php/receptionist/", true);
                            exit();
                        }
                    }else{
                        echo "no data";
                    }
                }else{
                    echo '<script>alert("Invalid Password. Must be at least 8 characters and contain at least one uppercase and one lowercase letter.");</script>';
                }
            }else{
                echo '<script>alert("Invalid UserName. Must be at least 6 characters and can only contain letters, digits, and the following special characters: . _ % + -");</script>';
            }
            
        }

    ?>

</html>