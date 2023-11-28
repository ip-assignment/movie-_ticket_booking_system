<?php 
    include "../../../config/config.php";
    include "../../../util/VDT.php";
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

    $id = isset($_POST['id'])?trim($_POST['id']):null;

    $moveName = isset($_POST['moveName'])?trim($_POST['moveName']):null;
    $reliesDate = isset($_POST['reliesDate'])?$_POST['reliesDate']:null;
    if($moveName && $reliesDate){
        if(VDT($reliesDate)){
            $checkQuery = "SELECT * FROM `movies` WHERE movie_name=:movie_name";
            $checkStet = $conn->prepare($checkQuery);
            if($checkStet->execute([':movie_name'=>$moveName])){
                $checkResult = $checkStet->rowCount()?$checkStet->fetch(PDO::FETCH_OBJ):null;
                if($checkResult && $checkResult->id != $id){
                    echo "<script>alert('the movie is already in the data base')</script>";
                }else{
                    $query = "UPDATE `movies` SET `movie_name` = :movie_name, `relies_date` = :relies_date WHERE `movies`.`id` = :id";
                    $stet = $conn->prepare($query);
                    $stet->execute([':movie_name'=>$moveName, ':relies_date'=>$reliesDate, ":id"=>$id]);
                    echo "<script>alert('data is updated')</script>";
                }
            }else{
                echo "<script>alert('some ting want wrong while checking the move name plies try agin later')</script>";
            }

        }else{
            echo "<script>alert('date is invalid')</script>1";
        }
    }


    $searchQuey = "SELECT * FROM `movies` WHERE id=:id";
    $searchStat = $conn->prepare($searchQuey);
    $searchStat->execute([":id"=>$id]);
    if(!$searchStat->rowCount()){
        echo "<script>alert('id was not found in the data base')</script>";
    }
    $searchResult = $searchStat->rowCount()?$searchStat->fetch(PDO::FETCH_OBJ):null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css?v=<?php echo time() ?>">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/refIP2/php/adminPage/addNewMove">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand logout" href="../logout.php" style=" margin-left: 1150px;">logout</a>
    </nav>
    <div class="containers">
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group mt-2 mr-3">
                    <label for="ID">ID :</label>
                </div>
                <div class="form-group col-md-4border">
                    <input type="number" min=1 name="id" class="form-control col-md-15" id="ID" required placeholder="ID">
                </div>
                <button type="submit" class="btn btn-primary mb-5 ml-4">Search</button>
            </div>
        </form>
        <form action="" method="post">
            <div class="row">
                <div class="col-3">
                    <label for="ID">ID</label>
                    <input type="number" min=1 name="id" value="<?php echo $searchResult?$searchResult->id:null ?>" class="form-control" id="ID" required placeholder="ID" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="moveName">Move Name</label>
                    <input type="text" name="moveName" value="<?php echo $searchResult?$searchResult->movie_name:null ?>" class="form-control" id="moveName" placeholder="Move Name" require>
                </div>
                <div class="col-3">
                    <label for="reliesDate">Relies Date</label>
                    <input type="date" name="reliesDate" value="<?php echo $searchResult?$searchResult->relies_date:null ?>"  class="form-control" id="reliesDate"  placeholder="Relies date" required>
                </div>
                <div class="col">
                    <div>
                        <label for=""></label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Edit</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>