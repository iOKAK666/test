<?php

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://byshop.me/api/otp_trueid', 
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $load_packz = json_decode($response);

?>

<div class="container-sm p-4" data-aos="<?php echo $anim; ?>">

    <div class="mb-2">
        <a href="?page=otp_disney"><button type="button" class="btn bg-white shadow-sm border me-1 mb-1" style="border-radius: 1vh;">otp_ดิสนีย์</button></a>
        <a href="?page=otp_trueid"><button type="button" class="btn bg-white shadow-sm border me-1 mb-1" style="border-radius: 1vh;">otp_ทรูไอดี</button></a>
        <a href="?page=otp_aisplay"><button type="button" class="btn bg-white shadow-sm border me-1 mb-1" style="border-radius: 1vh;">otp_เอไอเอสเพล</button></a>
        <a href="?page=otp_beinsports"><button type="button" class="btn bg-white shadow-sm border me-1 mb-1" style="border-radius: 1vh;">otp_บีอินสปอร์ต</button></a>
    </div>

    <div class="container-sm <?php echo $bg?> shadow-sm p-4 mb-4" style="border-radius: 1vh;" data-aos="fade-down">
        <center>
            <div class="col-12 col-lg-12 <?php echo $bg?> shadow-sm p-2 mb-2" style="border-radius: 1vh;">
                <div class="d-flex justify-content-between">
                    <div class="text-center text-lg-start">
                    <h3 class=" m-0">ทรูไอดี</h3>
                    </div>
                    <a href="" style="text-decoration: none;"><button class="btn nav-link align-self-center <?php echo $bg?> shadow-sm border" style="border-radius: 1vh;">รีเฟรช</button></a>
                </div>
            </div>
        </center>
    
        <div class="table-responsive mt-3 ">
        <table id="table" class="table mt-2">
            <thead class="table">
                <tr class="">
                    <th class="text-center sorting sorting_asc">id</th>
                    <th class="text-center">ชื่อสินค้า</th>
                    <th class="text-center">ข้อความ</th>
                    <th class="text-center">วันที่</th>
                </tr>
            </thead>
            <tbody>
                <?php 
					foreach ($load_packz as $data) {
				?>
                    <tr>
                        <td class="text-center"><?=$data->id;?></td>
                        <td class="text-center"><?=$data->sms;?></td>
                        <td class="text-center"><?=$data->messenger;?></td>
                        <td class="text-center"><?=$data->time;?></td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>