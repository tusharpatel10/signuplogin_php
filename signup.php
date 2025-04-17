<?php
session_start();
$insert = false;
// Check if the user is already logged in, if not redirect to login page
if (isset($_SESSION['username'])) {
    header("Location:welcome.php");
}
?>
<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

    $sql = "select * from users4 where username='$username'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    $sql = "select * from users4 where email='$email'";
    $result = mysqli_query($conn, $sql);
    $count_email = mysqli_num_rows($result);

    if ($count_user == 0 || $count_email == 0) {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "insert into users4(username,email,password) values('$username','$email','$hash')";
            $result = mysqli_query($conn, $sql);
            $insert = true;
        } else {
            echo "<script>
            alert('Password and Confirm Password do not match');
            window.location.href = 'signup.php'</>";
        }
    } else {
        echo "<script>
        alert('User already exists');
        window.location.href = 'index.php'</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Signup Page</title>
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
            <h1 id="heading">Signup</h1>
            <hr color="black" width="100%">
            <?php
            if ($insert) {
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Signup Successfully!</strong> &nbsp your account has been Registered Successfully.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
            }
            ?>
            <form name="form" action="signup.php" method="post">
                <label for="">Enter Username</label>
                <input type="text" id="user" name="user" required><br><br>
                <label for="">Enter Email</label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="">Enter Password</label>
                <input type="password" id="password" name="pass" required><br><br>
                <label for="">Retype Password</label>
                <input type="password" id="cpass" name="cpass" required><br><br>
                <input type="submit" id="btn" class="btn" value="Signup" name="submit" />
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