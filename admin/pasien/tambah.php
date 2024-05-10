<!DOCTYPE html>
<html lang="en">
<?php
include_once('../include/meta.php');
require_once('../dbkoneksi.php');
?>

<!-- bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- icon -->
<link rel="icon" href="../../img/logo-circle.png">


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('../include/header.php') ?>
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
                            <h3>Tambah Pasien</h3>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
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
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ADMIN</span>
                                <img class="img-profile rounded-circle" src="../img/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
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
                        <div class="card col-md-12">
                            <div class="card-body">
                                <?php
                                if (isset($_POST['kode'])) {
                                    $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                                    $stmt = $dbh->prepare($sql);
                                    $stmt->execute([
                                        $_POST['kode'],
                                        $_POST['nama'],
                                        $_POST['tmp_lahir'],
                                        $_POST['tgl_lahir'],
                                        $_POST['gender'],
                                        $_POST['email'],
                                        $_POST['alamat'],
                                        $_POST['kelurahan_id'],
                                    ]);
                                    echo "<script>alert('Data Berhasil Ditambahkan</script>";
                                    echo '<meta http-equiv="refresh" content="0; url=index.php">';
                                }
                                ?>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="kode">Kode Pasien</label>
                                        <input type="hidden" name="id">
                                        <input type="text" class="form-control" id="kode" name="kode" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Pasien</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tmp_lahir">Tempat lahir</label>
                                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender Pasien</label><br>
                                        <input type="radio" id="genderPR" name="gender" value="0">
                                        <label for="genderPR">Perempuan</label>
                                        <br>
                                        <input type="radio" id="genderLK" name="gender" value="1">
                                        <label for="genderLK">Laki-laki</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="kelurahan_id">Kelurahan</label>
                                        <select name="kelurahan_id" class="form-control" id="kelurahan_id">
                                            <option value="">Pilih Kelurahan</option>
                                            <?php
                                            $sql = "SELECT * FROM kelurahan";
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            foreach ($result as $kel) {
                                                echo "<option value='$kel[id]'>$kel[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-success" type="submit">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('../include/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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
                    <a class="btn btn-primary" href="../../index.php">Log out</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>