<?php

$curl = curl_init();

$data = array(
    'keyapi' => $byshop_key,
    'username_customer' => $user["username"]
);


curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://byshop.me/api/history-all', 
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_POSTFIELDS => http_build_query($data),
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
));

$response = curl_exec($curl);
curl_close($curl);
$load_packz = json_decode($response);

?>
<div class="modal fade text-white bg-glass" id="appInfoModal" tabindex="-1" role="dialog" aria-labelledby="appInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-white bg-glass" style="border-radius: 1vh;">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="appInfoModalLabel">ข้อมูลสินค้า</h5>
                <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-black" id="appInfoContent">
            </div>
        </div>
    </div>
</div>
<div class="container-sm p-4" data-aos="<?php echo $anim; ?>">

    <div class="container-sm <?php echo $bg?> shadow-sm p-4 mb-4" style="border-radius: 1vh;" data-aos="fade-down">
        <center>
            <div class="col-12 col-lg-12 <?php echo $bg?> shadow-sm p-2 mb-2" style="border-radius: 1vh;">
                <div class="d-flex justify-content-between">
                    <div class="text-center text-lg-start">
                    <h3 class=" m-0"><img src="<?php echo $ic_his;?>" class="m-0 mb-2" style="height: 2.5rem;">&nbsp; ประวัติแอพพรีเมี่ยม</h3>
                    </div>
                    <button class="btn nav-link align-self-center <?php echo $bg?> shadow-sm border" onclick="window.history.back()" style="border-radius: 1vh;height: fit-content;"><b><i class="fa-solid fa-turn-down-left"></i> ย้อนกลับ</b></button>
                </div>
            </div>
        </center>
    
        <div class="table-responsive mt-3 ">
        <table id="table" class="table mt-2">
            <thead class="table">
                <tr class="">
                    <th class="text-center sorting sorting_asc">id</th>
                    <th class="text-center">ชื่อสินค้า</th>
                    <th class="text-center">สินค้าที่ได้รับ</th>
                    <th class="text-center">วันที่</th>
                    <th class="text-center">OTP</th>
                </tr>
            </thead>
            <tbody>
                <?php 
					foreach ($load_packz as $data) {
				?>
                    <tr>
                        <td class="text-center"><?=$data->id;?></td>
                        <td class="text-center"><?=$data->name;?></td>
                        <td class="text-center"><center><button class="btn bg-main text-white mb-2 view-info-btn" style="border-radius: 1vh;" data-toggle="modal" data-target="#appInfoModal" data-info="Email : <?= htmlspecialchars($data->email); ?> | Password : <?= htmlspecialchars($data->password); ?>">ดูข้อมูลสินค้า</button></center></td>
                        <td class="text-center"><?=$data->time;?></td>
                        <td class="text-center"><a href="?page=otp_disney"><button class="btn bg-white shadow-sm border" style="border-radius: 1vh;">รับ OTP</button></a></td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(".view-info-btn").click(function() {
        var appInfo = $(this).data("info");

        $("#appInfoContent").html(appInfo);
    });

    	
    new DataTable('#table');
</script>
