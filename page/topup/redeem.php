<style>
    .font-bold {
        font-weight: 700;
    }
    .font-semibold {
        font-weight: 600;
    }  
</style>
<div class="container-fluid">
    <div class="container-sm  ps-4 pe-4">
        <div class="row">
            <?php require_once('page/topup/menu.php'); ?>
            <div class="col-lg-9">
                <div class="container-fluid  <?php echo $bg?> shadow-sm p-4" style="border-radius:1vh">
                <h1 class="text-strongest " style="font-weight: 500;" data-aos="fade-right" data-aos-duration="500"><i class="fa-duotone fa-code"></i> &nbsp;REDEEM (เติมโค้ด)</h1>
                <div data-aos="fade-right" data-aos-duration="600" >
                    <hr class="mt-1 mb-2">
                    <h5 class="text-muted m-0"><i class="fa-regular fa-gift"></i>&nbsp;กรอกโค้ดเพื่อรับรางวัลจากเว็บของเรา</h5>
                </div>
                <center class="mt-4 mb-2">
                    <div class="col-lg-7" data-aos="fade-down" data-aos="700">
                        <img src="assets/icon/unboxing.png"  class="img-fluid" style="max-height: 250px;">
                    </div>
                </center>
                <div data-aos="<?php echo $anim; ?>" data-aos-duration="750">
                    <center><small class="text-black ">* แต่ละโค้ดสามารถใช้งานได้หนึ่งครั้งต่อหนึ่งบัญชี</small></center>
                    <input type="text" id="link" class="form-control text-center mt-1" style="border-radius: 10px;" placeholder="กรอกโค้ดที่นี่" >
                </div>
                <button class="bg-main btn text-white mt-2 w-100" id="redeem-btn" style="border-radius: 10px;" data-aos="fade-up" data-aos-duration="800">ยืนยันการเติมโค้ด</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#redeem-btn").click(function(){
        var formData = new FormData();
        formData.append('link'  , $("#link").val());
        $.ajax({
            type: 'POST',
            url: 'services/redeem.php',
            data:formData,
            contentType: false,
            processData: false,   
        }).done(function(res){
            result = res;
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ',
                text: result.message
            }).then(function() {
                    window.location = "?page=<?php echo $_GET['page'];?>";
            });
        }).fail(function(jqXHR){
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
</script>