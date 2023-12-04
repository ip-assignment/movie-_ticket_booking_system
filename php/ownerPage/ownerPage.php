<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Owner Page</title>
  <link rel="stylesheet" href="/public/css/ownerPage/owner.css" />
</head>

<body>
  <header>
    <img src="owner.jpg" alt="Owner Logo" class="logo" />
    <div class="name">
      <p>Alem Cinema</p>
    </div>
    <input type="checkbox" id="menuBtn" />
    <label for="menuBtn" class="menu-button">&#9776; Menu</label>
    <input type="checkbox" id="closeBtn" />
    <label for="closeBtn" class="close-button" style="display: none">&#10006; Close</label>
    <div class="menu-container">
      <div class="alem-cinema">Alem Cinema</div>
      <div class="menu-content">
        <a href="#">Home</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </header>
  <section class="report-section">
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
  <script src="/public/js/ownerPage/owner.js"></script>
</body>

</html>