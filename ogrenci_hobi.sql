-- mysql -u root -p < ogrenci_hobi.sql

-- ogrenci_hobi.sql

-- Veritabanını oluştur
CREATE DATABASE IF NOT EXISTS ogrenci_hobi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ogrenci_hobi;

-- ogrenci tablosunu oluştur
CREATE TABLE IF NOT EXISTS ogrenci (
    ogrenci_no INT AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(50) NOT NULL,
    soyad VARCHAR(50) NOT NULL,
    gno DECIMAL(3,2) NOT NULL
);

-- hobi tablosunu oluştur
CREATE TABLE IF NOT EXISTS hobi (
    hobi_id INT AUTO_INCREMENT PRIMARY KEY,
    ogrenci_no INT NOT NULL,
    hobi_adı VARCHAR(100) NOT NULL,
    hobi_araclari VARCHAR(100),
    FOREIGN KEY (ogrenci_no) REFERENCES ogrenci(ogrenci_no) ON DELETE CASCADE
);

-- ogrenci tablosuna 20 öğrenci ekle
INSERT INTO ogrenci (ad, soyad, gno) VALUES
('Ahmet', 'Yılmaz', 3.50),
('Mehmet', 'Kaya', 3.20),
('Ayşe', 'Demir', 3.80),
('Fatma', 'Şahin', 3.60),
('Ali', 'Çelik', 3.40),
('Elif', 'Koç', 3.70),
('Hasan', 'Aydın', 3.30),
('Hülya', 'Kurt', 3.90),
('Burak', 'Güneş', 3.10),
('Zeynep', 'Yıldız', 3.55),
('Murat', 'Öztürk', 3.25),
('Seda', 'Polat', 3.65),
('Kemal', 'Arslan', 3.35),
('Sevgi', 'Kılıç', 3.85),
('Orhan', 'Balcı', 3.15),
('Derya', 'Taş', 3.75),
('Cem', 'Kara', 3.05),
('Gül', 'Duman', 3.95),
('Turan', 'Erdoğan', 3.45),
('Bahar', 'Doğan', 3.60);

-- hobi tablosuna 60 hobi ekle (her öğrenciye 3 hobi)
INSERT INTO hobi (ogrenci_no, hobi_adı, hobi_araclari) VALUES
(1, 'Futbol', 'Top, Ayakkabı, Form'),
(1, 'Müzik', 'Piyano, Gitar, Nota'),
(1, 'Resim', 'Fırça, Boya, Tuval'),

(2, 'Basketbol', 'Top, Forma, Sepet'),
(2, 'Yüzme', 'Mayo, Gözlük, Havlu'),
(2, 'Satranç', 'Satranç Tahtası, Saat, Taşlar'),

(3, 'Koşu', 'Koşu Ayakkabısı, Spor Giyim, Saat'),
(3, 'Fotoğrafçılık', 'Kamera, Lens, Tripod'),
(3, 'Yazılım', 'Bilgisayar, Programlama Dilleri, IDE'),

(4, 'Kitap Okuma', 'Kitap, Okuma Lambası, Kitap Ayracı'),
(4, 'Bahçecilik', 'Aletler, Tohum, Saksı'),
(4, 'Yoga', 'Mat, Kıyafet, Blok'),

(5, 'Dans', 'Müzik, Dans Ayakkabısı, Aksesuar'),
(5, 'Sinema', 'Film, Bilet, Patlamış Mısır'),
(5, 'Seyahat', 'Çanta, Harita, Kamera'),

(6, 'Pişirme', 'Tencere, Malzemeler, Kitap'),
(6, 'Yüzme', 'Mayo, Gözlük, Havlu'),
(6, 'Bisiklet', 'Bisiklet, Kask, Eldiven'),

(7, 'Müzik', 'Enstrüman, Nota, Stüdyo'),
(7, 'Trekking', 'Çadır, Uyku Tulumu, Sırt Çantası'),
(7, 'Programlama', 'Bilgisayar, Kitap, Yazılım'),

(8, 'Resim', 'Fırça, Boya, Tuval'),
(8, 'Kino', 'Film, Bilet, Patlamış Mısır'),
(8, 'Koşu', 'Koşu Ayakkabısı, Spor Giyim, Saat'),

(9, 'Futbol', 'Top, Ayakkabı, Form'),
(9, 'Satranç', 'Satranç Tahtası, Saat, Taşlar'),
(9, 'Yazılım', 'Bilgisayar, Programlama Dilleri, IDE'),

(10, 'Basketbol', 'Top, Forma, Sepet'),
(10, 'Yoga', 'Mat, Kıyafet, Blok'),
(10, 'Yüzme', 'Mayo, Gözlük, Havlu'),

(11, 'Fotoğrafçılık', 'Kamera, Lens, Tripod'),
(11, 'Kitap Okuma', 'Kitap, Okuma Lambası, Kitap Ayracı'),
(11, 'Bahçecilik', 'Aletler, Tohum, Saksı'),

(12, 'Dans', 'Müzik, Dans Ayakkabısı, Aksesuar'),
(12, 'Seyahat', 'Çanta, Harita, Kamera'),
(12, 'Pişirme', 'Tencere, Malzemeler, Kitap'),

(13, 'Bisiklet', 'Bisiklet, Kask, Eldiven'),
(13, 'Müzik', 'Enstrüman, Nota, Stüdyo'),
(13, 'Trekking', 'Çadır, Uyku Tulumu, Sırt Çantası'),

(14, 'Resim', 'Fırça, Boya, Tuval'),
(14, 'Kino', 'Film, Bilet, Patlamış Mısır'),
(14, 'Koşu', 'Koşu Ayakkabısı, Spor Giyim, Saat'),

(15, 'Futbol', 'Top, Ayakkabı, Form'),
(15, 'Satranç', 'Satranç Tahtası, Saat, Taşlar'),
(15, 'Yazılım', 'Bilgisayar, Programlama Dilleri, IDE'),

(16, 'Basketbol', 'Top, Forma, Sepet'),
(16, 'Yoga', 'Mat, Kıyafet, Blok'),
(16, 'Yüzme', 'Mayo, Gözlük, Havlu'),

(17, 'Fotoğrafçılık', 'Kamera, Lens, Tripod'),
(17, 'Kitap Okuma', 'Kitap, Okuma Lambası, Kitap Ayracı'),
(17, 'Bahçecilik', 'Aletler, Tohum, Saksı'),

(18, 'Dans', 'Müzik, Dans Ayakkabısı, Aksesuar'),
(18, 'Seyahat', 'Çanta, Harita, Kamera'),
(18, 'Pişirme', 'Tencere, Malzemeler, Kitap'),

(19, 'Bisiklet', 'Bisiklet, Kask, Eldiven'),
(19, 'Müzik', 'Enstrüman, Nota, Stüdyo'),
(19, 'Trekking', 'Çadır, Uyku Tulumu, Sırt Çantası'),

(20, 'Resim', 'Fırça, Boya, Tuval'),
(20, 'Kino', 'Film, Bilet, Patlamış Mısır'),
(20, 'Koşu', 'Koşu Ayakkabısı, Spor Giyim, Saat');
