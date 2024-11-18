<?php
    include 'koneksi.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)) {
        header('location:index.php');
    };
    if (isset($_GET['logout'])) {
        unset($user_id);
        session_destroy();
        header('location:index.php');
    }

    $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
    $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

    $query = "SELECT * FROM farmasi";
        if ($start_date && $end_date) {
            $query .= " WHERE tanggal BETWEEN '$start_date' AND '$end_date'";
        }
        $tampil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem Informasi-UTD RSUD Ulin</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="assets/images/utdrs.jpg"/>

    <!-- *************
      ************ CSS Files *************
    ************* -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/main.min.css" />

    <!-- *************
      ************ Vendor Css Files *************
    ************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/css/OverlayScrollbars.min.css" />

    
  </head>

  <body>

    <!-- Page wrapper start -->
    <div class="page-wrapper">

      <!-- Main container start -->
      <div class="main-container">

        <!-- Sidebar wrapper start -->
        <nav id="sidebar" class="sidebar-wrapper">

          <!-- App brand starts -->
          <div class="app-brand p-4">
            <a href="home.php">
              <span style="color: white; font-size: x-large; font-weight: 900;">UTD RSUD Ulin</span>
            </a>
          </div>
          <!-- App brand ends -->

          <!-- Sidebar profile actions starts -->
          <ul class="profile-actions d-lg-flex d-none">
            <li class="dropdown">
              <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-warning" data-bs-title="Settings">
                <i class="bi bi-gear-fill fs-4"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end shadow">
                  <a class="logout dropdown-item d-flex align-items-center" href="laporan_kegiatan.php?logout=<?php echo $user_id; ?>" style="padding-left: 100px; color: red;">
                    <i class="bi bi-power fs-4 me-2"></i>
                    Logout
                  </a>
              </div>
            </li>
            <li>
              <a href="profile.html" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-info" data-bs-title="Profile">
                <i class="bi bi-person-square fs-4"></i>
              </a>
            </li>
            <li>
              <a href="https://wa.me/+62895636284405" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-success" data-bs-title="WhatsApp">
                <i class="bi bi-whatsapp fs-4"></i>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/utd_rsulin" data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip-danger" data-bs-title="Instagram">
                <i class="bi bi-instagram fs-4"></i>
              </a>
            </li>
            <li>
              <a href="https://maps.app.goo.gl/r9CxiPx1ZUKK5JF88" data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip-success" data-bs-title="Maps">
                <i class="bi bi-geo-alt-fill fs-4"></i>
              </a>
            </li>
            <li>
              <a href="https://youtube.com/@rsudulinbanjarmasin7530?si=o5EXrNbx9aqeNPIN" data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip-danger" data-bs-title="Youtube">
                <i class="bi bi-youtube fs-4"></i>
              </a>
            </li>
          </ul>
          <!-- Sidebar profile actions ends -->

          <!-- Sidebar menu starts -->
          <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
              <li>
                <a href="home.php">
                  <i class="bi bi-grid-fill"></i>
                  <span class="menu-text">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="billing.php">
                  <i class="bi bi-receipt"></i>
                  <span class="menu-text">Billing</span>
                </a>
              </li>
              <li>
                <a href="lembar-kerja.php">
                  <i class="bi bi-stickies-fill"></i>
                  <span class="menu-text">Lembar Kerja</span>
                </a>
              </li>
              <li>
                <a href="laporan_kegiatan.php">
                  <i class="bi bi-stickies-fill"></i>
                  <span class="menu-text">Laporan Kegiatan</span>
                </a>
              </li>
              <li class="active current-page">
                <a href="#">
                  <i class="bi bi-bag-fill"></i>
                  <span class="menu-text">BAKHP & Reagensia</span>
                </a>
              </li>
              <li>
                <a href="pendonor.php">
                  <i class="bi bi-file-earmark-person-fill"></i>
                  <span class="menu-text">Daftar Pendonor</span>
                </a>
              </li>
              <li>
                <a href="#!">
                  <i class="bi bi-ui-checks-grid"></i>
                  <span class="menu-text">Soon</span>
                </a>
              </li>
              <li>
                <a href="#!">
                  <i class="bi bi-window-sidebar"></i>
                  <span class="menu-text">Soon</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- Sidebar menu ends -->

        </nav>
        <!-- Sidebar wrapper end -->

        <!-- App container starts -->
        <div class="app-container">

          <!-- App header starts -->
          <div class="app-header d-flex align-items-center p-3">

            <!-- Toggle buttons start -->
            <div class="d-flex">
              <button class="btn btn-outline-primary me-2 toggle-sidebar" id="toggle-sidebar">
                <i class="bi bi-menu-button-wide-fill fs-5"></i>
              </button>
              <button class="btn btn-outline-primary me-2 pin-sidebar" id="pin-sidebar">
                <i class="bi bi-menu-button-wide-fill fs-5"></i>
              </button>
            </div>
            <!-- Toggle buttons end -->


            <!-- App brand sm start -->
            <div class="app-brand-sm d-md-none d-sm-block">
              <a href="home.php">
                <img src="assets/images/utdrs.jpg" class="logo" alt="Bootstrap Gallery" style="border-radius: 50%;">
              </a>
            </div>
            <!-- App brand sm end -->

            <!-- App header actions start -->
            <div class="header-actions">
              <div class="search-container d-lg-block d-none me-2" style="display: flex; align-items: center;">
                <!-- Search container start -->
                <form action="" method="GET" class="d-flex align-items-center">
                  <input id="search" name="search" type="text" class="form-control me-2" style="width: 200px;" placeholder="Search" />
                  <button type="submit" class="btn btn-primary" style="border: none; width: 40px; height: 35px; cursor: pointer;">
                    <i class="bi bi-search" style="color: white;"></i>
                  </button>
                </form>
                <!-- Search container end -->
              </div>
              <div class="dropdown ms-3">
                <a href="settings.html" data-bs-toggle="tooltip" data-bs-placement="left"
                  data-bs-custom-class="custom-tooltip-warning" data-bs-title="Settings"
                  class="d-flex p-2 border rounded-2">
                  <i class="bi bi-gear fs-4 lh-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                  <a class="dropdown-item d-flex align-items-center" href="profile.html"><i
                      class="bi bi-person fs-4 me-2"></i>Profile</a>
                  <a class="dropdown-item d-flex align-items-center" style="color: red;" href="laporan_kegiatan.php?logout=<?php echo $user_id; ?>"><i
                      class="bi bi-power fs-4 me-2"></i>Logout</a>
                </div>
              </div>
            </div>
            <!-- App header actions end -->

          </div>
          <!-- App header ends -->

          <!-- App hero header starts -->
          <div class="app-hero-header d-flex align-items-start">

            <!-- Breadcrumb start -->
            <ol class="breadcrumb d-none d-lg-flex align-items-center">
              <li class="breadcrumb-item">
                <i class="bi bi-house-door-fill"></i>
                <a href="home.php">Home</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">BAKHP dan Reagensia</li>
            </ol>
            <!-- Breadcrumb end -->

            <!-- Sales stats start -->
            <!-- Sales stats end -->

          </div>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <!-- Row ends -->

            <!-- Row starts -->
            <!-- Row end -->

            <!-- Row start -->
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">BAKHP DAN REAGENSIA</h5>
                  </div>
                  
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-dark table-striped-columns align-middle">
                        <thead class="table-group-divider">
                        <button type="button" class="btn btn-outline-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#FormCreate">
                            <i class="bi bi-plus-square-fill fs-5"></i>
                            Add New
                        </button>
                        <a href="cetak/pdf-farmasi.php?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-outline-success float-end" style="margin-right: 4px;">
                          <i class="bi bi-printer-fill fs-5"></i>
                          Print
                        </a>
                        <div class='col-9 d-flex gap-2'>
                            <form method="GET" action="">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Start Date</span>
                                    <input type="date" class="form-control " name="start_date" value="<?= $start_date ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroup-sizing-default">End Date</span>
                                    <input type="date" class="form-control" name="end_date" value="<?= $end_date ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                                <button type="submit" name="bfilter" class="btn btn-outline-primary" style="height: 38px;">
                                  <i class="bi bi-search fs-5"></i>
                                </button>
                            </form>
                        </div>
                          <tr style="text-align: center;">
                            <th>NO</th>
                            <th>Tanggal</th>
                            <th>Principal</th>
                            <th>Nama Barang</th>
                            <th>Merk</th>
                            <th>Satuan</th>
                            <th>Stok Awal</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                            <th>Stok Akhir</th>
                            <th>Permintaan</th>
                            <th>Action</th>
                          </tr>
                          <tr style="text-align: center;">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="4">Stok Opname</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <?php
                        // Inisialisasi variabel
                        $no = 1;
                        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
                        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
                        $search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

                        $query = "SELECT * FROM farmasi WHERE 1=1"; // 1=1 untuk memudahkan penambahan kondisi

                        // Menambahkan kondisi tanggal jika ada
                        if ($start_date && $end_date) {
                            $query .= " AND tanggal BETWEEN '$start_date' AND '$end_date'";
                        }

                        // Menambahkan kondisi pencarian jika ada
                        if ($search) {
                          $query .= " AND (tanggal LIKE '%$search%' OR principal LIKE '%$search%' OR nama_barang LIKE '%$search%' OR merk LIKE '%$search%' OR satuan LIKE '%$search%' OR stok_awal LIKE '%$search%' OR masuk LIKE '%$search%' OR keluar LIKE '%$search%' OR stok_akhir LIKE '%$search%' OR permintaan LIKE '%$search%')"; // Mencari berdasarkan beberapa kolom
                        }
                      
                        // Menambahkan perintah ORDER BY
                        $query .= " ORDER BY id_farmasi DESC";

                        $tampil = mysqli_query($koneksi, $query);
                        while ($data = mysqli_fetch_array($tampil)):
                        ?>

                        <tbody class="table-group-divider">
                          <tr style="text-align: center;">
                            <td><?= $no++ ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['principal'] ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= $data['merk'] ?></td>
                            <td><?= $data['satuan'] ?></td>
                            <td><?= $data['stok_awal'] ?></td>
                            <td><?= $data['masuk'] ?></td>
                            <td><?= $data['keluar'] ?></td>
                            <td><?= $data['stok_akhir'] ?></td>
                            <td><?= $data['permintaan'] ?></td>
                            <td>
                                <a href="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FormEdit<?= $no ?>"><i class="bi bi-pencil-fill" style="font-size: 12px;"></i></a>
                                <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#FormDelete<?= $no ?>"><i class="bi bi-trash-fill" style="font-size: 12px;"></i></a>
                            </td>
                          </tr>
                        </tbody>

                        <div class="modal fade" id="FormEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme= "dark" style="color: white;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-tittle fs-5" id="staticBackdropLabel">Edit Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="action/crud-farmasi.php">
                                        <input type="hidden" name="id_farmasi" value="<?= $data['id_farmasi']?>">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" name="ttgl" value="<?= $data['tanggal'] ?>" placeholder="Masukkan Tanggal" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Principal</label>
                                                <input type="text" class="form-control" name="tprincipal" value="<?= $data['principal'] ?>" placeholder="Masukkan Principal" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" name="tnama" value="<?= $data['nama_barang'] ?>" placeholder="Masukkan Nama Barang" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Merk</label>
                                                <input type="text" class="form-control" name="tmerk" value="<?= $data['merk'] ?>" placeholder="Masukkan Merk" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Satuan</label>
                                                <input type="text" class="form-control" name="tsatuan" value="<?= $data['satuan'] ?>" placeholder="Masukkan Satuan" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Stok Awal</label>
                                                <input type="text" class="form-control" name="tawal" value="<?= $data['stok_awal'] ?>" placeholder="Masukkan Stok Awal" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Masuk</label>
                                                <input type="text" class="form-control" name="tmasuk" value="<?= $data['masuk'] ?>" placeholder="Masukkan Jumlah Masuk" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Keluar</label>
                                                <input type="text" class="form-control" name="tkeluar" value="<?= $data['keluar'] ?>" placeholder="Masukkan Jumlah Keluar" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Stok Akhir</label>
                                                <input type="text" class="form-control" name="takhir" value="<?= $data['stok_akhir'] ?>" placeholder="Masukkan Stok Akhir" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Permintaan</label>
                                                <input type="text" class="form-control" name="tpermintaan" value="<?= $data['permintaan'] ?>" placeholder="Masukkan Permintaan" style="color: white;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" ><i class="bi bi-x-square-fill"></i></button>
                                                <button type="submit" class="btn btn-outline-success" name="bedit"><i class="bi bi-check-square-fill"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                        <div class="modal fade" id="FormDelete<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme= "dark" style="color: white;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="action/crud-farmasi.php">
                                        <input type="hidden" name="id_farmasi" value="<?= $data['id_farmasi']?>">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ?
                                                <br>
                                                <span class="text-danger"><?= $data['tanggal'] ?> - <?= $data['nama_barang'] ?> </span>
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Batal</button>
                                            <button type="submit" class="btn btn-primary" name="bdelete">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  

                        <?php endwhile; ?>
                      </table>

                      <div class="modal fade" id="FormCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme= "dark" style="color: white;">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header" >
                                      <h1 class="modal-tittle fs-5" id="staticBackdropLabel">Add New Data</h1>
                                      <button type="button" class=" btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form method="POST" action="action/crud-farmasi.php">
                                      <div class="modal-body">
                                          <div class="mb-3">
                                              <label class="form-label">Tanggal</label>
                                              <input type="date" class="form-control" name="ttgl" placeholder="Masukkan Tanggal" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Principal</label>
                                              <input type="text" class="form-control" name="tprincipal" placeholder="Masukkan Principal" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Nama Barang</label>
                                              <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Barang" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Merk</label>
                                              <input type="text" class="form-control" name="tmerk" placeholder="Masukkan Merk" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Satuan</label>
                                              <input type="text" class="form-control" name="tsatuan" placeholder="Masukkan Satuan" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Stok Awal</label>
                                              <input type="text" class="form-control" name="tawal" placeholder="Masukkan Stok Awal" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Masuk</label>
                                              <input type="text" class="form-control" name="tmasuk" placeholder="Masukkan Jumlah Masuk" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Keluar</label>
                                              <input type="text" class="form-control" name="tkeluar" placeholder="Masukkan Jumlah Keluar" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Stok Akhir</label>
                                              <input type="text" class="form-control" name="takhir" placeholder="Masukkan Stok Akhir" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Permintaan</label>
                                              <input type="text" class="form-control" name="tpermintaan" placeholder="Masukkan Permintaan" style="color: white;">
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" ><i class="bi bi-x-square-fill"></i></button>
                                              <button type="submit" class="btn btn-outline-success" name="bcreate"><i class="bi bi-check-square-fill"></i></button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Row end -->

            <!-- Row start -->
            <!-- Row end -->

          </div>
          <!-- App body ends -->

          <!-- App footer start -->
          <div class="app-footer">
            <span>Muhammad Bayu 2024</span>
          </div>
          <!-- App footer end -->

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container end -->

    </div>
    <!-- Page wrapper end -->

    <!-- *************
      ************ JavaScript Files *************
    ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- *************
      ************ Vendor Js Files *************
    ************* -->

    <!-- Overlay Scroll JS -->
    <script src="assets/js/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/js/custom-scrollbar.js"></script>

    <!-- Apex Charts -->
    <script src="assets/js/apexcharts.min.js"></script>
    <script src="assets/js/activity-report.js"></script>
    <script src="assets/js/deals.js"></script>
    <script src="assets/js/sparkline.js"></script>
    <script src="assets/js/sparkline2.js"></script>

    <!-- Rating -->
    <script src="assets/js/raty.js"></script>
    <script src="assets/js/raty-custom.js"></script>

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>
  </body>

</html>

