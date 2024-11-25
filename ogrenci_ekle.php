<?php
// ogrenci_ekle.php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $gno = $_POST['gno'];

    if (empty($ad) || empty($soyad) || empty($gno)) {
        $error = "Tüm alanlar doldurulmalıdır.";
    } else {
        $stmt = $conn->prepare("INSERT INTO ogrenci (ad, soyad, gno) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $ad, $soyad, $gno);
        if ($stmt->execute()) {
            $success = "Öğrenci başarıyla eklendi.";
        } else {
            $error = "Hata: " . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğrenci Ekle</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script>
</head>
<body>
    <header>
        <h1>Öğrenci Ekle</h1>
    </header>
    <div class="container">
        <nav>
            <a href="index.php">Ana Sayfa</a>
            <a href="ogrenci_sil.php">Öğrenci Sil</a>
            <a href="hobi_ekle.php">Hobi Ekle</a>
            <a href="hobi_sil.php">Hobi Sil</a>
        </nav>

        <?php if(isset($error)): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)): ?>
            <div class="alert"><?php echo $success; ?></div>
        <?php endif; ?>

        <form name="myForm" action="ogrenci_ekle.php" method="post" onsubmit="return validateForm()">
            <label for="ad">Ad:</label>
            <input type="text" id="ad" name="ad" required>

            <label for="soyad">Soyad:</label>
            <input type="text" id="soyad" name="soyad" required>

            <label for="gno">GNO:</label>
            <input type="number" step="0.01" id="gno" name="gno" required>

            <button type="submit">Ekle</button>
        </form>
    </div>
</body>
</html>
