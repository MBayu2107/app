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
                  <a class="dropdown-item d-flex align-items-center" href="home.php?logout=<?php echo $user_id; ?>" style="padding-left: 100px; color: red;">
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
              <li class="active current-page">
                <a href="#">
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
                  <a class="dropdown-item d-flex align-items-center" style="color: red;" href="home.php?logout=<?php echo $user_id; ?>"><i
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
              <li class="breadcrumb-item" aria-current="page">Dashboard</li>
            </ol>
            <!-- Breadcrumb end -->

            <!-- Sales stats start -->
            <!-- Sales stats end -->

          </div>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <div class="row">
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-pie-chart fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Visitors</h5>
                      <h1 class="m-0">675</h1>
                    </div>
                    <span class="badge bg-info position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-up-fill"></i>18%</span>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-sticky fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Sales</h5>
                      <h1 class="m-0">450</h1>
                    </div>
                    <span class="badge bg-info position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-up-fill"></i>15%</span>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-emoji-smile fs-1 lh-1 text-primary"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Income</h5>
                      <h1 class="m-0">75k</h1>
                    </div>
                    <span class="badge bg-info position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-up-fill"></i>11%</span>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-body d-flex align-items-center p-0">
                    <div class="p-4">
                      <i class="bi bi-star fs-1 lh-1 text-danger"></i>
                    </div>
                    <div class="py-4">
                      <h5 class="text-secondary fw-light m-0">Reviews</h5>
                      <h1 class="m-0 text-danger">98%</h1>
                    </div>
                    <span class="badge bg-danger position-absolute top-0 end-0 m-3 bg-opacity-50"><i
                        class="bi bi-caret-down-fill"></i>9%</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row ends -->

            <!-- Row starts -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Activity Report</h5>
                  </div>
                  <div class="card-body p-4">
                    <div id="activityReport"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
              <div class="col-sm-3 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Sales</h5>
                  </div>
                  <div class="card-body p-4">
                    <div id="revenue"></div>
                    <div class="text-center my-4">
                      <h1>
                        689
                        <i class="bi bi-arrow-up-right-circle-fill text-success"></i>
                      </h1>
                      <p class="fw-light m-0">18% higher than last month</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Revenue</h5>
                  </div>
                  <div class="card-body p-4">
                    <div id="revenue2"></div>
                    <div class="text-center my-4">
                      <h1>
                        992
                        <i class="bi bi-arrow-up-right-circle-fill text-success"></i>
                      </h1>
                      <p class="fw-light m-0">21% higher than last month</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Payments</h5>
                  </div>
                  <div class="card-body p-4">
                    <div id="revenue3"></div>
                    <div class="text-center my-4">
                      <h1>
                        864
                        <i class="bi bi-arrow-up-right-circle-fill text-success"></i>
                      </h1>
                      <p class="fw-light m-0">16% higher than last month</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-3 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Income</h5>
                  </div>
                  <div class="card-body p-4">
                    <div id="revenue4"></div>
                    <div class="text-center my-4">
                      <h1>
                        598
                        <i class="bi bi-arrow-down-right-circle-fill text-danger"></i>
                      </h1>
                      <p class="fw-light m-0">24% higher than last month</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Recent Buyers</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped align-middle">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Link</th>
                            <th>Customer</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Popularity</th>
                            <th>Views</th>
                            <th>Engagement</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <img src="assets/images/mobiles/mob1.jpg" class="img-5x" alt="Admin" />
                                <div class="d-flex flex-column ms-3">
                                  <p class="m-0">Apple iPhone 12</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">#L10010021</a>
                            </td>
                            <td>Rickey Singleton</td>
                            <td>
                              <span class="badge bg-danger">Mobiles</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">$250.00</span>
                            </td>
                            <td>
                              <div class="rate2 rating-stars"></div>
                            </td>
                            <td>
                              <div id="sparkline1"></div>
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                                Higher than last week
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <img src="assets/images/mobiles/mob2.jpg" class="img-5x" alt="User" />
                                <div class="d-flex flex-column ms-3">
                                  <p class="m-0">Apple iPhone 13</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">#L10010065</a>
                            </td>
                            <td>Warren Alvarez</td>
                            <td>
                              <span class="badge bg-danger">Mobiles</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">$250.00</span>
                            </td>
                            <td>
                              <div class="rate5 rating-stars"></div>
                            </td>
                            <td>
                              <div id="sparkline2"></div>
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                                Higher than last week
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex flex-row align-items-center">
                                <img src="assets/images/mobiles/mob3.jpg" class="img-5x" alt="User" />
                                <div class="d-flex flex-column ms-3">
                                  <p class="m-0">Apple iPhone 12</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <a href="#" class="text-danger">#L10010098</a>
                            </td>
                            <td>Christian Franklin</td>
                            <td>
                              <span class="badge bg-danger">Mobiles</span>
                            </td>
                            <td>
                              <span class="badge bg-info me-2">$250.00</span>
                            </td>
                            <td>
                              <div class="rate4 rating-stars"></div>
                            </td>
                            <td>
                              <div id="sparkline3"></div>
                            </td>
                            <td>
                              <p class="m-0 text-danger">
                                Higher than last week
                              </p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
              <div class="col-xl-4 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Messages</h5>
                  </div>
                  <div class="card-body">
                    <div class="scroll350">
                      <div class="d-flex align-items-center mb-4">
                        <img src="assets/images/user4.svg" class="img-5x me-3 rounded-4" alt="Admin Dashboard" />
                        <div class="m-0">
                          <h6 class="fw-bold">Roseann Talmai</h6>
                          <p class="mb-2">
                            New contract web template design and web development
                            including testing and bug fixes.
                          </p>
                          <p class="small mb-2 text-secondary">3 day ago</p>
                        </div>
                        <span class="badge bg-success ms-auto">Completed</span>
                      </div>
                      <div class="d-flex align-items-center mb-4">
                        <img src="assets/images/user3.svg" class="img-5x me-3 rounded-4" alt="Admin Dashboard" />
                        <div class="m-0">
                          <h6 class="fw-bold">Clyde Theodora</h6>
                          <p class="mb-2">
                            Quarter budget analysis planned review and approved
                            by team.
                          </p>
                          <p class="small mb-2 text-secondary">2 days ago</p>
                        </div>
                        <span class="badge bg-info ms-auto">Completed</span>
                      </div>
                      <div class="d-flex align-items-center mb-4">
                        <img src="assets/images/user1.svg" class="img-5x me-3 rounded-4" alt="Admin Themes" />
                        <div class="m-0">
                          <h6 class="fw-bold">Ilyana Maes</h6>
                          <p class="mb-2">
                            Adobe creative cloud new plan approved for Alex's
                            team.
                          </p>
                          <p class="small mb-2 text-secondary">1 day ago</p>
                        </div>
                        <span class="badge bg-danger ms-auto">Completed</span>
                      </div>
                      <div class="d-flex align-items-center mb-4">
                        <img src="assets/images/user5.svg" class="img-5x me-3 rounded-4" alt="Admin Themes" />
                        <div class="m-0">
                          <h6 class="fw-bold">Zahra Brigitte</h6>
                          <p class="mb-2">
                            Create user journey and flows for Zia's product .
                          </p>
                          <p class="small mb-2 text-secondary">1 day ago</p>
                        </div>
                        <span class="badge bg-warning ms-auto">Completed</span>
                      </div>
                      <div class="d-flex align-items-center mb-4">
                        <img src="assets/images/user2.svg" class="img-5x me-3 rounded-4" alt="Admin Dashboard" />
                        <div class="m-0">
                          <h6 class="fw-bold">Mayrbek Kiana</h6>
                          <p class="mb-2">Report a bug to infinity support</p>
                          <p class="small mb-2 text-secondary">8 hours ago</p>
                        </div>
                        <span class="badge bg-info ms-auto">Completed</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Deals</h5>
                  </div>
                  <div class="card-body">
                    <div id="deals" class="mb-4"></div>
                    <!-- Row start -->
                    <div class="row">
                      <div class="col-sm-6 col-6">
                        <div class="text-center">
                          <h6>Claimed</h6>
                          <h1>3200</h1>
                        </div>
                      </div>
                      <div class="col-sm-6 col-6">
                        <div class="text-center">
                          <h6>Expired</h6>
                          <h1>1500</h1>
                        </div>
                      </div>
                    </div>
                    <!-- Row end -->
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-12 col-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Transactions</h5>
                  </div>
                  <div class="card-body">
                    <div class="scroll350">
                      <div class="d-grid gap-4 mt-4">
                        <div class="d-flex align-items-center">
                          <div class="p-3 bg-info bg-opacity-10 me-3 rounded-3">
                            <i class="bi bi-credit-card text-info fs-2 lh-1"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h5>Visa Card</h5>
                            <p class="m-0 text-secondary">Laptop Ordered</p>
                          </div>
                          <h3 class="m-0 ms-auto text-danger">$500.00</h3>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="p-3 bg-danger bg-opacity-10 me-3 rounded-3">
                            <i class="bi bi-paypal text-danger fs-2 lh-1"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h5>Paypal</h5>
                            <p class="m-0 text-secondary">Payment Received</p>
                          </div>
                          <h3 class="m-0 ms-auto text-success">$350.00</h3>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="p-3 bg-success bg-opacity-10 me-3 rounded-3">
                            <i class="bi bi-pin-map text-success fs-2 lh-1"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h5>Travel</h5>
                            <p class="m-0 text-secondary">Yosemite Trip</p>
                          </div>
                          <h3 class="m-0 ms-auto text-success">$700.00</h3>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="p-3 bg-warning bg-opacity-10 me-3 rounded-3">
                            <i class="bi bi-bag-check text-warning fs-2 lh-1"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h5>Shopping</h5>
                            <p class="m-0 text-secondary">Bills Paid</p>
                          </div>
                          <h3 class="m-0 ms-auto text-danger">$285.00</h3>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="p-3 bg-info bg-opacity-10 me-3 rounded-3">
                            <i class="bi bi-credit-card-2-front text-info fs-2"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h5>Credit Card</h5>
                            <p class="m-0 text-secondary">Online Shopping</p>
                          </div>
                          <h3 class="m-0 ms-auto text-success">$510.00</h3>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="p-3 bg-danger bg-opacity-10 me-3 rounded-3">
                            <i class="bi bi-boxes text-danger fs-2 lh-1"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h5>Bank</h5>
                            <p class="m-0 text-secondary">Investment</p>
                          </div>
                          <h3 class="m-0 ms-auto text-danger">$150.00</h3>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="p-3 bg-success bg-opacity-10 me-3 rounded-3">
                            <i class="bi bi-paypal text-success fs-2 lh-1"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h5>Paypal</h5>
                            <p class="m-0 text-secondary">Payment Received</p>
                          </div>
                          <h3 class="m-0 ms-auto text-success">$790.00</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Row end -->

          </div>
          <!-- App body ends -->

          <!-- App footer start -->
          <div class="app-footer">
            <span>Jassa 2024</span>
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

