<style>
    .hover-mainx {
        color: var(--main) !important;
        border-radius: 1vh;
    }
    .hover-mainx {
        transition: 0.5s !important;
    }
    .hover-mainx.fa-regular {
        color: var(--main) !important;
    }
    .hover-mainx.active {
        border: 2px solid var(--main) !important;
        color: var(--main) !important;
    }
    .hover-mainx.active .fa-regular {
        color: white !important;
    }
    .hover-mainx:hover {
        background-color: var(--main);
        color: white !important;
        border-radius: 1vh;
    }
    .icon-white {
        transition: 0.5s !important;
    }

    .hover-mainx:hover .icon-white {
        color: #ffff !important;
    }
</style>
<div class="container-sm">
<nav class="navbar navbar-expand-lg navbar-dark mt-0 shadow-sm mb-0 <?php echo $bg?>" style="z-index: 55;border-radius: 1vh;">
    <div class="container-sm">
        <button class="navbar-toggler mb-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <h6><i class="far fa-bars mt-2"></i> Menu</h6>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav p-1">
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'backend' ? 'active' : ''); ?>" href="?page=backend" style="color: var(--font);border-radius:1vh">แดชบอร์ด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'website' ? 'active' : ''); ?>" href="?page=website" style="color: var(--font);border-radius:1vh">จัดการเว็บไซต์</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'manage_theme' ? 'active' : ''); ?>" href="?page=manage_theme" style="color: var(--font);border-radius:1vh">จัดการ Theme</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'payment_manage' ? 'active' : ''); ?>" href="?page=payment_manage" style="color: var(--font);border-radius:1vh">จัดการเติมเงิน</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'carousel_manage' ? 'active' : ''); ?>" href="?page=carousel_manage" style="color: var(--font);border-radius:1vh">จัดการรูปภาพสไลด์</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'user_edit' ? 'active' : ''); ?>" href="?page=user_edit" style="color: var(--font);border-radius:1vh">จัดการผู้ใช้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'shop_manage' ? 'active' : ''); ?>" href="?page=shop_manage" style="color: var(--font);border-radius:1vh">จัดการร้านค้า</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'c_recom_manage' ? 'active' : ''); ?>" href="?page=c_recom_manage" style="color: var(--font);border-radius:1vh">จัดการแนะนำ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'history_log' ? 'active' : ''); ?>" href="?page=history_log" style="color: var(--font);border-radius:1vh">ประวัติทั้งหมด</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'apibyshop' ? 'active' : ''); ?>" href="?page=apibyshop" style="color: var(--font);border-radius:1vh">apibyshop</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'checktime' ? 'active' : ''); ?>" href="" data-bs-toggle="modal" data-bs-target="#checktime" style="color: var(--font);border-radius:1vh">เช็คอายุการใช้งาน</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link text-center me-1 hover-mainx <?php echo ($_GET['page'] == 'socialservice_manage' ? 'active' : ''); ?>" href="?page=socialservice_manage" style="color: var(--font);border-radius:1vh">จัดการปั้มโซเชียล</a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</nav>
</div>
</div>
<style>
    .modal-content {
        border-radius: 10px;
    }

    .modal-header {
        color: white;
        border-radius: 10px 10px 0 0;
    }

    .modal-body {
        padding: 20px;
    }

    #timer {
        font-size: 36px;
        color: var(--main);
    }

    .btn-secondary {
        color: white;
        border-radius: 5px;
    }

    .bg-main {
        background-color: var(--main);
        color: white;
        border-radius: 5px;
    }

    .btn-secondary:hover,
    .bg-main:hover {
        background-color: #5a6268;
    }
</style>
<div class="modal fade" id="checktime" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">อายุการใช้งานคงเหลือ</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h4 class="mt-2">วัน : ชั่วโมง : นาที : วิ</h4>
                    <h1 class="" style="color: var(--main);" id="timer"></h1>
                    <h6 class="" style="color: var(--main);"><?= $time['des'] ?></h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">ปิด</button>
                <a href="?page=renew" style="text-decoration: none;"><button type="button" class="btn bg-main text-white">ต่ออายุ</button></a>
            </div>
        </div>
    </div>
</div>
<?php
    // 1111-01-11 00:00:00.00 ถาวร
    echo '<script>';
    echo 'var countDownDate = ';
    if ($time['date'] === '1111-01-11 00:00:00.00') {
        echo '0;';
    } else {
        echo 'new Date("' . $time['date'] . '").getTime();';
    }
    echo 'var x = setInterval(function() {';
    echo 'var now = new Date().getTime();';
    echo 'var distance = countDownDate - now;';
    echo 'var days = Math.floor(distance / (1000 * 60 * 60 * 24));';
    echo 'var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));';
    echo 'var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));';
    echo 'var seconds = Math.floor((distance % (1000 * 60)) / 1000);';
    echo 'if (countDownDate === 0) {';
    echo 'document.getElementById("timer").innerHTML = "ถาวร";';
    echo '} else {';
    echo 'document.getElementById("timer").innerHTML = days + " : " + hours + " : " + minutes + " : " + seconds + "";';
    echo 'if (distance < 0) {';
    echo 'clearInterval(x);';
    echo 'document.getElementById("timer").innerHTML = "EXPIRED";';
    echo '}';
    echo '}';
    echo '}, 1000);';
    echo '</script>';
?>

<div class="col-lg-12">
    <?php
    if (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend") {
        require_once('page/backend/dashboard.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "user_edit") {
        require_once('page/backend/user_edit.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "topup_manage") {
        require_once('page/backend/topup_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "category_manage") {
        require_once('page/backend/category.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "slip_manage") {
        require_once('page/backend/slip_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "wheel_cate") {
        require_once('page/backend/wheel_cate.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "wheel") {
        require_once('page/backend/wheel.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "product_manage") {
        require_once('page/backend/product.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "stock_manage" && $_GET['id'] != "") {
        require_once('page/backend/stock.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "wheel_manage") {
        require_once('page/backend/wheel.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "stock_wheel" && $_GET['id'] != "") {
        require_once('page/backend/stock_wheel.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "code_manage") {
        require_once('page/backend/code_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "service_manage") {
        require_once('page/backend/service_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend_buy_history") {
        require_once('page/backend/buy_history.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend_topup_history") {
        require_once('page/backend/topup_history.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend_app_history") {
        require_once('page/backend/byshop_his.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "website") {
        require_once('page/backend/website.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "manage_theme") {
        require_once('page/backend/theme.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "carousel_manage") {
        require_once('page/backend/carousel_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "recom_manage") {
        require_once('page/backend/recom_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "crecom_manage") {
        require_once('page/backend/crecom_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_his") {
        require_once('page/backend/order.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_success") {
        require_once('page/backend/order_success.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_unsuccess") {
        require_once('page/backend/order_unsuccess.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "payment_manage") {
        require_once('page/backend/payment_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_temp") {
        require_once('page/backend/order_temp.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "apibyshop") {
        require_once('page/backend/apibyshop.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "apibyshop_manage") {
        require_once('page/backend/apibyshop_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "socialservice_manage") {
        require_once('page/backend/socialservice_manage.php');
    } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend_socialservice_history") {
        require_once('page/backend/backend_socialservice_history.php');
    } 
    ?>
</div>
</div>
</div>
</div>