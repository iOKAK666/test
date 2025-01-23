<?php
if ($_GET['id'] != '') {
    $pdshop = dd_q("SELECT * FROM products_app WHERE id = ? LIMIT 1", [$_GET['id']]);
    if ($pdshop->rowCount() != 0) {
        $row_1 = $pdshop->fetch(PDO::FETCH_ASSOC);
?>
<div class="container mt-3 mb-3">
    <div class="container-sm">
        <nav class="<?php echo $bg?> shadow-sm p-1" style="border-radius: 1vh;" aria-label="breadcrumb">
            <ol class="breadcrumb d-flex justify-content-center mt-3">
                <li class="breadcrumb-item"><a href="?page=app" style="text-decoration: none;color: var(--main)">สินค้าแอพ</a></li>
                <li class="breadcrumb-item" aria-current="page" style="color: var(--main)"><?= htmlspecialchars($row_1['name']) ?></li>
            </ol>
        </nav>
        <div class="" style="border-radius: 10vh;">
            <div class="row">
                <div class="col-12 col-lg-6 p-3">
                    <div class="d-flex justify-content-center">
                        <img src="<?php echo htmlspecialchars($row_1["img"]); ?>" style="border-radius: 10px;" class="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 p-3">
                    <div class="bg-glass shadow-sm p-3" style="border-radius: 1vh;">
                        <h3 class="text-center" style="text-decoration: none; color: var(--font);"><b><?php echo htmlspecialchars($row_1["name"]); ?><b></h3>
                        <div class="col">
                            <hr style="border-color: var(--main);">
                        </div>
                        <div class="row">
                            <h5 class="ms-lg-3" style="color:var(--font);word-wrap: break-word; white-space:pre-wrap;"><?= $row_1['product_info'] ?></h5>
                            <div class="col">
                                <hr style="border-color: var(--main);">
                            </div>
                            <div class="d-flex justify-content-between pe-3 ps-3 mt-2">
                                <span class="m-0 align-self-center">สินค้าคงเหลือ <?php echo htmlspecialchars($row_1["stock"]); ?> ชิ้น</span>
                                <span class="m-0 align-self-center">ราคา <?php echo htmlspecialchars($row_1["price_web"]); ?> บาท</span>
                            </div>
                        </div>
                        <?php if ($row_1["stock"] >= 1) {?>
                            <button class="btn w-100 mt-2 text-white" id="shop-btn" onclick="buyapp()" data-stock="<?php echo $row_1["stock"]; ?>" data-id="<?php echo $row_1["product_id"]; ?>" data-name="<?php echo $row_1["name"]; ?>" data-price="<?php echo $row_1["price_web"]; ?>" style="background-color: var(--main);">สั่งซื้อสินค้าเลย</button>
                        <?php } else {?>
                            <button class="btn w-100 mt-2 text-white" id="shop-btnX" style="background-color: var(--main);">สินค้าหมด</button>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function buyapp() {
        var appname = $("#shop-btn").attr("data-name");
        var appprice = $("#shop-btn").attr("data-price");
        var formData = new FormData();
        formData.append('id', $("#shop-btn").attr("data-id"));
            Swal.fire({
                title: 'ยืนยันการสั่งซื้อ?',
                text: appname + " ราคา " + appprice + " บาท ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '<?php echo $config["main_color"]; ?>',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ซื้อเลย'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'services/buyapp.php',
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
                        Swal.fire({
                            icon: 'success',
                            title: 'สำเร็จ',
                            text: result.message
                        }).then(function() {
                            window.location = "?page=my_premiumapp";
                        });
                        console.clear();
                        $('#btn_buyid').html('<i class="fas fa-shopping-cart mr-1"></i>สั่งซื้อสินค้า');
                        $('#btn_buyid').removeAttr('disabled');
                    }).fail(function(jqXHR) {
                        console.log(jqXHR)
                        res = jqXHR.responseJSON;
                        Swal.fire({
                            icon: 'error',
                            title: 'ผิดพลาด',
                            text: res.message
                        });
                        $('#btn_buyid').html('<i class="fas fa-shopping-cart mr-1"></i>สั่งซื้อสินค้า');
                        $('#btn_buyid').removeAttr('disabled');
                    });
                }
            })
    }
</script>
<?php
    } else {
        echo "<script>window.location.href = '?page=shop';</script>";
    }
} else {
    echo "<script>window.location.href = '?page=shop';</script>";
}
?>