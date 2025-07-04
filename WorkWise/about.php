
<?php $active4 = "active"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./CSS/about.css"> -->
    <title>WorkWise</title>
    <style>
    body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
   
}


.disc {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}




.logo {
    width: 130px;
    cursor: pointer;
    height: 40px;
    margin-left: 20px;
    margin-right: 30px;

}


@media screen and (max-width: 900px) {
   
    .disc {
        max-width: 600px;
      
    }
}
@media screen and (max-width: 700px) {
   
    .disc {
        max-width: 400px;
      
    }
}
    </style>
</head>

<body>
    <header>
        <link rel="stylesheet" href="./CSS/header.css">
    </header>
    <?php include_once("navbar.php")?>
    <div class="disc">
        <h2>Kenapa Memilih WorkWise?</h2>
        <img src="./Image/logo/logo1.png" alt="logo" class="logo">

        <ul>
            <li>Daftar Pekerjaan yang Beragam: Jelajahi beragam peluang kerja dari berbagai industri dan sektor.
            </li>
            <li>Antarmuka yang Ramah Pengguna: Menavigasi jalur karier Anda tidak pernah semudah ini.</li>
            <li>Rekomendasi Pekerjaan yang Dipersonalisasi: Ucapkan selamat tinggal pada pengguliran tanpa akhir!</li>
            <li>Terhubung dengan Pengusaha: Jalin hubungan yang bermakna dengan pemberi kerja melalui platform pengiriman pesan kami.
            </li>
            <li>Sumber Daya Pengembangan Keterampilan: Tetap terdepan dalam karier Anda dengan sumber daya pilihan kami..</li>
            <li>Aksesibilitas Seluler: Mencari pekerjaan saat bepergian? WorkWise ramah seluler.</li>
        </ul>

        <h2>Bergabunglah dengan Komunitas Kami yang Berkembang</h2>
        <p>WorkWise bukan hanya portal pekerjaan; ini adalah komunitas individu yang berpikiran sama yang berkomitmen terhadap pertumbuhan profesional.
        Berbagi wawasan, mencari saran, dan merayakan keberhasilan dengan sesama anggota.</p>

        <p>Siap untuk memulai perjalanan karier Anda? <a href="signup.php">Buat akun WorkWise</a> hari ini dan buka banyak kemungkinan!
        </p>
    </div>

    <?php include_once("footer.php")?>
