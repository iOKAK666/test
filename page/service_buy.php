<?php
if ($_GET['id'] != '') {
    $pdshop = dd_q("SELECT * FROM service_prod WHERE id = ? LIMIT 1", [$_GET['id']]);
    if ($pdshop->rowCount() != 0) {
        $row_1 = $pdshop->fetch(PDO::FETCH_ASSOC);
        
?>
        <div class="container mt-3 mb-3">
            <div class="container-sm">
                <div>
                    <nav class="<?php echo $bg?> shadow-sm p-1" style="border-radius: 1vh;" aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex justify-content-center mt-3">
                            <li class="breadcrumb-item"><a href="?page=shop" style="text-decoration: none;color: var(--main)"> สินค้าทั้งหมด</a></li>
                            <li class="breadcrumb-item"><a href="?page=service&category=<?= htmlspecialchars($row_1['cate']) ?>" style="text-decoration: none;color: var(--main)"> <?= htmlspecialchars($row_1['cate']) ?></a></li>
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
                                            <div class="col-auto">รายละเอียดสินค้า</div>
                                            <div class="col">
                                                <hr style="border-color: var(--main);">
                                            </div>
                                            <h5 class="" style="word-wrap: break-word; white-space:pre-wrap;"><?= htmlspecialchars($row_1['des']) ?></h5>
                                            <div class="col">
                                                <hr style="border-color: var(--main);">
                                            </div>
                                            <div class="col-auto">กรอกข้อมูลของคุณ</div>
                                            <div class="col">
                                                <hr style="border-color: var(--main);">
                                            </div>

                                            <div class="d-grid mt-2">
                                                <div class="mb-2 ">
                                                    <p class="m-0  ">Username <span class="text-danger">*</span></p>
                                                    <input type="text" id="user" class="form-control" placeholder="ชื่อผู้ใช้ในเกม" aria-describedby="basic-addon1" style="border-radius: 0.5vh;">
                                                    <p class="m-0  ">Password <span class="text-danger">*</span></p>
                                                    <input type="text" id="pass" class="form-control" placeholder="รหัสผ่าน" aria-describedby="basic-addon1" style="border-radius: 0.5vh;">
                                                    <p class="m-0  ">หมายเหตุถึงร้านค้า <span class="text-danger">*พิมพ์ไรก็ได้;-;</span></p>
                                                    <textarea id="idps_des" class="form-control" placeholder="หมายเหตุถึงร้านค้า"></textarea>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <hr style="border-color: var(--main);">
                                            </div>
                                                <div class="col-auto" style="color:var(--font);">จำนวนที่จะสั่งซื้อ</div>
                                            <div class="col">
                                                <hr style="border-color: var(--main);">
                                            </div>
                                            <div class="d-flex mb-2">

                                                <button  onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn bg-main border-0 text-white font-bold" id="minus">
                                                    <h5 class="font-bold text-white m-0">-</h5>
                                                </button>

                                                <input type="number" id="count" class="form-control ms-2 me-2 text-center h-100" min="1" max="200" value="1">

                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn bg-main border-0 text-white font-bold" id="plus">
                                                    <h5 class="font-bold text-white m-0">+</h5>
                                                </button>

                                            </div>
                                            <div class="d-flex justify-content-between pe-3 ps-3 mt-2">
                                                <span class="m-0 align-self-center">ราคา <?= $row_1['price'] ?>฿ /ชิ้น</span>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <button class="btn w-100 mt-2 text-white" id="shop-btn" onclick="buybox()" data-id="<?= $row_1['id'] ?>" data-name="<?= $row_1['name'] ?>" data-price="<?= $row_1['price'] ?>" style="background-color: var(--main);">สั่งซื้อ</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $("#shop-btn").click(function(e) {
                    e.preventDefault();
                    var name = $("#shop-btn").attr("data-name");
                    var price = $("#shop-btn").attr("data-price");
                    var count = $("#count").val();
                    var formData = new FormData();
                    formData.append('user', $("#user").val());
                    formData.append('pass', $("#pass").val());
                    formData.append('idps_des', $("#idps_des").val());
                    formData.append('count', $("#count").val());
                    formData.append('id', $("#shop-btn").attr("data-id"));
                    Swal.fire({
                        title: 'ยืนยันการสั่งซื้อ?',
                        text: name + " " + count + " ชิ้น " + " ราคา " + price * count + " บาท ",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ยืนยัน'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#shop-btn').attr('disabled', 'disabled');
                            $.ajax({
                                type: 'POST',
                                url: 'services/buyservice.php',
                                data: formData,
                                contentType: false,
                                processData: false,
                            }).done(function(res) {

                                result = res;
                                console.log(result);
                                // grecaptcha.reset();
                                if (res.status == "success") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'สำเร็จ',
                                        text: result.message
                                    }).then(function() {
                                        window.location = "?page=history_order";
                                    });
                                }
                                if (res.status == "fail") {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'ผิดพลาด',
                                        text: result.message
                                    });
                                    $('#shop-btn').removeAttr('disabled');
                                }
                            }).fail(function(jqXHR) {
                                console.log(jqXHR);
                                //   res = jqXHR.responseJSON;
                                // grecaptcha.reset();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'เกิดข้อผิดพลาด',
                                    text: res.message
                                })
                                //console.clear();
                                $('#shop-btn').removeAttr('disabled');
                            });
                        }
                    })

                    // captcha = grecaptcha.getResponse();
                    // formData.append('captcha', captcha);
                    
                });
                function buyservice() {
                    var name = $("#shop-btn").attr("data-name");
                    var price = $("#shop-btn").attr("data-price");
                    var count = $("#b_count").val();
                    var formData = new FormData();
                    formData.append('id', $("#shop-btn").attr("data-id"));
                    formData.append('count', count);
                    
                }
            </script>
        </div>
<?php
    } else {
        echo "<script>window.location.href = '?page=shop';</script>";
    }
} else {
    echo "<script>window.location.href = '?page=shop';</script>";
}
?>