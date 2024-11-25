<?php
// hobi_sil.php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hobi_id = $_POST['hobi_id'];

    if (empty($hobi_id)) {
        $error = "Silinecek hobi seçilmelidir.";
    } else {
        $stmt = $conn->prepare("DELETE FROM hobi WHERE hobi_id = ?");
        $stmt->bind_param("i", $hobi_id);
        if ($stmt->execute()) {
            $success = "Hobi başarıyla silindi.";
        } else {
            $error = "Hata: " . $conn->error;
        }
        $stmt->close();
    }
}

// Hobileri listele
$result = $conn->query("SELECT hobi_id, hobi_adı, hobi_araclari, ogrenci_no FROM hobi ORDER BY hobi_id ASC");

$conn->close();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hobi Sil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Hobi Sil</h1>
    </header>
    <div class="container">
        <nav>
            <a href="index.php">Ana Sayfa</a>
            <a href="ogrenci_ekle.php">Öğrenci Ekle</a>
            <a href="ogrenci_sil.php">Öğrenci Sil</a>
            <a href="hobi_ekle.php">Hobi Ekle</a>
        </nav>

        <?php if(isset($error)): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)): ?>
            <div class="alert"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="hobi_sil.php" method="post">
            <label for="hobi_id">Hobi Seç:</label>
            <select id="hobi_id" name="hobi_id" required>
                <option value="">-- Seçiniz --</option>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Öğrenci adını almak için ayrı sorgu
                        include 'db.php';
                        $ogrenci = $conn->query("SELECT ad, soyad FROM ogrenci WHERE ogrenci_no = " . $row['ogrenci_no'])->fetch_assoc();
                        echo "<option value='" . $row['hobi_id'] . "'>[" . $row['hobi_id'] . "] " . $row['hobi_adı'] . " - " . $ogrenci['ad'] . " " . $ogrenci['soyad'] . "</option>";
                        $conn->close();
                    }
                }
                ?>
            </select>
            <button type="submit">Sil</button>
        </form>
    </div>
</body>
</html>
