<?php
include 'db.php';

// Pastikan koneksi masih aktif
if (isset($conn) && $conn instanceof mysqli && $conn->connect_errno === 0) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);

        $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='contact.html';</script>";
        } else {
            echo "Terjadi kesalahan saat menyimpan data: " . $conn->error;
        }
    }

    // Tutup koneksi hanya jika masih aktif
    if ($conn->ping()) {
        $conn->close();
    }

} else {
    echo "<h4 style='color:red;'>Koneksi ke database gagal. Pastikan MySQL di XAMPP sudah berjalan dan file db.php benar.</h4>";
}
?>
