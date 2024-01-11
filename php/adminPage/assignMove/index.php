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
    $mQuery = "SELECT * FROM `movies`";
    $rQuery = "SELECT * FROM `rooms`";

    $mResult = mysqli_query($conn, $mQuery);
    $rResult = mysqli_query($conn, $rQuery);
    $mData = mysqli_fetch_all($mResult, MYSQLI_NUM);
    $rData = mysqli_fetch_all($rResult, MYSQLI_NUM);
    $eData = null;
    if(isset($_POST['eSearch'])){
        $ESid = isset($_POST['ESid'])?mysqli_real_escape_string($conn, $_POST['ESid']):"";
        $eQuery = "SELECT * FROM `schedule` WHERE SC_id = $ESid";
        $eResult = mysqli_query($conn, $eQuery);
        $eData = mysqli_fetch_assoc($eResult);
       
    }
    $dQuery = "SELECT
            `schedule`.`SC_id`,
            `schedule`.`SC_date`,
            `schedule`.`SC_time`,
            `rooms`.`R_roomName`,
            `movies`.`M_name`
          FROM
            schedule
          JOIN
            rooms ON `rooms`.`R_id` = `schedule`.`R_id`
          JOIN
            movies ON `movies`.`M_id` = `schedule`.`M_id`";
    if(isset($_POST['DSearch'])){
        $Did = isset($_POST['Did'])?mysqli_real_escape_string($conn, $_POST['Did']):null;
        if($Did){
            echo "asdf";
            $dQuery = "SELECT
                `schedule`.`SC_id`,
                `schedule`.`SC_date`,
                `schedule`.`SC_time`,
                `rooms`.`R_roomName`,
                `movies`.`M_name`
            FROM
                schedule
            JOIN
                rooms ON `rooms`.`R_id` = `schedule`.`R_id`
            JOIN
                movies ON `movies`.`M_id` = `schedule`.`M_id`
            WHERE
                SC_id = $Did      
            ";
        }
    }
    $dResult = mysqli_query($conn, $dQuery); 
