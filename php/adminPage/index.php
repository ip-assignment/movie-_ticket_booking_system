<?php

    include '../../config/config.php';
    session_start();
    if(isset($_SESSION['state'])){
        if($_SESSION['state'] == 'user'){
            header('Location: http://localhost/movie/php/userPage', true);
            exit();
        }
    }else{
        header('Location: http://localhost/movie/php', true);
        exit();
    }
    $eData = null;
    if(isset($_POST['eSearch'])){
        $eId = isset($_POST['search'])?mysqli_real_escape_string($conn, $_POST['search']):null;
        $query = "SELECT * FROM `users` where U_id = ".$eId." AND (`U_state` = 'admin' OR `U_state` = 'owner')";
        $eResult = mysqli_query($conn, $query);
        $eData = mysqli_fetch_array($eResult, MYSQLI_ASSOC);
        if(!$eData){
            echo "<script>alert('no user white that id')</script>";
        } 
    }
    $disQuery = "SELECT * from `users` WHERE (`U_state` = 'admin' OR `U_state` = 'owner')";
    $disResult = mysqli_query($conn, $disQuery);
    
    $Did = isset($_POST['did'])?mysqli_real_escape_string($conn, $_POST['did']):null;
    if($Did){
        $dQuery = "SELECT * FROM `users` WHERE U_id = ".$Did." AND (`U_state` = 'admin' OR `U_state` = 'owner')";
        $dResult = mysqli_query($conn, $dQuery);
        if($dResult){
            $disData = mysqli_fetch_all($dResult, MYSQLI_ASSOC);
        }
    }else{
        $disData = mysqli_fetch_all($disResult, MYSQLI_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="../../public/css/adminPage/index.css?v=<?php echo time() ?>">
    <title>Admin Page</title>
</head>

<body>
    <header>
        <h2>Admin</h2>
        <a href="http://localhost/movie/php/logout.php">Logout</a>
    </header>
   <div class="container">
        <div class="bodyCon">
            <nav>
                <div class="selected">
                    <a href="http://localhost/movie/php/adminPage/index.php">SignUp new Admin</a>
                </div>
                <div>
                    <a href="http://localhost/movie/php/adminPage/assignMove/">Scheduling</a>
                </div>
                <div>
                    <a href="http://localhost/movie/php/adminPage/addCinemaRoom/">Add a new cinema room</a>
                </div>
                <div>
                    <a href="http://localhost/movie/php/adminPage/addNewMove/">add new movies</a>
                </div>
            </nav>
            <main>
                <div class="toggle">
                    <div id="homeTG">
                        Home
                    </div>
                    <div id="editTG">
                        Edit
                    </div>
                    <div id="deleteTG">
                        Delete
                    </div>
                </div>
                <div id="home">
                   
                    <form action="index.php" method="post">
                        <div class="inputCon">
                            <div>
                                <label for="first_name">First Name:</label>
                                <input type="text" id="first_name" name="firstName" placeholder="First Name" required>
                            </div>
                            <div>
                                <label for="last_name">Last Name:</label>
                                <input type="text" id="last_name" name="lastName" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div>
                            <label for="user_name">User Name:</label>
                            <input type="text" id="user_name" name="userName" placeholder="User Name" required>
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="example@gamil.com" required>
                        </div>
                        <div>
                            <label for="gender">Gender:</label>
                            <select id="gender" name="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="status">User Role</label>
                            <select name="status" id="">
                                <option value="admin">Admin</option>
                                <option value="owner">Owner</option>
                            </select>
                        </div>
                        <div class="inputCon">
                            <div>
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" placeholder="Password" required>
                                
                            </div>
                            <div>
                                <label for="confirm_password">Confirm password:</label>
                                <input type="password" id="confirm_password" name="conPassword" placeholder="Confirm password" required>
                            </div>
                        </div>
                        <br>
                        <button type="submit" name="add">Signup</button>
                        <button type="reset">reset</button>
    
                    </form>
                </div>
                <div id="edit">
                    <form action="index.php?edit=true" method="post">
                        <div class="inputCon">
                            <div>
                                <label for="first_name">Search</label>
                                <input type="text" id="first_name" name="search" placeholder="ID" required>
                            </div>
                            <div style="margin-top: 24px;">
                                <button type="submit" name="eSearch">Search</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form action="index.php?edit=true" method="post">
                        <div>
                            <label for="first_name">ID:</label>
                            <input type="text" value="<?php echo $eData?$eData['U_id']:'' ?>" id="first_name" name="Did" placeholder="id" required readonly>
                        </div>
                        <div class="inputCon">
                                <div>
                                    <label for="first_name">First Name:</label>
                                    <input type="text" value="<?php echo $eData?$eData['U_FirstName']:'' ?>"  id="first_name" name="firstName" placeholder="First Name" required>
                                </div>
                                <div>
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" value="<?php echo $eData?$eData['U_LastName']:'' ?>" id="last_name" name="lastName" placeholder="Last Name" required>
                                </div>
                            </div>
                            <div>
                                <label for="user_name">User Name:</label>
                                <input type="text" value="<?php echo $eData?$eData['U_UserName']:'' ?>" id="user_name" name="userName" placeholder="User Name" required>
                            </div>
                            <div>
                                <label for="email">Email:</label>
                                <input type="email" value="<?php echo $eData?$eData['U_Email']:'' ?>" id="email" name="email" placeholder="example@gamil.com" required>
                            </div>
                            <div>
                                <label for="gender">Gender:</label>
                                <select id="gender" name="gender">
                                    <option <?php echo $eData?($eData['U_Gender'] == 'M'?'selected':''):'' ?> value="M">Male</option>
                                    <option <?php echo $eData?($eData['U_Gender'] == 'F'?'selected':''):'' ?> value="F">Female</option>
                                </select>
                            </div>
                            <div>
                                <label for="status">User Role</label>
                                <select name="status" id="">
                                    <option <?php echo $eData?($eData['U_state'] == 'admin'?'selected':''):'' ?> value="admin">Admin</option>
                                    <option <?php echo $eData?($eData['U_state'] == 'owner'?'selected':''):'' ?> value="owner">Owner</option>
                                </select>
                            </div>
                            <div class="inputCon">
                                <div>
                                    <label for="password">Password:</label>
                                    <input type="password" value="<?php echo $eData?$eData['U_password']:'' ?>" id="password" name="password" placeholder="Password" required>
                                    
                                </div>
                                <div>
                                    <label for="confirm_password">Confirm password:</label>
                                    <input type="password" id="conPassword" value = <?php echo $eData?$eData['U_password']:'' ?> name="conPassword" placeholder="Confirm password" required>
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="edit">Edit</button>
                            <button type="reset">reset</button>
                    </form>
                </div>
                <div id="delete">
                    <form action="index.php?delete=true" method="post">
                        <div class="inputCon">
                            <div>
                                <label for="first_name">Search</label>
                                <input type="text" id="first_name" name="did" placeholder="ID">
                            </div>
                            <div style="margin-top: 24px;">
                                <button type="submit" name="DSearch">Search</button>
                            </div>
                        </div>
                    </form>
                    <table>
                        <tr class="header">
                            <td>id</td>
                            <td>First</td>
                            <td>Last</td>
                            <td>User Name</td>
                            <td>User Role</td>
                            <td>#</td>
                        </tr>

                        <?php 
                            if($disData){
                                foreach ($disData as $key => $value ) {
                                     printf("
                                            <tr>
                                                <td>%s</td>
                                                <td>%s</td>
                                                <td>%s</td>
                                                <td>%s</td>
                                                <td>%s</td>
                                                <td>%s</td>
                                            </tr>
                                            
                                            ", $value['U_id'],$value['U_FirstName'],$value['U_LastName'],$value['U_UserName'],$value['U_state'],"<a href='http://localhost/movie/php/adminPage/delete.php?id=".$value['U_id']."'>Delete</a>",);
                                }
                            }
                        ?>
                    </table>
                </div>
                
            </main>
        </div>
   </div>
</body>
<script src="../../public/js/adminPage/index.js"></script>
<?php
    if(isset($_POST['add'])){
        $firstName = isset($_POST['firstName'])?mysqli_real_escape_string($conn, trim($_POST['firstName'])):null;
        $lastName = isset($_POST['lastName'])?mysqli_real_escape_string($conn, trim($_POST['lastName'])):null;
        $userName = isset($_POST['userName'])?mysqli_real_escape_string($conn, trim($_POST['userName'])):null;
        $email = isset($_POST['email'])?mysqli_real_escape_string($conn, trim($_POST['email'])):null;
        $gender = isset($_POST['gender'])?mysqli_real_escape_string($conn, trim($_POST['gender'])):null;
        $status = isset($_POST['status'])?mysqli_real_escape_string($conn, trim($_POST['status'])):null;
        $password = isset($_POST['password'])?mysqli_real_escape_string($conn, trim($_POST['password'])):null;
        $conPassword = isset($_POST['conPassword'])?mysqli_real_escape_string($conn, trim($_POST['conPassword'])):null;
    
        if($password == $conPassword && $password && $conPassword){
            $query = "
                        INSERT IGNORE INTO `users` (`U_FirstName`, `U_LastName`, `U_UserName`, `U_Email`, `U_Gender`, `U_password`, `U_state`)
                        VALUES ('$firstName', '$lastName', '$userName', '$email', '$gender', '$password','$status')
                    ";
            $result = mysqli_query($conn, $query);
    
            if ($result) {
                if (mysqli_affected_rows($conn) <= 0) {
                   echo "<script>alert('Username already exists. Please choose a different username.')</script>";
                }    
            } else {
                echo "<script>alert('Something went wrong, please try again later.')</script>";
            }
        }else{
            echo "<script>alert('password does not match')</script>";
        }
    }
    if(isset($_POST['edit'])){
        $Did = isset($_POST['Did'])?mysqli_real_escape_string($conn, trim($_POST['Did'])):null;
        $firstName = isset($_POST['firstName'])?mysqli_real_escape_string($conn, trim($_POST['firstName'])):null;
        $lastName = isset($_POST['lastName'])?mysqli_real_escape_string($conn, trim($_POST['lastName'])):null;
        $userName = isset($_POST['userName'])?mysqli_real_escape_string($conn, trim($_POST['userName'])):null;
        $email = isset($_POST['email'])?mysqli_real_escape_string($conn, trim($_POST['email'])):null;
        $gender = isset($_POST['gender'])?mysqli_real_escape_string($conn, trim($_POST['gender'])):null;
        $status = isset($_POST['status'])?mysqli_real_escape_string($conn, trim($_POST['status'])):null;
        $password = isset($_POST['password'])?mysqli_real_escape_string($conn, trim($_POST['password'])):null;
        $conPassword = isset($_POST['conPassword'])?mysqli_real_escape_string($conn, trim($_POST['conPassword'])):null;
    
    
        if($password == $conPassword && $password && $conPassword){
            $query = "
                        UPDATE `users`
                        SET `U_FirstName` = '".$firstName."', `U_LastName`= '".$lastName."', `U_UserName` ='".$userName."', `U_Email` = '".$email."', `U_Gender` = '".$gender."', `U_password` = '".$password."' `U_state` = '".$status."'
                        WHERE U_id = '".$Did."'
                        AND (SELECT COUNT(*) FROM `users` WHERE U_UserName = '".$userName."'  AND U_id <> ".$Did.") < 1
                    ";
            $result = mysqli_query($conn, $query);
    
            if ($result) {
                if (mysqli_affected_rows($conn) <= 0) {
                   echo "<script>alert('Username already exists. Please choose a different username.')</script>";
                }    
            } else {
                echo "<script>alert('Something went wrong, please try again later.')</script>";
            }
        }else{
            echo "<script>alert('password does not match')</script>";
        }
    }

?>
</html>