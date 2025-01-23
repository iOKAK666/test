<div class="container-fluid p-0 ">
    <div class="container-sm m-auto p-0 pt-4 ">
        <div class="container-sm ">
            <div class="container-fluid">
                <div class="container-fluid" data-aos="<?php echo $anim; ?>">
                
                    <?php if (!isset($_GET['category'])) : ?>

                        <center>
                            <div class="col-12 col-lg-12 p-2 mb-2" style="border-radius: 1vh;">
                                <div class="d-lg-flex justify-content-between align-items-center">
                                    <div class="text-center text-lg-start">
                                        <h3 class=" mt-2 mb-0 font-bold"><b class="text-main-gra">หมวดหมู่บริการทั้งหมด</b></h3>
                                        <h6 class="mt-1">
                                            <a href="?page=home" class="text-main" style="text-decoration: none;">หน้าหลัก</a>
                                                <a style="color: rgb(156 163 175);"> / </a>
                                            <a style="color: rgb(156 163 175);">หมวดหมู่บริการ</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </center>

                    <?php else : ?>
                        <?php
                        if (empty($_GET['category'])) {
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                            exit;
                        }

                        $category = htmlspecialchars($_GET['category']);
                        $cfind = dd_q("SELECT * FROM service_cate WHERE name = ?", [$category]);
                        $check = $cfind->rowCount();

                        if ($check == 0) {
                            echo '<h6 class="text-center">ไม่พบรูปภาพ / ระบบผิดพลาด</h6>';
                        } else {
                            while ($row = $cfind->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <img src="<?= htmlspecialchars($row['img']) ?>" class="d-block w-100" alt="<?= htmlspecialchars($row['name']) ?>" style="border-radius: 1vh;">
                                <?php
                            }
                        }
                        ?>
                        <center>
                            <div class="col-12 col-lg-12 p-2 mb-2" style="border-radius: 1vh;">
                                <div class="d-lg-flex justify-content-between align-items-center">
                                    <div class="text-center text-lg-start">
                                        <h3 class=" mt-2 mb-0 font-bold"><b class="text-main-gra"><?= htmlspecialchars($_GET['category']); ?></b></h3>
                                        <h6 class="mt-1">
                                            <a href="?page=home" class="text-main" style="text-decoration: none;">หน้าหลัก</a>
                                                <a style="color: rgb(156 163 175);"> / </a>
                                            <a style="color: rgb(156 163 175);">หมวดหมู่บริการ</a>
                                                <a style="color: rgb(156 163 175);"> / </a>
                                            <a style="color: rgb(156 163 175);"><?= htmlspecialchars($_GET['category']); ?></a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </center>
                                            
                    <?php endif ?>
                    <div class="row justify-content-center justify-content-lg-start">
                        <?php if (!isset($_GET['category'])) {
                            $cfind = dd_q("SELECT * FROM service_cate ");
                            $check = $cfind->rowCount();
                            if ($check  == NULL) {
                                echo '<h6 class=" text-center">ไม่มีบรืการในตอนนี้</h6>';
                            } elseif ($_GET['category'] == NULL) {
                                header('Location: ' . $_SERVER['HTTP_REFERER']);
                            }
                            while ($row = $cfind->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <style>
                            .font-bold {
                                font-weight: 700;
                            }
                            .font-semibold {
                                font-weight: 600;
                            }  
                            .img-anim {
                                position: relative;
                                text-align: center;
                                overflow: hidden;
                                border-radius: 1vh;
                            }

                            .img-anim img {
                                width: 100%;
                                height: auto;
                                margin-left: auto;
                            }

                            .img-anim>img {
                                background-size: cover;
                                background-position: center;
                                transition: all 0.3s ease;
                            }

                            .img-anim>div.bg {
                                position: absolute;
                                z-index: 2;
                                opacity: 0;
                                width: 100%;
                                height: 100%;
                                background-color: rgba(1, 1, 1, 0.3);
                                transition: all 0.3s ease;
                            }

                            .img-anim>div.text {
                                position: absolute;
                                z-index: 3;
                                top: 120%;
                                left: 50%;
                                opacity: 0;
                                color: #fff;
                                font-size: 20px;
                                border-bottom: 1.5px solid transparent;
                                border-image: linear-gradient(to right, var(--main), var(--main));
                                border-image-slice: 1;
                                transform: translate(-50%, -50%);
                                transition: all 0.3s ease;
                            }

                            .img-anim:hover>img {
                                transform: scale(1.1);
                            }

                            .img-anim:hover>div {
                                opacity: 1;
                            }

                            .img-anim:hover>div.text {
                                top: 80%;
                                opacity: 1;
                            }

                            .content {
                                height: auto;
                                border: 2px solid rgba(0, 0, 0, .3);
                                transition: all .5s ease;
                            }

                            .content:hover {
                                border: 1.5px solid var(--main);
                            }

                        </style>  


                                <div class="col-12 col-lg-6  mb-3">
                                    <a href="?page=order&category=<?= htmlspecialchars($row['name']) ?>">
                                        <div class="img-anim content w-100">
                                            <img class="bg" src="<?= htmlspecialchars($row['img']) ?>">
                                            <div class="text font-semibold">
                                                <?= htmlspecialchars($row['des']) ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php
                        } else {
                            $find = dd_q("SELECT * FROM service_prod WHERE cate = ? ORDER BY id DESC", [$_GET['category']]);
                            while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
                                
                            ?>

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

                            <div class="col-6 col-lg-3 mb-4 cc justify-content-center" style="" data-aos="<?php echo $anim; ?>" data-aos-duration="800">
                                <div class="card-anim">
                                    <div class="card-anim-main <?php echo $bg?> shadow-sm p-1" style="border-radius: 1vh; height: fit-content;">
                                        <div class="p-1">
                                            <a href="?page=service_buy&id=<?= $row['id'] ?>">
                                                <div class="view overlay">
                                                    <center>
                                                        <img class="img-fluid " src="<?php echo htmlspecialchars($row["img"]); ?>" style="border-radius: 1vh; width: 100%; max-width: 100vh;">
                                                    </center>
                                                    <a href="#!">
                                                        <div class="mask rgba-white-slight"></div>
                                                    </a>
                                                </div>

                                                <div class="p-3 pt-3 pb-1">
                                                    <center><h5 class="text-strongest mb-1" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h5></center>
                                                    <div class="d-flex justify-content-between">
                                                        <p class="text-main align-self-end pd-sm-font"><strong><?php echo number_format($row['price'], 2); ?></strong></p>
                                                        <div>
                                                            <p class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="border-radius: 1vh; padding-top: 3px;">บาท</p>
                                                        </div>
                                                    </div>

                                                    <style>
                                                        .btn-main {
                                                            color: var(--main);
                                                            background: var(--main-30);
                                                            border: 1px solid var(--main);
                                                            transition: all .5s ease;
                                                        }
                                                        .btn-main.active {
                                                            color: white;
                                                            background-color: var(--main);
                                                            border: 1px solid var(--main);
                                                        }

                                                        .btn-main.active i {
                                                            color: white !important;
                                                        }

                                                        .btn-main:hover {
                                                            color: white;
                                                            background-color: var(--main);
                                                            border: 1px solid var(--main);
                                                        }
                                                        @media only screen and (max-width: 500px) {
                                                            .pd-sm-font {
                                                                font-size: 13px !important;
                                                            }

                                                            .pd-h-font {
                                                                font-size: 16px;
                                                            }
                                                        }
                                                    </style>
                                                    <center>
                                                        <a class="btn-main btn w-100 pd-sm-font mb-2 font-semibold" href="?page=service_buy&id=<?= $row['id'] ?>" style="border-radius: 10px;">สั่งซื้อตอนนี้เลย </a>
                                                    </center>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php             }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>