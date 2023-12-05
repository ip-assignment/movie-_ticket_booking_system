<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Ticketing System - Contact</title>
    <link rel="stylesheet" href="../../public/css/menu/contact.css?v=<?php echo time() ?>">
</head>

<body>
    <header>
        <div>
        <a href="http://localhost/movie/php/userPage/">
            <img src="../../public/img/download-removebg-preview.png" alt="error" height="150">
        </a>
    </div>
    <div id="menuToggle">
        <div>
            <p>menu</p>
        </div>
        <div><a href="#"><img src="../../public/img/menu-burger.svg?v=<?php echo time() ?>" alt="" srcset="" width="30"></a></div>
    </div>
    </header>
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
    <main>
        <form action="" method="post">
            <input type="text" placeholder="Full Name" />
            <br /><br />
            <input type="text" placeholder="Email" />
            <br /><br />
            <input type="text" placeholder="Topic" />
            <br /><br />
            <textarea placeholder="Question or Comment" cols="50" rows="5"></textarea>
            <br />
            <div>
                <input type="submit" placeholder="Submit" />
            </div>
        </form>
    </main>
    <footer>&copy; 2023 Movie Ticketing System. All rights reserved.</footer>
</body>
<script src="../../public/js/menu/contact.js"></script>
</html>