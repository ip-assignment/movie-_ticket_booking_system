<?php 
  
  include '../../config/config.php';
  session_start();
  $Q_Str = parse_str($_SERVER['QUERY_STRING'], $parameters);
  $param = isset($parameters['id'])?$parameters['id']:null;
  if(!isset($_SESSION['state'])){
    header('Location: http://localhost/movie/php', true);
    exit(); 
  }

  if(!isset($param)){
    header('Location: http://localhost/movie/php/userPage', true);
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alem | Ticket Booking</title>
  <link rel="stylesheet" href="../../public/css/ticketpage/ticket.css?v=<?php echo time() ?>" />
</head>

<body>
  <header>
    <img src="../../public/img/alem2.png" alt="Your Logo" class="logo" />
    <input type="checkbox" id="menuBtn" />
    <label for="menuBtn" class="menu-button" id="menuToggle">&#9776; Menu</label>
    <input type="checkbox" id="closeBtn" />
    <label for="closeBtn" class="close-button" style="display: none">&#10006; Close</label>

    <div class="menu-container">
      <div class="alem-cinema">Alem Cinema</div>
      <div class="menu-content">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">News Magazine</a>
        <a href="#">Contact</a>
      </div>
      <small style="font-family: sans-serif">Connect with us</small>
      <div class="social-icons">
        <a href="#" target="_blank"><img src="facebook_icon.png" alt="asdf" /></a>
        <a href="#" target="_blank"><img src="icon2.png" alt="asdf" /></a>

        <!-- Add more social icons as needed -->
      </div>
    </div>
  </header>

  <section class="movie-section">
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
    <div class="movie-details">
      <?php 
      
        $dQuery = "SELECT * FROM `movies` WHERE M_id = $param";
        $dResult = mysqli_query($conn, $dQuery);
        while($dData = mysqli_fetch_assoc($dResult)){
          printf('
            <div class="det">
              <img src="../../public/img/MP/%s" alt="Main Image" class="main-image"/>  
              <div class="side-content">
                <h1>%s</h1>
                <p><b>Duration :</b> %s</p>
                <p><b>Genre :</b> %s</p>
                <p><b>Writer:</b> %s</p>
                <p><b>Producer :</b> %s</p>
                <textarea cols="30" rows="5" readonly>%s</textarea>
              </div>
            </div>
          ', $dData['M_imageData'], $dData['M_name'], $dData['M_duration'], $dData['M_genre'], $dData['M_writer'], $dData['M_Producer'], $dData['M_description']);
        }
      ?>
      <div class="tek">
        <form action="" method="post">
            <div class="row">
              <div>
                <label for="">schedule</label>
                <select name="schedule" id="schedule">
                    <?php 
                      $scQuery = "SELECT SC_time, SC_date, SC_id FROM `schedule` WHERE M_id = $param";
                      $scResult = mysqli_query($conn, $scQuery);
                      while($scData = mysqli_fetch_assoc($scResult)){
                        printf('
                              <option value="%s">%s</option>
                        ', $scData['SC_id'], $scData['SC_date']."--".$scData['SC_time']);
                      }
                    ?>
                </select>
              </div>
              <div class="row">
                <div>
                <label for="">Number of ticket</label>
                <input type="number" id="ticketNum" value=1 name="ticketNum" min=1 max=6>
              </div>
              </div>
          </div>
          <input type=number name="hiddenP" id="hiddenP" hidden>
          <div class="row">
            <div>
              <label for="">Seat Type</label>
              <select name="" id="type">
                <option value="vip">vip</option>
                <option value="eco">eco</option>
              </select>
            </div>
          </div>
          <div id="inputC">
          </div>
          <button id="confirm">Buy</button>
          <div class="payBG" id="payBG">
          <div class="fe">
            <div>
              <div>
                <label for="cardNumber">Card Number:</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="1234567890123456" required>
              </div>
              <div>
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" placeholder="123" required>
              </div>
            </div>

            <label for="expiryDate">Number of Tickets</label>
            <input type="number" id="RTname" name="tNumber" readonly>


            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" readonly>

            <div>
              <button type="submit" name="sub" class="sub">Submit Payment</button>
              <button type="button" id="can" class="can">Cancel</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
    
  </section>
  
  <footer>
    <div class="contact-section">Contact: contact@example.com</div>
    <div class="logo-section">
      <img src="../../public/img/alem2.png" alt="Your Logo" />
    </div>

    <div class="social-section">
      <a href="#" target="_blank">Twitter</a><br />
      <a href="#" target="_blank">Facebook</a>
      <!-- Add more social icons as needed -->
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="../../public/js/ticketPage/ticket.js?v=<?php echo time() ?>"></script>
  <?php 
    if(isset($_POST['sub'])){
      $unQuery = "SELECT U_UserName FROM `users` WHERE U_id = ".$_SESSION['id'];
      $unResult = mysqli_query($conn, $unQuery);
      $unData = mysqli_fetch_assoc($unResult);
      $seat = array();
      $price = isset($_POST['hiddenP'])?mysqli_real_escape_string($conn, $_POST['hiddenP']):null;
      $schedule = isset($_POST['schedule'])?mysqli_real_escape_string($conn, $_POST['schedule']):null;
      $tickNum = isset($_POST['ticketNum'])?mysqli_real_escape_string($conn, $_POST['ticketNum']):null;
      $cardNumber = isset($_POST['cardNumber'])?mysqli_real_escape_string($conn, $_POST['cardNumber']):null;
      $cvv = isset($_POST['cvv'])?mysqli_real_escape_string($conn, $_POST['cvv']):null;
      $CARDpattern = '/^\d{16}$/';
      $CVVpattern = '/^\d{3,4}$/';
      if(preg_match_all($CARDpattern, $cardNumber)){
        if(preg_match_all($CVVpattern, $cvv)){
          for ($i=0; $i < $tickNum; $i++) {
            $reQuery = "INSERT INTO `reserve`(U_UserName, S_id, T_price, SC_id)
                        VALUES('".$unData['U_UserName']."', ".$_POST["seat"."".$i.""].", $price, $schedule)
            ";
            mysqli_query($conn, $reQuery);
          }
          echo "<script>alert('your tickets have been purchased successfully and thank you for choosing ALEM CINEMA.')</script>";
        }else{
          echo '<script>alert("Invalid CVV")</script>';
        }
      }else{
        echo '<script>alert("Invalid Card Number")</script>';
      }

    }
  
  ?>
</body>

</html>