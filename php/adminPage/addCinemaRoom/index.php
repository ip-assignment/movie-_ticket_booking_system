<?php
    include '../../../config/config.php';
    include '../../../util/generateCinemaSeats.php';
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
    $data = null;
    if(isset($_POST['ESearch'])){
        $eid = isset($_POST['eid'])?mysqli_real_escape_string($conn, $_POST['eid']):null;
        $query = "SELECT * FROM `rooms` WHERE R_id = $eid";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
        $cQuery = "SELECT COUNT(*) as setCount , S_price FROM `seatas` where R_id = $eid AND S_type = 'eco'";
        $result = mysqli_query($conn, $cQuery);
        $eCount = mysqli_fetch_assoc($result);
        $cQuery = "SELECT COUNT(*) as setCount, S_price FROM `seatas` where R_id = $eid AND S_type = 'vip'";
        $result = mysqli_query($conn, $cQuery);
        $vCount = mysqli_fetch_assoc($result);
    }
    $dQuery = "SELECT * FROM `rooms`";
    if(isset($_POST['dSearch'])){
        $DDsearch = isset($_POST['DDsearch'])? mysqli_real_escape_string($conn, $_POST['DDsearch']):null;
        if($DDsearch){
            $dQuery = "SELECT * FROM `rooms` WHERE R_id = $DDsearch";
        }
    }
    $DDresult = mysqli_query($conn, $dQuery);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="../../../public/css/adminPage/addCinemaRoom/index.css?v=<?php echo time() ?>">
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
                <div class="selected">
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
                        <div>
                            <label for="gender">Room name:</label>
                            <input type="text" name="roomName" id="" required>
                        </div>
                        <div class="row">
                            <div>
                                <label for="gender">Number of economy seats:</label>
                                <input type="number" name="eNumberOfSeats" required>
                            </div>
                            <div>
                                <label for="gender">Price:</label>
                                <input type="number" name="ePrice" required>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label for="gender">Number of vip seats:</label>
                                <input type="number" name="vNumberOfSeats" required>
                            </div>
                            <div>
                                <label for="gender">Price:</label>
                                <input type="number" name="VPrice" required>
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
                                <input type="text" id="first_name" name="eid" placeholder="ID" required>
                            </div>
                            <div style="margin-top: 24px;">
                                <button type="submit" name="ESearch">Search</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form action="index.php?edit=true" method="post">
                        <div>
                            <label for="first_name">ID:</label>
                            <input type="text" id="first_name" name="EEid" value="<?php echo $data?$data['R_id']:"" ?>" placeholder="id" required readonly>
                        </div>
                        <div>
                            <label for="gender">Room name:</label>
                            <input type="text" name="roomName" id="" value="<?php echo $data?$data['R_roomName']:"" ?>" required>
                        </div>
                        <div class="row">
                            <div>
                                <label for="gender">Number of economy seats:</label>
                                <input type="number" name="eNumberOfSeats" value="<?php echo $eCount?$eCount['setCount']:""?>"  required>
                            </div>
                            <div>
                                <label for="gender">Price:</label>
                                <input type="number" name="ePrice" value="<?php echo $vCount?$eCount['S_price']:""?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label for="gender">Number of vip seats:</label>
                                <input type="number" name="vNumberOfSeats" value="<?php echo $vCount?$vCount['setCount']:""?>" required>
                            </div>
                            <div>
                                <label for="gender">Price:</label>
                                <input type="number" name="VPrice" value="<?php echo $vCount?$vCount['S_price']:""?>" required>
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
                                <input type="text" id="first_name" name="DDsearch" placeholder="ID">
                            </div>
                            <div style="margin-top: 24px;">
                                <button type="submit" name="dSearch">Search</button>
                            </div>
                        </div>
                    </form>
                    <table>
                        <tr class="header">
                            <td>id</td>
                            <td>Room Name</td>
                            <td>#</td>
                        </tr>
                        <?php 
                            while($DDdata = mysqli_fetch_assoc($DDresult)){
                                printf("
                                    <tr>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                    </tr>
                                
                                ", $DDdata['R_id'], $DDdata['R_roomName'], " <a href='http://localhost/movie/php/adminPage/addCinemaRoom/delete.php?id=".$DDdata['R_id']."'>Delete</a>");
                            }
                        
                        ?>
                    </table>
                </div>
            </main>
        </div>
   </div>
</body>
<script src="../../../public/js/adminPage/addCinemaRoom/index.js"></script>
<?php 
    if(isset($_POST['add'])){
        $roomName = isset($_POST['roomName'])?mysqli_real_escape_string($conn, $_POST['roomName']):null;
        $eNumberOfSeats = isset($_POST['eNumberOfSeats'])?mysqli_real_escape_string($conn, $_POST['eNumberOfSeats']):null;
        $ePrice = isset($_POST['ePrice'])?mysqli_real_escape_string($conn, $_POST['ePrice']):null;
        $vNumberOfSeats = isset($_POST['vNumberOfSeats'])?mysqli_real_escape_string($conn, $_POST['vNumberOfSeats']):null;
        $vPrice = isset($_POST['VPrice'])?mysqli_real_escape_string($conn, $_POST['VPrice']):null;

        $query = "INSERT IGNORE INTO `rooms`(R_roomName) VALUES('$roomName')";

        $result = mysqli_query($conn, $query);
        if($result && mysqli_affected_rows($conn) > 0){
            $getIDQuery = "SELECT * FROM `rooms` WHERE R_RoomName = '$roomName'";
            $getIDResult = mysqli_query($conn, $getIDQuery);
            if($getIDResult){
                $getIDData = mysqli_fetch_assoc($getIDResult);
                $eSeatsCode = generateCinemaSeats($eNumberOfSeats, '-E');
                $vSeatsCode = generateCinemaSeats($vNumberOfSeats, '-V');
                for ($i=0; $i < sizeof($eSeatsCode); $i++) { 
                    $SeatsInsertQuery = "INSERT INTO `seatas` (S_name, S_type, R_id, S_price) VALUES(
                        '".$eSeatsCode[$i]."','eco', ".$getIDData['R_id'].", $ePrice   
                    )";
                    mysqli_query($conn, $SeatsInsertQuery);
                }
                for ($i=0; $i < sizeof($vSeatsCode); $i++) { 
                    $SeatsInsertQuery = "INSERT INTO `seatas` (S_name, S_type, R_id, S_price) VALUES(
                        '".$vSeatsCode[$i]."','vip', ".$getIDData['R_id'].", $vPrice   
                    )";
                    mysqli_query($conn, $SeatsInsertQuery);
                }
            }

        }else{
            echo "<script>alert('there was a local host connection was lost or room name was duplicated.')</script>";
        }
       
    }

    if(isset($_POST['edit'])){
        $EEid = isset($_POST['EEid'])?mysqli_real_escape_string($conn, $_POST['EEid']):null;
        $roomName = isset($_POST['roomName'])?mysqli_real_escape_string($conn, $_POST['roomName']):null;
        $eNumberOfSeats = isset($_POST['eNumberOfSeats'])?mysqli_real_escape_string($conn, $_POST['eNumberOfSeats']):null;
        $ePrice = isset($_POST['ePrice'])?mysqli_real_escape_string($conn, $_POST['ePrice']):null;
        $vNumberOfSeats = isset($_POST['vNumberOfSeats'])?mysqli_real_escape_string($conn, $_POST['vNumberOfSeats']):null;
        $vPrice = isset($_POST['VPrice'])?mysqli_real_escape_string($conn, $_POST['VPrice']):null;
        $query = "UPDATE `rooms` SET R_roomName = '$roomName' WHERE (
                R_id = $EEid
                AND
                (
                    SELECT COUNT(*) FROM `rooms` WHERE R_roomName = '$roomName' AND R_id <> $EEid
                ) <= 0
            ) ";

        $result = mysqli_query($conn, $query);
        $cQuery = "SELECT COUNT(*) as setCount , S_price FROM `seatas` where R_id = $EEid AND S_type = 'eco'";
        $result = mysqli_query($conn, $cQuery);
        $eCount = mysqli_fetch_assoc($result);
        $cQuery = "SELECT COUNT(*) as setCount, S_price FROM `seatas` where R_id = $EEid AND S_type = 'vip'";
        $result = mysqli_query($conn, $cQuery);
        $vCount = mysqli_fetch_assoc($result);
        if($eCount['setCount'] != $eNumberOfSeats || $vCount['setCount'] != $vNumberOfSeats){
            if($eCount['setCount'] != $eNumberOfSeats){
                $countUpdateQuery = "DELETE FROM `seatas` WHERE R_id = $EEid AND S_type = 'eco'";
                mysqli_query($conn, $countUpdateQuery);
                $newSeatCode = generateCinemaSeats($eNumberOfSeats, '-E');
                for ($i=0; $i < sizeof($newSeatCode); $i++) { 
                    $SeatsInsertQuery = "INSERT INTO `seatas` (S_name, S_type, R_id, S_price) VALUES(
                        '".$newSeatCode[$i]."','eco', ".$EEid.", $ePrice   
                    )";
                    mysqli_query($conn, $SeatsInsertQuery);
                }
            }

            if($vCount['setCount'] != $vNumberOfSeats){
                $countUpdateQuery = "DELETE FROM `seatas` WHERE R_id = $EEid AND S_type = 'vip'";
                mysqli_query($conn, $countUpdateQuery);
                $newSeatCode = generateCinemaSeats($vNumberOfSeats, '-V');
                for ($i=0; $i < sizeof($newSeatCode); $i++) { 
                    $SeatsInsertQuery = "INSERT INTO `seatas` (S_name, S_type, R_id, S_price) VALUES(
                        '".$newSeatCode[$i]."','vip', ".$EEid.", $vPrice   
                    )";
                    mysqli_query($conn, $SeatsInsertQuery);
                }
            }
        }else{
            if($eCount['S_price'] != $ePrice){
                $updatePriceQuery = "UPDATE `seatas` SET S_price = $ePrice WHERE R_id = $EEid AND S_type = 'eco'";
                mysqli_query($conn, $updatePriceQuery);
            }
            if($vCount['S_price'] != $vPrice){
                $updatePriceQuery = "UPDATE `seatas` SET S_price = $vPrice WHERE R_id = $EEid AND S_type = 'vip'";
                mysqli_query($conn, $updatePriceQuery);
            }
        }

    }

?>
</html>