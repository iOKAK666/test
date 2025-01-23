<?php
session_start();
error_reporting(0);
require_once("services/a_func.php");
if (isset($_SESSION['id'])) {
    $q1 = dd_q("SELECT * FROM users WHERE id = ? LIMIT 1", [$_SESSION['id']]);
    if ($q1->rowCount() == 1) {
        $user = $q1->fetch(PDO::FETCH_ASSOC);
    } else {
        
        $_GET['page'] = "login";
    }
}

$config = dd_q("SELECT * FROM setting")->fetch(PDO::FETCH_ASSOC);
$get_static = dd_q("SELECT * FROM static");
$static = $get_static->fetch(PDO::FETCH_ASSOC);

$ic_home = "none";
$ic_shop = "none";
$ic_topup = "none";
$ic_user = "none";
$ic_adduser = "none";
$ic_cat = "";
$ic_inst = "";
$ic_soldout = "";
$ic_tele = "";
$ic_cart = "";
$ic_wheel = "";
$ic_backend = "";
$ic_coin = "";
$ic_edit = "";
$ic_his = "";
$ic_logout = "";
$ic_howto = "";
$ic_service = "";
$ic_contact = "";

$tst = dd_q("SELECT * FROM theme_setting")->fetch(PDO::FETCH_ASSOC);
if ($tst["icon"] == "classic") {
    $ic_home = "assets/icon/house.png";
    $ic_shop = "assets/icon/store.png";
    $ic_topup = "assets/icon/credit.png";
    $ic_user = "assets/icon/profile.png";
    $ic_adduser = "assets/icon/add-user.png";
    $ic_cat = "assets/icon/application.png";
    $ic_inst = "assets/icon/in-stock.png";
    $ic_soldout = "assets/icon/out-of-stock.png";
    $ic_tele = "https://cdn-icons-png.flaticon.com/512/8306/8306906.png";
    $ic_cart = "assets/icon/shopping-cart.png";
    $ic_wheel = "assets/icon/wheel.png";
    $ic_backend = "assets/icon/manager.png";
    $ic_coin = "assets/icon/assets/icon/dollar.png";
    $ic_edit = "assets/icon/user-ed.png";
    $ic_his = "assets/icon/history.png";
    $ic_logout = "assets/icon/enter.png";
    $ic_howto = "https://cdn.discordapp.com/attachments/1172513665367425214/1172866969070993418/icons8-question-100_2.png?ex=6561e07c&is=654f6b7c&hm=a1a05f1f67cfed74c71e56b7d3cf2d1c87059882e186bf6c485bf2a7b0ad39ce&";
    $ic_service = "assets/icon/call-center.png";
    $ic_contact = "https://cdn.discordapp.com/attachments/1172513665367425214/1174515761121853440/icons8-phone-100.png?ex=6567e00a&is=65556b0a&hm=de93f33e46e5c9fe5deff0074df4f83005dc4c5cf5a8d0229f3625e1294f6b13&";
}
if ($tst["icon"] == "normal") {

}
if ($tst["icon"] == "light") {

}
if ($tst["icon"] == "dark") {

}

$bgh = $tst["uic"];
if ($tst["ui"] == "trans") {
    $bg = "bg-glass";
}
if ($tst["ui"] == "light") {
    $bg = "bg-white";
}
if ($tst["ui"] == "dark") {
    $bg = "bg-black";
}

$an = $tst["anim"];
if ($tst["anim"] == "zin") {
    $anim = "zoom-in";
}
if ($tst["anim"] == "zot") {
    $anim = "zoom-out";
}
if ($tst["anim"] == "fl") {
    $anim = "fade-left";
}
if ($tst["anim"] == "fr") {
    $anim = "fade-right";
}

$sv = dd_q("SELECT * FROM service_setting")->fetch(PDO::FETCH_ASSOC);
$sv_status = $sv["status"];
$sv_img = $sv["img"];
$sv_mes = $sv["mes"];

