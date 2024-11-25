<?php
$servername = "localhost";
$username = "root"; // MySQL kullanıcı adınızı girin
$password = "12345";     // MySQL şifrenizi girin
$dbname = "ogrenci_hobi";

// Bağlantıyı oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>
