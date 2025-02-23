<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<div class="container-sm <?php echo $bg?>  mt-5  shadow-sm p-4 mb-4 rounded" data-aos="fade-down">
    <center>
        <h1 class="">&nbsp;<i class="fa-duotone fa-user"></i>&nbsp;จัดการ Api Byshop</h1>
    </center>
    <hr>
    <div class="col-lg-6 m-auto">
        <h3 class="text-center">ตั้งค่าหลัก</h3>
        <div class="mb-2 <?php echo $bg?> shadow-sm p-4 mb-4 rounded">
            <p class="m-0">เปิด / ปิด<span class="text-danger">*</span></p>
            <select class="form-control mb-2"  id="st">
                <option value="on" <?php if ($byshop_status == "on") {echo "selected";} ?> style="color: #000">On</option>
                <option value="off" <?php if ($byshop_status == "off") {echo "selected";} ?> style="color: #000">Off</option>
            </select>
            <div class="mb-2 ">
                <p class="m-0  ">Api Key<span class="text-danger">*</span></p>
                <input type="text" id="apikey" class="form-control" value="<?php echo $byshop_key; ?>">
            </div>
            <button class="btn text-white bg-main w-100" id="subm">บันทึกข้อมูล</button>
            <button class="btn text-white bg-main w-100 mt-2" id="check">เช็คยอดเงินของคุณ</button>
        </div>
    </div>
    <div class="col-lg-6 m-auto">
        <h3 class="text-center">จัดการสินค้า</h3>
        <div class="mb-2 <?php echo $bg?> shadow-sm p-4 mb-4 rounded">
            <a href="?page=apibyshop_manage" class="btn bg-main text-white w-100">จัดการสินค้าทั้งหมด</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $("#subm").click(function(e) {
        e.preventDefault();
        var check;
        // if ($('#pc').is(':checked')) {
        //     check = "on";
        // } else {
        //     check = "off";
        // }
        var formData = new FormData();
        formData.append('st', $("#st").val());
        formData.append('apikey', $("#apikey").val());
        $('#btn_regis').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: 'services/backend/byshop_editinfo.php',
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
    $("#check").click(function(e) {
        e.preventDefault();
        var check;
        // if ($('#pc').is(':checked')) {
        //     check = "on";
        // } else {
        //     check = "off";
        // }
        var formData = new FormData();
        formData.append('st', $("#st").val());
        $('#btn_regis').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: 'services/byshop/checkmoney.php',
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