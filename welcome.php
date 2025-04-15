<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>welcome</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("images/1.jpeg");
            background-size: cover;
            background-position: top;
            width: 100vw;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(8px);
        }


        #form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            backdrop-filter: blur(2px);
            width: 35%;
            border: 1px solid black;
            border-radius: 6px;
            margin: 30px auto;
            padding: 25px;
            box-shadow: 10px 10px 35px rgb(13, 14, 14);
            /* margin-top: 35px; */
        }

        .heading {
            text-align: center;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php
    include("connection.php");
    include("navbar.php");
    ?>
    <div class="container-fluid justify-content-center align-items-center d-flex">
        <div id="form">
            <h1 class="heading">Welcome <?php echo $_SESSION['username']; ?></h1>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>