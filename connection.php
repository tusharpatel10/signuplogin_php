<?php

$servername = 'localhost:3308';
$username = 'root';
$password = '';
$dbname = 'github';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("connection failed:" . mysqli_connect_error($conn));
} else {
    // echo "Connected successfully";
}

// Create the Table
/* $sql = "CREATE TABLE users4(
id int(11) auto_increment primary key,
username varchar(100) not null,
email varchar(100) not null,
password varchar(100) not null
)";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating Table" . mysqli_error($conn);
} */
