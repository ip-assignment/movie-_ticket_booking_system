<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Owner Page</title>
  <link rel="stylesheet" href="../../public/css/ownerPage/owner.css?v=<?echo time()?>" />
</head>

<body>
  <header>
    <img src="owner.jpg" alt="Owner Logo" class="logo" />
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
                    <a href="#">
                        <p>News Magazine</p>
                    </a>
                    <hr>
                    <a href="#">
                        <p>Contact</p>
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
      <!-- Sample Booking Report (replace with dynamic content) -->
      <h3>Cinema A</h3>
      <div class="booking-report">
        <h3>Movie: Demon Slayer</h3>
        <p>Date: 2023-12-15</p>
        <p>Time: 18:30</p>
        <p>Booked Seats: Seat 1, Seat 2, Seat 3</p>
      </div>
      <h3>Cinema B</h3>
      <div class="booking-report">
        <h3>Movie: Attack on Titan</h3>
        <p>Date: 2023-04-20</p>
        <p>Time: 19:30</p>
        <p>Booked Seats: Seat 4, Seat 5, Seat 6</p>
      </div>
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