<!DOCTYPE html>
<html lang="en">

<?php
require_once('admin/dbkoneksi.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas Sehat</title>

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- icon -->
    <link rel="icon" href="img/logo-circle.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body id="beranda">
    <header class="navbar-container">
        <div class="logo">
            <img src="img/logo-circle.png" alt="Logo">
        </div>
        <button class="puskesmas" id="puskesmas">&#9776;</button>
        <nav class="nav-list" id="navList">
            <ul>
                <li>
                    <a href="#beranda">Beranda</a>
                </li>
                <li>
                    <a href="#layanan_kami">Layanan Kami</a>
                </li>
                <li>
                    <a href="#tentang_kami">Tentang Kami</a>
                </li>
                <li>
                    <a href="admin/login.html">Login</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="content">
            <div class="content-description">
                <h1 class="title">Puskesmas Sehat</h1>
                <caption>Puskesmas Sehat, Teman Sehat Keluarga. </caption>
                <p>
                    <b>Selamat datang di Puskesmas Kami! </b><br>
                    Di pusat kesehatan masyarakat ini,
                    kami berdedikasi untuk memberikan pelayanan kesehatan yang berkualitas dan
                    terjangkau bagi setiap anggota masyarakat. Dengan tim medis yang profesional dan
                    peralatan medis terkini, kami siap membantu Anda dan keluarga menjaga kesehatan,
                    mencegah penyakit, serta meningkatkan kualitas hidup.
                    Akses layanan kesehatan yang mudah dan nyaman
                    karena kesehatan Anda adalah prioritas kami.
                </p>

                <a href="#layanan_kami"><button>Lebih lanjut</button></a>
            </div>
            <div class="content-image">
                <img src="img/logo-circle.png" alt="Logo">
            </div>
        </div>

        <div id="layanan_kami">
            <h1>Layanan Kami</h1>
            <div class="layanan">
                <div class="card">
                    <img src="img/kesehatan-dasar.jpeg" alt="layanan kesehatan dasar" width="100%">
                    <h2>layanan kesehatan dasar</h2>
                    <ul>
                        <li>Pemeriksaan dan Pengobatan</li>
                        <li>Program Imunisasi</li>
                        <li>Kesehatan Ibu dan Anak</li>
                        <li>Kontrol Penyakit Menular</li>
                    </ul>
                </div>

                <div class="card">
                    <img src="img/layanan-gizi.jpeg" alt="layanan gizi" width="100%">
                    <h2>layanan gizi</h2>
                    <ul>
                        <li>Konseling Gizin</li>
                        <li>Suplementasi</li>
                    </ul>
                </div>

                <div class="card">
                    <img src="img/layanan-keluarga.jpeg" alt="layanan keluarga berencana" width="100%">
                    <h2>layanan Keluarga Berencana</h2>
                    <ul>
                        <li>Konseling dan Layanan Kontrasepsi</li>
                    </ul>
                </div>

                <div class="card">
                    <img src="img/layanan-kesehatan.jpeg" alt="layanan Kesehatan Lingkungan" width="100%">
                    <h2>layanan Kesehatan Lingkungan</h2>
                    <ul>
                        <li>Sanitasi dan Hygiene</li>
                    </ul>
                </div>

                <div class="card">
                    <img src="img/layanan-pendidikan.jpeg" alt="layanan Pendidikan Kesehatan" width="100%">
                    <h2>layanan Pendidikan Kesehatan</h2>
                    <ul>
                        <li>Promosi Kesehatan</li>
                    </ul>
                </div>

                <div class="card">
                    <img src="img/rujukan-medis.jpeg" alt="rujukan medis" width="100%">
                    <h2>Rujukan Medis</h2>
                    <ul>
                        <li>Sistem Rujukan</li>
                    </ul>
                </div>

                <div class="card">
                    <img src="img/layanan-penyakit.jpeg" alt="layanan Penyakit Kronis dan Non Menular" width="100%">
                    <h2>layanan Penyakit Kronis dan Non Menular</h2>
                    <ul>
                        <li>Pengelolaan Penyakit Kronis</li>
                    </ul>
                </div>

                <div class="card">
                    <img src="img/kesehatan-jiwa.jpeg" alt="layanan Kesehatan Jiwa dan Psikososial" width="100%">
                    <h2>layanan Kesehatan Jiwa dan Psikososial</h2>
                    <ul>
                        <li>Konseling dan Terapi</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="tentang_kami">
            <h1>Tentang Kami</h1>

            <h3 class="title-unit_kerja">Unit Kerja</h3>
            <div class="unit_kerja">
                <?php
                $sql = "SELECT nama FROM unit_kerja";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $unit_kerja = $stmt->fetchAll();

                foreach ($unit_kerja as $unit_kerja) {
                ?>
                    <div class="card">
                        <img src="img/unit_kerja.jpg" alt="unit kerja" width="100%">
                        <h4>
                            <?= htmlspecialchars($unit_kerja['nama']); ?>
                        </h4>
                    </div>
                <?php
                }
                ?>
            </div>

            <h3 class="title-dokter">Dokter Kami</h3>
            <div class="dokter">
                <?php
                $sql = "SELECT nama, kategori FROM paramedik";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $paramediks = $stmt->fetchAll();

                foreach ($paramediks as $paramedik) {
                ?>
                    <div class="card">
                        <img src="img/dokter.png" alt="dokter" width="100%">
                        <h4>
                            <?= htmlspecialchars($paramedik['nama']); ?>
                        </h4>
                        <p>
                            <?= htmlspecialchars($paramedik['kategori']); ?>
                        </p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>

    <footer>
        <span>Copyright &copy; 2024, <a href="https://www.instagram.com/ihsnghnii/">Ihsan Ghani</a></span>
    </footer>

    <script>
        $(document).ready(function() {
            $("a[href^='#']").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 100, function() {
                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const puskesmas = document.getElementById('puskesmas');
            const navList = document.getElementById('navList');

            puskesmas.addEventListener('click', function() {
                navList.classList.toggle('open');
            });
        });
    </script>
</body>

</html>