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

    $query = "SELECT * FROM laporan_kegiatan";
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
    <link rel="shortcut icon" href="assets/images/utdrs.jpg" />

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
            <a href="index.html">
              <span style="color: white; font-size: x-large; font-weight: 900;">UTD RSUD Ulin</span>
            </a>
          </div>
          <!-- App brand ends -->

          <!-- Sidebar profile actions starts -->
          <ul class="profile-actions d-lg-flex d-none">
            <li class="dropdown">
              <a href="settings.html" data-bs-toggle="tooltip" data-bs-placement="top"
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
              <li class="active current-page">
                <a href="#">
                  <i class="bi bi-stickies-fill"></i>
                  <span class="menu-text">Laporan Kegiatan</span>
                </a>
              </li>
              <li>
                <a href="farmasi.php">
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
              <li class="breadcrumb-item" aria-current="page">Laporan Kegiatan</li>
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
                    <h5 class="card-title">LAPORAN KEGIATAN</h5>
                  </div>
                  
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-dark table-striped-columns align-middle">
                        <thead class="table-group-divider">
                        <button type="button" class="btn btn-outline-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#FormCreate">
                            <i class="bi bi-plus-square-fill fs-5"></i>
                            Add New
                        </button>
                        <a href="cetak/pdf-laporan-kegiatan.php?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="btn btn-outline-success float-end" style="margin-right: 4px;">
                          <i class="bi bi-file-earmark-pdf-fill fs-5"></i>PDF
                        </a>
                        <a href="cetak/pdf-laporan-kegiatan.php . $start_date . '&end_date=' . $end_date" class="btn btn-outline-success float-end" style="margin-right: 4px;">
                            <i class="bi bi-file-earmark-excel-fill fs-5"></i>
                            Excel
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
                            <th>Jumlah Pasien</th>
                            <th colspan="2">Jenis Kelamin</th>
                            <th colspan="2">Jenis Darah</th>
                            <th colspan="4">Crossmatch</th>
                            <th>Jumlah Crossmatch</th>
                            <th>Phlebotomy</th>
                            <th>Apheresis</th>
                            <th>Coomb's Tes</th>
                            <th>Golongan Darah</th>
                            <th>Total Pemeriksaan</th>
                            <th>Action</th>
                          </tr>
                          <tr style="text-align: center;">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>L</th>
                            <th>P</th>
                            <th>WB</th>
                            <th>PRC</th>
                            <th>A</th>
                            <th>B</th>
                            <th>AB</th>
                            <th>O</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <?php
                          $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
                          $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
                          $search = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';
                          
                          // Query to get the total counts with the same filters
                          $query_total = "SELECT 
                              SUM(jumlah_pasien) AS total_pasien,
                              SUM(laki) AS total_laki,
                              SUM(wanita) AS total_wanita,
                              SUM(wb) AS total_wb,
                              SUM(prc) AS total_prc,
                              SUM(a) AS total_a,
                              SUM(b) AS total_b,
                              SUM(ab) AS total_ab,
                              SUM(o) AS total_o,
                              SUM(jumlah_crossmatch) AS total_jmlh_crossmatch,
                              SUM(phlebotomy) AS total_phlebotomy,
                              SUM(apheresis) AS total_apheresis,
                              SUM(coomb_tes) AS total_coomb_tes,
                              SUM(gol_darah) AS total_gol_darah,
                              SUM(jumlah_crossmatch + phlebotomy + apheresis + coomb_tes + gol_darah) AS grand_total
                              FROM laporan_kegiatan";
                          
                          // Apply date filter
                          if ($start_date && $end_date) {
                              $query_total .= " WHERE tanggal BETWEEN '$start_date' AND '$end_date'";
                          }
                          
                          // Apply search filter
                          if ($search) {
                              $query_total .= ($start_date && $end_date) ? " AND" : " WHERE";
                              $query_total .= " (tanggal LIKE '%$search%' OR jumlah_pasien LIKE '%$search%' OR 
                                  laki LIKE '%$search%' OR wanita LIKE '%$search%' OR wb LIKE '%$search%' OR
                                  prc LIKE '%$search%' OR a LIKE '%$search%' OR b LIKE '%$search%' OR ab LIKE '%$search%' OR 
                                  o LIKE '%$search%' OR jumlah_crossmatch LIKE '%$search%' OR phlebotomy LIKE '%$search%' OR
                                  apheresis LIKE '%$search%' OR coomb_tes LIKE '%$search%' OR gol_darah LIKE '%$search%' OR 
                                  (jumlah_crossmatch + phlebotomy + apheresis + coomb_tes + gol_darah) LIKE '%$search%')";
                          }
                          
                          $result_total = mysqli_query($koneksi, $query_total);
                          
                          if ($result_total) {
                              $totals = mysqli_fetch_assoc($result_total);
                          } else {
                              echo "Query Error: " . mysqli_error($koneksi);
                          }
                        ?>
                        <tfoot style="text-align: center;">
                          <tr>
                              <th colspan="2">Total</th>
                              <th><?= $totals['total_pasien'] ?></th>
                              <th><?= $totals['total_laki'] ?></th>
                              <th><?= $totals['total_wanita'] ?></th>
                              <th><?= $totals['total_wb'] ?></th>
                              <th><?= $totals['total_prc'] ?></th>
                              <th><?= $totals['total_a'] ?></th>
                              <th><?= $totals['total_b'] ?></th>
                              <th><?= $totals['total_ab'] ?></th>
                              <th><?= $totals['total_o'] ?></th>
                              <th><?= $totals['total_jmlh_crossmatch'] ?></th>
                              <th><?= $totals['total_phlebotomy'] ?></th>
                              <th><?= $totals['total_apheresis'] ?></th>
                              <th><?= $totals['total_coomb_tes'] ?></th>
                              <th><?= $totals['total_gol_darah'] ?></th>
                              <th><?= $totals['grand_total'] ?></th>
                              <th>Total</th>
                          </tr>
                        </tfoot>

                        <?php
                          $no = 1;
                          $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
                          $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

                          $query = "SELECT *, 
                              (jumlah_crossmatch + phlebotomy + apheresis + coomb_tes + gol_darah) AS total_pemeriksaan
                              FROM laporan_kegiatan";

                          if ($start_date && $end_date) {
                              // Filter tanggal ketika tanggal awal dan akhir ada
                              $query .= " WHERE tanggal BETWEEN '$start_date' AND '$end_date'";
                          }

                          if (isset($_GET['search'])) {
                              $search = mysqli_real_escape_string($koneksi, $_GET['search']);
                              // Filter pencarian berdasarkan input search
                              $query .= ($start_date && $end_date) ? " AND" : " WHERE";
                              $query .= " (tanggal LIKE '%$search%' OR jumlah_pasien LIKE '%$search%' OR 
                                  laki LIKE '%$search%' OR wanita LIKE '%$search%' OR wb LIKE '%$search%' OR
                                  prc LIKE '%$search%' OR a LIKE '%$search%' OR b LIKE '%$search%' OR ab LIKE '%$search%' OR 
                                  o LIKE '%$search%' OR jumlah_crossmatch LIKE '%$search%' OR phlebotomy LIKE '%$search%' OR
                                  apheresis LIKE '%$search%' OR coomb_tes LIKE '%$search%' OR gol_darah LIKE '%$search%' OR 
                                  total_pemeriksaan LIKE '%$search%')";
                          }

                          $query .= " ORDER BY id_laporan_kegiatan DESC";
                          $tampil = mysqli_query($koneksi, $query);

                          while($data = mysqli_fetch_array($tampil)) :
                        ?>

                        <tbody class="table-group-divider">
                          <tr style="text-align: center;">
                            <td><?= $no++ ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['jumlah_pasien'] ?></td>
                            <td><?= $data['laki'] ?></td>
                            <td><?= $data['wanita'] ?></td>
                            <td><?= $data['wb'] ?></td>
                            <td><?= $data['prc'] ?></td>
                            <td><?= $data['a'] ?></td>
                            <td><?= $data['b'] ?></td>
                            <td><?= $data['ab'] ?></td>
                            <td><?= $data['o'] ?></td>
                            <td><?= $data['jumlah_crossmatch'] ?></td>
                            <td><?= $data['phlebotomy'] ?></td>
                            <td><?= $data['apheresis'] ?></td>
                            <td><?= $data['coomb_tes'] ?></td>
                            <td><?= $data['gol_darah'] ?></td>
                            <td><?= $data['total_pemeriksaan'] ?></td>
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
                                    <form method="POST" action="action/crud-laporan-kegiatan.php">
                                        <input type="hidden" name="id_laporan_kegiatan" value="<?= $data['id_laporan_kegiatan']?>">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" name="ttgl" value="<?= $data['tanggal'] ?>" placeholder="Masukkan Tanggal" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Pasien</label>
                                                <input type="text" class="form-control" name="tpasien" value="<?= $data['jumlah_pasien'] ?>" placeholder="Masukkan Jumlah Pasien" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Laki - Laki</label>
                                                <input type="text" class="form-control" name="tlaki" value="<?= $data['laki'] ?>" placeholder="Masukkan Jumlah Laki - Laki" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Perempuan</label>
                                                <input type="text" class="form-control" name="twanita" value="<?= $data['wanita'] ?>" placeholder="Masukkan Jumlah Perempuan" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Darah WB</label>
                                                <input type="text" class="form-control" name="twb" value="<?= $data['wb'] ?>" placeholder="Masukkan Jumlah Darah WB" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Darah PRC</label>
                                                <input type="text" class="form-control" name="tprc" value="<?= $data['prc'] ?>" placeholder="Masukkan Jumlah Darah PRC" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Crossmatch A</label>
                                                <input type="text" class="form-control" name="ta" value="<?= $data['a'] ?>" placeholder="Masukkan Jumlah Crossmatch A" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Crossmatch B</label>
                                                <input type="text" class="form-control" name="tb" value="<?= $data['b'] ?>" placeholder="Masukkan Jumlah Crossmatch B" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Crossmatch AB</label>
                                                <input type="text" class="form-control" name="tab" value="<?= $data['ab'] ?>" placeholder="Masukkan Jumlah Crossmatch AB" style="color: white;" >
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Crossmatch O</label>
                                                <input type="text" class="form-control" name="to" value="<?= $data['o'] ?>" placeholder="Masukkan Jumlah Crossmatch O" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Crossmatch</label>
                                                <input type="text" class="form-control" name="tcross" value="<?= $data['jumlah_crossmatch'] ?>" placeholder="Masukkan Jumlah Crossmatch" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Phlebotomy</label>
                                                <input type="text" class="form-control" name="tphlebotomy" value="<?= $data['phlebotomy'] ?>" placeholder="Masukkan Jumlah Phlebotomy" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Apheresis</label>
                                                <input type="text" class="form-control" name="tapheresis" value="<?= $data['apheresis'] ?>" placeholder="Masukkan Jumlah Apheresis" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Coomb's Tes</label>
                                                <input type="text" class="form-control" name="ttes" value="<?= $data['coomb_tes'] ?>" placeholder="Masukkan Jumlah Coomb's Tes" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jumlah Golongan Darah</label>
                                                <input type="text" class="form-control" name="tgol" value="<?= $data['gol_darah'] ?>" placeholder="Masukkan Jumlah Golongan Darah" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Total Pemeriksaan</label>
                                                <input type="text" class="form-control" name="ttotalp" value="<?= $data['total_pemeriksaan'] ?>" placeholder="Masukkan Total Pemeriksaan" style="color: white;">
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
                                    <form method="POST" action="action/crud-laporan-kegiatan.php">
                                        <input type="hidden" name="id_laporan_kegiatan" value="<?= $data['id_laporan_kegiatan']?>">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ?
                                                <br>
                                                <span class="text-danger"><?= $data['tanggal'] ?> - Jumlah Pasien <?= $data['jumlah_pasien'] ?> </span>
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
                                  <div class="modal-header">
                                      <h1 class="modal-tittle fs-5" id="staticBackdropLabel">Add New Data</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form method="POST" action="action/crud-laporan-kegiatan.php">
                                      <div class="modal-body">
                                          <div class="mb-3">
                                              <label class="form-label">Tanggal</label>
                                              <input type="date" class="form-control" name="ttgl" placeholder="Masukkan Tanggal" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Pasien</label>
                                              <input type="text" class="form-control" name="tpasien" placeholder="Masukkan Jumlah Pasien" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Laki - Laki</label>
                                              <input type="text" class="form-control" name="tlaki" placeholder="Masukkan Jumlah Laki - Laki" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Perempuan</label>
                                              <input type="text" class="form-control" name="twanita" placeholder="Masukkan Jumlah Perempuan" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Darah WB</label>
                                              <input type="text" class="form-control" name="twb" placeholder="Masukkan Jumlah Darah WB" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Darah PRC</label>
                                              <input type="text" class="form-control" name="tprc" placeholder="Masukkan Jumlah Darah PRC" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Crossmatch A</label>
                                              <input type="text" class="form-control" name="ta" placeholder="Masukkan Jumlah Crossmatch A" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Crossmatch B</label>
                                              <input type="text" class="form-control" name="tb" placeholder="Masukkan Jumlah Crossmatch B" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Crossmatch AB</label>
                                              <input type="text" class="form-control" name="tab" placeholder="Masukkan Jumlah Crossmatch AB" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Crossmatch O</label>
                                              <input type="text" class="form-control" name="to" placeholder="Masukkan Jumlah Crossmatch O" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Crossmatch</label>
                                              <input type="text" class="form-control" name="tcross" placeholder="Masukkan Jumlah Crossmatch" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Phlebotomy</label>
                                              <input type="text" class="form-control" name="tphlebotomy" placeholder="Masukkan Jumlah Phlebotomy" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Apheresis</label>
                                              <input type="text" class="form-control" name="tapheresis" placeholder="Masukkan Jumlah Apheresis" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Coomb's Tes</label>
                                              <input type="text" class="form-control" name="ttes" placeholder="Masukkan Jumlah Coomb's Tes" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Jumlah Golongan Darah</label>
                                              <input type="text" class="form-control" name="tgol" placeholder="Masukkan Jumlah Golongan Darah" style="color: white;">
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

