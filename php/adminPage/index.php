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
        <a href="#">Logout</a>
    </header>
   <div class="container">
        <div class="bodyCon">
            <nav>
                <div class="selected">
                    <a href="http://localhost/movie/php/adminPage/index.php">SignUp new Admin</a>
                </div>
                <div>
                    <a href="http://localhost/movie/php/adminPage/assignMove/">Assign movies to cinema rooms</a>
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
                                <option value="male">Male</option>
                                <option value="female">Female</option>
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
                            <input type="text" id="first_name" name="Did" placeholder="id" required disabled>
                        </div>
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
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="inputCon">
                                <div>
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" placeholder="Password" required>
                                    
                                </div>
                                <div>
                                    <label for="confirm_password">Confirm password:</label>
                                    <input type="password" id="conPassword" name="confirm_password" placeholder="Confirm password" required>
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
                                <input type="text" id="first_name" name="search" placeholder="ID" required>
                            </div>
                            <div style="margin-top: 24px;">
                                <button type="submit" name="eSearch">Search</button>
                            </div>
                        </div>
                    </form>
                    <table>
                        <tr class="header">
                            <td>id</td>
                            <td>First</td>
                            <td>Last</td>
                            <td>User Name</td>
                            <td>#</td>
                        </tr>
                        <tr>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>delete</td>
                        </tr>
                        <tr>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>delete</td>
                        </tr>
                        <tr>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>delete</td>
                        </tr>
                        
                    </table>
                </div>
            </main>
        </div>
   </div>
</body>
<script src="../../public/js/adminPage/index.js"></script>
</html>