<div class="container-sm <?php echo $bg?>  mt-5 shadow-sm p-4 mb-4" style="border-radius: 1vh;" data-aos="fade-down">
    <center>
        <h1 class="">&nbsp;<i class="fa-duotone fa-shopping-basket"></i>&nbsp;จัดการสินค้า byshop</h1>
    </center>
    <hr>
    <button class="btn text-white bg-main w- mt-2" id="updatepd">อัพเดทสต๊อก</button>
    <div class="table-responsive mt-3 ">
        <table id="table" class="table mt-2">
            <thead class="table">
                <tr class="">
                    <th class="sorting sorting_asc">id</th>
                    <th> ภาพสินค้า</th>
                    <th> ชื่อ</th>
                    <th> ราคาเรา</th>
                    <th> ราคารับ</th>
                    <th> สต๊อก</th>
                    <th> สถานะ</th>
                    <th> เปิด/ปิด</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_user = dd_q("SELECT * FROM products_app ORDER BY id DESC");
                function sta($text)
                {
                    if ($text == "on") {
                        return "เปิด";
                    } elseif ($text == "off") {
                        return "ปิด";
                    }
                }
                while ($row = $get_user->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td class=""><?php echo $row['id']; ?></td>
                        <td class=""><img src="<?php echo htmlspecialchars($row['img']); ?>" width="100px" alt=""></td>
                        <td class=""><?php echo htmlspecialchars($row['name']); ?></td>
                        <td class=""><?php echo htmlspecialchars($row['price_web']); ?></td>
                        <td class=""><?php echo htmlspecialchars($row['price']); ?></td>
                        <td class=""><?php echo htmlspecialchars($row['stock']); ?></td>
                        <td class=""><?php echo htmlspecialchars($row['status']); ?></td>
                        <td class=""><?php echo htmlspecialchars(sta($row['onoroff'])); ?></td>
                        <td><button class="btn btn-warning  w-100" style="width : 130px!important" onclick="get_detail(<?php echo $row['id']; ?>)"><i class="fa-solid fa-pencil"></i>&nbsp;แก้ไข</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="byshop_detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-glass">
            <div class="modal-header">
                <h5 class="modal-title" style="color: var(--font);" id="exampleModalLabel"><i class="fa-duotone fa-pencil"></i>&nbsp;&nbsp;แก้ไขสินค้า</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-10 m-cent ">
                    <div class="mb-2">
                        <div class="mb-2">
                            <p class=" mb-1" style="color: var(--font);">ชื่อหมวดหมู่ <span class="text-danger">*</span></p>
                            <input type="text" id="name" class="form-control" value="username">
                        </div>
                        <div class="mb-2">
                            <p class=" mb-1" style="color: var(--font);">ลิงค์รูปภาพ <span class="text-danger">*</span></p>
                            <input type="text" id="img" class="form-control" value="">
                        </div>
                        <div class="mb-2">
                            <p class=" mb-1" style="color: var(--font);">ราคาเรา <span class="text-danger">*</span></p>
                            <input type="text" id="price_web" class="form-control" value="username">
                        </div>
                        <div class="mb-2">
                            <p class=" mb-1" style="color: var(--font);">รายละเอียด <span class="text-danger">*</span></p>
                            <textarea id="product_info" cols="50" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="mb-2">
                            <p class="m-0" style="color: var(--font);">เปิด / ปิด<span class="text-danger">*</span></p>
                            <select class="form-control mb-2"  id="onoroff">
                                <option value="on" <?php if ($statuspd == "on") {echo "selected";} ?> style="color: #000">เปิด</option>
                                <option value="off" <?php if ($statuspd == "off") {echo "selected";} ?> style="color: #000">ปิด</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" id="save_btn" data-id="">บันทึก</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#save_btn").click(function() {
        var formData = new FormData();
        formData.append('id', $("#save_btn").attr("data-id"));
        formData.append('name', $("#name").val());
        formData.append('img', $("#img").val());
        formData.append('price_web', $("#price_web").val());
        formData.append('product_info', $("#product_info").val());
        formData.append('onoroff', $("#onoroff").val());
        $.ajax({
            type: 'POST',
            url: 'services/backend/byshop_update.php',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(res) {
            result = res;
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: result.message
            }).then(function() {
                window.location = "?page=<?php echo $_GET['page']; ?>";
            });
        }).fail(function(jqXHR) {
            console.log(jqXHR);
            res = jqXHR.responseJSON;
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: res.message
            })
            //console.clear();
        });
        // $("#save_btn").attr("data-id") <- id user
    });
    function get_detail(id) {
        var formData = new FormData();
        formData.append('id', id);

        $.ajax({
            type: 'POST',
            url: 'services/backend/call/byshop_detail.php',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(res) {
            console.log(res);
            $("#name").val(res.name);
            $("#img").val(res.img);
            $("#price_web").val(res.price_web);
            $("#product_info").val(res.product_info);
            $("#onoroff").val(res.onoroff);
            $("#save_btn").attr("data-id", id);
            const myModal = new bootstrap.Modal('#byshop_detail', {
                keyboard: false
            })
            myModal.show();
        }).fail(function(jqXHR) {
            console.log(jqXHR);
            res = jqXHR.responseJSON;
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: res.message
            })
            //console.clear();
        });

    }
    $("#updatepd").click(function(e) {
        e.preventDefault();
        var formData = new FormData();
        $('#btn_regis').prop('disabled', true);
        $.ajax({
            type: 'GET',
            url: 'services/update_byshop.php',
            success: function(data) {
                console.log(data);
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'สำเร็จ',
                        text: data.message
                    }).then(function() {
                        window.location = "?page=<?php echo $_GET['page']; ?>";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: data.message
                    });
                    $('#btn_regis').prop('disabled', false);
                }
            },
            error: function(jqXHR) {
                console.log(jqXHR);
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'ไม่สามารถเชื่อมต่อกับเซิร์ฟเวอร์ได้'
                });
                $('#btn_regis').prop('disabled', false);
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    });
    $("#btn_regis").click(function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('name', $("#site_name").val());
        // formData.append('bg', $("#site_bg").val());
        formData.append('phone', $("#site_phone").val());
        formData.append('main_color', $("#site_main_color").val());
        formData.append('logo', $("#site_logo").val());
        formData.append('sec_color', $("#site_sec_color").val());
        formData.append('font_color', $("#site_font_color").val());
        formData.append('widget_discord'  , $("#site_widget_discord").val() );
        formData.append('discord'  , $("#site_contact_discord").val() );
        formData.append('facebook'  , $("#site_contact_facebook").val() );
        formData.append('des', $("#site_des").val());
        $('#btn_regis').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: 'services/backend/website.php',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(res) {
            result = res;
            console.log(result);
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: result.message
            }).then(function() {
                window.location = "?page=<?php echo $_GET['page']; ?>";
            });
        }).fail(function(jqXHR) {
            console.log(jqXHR);
            res = jqXHR.responseJSON;
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: res.message
            })
            //console.clear();
            $('#btn_regis').removeAttr('disabled');
        });
    });
</script>