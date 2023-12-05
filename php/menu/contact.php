<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Ticketing System - Contact</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
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

        h1,
        h2 {
            color: #333;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        form {
            width: 80%;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #555;
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
    </style>
</head>

<body>
    <header>
        <h1>Contact Movie Ticketing System</h1>
    </header>
    <main>
        <form action="" method="push">
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

</html>