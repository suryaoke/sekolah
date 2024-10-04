-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `sekolah` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sekolah`;

DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `id_about` int(11) NOT NULL AUTO_INCREMENT,
  `visi` varchar(100) NOT NULL,
  `misi` text NOT NULL,
  `gambar_about` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `jumlah_siswa` varchar(255) NOT NULL,
  `jumlah_pengajar` varchar(255) NOT NULL,
  `jumlah_ekstrakulikuler` varchar(255) NOT NULL,
  `jumlah_sarpras` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`id_about`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `about` (`id_about`, `visi`, `misi`, `gambar_about`, `about`, `jumlah_siswa`, `jumlah_pengajar`, `jumlah_ekstrakulikuler`, `jumlah_sarpras`, `video`) VALUES
(5,	'Berprestasi Dilandasi dengan  Iman dan Takwa',	'Melaksanakan Pembelajaran yang Efektif dan Efisien\r\nMenjadikna Peserta Didik Berprestasi\r\nMendorong Peserta Didik Untuk Mengembangkan Potensi Dirinya dengan Landasan Imtaq\r\nMenumbuh kembangkan Semangat Kesunguhan dan Keteladanan',	'DSC01798.JPG',	'SMA Pertiwi 1 adalah sebuah lembaga sekolah SMA swasta yang berlokasi di Jl. Cendrawasih No. 7, Kota Padang. SMA swasta ini memulai kegiatan pendidikan belajar mengajarnya pada tahun 1982. Pada waktu ini SMA Pertiwi 1 memakai panduan kurikulum belajar pemerintah yaitu SMA 2013 MIPA.',	'250',	'60',	'8',	'20',	'https://www.youtube.com/watch?v=jKSkD1K-N_c');

DROP TABLE IF EXISTS `activities`;
CREATE TABLE `activities` (
  `id_activities` int(11) NOT NULL AUTO_INCREMENT,
  `gambar_activities` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_activities` date NOT NULL,
  `isi_activities` text NOT NULL,
  `judul_activities` varchar(255) NOT NULL,
  `lokasi_activities` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id_activities`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `activities` (`id_activities`, `gambar_activities`, `id_user`, `tanggal_activities`, `isi_activities`, `judul_activities`, `lokasi_activities`, `slug`) VALUES
(4,	'maulid-nabi-1024x1024.jpeg',	7,	'2024-09-30',	'SMA 1 Pertiei mengadakan perayaan Maulid Nabi Muhammad SAW yang berlangsung meriah pada tanggal 28 September 2024. Acara ini diisi dengan berbagai lomba dan kegiatan yang melibatkan siswa-siswi serta anggota Pramuka. Kepala Sekolah, Bapak Ahmad Rifai, menyatakan bahwa perayaan ini bertujuan untuk mempererat ukhuwah antar siswa dan menanamkan nilai-nilai luhur yang diajarkan oleh Nabi Muhammad.',	'Maulid Nabi',	'Padang',	'Maulid-Nabi'),
(5,	'th (18).jpeg',	7,	'2024-09-28',	'Semarang - Dalam rangka memperingati Hari Kemerdekaan Republik Indonesia yang ke-79, SMP Negeri 7 Semarang mengadakan lomba Agustus dan kegiatan Pramuka pada tanggal 15 hingga 17 Agustus 2024. Kegiatan ini diikuti oleh seluruh siswa dengan antusiasme tinggi, yang mencerminkan semangat kemerdekaan dan kebersamaan.',	'Kemerdekaan',	'Padang',	'Kemerdekaan'),
(6,	'th (19).jpeg',	7,	'2024-09-25',	'Selain lomba, kegiatan Pramuka juga diselenggarakan sebagai bagian dari perayaan. Anggota Pramuka dari berbagai tingkat di sekolah tersebut melakukan aksi sosial dengan membersihkan lingkungan sekitar dan menanam pohon di area sekolah. \"Kegiatan ini tidak hanya untuk merayakan kemerdekaan, tetapi juga untuk membangun kesadaran lingkungan di kalangan siswa,\" tambah Ibu Ratna.\r\n',	'Pramuka',	'Padang',	'Pramuka');

DROP TABLE IF EXISTS `kontak`;
CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kontak` (`id_kontak`, `email`, `instagram`, `no_telp`, `alamat`) VALUES
(1,	'smapertiwisatu@ymail.com',	'https://www.instagram.com/',	'083182718860',	'Jl. Cendrawasih No. 7, Kecamatan Padang Utara, Kota Padang, Sumatera Barat.');

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `judul_news` varchar(255) NOT NULL,
  `news` text NOT NULL,
  `tanggal_news` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `gambar_news` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `news` (`id_news`, `judul_news`, `news`, `tanggal_news`, `id_user`, `gambar_news`, `slug`) VALUES
