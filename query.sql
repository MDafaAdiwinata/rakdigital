 -- Mmebuat Database
CREATE DATABASE db_perpusdigital_adi;

-- Menggunakan Database
use db_perpusdigital_adi;

-- Membuat Table Users
CREATE TABLE user (
    iduser int primary key auto_increment NOT NULL,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(12) NOT NULL
);

-- Membuat Tabel Buku
CREATE TABLE daftar_buku (
    id_buku int(3) primary key auto_increment,
    judul_buku varchar(100) NOT NULL,
    penulis varchar(50),
    penerbit varchar(50),
    tahun_terbit YEAR,
    jumlah_halaman INT,
    status ENUM ('Tersedia', 'Dipinjam') DEFAULT 'Tersedia'
);

-- Membuat Table Anggota
CREATE TABLE anggota (
    id_anggota INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) UNIQUE,
    password VARCHAR(20),
    nama VARCHAR(50) NOT NULL,
    alamat TEXT, 
    email VARCHAR(50) UNIQUE,
    no_telp VARCHAR(50)
);

-- Pembaruan Table Anggota - Password(varchar255), Karena hal hashing

CREATE TABLE anggota (
    id_anggota INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) UNIQUE,
    password VARCHAR(255),
    nama VARCHAR(50) NOT NULL,
    alamat TEXT, 
    email VARCHAR(50) UNIQUE,
    no_telp VARCHAR(50)
);

-- ### INPUT DATA AWAL
-- Data User
INSERT INTO user VALUES
(1, 'Admin', 'Admin123'),
(2, 'Pustakawan', 'Petugas123');
(3, 'admin321', 'admin321');

-- Data Anggota
INSERT INTO anggota (`id_anggota`, `nama`, `username`, `password`, `alamat`, `email`, `no_telp`) VALUES
(1, 'Andi Wijaya', 'andi33', 'Kerupuk321', 'Jl. Merdeka No. 10, Jakarta', 'andi.wijaya@gmail.com', '081234567890'),
(2, 'Budi Santosa', 'Budi676', 'Koala909', 'Jl. Sudirman No. 25, Bandung', 'budi.santoso@gmail.com', '082345678901'),
(3, 'Citra Dewi', 'Citrabaik88', 'Senandung99', 'Jl. Gatot Subroto No. 5, Surabaya', 'citra.dewi@gmail.com', '083456789012'),
(4, 'Dedi Pratama', 'Dedilaik90', 'Semen3roda', 'Jl. Thamrin No. 15, Medan', 'dedi.pratama@apple.me', '084567890123'),
(5, 'Eka Putri', 'Ekaput21', 'Nonton21', 'Jl. Pahlawan No. 30, Yogyakarta', 'eka.putri.@email.com', '085678901234'),
(6, 'Fajar Nugroho', 'Fajarzz27', 'Krimping45', 'Jl. Diponegoro No. 8, Semarang', 'fajar.nugroho@yahoo.com', '086789012345'),
(7, 'Gita Ayu', 'Gitanew28', 'Mengejar98', 'Jl. Ahmad Yani No. 12, Bali', 'gita.ayu@yahoo.com', '087890123456'),
(8, 'Heru Setiawan', 'Heruheri94', 'Sukariding94', 'Jl. Surya Kencana No. 3, Bogor', 'heru.setiawan@gmail.com', '088901234567'),
(9, 'Intan Permata', 'Intanp98', 'Kaleng98', 'Jl. Kartini No. 7, Malang', 'intan.permata@yahoo.com', '089012345678'),
(10, 'Joko Trisno', 'Jokot58', 'Wewokdetok6', 'Jl. Kenanga No. 9, Jakarta', 'joko.susilo@yahoo.com', '081123456789');

