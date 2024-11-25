<?php
// ogrenci_liste.php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğrenci Listesi</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Öğrenci Listesi</h1>
    </header>
    <div class="container">
        <nav>
            <a href="index.php">Ana Sayfa</a>
            <a href="ogrenci_ekle.php">Öğrenci Ekle</a>
            <a href="ogrenci_sil.php">Öğrenci Sil</a>
            <a href="hobi_ekle.php">Hobi Ekle</a>
            <a href="hobi_sil.php">Hobi Sil</a>
            <a href="hobi_liste.php">Hobi Listesi</a>
            <a href="ogrencilerin_hobileri.php">Öğrencilerin Hobileri</a>
        </nav>

        <h2>Tüm Öğrenciler</h2>
        <table>
            <thead>
                <tr>
                    <th>Öğrenci No</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>GNO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT ogrenci_no, ad, soyad, gno FROM ogrenci ORDER BY ogrenci_no ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['ogrenci_no']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['ad']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['soyad']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gno']) . "</td>";
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
