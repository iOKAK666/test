<style>
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
    .font-bold {
        font-weight: 700;
    }
    .font-semibold {
        font-weight: 600;
    }  
</style>
<div class="container-fluid p-0">
    <div class="container-sm m-auto pt-0">
        <div class="container-fluid" data-aos="<?php echo $anim; ?>">

            <center>
                <div class="col-12 col-lg-12 p-2 mb-2" style="border-radius: 1vh;">
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <div class="text-center text-lg-start">
                            <h3 class=" mt-2 mb-0 font-bold"><b class="text-main-gra">สุ่มวงล้อทั้งหมด</b></h3>
                            <h6 class="mt-1">
                                <a href="?page=home" class="text-main" style="text-decoration: none;">หน้าหลัก</a>
                                    <a style="color: rgb(156 163 175);"> / </a>
                                <a style="color: rgb(156 163 175);">หมวดหมู่วงล้อ</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </center>
            <div class="row justify-content-center justify-content-lg-start">

            <?php 
                $find = dd_q("SELECT * FROM wheel ");
                while($row =  $find->fetch(PDO::FETCH_ASSOC)){
            ?>
                <div class="col-12 col-lg-6  mb-3">
                    <a href="?page=play&wheel=<?= $row['id']; ?>">
                        <div class="img-anim content w-100">
                            <img class="bg" src="<?= htmlspecialchars($row['img']) ?>">
                            <div class="text font-semibold">
                                <?= htmlspecialchars($row['name']) ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
                }
            ?>
            
            </div>
        </div>
    </div>
</div>