-- Data Daftar Buku
INSERT INTO daftar_buku (`id_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `status`) VALUES
(1, 'Belajar MySQL Dasar', 'Ahmad Santoso', 'Informatika Jaya', 2020, 150, 'Tersedia'),
(2, 'Pemrograman Web dengan PHP', 'Budi Raharjo', 'Media Komputindo', 2019, 250, 'Dipinjam'),
(3, 'Algoritma dan Struktur Data', 'Rini Wijayanti', 'Pustaka Mandiri', 2021, 300, 'Tersedia'),
(4, 'Desain UI/UX untuk Pemula', 'Dian Surya', 'Kreatif Press', 2022, 180, 'Tersedia'),
(5, 'Machine Learning untuk Bisnis', 'Eko Prasetyo', 'Data Science Co', 2021, 320, 'Dipinjam'),
(6, 'Panduan Lengkap JavaScript', 'Fitriani', 'Web Publisher', 2020, 220, 'Tersedia'),
(7, 'Manajemen Proyek IT', 'Guntur Wibowo', 'Manajemen Sukses', 2018, 200, 'Tersedia'),
(8, 'Jaringan Komputer Modern', 'Hana Arifin', 'Tekno Net', 2023, 280, 'Tersedia'),
(9, 'Android Development dari Nol', 'Irfan Maulana', 'App Dev Press', 2022, 350, 'Dipinjam'),
(10, 'Keamanan Siber untuk Pemula', 'Joko Susilo', 'Cyber Security', 2021, 190, 'Tersedia');

-- ### UPDATE DATA TABEL ANGGOTA (ADA PERUBAHAN DATA)
UPDATE anggota SET nama = 'Budi Santoso Putra' WHERE id_anggota = 2;

UPDATE anggota SET alamat = 'Jl. Raya Darmo No. 12, Surabaya' WHERE id_anggota = 3;

UPDATE anggota SET email = 'eka.putri.new@email.com' WHERE id_anggota = 5;

UPDATE anggota SET no_telp = '087812345678' WHERE id_anggota = 7;

UPDATE anggota SET alamat = 'Jl. Danau Toba No. 21, Malang', no_telp = '089876543210' WHERE id_anggota = 9;

-- ### Tambah Kolom Baru ke dalam table daftar_buku
ALTER TABLE daftar_buku
ADD COLUMN ISBN VARCHAR(20),
ADD COLUMN deskripsi text,
ADD COLUMN cover text;

-- ### Menambahkan Data baru (ISBN, Deskripsi, & Cover) 
UPDATE daftar_buku
    SET 
        ISBN = CASE
            WHEN id_buku = 1 THEN '978-602-1234-56-7'
            WHEN id_buku = 2 THEN '978-602-2345-67-8'
            WHEN id_buku = 3 THEN '978-602-3456-78-9'
            WHEN id_buku = 4 THEN '978-602-4567-89-0'
            WHEN id_buku = 5 THEN '978-602-5678-90-1'
            WHEN id_buku = 6 THEN '978-602-6789-01-2'
            WHEN id_buku = 7 THEN '978-602-7890-12-3'
            WHEN id_buku = 8 THEN '978-602-8901-23-4'
            WHEN id_buku = 9 THEN '978-602-9012-34-5'
            WHEN id_buku = 10 THEN '978-602-0123-45-6'
        END,
        deskripsi = CASE
            WHEN id_buku = 1 THEN 'Buku pengantar database MySQL untuk pemula, mencakup konsep dasar SQL, pembuatan tabel, dan query sederhana. Cocok untuk siswa TI atau yang ingin memulai belajar database.'
            WHEN id_buku = 2 THEN 'Panduan komprehensif membangun website dinamis menggunakan PHP, dari sintaks dasar hingga integrasi dengan database. Dilengkapi contoh studi kasus.'
            WHEN id_buku = 3 THEN 'Buku teks fundamental ilmu komputer yang membahas berbagai algoritma sorting, searching, dan struktur data seperti linked list, tree, dan graph.'
            WHEN id_buku = 4 THEN 'Pengantar prinsip-prinsip desain antarmuka pengguna dan pengalaman pengguna, dengan contoh aplikasi mobile dan web. Dilengkapi studi kasus redesign.'
            WHEN id_buku = 5 THEN 'Panduan penerapan machine learning di dunia bisnis, mencakup predictive analytics, segmentasi pelanggan, dan implementasi dengan Python.'
            WHEN id_buku = 6 THEN 'Referensi komplit JavaScript modern mulai dari ES6+, DOM manipulation, hingga framework populer. Dilengkapi proyek-proyek praktis.'
            WHEN id_buku = 7 THEN 'Metodologi pengelolaan proyek teknologi informasi menggunakan pendekatan Agile dan Waterfall, termasuk tools manajemen modern.'
            WHEN id_buku = 8 THEN 'Buku teks tentang arsitektur jaringan terkini, protokol komunikasi, keamanan jaringan, dan implementasi infrastruktur enterprise.'
            WHEN id_buku = 9 THEN 'Tutorial step-by-step pembuatan aplikasi Android menggunakan Kotlin, dari setup environment hingga publikasi di Play Store.'
            WHEN id_buku = 10 THEN 'Pengenalan dunia cybersecurity mencakup ethical hacking, pertahanan sistem, dan analisis kerentanan untuk pemula.'
        END,
        cover = CASE
            WHEN id_buku = 1 THEN 'belajarmysql.jpg'
            WHEN id_buku = 2 THEN 'webdenganphp.jpg'
            WHEN id_buku = 3 THEN 'algoritma.jpg'
            WHEN id_buku = 4 THEN 'desainuiux.jpg'
            WHEN id_buku = 5 THEN 'machinelearning.jpg'
            WHEN id_buku = 6 THEN 'javascript.jpg'
            WHEN id_buku = 7 THEN 'manajemenit.jpg'
            WHEN id_buku = 8 THEN 'jaringankomputer.jpg'
            WHEN id_buku = 9 THEN 'android.jpg'
            WHEN id_buku = 10 THEN 'keamanansiber.jpg'
        END
    WHERE
        id_buku IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

-- ### Tampil Select Data

-- Menampilkan Buku Yang sedang dipinjam
SELECT * FROM daftar_buku WHERE status = 'Dipinjam';

-- Menampilkan Buku Terbitan Di atas Tahun 2020
SELECT * FROM daftar_buku WHERE tahun_terbit > 2020;

-- Menampilkan Buku Terbitan Di atas Tahun 2022
SELECT * FROM daftar_buku WHERE tahun_terbit > 2022;

-- Menampilkan Buku dengan Halaman Lebih 
SELECT id_buku, judul_buku, penulis, jumlah_halaman FROM daftar_buku WHERE jumlah_halaman > 250;

-- Menampilkan Anggota dengan Nama dan no telp yang beralamat di jakarta
SELECT id_anggota, nama, no_telp FROM anggota WHERE alamat LIKE '%jakarta%';

-- Menampilkan Nama dan email dengan kriteria email Gmail
SELECT nama, email FROM anggota WHERE email LIKE '%gmail%';

-- ### Tambah Kolom Kategori Buku Pada Tabel daftar buku

ALTER TABLE daftar_buku
ADD COLUMN kategori VARCHAR(50) AFTER penulis;

-- Update Semua Buku dengan Kategori Teknologi / Komputer
UPDATE daftar_buku SET kategori = 'Teknologi & Komputer';

-- Teknologi
INSERT INTO daftar_buku (id_buku, judul_buku, penulis, kategori, penerbit, tahun_terbit, jumlah_halaman, status, ISBN, deskripsi, cover) VALUES
(1, 'Belajar MySQL Dasar', 'Ahmad Santoso', 'Teknologi & Komputer', 'Informatika Jaya', 2020, 150, 'Tersedia', '978-602-1234-56-7', 'Buku pengantar database MySQL untuk pemula, mencakup konsep dasar SQL, pembuatan tabel, dan query sederhana. Cocok untuk siswa TI atau yang ingin memulai belajar database.', 'belajarmysql.jpg'),
(2, 'Pemrograman Web dengan PHP', 'Budi Raharjo', 'Teknologi & Komputer', 'Media Komputindo', 2019, 250, 'Dipinjam', '978-602-2345-67-8', 'Panduan komprehensif membangun website dinamis menggunakan PHP, dari sintaks dasar hingga integrasi dengan database. Dilengkapi contoh studi kasus.', 'webdenganphp.jpg'),
(3, 'Algoritma dan Struktur Data', 'Rini Wijayanti', 'Teknologi & Komputer', 'Pustaka Mandiri', 2021, 300, 'Tersedia', '978-602-3456-78-9', 'Buku teks fundamental ilmu komputer yang membahas berbagai algoritma sorting, searching, dan struktur data seperti linked list, tree, dan graph.', 'algoritma.jpg'),
(4, 'Desain UI/UX untuk Pemula', 'Dian Surya', 'Teknologi & Komputer', 'Kreatif Press', 2022, 180, 'Tersedia', '978-602-4567-89-0', 'Pengantar prinsip-prinsip desain antarmuka pengguna dan pengalaman pengguna, dengan contoh aplikasi mobile dan web. Dilengkapi studi kasus redesign.', 'desainuiux.jpg'),
(5, 'Machine Learning untuk Bisnis', 'Eko Prasetyo', 'Teknologi & Komputer', 'Data Science Co', 2021, 320, 'Dipinjam', '978-602-5678-90-1', 'Panduan penerapan machine learning di dunia bisnis, mencakup predictive analytics, segmentasi pelanggan, dan implementasi dengan Python.', 'machinelearning.jpg'),
(6, 'Panduan Lengkap JavaScript', 'Fitriani', 'Teknologi & Komputer', 'Web Publisher', 2020, 220, 'Tersedia', '978-602-6789-01-2', 'Referensi komplit JavaScript modern mulai dari ES6+, DOM manipulation, hingga framework populer. Dilengkapi proyek-proyek praktis.', 'javascript.jpg'),
(7, 'Manajemen Proyek IT', 'Guntur Wibowo', 'Teknologi & Komputer', 'Manajemen Sukses', 2018, 200, 'Tersedia', '978-602-7890-12-3', 'Metodologi pengelolaan proyek teknologi informasi menggunakan pendekatan Agile dan Waterfall, termasuk tools manajemen modern.', 'manajemenit.jpg'),
(8, 'Jaringan Komputer Modern', 'Hana Arifin', 'Teknologi & Komputer', 'Tekno Net', 2023, 280, 'Tersedia', '978-602-8901-23-4', 'Buku teks tentang arsitektur jaringan terkini, protokol komunikasi, keamanan jaringan, dan implementasi infrastruktur enterprise.', 'jaringankomputer.jpg'),
(9, 'Android Development dari Nol', 'Irfan Maulana', 'Teknologi & Komputer', 'App Dev Press', 2022, 350, 'Dipinjam', '978-602-9012-34-5', 'Tutorial step-by-step pembuatan aplikasi Android menggunakan Kotlin, dari setup environment hingga publikasi di Play Store.', 'android.jpg'),
(10, 'Keamanan Siber untuk Pemula', 'Joko Susilo', 'Teknologi & Komputer', 'Cyber Security', 2021, 190, 'Tersedia', '978-602-0123-45-6', 'Pengenalan dunia cybersecurity mencakup ethical hacking, pertahanan sistem, dan analisis kerentanan untuk pemula.', 'keamanansiber.jpg');


-- === Novel ===
INSERT INTO daftar_buku (judul_buku, penulis, penerbit, tahun_terbit, jumlah_halaman, status, ISBN, deskripsi, kategori, cover) VALUES
('Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, 529, 'Tersedia', '978-979-1227-37-9', 'Kisah inspiratif tentang perjuangan anak-anak miskin di Belitong untuk menggapai pendidikan.', 'Novel', 'laskarpelangi.jpg'),
('Ayat-Ayat Cinta', 'Habiburrahman El Shirazy', 'Republika', 2004, 412, 'Dipinjam', '978-979-1103-04-8', 'Novel religi yang menggambarkan cinta, konflik dan kehidupan kampus di Mesir.', 'Novel', 'ayatayatcinta.jpg'),
('Perahu Kertas', 'Dee Lestari', 'Bentang Pustaka', 2009, 444, 'Tersedia', '978-602-291-019-2', 'Cerita cinta remaja yang ringan namun penuh makna dengan sentuhan seni dan cita-cita.', 'Novel', 'perahukertas.jpg'),
('5 cm', 'Donny Dhirgantoro', 'Grasindo', 2005, 382, 'Tersedia', '978-979-759-551-9', 'Lima sahabat yang memaknai arti persahabatan dan semangat mendaki puncak.', 'Novel', '5cm.jpg'),
('Dilan 1990', 'Pidi Baiq', 'Pastel Books', 2014, 332, 'Dipinjam', '978-602-7870-20-0', 'Kisah remaja Bandung tahun 90an antara Milea dan Dilan yang nyentrik.', 'Novel', 'dilan1990.jpg'),
('Negeri 5 Menara', 'Ahmad Fuadi', 'Gramedia', 2009, 424, 'Tersedia', '978-9    79-22-4563-6', 'Cerita anak pesantren dengan cita-cita tinggi menggapai langit dunia.', 'Novel', 'negeri5menara.jpg'),
('Bumi', 'Tere Liye', 'Gramedia', 2014, 400, 'Tersedia', '978-602-03-0449-7', 'Novel fantasi anak muda yang seru dengan unsur petualangan dunia lain.', 'Novel', 'bumi.jpg'),
('Mariposa', 'Luluk HF', 'Coconut Books', 2018, 330, 'Tersedia', '978-602-5508-57-7', 'Cinta remaja unik antara Acha dan Iqbal, penuh perjuangan dan tawa.', 'Novel', 'mariposa.jpg'),
('Surat Kecil untuk Tuhan', 'Agnes Davonar', 'Inandra Published', 2009, 240, 'Dipinjam', '978-979-1214-27-9', 'Kisah nyata gadis kecil penderita kanker yang menginspirasi dunia.', 'Novel', 'suratkeciluntuktuhan.jpg'),
('Rembulan Tenggelam di Wajahmu', 'Tere Liye', 'Republika', 2006, 360, 'Tersedia', '978-979-1103-45-1', 'Filosofis dan menyentuh, menggambarkan perjalanan seseorang memahami takdir.', 'Novel', 'rembulan.jpg');

-- === Bisnis & Ekonomi ===
INSERT INTO daftar_buku (judul_buku, penulis, penerbit, tahun_terbit, jumlah_halaman, status, ISBN, deskripsi, kategori, cover) VALUES
('Rich Dad Poor Dad', 'Robert T. Kiyosaki', 'Plata Publishing', 1997, 336, 'Dipinjam', '978-1612680194', 'Buku edukatif keuangan membandingkan dua sudut pandang berbeda soal uang.', 'Bisnis & Ekonomi', 'richdad.jpg'),
('Think and Grow Rich', 'Napoleon Hill', 'TarcherPerigee', 1937, 320, 'Tersedia', '978-1585424337', 'Rahasia sukses dan kekayaan berdasarkan wawancara dengan ratusan tokoh hebat.', 'Bisnis & Ekonomi', 'thinkgrow.jpg'),
('The Intelligent Investor', 'Benjamin Graham', 'Harper Business', 1949, 640, 'Tersedia', '978-0060555665', 'Panduan klasik investasi jangka panjang dari bapak value investing.', 'Bisnis & Ekonomi', 'intelligentinvestor.jpg'),
('Start With Why', 'Simon Sinek', 'Portfolio', 2009, 256, 'Tersedia', '978-1591842804', 'Membangun bisnis dan kepemimpinan yang menginspirasi mulai dari pertanyaan “Mengapa?”.', 'Bisnis & Ekonomi', 'startwith.jpg'),
('The Lean Startup', 'Eric Ries', 'Crown Business', 2011, 320, 'Dipinjam', '978-0307887894', 'Metodologi membangun startup secara efisien dan berkelanjutan.', 'Bisnis & Ekonomi', 'thelean.jpg'),
('Atomic Habits', 'James Clear', 'Penguin Random House', 2018, 320, 'Tersedia', '978-0735211292', 'Perubahan kecil yang konsisten untuk hasil luar biasa dalam kehidupan dan bisnis.', 'Bisnis & Ekonomi', 'atomichabits.jpg'),
('Zero to One', 'Peter Thiel', 'Crown Business', 2014, 224, 'Dipinjam', '978-0804139298', 'Membangun perusahaan baru yang unik dan menghindari kompetisi.', 'Bisnis & Ekonomi', 'zerotoone.jpg'),
('Outliers', 'Malcolm Gladwell', 'Little, Brown', 2008, 320, 'Tersedia', '978-0316017923', 'Mengapa sebagian orang sangat sukses? Studi kasus dan teori 10.000 jam.', 'Bisnis & Ekonomi', 'outliers.jpg'),
('The 7 Habits of Highly Effective People', 'Stephen R. Covey', 'Free Press', 1989, 381, 'Tersedia', '978-0743269513', 'Tujuh kebiasaan yang membawa kesuksesan dan efektivitas dalam hidup dan kerja.', 'Bisnis & Ekonomi', '7habits.jpg'),
('The Psychology of Money', 'Morgan Housel', 'Harriman House', 2020, 252, 'Dipinjam', '978-0857197689', 'Bagaimana perilaku memengaruhi cara kita mengelola uang, lebih dari sekadar logika.', 'Bisnis & Ekonomi', 'psychologymoney.jpg');

-- === Komik ===
INSERT INTO daftar_buku (judul_buku, penulis, penerbit, tahun_terbit, jumlah_halaman, status, ISBN, deskripsi, kategori, cover) VALUES
('One Piece Vol. 1', 'Eiichiro Oda', 'Shueisha', 1997, 200, 'Dipinjam', '978-4088725093', 'Awal petualangan Luffy dan kru bajak lautnya mencari harta karun legendaris.', 'Komik', 'onepiecevol1.jpg'),
('Naruto Vol. 1', 'Masashi Kishimoto', 'Shueisha', 1999, 192, 'Tersedia', '978-1569319000', 'Perjalanan ninja muda bernama Naruto yang ingin menjadi Hokage.', 'Komik', 'narutovol1.jpg'),
('Doraemon Vol. 1', 'Fujiko F. Fujio', 'Shogakukan', 1970, 180, 'Dipinjam', '978-4091400010', 'Robot kucing dari masa depan yang membantu Nobita dengan alat canggih.', 'Komik', 'doraemonvol1.jpg'),
('Dragon Ball Vol. 1', 'Akira Toriyama', 'Shueisha', 1984, 192, 'Dipinjam', '978-1569319208', 'Goku memulai petualangan mengumpulkan Bola Naga yang ajaib.', 'Komik', 'dragonballvol1.jpg'),
('Detective Conan Vol. 1', 'Gosho Aoyama', 'Shogakukan', 1994, 192, 'Tersedia', '978-4091238514', 'Seorang detektif SMA berubah jadi anak kecil dan memecahkan kasus misterius.', 'Komik', 'conanvol1.jpg'),
('Attack on Titan Vol. 1', 'Hajime Isayama', 'Kodansha', 2009, 200, 'Dipinjam', '978-1612620244', 'Umat manusia bertahan hidup dari serangan para Titan raksasa.', 'Komik', 'aotvol1.jpg'),
('Tokyo Revengers Vol. 1', 'Ken Wakui', 'Kodansha', 2017, 192, 'Tersedia', '978-4065104380', 'Seorang pria kembali ke masa lalu untuk menyelamatkan kekasihnya dari kematian.', 'Komik', 'tokyorevengesvol1.jpg'),
('Jujutsu Kaisen Vol. 1', 'Gege Akutami', 'Shueisha', 2018, 192, 'Dipinjam', '978-4088815169', 'Pertarungan pengguna kutukan melawan roh jahat yang kuat.', 'Komik', 'jujutsuvol1.jpg'),
('Chainsaw Man Vol. 1', 'Tatsuki Fujimoto', 'Shueisha', 2018, 192, 'Tersedia', '978-1974717278', 'Seorang remaja menjadi manusia gergaji untuk memburu iblis.', 'Komik', 'chainsawvol1.jpg'),
('Bleach Vol. 1', 'Tite Kubo', 'Shueisha', 2001, 192, 'Dipinjam', '978-1591164418', 'Petualangan Ichigo sebagai Shinigami dalam dunia arwah dan manusia.', 'Komik', 'bleachvol1.jpg');