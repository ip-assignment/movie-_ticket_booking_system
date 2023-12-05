<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="../../../public/css/adminPage/assignMove/index.css?v=<?php echo time() ?>">
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
                <div>
                    <a href="http://localhost/movie/php/adminPage/index.php">SignUp new Admin</a>
                </div>
                <div class="selected">
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
                </div>
                <div id="home">
                   
                    <form action="index.php" method="post">
                        <div class="inputCon">
                        <div>
                                <label for="gender">Movies:</label>
                                <select id="gender" name="moviesName">
                                    <option value="data">data</option>
                                    <option value="data">data</option>
                                </select>
                            </div>
                            <div>
                                <label for="gender">cinema Room id:</label>
                                <select id="gender" name="roomId">
                                    <option value="data">data</option>
                                    <option value="data">data</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <button type="submit" name="add">Assign</button>
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
                    <table>
                        <tr class="header">
                            <td>id</td>
                            <td>Movie name</td>
                            <td>relies Date</td>
                            <td>assigned room</td>
                            <td>#</td>
                        </tr>
                        <tr>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>unassign</td>
                        </tr>
                        <tr>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>unassign</td>
                        </tr>
                        <tr>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>data</td>
                          <td>unassign</td>
                        </tr>
                        
                    </table>
                </div>
            </main>
        </div>
   </div>
</body>
<script src="../../../public/js/adminPage/assignMove/index.js"></script>
</html>