<?php
require("config/connect.php");
//khởi tạo session ,tắt trình duyệt là out
session_start();

if (isset($_POST["login"])) {
    $us = $_POST["us"];
    $pa = $_POST["pa"];
    $sql = "select * from tbl_user where us like '$us' and pa like '$pa'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["username"] = $us;
        header("Location:admin/mana_danhmuc.php");
    } else {
        echo "sai us or pa";
    }
}

$error = '';

if (isset($_POST["signup"])) {
    $us = $_POST["us"];
    $pa = $_POST["pa"];
    $rpa = $_POST["rpa"];
    // Kiểm tra điều kiện
    if (strlen($pa) < 6) {
        $error = "Mật khẩu pải lớn hơn 6 kí tự";
    }
    // Kiểm tra 2 mật khẩu xem có trùng không
    elseif ($pa != $rpa) {
        $error = "Mật khẩu không trùng nhau";
    } else {
        //kiểm tra xem tài khoản tồn tại hay chưa
        $sql = "select * from tbl_user where us like '$us';";
        $sql_query = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($sql_query);
        if ($num == 0) {
            $sql_insert = "INSERT INTO tbl_user(`us`,`pa`)
            VALUES('$us','$pa')";
            $is_insert = mysqli_query($conn, $sql_insert);
            if ($is_insert) {
                header("Location:index.php");
            } else {
                $error = "Đăng ký thất bại";
            }
        } else {
            $error = "Tài khoản đã tồn tại";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>TKT STORE</title>
    <link rel="shortcut icon" href="images/logo4.png" />
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Main css -->
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Font-Awesome-Icons-CSS -->
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up-box -->
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <!-- menu style -->
    <!-- //Custom-Files -->

    <!-- web fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- //web fonts -->

</head>

<body>
    <!-- top-header -->
    <div class="agile-main-top">
        <div class="container-fluid">
            <div class="row main-top-w3l py-2">
                <div class="col-lg-4 header-most-top">
                    <p class="text-white text-lg-left text-center">Ưu đãi và giảm giá hàng đầu khu vực
                        <i class="fas fa-shopping-cart ml-1"></i>
                    </p>
                </div>
                <div class="col-lg-8 header-right mt-lg-0 mt-2">
                    <!-- header lists -->
                    <ul>
                        <li class="text-center border-right text-white">
                            <a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
                                <i class="fas fa-map-marker mr-2"></i>Chọn Địa Điểm</a>
                        </li>
                        <li class="text-center border-right text-white">
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                                <i class="fas fa-truck mr-2"></i>Theo Dõi Đơn Hàng</a>
                        </li>
                        <li class="text-center border-right text-white">
                            <i class="fas fa-phone mr-2"></i> 001 234 5678
                        </li>
                        <li class="text-center border-right text-white">
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
                                <i class="fas fa-sign-in-alt mr-2"></i> Đăng Nhập </a>
                        </li>
                        <li class="text-center text-white">
                            <a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
                                <i class="fas fa-sign-out-alt mr-2"></i>Đăng Ký </a>
                        </li>
                    </ul>
                    <!-- //header lists -->
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal(select-location) -->
    <div id="small-dialog1" class="mfp-hide">
        <div class="select-city">
            <h3>
                <i class="fas fa-map-marker"></i> Vui lòng chọn vị trí của bạn
            </h3>
            <select class="list_of_cities">
                <optgroup label="Các thành phố nổi tiếng">
                    <option selected style="display:none;color:#eee;">Lựa chọn thành phố</option>
                    <option>Hà Nội</option>
                    <option>Sài Gòn</option>
                    <option>Đà Nẵng</option>
                    <option>Hải Phòng</option>
                    <option>Huế</option>
                    <option>Hạ Long</option>
                </optgroup>
                <optgroup label="Hà Nội">
                    <option>Cầu Giấy</option>
                    <option>Hoàn Kiếm</option>
                    <option>Long Biên</option>
                    <option>Lạc Long Quân</option>
                    <option>Âu Cơ</option>
                    <option>Bắc Từ Liêm</option>
                    <option>Thanh Xuân</option>
                    <option>Nam Từ Liêm</option>
                    <option>Hà Đông</option>
                    <option>Ba Đình</option>
                </optgroup>
                <optgroup label="Sài Gòn">
                    <option>Quận 1</option>
                    <option>Quận 2</option>
                    <option>Bình Thạnh</option>
                    <option>Thủ Đức</option>
                    <option>Tân Bình</option>
                </optgroup>
                <optgroup label="Hải Phòng">
                    <option>Tiên Lãng</option>
                    <option>Dương Kinh</option>
                    <option>Cát Hải</option>
                    <option>Vĩnh Bảo</option>
                    <option>Ngô Quyền</option>
                </optgroup>
                <optgroup label="Quảng Ninh">
                    <option>Móng Cái</option>
                    <option>Hạ Long</option>
                    <option>Uông Bí</option>
                    <option>Cẩm Phả</option>
                </optgroup>
                <optgroup label="Huế">
                    <option>Thành Phố Huế</option>
                    <option>A Lưới</option>
                    <option>Phú Lộc</option>
                    <option>Phong Điền</option>
                    <option>Nam Đông</option>
                </optgroup>
                <optgroup label="Đà Nẵng">
                    <option>Thanh Khê</option>
                    <option>Sơn Trà</option>
                    <option>Ngũ Hành Sơn</option>
                    <option>Cẩm Lệ</option>
                    <option>Hải Châu</option>
                </optgroup>
                <optgroup label="Bắc Giang">
                    <option>Bắc Giang</option>
                    <option>Lạng Giang</option>
                    <option>Yên Thế</option>
                    <option>Hiệp Hòa</option>
                    <option>Việt Yên</option>
                </optgroup>
                <optgroup label="Bắc Ninh">
                    <option>Từ Sơn</option>
                    <option>Thị Cầu</option>
                    <option>Quế Võ</option>
                    <option>Yên Phong</option>
                    <option>Tiên Du</option>
                </optgroup>
                <optgroup label="Thanh Hóa">
                    <option>Sầm Sơn</option>
                    <option>Thanh Hóa</option>
                    <option>Bỉm Sơn</option>
                    <option>Quảng Xương</option>
                    <option>Hoằng Hóa</option>
                </optgroup>
                <optgroup label="Nghệ An">
                    <option>Thành phố Vinh</option>
                    <option>Cửa Lò</option>
                    <option>Quỳnh Lưu</option>
                    <option>Nam Đàn</option>
                    <option>Nghi Lộc</option>
                </optgroup>
                <optgroup label="Bình Dương">
                    <option>Thành phố Thủ Dầu Một</option>
                    <option>Thành phố Dĩ An</option>
                    <option>Thành phố Nhuận An</option>
                    <option>Thị xã Bến Cát</option>
                    <option>Thị xã Tân Uyên</option>
                </optgroup>
                <optgroup label="Cần Thơ">
                    <option>Bình Thủy</option>
                    <option>Cái Răng</option>
                    <option>Ô Môn</option>
                    <option>Thốt Nốt</option>
                    <option>Vĩnh Thạnh</option>
                </optgroup>
            </select>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- //shop locator (popup) -->

    <!-- modals -->
    <!-- Đăng nhập -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Đăng nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Username</label>
                            <input type="text" class="form-control" placeholder=" " name="us" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="pa" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" name="login" class="form-control" value="Đăng nhập">
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
                            </div>
                        </div>
                        <p class="text-center dont-do mt-3">không có tài khoản
                            <a href="#" data-toggle="modal" data-target="#exampleModal2">
                                Đăng ký Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Đăng ký -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đăng ký</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Tên của bạn</label>
                            <input type="text" class="form-control" placeholder=" " name="us" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="pa" id="password1"
                                required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder=" " name="rpa" id="password2"
                                required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" name="signup" class="form-control" value="Đăng ký ">
                        </div>
                        <div class="sub-w3l">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                <label class="custom-control-label" for="customControlAutosizing2">Tôi chấp nhận các
                                    Điều khoản & Điều kiện</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //modal -->
    <!-- //top-header -->

    <!-- header-bottom-->
    <div class="header-bot">
        <div class="container">
            <div class="row header-bot_inner_wthreeinfo_header_mid">
                <!-- logo -->
                <div class="col-md-3 logo4_agile">
                    <h1 class="text-center">
                        <a href="index.html" class="font-weight-bold font-italic">
                            <img src="images/logo4.png" width="90" height="87" alt=" " class="img-fluid"> Store
                        </a>
                    </h1>
                </div>
                <!-- //logo -->
                <!-- header-bot -->
                <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                    <div class="row">
                        <!-- Tìm kiếm -->
                        <div class="col-10 agileits_Tìm kiếm">
                            <form class="form-inline" action="#" method="post">
                                <input class="form-control mr-sm-2" type="Tìm kiếm" placeholder="Tìm kiếm"
                                    aria-label="Tìm kiếm" required>
                                <button class="btn my-2 my-sm-0" type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                        <!-- //Tìm kiếm -->
                        <!-- cart details -->
                        <div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
                            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                                <form action="#" method="post" class="ng">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="display" value="1">
                                    <button class="btn w3view-cart" type="submit" name="submit" value="">
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- //cart details -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop locator (popup) -->
    <!-- //header-bottom -->
    <!-- navigation -->
    <div class="navbar-inner">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="agileits-navi_Tìm kiếm">
                    <form action="#" method="post">
                        <select id="agileinfo-nav_Tìm kiếm" name="agileinfo_Tìm kiếm" class="border" required="">
                            <option value="">Tất cả các loại</option>
                            <option value="Tivi">Tivi</option>
                            <option value="Tai nghe">Tai nghe</option>
                            <option value="Máy tính">Máy tính</option>
                            <option value="Thiết bị gia đình">Thiết bị gia đình</option>
                            <option value="Điện thoại">Điện thoại</option>
                            <option value="Fruits &amp; Vegetables">Tv &amp; Video</option>
                            <option value="iPad & Máy tính bảng">iPad & Máy tính bảng</option>
                            <option value="Máy ảnh & máy quay">Máy ảnh & máy quay</option>
                            <option value="loa trong nhà & các thiết bị hat">Loa trong nhà & các thiết bị hát</option>
                        </select>
                    </form>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-center mr-xl-5">
                        <li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link" href="index.html">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Thiết bị điện tử
                            </a>
                            <div class="dropdown-menu">
                                <div class="agile_inner_drop_nav_info p-4">
                                    <h5 class="mb-3">Điện thoại, Máy tính</h5>
                                    <div class="row">
                                        <div class="col-sm-6 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <a href="#">Tất cả điện thoại</a>
                                                </li>
                                                <li>
                                                    <a href="#">Tất cả phụ kiện di động</a>
                                                </li>
                                                <li>
                                                    <a href="#">Ốp</a>
                                                </li>
                                                <li>
                                                    <a href="#">Bảo vệ màn hình</a>
                                                </li>
                                                <li>
                                                    <a href="#">Power Banks</a>
                                                </li>
                                                <li>
                                                    <a href="#">All Certified Refurbished</a>
                                                </li>
                                                <li>
                                                    <a href="#">Máy tính bảng</a>
                                                </li>
                                                <li>
                                                    <a href="#">Các thiết bị đeo tay</a>
                                                </li>
                                                <li>
                                                    <a href="#">Thiết bị trong nhà</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <a href="#">Máy tính xách tay</a>
                                                </li>
                                                <li>
                                                    <a href="#">Ổ đĩa & bộ nhớ</a>
                                                </li>
                                                <li>
                                                    <a href="#">Máy in & Mực in</a>
                                                </li>
                                                <li>
                                                    <a href="#">Thiết bị mạng</a>
                                                </li>
                                                <li>
                                                    <a href="#">Phụ kiện máy tính</a>
                                                </li>
                                                <li>
                                                    <a href="#">Game Zone</a>
                                                </li>
                                                <li>
                                                    <a href="#">Phần mềm</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Thiết bị gia đình
                            </a>
                            <div class="dropdown-menu">
                                <div class="agile_inner_drop_nav_info p-4">
                                    <h5 class="mb-3">TV, Thiết bị gia đình, thiết bị điện tử</h5>
                                    <div class="row">
                                        <div class="col-sm-6 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <a href="#">Tivi</a>
                                                </li>
                                                <li>
                                                    <a href="#">Hệ thống giải trí gia đình</a>
                                                </li>
                                                <li>
                                                    <a href="#">Tai nghe</a>
                                                </li>
                                                <li>
                                                    <a href="#">Loa</a>
                                                </li>
                                                <li>
                                                    <a href="#">MP3, Media Players & phụ kiện</a>
                                                </li>
                                                <li>
                                                    <a href="#">Âm thanh & Video Phụ kiện</a>
                                                </li>
                                                <li>
                                                    <a href="#">Máy ảnh</a>
                                                </li>
                                                <li>
                                                    <a href="#">Máy ảnh DSLR</a>
                                                </li>
                                                <li>
                                                    <a href="#">Camera Phụ kiện</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <a href="#">Nhạc cụ</a>
                                                </li>
                                                <li>
                                                    <a href="#">Gaming Consoles</a>
                                                </li>
                                                <li>
                                                    <a href="#">Tất cả thiết bị điện tử</a>
                                                </li>
                                                <li>
                                                    <a href="#">Máy điều hoà</a>
                                                </li>
                                                <li>
                                                    <a href="#">Tủ lạnh</a>
                                                </li>
                                                <li>
                                                    <a href="#">Máy giặt</a>
                                                </li>
                                                <li>
                                                    <a href="#">Nhà bếp </a>
                                                </li>
                                                <li>
                                                    <a href="#">Sưởi ấm & làm mát </a>
                                                </li>
                                                <li>
                                                    <a href="#">All Thiết bị gia đình</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link" href="#">Thông tin về chúng tôi</a>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ chúng tôi</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- //navigation -->

    <!-- banner -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item item1 active">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>HOÀN TIỀN NGAY
                                <span>10%</span>
                            </p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">The
                                <span>Big</span>
                                Sale
                            </h3>
                            <a class="button2" href="#">Mua ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item2">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>
                                <span>Tai nghe</span> không dây
                            </p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Tai nghe
                                <span>Tốt Nhất</span>
                            </h3>
                            <a class="button2" href="#">Mua ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item3">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>HOÀN TIỀN NGAY
                                <span>10%</span>
                            </p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Tiêu Chuẩn
                                <span>Mới</span>
                            </h3>
                            <a class="button2" href="#">Mua ngay </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item4">
                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <p>NHẬN NGAY GIẢM GIÁ
                                <span>40%</span>
                            </p>
                            <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Giảm Giá Ngay
                                <span>Hôm Nay</span>
                            </h3>
                            <a class="button2" href="#">Mua Ngay </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- //banner -->

    <!-- top Products -->
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>S</span>ản
                <span>P</span>hẩm
                <span>M</span>ới
                <span>N</span>hất
            </h3>
            <!-- //tittle heading -->
            <div class="row">
                <!-- product left -->
                <div class="agileinfo-ads-display col-lg-9">
                    <div class="wrapper">
                        <!-- first section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                            <h3 class="heading-tittle text-center font-italic">Điện thoại mới nhất</h3>
                            <div class="row">
                                <?php
                    $sql_different = "select * from tbl_sanpham where Ma_DanhMuc = 21";
                    $different = mysqli_query($conn, $sql_different);
                    if (mysqli_num_rows($different) > 0) {
                        while ($row = mysqli_fetch_assoc($different)) {
                            echo '<div class="col-md-4 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									<img src="admin/' . $row["AnhSP"] . '" width="200" height="300"
										alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="#" class="link-product-add-cart">Xem chi tiết</a>
										</div>
									</div>
								</div>
								<div class="item-info-product text-center border-top mt-4">
									<h4 class="pt-1">
										<a href="#">' . $row["Ten_SanPham"] . '</a>
									</h4>
									<div class="info-product-price my-2">
										<span class="item_price">$ ' . $row["Gia"] . '</span>
									</div>
									<div
										class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name"
													value="Samsung Galaxy J7" />
												<input type="hidden" name="amount" value="200.00" />
												<input type="hidden" name="discount_amount" value="1.00" />
												<input type="hidden" name="currency_code" value="USD" />
												<input type="hidden" name="return" value=" " />
												<input type="hidden" name="cancel_return" value=" " />
												<input type="submit" name="submit" value="Thêm vào giỏ hàng"
													class="button btn" />
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>';
                        }
                    }
                    ?>

                            </div>
                        </div>
                        <!-- //first section -->
                        <!-- second section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                            <h3 class="heading-tittle text-center font-italic">Tv & Audio</h3>
                            <div class="row">
                                <?php
                    $sql_different = "select * from tbl_sanpham where Ma_DanhMuc = 3";
                    $different = mysqli_query($conn, $sql_different);
                    if (mysqli_num_rows($different) > 0) {
                        while ($row = mysqli_fetch_assoc($different)) {
                            echo '<div class="col-md-4 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									<img src="admin/' . $row["AnhSP"] . '" width="200" height="300"
										alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="#" class="link-product-add-cart">Xem chi tiết</a>
										</div>
									</div>
								</div>
								<div class="item-info-product text-center border-top mt-4">
									<h4 class="pt-1">
										<a href="#">' . $row["Ten_SanPham"] . '</a>
									</h4>
									<div class="info-product-price my-2">
										<span class="item_price">$ ' . $row["Gia"] . '</span>
									</div>
									<div
										class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name"
													value="Samsung Galaxy J7" />
												<input type="hidden" name="amount" value="200.00" />
												<input type="hidden" name="discount_amount" value="1.00" />
												<input type="hidden" name="currency_code" value="USD" />
												<input type="hidden" name="return" value=" " />
												<input type="hidden" name="cancel_return" value=" " />
												<input type="submit" name="submit" value="Thêm vào giỏ hàng"
													class="button btn" />
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>';
                        }
                    }
                    ?>

                            </div>
                        </div>
                        <!-- //second section -->
                        <!-- third section -->
                        <div class="product-sec1 product-sec2 px-sm-5 px-3">
                            <div class="row">
                                <h3 class="col-md-4 effect-bg">Lễ hội hóa trang mùa hè</h3>
                                <p class="w3l-nut-middle">Được giảm giá thêm 10%</p>
                                <div class="col-md-8 bg-right-nut">
                                    <img src="images/image1.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- //third section -->
                        <!-- fourth section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
                            <h3 class="heading-tittle text-center font-italic">Thiết bị gia đình</h3>
                            <div class="row">
                                <?php
                    $sql_different = "select * from tbl_sanpham where Ma_DanhMuc = 38";
                    $different = mysqli_query($conn, $sql_different);
                    if (mysqli_num_rows($different) > 0) {
                        while ($row = mysqli_fetch_assoc($different)) {
                            echo '<div class="col-md-4 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									<img src="admin/' . $row["AnhSP"] . '" width="200" height="300"
										alt="">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="#" class="link-product-add-cart">Xem chi tiết</a>
										</div>
									</div>
								</div>
								<div class="item-info-product text-center border-top mt-4">
									<h4 class="pt-1">
										<a href="#">' . $row["Ten_SanPham"] . '</a>
									</h4>
									<div class="info-product-price my-2">
										<span class="item_price">$ ' . $row["Gia"] . '</span>
									</div>
									<div
										class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
										<form action="#" method="post">
											<fieldset>
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" />
												<input type="hidden" name="business" value=" " />
												<input type="hidden" name="item_name"
													value="Samsung Galaxy J7" />
												<input type="hidden" name="amount" value="200.00" />
												<input type="hidden" name="discount_amount" value="1.00" />
												<input type="hidden" name="currency_code" value="USD" />
												<input type="hidden" name="return" value=" " />
												<input type="hidden" name="cancel_return" value=" " />
												<input type="submit" name="submit" value="Thêm vào giỏ hàng"
													class="button btn" />
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>';
                        }
                    }
                    ?>

                            </div>
                        </div>
                        <!-- //fourth section -->
                    </div>
                </div>
                <!-- //product left -->

                <!-- product right -->
                <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                    <div class="side-bar p-sm-4 p-3">
                        <div class="Tìm kiếm-hotel border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Tìm kiếm tại đây..</h3>
                            <form action="#" method="post">
                                <input type="Tìm kiếm" placeholder="Product name..." name="Tìm kiếm" required="">
                                <input type="submit" value=" ">
                            </form>
                        </div>
                        <!-- price -->
                        <div class="range border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Giá bán</h3>
                            <div class="w3l-range">
                                <ul>
                                    <li>
                                        <a href="#">Dưới $1,000</a>
                                    </li>
                                    <li class="my-1">
                                        <a href="#">$1,000 - $5,000</a>
                                    </li>
                                    <li>
                                        <a href="#">$5,000 - $10,000</a>
                                    </li>
                                    <li class="my-1">
                                        <a href="#">$10,000 - $20,000</a>
                                    </li>
                                    <li>
                                        <a href="#">$20,000 $30,000</a>
                                    </li>
                                    <li class="mt-1">
                                        <a href="#">Trên $30,000</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- //price -->
                        <!-- discounts -->
                        <div class="left-side border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Giảm giá</h3>
                            <ul>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">5%</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">10%</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">20%</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">30%</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">50%</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">60%</span>
                                </li>
                            </ul>
                        </div>
                        <!-- //discounts -->
                        <!-- reviews -->
                        <div class="customer-rev border-bottom left-side py-2">
                            <h3 class="agileits-sear-head mb-3">Đánh giá khách hàng</h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>5.0</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>4.0</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>
                                        <span>3.5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span>3.0</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>
                                        <span>2.5</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- //reviews -->
                        <!-- thiết bị điện tử -->
                        <div class="left-side border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Thiết bị điện tử</h3>
                            <ul>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Phụ kiện</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Máy ảnh </span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Thiết bị điện tử ô tô</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Máy tính & Phụ kiện</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">GPS & Phụ kiện</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Tai nghe</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">loa trong nhà</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span"> Thiết bị âm thanh, TV & Video</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Điện thoại & Phụ kiện</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Trình phát phương tiện di động</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Máy tính bảng</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Điện thoại & Phụ kiện</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Công nghệ may mặc</span>
                                </li>
                            </ul>
                        </div>
                        <!-- //thiết bị điện tử -->
                        <!-- delivery -->
                        <div class="left-side border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Thanh toán khi giao hàng</h3>
                            <ul>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Đủ điều kiện nhận tiền mặt khi giao hàng</span>
                                </li>
                            </ul>
                        </div>
                        <!-- //delivery -->
                      
                        <!-- best seller -->
                        <div class="f-grid py-2">
                            <h3 class="agileits-sear-head mb-3">Sản Phẩm Bán Chạy</h3>
                            <div class="box-scroll">
                                <div class="scroll">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                            <img src="images/k1.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                            <a href="">Samsung Galaxy On7 Prime (Gold, 4GB RAM + 64GB Memory)</a>
                                            <a href="" class="price-mar mt-2">$12,990.00</a>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                            <img src="images/k2.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                            <a href="">Haier 195 L 4 Star Direct-Cool Single Door Refrigerator</a>
                                            <a href="" class="price-mar mt-2">$12,499.00</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-2 col-3 left-mar">
                                            <img src="images/k3.jpg" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-lg-9 col-sm-10 col-9 w3_mvd">
                                            <a href="">Ambrane 13000 mAh Power Bank (P-1310 Premium)</a>
                                            <a href="" class="price-mar mt-2">$1,199.00 </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //best seller -->
                    </div>
                    <!-- //product right -->
                </div>
            </div>
        </div>
    </div>
    <!-- //top products -->

    <!-- middle section -->
    <div class="join-w3l1 py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="join-agile text-left p-4">
                        <div class="row">
                            <div class="col-sm-7 offer-name">
                                <h6>Âm thanh mượt mà, phong phú</h6>
                                <h4 class="mt-2 mb-3">Thương hiệu Tai nghe</h4>
                                <p>Giảm giá 25% tất cả tại cửa hàng</p>
                            </div>
                            <div class="col-sm-5 offerimg-w3l">
                                <img src="images/off1.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5">
                    <div class="join-agile text-left p-4">
                        <div class="row ">
                            <div class="col-sm-7 offer-name">
                                <h6>Đột phá mới</h6>
                                <h4 class="mt-2 mb-3">Iphone XS MAX</h4>
                                <p>Giao hàng FREE đơn trên $ 100</p>
                            </div>
                            <div class="col-sm-5 offerimg-w3l">
                                <img src="images/xs max 2.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- middle section -->

    <!-- footer -->
    <footer>
        <div class="footer-top-first">
            <div class="container py-md-5 py-sm-4 py-3">
                <!-- footer first section -->
                <h2 class="footer-top-head-w3l font-weight-bold mb-2">Thiết bị điện tử :</h2>
                <p class="footer-main mb-4">
                    Nếu bạn đang cân nhắc một chiếc máy tính xách tay mới, đang tìm kiếm một dàn âm thanh nổi trên xe
                    hơi mới mạnh mẽ hoặc mua một HDTV mới, chúng tôi sẽ giúp bạn dễ dàng tìm thấy chính xác thứ bạn cần
                    với mức giá bạn có thể mua được. Chúng tôi cung cấp Giá thấp hàng ngày trên TV, máy tính xách tay,
                    điện thoại di động, máy tính bảng và iPad, trò chơi điện tử, máy tính để bàn, máy ảnh và máy quay
                    phim, âm thanh, video và hơn thế nữa..</p>
                <!-- //footer first section -->
                <!-- footer second section -->
                <div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-dolly"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Miễn phí vận chuyển</h3>
                                <p>cho đơn đặt hàng trên $100</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer my-md-0 my-4">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Chuyển phát nhanh</h3>
                                <p>trên toàn thế giới </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 offer-footer">
                        <div class="row">
                            <div class="col-4 icon-fot">
                                <i class="far fa-thumbs-up"></i>
                            </div>
                            <div class="col-8 text-form-footer">
                                <h3>Lựa chọn lớn</h3>
                                <p>về sản phẩm</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //footer second section -->
            </div>
        </div>
        <!-- footer third section -->
        <div class="w3l-middlefooter-sec">
            <div class="container py-md-5 py-sm-4 py-3">
                <div class="row footer-info w3-agileits-info">
                    <!-- footer categories -->
                    <div class="col-md-3 col-sm-6 footer-grids">
                        <h3 class="text-white font-weight-bold mb-3">Thiết bị</h3>
                        <ul>
                            <li class="mb-3">
                                <a href="#">Điện thoại </a>
                            </li>
                            <li class="mb-3">
                                <a href="#">Máy tính</a>
                            </li>
                            <li class="mb-3">
                                <a href="#">TV, Audio</a>
                            </li>
                            <li class="mb-3">
                                <a href="#">Smartphones</a>
                            </li>
                            <li class="mb-3">
                                <a href="#">máy giặt</a>
                            </li>
                            <li>
                                <a href="#">Tủ lạnh</a>
                            </li>
                        </ul>
                    </div>
                    <!-- //footer categories -->
                    <!-- quick links -->
                    <div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
                        <h3 class="text-white font-weight-bold mb-3">Liên kết nhanh</h3>
                        <ul>
                            <li class="mb-3">
                                <a href="#">Thông tin về chúng tôi</a>
                            </li>
                            <li class="mb-3">
                                <a href="#">Liên hệ chúng tôi</a>
                            </li>
                            <li class="mb-3">
                                <a href="#">Trợ giúp</a>
                            </li>
                            <li class="mb-3">
                                <a href="#">Câu hỏi thường gặp</a>
                            </li>
                            <li class="mb-3">
                                <a href="#">Điều khoản sử dụng</a>
                            </li>
                            <li>
                                <a href="#">Chính sách bảo mật</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
                        <h3 class="text-white font-weight-bold mb-3">Liên lạc</h3>
                        <ul>
                            <li class="mb-3">
                                <i class="fas fa-map-marker"></i> 175, Cầu Giấy, Hà Nội.
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-mobile"></i> 037 2716 136
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-phone"></i> 0355 8889 64
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-envelope-open"></i>
                                <a href="mailto:example@mail.com"> mail 1@example.com</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope-open"></i>
                                <a href="mailto:example@mail.com"> mail 2@example.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
                        <!-- newsletter -->
                        <h3 class="text-white font-weight-bold mb-3">Bản tin</h3>
                        <p class="mb-3">Giao hàng miễn phí cho đơn hàng đầu tiên của bạn!</p>
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                <input type="submit" value="Go">
                            </div>
                        </form>
                        <!-- //newsletter -->
                        <!-- social icons -->
                        <div class="footer-grids  w3l-socialmk mt-3">
                            <h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
                            <div class="social">
                                <ul>
                                    <li>
                                        <a class="icon fb" href="https://www.facebook.com/ducthang1120/">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="icon tw" href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="icon gp" href="#">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- //social icons -->
                    </div>
                </div>
                <!-- //quick links -->
            </div>
        </div>
        <!-- //footer third section -->

        <!-- footer fourth section -->
        <div class="agile-sometext py-md-5 py-sm-4 py-3">
            <div class="container">
                <!-- brands -->
                <div class="sub-some">
                    <h5 class="font-weight-bold mb-2">Mobile & Máy tính bảng :</h5>
                    <ul>
                        <a href="#" class="border-right pr-2">Điện thoại Android</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Điện thoại thông minh</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Điện thoại phổ thông</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Điện thoại không hộp</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Điện thoại được tân trang</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2"> Máy tính bảng</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Điện thoại CDMA</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2"> Dịch vụ giá trị gia tăng</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Bán cũ</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Điện thoại di động đã qua sử dụng</a>
                        </li>
                    </ul>
                </div>
                <div class="sub-some mt-4">
                    <h5 class="font-weight-bold mb-2"> Máy tính:</h5>
                    <ul>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Máy tính xách tay </a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Máy in</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Bộ định tuyến</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Hộp mực & Hộp mực</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Màn hình</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Trò chơi điện tử</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Máy tính xách tay được mở hộp & tân trang</a>
                        </li>
                        <li>
                            <a href="#" class="border-right pr-2">Máy tính để bàn lắp ráp</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2"> Thẻ dữ liệu</a>
                        </li>
                    </ul>
                </div>
                <div class="sub-some mt-4">
                    <h5 class="font-weight-bold mb-2">TV, Âm thanh & Thiết bị Lớn:</h5>
                    <ul>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">TVs & DTH</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Hệ thống rạp hát tại nhà</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Camera ẩn & camera quan sát</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Tủ lạnh/a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Máy giặt</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2"> Máy điều hoà</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Máy ảnh</a>
                        </li>

                    </ul>
                </div>
                <div class="sub-some mt-4">
                    <h5 class="font-weight-bold mb-2">Phụ kiện di động & máy tính xách tay:</h5>
                    <ul>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Tai nghe</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Ngân hàng điện </a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Ba lô</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Vỏ & Bao di động</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Cây viết mực</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2"> Đĩa cứng bên ngoài</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2"> Chuột</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Đồng hồ thông minh & Dây đeo thể dục</a>
                        </li>
                        <li class="m-sm-1">
                            <a href="#" class="border-right pr-2">Thẻ MicroSD</a>
                        </li>
                    </ul>
                </div>

                <!-- //brands -->
                <!-- payment -->
                <div class="sub-some child-momu mt-4">
                    <h5 class="font-weight-bold mb-3">Phương thức thanh toán</h5>
                    <ul>
                        <li>
                            <img src="images/pay2.png" alt="">
                        </li>
                        <li>
                            <img src="images/pay5.png" alt="">
                        </li>
                        <li>
                            <img src="images/pay1.png" alt="">
                        </li>
                        <li>
                            <img src="images/pay4.png" alt="">
                        </li>
                        <li>
                            <img src="images/pay6.png" alt="">
                        </li>
                        <li>
                            <img src="images/pay3.png" alt="">
                        </li>
                        <li>
                            <img src="images/pay7.png" alt="">
                        </li>
                        <li>
                            <img src="images/pay8.png" alt="">
                        </li>
                        <li>
                            <img src="images/pay9.png" alt="">
                        </li>
                    </ul>
                </div>
                <!-- //payment -->
            </div>
        </div>
        <!-- //footer fourth section (text) -->
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="copy-right py-3">
        <div class="container">
            <p class="text-center text-white">© 2020 T.K.T. Tất cả các quyền được bảo lưu.</p>
        </div>
    </div>
    <!-- //copyright -->

    <!-- js-files -->
    <!-- jquery -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //jquery -->

    <!-- nav smooth scroll -->
    <script>
    $(document).ready(function() {
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
    </script>
    <!-- //nav smooth scroll -->

    <!-- popup modal (for location)-->
    <script src="js/jquery.magnific-popup.js"></script>
    <script>
    $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
    </script>
    <!-- //popup modal (for location)-->

    <!-- cart-js -->
    <script src="js/minicart.js"></script>
    <script>
    paypals.minicarts
        .render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

    paypals.minicarts.cart.on('checkout', function(evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });
    </script>
    <!-- //cart-js -->

    <!-- password-script -->
    <script>
    window.onload = function() {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
    </script>
    <!-- //password-script -->

    <!-- scroll seller -->
    <script src="js/scroll.js"></script>
    <!-- //scroll seller -->

    <!-- smoothscroll -->
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smoothscroll -->

    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
    </script>
    <!-- //end-smooth-scrolling -->

    <!-- smooth-scrolling-of-move-up -->
    <script>
    $(document).ready(function() {
        /*
        var defaults = {
        	containerID: 'toTop', // fading element id
        	containerHoverID: 'toTopHover', // fading element hover id
        	scrollSpeed: 1200,
        	easingType: 'linear' 
        };
        */
        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
    </script>
    <!-- //smooth-scrolling-of-move-up -->

    <!-- for bootstrap working -->
    <script src="js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- //js-files -->
</body>

</html>