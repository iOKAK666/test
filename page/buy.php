<?php
if ($_GET['id'] != '') {
    $pdshop = dd_q("SELECT * FROM box_product WHERE id = ? LIMIT 1", [$_GET['id']]);
    if ($pdshop->rowCount() != 0) {
        $row_1 = $pdshop->fetch(PDO::FETCH_ASSOC);
        $count = dd_q("SELECT * FROM box_stock WHERE p_id = ?", [$row_1['id']])->rowCount();
?>
        <div class="container mt-3 mb-3">
            <div class="container-sm">
                <div > 
                    <nav class="<?php echo $bg?> shadow-sm p-1" style="border-radius: 1vh;" aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center mt-3">
                            <li class="breadcrumb-item"><a href="?page=shop" style="text-decoration: none;color: var(--main)"> สินค้าทั้งหมด</a></li>
                            <li class="breadcrumb-item"><a href="?page=shop&category=<?= htmlspecialchars($row_1['c_type']) ?>" style="text-decoration: none;color: var(--main)"> <?= htmlspecialchars($row_1['c_type']) ?></a></li>
                            <li class="breadcrumb-item" aria-current="page" style="color: var(--main)"><?= htmlspecialchars($row_1['name']) ?></li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-12 col-lg-6 mt-3">
                            <div class="d-flex justify-content-center">
                                <img src="<?= htmlspecialchars($row_1['img']) ?>" style="width: 100%;border-radius: 1vh;" class="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="p-3" style="border-radius: 1vh;">
                                <div class="row mt-">
                                    <button class="btn <?php echo $bg?> shadow-sm" style="border-radius: 1vh;"><h3 class="font-bold mt-1" style="color:var(--font);"><?= htmlspecialchars($row_1['name']) ?></h3></button>
                                    <div class="p-2">
                                    <div class="<?php echo $bg?> shadow-sm" style="border-radius: 1vh;">
                                        <div class="row p-3">
                                            <div class="col">
                                                <hr style="border-color: var(--main);">
                                            </div>
                                            <div class="col-auto" style="color:var(--font);">รายละเอียดสินค้า</div>
                                            <div class="col">
                                                <hr style="border-color: var(--main);">
                                            </div>
                                            <h5 class="" style="color:var(--font);word-wrap: break-word; white-space:pre-wrap;"><?= htmlspecialchars($row_1['des']) ?></h5>
                                            <div class="col">
                                                <hr style="border-color: var(--main);">
                                            </div>
                                            <div class="col-auto" style="color:var(--font);">จำนวนสินค้าที่จะซื้อ</div>
                                            <div class="col">
                                                <hr style="border-color: var(--main);">
                                            </div>
                                            <style>
                                                .font-bold {
                                                    font-weight: 600;
                                                }
                                            </style>
                                            <div class="d-flex mb-2">

                                                <button  onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn bg-main border-0 text-white font-bold" id="minus">
                                                    <h5 class="font-bold text-white m-0">-</h5>
                                                </button>

                                                <input type="number" id="b_count" class="form-control ms-2 me-2 text-center h-100" min="1" max="200" value="1">

                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn bg-main border-0 text-white font-bold" id="plus">
                                                    <h5 class="font-bold text-white m-0">+</h5>
                                                </button>

                                            </div>

                                            <div class="row text-center">
                                                <div class="col-12 col-lg-6">
                                                    <span class="m-0 align-self-center" style="color:var(--font);">สินค้าคงเหลือ <?= $count ?> ชิ้น</span>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <?php if ($user['rank'] == 1) {?>
                                                        <span class="m-0 align-self-center" style="color:var(--font);">ราคาสินค้า <?= $row_1['price'] ?> บาท / ชิ้น</span>
                                                    <?php } elseif($user['rank'] == 0 )  {?>
                                                        <span class="m-0 align-self-center" style="color:var(--font);">ราคาสินค้า <?= $row_1['price'] ?> บาท / ชิ้น</span>
                                                    <?php } elseif($user['rank'] == 2 )  {?>
                                                        <span class="m-0 align-self-center" style="color:var(--font);">ราคาสินค้า <?= $row_1['price'] ?> บาท / ชิ้น</span>
                                                    <?php } elseif($user['rank'] == 3 ) {?>
                                                        <span class="m-0 align-self-center" style="color:var(--font);">ราคาสินค้า <?= $row_1['price_web'] ?> บาท / ชิ้น</span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <button class="btn w-100 text-white" id="shop-btn" onclick="buybox()" 
                                                data-id="<?= $row_1['id'] ?>" 
                                                data-name="<?= $row_1['name'] ?>" 
                                                <?php if ($user['rank'] == 1) {?>
                                                    data-price="<?= $row_1['price'] ?>" 
                                                <?php } elseif($user['rank'] == 0 )  {?>
                                                    data-price="<?= $row_1['price'] ?>" 
                                                <?php } elseif($user['rank'] == 2 )  {?>
                                                    data-price="<?= $row_1['price'] ?>" 
                                                <?php } elseif($user['rank'] == 3 ) {?>
                                                    data-price="<?= $row_1['price_web'] ?>" 
                                                <?php } ?>
                                            style="background-color: var(--main);">สั่งซื้อเลยย</button>                                         
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "<script>window.location.href = '?page=shop';</script>";
    }
} else {
    echo "<script>window.location.href = '?page=shop';</script>";
}
?>