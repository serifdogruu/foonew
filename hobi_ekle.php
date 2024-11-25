<?php
// hobi_ekle.php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ogrenci_no = $_POST['ogrenci_no'];
    $hobi_adı = $_POST['hobi_adı'];
    $hobi_araclari = $_POST['hobi_araclari'];

    if (empty($ogrenci_no) || empty($hobi_adı)) {
        $error = "Öğrenci ve Hobi Adı alanları doldurulmalıdır.";
    } else {
        $stmt = $conn->prepare("INSERT INTO hobi (ogrenci_no, hobi_adı, hobi_araclari) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $ogrenci_no, $hobi_adı, $hobi_araclari);
        if ($stmt->execute()) {
            $success = "Hobi başarıyla eklendi.";
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
    <title>Hobi Ekle</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js"></script>
</head>
<body>
    <header>
        <h1>Hobi Ekle</h1>
    </header>
    <div class="container">
        <nav>
            <a href="index.php">Ana Sayfa</a>
            <a href="ogrenci_ekle.php">Öğrenci Ekle</a>
            <a href="ogrenci_sil.php">Öğrenci Sil</a>
            <a href="hobi_sil.php">Hobi Sil</a>
        </nav>

        <?php if(isset($error)): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if(isset($success)): ?>
            <div class="alert"><?php echo $success; ?></div>
        <?php endif; ?>

        <form name="myForm" action="hobi_ekle.php" method="post" onsubmit="return validateForm()">
            <label for="ogrenci_no">Öğrenci Seç:</label>
            <select id="ogrenci_no" name="ogrenci_no" required>
                <option value="">-- Seçiniz --</option>
                <?php
                // Veritabanından öğrenci listesini doldur
                include 'db.php';
                $students = $conn->query("SELECT ogrenci_no, ad, soyad FROM ogrenci ORDER BY ogrenci_no ASC");
                if ($students->num_rows > 0) {
                    while($row = $students->fetch_assoc()) {
                        echo "<option value='" . $row['ogrenci_no'] . "'>" . $row['ad'] . " " . $row['soyad'] . "</option>";
                    }
                }
                $conn->close();
                ?>
            </select>

            <label for="hobi_adı">Hobi Adı:</label>
            <input type="text" id="hobi_adı" name="hobi_adı" required>

            <label for="hobi_araclari">Hobi Araçları:</label>
            <input type="text" id="hobi_araclari" name="hobi_araclari">

            <button type="submit">Ekle</button>
        </form>
    </div>
</body>
</html>