if (isset($_GET['page'])) {
?>
    <!DOCTYPE html>
    <html lang="en" alt="xdnvccloud">
    <head>
        <?php
            # 1111-01-11 00:00:00.00 ถาวร
            $timeout = $time['date'];
            if ($timeout != '1111-01-11 00:00:00.00' && date("Y-m-d") >= $timeout) {
                header('Location: https://www.facebook.com/xdnvc');
                exit;
            } elseif ($timeout == '1111-01-11 00:00:00.00') {

            }
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:title" content="<?php echo $config['name']; ?> - ยินดีต้อนรับ">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?= $_SERVER['SERVER_NAME'] ?>">
        <meta name="twitter:card" content="summary_large_image">
        <meta property="og:image" content="<?php echo $config['logo']; ?>">
        <meta property="og:description" content="<?php echo $config['des']; ?>">
        <title><?php echo $config['name']; ?></title>
        <link rel="shortcut icon" href="<?php echo $config['logo']; ?>" type="image/png" sizes="16x16">
        <link rel="stylesheet" href="services/styles/stylex.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <link href="https://kit-pro.fontawesome.com/releases/v6.2.0/css/pro.min.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@600&family=Kanit&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/2.8.0/chart.bundle.min.js"></script>
        <link rel="stylesheet" href="https://bit.ly/3CZa0Sz" type="text/css" charset="utf-8" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="services/styles/stylex.css">
        <link rel="stylesheet" href="services/styles/xdnvc.css">
        <style>
            :root {
                --main: <?php echo $config["main_color"]; ?>;
                --sub: <?php echo $config["sec_color"]; ?>;
                --font: <?= $config["font_color"]; ?>;
                --sub-opa-50: <?php echo $config["main_color"]; ?>80;
                --sub-opa-25: <?php echo $config["main_color"]; ?>;
            }
            *,
            html,
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            span,
            small,
            p,
            button,
            .btn,
            .nav-link,
            .text-dark,
            .text-white,
            .text-secondary,
            .underline-active {
                color: var(--font);
            }
            .{
                background: linear-gradient(135deg, rgba(248, 249,250 , 0.77)  ,  rgba(248, 249,250 , 0.3)  );
                backdrop-filter: blur(30px);
                -webkit-backdrop-filter: blur(30px);
                box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            }
            ::-webkit-scrollbar {
                width: 3px
            }
            .owl-items {
                max-width: 220px;
                max-height: 220px;

            }
            .owl-items img {
                border-radius: 25px !important;
                animation: glow 2s infinite ease-in-out;
            }
            * {
                font-family: 'Kanit', sans-serif; 
            }
            .bg-custom {
                background-color: <?php echo $bgh;?>;
            }
            ::-webkit-scrollbar-track {
                background: #000
            }
            ::-webkit-scrollbar-thumb {
                border-radius: 25px;
                background: -webkit-linear-gradient(transparent,var(--main))
            }

            <?php if ($tst['ui'] == "light") : ?>
                .bg-glass{
                    background: linear-gradient(135deg, rgba(248, 249,250 , 8.5)  ,  rgba(248, 249,250 , 0.3));
                    backdrop-filter: blur(30px);
                    -webkit-backdrop-filter: blur(30px);
                    box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
                }
            <?php endif ?>

            <?php if ($tst['ui'] == "dark") : ?>
                .bg-glass{
                    background: linear-gradient(135deg, rgba(0, 1,2 , 8.5)  ,  rgba(0, 1,2 , 0.3));
                    backdrop-filter: blur(30px);
                    -webkit-backdrop-filter: blur(30px);
                    box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
                }
            <?php endif ?>

            <?php if ($tst['st'] == "on") : ?>
                body {
                    font-family: 'Kanit', sans-serif;
                    <?php if ($tst['ui'] == "light") : ?>
                        background-image: linear-gradient(to top, white, transparent 120%),url(<?= $config['bg2'] ?>);
                    <?php endif ?>
                    <?php if ($tst['ui'] == "dark") : ?>
                        background-image: linear-gradient(to top, black, transparent 120%),url(<?= $config['bg2'] ?>);
                    <?php endif ?>
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-position: center;
                    background-size: cover;
                    overflow-x: hidden;
                }
            <?php endif ?>

            <?php if ($tst['st'] == "off") : ?>
                body {
                    font-family: 'Kanit', sans-serif;
                    background-color: <?php echo $bgh;?>;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    background-position: center;
                    background-size: cover;
                    overflow-x: hidden;
                }
            <?php endif; ?>

            <?php if ($tst['ui'] == "light") : ?>
                .navber-glass {
                    background: rgba(248, 249, 250, 0.91);
                    box-shadow: 0 4px 30px rgba(248, 249, 250, 0.1);
                    -webkit-backdrop-filter: blur(8.5px);
                }
            <?php endif ?>

            <?php if ($tst['ui'] == "dark") : ?>
                .navber-glass {
                    background: rgba(0, 1, 2, 0.91);
                    box-shadow: 0 4px 30px rgba(0, 1, 2, 0.1);
                    -webkit-backdrop-filter: blur(8.5px);
                }
            <?php endif ?>

        </style>

    </head>

    <body>
        <div class="container-sm mt-3">
        <nav class="navbar <?php echo ($tst['ui'] == 'light' ? 'bg-white' : 'bg-darks'); ?> navbar-expand-lg navbar-light sticky-top mt-0 mb-0 p-0 mb-3" style="border-radius: 1vh;">
            <div class="container-sm ps-3 pe-3 pt-2 p-2">
                <!-- <a class="navbar-brand" href="/?page=home"><img src="<?= $config['logo'] ?>" height="65px" width="auto"></a> -->
                <a class="navbar-brand text_web_main" style="font-weight: 600;font-size: 20px;color: var(--main);" href="?page=home"><?= $config['name'] ?></a>
                <button class="navbar-toggler bg-main" style="border-radius: 1vh;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="far fa-bars text-white mt-1 mb-1"></i>
                </button>
                <div class="offcanvas offcanvas-end <?php echo ($tst['ui'] == 'light' ? 'bg-white' : 'bg-darks'); ?>" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="<?= $config['logo'] ?>" style="max-width: 40px;"><?= $config['name'] ?></h5>
                        <button type="button" class="btn bg-main" data-bs-dismiss="offcanvas" aria-label="Close">
                            <h6 class="m-0"><i class="fas fa-right text-white"></i>
                            </h6>
                        </button>
                    </div>
                    <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1">
                        <li class="nav-item d-lg-none d-block">
                            <div class="row">
                                <?php if (isset($_SESSION['id'])) : ?>
                                <div class="col-6 mb-2 ms-0">
                                    <a class="nav-link text-center text-main memu-main <?php echo ($_GET['page'] == 'home' ? 'active' : ''); ?>" href="?page=home" style="text-decoration: none;border-radius: 1vh;" role="button">หน้าหลัก</a>
                                </div>

                                <div class="col-6 mb-2">
                                    <a class="nav-link text-center text-main memu-main <?php echo ($_GET['page'] == 'shop' ? 'active' : ''); ?>" href="?page=shop" style="text-decoration: none;border-radius: 1vh;" role="button">สินค้าทั้งหมด</a>
                                </div>

                                <div class="col-6 mb-2">
                                    <a class="nav-link text-center text-main memu-main <?php echo ($_GET['page'] == 'service' ? 'active' : ''); ?>" href="?page=service" style="text-decoration: none;border-radius: 1vh;" role="button">สินค้าสั่งซื้อ</a>
                                </div>

                                <div class="col-6 mb-2">
                                    <a class="nav-link text-center text-main memu-main <?php echo ($_GET['page'] == 'app' ? 'active' : ''); ?>" href="?page=app" style="text-decoration: none;border-radius: 1vh;" role="button">แอพพรีเมี่ยม</a>
                                </div>

                                <div class="col-6 mb-2">
                                    <a class="nav-link text-center text-main memu-main <?php echo ($_GET['page'] == 'spin' ? 'active' : ''); ?>" href="?page=spin" style="text-decoration: none;border-radius: 1vh;" role="button">สุ่มรางวัล</a>
                                </div>

                                <div class="col-6 mb-2">
                                    <a class="nav-link text-center text-main memu-main <?php echo ($_GET['page'] == 'angpao' ? 'active' : ''); ?>" href="?page=angpao" style="text-decoration: none;border-radius: 1vh;" role="button">เติมเงิน</a>
                                </div>

                                <div class="col-6 mb-2">
                                    <a class="nav-link text-center text-main memu-main <?php echo ($_GET['page'] == 'contact' ? 'active' : ''); ?>" href="?page=contact" style="text-decoration: none;border-radius: 1vh;" role="button">ติดต่อ</a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </li>

                        <li class="nav-item d-lg-block d-none ms-lg-3">
                            <a class="nav-link align-self-center text-main hover-main <?php echo ($_GET['page'] == 'home' ? 'active' : ''); ?> me-2" href="/?page=home"><i class="fa-regular fa-house text-main icon-white"></i>&nbsp;หน้าหลัก</a>
                        </li>

                        <style>
                            .btn-groupx, .btn-group-vertical {
                                position: relative;
                                /* display: inline-flex; */
                                vertical-align: middle;
                            }
                        </style>
                        <li class="nav-item d-lg-block d-none">
                        <div class="btn-groupx ms-lg-3">
                            <a class="nav-link hover-main align-self-center dropdown-toggle me-2 <?php echo ($_GET['page'] == 'shop' || $_GET['page'] == 'order' || $_GET['page'] == 'spin' || $_GET['page'] == 'app') ? 'active' : ''; ?>" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="fa-regular fa-store text-main icon-white"></i>&nbsp;สินค้า</a>
                            <ul class="dropdown-menu dropdown-menu-lg-end mt-2 p-2" style="border-radius: 1vh;">
                                <li><a href="/?page=shop" class="dropdown-item hover-main" type="button">สินค้าปกติ</a></li>
                                <li><a href="/?page=order" class="dropdown-item hover-main" type="button">บริการ</a></li>
                                <li><a href="/?page=spin" class="dropdown-item hover-main" type="button">มินิเกม</a></li>
                                <li><a href="/?page=app" class="dropdown-item hover-main" type="button">แอพพรีเมี่ยม</a></li>
                            </ul>
                        </div>
                        </li>

                        <li class="nav-item d-lg-block d-none ms-lg-3">
                            <a class="nav-link align-self-center hover-main <?php echo ($_GET['page'] == 'angpao' ? 'active' : ''); ?> me-2" style="border-radius: 1vh;" href="/?page=angpao"><i class="fa-regular fa-wallet text-main icon-white"></i>&nbsp;เติมเงิน</a>
                        </li>

                        <li class="nav-item d-lg-block d-none ms-lg-3">
                            <a class="nav-link align-self-center hover-main <?php echo ($_GET['page'] == 'contact' ? 'active' : ''); ?> me-2" style="border-radius: 1vh;" href="/?page=contact"><i class="fa-regular fa-headset text-main icon-white"></i>&nbsp;ติดต่อ</a>
                        </li>

                    </ul>
                    <?php
                    if (!isset($_SESSION['id'])) {
                    ?>
                        <ul class="navbar-nav justify-content-center">

                            <a href="?page=login">
                                <button type="button" class="btn w-100 bg-main text-white" style="border-radius: 1vh;" data-bs-toggle="modal" data-bs-target="#modellogin"><i class="fa-regular fa-arrow-right-to-arc" style="color: #ffffff;"></i>&nbsp;เข้าสู่ระบบ</button>
                            </a>

                            <a href="?page=register" class=" ms-1">
                                <button type="button" class="btn w-100" style="background-color:#e5e7e8;color:#9ca3af;border-radius: 1vh;" data-bs-toggle="modal" data-bs-target="#modelregister">สมัครสมาชิก</button>
                            </a>

                        </ul>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item d-lg-block d-none ms-lg-3">
                            <a class="nav-link align-self-center border border-2 me-2 text-main" style="border-radius: 1vh;"><i class="fa-regular fa-wallet text-main icon-white"></i> :&nbsp;<?php echo number_format($user["point"] ,2); ?>฿</a>
                        </li>
                        <li class="nav-item dropdown ms-lg-2" style="list-style: none;">
                            <a class="nav-link text-center dropdown-toggle" style="background-color:var(--main);color:#ffffff;border-radius: 1vh;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                โปรไฟล์
                            </a>
                            <ul class="dropdown-menu bg-glass shadow-sm" style="border-radius: 1vh;" aria-labelledby="navbarDropdown">
                                <div class="input">

                                    <button class="value">
                                        <a href="" class="text-main" style="text-decoration: none;">
                                            <?php if ($user['rank'] == 1) {?>
                                                &nbsp;<i class="fa-regular fa-shield-check text-main"></i>&nbsp;administrator
                                            <?php } elseif($user['rank'] == 0 )  {?>
                                                &nbsp;<i class="fa-regular fa-user text-main"></i>&nbsp;member
                                            <?php } elseif($user['rank'] == 2 )  {?>
                                                &nbsp;<i class="fa-regular fa-user-alien text-main"></i>&nbsp;promember
                                            <?php } elseif($user['rank'] == 3 ) {?>
                                                &nbsp;<i class="fa-regular fa-badge-check text-main"></i>&nbsp;reseller
                                            <?php } ?>
                                        </a>
                                    </button>

                                    <button class="value">
                                        <a href="" class="text-main" style="text-decoration: none;">
                                            &nbsp;<i class="fa-regular fa-cat text-main"></i>&nbsp;ชื่อผู้ใช้ : <?php echo htmlspecialchars(strtoupper($user['username'])); ?>
                                        </a>
                                    </button>
                                    
                                    <button class="value">
                                        <a href="?page=profile" class="text-main" style="text-decoration: none;">
                                            &nbsp;<i class="fa-solid fa-user-circle text-main"></i>&nbsp;เปลี่ยนรหัสผ่าน
                                        </a>
                                    </button>

                                    <button class="value">
                                        <a href="?page=history_order" class="text-main" style="text-decoration: none;">
                                            &nbsp;<i class="fa-solid fa-history text-main"></i>&nbsp;ออเดอร์ของฉัน
                                        </a>
                                    </button>

                                    <button class="value">
                                        <a href="?page=history_buy" class="text-main" style="text-decoration: none;">
                                            &nbsp;<i class="fa-solid fa-history text-main"></i>&nbsp;ประวัติซื้อสินค้า
                                        </a>
                                    </button>

                                    <?php if ($byshop_status == "on") : ?>
                                    <button class="value">
                                        <a href="?page=myapp" class="text-main" style="text-decoration: none;">
                                            &nbsp;<i class="fa-solid fa-history text-main"></i>&nbsp;ประวัติซื้อแอพ
                                        </a>
                                    </button>
                                    <?php endif; ?>

                                    <?php
                                        if ($user["rank"] == "1") {
                                    ?>
                                    <button class="value">
                                        <a href="?page=backend" class="text-main" style="text-decoration: none;">
                                            &nbsp;<i class="fa-solid fa-gears text-main"></i>&nbsp;จัดการหลังร้าน
                                        </a>
                                    </button>
                                    <?php } ?>

                                    <button class="value">
                                        <a href="?page=logout" class="text-main" style="text-decoration: none;">
                                            &nbsp;<i class="fa-regular fa-power-off text-main"></i>&nbsp;ออกจากระบบ
                                        </a>
                                    </button>

                                </div>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                </div>
                </div>
            </div>
        </nav>
        </div>

        <?php
        function admin($user)
        {
            if (isset($_SESSION['id']) && $user["rank"] == "1") {
                return true;
            } else {
                return false;
            }
        }
        if (isset($_GET['page']) && $_GET['page'] == "home") {
            require_once('page/simple.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == "login" && !isset($_SESSION['id'])) {
            require_once('page/login.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == "logout" && isset($_SESSION['id'])) {
            session_destroy();
            echo "<script>window.location.href = '';</script>";
        } elseif (isset($_GET['page']) && $_GET['page'] == "profile" && isset($_SESSION['id'])) {
            require_once('page/profile.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == "angpao") {
            if (isset($_SESSION['id'])) {
                require_once('page/topup/angpao.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "payment") {
            if (isset($_SESSION['id'])) {
                require_once('page/payment.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "contact") {
            require_once('page/contact.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == "slip") {
            if (isset($_SESSION['id'])) {
                require_once('page/topup/slip.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "c_recom_manage") {
            if (isset($_SESSION['id'])) {
                require_once('page/c_recom_manage.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "connect") {
            if (isset($_SESSION['id'])) {
                require_once('page/connect.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "service_manage_main") {
            if (isset($_SESSION['id'])) {
                require_once('page/service_manage_main.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "redeem") {
            if (isset($_SESSION['id'])) {
                require_once('page/topup/redeem.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "order") {
            if (isset($_SESSION['id'])) {
                require_once('page/service.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "id") {
            if (isset($_SESSION['id'])) {
                require_once('page/id.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "information") {
            if (isset($_SESSION['id'])) {
                require_once('page/information.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "gp") {
            if (isset($_SESSION['id'])) {
                require_once('page/gp.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "product" && isset($_GET['id'])) {
            if (isset($_SESSION['id'])) {
                require_once('page/product.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "slidebloxfruit") {
            if (isset($_SESSION['id'])) {
                require_once('page/csgo_1.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "id_p" && isset($_GET['id'])) {
            if (isset($_SESSION['id'])) {
                require_once('page/id_p.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "spin") {
            if (isset($_SESSION['id'])) {
                require_once('page/random_wheel.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "play" && isset($_GET['wheel'])) {
            if (isset($_SESSION['id'])) {
                require_once('page/play.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "history_buy") {
            if (isset($_SESSION['id'])) {
                require_once('page/history.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "history_log") {
            if (isset($_SESSION['id'])) {
                require_once('page/history_log.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "shop") {
            if (isset($_SESSION['id'])) {
                require_once('page/shop.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "category") {
            if (isset($_SESSION['id'])) {
                require_once('page/category.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "category") {
            if (isset($_SESSION['id'])) {
                require_once('page/category.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "shop_manage") {
            if (isset($_SESSION['id'])) {
                require_once('page/shop_manage.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "buy") {
            if (isset($_SESSION['id'])) {
                require_once('page/buy.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "service_buy") {
            if (isset($_SESSION['id'])) {
                require_once('page/service_buy.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "history_order") {
            if (isset($_SESSION['id'])) {
                require_once('page/my_order.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "error") {
            if (isset($_SESSION['id'])) {
                require_once('page/error.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "service_manage_cate") {
            if (isset($_SESSION['id'])) {
                require_once('page/service_manage_cate.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "app") {
            if (isset($_SESSION['id'])) {
                require_once('page/byshopapp.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "buyapp") {
            if (isset($_SESSION['id'])) {
                require_once('page/buyapp.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "myapp") {
            if (isset($_SESSION['id'])) {
                require_once('page/myapp.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "otp_disney") {
            if (isset($_SESSION['id'])) {
                require_once('page/otp/otp_disney.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "otp_trueid") {
            if (isset($_SESSION['id'])) {
                require_once('page/otp/otp_trueid.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "otp_aisplay") {
            if (isset($_SESSION['id'])) {
                require_once('page/otp/otp_aisplay.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "otp_beinsports") {
            if (isset($_SESSION['id'])) {
                require_once('page/otp/otp_beinsports.php');
            } else {
                require_once('page/login.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == "register" && !isset($_SESSION['id'])) {
            require_once('page/register.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_his") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "user_edit") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "topup_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "service_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "product_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "manage_theme") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "manage_howto") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "stock_manage" && $_GET['id'] != "") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "wheel_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "wheel_cate") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "wheel") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "stock_wheel" && $_GET['id'] != "") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "code_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "category_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend_buy_history") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend_topup_history") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "backend_app_history") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "carousel_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "recom_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "crecom_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "slip_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "website") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_success") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_unsuccess") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_temp") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "payment_manage") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_success") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_unsuccess") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "order_temp") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "apibyshop") {
            require_once('page/backend/menu_manage.php');
        } elseif (admin($user) && isset($_GET['page']) && $_GET['page'] == "apibyshop_manage") {
            require_once('page/backend/menu_manage.php');
        } else {
            // require_once('page/simple.php');
            require_once('page/simple.php');
        }
        ?>
        <br />
        <footer class="text-center text-secondary fw-bold mb-3" style="position: relative;margin-top: auto;margin-top: 5em;">
            <p class="m-0 mb-2 mb-lg-0" style="font-size: 15px;color: var(--font);">© 2023 <?php echo $config['name']; ?> All Rights Reserved</p>
            <div class="d-lg-flex m-auto" style="width: fit-content;">
                <p class="m-0 mb-2 mb-lg-0" style="font-size: 15px;color: var(--font);"><i class="fa-regular fa-cat fa-fade" stylr="color: var(--font);"></i> XDNVC - xdnvc cloud</p>
                <p class="d-lg-block d-none mb-2 mb-lg-0">&nbsp;&nbsp;|</p>
                <a href="https://www.facebook.com/profile.php?id=100089755431618" target="_blank" class="scam-badge ps-2" style="color: var(-font);text-decoration: none;color: red;">
                    <i class="bx bx-shield-minus" stylr="color: var(--font);"></i>รายงานสแกม / การโกง
                </a>
            </div>
        </footer> 
        <style>
            .navbar-mobile {
                display: none;
            }

            @media (max-width: 575.98px) {
                .navbar-mobile {
                    display: block;
                    background-color: rgba(248, 249, 250, 0.91);
                    border-radius: 1rem 1rem 0 0 !important;
                    width: 100%;
                    position: fixed;
                    left: 50%;
                    bottom: 0;
                    -webkit-transform: translateX(-50%);
                    transform: translateX(-50%);
                    z-index: 99999;
                    padding: 0.5rem 2rem;
                    -webkit-box-shadow: 0 1rem 3rem rgba(29, 58, 83, 0.5);
                    box-shadow: 0 1rem 3rem rgba(29, 58, 83, 0.5);
                }
                .navbar-mobile .navbar-nav {
                    -webkit-box-orient: horizontal;
                    -webkit-box-direction: normal;
                    -ms-flex-direction: row;
                    flex-direction: row;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-pack: justify !important;
                    -ms-flex-pack: justify !important;
                    justify-content: space-between !important;
                }
                .navbar-mobile .nav-item {
                    text-align: center;
                }
                .navbar-mobile .nav-item .nav-link {
                    font-size: 1.3rem;
                    color: #191b1d;
                    padding: 0;
                }
                .navbar-mobile .nav-item .nav-link.active, .navbar-mobile .nav-item .nav-link :hover {
                    color: var(--font);
                }
                .navbar-mobile .nav-item .nav-link .nav-text {
                    font-size: 0.6em;
                    color: #191b1d;
                    display: block;
                }
                .navbar-mobile .nav-item .nav-link .nav-icon {
                    color: #191b1d;
                }
                .navbar-mobile .nav-item .nav-link.active .nav-text {
                    font-size: 0.6em;
                    color: var(--font);
                    display: block;
                }
                .navbar-mobile .nav-item .nav-link.active .nav-icon {
                    color: var(--font);
                }
            }
            @media (max-width: 575.98px) {
                .has-navbar-mobile footer {
                    padding-bottom: 4rem !important;
                }
            }

        </style>
        <div class="navbar navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['page'] == 'home' ? 'active' : ''); ?>" href="?page=home"><i class="bi bi-house-door fa-fw nav-icon"></i>
                        <span class="mb-0 nav-text">หน้าหลัก</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['page'] == 'angpao' ? 'active' : ''); ?>" href="?page=angpao"><i class="bi bi-cash-coin fa-fw nav-icon"></i>
                        <span class="mb-0 nav-text">เติมเงิน</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['page'] == 'shop' ? 'active' : ''); ?>" href="?page=shop"><i class="bi bi-cart3 fa-fw nav-icon"></i>
                        <span class="mb-0 nav-text">เลือกดูสินค้า</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['page'] == 'contact' ? 'active' : ''); ?>" href="?page=contact" target="_blank"><i class="bi bi-messenger fa-fw nav-icon"></i>
                        <span class="mb-0 nav-text">ติดต่อ</span>
                    </a>
                </li>
            </ul>
        </div>
            <script>
                async function shake_alert(status, result) {
                    if (status) {
                        if (result.salt == "prize") {
                            // await GShake();
                            Swal.fire({
                                icon: 'success',
                                title: 'สำเร็จ',
                                text: result.message
                            }).then(function() {
                                window.location = "?page=history_buy";
                            });
                        } else {
                            await GShake();
                            Swal.fire({
                                icon: 'error',
                                title: 'เสียใจด้วย',
                                text: result.message
                            });
                        }
                    } else {
                        if (result.salt == "salt") {
                            // await GShake();
                            Swal.fire({
                                icon: 'error',
                                title: 'เสียใจด้วย',
                                text: result.message
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'ผิดพลาด',
                                text: result.message
                            });
                        }
                    }
                }
                function buybox() {
                    var name = $("#shop-btn").attr("data-name");
                    var price = $("#shop-btn").attr("data-price");
                    var count = $("#b_count").val();
                    var formData = new FormData();
                    formData.append('id', $("#shop-btn").attr("data-id"));
                    formData.append('count', count);
                    Swal.fire({
                        title: 'ยืนยันการสั่งซื้อ?',
                        text: name + " " + count + " ชิ้น " + " ราคา " + price * count + " บาท ",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ซื้อเลย'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                url: 'services/buybox.php',
                                data: formData,
                                contentType: false,
                                processData: false,
                                beforeSend: function() {
                                    $('#btn_buyid').attr('disabled', 'disabled');
                                    $('#btn_buyid').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>รอสักครู่...');
                                },
                            }).done(function(res) {
                                console.log(res)
                                result = res;
                                // await GShake();
                                shake_alert(true, result);
                                console.clear();
                                $('#btn_buyid').html('<i class="fas fa-shopping-cart mr-1"></i>สั่งซื้อสินค้า');
                                $('#btn_buyid').removeAttr('disabled');
                            }).fail(function(jqXHR) {
                                console.log(jqXHR)
                                res = jqXHR.responseJSON;
                                shake_alert(false, res);

                                $('#btn_buyid').html('<i class="fas fa-shopping-cart mr-1"></i>สั่งซื้อสินค้า');
                                $('#btn_buyid').removeAttr('disabled');
                            });
                        }
                    })
                }
            </script>
            <script>
                AOS.init();
            </script>
            <script>
                <?php if ($_GET['page'] == "home" || $_GET['page'] == "shop" || $_GET['page'] == "app") : ?>
                    UpdateStock();
                <?php endif; ?>
                function UpdateStock(){
                    $.get( "services/update_byshop.php",  function( data ) {
                        $("#btn").prop("disabled", true);
                        $( "#return" ).html( data );
                        $("#btn").prop("disabled", false); 
                    }
                    );
                }
            </script>

            <style>
            .loading {
                display: flex;
                align-items: center;
                justify-content: center;
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                width: 100%;
                z-index: 9999;
                background: linear-gradient(135deg, rgba(248, 249,250 , 8.5)  ,  rgba(248, 249,250 , 0.3)  );
                backdrop-filter: blur(30px);
                -webkit-backdrop-filter: blur(30px);
                box-shadow: 0 8px 32px 0 rgba(0,0,0,0.37);
            }
            .main-content {
                display: none;
            }
            .dots-container {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .dot {
                height: 20px;
                width: 20px;
                margin-right: 10px;
                border-radius: 10px;
                background-color: var(--main);
                animation: pulse 1.5s infinite ease-in-out;
            }
            .dot:last-child {
                margin-right: 0;
            }
            .dot:nth-child(1) {
                animation-delay: -0.3s;
            }
            .dot:nth-child(2) {
                animation-delay: -0.1s;
            }
            .dot:nth-child(3) {
                animation-delay: 0.1s;
            }
            @keyframes pulse {
                0% {
                    transform: scale(0.8);
                    background-color: var(--main);
                    box-shadow: 0 0 0 0 var(--main, 0.7);
                }
                50% {
                    transform: scale(1.2);
                    background-color: var(--main);
                    box-shadow: 0 0 0 10px var( 0);
                }

                100% {
                    transform: scale(0.8);
                    background-color: var(--main);
                    box-shadow: 0 0 0 0 var(--main, 0.7);
                }
            }
        </style>
        <section class="loading">
            <div class="dots-container">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </section>
        <script>
            const loadingTime = 1000; // เวลาในหน่วยมิลลิวินาที

            window.addEventListener('load', function() {
            setTimeout(function() {
                document.querySelector('.loading').style.display = 'none';
                document.querySelector('.main-content').style.display = 'block';
            }, loadingTime);
            });
        </script>

    </body>
    </html>
    <?php
} else {
    require_once('home.php');
}
?>  