<?php 
    include "../../config/config.php";
    session_start();
    if(isset($_SESSION['state'])){
        if($_SESSION['state'] == 'user'){
            header('Location: http://localhost/movie/php/userPage', true);
            exit();
        }
    }
    $dData = null;
    if(isset($_POST['Search'])){
        $userName = isset($_POST['userName'])?mysqli_real_escape_string($conn, $_POST['userName']):null;
        $dQuery = "SELECT
                `reserve`.`U_UserName`,
                `seatas`.`S_name`,
                `schedule`.`SC_date`,
                `schedule`.`SC_time`,
                `rooms`.`R_roomName`,
                `movies`.`M_name`
            FROM
                reserve
            JOIN
                schedule ON  `schedule`.SC_id = `reserve`.SC_id
            JOIN
                rooms ON `rooms`.`R_id` = `schedule`.`R_id`
            JOIN
                movies ON `movies`.`M_id` = `schedule`.`M_id`
            JOIN
            	seatas ON `seatas`.`S_id` = `reserve`.`S_id`
            WHERE
                U_UserName = '$userName';    
            ";
        $dResult = mysqli_query($conn, $dQuery);
        $dData = mysqli_fetch_all($dResult, MYSQLI_ASSOC);
    }
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/receptionist/receptionist.css?v=<?php echo time() ?>">
    <title>Receptionist</title>
</head>
<body>
    <div class="con">
        <p><a href="http://localhost/movie/php/logout.php">Logout</a></p>
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <label for="">userName</label>
                    <input type="text" name="userName">
                </div>
                <button type="submit" name="Search">search</button>
            </div>
        </form>
        <table>
            <tr class="header">
                <td>Movie name</td>
                <td>relies Date</td>
                <td>relies Time</td>
                <td>assigned room</td>
                <td>id</td>
            </tr>

            <?php 
                if($dData){
                    
                    for ($i=0; $i < sizeof($dData); $i++) { 
                        printf("
                            <tr>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                            <td>%s</td>
                        </tr>
                        ",$dData[$i]['M_name'], $dData[$i]['SC_date'], $dData[$i]['SC_time'], $dData[$i]['R_roomName'], $dData[$i]['S_name']);
                    }
                }

                
                ?>  
        </table>
        <div class="check">
            <a href="http://localhost/movie/php/receptionist/checkin.php?userName=<?php echo $userName ?>">Check in</a>
        </div>
    </div>
     
</body>
</html>