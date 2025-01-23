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


<div class="container-sm <?php echo $bg?>  mt-5  shadow-sm p-4 mb-4" style="border-radius: 1vh;" data-aos="fade-down">
    <center>
        <h1 class="">&nbsp;<i class="fa-duotone fa-edit"></i>&nbsp;จัดการ Theme</h1>
    </center>
    <hr>
    <div class="col-lg-6 m-auto">
        <h3>ตั้งค่าหลัก</h3>
        <div class="mb-2 <?php echo $bg?> shadow-sm p-4 mb-4 rounded">
            <p class="m-0">Theme ของ UI<span class="text-danger">*</span></p>
            <select class="form-control"  id="ui">
                <!--<option value="custom" <?php if ($tst['ui'] == "trans") {echo "selected";} ?> style="color: #000">Custom</option> -->
                <!-- <option value="trans" <?php if ($tst['ui'] == "trans") {echo "selected";} ?> style="color: #000">Glass</option> -->
                <option value="light" <?php if ($tst['ui'] == "light") {echo "selected";} ?> style="color: #000">Light</option>
                <option value="dark" <?php if ($tst['ui'] == "dark") {echo "selected";} ?> style="color: #000">Dark</option>
            </select>
            <p class="m-0">Animation<span class="text-danger">*</span></p>
            <select class="form-control"  id="anim">
                <option value="zin" <?php if ($tst['anim'] == "zin") {echo "selected";} ?> style="color: #000">Zoom In</option>
                <option value="zot" <?php if ($tst['anim'] == "zot") {echo "selected";} ?> style="color: #000">Zoom Out</option>
                <option value="fl" <?php if ($tst['anim'] == "fl") {echo "selected";} ?> style="color: #000">Fade Left</option>
                <option value="fr" <?php if ($tst['anim'] == "fr") {echo "selected";} ?> style="color: #000">Fade Right</option>
            </select>
            <div class="mb-2 ">
                <p class="m-0  ">ภาพ Logo (ลิงค์) <span class="text-danger">*</span></p>
                <input type="text" id="site_logo" class="form-control" value="<?php echo $config['logo']; ?>">
            </div>
            <div class="mb-2 ">
                <p class="m-0  ">ภาพ Background หน้ายินดีต้อนรับ (ลิงค์) <span class="text-danger">*</span></p>
                <input type="text" id="site_bg" class="form-control" value="<?php echo $config['bg2']; ?>">
            </div>       
        </div>
        <h3>ตั้งค่าสี</h3>
        <div class="mb-2 <?php echo $bg?> shadow-sm p-4 mb-4 rounded">
            <div class="row justify-content-between">
              <div class="mb-5 col">
                  <div class="text-center">
                      <p class="m-0 ">สีหลักของเว็บไซต์ <span class="text-danger">*</span></p>
                      <input type="color" class="form-control form-control-color w-100" id="site_main_color" value="<?php echo $config['main_color']; ?>">
                  </div>
              </div>
              <div class="mb-5 col">
                  <div class="text-center">
                      <p class="m-0 ">สีรองของเว็บไซต์ <span class="text-danger">*</span></p>
                      <input type="color" class="form-control form-control-color w-100" id="site_sec_color" value="<?php echo $config['sec_color']; ?>">
                  </div>
              </div>
          </div>
          <p class="text-center m-0">รูปแบบพื้นหลัง<span class="text-danger">*</span></p>
            <select class="form-control"  id="st">
                <option value="on" <?php if ($tst['st'] == "on") {echo "selected";} ?> style="color: #000">ใช้ภาพพื้นหลัง</option>
                <option value="off" <?php if ($tst['st'] == "off") {echo "selected";} ?> style="color: #000">ใช้สีพื้นหลัง</option>
            </select>
          <?php if ($tst['st'] == "off") : ?>
          <div class="text-center">
                <p class="m-0 ">สีของพื้นหลัง<span class="text-danger">*</span></p>
                <input type="color" class="form-control form-control-color w-100" id="uic" value="<?php echo $tst['uic']; ?>">
            </div>
          <?php endif; ?>
          <?php if ($tst['st'] == "on") : ?>
          <div class="text-center">
                <p class="m-0 ">สีของพื้นหลัง<span class="text-danger">*ไม่สามารถใช้งานได้</span></p>
                <input type="color" class="form-control form-control-color w-100" id="uic" value="<?php echo $tst['uic']; ?>">
            </div>
          <?php endif; ?>
          <div class="mb-2">
                  <div class="text-center">
                      <p class="m-0 ">สีฟอนต์ของเว็บไซต์ <span class="text-danger">*</span></p>
                      <input type="color" class="form-control form-control-color w-100" id="site_font_color" value="<?php echo $config['font_color']; ?>">
                  </div>
              </div>
          </div>
        </div>
        <center>
            <div class="col-lg-6 mb-2">
                <button class="btn text-white bg-main w-100" id="subm">บันทึกข้อมูล</button>
            </div>
        </center>
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
        formData.append('ui', $("#ui").val());
        formData.append('uic', $("#uic").val());
        formData.append('anim', $("#anim").val());
        formData.append('st', $("#st").val());
        formData.append('bg', $("#site_bg").val());
        formData.append('logo', $("#site_logo").val());

        formData.append('main_color', $("#site_main_color").val());
        formData.append('sec_color', $("#site_sec_color").val());
        formData.append('font_color', $("#site_font_color").val());

        $('#btn_regis').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: 'services/backend/theme.php',
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