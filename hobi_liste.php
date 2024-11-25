<?php
// hobi_liste.php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hobi Listesi</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Hobi Listesi</h1>
    </header>
    <div class="container">
        <nav>
            <a href="index.php">Ana Sayfa</a>
            <a href="ogrenci_ekle.php">Öğrenci Ekle</a>
            <a href="ogrenci_sil.php">Öğrenci Sil</a>
            <a href="hobi_ekle.php">Hobi Ekle</a>
            <a href="hobi_sil.php">Hobi Sil</a>
            <a href="ogrenci_liste.php">Öğrenci Listesi</a>
            <a href="ogrencilerin_hobileri.php">Öğrencilerin Hobileri</a>
        </nav>

        <h2>Tüm Hobiler</h2>
        <table>
            <thead>
                <tr>
                    <th>Hobi ID</th>
                    <th>Öğrenci No</th>
                    <th>Hobi Adı</th>
                    <th>Hobi Araçları</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT hobi_id, ogrenci_no, hobi_adı, hobi_araclari FROM hobi ORDER BY hobi_id ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['hobi_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['ogrenci_no']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['hobi_adı']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['hobi_araclari']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Kayıt Bulunmamaktadır.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
