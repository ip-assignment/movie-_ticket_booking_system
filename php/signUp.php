<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/signUp.css?v=<?php echo time()?>">
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
                <button type="submit" value="LogIn">signUp</button>
                <button type="reset" value="Cancel">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>