(6,	'Ujian Nasional 2024',	'Jakarta - SMA Pertiwi 1 Padang tengah mempersiapkan siswa-siswinya untuk menghadapi Ujian Nasional (UN) tahun 2024 yang akan berlangsung pada bulan April mendatang. Kepala Sekolah, Bapak Andi Sudirman, menyatakan bahwa berbagai persiapan telah dilakukan, mulai dari penambahan jam belajar hingga program bimbingan intensif. \"Kami optimis seluruh siswa dapat mencapai hasil yang memuaskan dengan persiapan yang matang ini,\" ungkapnya. Selain itu, sekolah juga menyediakan simulasi ujian untuk membiasakan siswa dengan format soal yang akan diujikan.',	'2024-09-30',	7,	'Ujian-Nasional.jpeg',	'Ujian-Nasional-2024'),
(7,	'Penerimaan Siswa Baru',	'PAdang - SMA 1 Pertiwi secara resmi membuka pendaftaran siswa baru untuk tahun ajaran 2024/2025. Proses pendaftaran akan dilakukan secara online melalui situs resmi sekolah mulai 1 hingga 30 Juni 2024. Kepala Sekolah, Ibu Siti Wahyuni, menyatakan bahwa penerimaan siswa baru tahun ini akan mengutamakan transparansi dan keadilan dalam proses seleksi. \"Kami ingin memberikan kesempatan kepada seluruh calon siswa untuk mendapatkan pendidikan berkualitas di sekolah ini,\" ujarnya. Selain itu, calon siswa yang memenuhi syarat dapat mengikuti ujian seleksi yang akan diselenggarakan secara serentak pada pertengahan Juli.',	'2024-09-23',	7,	'desain-eflyer-p4-infogading.jpg',	'Penerimaan-Siswa-Baru'),
(8,	'Kurikulum Merdeka',	'SMA 1 Pertiwi menggelar kegiatan sosialisasi Kurikulum Merdeka Belajar untuk seluruh guru dan staf pengajar pada hari Senin, 25 September 2024. Acara ini bertujuan untuk mempersiapkan sekolah dalam menghadapi perubahan kurikulum yang akan diterapkan mulai tahun ajaran depan. Kepala Sekolah, Bapak Haris Setiawan, menegaskan pentingnya memahami esensi Merdeka Belajar agar pembelajaran dapat lebih fleksibel dan sesuai dengan kebutuhan siswa. \"Kami berharap dengan penerapan kurikulum ini, siswa dapat lebih kreatif dan mandiri dalam mengeksplorasi bakat dan minat mereka,\" ujar Haris. Para guru terlihat antusias mengikuti sosialisasi dan diskusi yang diadakan oleh tim ahli dari Dinas Pendidikan Kota Surabaya.',	'2024-09-30',	7,	'th (17).jpeg',	'Kurikulum-Merdeka');

DROP TABLE IF EXISTS `pesan`;
CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal_create` date NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `nama_lengkap`, `foto`, `status`) VALUES
(7,	'admin',	'suryasahputra07@gmail.com',	'12345678',	'admin',	'SURYA SAHPUTRA.jpg',	'Aktif'),
(19,	'admin2',	'admin2@gmail.com',	'12345678',	'admin2',	'foto.jpeg',	'Tidak Aktif');

-- 2024-09-30 08:56:37
