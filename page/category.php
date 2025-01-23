<div class="container-fluid p-0 ">
    <div class="container-sm m-auto p-0 pt-4">
        <div class="container-sm ">
            <div class="container-fluid">
                <div class="container-fluid" data-aos="<?php echo $anim; ?>">
                    <center>
                        <div class="col-12 col-lg-12 p-2 mb-2" style="border-radius: 1vh;">
                            <div class="d-lg-flex justify-content-between align-items-center">
                                <div class="text-center text-lg-start">
                                    <h3 class="mt-2 mb-0 font-bold"><b class="text-main-gra">หมวดหมู่สินค้าทั้งหมด</b></h3>
                                    <h6 class="mt-1">
                                        <a href="?page=home" class="text-main" style="text-decoration: none;">หน้าหลัก</a>
                                        <a style="color: rgb(156 163 175);"> / </a>
                                        <a style="color: rgb(156 163 175);">หมวดหมู่สินค้า</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </center>
                    <div class="row justify-content-center">
                        <?php
                            $find = dd_q("SELECT * FROM category ORDER BY RAND() LIMIT 4");
                            while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <div class="col-12 col-lg-6 mb-3">
                                <a href="?page=shop&category=<?= htmlspecialchars($row['c_name']) ?>">
                                    <div class="img-anim content w-100">
                                        <img class="bg" src="<?= htmlspecialchars($row['img']) ?>">
                                        <div class="text font-semibold">
                                            <?= htmlspecialchars($row['des']) ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>