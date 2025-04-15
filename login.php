<?php
session_start();
// Check if the user is already logged in, if not redirect to login page
if (isset($_SESSION['username'])) {
    header("Location:welcome.php");
}
?>
<?php
// $login = false;
include("connection.php");
if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "select * from users4 where username='$username' or email='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($row) {
        if (password_verify($password, $row["password"])) {
            // $login = true;
            session_start();
            $sql = "select username from users4 where username='$username' or email='$email'";
            $r = mysqli_fetch_array(mysqli_query($conn, $sql));
            $_SESSION['username'] = $r['username'];
            header("Location:welcome.php");
        }
    } else {
        echo "<script>
        alert('Invalid username/email or password!!');
        </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <?php
    include("connection.php");
    include("navbar.php");
    ?>
    <div class="container-fluid justify-content-center align-items-center d-flex">
        <div id="form">
            <h1 id="heading">Login</h1>
            <hr color="black" width="100%">
            <form name="form" action="login.php" method="post">
                <label for="">Enter Username or Email</label>
                <input type="text" id="user" name="user" required><br><br>
                <label for="">Enter Password</label>
                <input type="password" id="pass" name="pass" required><br><br>
                <input type="submit" id="btn" class="btn" value="Login" name="submit" />

            </form>
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