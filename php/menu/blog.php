<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Movie Ticketing System - About Us</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url(/public/img/slider-bg.png);
      background-size: cover;
    }

    header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 1em 0;
    }

    section {
      max-width: 800px;
      margin: 2em auto;
      padding: 20px;
      background-color: #fdfbfb;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      color: #474444;
      border-radius: 8px;
      text-align: justify;
    }

    h1,
    h2 {
      color: #333;
    }

    p {
      line-height: 1.6;
    }

    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 1em 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      gap: 20px;
    }

    .cont-1,
    .cont-2,
    .cont-3,
    .cont-4 {
      flex: 1;
      padding: 20px;
      border-radius: 8px;
      border-style: groove;
      border-color: rgb(207, 207, 207);
    }

    .cont-1,
    .cont-3,
    .cont-4 {
      margin-bottom: 10%;
    }

    .cont-2 {
      margin-top: 20px;
      margin-bottom: 20%;
    }

    @media only screen and (max-width: 600px) {
      .container {
        flex-direction: column;
        align-items: center;
      }

      .cont-1,
      .cont-2,
      .cont-3,
      .cont-4 {
        width: 100%;
        margin-top: 20px;
      }
    }
  </style>
</head>

<body>
  <header>
    <h1>About Movie Ticketing System</h1>
  </header>

  <section>
    <h2>Our Mission</h2>
    <p>
      Welcome to Movie Ticketing System, where we strive to provide you with a
      seamless and enjoyable movie ticket booking experience. Our mission is
      to make your movie-going experience hassle-free and convenient.
    </p>

    <h2>Who We Are</h2>
    <p>
      Alem Cinema is a pioneer and leader in the cinema industry. It was the
      first privately owned cinema in Ethiopia opened in April 2004. Alem
      Cinema is committed to nurture the advancement of the cinema business.
      It is very reputable for creating opportunities to domestic filmmakers
      who produce films in local languages. For the past 15 years, Alem Cinema
      has been the preferred choice because they offer many attractive
      benefits such as refreshments, comfort seating, and clear screenings.
      The cinema operates two movie theaters with a combined seat capacity of
      over 700. We consistently offer new ent...
    </p>
    <h2>Sister Companies</h2>
    <p>
      HAI is a Private Limited Company established by Haile Gebreselassie and
      his wife Alem Tilahun in Ethiopia since 2000. Haile Gebreselassie is a
      celebrated long distance runner who holds numerous world records, four
      World Championships, and two Olympic gold medals. Filled with love for
      their nation Ethiopia, Haile and Alem were inspired to create job
      opportunities for the people and offer extraordinary attractions in the
      country. We are immensely proud to provide over 2,000 jobs now across
      HAI’s business entities. After beginning in the real estate business,
      HAI expanded into multi-business sectors that include hospitality
      (hotels, resorts, tour and travel, and hotel Management College) cinema,
      gym, Bride City and Spa, schools, and agriculture. We only offer the
      finest quality products such as our organic honey and our delicious
      coffee that is available for export. Providing excellent customer
      service and offering luxury relaxation for our clients is our pleasure.
    </p>

    <h2>Contact Us</h2>
    <p>Have questions or feedback? Feel free to reach out to us:</p>
    <address>
      Email:
      <a href="mailto:info@movieticketingsystem.com">info@movieticketingsystem.com</a><br />
      Phone: +1 (123) 456-7890
    </address>
  </section>

  <div class="container">
    <div class="cont-1">
      <img src="/public/img/man1.jpg" alt="" />
      <h4 style="margin: auto">Haile Resort</h4>
      Haile Hospitality Group (HHG) is a group of businesses focused on the
      hospitality sector. Ethiopian Hospitality is renowned for going above
      and beyond for the guest and we want to exhibit that into our
      operations. Across Ethiopia we have established a chain of supreme brand
      hotels and resorts throughout the most popular attraction sites in the
      country.
    </div>
    <div class="cont-2">
      <img src="/public/img/man2.jpg" alt="" />
      <h4 style="margin: auto">Alem Bride city</h4>
      Alem Bride City and Spa is a Unique Salon and Spa located in Addis Ababa
      focused on providing elegant beautification services for brides and
      grooms. We offer custom packages and tailored services to assure the
      client’s individual needs are met for their special day. We pamper our
      customers in an environment of serenity complemented with relaxing
      massage and invigorating spa that will flush out toxins and provide
      glowing and smooth skin.
    </div>
    <div class="cont-3">
      <img src="/public/img/man3.jpg" alt="" />
      <h4 style="margin: auto">Haile Real Estate</h4>
      Haile Real Estate is one of the pioneers in the private real estate
      sector in Ethiopia, since 2000. Initially, we focused on constructing
      buildings for leasing at prime locations in Bahir Dar City and in Addis
      Ababa
    </div>
    <div class="cont-4">
      <img src="/public/img/man4.jpg" alt="" />
      <h4 style="margin: auto">Haile Coffee</h4>
      Haile Coffee™ is a specialty coffee harvested from our own farm, Haile
      Estate Plantation at Yeppo, planted on over 1,100 hectares of land in
      successive batches from 2013 to 2016. The coffee is grown with rich soil
      and an ideal climate with the perfect amount of rainfall. Ethiopia is
      already known for the production of the world’s best coffee, and
      somehow, Haile Coffee produces something even more special.
    </div>
  </div>

  <footer>&copy; 2023 Movie Ticketing System. All rights reserved.</footer>
</body>

</html>