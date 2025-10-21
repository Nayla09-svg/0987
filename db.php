<?php
$servername = "localhost";
$username = "root";
$password = "12345678"; // isi kalau MySQL kamu pakai password

// Koneksi ke MySQL
$conn = new mysqli($servername, $username, $password);

// Cek koneksi
if ($conn->connect_error) {
    die("<h3 style='color:red;'>Koneksi gagal: " . $conn->connect_error . "</h3>");
}

// Buat database otomatis
$dbname = "nayla_portfolio";
if ($conn->query("CREATE DATABASE IF NOT EXISTS $dbname") === TRUE) {
    echo "<p style='color:green;'>Database '$dbname' berhasil dibuat atau sudah ada.</p>";
}
$conn->select_db($dbname);

// Buat tabel contact_messages otomatis
$table_sql = "CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
    echo "<p style='color:green;'>Tabel 'contact_messages' siap digunakan.</p>";
}

echo "<h3 style='color:blue;'>Koneksi ke MySQL berhasil dan sistem sudah siap digunakan.</h3>";

?>
