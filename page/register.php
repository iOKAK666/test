<style>
    .form-control {
        border-radius: 1vh;
    }
    .text-sm {
        font-size: 0.875rem;
        line-height: 1.25rem;
    }
    .font-extrabold {
        font-weight: 800;
    }
    .text-4xl {
        font-size: 2.25rem;
        line-height: 2.5rem;
    }
    .text-name {
        background: linear-gradient(to right, white 50%, var(--main) 50%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    input {
        width: 300px; /* กำหนดความกว้างของ input เป็น 300 พิกเซล */
        height: 40px; /* กำหนดความสูงของ input เป็น 40 พิกเซล */
        background: rgba(248, 249, 250, 0.91);
        box-shadow: 0 4px 30px rgba(248, 249, 250, 0.1);
        -webkit-backdrop-filter: blur(8.5px);
    }
</style>
<div class="container-fluid mt-5">
    <div class="container-sm">
        <center>
            <div class="col-lg-6 m-auto p-0 pb-3" style="border-radius: 1vh;">
            <div class="<?php echo $bg?>" style="border: 1.5px solid var(--main);border-radius: 1vh;">
                <div class="col-10 col-lg-12 m-cent pt-4" style="margin-bottom: 4em!important; ">
                    <div class="container-fluid ps-0 pe-0" style="margin-top: 1em;">
                        <div class="col-lg-8 m-cent mt-2">
                            <div class="mb-1 text-start">
                                <h1 class="text-name text-4xl font-extrabold text-center" style="-webkit-text-stroke-width: 1.5px;-webkit-text-stroke-color: var(--main);"><?php echo $config['name']; ?></h1>
                                <h3 class="text-black text-sm text-center">สมัครสมาชิก เพื่อรับประสบการณ์ใช้บริการที่ดีที่สุดของเรา !</h3>
                                <label class="ms-1 mb-1"> ชื่อผู้ใช้</label>
                                <input type="text" id="user" class="form-control shadow-sm" placeholder="ชื่อผู้ใช้งาน" aria-describedby="basic-addon1" style="border-radius: 0.6vh;">
                            </div>
                            <div class="mb-1 text-start">
                                <label class="ms-1 mb-1"> รหัสผ่าน</label>
                                <input type="password" id="pass" class="form-control shadow-sm" placeholder="รหัสผ่าน" aria-describedby="basic-addon1" style="border-radius: 0.6vh;">
                            </div>
                            <div class="mb-3 text-start">
                                <label class="ms-1 mb-1"> ยืนยันรหัสผ่าน</label>
                                <input type="password" id="pass2" class="form-control shadow-sm" placeholder="ยืนยันรหัสผ่าน" aria-describedby="basic-addon1" style="border-radius: 0.6vh;">
                            </div>
                            <div class="mt-2 mb-2">
                                <div id="capcha" class="g-recaptcha" data-theme="light" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY" data-callback="onSubmit" data-size="invisible"></div>
                            </div>
                                <button class="btn bg-main shadow-sm text-white ps-4 pe-4 pt-2 pb-2 w-100 d-inline" style="border-radius: 1vh;" id="btn_regis">สมัครสมาชิก&nbsp;<i class="fa-regular fa-user-plus text-white"></i></button>
                            <br>
                                <a href="?page=login" style="text-decoration: none;"><button class="btn shadow-sm text-main mt-2 w-100 d-inline" style="border: 2px solid var(--main);border-radius: 1vh;">เข้าสู่ระบบ&nbsp;<i class="fa-regular fa-right-to-bracket text-main"></i></button></a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </center>
    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<script type="text/javascript">
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
    })
    var onloadCallback = function() {
        grecaptcha.render('capcha', {
            'sitekey': '<?= $conf['sitekey']; ?>'
        });
    };
    $("#btn_regis").click(function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('user', $("#user").val());
        formData.append('pass', $("#pass").val());
        formData.append('pass2', $("#pass2").val());
        captcha = grecaptcha.getResponse();
        formData.append('captcha', captcha);
        $('#btn_regis').attr('disabled', 'disabled');
        $.ajax({
            type: 'POST',
            url: 'services/register.php',
            data: formData,
            contentType: false,
            processData: false,
        }).done(function(res) {
            result = res;
            console.log(result);
            grecaptcha.reset();
            if (res.status == "success") {
                Toast.fire({
                    icon: 'success',
                    title: result.message
                }).then(function() {
                    window.location = "?page=home";
                });
            }
            if (res.status == "fail") {
                Toast.fire({
                    icon: 'error',
                    title: result.message
                })
                $('#btn_regis').removeAttr('disabled');
            }
        }).fail(function(jqXHR) {
            console.log(jqXHR);
            grecaptcha.reset();
            Toast.fire({
                icon: 'error',
                title: result.message
            })
            $('#btn_regis').removeAttr('disabled');
        });
    });
    $(function() {
        function rescaleCaptcha() {
            var width = $('.g-recaptcha').parent().width();
            var scale;
            if (width < 302) {
                scale = width / 302;
            } else {
                scale = 1.0;
            }
            $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
            $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
            $('.g-recaptcha').css('transform-origin', '0 0');
            $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
        }
        rescaleCaptcha();
        $(window).resize(function() {
            rescaleCaptcha();
        });
    });
</script>