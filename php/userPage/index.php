<?php 
    include '../../config/config.php';
    session_start();
    if(!isset($_SESSION['state'])){
        header('Location: http://localhost/movie/php', true);
        exit();     
    }
    $mQuery = "SELECT * FROM `movies` WHERE (
                SELECT COUNT(*) FROM `schedule` WHERE `movies`.M_id = `schedule`.M_id
                ) > 0;
            ";

            

    if(isset($_POST['mSearch'])){
        $Mname = isset($_POST['mName'])?mysqli_real_escape_string($conn, $_POST['mName']):null;
        if($Mname){
            $mQuery = "SELECT * FROM `movies` WHERE M_name = '$Mname' AND (
                SELECT COUNT(*) FROM `schedule` WHERE `movies`.M_id = `schedule`.M_id
            ) > 0";
        }
    }
    $mResult = mysqli_query($conn, $mQuery)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/userPage/home/index.css?v=<?php echo time(); ?>">
    <title>Home page</title>
</head>

<body>
    <div class="container">
        <div class="menu" id="menu">
            <div class="menuCon">
                <div>
                    <img src="../../public/img/exit.svg?v=<? echo time() ?>" id="exit" alt="">
                </div>
                <div>
                    <h2>ALEM CINEMA</h2>
                    <hr>
                    <a href="http://localhost/movie/php/userPage/">
                        <p>Home</p>
                    </a>
                    <hr>
                    <a href="http://localhost/movie/php/menu/blog.php">
                        <p>About</p>
                    </a>
                    <hr>
                    <a href="http://localhost/movie/php/menu/contact.php">
                        <p>Contact</p>
                    </a>
                    <hr>
                    <a href="http://localhost/movie/php/logout.php">
                        <p>Logout</p>
                    </a>
                    <hr>
                    <small>CONNECT WITH US</small>
                    <div>
                        <a href="#"><img src="../../public/img/menu/instagram.svg?v=<?php echo time() ?>" alt="" srcset=""></a>
                        <a href="#"><img src="../../public/img/menu/telegram.svg?v=<?php echo time() ?>" alt="" srcset=""></a>
                        <a href="#"><img src="../../public/img/menu/twitter.svg?v=<?php echo time() ?>" alt="" srcset=""></a>
                        <a href="#"><img src="../../public/img/menu/whatsapp.svg?v=<?php echo time() ?>" alt="" srcset=""></a>
                        <a href="#"><img src="../../public/img/menu/facebook.svg?v=<?php echo time() ?>" alt="" srcset=""></a>
                    </div>
                </div>
            </div>
        </div>
        <header>
            <div>
                <a href="http://localhost/movie/php/userPage/">
                    <img src="../../public/img/download-removebg-preview.png" alt="error" height="150">
                </a>
                <div class="searchCon">
                    <form action="" method="post">
                        <input type="text" placeholder="search" name="mName">
                        <button type="submit" name="mSearch">Search</button>
                    </form>
                </div>
            </div>
            <div id="menuToggle">
                <div>
                    <p>menu</p>
                </div>
                <div><a href="#"><img src="../../public/img/menu-burger.svg?v=<?php echo time() ?>" alt="" srcset="" width="30"></a></div>
            </div>
        </header>
        <main>
            <div class="contentContainer">

                <div class="movies">
                    <?php 
                        while ($mData = mysqli_fetch_assoc($mResult)){
                            printf('
                                <div class="movieContainer">
                                    <div class="imgContainer">
                                        <img src="../../public/img/MP/%s" alt="img" height="300"  width="240">
                                    </div>
                                    <div class="description">
                                        <div><b>Name:&nbsp;</b>
                                            <p>%s</p>
                                        </div>
                                        <div><b>Duration:&nbsp;</b>
                                            <p>%s</p>
                                        </div>
                                        <div><b>Genre:&nbsp;</b>
                                            <p>%s</p>
                                        </div>
                                        <div><b>Writer:&nbsp;</b>
                                            <p>%s</p>
                                        </div>
                                        <div><b>Producer:&nbsp;</b>
                                            <p>%s</p>
                                        </div>
                                        <div><b>Actors:&nbsp;</b></div>
                                        
                            
                            ',$mData['M_imageData'], $mData['M_name'], $mData['M_duration'], $mData['M_genre'], $mData['M_writer'], $mData['M_Producer']);
                            $actors = explode(",", $mData['M_actors']);
                            echo '<ul>';
                            for ($i=0; $i < sizeof($actors); $i++) { 
                                printf('
                                        <li>%s</li>
                                ',$actors[$i]);
                            }
                                printf("
                                        </ul>
                                            </div>
                                            <a href='http://localhost/movie/php/ticketpage?id=".$mData['M_id']."' class='button'>
                                                <p>Book ticket</p>
                                            </a>
                                        </div>
                                    ");
                        }
                    ?>
                </div>
            </div>
            <div>
                <div class="ss">
                    <table>
                        <thead >
                            <tr>
                                <th>Movie</th>
                                <th>Date</th>
                                <th>Showtimes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sQuery = "SELECT 
                                            `schedule`.`SC_id`,
                                            `schedule`.`SC_date`,
                                            `schedule`.`SC_time`,
                                            `movies`.`M_name`
                                            FROM
                                                schedule
                                            JOIN
                                                movies ON `movies`.`M_id` = `schedule`.`M_id`
                                            ORDER by
                                                M_name
                                            ";
                                $sResult = mysqli_query($conn, $sQuery);
                                while ($sData = mysqli_fetch_assoc($sResult)) {
                                    printf('
                                    <tr>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                    </tr>
                                    ', $sData['M_name'], $sData['SC_date'], $sData['SC_time']);
                                }
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <footer>

            <a href="#"><img src="../../public/img/instagram.svg?v=<?php echo time() ?>" alt="" srcset=""></a>
            <a href="#"><img src="../../public/img/telegram.svg?v=<?php echo time() ?>" alt="" srcset=""></a>
            <a href="#"><img src="../../public/img/twitter.svg?v=<?php echo time() ?>" alt="" srcset=""></a>
            <a href="#"><img src="../../public/img/whatsapp.svg?v=<?php echo time() ?>" alt="" srcset=""></a>
            <a href="#"><img src="../../public/img/facebook.svg?v=<?php echo time() ?>" alt="" srcset=""></a>

        </footer>
    </div>
</body>
<script src="../../public/js/usersPage/home/index.js"></script>

</html>