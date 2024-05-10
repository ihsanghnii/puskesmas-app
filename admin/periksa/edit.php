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
                            <h3> Edit Periksa Pasien</h3>
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
                                <form action="" method="post">
                                    <?php
                                    if (isset($_POST['berat'])) {
                                        $tanggal = $_POST['tanggal'];
                                        $berat = $_POST['berat'];
                                        $tinggi = $_POST['tinggi'];
                                        $tensi = $_POST['tensi'];
                                        $keterangan = $_POST['keterangan'];
                                        $pasien_id = $_POST['pasien_id'];
                                        $paramedik_id = $_POST['paramedik_id'];

                                        $sql = "UPDATE periksa SET tanggal = :tanggal, berat = :berat, tinggi = :tinggi, tensi = :tensi, keterangan = :keterangan, pasien_id = :pasien_id,  paramedik_id = :paramedik_id WHERE id = :id";
                                        $stmt = $dbh->prepare($sql);
                                        $stmt->bindParam(':tanggal', $tanggal);
                                        $stmt->bindParam(':berat', $berat);
                                        $stmt->bindParam(':tinggi', $tinggi);
                                        $stmt->bindParam(':tensi', $tensi);
                                        $stmt->bindParam(':keterangan', $keterangan);
                                        $stmt->bindParam(':pasien_id', $pasien_id);
                                        $stmt->bindParam(':paramedik_id', $paramedik_id);
                                        $stmt->bindParam(':id', $_POST['id']);
                                        $stmt->execute();
                                        echo '<meta http-equiv="refresh" content="0; url=index.php"><script>alert("Sukses")</script>';
                                    }
                                    if (isset($_GET['id'])) {
                                        $sql = "SELECT * FROM periksa WHERE id = :id";
                                        $stmt = $dbh->prepare($sql);
                                        $stmt->bindParam(':id', $_GET['id']);
                                        $stmt->execute();
                                        $data = $stmt->fetch();
                                    }
                                    ?>

                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Periksa Pasien</label>
                                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="berat">Berat Badan</label>
                                        <input type="number" class="form-control" id="berat" name="berat" value="<?= $data['berat'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tinggi">Tinggi Badan</label>
                                        <input type="number" class="form-control" id="tinggi" name="tinggi" value="<?= $data['tinggi'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tensi">Tensi Darah (.. / ..)</label>
                                        <input type="text" class="form-control" id="tensi" name="tensi" value="<?= $data['tensi'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data['keterangan'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="pasien_id">Pasien</label>
                                        <select name="pasien_id" class="form-control" id="pasien_id">
                                            <option value="">Pilih Pasien</option>
                                            <?php
                                            $sql = "SELECT * FROM pasien";
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            foreach ($result as $kel) {
                                                $selected = $kel['id'] == $data['pasien_id'] ? "selected" : "";
                                                echo "<option value='$kel[id]' $selected>$kel[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="paramedik_id">Dokter</label>
                                        <select name="paramedik_id" class="form-control" id="paramedik_id">
                                            <option value="">Pilih Pasien</option>
                                            <?php
                                            $sql = "SELECT * FROM paramedik";
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            foreach ($result as $kel) {
                                                $selected = $kel['id'] == $data['paramedik_id'] ? "selected" : "";
                                                echo "<option value='$kel[id]' $selected>$kel[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
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