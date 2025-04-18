<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nhat An Steel</title>
    <link data-n-head="ssr" rel="icon" type="image/x-icon" href="./assets/images/icons/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- LightGallery CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css">

    <link rel="stylesheet" href="assets/scss/fe-styles.css">

</head>
<!-- Top Bar -->
<div class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-6 d-flex align-items-center">
        <a class="logo" href="#"><img src="assets/images/icons/i-building.svg" alt="icon building"> Công ty TNHH Xây dựng Nhật An</a>
      </div>
      <div class="col-6 d-flex justify-content-end align-items-center">
        <div class="social-icons">
          <a href="#"><img src="assets/images/icons/i-facebook.svg" alt="icon facebook" width="20"></a>
          <a href="#"><img src="assets/images/icons/i-email.svg" alt="icon email" width="20"></a>
          <a class="active" href="#">VIE</a>
          <a href="#">ENG</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="assets/images/icons/logo.svg" alt="Nhat An Steel">
    </a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item active"><a class="nav-link" href="index.php">Trang chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="gioithieu.php">Giới thiệu</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="sanpham-dichvu.php" role="button" data-bs-toggle="dropdown">Sản phẩm & Dịch vụ</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Sản phẩm 1</a></li>
            <li><a class="dropdown-item" href="#">Dịch vụ 1</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="duan.php" role="button" data-bs-toggle="dropdown">Dự án</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Dự án 1</a></li>
            <li><a class="dropdown-item" href="#">Dự án 2</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="tintuc.php">Tin tức</a></li>
        <li class="nav-item"><a class="nav-link" href="lienhe.php">Liên hệ</a></li>
        <li class="nav-item"><a class="nav-link link-brochure ripple-btn" href="#" data-tooltip="Tải brochure">Brochure <img src="assets/images/icons/i-download.svg" alt="icon download"> </a></li>
        <li class="nav-item"><a class="nav-link nav-link-search" href="#"><i class="i-search"></i></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="navbar-search-overlay">
  <div class="search-container">
    <input type="text" class="form-control" placeholder="Tìm kiếm...">
    <button class="btn btn-close-search" aria-label="Close"><i class="bi bi-x-lg"></i></button>
  </div>
</div>