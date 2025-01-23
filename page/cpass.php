<style>
    .form-control{
        border: 0;

    }
</style>

<div class="container-fluid p-4">
    <div class="container-sm col-12 col-lg-4">
        <div class="<?php echo $bg?> shadow-sm p-4" style="border-radius: 1vh;">
            <div class="col-lg-12 m-auto">
                <center>
                    <h2 class="text-color mt-"><i class="fa-solid fa-gears"></i>&nbsp;เปลี่ยนรหัสผ่าน</h2>
                </center>
                <div class="d-grid gap2">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ms-1">รหัสผ่านเก่า</label>
                        <input type="password" class="form-control shadow-sm" id="o_pass" placeholder="รหัสผ่านเก่า" style="color: #000">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ms-1">รหัสผ่านใหม่</label>
                        <input type="password" class="form-control shadow-sm" id="pass" placeholder="รหัสผ่านใหม่" style="color: #000">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label ms-1">รหัสผ่านใหม่อีกครั้ง</label>
                        <input type="password" class="form-control shadow-sm" id="pass2" placeholder="รหัสผ่านใหม่อีกครั้ง" style="color: #000">
                    </div>
                    <button id="btn_regis" class="bg-main text-white ms-1 btn shadow-sm">เปลี่ยนรหัสผ่าน</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">

        $("#btn_regis").click(function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('o_pass', $("#o_pass").val() );
            formData.append('pass'  , $("#pass").val() );
            formData.append('pass2' , $("#pass2").val());
            $('#btn_regis').attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                url: 'services/changepass.php',
                data:formData,
                contentType: false,
                processData: false,   
            }).done(function(res){
                
                result = res;
                console.log(result);
                if(res.status == "success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'สำเร็จ',
                        text: result.message
                    }).then(function() {
                            window.location = "?page=profile";
                    });
                }
                if(res.status == "fail"){
                    Swal.fire({
                        icon: 'error',
                        title: 'ผิดพลาด',
                        text: result.message
                    });
                    $('#btn_regis').removeAttr('disabled');
                }
            }).fail(function(jqXHR){
                console.log(jqXHR);
                //   res = jqXHR.responseJSON;
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
</div>