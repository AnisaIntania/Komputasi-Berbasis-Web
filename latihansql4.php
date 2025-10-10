<?php
$servername = "localhost:8111"; // saya pakai port 8111
$username = "root";
$password = ""; // kosong karena phpMyAdmin tidak minta password
$dbname = "mydb"; // saya ganti namanya jd mydb

// buat koneksi + dbname
$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// insert nama depan, belakang, dan email
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com'),
('Anisa', 'Intania', 'niss@example.com')";

// cek apakah insert data berhasil
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>