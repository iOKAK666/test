<link rel="stylesheet" href="services/styles/xdnvc.css">
<div class="container-sm p-1" data-aos="<?php echo $anim; ?>" data-aos-duration="800">

    <div class="container-fluid mt-0 p-0 " data-aos="<?php echo $anim; ?>" data-aos-duration="600">
        <div class="container pt-0 pb-0 m-cent">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="border-radius: 1vh;">
                <div class="carousel-inner" style="border-radius: 1vh;">
                    <?php
                    $active = false;
                    $find = dd_q("SELECT * FROM carousel");
                    while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="carousel-item <?php if (!$active) {
                                                        echo "active";
                                                        $active = true;
                                                    } ?>">
                            <img src="<?php echo $row['link'] ?>" class="d-block w-100" alt="..." style="border-radius: 1vh;">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-sm p-4" data-aos="<?php echo $anim; ?>" data-aos-duration="600">

        <div class="">
            <div class="w-100 bg-glass shadow-sm ps-0 pe-1 pe-lg-4 align-contant-center" style="border-radius: 1vh;">
                <div class="row p-1">
                    <div class="col-6 col-lg-2 text-main">
                        <div class="p-2" style="border-radius: 1vh;background-color: var(--main);font-weight: 600; font-size: 18px;">
                            <p class="font-semibold text-center text-white m-0">อัพเดตข่าวสาร</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-10 p-0 text-main" style="margin-top: 2.5px;">
                        <marquee class="mt-2"><?= $config['ann'] ?></marquee>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2" style="border-radius: 1vh;" data-aos="<?php echo $anim; ?>" data-aos-duration="800">

            <div data-aos="zoom-in-up" data-aos-delay="150" data-aos-duration="500" class="row mt-3 aos-init aos-animate">
                <div class="col-6 col-lg-3 pe-3 mb-2 zoom">
                    <a href="<?= $config['posterink1'] ?>">
                        <img class="banner-show" src="<?= $config['posterimg1'] ?>" alt="">
                    </a>
                </div>
                <div class="col-6 col-lg-3 pe-3 mb-2 zoom">
                    <a href="<?= $config['posterink2'] ?>">
                        <img class="banner-show" src="<?= $config['posterimg2'] ?>" alt="">
                    </a>
                </div>
                <div class="col-6 col-lg-3 pe-3 mb-2 zoom">
                    <a href="<?= $config['posterink3'] ?>">
                        <img class="banner-show" src="<?= $config['posterimg3'] ?>" alt="">
                    </a>
                </div>
                <div class="col-6 col-lg-3 pe-3 mb-2     zoom">
                    <a href="<?= $config['posterink4'] ?>">
                        <img class="banner-show" src="<?= $config['posterimg4'] ?>" alt="">
                    </a>
                </div>
            </div>

        </div>

        <center>
            <div class="col-12 col-lg-12 p-2 mb-2" style="border-radius: 1vh;">
                <div class="d-lg-flex justify-content-between align-items-center">
                    <div class="text-center text-lg-start">
                        <h3 class=" mt-2 mb-0 font-bold"><b class="text-main-gra">หมวดหมู่แนะนำ</b></h3>
                        <h6 class=" mb-0" style="color: rgb(156 163 175);">Recommended Category</h6>
                    </div>
                </div>
            </div>
        </center>
            
            <style>
                .cc {
                    width: 100%;
                    max-width: 250px;
                }

                @media only screen and (max-width: 1000px) {
                    .cc {
                        width: 100%;
                        max-width: 100vh;
                    }
                }
            </style>

            <div class="row justify-content-center justify-content-lg-start">
                        
                <?php
                $check = dd_q("SELECT * FROM crecom WHERE recom_1 != 0 AND recom_2 != 0 AND recom_3 != 0 AND recom_4 != 0"); #44444
                //$check = dd_q("SELECT * FROM crecom WHERE recom_1 != 0 AND recom_2 != 0");
                if ($check->rowCount() == 1) {
                    $data = $check->fetch(PDO::FETCH_ASSOC);
                    for ($i = 1; $i <= 4; $i++) {
                        $recom = "recom_" . $i;
                        $find = dd_q("SELECT * FROM category WHERE c_id = ? ", [$data[$recom]]);
                        $row = $find->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-12 col-lg-6 mb-3">
                    <a href="?page=shop&category=<?= htmlspecialchars($row['c_name']) ?>">
                        <div class="img-anim content w-100">
                            <img class="bg" src="<?= htmlspecialchars($row['img']) ?>">
                            <div class="text font-bold">
                                <?= htmlspecialchars($row['des']) ?>
                            </div>
                        </div>
                    </a>
                </div>
                    <?php
                    }
                } else {
                    ?>
                    <?php
                    $find = dd_q("SELECT * FROM category ORDER BY RAND() LIMIT 4");
                    while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-12 col-lg-6 mb-3">
                        <a href="?page=shop&category=<?= htmlspecialchars($row['c_name']) ?>">
                            <div class="img-anim content w-100">
                                <img class="bg" src="<?= htmlspecialchars($row['img']) ?>">
                                <div class="text font-bold">
                                    <?= htmlspecialchars($row['des']) ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php }
                } ?>

                <?php
                    $find = dd_q("SELECT * FROM service_cate ORDER BY RAND() LIMIT 4");
                    while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="col-12 col-lg-6 mb-3">
                    <a href="?page=order&category=<?= htmlspecialchars($row['name']) ?>">
                        <div class="img-anim content w-100">
                            <img class="bg" src="<?= htmlspecialchars($row['img']) ?>">
                            <div class="text font-bold">
                                <?= htmlspecialchars($row['des']) ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>

            </div>

            <center>
                <div class="col-12 col-lg-12  p-2 mb-2" style="border-radius: 1vh;">
                    <div class="d-lg-flex justify-content-between">
                        <div class="text-center text-lg-start">
                            <h3 class=" mt-2 mb-0"><b class="text-main-gra font-bold">สินค้าแนะนำ</b></h3>
                            <h6 class=" mb-0" style="color: rgb(156 163 175);">Recommended Product</h6>
                        </div>
                    </div>
                </div>
            </center>
    
        

            <style>
                .cc {
                    width: 100%;
                    max-width: 254.4px;
                }

                @media only screen and (max-width: 1000px) {
                    .cc {
                        width: 100%;
                        max-width: 50vh;
                    }
                }

                .card-anim-main {
                    border: 1px solid #ffffff00;
                    transition: all .5s ease;
                }

                .border-hov {
                    border: 1px solid #ccc;
                    transition: 0.3s ease-in-out;
                }

                .card-anim:hover .card-anim-main {
                    border: 1px solid var(--main);
                }
            </style>
            <div class="row justify-content-center">
                <?php
                $check = dd_q("SELECT * FROM recom WHERE recom_1 != 0 AND recom_2 != 0 AND recom_3 != 0 AND recom_4 != 0 AND recom_5 != 0 AND recom_6 != 0 AND recom_7 != 0 AND recom_8 != 0 AND recom_9 != 0 AND recom_10 != 0");
                if ($check->rowCount() == 1) {
                    $data = $check->fetch(PDO::FETCH_ASSOC);
                    for ($i = 1; $i <= 10; $i++) {
                        $recom = "recom_" . $i;
                        $find = dd_q("SELECT * FROM box_product WHERE id = ? ", [$data[$recom]]);
                        $row = $find->fetch(PDO::FETCH_ASSOC);
                        $stock = dd_q("SELECT * FROM box_stock WHERE p_id = ? ", [$row["id"]]);
                        $count = $stock->rowCount();
                        if ($count  == NULL) {
                            $count = 0;
                        }
                ?>
                    <?php if ($count >= 1) {?>
                        <div class="col-6 col-lg-3 mb-4 cc justify-content-center" style="" data-aos="<?php echo $anim; ?>" data-aos-duration="800">
                            <div class="card-anim">
                                <div class="card-anim-main <?php echo $bg?> shadow-sm p-1" style="border-radius: 1vh; height: fit-content;">
                                    <div class="p-1">
                                        <a href="?page=buy&id=<?= $row['id'] ?>">
                                            <div class="view overlay">
                                                <center>
                                                    <img class="img-fluid " src="<?php echo htmlspecialchars($row["img"]); ?>" style="border-radius: 1vh; width: 100%; max-width: 100vh;">
                                                </center>
                                                <a href="#!">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                            <div class="p-3 pt-3 pb-1">
                                                <h5 class="text-strongest mb-1" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="text-main align-self-end pd-sm-font"><strong>คงเหลือ <?php echo $count; ?> ชิ้น</strong></p>
                                                    <div>
                                                        <?php if ($user['rank'] == 1) {?>
                                                            <p class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price']); ?> ฿ </p>
                                                        <?php } elseif($user['rank'] == 0 )  {?>
                                                            <p class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price']); ?> ฿ </p>
                                                        <?php } elseif($user['rank'] == 3 ) {?>
                                                            <p class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price_web']); ?> ฿ </p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <center>
                                                    <a class="btn-main btn w-100 pd-sm-font mb-2 font-semibold text-main" href="?page=buy&id=<?= $row['id'] ?>" style="border-radius: 10px;">สั่งซื้อตอนนี้เลย </a>
                                                </center>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else {?>
                        <div class="col-6 col-lg-3 mb-4 cc justify-content-center" style="" data-aos="<?php echo $anim; ?>" data-aos-duration="800">
                            <div class="card-anim">
                                <div class="card-anim-main <?php echo $bg?> shadow-sm p-1" style="border-radius: 1vh; height: fit-content;">
                                    <div class="opacity-50 p-1">
                                        <a>
                                            <div class="view overlay">
                                                <center>
                                                    <img class="img-fluid " src="<?php echo htmlspecialchars($row["img"]); ?>" style="border-radius: 1vh; width: 100%; max-width: 100vh;">
                                                </center>
                                                <a href="#!">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                            <div class="p-3 pt-3 pb-1">
                                                <h5 class="text-strongest mb-1" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="text-main align-self-end pd-sm-font"><strong>สินค้าหมด</strong></p>
                                                    <div >
                                                        <?php if ($user['rank'] == 1) {?>
                                                            <a class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="text-decoration: none;border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price']); ?> ฿ </a>
                                                        <?php } elseif($user['rank'] == 0 )  {?>
                                                            <a class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="text-decoration: none;border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price']); ?> ฿ </a>
                                                        <?php } elseif($user['rank'] == 3 ) {?>
                                                            <a class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="text-decoration: none;border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price_web']); ?> ฿ </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <center>
                                                    <a class="bg-main text-white btn w-100 pd-sm-font mb-2 font-semibold" style="border-radius: 10px;">สินค้าหมดรอเติม <i class="fa-light fa-spinner fa-spin" style="color: #ffffff;"></i></a>
                                                </center>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    <?php
                    }
                } else {
                    ?>
                    <?php
                    $find = dd_q("SELECT * FROM box_product ORDER BY id DESC LIMIT 8");
                    while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
                        $stock = dd_q("SELECT * FROM box_stock WHERE p_id = ? ", [$row["id"]]);
                        $count = $stock->rowCount();
                        if ($count  == NULL) {
                            $count = 0;
                        }
                    ?>

                    <?php if ($count >= 1) {?>
                        <div class="col-6 col-lg-3 mb-4 cc justify-content-center" style="" data-aos="<?php echo $anim; ?>" data-aos-duration="800">
                            <div class="card-anim">
                                <div class="card-anim-main <?php echo $bg?> shadow-sm p-1" style="border-radius: 1vh; height: fit-content;">
                                    <div class="p-1">
                                        <a href="?page=buy&id=<?= $row['id'] ?>">
                                            <div class="view overlay">
                                                <center>
                                                    <img class="img-fluid " src="<?php echo htmlspecialchars($row["img"]); ?>" style="border-radius: 1vh; width: 100%; max-width: 100vh;">
                                                </center>
                                                <a href="#!">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                            <div class="p-3 pt-3 pb-1">
                                                <h5 class="text-strongest mb-1" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="text-main align-self-end pd-sm-font"><strong>คงเหลือ <?php echo $count; ?> ชิ้น</strong></p>
                                                    <div>
                                                        <?php if ($user['rank'] == 1) {?>
                                                            <p class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price']); ?> ฿ </p>
                                                        <?php } elseif($user['rank'] == 0 )  {?>
                                                            <p class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price']); ?> ฿ </p>
                                                        <?php } elseif($user['rank'] == 3 ) {?>
                                                            <p class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price_web']); ?> ฿ </p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <center>
                                                    <a class="btn-main btn w-100 pd-sm-font mb-2 font-semibold text-main" href="?page=buy&id=<?= $row['id'] ?>" style="border-radius: 10px;">สั่งซื้อตอนนี้เลย </a>
                                                </center>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else {?>
                        <div class="col-6 col-lg-3 mb-4 cc justify-content-center" style="" data-aos="<?php echo $anim; ?>" data-aos-duration="800">
                            <div class="card-anim">
                                <div class="card-anim-main <?php echo $bg?> shadow-sm p-1" style="border-radius: 1vh; height: fit-content;">
                                    <div class="opacity-50 p-1">
                                        <a>
                                            <div class="view overlay">
                                                <center>
                                                    <img class="img-fluid " src="<?php echo htmlspecialchars($row["img"]); ?>" style="border-radius: 1vh; width: 100%; max-width: 100vh;">
                                                </center>
                                                <a href="#!">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                            <div class="p-3 pt-3 pb-1">
                                                <h5 class="text-strongest mb-1" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="text-main align-self-end pd-sm-font"><strong>สินค้าหมด</strong></p>
                                                    <div >
                                                        <?php if ($user['rank'] == 1) {?>
                                                            <a class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="text-decoration: none;border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price']); ?> ฿ </a>
                                                        <?php } elseif($user['rank'] == 0 )  {?>
                                                            <a class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="text-decoration: none;border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price']); ?> ฿ </a>
                                                        <?php } elseif($user['rank'] == 3 ) {?>
                                                            <a class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="text-decoration: none;border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price_web']); ?> ฿ </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <center>
                                                    <a class="bg-main text-white btn w-100 pd-sm-font mb-2 font-semibold" style="border-radius: 10px;">สินค้าหมดรอเติม <i class="fa-light fa-spinner fa-spin" style="color: #ffffff;"></i></a>
                                                </center>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>

                    <?php } ?>
                <?php
                }
                ?>

        </div>
        <center>
            <div class="col-12 col-lg-12 p-2 mb-2" style="border-radius: 1vh;">
                <div class="d-lg-flex justify-content-between align-items-center">
                    <div class="text-center text-lg-start">
                        <h3 class=" mt-2 mb-0 font-bold"><b class="text-main-gra">รายละเอียดเว็บไซต์</b></h3>
                        <h6 class=" mb-0" style="color: rgb(156 163 175);">Website Details</h6>
                    </div>
                </div>
            </div>
        </center>
        <?php
        $boxlog = dd_q("SELECT * FROM users");
        $m_count = $boxlog->rowCount() + $static['m_count'];

        $boxlog = dd_q("SELECT * FROM category");
        $c_count = $boxlog->rowCount() + $static['c_count'];

        $boxlog = dd_q("SELECT * FROM box_stock");
        $s_count = $boxlog->rowCount() + $static['s_count'];

        $boxlog = dd_q("SELECT * FROM boxlog");
        $b_count = $boxlog->rowCount() + $static['b_count'];

        ?>
        <div class="">
            <div class="row justify-content-center">

                <div class="col-12 col-lg-3 mb-2">
                    <div data-group="true" class="css-card <?php echo $bg?> shadow-sm">
                        <div class="css-iconc">
                            <i class="fa-regular fa-user" style="color:var(--main);font-size: 70px;"></i>
                        </div>
                        <p class="chakra-text css-textc">ผู้ใช้ทั้งหมด</p>
                        <h2 class="chakra-heading css-numc"><?php echo $m_count; ?> <span class="chakra-text css-5rec9s">คน</span></h2>
                    </div>
                </div>

                <div class="col-12 col-lg-3 mb-2">
                    <div data-group="true" class="css-card <?php echo $bg?> shadow-sm">
                        <div class="css-iconc">
                            <i class="fa-regular fa-list" style="color:var(--main);font-size: 70px;"></i>
                        </div>
                        <p class="chakra-text css-textc">หมวดหมู่</p>
                        <h2 class="chakra-heading css-numc"><?php echo $c_count; ?> <span class="chakra-text css-5rec9s">หมวด</span></h2>
                    </div>
                </div>

                <div class="col-12 col-lg-3 mb-2">
                    <div data-group="true" class="css-card <?php echo $bg?> shadow-sm">
                        <div class="css-iconc">
                            <i class="fa-regular fa-box-taped" style="color:var(--main);font-size: 70px;"></i>
                        </div>
                        <p class="chakra-text css-textc">พร้อมจำหน่าย</p>
                        <h2 class="chakra-heading css-numc"><?php echo $s_count; ?> <span class="chakra-text css-5rec9s">ชิ้น</span></h2>
                    </div>
                </div>

                <div class="col-12 col-lg-3 mb-2">
                    <div data-group="true" class="css-card <?php echo $bg?> shadow-sm">                        
                        <div class="css-iconc">
                            <i class="fa-regular fa-box-circle-check" style="color:var(--main);font-size: 70px;"></i>
                        </div>
                        <p class="chakra-text css-textc">ขายแล้วทั้งหมด</p>
                        <h2 class="chakra-heading css-numc"><?php echo $b_count; ?> <span class="chakra-text css-5rec9s">ชิ้น</span></h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="services/js/countup.js"></script>
</div>