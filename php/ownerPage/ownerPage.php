<?php
include '../../config/config.php';
session_start();
if (isset($_SESSION['state'])) {
  if ($_SESSION['state'] == 'admin') {
    header('Location: http://localhost/movie/php/adminPage', true);
    exit();
  }
  if($_SESSION['state'] == 'user'){
    header('Location: http://localhost/movie/php/userPage', true);
    exit();
  }
  if($_SESSION['state'] == 'receptionist'){
    header('Location: http://localhost/movie/php/receptionist/', true);
    exit();
  }

} else {
  header('Location: http://localhost/movie/php', true);
  exit();
}
$Oquery = "SELECT * FROM reserve r
JOIN schedule s ON r.SC_id = s.SC_id
JOIN movies m ON s.M_id = m.M_id
JOIN seatas st ON r.S_id = st.S_id";

$Oresult = mysqli_query($conn, $Oquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Owner Page</title>
  <link rel="stylesheet" href="../../public/css/ownerPage/owner.css?v=<? echo time() ?>" />
</head>

<body>
  <header>
    <img src="../../public/img/owner.jpg" alt="Owner Logo" class="logo" />
    <div class="name">
      <p>Alem Cinema</p>
    </div>
    <input type="checkbox" id="menuBtn" />
    <label for="menuBtn" class="menu-button" id="menuToggle">&#9776; Menu</label>
  </header>
  <section class="report-section">
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
    <h2>Booking Reports</h2>
    <div class="booking-reports">
      <?php
      if ($Oresult->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($Oresult)) {
          echo '<div class="booking-report">';
          echo '<h3>Movie: ' . $row["M_name"] . '</h3>';
          echo '<p>Date: ' . $row["SC_date"] . '</p>';
          echo '<p>Time: ' . $row["SC_time"] . '</p>';
          echo '<p>User: ' . $row["U_UserName"] . '</p>';
          echo '<p>Seat: ' . $row["S_name"] . '</p>';
          echo '<p>Total Price: ' . $row["T_price"] . '</p>';
          echo '</div>';
        }
      } else {
        echo '<p>No booking reports available.</p>';
      }
      ?>
    </div>
  </section>
  <footer>
    <div class="footer-content">
      <p></p>
    </div>
  </footer>
  <script src="../../public/js/ownerPage/owner.js"></script>
</body>

</html>