?>
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
        <a href="http://localhost/movie/php/logout.php">Logout</a>
    </header>
   <div class="container">
        <div class="bodyCon">
            <nav>
                <div>
                    <a href="http://localhost/movie/php/adminPage/index.php">SignUp new Admin</a>
                </div>
                <div class="selected">
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
                                <label for="airDate">Air Date</label>
                                <input type="date" name="airDate" required>
                            </div>
                            <div>
                                <label for="airTime">Air Time</label>
                                <input type="time" name="airTime" required>
                            </div>
                        </div>
                        <div class="inputCon">
                            <div>
                                <label for="gender">Movies:</label>
                                <select id="moviesId" name="moviesName" required>
                                    <?php 
                                        for ($i=0; $i < sizeof($mData); $i++) { 
                                            printf("<option value='%s'>%s</option>", $mData[$i][0], $mData[$i][1]);

                                        }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="gender">cinema Room id:</label>
                                <select id="roomId" name="roomId" required>
                                    <?php 
                                        for ($i=0; $i < sizeof($rData); $i++) { 
                                            printf("<option value='%s'>%s</option>", $rData[$i][1], $rData[$i][0]);
                                        }
                                    ?>
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
                                <input type="text" id="first_name" name="ESid" placeholder="ID" required>
                            </div>
                            <div style="margin-top: 24px;">
                                <button type="submit" name="eSearch">Search</button>
                            </div>
                        </div>
                    </form>
                    <form action="index.php?edit=true" method="post">
                        <div>
                            <label for="first_name">Search</label>
                            <input type="text" name="Uid"  placeholder="ID" value="<?php echo $eData?$eData['SC_id']:'' ?>" readonly required>
                        </div>
                        <div class="inputCon">
                            <div>
                                <label for="airDate">Air Date</label>
                                <input type="date" name="airDate"  value="<?php echo $eData?$eData['SC_date']:'' ?>" required>
                            </div>
                            <div>
                                <label for="airTime">Air Time</label>
                                <input type="time" name="airTime" value="<?php echo $eData?$eData['SC_time']:'' ?>" required>
                            </div>
                        </div>
                        <div class="inputCon">
                            <div>
                                <label for="gender">Movies:</label>
                                <select id="emoviesId" name="moviesName" required>
                                    <?php 
                                        for ($i=0; $i < sizeof($mData); $i++) { 
                                            printf("<option value='%s'>%s</option>", $mData[$i][0], $mData[$i][1]);
                                        }
                                        echo $eData?'<script>document.getElementById("emoviesId").value = '.$eData['M_id'].'</script>':null;
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="">cinema Room id:</label>
                                <select id="eroomId" name="roomId" required>
                                    <?php 
                                        for ($i=0; $i < sizeof($rData); $i++) { 
                                            printf("<option value='%s'>%s</option>", $rData[$i][1], $rData[$i][0]);
                                        }
                                        echo $eData?'<script>document.getElementById("eroomId").value = '.$eData['R_id'].'</script>':null;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <button type="submit" name="edit">edit</button>
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
                                <button type="submit" name="DSearch">Search</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table>
                        <tr class="header">
                            <td>id</td>
                            <td>Movie name</td>
                            <td>relies Date</td>
                            <td>relies Time</td>
                            <td>assigned room</td>
                            <td>#</td>
                        </tr>

                        <?php 
                            while($dData = mysqli_fetch_assoc($dResult)){
                                printf("
                                 <tr>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                </tr>
                                ", $dData['SC_id'], $dData['M_name'], $dData['SC_date'], $dData['SC_time'], $dData['R_roomName'], '<a href="http://localhost/movie/php/adminPage/assignMove/delete.php?id='.$dData['SC_id'].'">Remove</a>');
                            }
                        
                        ?>  
                    </table>
                </div>
            </main>
        </div>
   </div>
</body>
<script src="../../../public/js/adminPage/assignMove/index.js?v=<?php echo time() ?>"></script>
<?php 
    if(isset($_POST['add'])){
        $airDate = isset($_POST['airDate'])?mysqli_real_escape_string($conn, $_POST['airDate']):null;
        $ariTime = isset($_POST['airTime'])?mysqli_real_escape_string($conn, $_POST['airTime']):null;
        $movie = isset($_POST['moviesName'])?mysqli_real_escape_string($conn, $_POST['moviesName']):null;
        $room = isset($_POST['roomId'])?mysqli_real_escape_string($conn, $_POST['roomId']):null;

        $query = " INSERT INTO `schedule` (M_id, R_id, SC_date, SC_time)
                    SELECT
                        $movie,
                        $room,
                        '$airDate',
                        '$ariTime'
                    FROM
                        dual
                    WHERE
                        (SELECT COUNT(*)
                        FROM `schedule`
                        WHERE `SC_date` = '$airDate' AND `R_id` = '$room' AND TIMEDIFF('$ariTime', SC_time) <= '00:20:00') <= 0

        ";
        mysqli_query($conn, $query);
        if(mysqli_affected_rows($conn) <= 0){
            echo "<script>alert('schedule overlap')</script>";
        }
    }

    if(isset($_POST['edit'])){
        
        $Uid = isset($_POST['Uid'])?mysqli_real_escape_string($conn, $_POST['Uid']):null;
        $airDate = isset($_POST['airDate'])?mysqli_real_escape_string($conn, $_POST['airDate']):null;
        $ariTime = isset($_POST['airTime'])?mysqli_real_escape_string($conn, $_POST['airTime']):null;
        $movie = isset($_POST['moviesName'])?mysqli_real_escape_string($conn, $_POST['moviesName']):null;
        $room = isset($_POST['roomId'])?mysqli_real_escape_string($conn, $_POST['roomId']):null;

        $uQuery = " UPDATE schedule
                    SET
                        M_id = $movie,
                        R_id = $room,
                        SC_date = '$airDate',
                        SC_time = '$ariTime'
                    WHERE SC_id = $Uid AND (SELECT COUNT(*)
                        FROM `schedule`
                        WHERE `SC_date` = '$airDate'  AND `R_id` = '$room' AND TIMEDIFF('$ariTime', SC_time) <= '00:20:00' AND SC_id <> $Uid) <= 0 

        ";
        mysqli_query($conn, $uQuery);
        if(mysqli_affected_rows($conn) <= 0){
            echo "<script>alert('schedule overlap')</script>";
        }
    }


?>
</html>