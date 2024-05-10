<?php
session_start();
if (!isset($_SESSION['login'])) {
    echo "<script>alert('Anda harus login terlebih dahulu') </script>";
    echo "<script>window.location.href='login.html'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include_once('include/meta.php');
require_once("dbkoneksi.php");

?>

<!-- bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- icon -->
<link rel="icon" href="../img/logo-circle.png">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('include/header.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <h3>Dashboard</h3>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                                <img class="img-profile rounded-circle" src="img/user.png">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Log out
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Periksa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">3 Orang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Penghasilan (Tahunan) dalam Rupiah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">3.449.675.000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pasien
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">3 Orang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Paramedik</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">5 Orang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Income
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">User</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Role</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = "SELECT * FROM user";
                                                $stmt = $dbh->prepare($sql);
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();
                                                foreach ($result as $row) { ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nama'] ?></td>
                                                        <td><?= $row['role'] ?></td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="mb-4 font-weight-bold text-primary">Penjelasan</h6>
                                    <div class="penjelasan">
                                        <div class="sistolik">
                                            <h5>Tekanan Sistolik</h5>
                                            <p>Tekanan pada arteri ketika jantung bagian ventrikel kiri berkontraksi dan memompa darah ke seluruh tubuh</p>
                                        </div>
                                        <div class="diastolik">
                                            <h5>Tekanan Diastolik</h5>
                                            <p>Tekanan yang terjadi saat darah kembali mengisi jantung dan tidak ada darah yang mengalir ke pembuluh darah dari jantung.</p>
                                        </div>
                                        <div class="tekanan_darah">
                                            <h5>Tekanan Darah</h5>
                                            <ol>
                                                <li>Tekanan darah normal <br> Sistolik 90-120 mmHg; Diastolik 60-90 mmHg</li>
                                                <li>Prehipertensi <br> Sistolik 120-139 mmHg atau Diastolik 80-89 mmHg</li>
                                                <li>Hipertensi derajat 1 <br> Sistolik 140-159 mmHg atau Diastolik 90-99 mmHg</li>
                                                <li>Hipertensi derajat 2 <br> Sistolik 160 mmHg atau lebih, atau Diastolik 100 mmHg atau lebih</li>
                                                <li>Krisis hipertensi <br> Sistolik di atas 180 mmHg atau Diastolik lebih dari 110 mmHg</li>
                                                <li>Tekanan darah rendah <br> Sistolik kurang dari 90 dan Diastolik kurang dari 60 mmHg</li>
                                                <li>Tekanan darah tinggi <br> Sistolik lebih dari 140 mmHg dan Diastolik lebih dari 90 mmHg</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Filosofi Logo</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-sm-4 mb-4" style="width: 25rem;" src="../img/logo-circle.png" alt="logo">
                                    </div>
                                    <div class="filosofi">
                                        <ul>
                                            <li>
                                                <b>Pertumbuhan Berkelanjutan</b> <br> Daun hijau melambangkan pertumbuhan yang berkelanjutan dan kesehatan lingkungan.
                                            </li>
                                            <li>
                                                <b>Perawatan dan Dukungan</b> <br> Bentuk abstrak yang menyerupai tangan yang memelihara atau merawat tanaman menunjukkan komitmen terhadap perawatan dan dukungan terhadap kehidupan dan alam.
                                            </li>
                                            <li>
                                                <b>Kesadaran Lingkungan</b> <br> Penggunaan warna hijau dan elemen alam dalam logo mencerminkan fokus pada kesadaran lingkungan dan tanggung jawab terhadap bumi.
                                            </li>
                                            <li>
                                                <b>Harmoni dan Keseimbangan</b> <br> Desain yang simetris dan penggunaan warna yang serasi menciptakan kesan harmoni dan keseimbangan, mencerminkan hubungan yang sehat antara manusia dan alam.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('include/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- log out modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Log out" di Bawah Ini Jika Kamu Ingin Keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../index.php">Log out</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>