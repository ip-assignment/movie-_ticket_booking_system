<?php 
    include "../../../config/config.php";
    include "../../../util/generateCinemaSeats.php";

    // if(isset($_SESSION['id']) && isset($_SESSION['admin'])){
    //     if(!$_SESSION['admin']){
    //         echo "<script>alert('you are not authorized to enter this page')</script>";
    //         header("Location: http://localhost/refIP2/php/userPage/", true);
    //         exit();
    //     }
    // }else{
    //     echo "<script>alert('you need to login as admin to enter this page')</script>";
    //     header("Location: http://localhost/refIP2/php", true);
    //     exit();
    // }

    $id = isset($_POST['id'])?$_POST['id']:null;
    $roomName = isset($_POST['roomName'])?$_POST['roomName']:null;
    $numberOfSeats = isset($_POST['numberOfSeats'])?intval($_POST['numberOfSeats']):null;
    if($roomName && $numberOfSeats){
        try {
            $checkQuery = "SELECT * FROM `c_room` WHERE  room_name=:rName";
            $checkStat = $conn->prepare($checkQuery);
            $checkStat->execute([':rName'=>$roomName]);
            $checkResult = $checkStat->fetch(PDO::FETCH_OBJ);
            if($checkStat->rowCount() && $checkResult->id != $id){
                echo "<script>alert('room name is taken')</script>";
            }else{
                $query = "UPDATE `c_room` SET `room_name` = :rName, `number_of_seats` = :sNumber WHERE `c_room`.`id` = :id";
                $stat = $conn->prepare($query);
                if($stat->execute([":rName"=>$roomName, ":sNumber"=>$numberOfSeats, ":id"=>$id])){
                    $updateQuey = "DELETE FROM `seats` WHERE seat_id=:s_id";
                    $updateStat = $conn->prepare($updateQuey);
                    if($updateStat->execute([":s_id"=>$id])){
                        $addSeatQuery = "INSERT INTO `seats` (`id`, `seat_id`, `seat_number`) VALUES (NULL, :seat_id, :seat_number)";
                        $addState = $conn->prepare($addSeatQuery);
                        $seatFormat = generateCinemaSeats($numberOfSeats);
    
                        $roomQuery = "SELECT * FROM `c_room` WHERE  id=:id";
                        $roomStat = $conn->prepare($roomQuery);
                        $roomStat->execute([':id'=>$id]);
                        $roomResult = $roomStat->fetch(PDO::FETCH_OBJ);
                        
                        foreach ($seatFormat as $key) {
                            $addState->execute([':seat_id'=>$roomResult->id, ":seat_number"=>$key]);
                        }
                        echo "<script>alert('data updated')</script>";
                    }

                }else{
                    echo "<script>alert('some thing want wrong plies try agin later or check the data you entered is correct inserted')</script>";
                }
            }
        } catch (\PDOException $th) {
            throw $th;
        }
    }
   
    $query = "SELECT * FROM `c_room` WHERE id=:id";
    $stat = $conn->prepare($query);
    $stat->execute([":id"=>$id]);
    if(!$stat->rowCount()){
        echo "<script> alert('data not found')</script>";
    }
    $data = $stat->rowCount()?$stat->fetch(PDO::FETCH_OBJ):null;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css?v=<?php echo time();?>">
    <title>edit form</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/refIP2/php/adminPage/addCinemaRoom">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand logout" href="../logout.php" style=" margin-left: 1150px;">logout</a>
    </nav>
    <div class="containers">
        <h1>Edit</h1>
        <form action="" method="post">
            <div class="row mt-5">
                <div class="col-4">'
                    <label for="id">ID</label>
                    <input type="number" value="<?php echo $data?$data->id:""?>" class="form-control" name="id" id="id" placeholder="id" required>
                </div>
                <div class="col">
                    <div>
                        <label for=""></label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Search</button>
                </div>
            </div>
        </form>
        <hr>
        <form action="" method="post">
            <div class="col-4">'
                <label for="id">ID</label>
                <input type="number" value="<?php echo $data?$data->id:""?>" class="form-control" name="id" id="id" placeholder="id"readonly>
            </div>
            <div class="row">
                <div class="col">
                    <label for="RoomName">Room Name</label>
                    <input type="text" value="<?php echo $data?$data->room_name:"" ?>" name="roomName" class="form-control" id="RoomName" placeholder="Room Name">
                </div>
                <div class="col">
                    <label for="NumberOfSeats">Number of Seats</label>
                    <input type="number" value="<?php echo $data?$data->number_of_seats:"" ?>" name="numberOfSeats" class="form-control" id="NumberOfSeats"  placeholder="Last name" required>
                </div>
                <div class="col">
                    <div>
                        <label for=""></label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">edit</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>