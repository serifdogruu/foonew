<?php
// ogrenci_sil.php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ogrenci_no = $_POST['ogrenci_no'];

    if (empty($ogrenci_no)) {
        $error = "Silinecek öğrenci seçilmelidir.";
    } else {
        $stmt = $conn->prepare("DELETE FROM ogrenci WHERE ogrenci_no = ?");
        $stmt->bind_param("i", $ogrenci_no);
        if ($stmt->execute()) {
            $success = "Öğrenci başarıyla silindi.";
        } else {
            $error = "Hata: " . $conn->error;
        }
        $stmt->close();
    }
}

// Öğrencileri listele
$result = $conn->query("SELECT ogrenci_no, ad, soyad FROM ogrenci ORDER BY ogrenci_no ASC");

$conn->close();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğrenci Sil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Öğrenci Sil</h1>
    </header>
    <div class="container">
        <nav>
            <a href="index.php">Ana Sayfa</a>
            <a href="ogrenci_ekle.php">Öğrenci Ekle</a>
            <a href="hobi_ekle.php">Hobi Ekle</a>
            <a href="hobi_sil.php">Hobi Sil</a>
        </nav>

        <?php if(isset($error)): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)): ?>
            <div class="alert"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="ogrenci_sil.php" method="post">
            <label for="ogrenci_no">Öğrenci Seç:</label>
            <select id="ogrenci_no" name="ogrenci_no" required>
                <option value="">-- Seçiniz --</option>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ogrenci_no'] . "'>" . $row['ad'] . " " . $row['soyad'] . "</option>";
                    }
                }
                ?>
            </select>
            <button type="submit">Sil</button>
        </form>
    </div>
</body>
</html>
