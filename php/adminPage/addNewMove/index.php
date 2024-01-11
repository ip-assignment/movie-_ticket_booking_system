<?php 
    include '../../../config/config.php';
    session_start();
    if(isset($_SESSION['state'])){
        if($_SESSION['state'] == 'user'){
            header('Location: http://localhost/movie/php/userPage', true);
            exit();
        }
        if($_SESSION['state'] == 'receptionist'){
            header('Location: http://localhost/movie/php/receptionist/', true);
            exit();
        }

    }else{
        header('Location: http://localhost/movie/php', true);
        exit();
    }
    $eData = null;
    if(isset($_POST['eSearch'])){
        $eQuery = "SELECT * FROM `movies` WHERE M_id = ".$_POST['search']."";
        $eResult = mysqli_query($conn, $eQuery);
        $eData = mysqli_fetch_assoc($eResult);
    }
    $query = "SELECT * FROM `movies`";
    if(isset($_POST['dSearch'])){
        $Did = isset($_POST['Did'])?mysqli_real_escape_string($conn, $_POST['Did']):null;
        if($Did){
            $query = "SELECT * FROM `movies` WHERE M_id = $Did";
        }
    }
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="../../../public/css/adminPage/addNewMove/index.css?v=<?php echo time() ?>">
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
                <div>
                    <a href="http://localhost/movie/php/adminPage/index.php">SignUp new Admin</a>
                </div>
                <div>
                    <a href="http://localhost/movie/php/adminPage/assignMove/">Scheduling</a>
                </div>
                <div>
                    <a href="http://localhost/movie/php/adminPage/addCinemaRoom/">Add a new cinema room</a>
                </div>
                <div class="selected">
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
                        <div class="form-container">
                            <label for="moviePoster" class="form-label">Movie Poster</label>
                            <input type="file" name="moviePoster" id="moviePoster" class="file-input" required>
                        </div>
                        <div class="row">
                            <div>
                                <label for="gender">Move Name:</label>
                                <input type="text" name="moveName" id="" required>
                            </div>
                            <div>
                                <label for="">Duration</label>
                                <input type="time" name="duration" required>
                            </div>
    
                        </div>
                        <div>
                            <label for="">Genre</label>
                            <input type="text" name="genre" required>
                        </div>
                        <div class="row">
                            <div>
                                <label for="">Writer</label>
                                <input type="text" name="writer" required>
                            </div>
                            <div>
                                <label for="">Producer</label>
                                <input type="text" name="producer" required>
                            </div>
                        </div>
                        <div>
                            <label for="">Actors</label>
                            <input type="text" name="actors" required>
                        </div>
                        <div>
                            <label for="gender">Description:</label>
                            <textarea name="description" rows="5" style="width: 550px;"></textarea>
                        </div>
                        <br>
                        <button type="submit" name="add">Add</button>
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
                            <input type="text" value="<?php echo $eData?$eData['M_id']:"" ?>" id="first_name" name="Eid" placeholder="id" required readonly>
                        </div>
                        <div class="form-container">
                            <label for="moviePoster" class="form-label">Movie Poster</label>
                            <input type="file" name="moviePoster" id="moviePoster" class="file-input">
                        </div>
                        <div class="row">
                            <div>
                                <label for="gender">Move Name:</label>
                                <input type="text" value="<?php echo $eData?$eData['M_name']:"" ?>" name="moveName" id="">
                            </div>
                            <div>
                                <label for="">Duration</label>
                                <input type="time" value="<?php echo $eData?$eData['M_duration']:"" ?>" name="duration">
                            </div>
                        </div>
                        <div>
                            <label for="">Genre</label>
                            <input type="text" value="<?php echo $eData?$eData['M_genre']:"" ?>" name="genre">
                        </div>
                        <div class="row">
                            <div>
                                <label for="">Writer</label>
                                <input type="text" value="<?php echo $eData?$eData['M_writer']:"" ?>" name="writer">
                            </div>
                            <div>
                                <label for="">Producer</label>
                                <input type="text" value="<?php echo $eData?$eData['M_Producer']:"" ?>" name="producer">
                            </div>
                        </div>
                        <div>
                            <label for="">Actors</label>
                            <input type="text" value="<?php echo $eData?$eData['M_actors']:"" ?>" name="actors">
                        </div>
                        <div>
                            <label for="gender">Description:</label>
                            <textarea name="description" rows="5" style="width: 550px;"><?php echo $eData ? $eData['M_description'] : ""; ?></textarea>
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
                                <input type="text" id="first_name" name="Did" placeholder="ID">
                            </div>
                            <div style="margin-top: 24px;">
                                <button type="submit" name="dSearch">Search</button>
                            </div>
                        </div>
                    </form>
                    <table>
                        <tr class="header">
                            <td>id</td>
                            <td>Move Name</td>
                            <td>Genre</td>
                            <td>#</td>
                        </tr>

                        <?php 
                            while($data = mysqli_fetch_assoc($result)){
                                printf('
                                    <tr>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                    </tr>
                                ', $data['M_id'], $data['M_name'], $data['M_genre'], "<a href='http://localhost/movie/php/adminPage/addNewMove/delete.php?id=".$data['M_id']."'>Delete</a>");
                            }
                        
                        ?>
                        
                    </table>
                </div>
            </main>
        </div>
   </div>
</body>
<script src="../../../public/js/adminPage/addNewMove/index.js?v=<?php echo time() ?>"></script>
<?php 
    if(isset($_POST['add'])){
        $movePoster = isset($_POST['moviePoster'])?mysqli_real_escape_string($conn,$_POST['moviePoster']):"";
        $moveName = isset($_POST['moveName'])?mysqli_real_escape_string($conn, $_POST['moveName']):null;
        $duration = isset($_POST['duration'])?mysqli_real_escape_string($conn, $_POST['duration']):null;
        $genre = isset($_POST['genre'])?mysqli_real_escape_string($conn, $_POST['genre']):null;
        $writer = isset($_POST['writer'])?mysqli_real_escape_string($conn, $_POST['writer']):null;
        $producer = isset($_POST['producer'])?mysqli_real_escape_string($conn, $_POST['producer']):null;
        $actors = isset($_POST['actors'])?mysqli_real_escape_string($conn, $_POST['actors']):null;
        $description = isset($_POST['description'])?mysqli_real_escape_string($conn, $_POST['description']):null;
        $pattern = '/^[\w\s]+(,[\w\s]+)*$/';
        if(preg_match($pattern, $actors)){
               
            $query = "INSERT INTO `movies`(`M_name`, `M_duration`, `M_genre`, `M_writer`, `M_Producer`, `M_actors`, `M_description`, `M_imageData`)
                    VALUES('".$moveName."', '".$duration."', '".$genre."','".$writer."','".$producer."','".$actors."', '".$description."', '".$movePoster."')
            ";
            if(mysqli_query($conn, $query)){
                echo "<script> alert('data inserted')</script>";
            }
                                
        }else{
            echo "<script>alert('names of should be separated by commas')</script>";
        }
    }
    if(isset($_POST['edit'])){
        $Eid = isset($_POST['Eid'])?mysqli_real_escape_string($conn, $_POST['Eid']):null;
        $movePoster = isset($_POST['moviePoster'])?mysqli_real_escape_string($conn,$_POST['moviePoster']):"";
        $moveName = isset($_POST['moveName'])?mysqli_real_escape_string($conn, $_POST['moveName']):null;
        $duration = isset($_POST['duration'])?mysqli_real_escape_string($conn, $_POST['duration']):null;
        $genre = isset($_POST['genre'])?mysqli_real_escape_string($conn, $_POST['genre']):null;
        $writer = isset($_POST['writer'])?mysqli_real_escape_string($conn, $_POST['writer']):null;
        $producer = isset($_POST['producer'])?mysqli_real_escape_string($conn, $_POST['producer']):null;
        $actors = isset($_POST['actors'])?mysqli_real_escape_string($conn, $_POST['actors']):null;
        $description = isset($_POST['description'])?mysqli_real_escape_string($conn, $_POST['description']):null;
        $pattern = '/^[\w\s]+(,[\w\s]+)*$/';
        if(preg_match($pattern, $actors)){
            if($movePoster){
                $query = "UPDATE `movies`
                        SET `M_name` = '".$moveName."', `M_duration` = '".$duration."', `M_description` = '".$description."', `M_genre` = '".$genre."', `M_writer` = '".$writer."', `M_Producer` = '".$producer."', `M_actors` = '".$actors."', `M_imageData` = '".$movePoster."'
                        where M_id = $Eid";
                
            }else{
                $query = "UPDATE `movies`
                        SET `M_name` = '".$moveName."', `M_duration` = '".$duration."', `M_description` = '".$description."', `M_genre` = '".$genre."', `M_writer` = '".$writer."', `M_Producer` = '".$producer."', `M_actors` = '".$actors."'
                        where M_id = $Eid";
            }
            $result = mysqli_query($conn, $query);
            if($result){
                if(mysqli_affected_rows($conn) <= 0){
                    echo "<script>alert('the time is to close to other time schedules.')</script>";
                }
            }
        }else{
            echo "<script>alert('names of should be separated by commas')</script>";
        }
    }

?>
</html>