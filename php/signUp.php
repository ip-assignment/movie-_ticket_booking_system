<?php
    session_start();
    include "../config/config.php" 
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
                <input type="submit" value="LogIn">
                <input type="reset" value="Cancel">
            </div>
        </form>
    </div>
</body>
<?php 
    $firstName = isset($_POST['firstName'])?trim($_POST['firstName']):null;
    $lastName = isset($_POST['lastName'])?trim($_POST['lastName']):null;
    $userName = isset($_POST['userName'])?trim($_POST['userName']):null;
    $email = isset($_POST['email'])?trim($_POST['email']):null;
    $gender = isset($_POST['gender'])?trim($_POST['gender']):null;
    $password = isset($_POST['password'])?trim($_POST['password']):null;
    $conPassword = isset($_POST['conPassword'])?trim($_POST['conPassword']):null;
    if($firstName && $lastName&& $userName && $email && $gender && $gender && $password && $conPassword){

        if($password == $conPassword && $password){
            $checkQuery = "SELECT * FROM users WHERE userName=:userName;";
            $checkStatus = $conn->prepare($checkQuery);
            if($checkStatus->execute([':userName'=>$userName])){
                if($checkStatus->rowCount()){
                    echo "<script>alert('the user name is takin')</script>";
                }else{
                    $query = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `userName`, `email`, `gender`, `password`) VALUES (NULL, :first_name, :last_name, :userName, :email, :gender, :password)";
                    $status = $conn->prepare($query);
                    $isSu = $status->execute([":first_name"=>$firstName, ":last_name"=>$lastName, ":userName"=>$userName, ":email"=>$email, ":gender"=>$gender, ':password'=>$password]);
                    if($isSu){
                        $logQuery = "SELECT * FROM users WHERE userName=:userName AND password=:password";
                        $logStatus = $conn->prepare($logQuery);
                        if($logStatus->execute([':userName'=>$userName, ":password"=>$password])){
                            if($logStatus->rowCount()){
                                $result = $logStatus->fetch(PDO::FETCH_OBJ);
                                $_SESSION['id'] = $result->id;
                                $_SESSION['admin'] = $result->is_admin;
                                header("Location: http://localhost/refIP2/php/userPage/", true);
                                exit();
                            }else{
                                echo "enter error";
                            }
                        }else{
                            echo "error";
                        }
                    }else{
                        echo "asdf";
                        echo "<script>alert('some ting want wrong while signing up plies try agin later or check if you entered the correct data and try agin')</script>";
                    }
                }
            }else{
                echo "<script>alert('some ting want wrong while checking the user name plies try agin later')</script>";
            }
        }else{
            echo "<script>alert('the password you matched is incorrect')</script>";
        }
    }


?>
</html>