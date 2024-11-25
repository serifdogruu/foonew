<?php
// ogrencilerin_hobileri.php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğrencilerin Hobileri</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Öğrencilerin Hobileri</h1>
    </header>
    <div class="container">
        <nav>
            <a href="index.php">Ana Sayfa</a>
            <a href="ogrenci_ekle.php">Öğrenci Ekle</a>
            <a href="ogrenci_sil.php">Öğrenci Sil</a>
            <a href="hobi_ekle.php">Hobi Ekle</a>
            <a href="hobi_sil.php">Hobi Sil</a>
            <a href="ogrenci_liste.php">Öğrenci Listesi</a>
            <a href="hobi_liste.php">Hobi Listesi</a>
        </nav>

        <h2>Öğrencilerin Hobi Dağılımı</h2>
        <table>
            <thead>
                <tr>
                    <th>Öğrenci No</th>
                    <th>Ad</th>
                    <th>Soyad</th>
                    <th>Hobi Adı</th>
                    <th>Hobi Araçları</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT o.ogrenci_no, o.ad, o.soyad, h.hobi_adı, h.hobi_araclari
                        FROM ogrenci o
                        LEFT JOIN hobi h ON o.ogrenci_no = h.ogrenci_no
                        ORDER BY o.ogrenci_no ASC, h.hobi_id ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $current_ogrenci_no = null;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        if ($row['ogrenci_no'] !== $current_ogrenci_no) {
                            echo "<td>" . htmlspecialchars($row['ogrenci_no']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ad']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['soyad']) . "</td>";
                            $current_ogrenci_no = $row['ogrenci_no'];
                        } else {
                            echo "<td></td><td></td><td></td>";
                        }
                        echo "<td>" . htmlspecialchars($row['hobi_adı'] ?? 'Yok') . "</td>";
                        echo "<td>" . htmlspecialchars($row['hobi_araclari'] ?? '-') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Kayıt Bulunmamaktadır.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
