<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Alem | Ticket Booking</title>
  <link rel="stylesheet" href="../../public/css/ticketpage/ticket.css" />
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
          <a href="#">
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
      <img src="../../public/img/movie.jpg" alt="Main Image" class="main-image" />
      <div class="side-content">
        <h1>Demon slayer</h1>
        <p><b>Duration :</b> Data</p>
        <p><b>Genre :</b> Data</p>
        <p><b>Writer:</b> Data</p>
        <p><b>Producer :</b> Data</p>

        <div class="seat-selection">
          <select>
            <option value="seat1">Seat 1</option>
            <option value="seat2">Seat 2</option>
            <option value="seat3">Seat 3</option>
            <option value="seat4">Seat 4</option>
            <option value="seat5">Seat 5</option>
            <!-- Add more seat options as needed -->
          </select>
          <button class="buy-ticket-btn">Buy Ticket</button>
        </div>
      </div>
      <img src="../../public/img/movie2.png" alt="Second Image" class="second-image" />
      <a href="https://www.youtube.com/watch?v=t6MXHczeEqc&ab_channel=CrunchyrollCollection" class="trailer-link">Watch Trailer</a>
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

  <script src="../../public/js/ticketPage/ticket.js">
  </script>
</body>

</html>