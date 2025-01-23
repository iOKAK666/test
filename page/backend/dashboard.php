<?php 
    //topup by day
    date_default_timezone_set("Asia/Bangkok");
    $midnight = strtotime("today 00:00");
    $date_day =  date('Y-m-d H:i:s', $midnight);
    $q_1 = dd_q("SELECT sum(amount) AS total FROM topup_his WHERE date > ?",[$date_day]);
    $day = $q_1->fetch(PDO::FETCH_ASSOC);
    if($day["total"] == null){
        $day["total"] = "0.00";
    }
    // topup by week
    date_default_timezone_set("Asia/Bangkok");
    $q_22 = dd_q("SELECT sum(amount) AS total FROM topup_his WHERE date > ?",[$date_week]);
    $week = $q_22->fetch(PDO::FETCH_ASSOC);
    if($week["total"] == null){
        $week["total"] = "0.00";
    }
    // topup by month
    date_default_timezone_set("Asia/Bangkok");
    $midnight = strtotime("today 00:00");
    $date_month =  date('Y-m-01 H:i:s', $midnight);
    $q_2 = dd_q("SELECT sum(amount) AS total FROM topup_his WHERE date > ?",[$date_month]);
    $month = $q_2->fetch(PDO::FETCH_ASSOC);
    if($month["total"] == null){
        $month["total"] = "0.00";
    }
    // topup all
    $q_3 = dd_q("SELECT sum(amount) AS total FROM topup_his ");
    $topup = $q_3->fetch(PDO::FETCH_ASSOC);
    if($topup["total"] == null){
        $topup["total"] = "0.00";
    }
    //shop by day
    $q_4 = dd_q("SELECT id FROM boxlog WHERE date > ?",[$date_day]);
    $box_day = $q_4->rowCount();
    // shop by week
    $q_52 = dd_q("SELECT id FROM boxlog WHERE date > ?",[$date_week]);
    $box_week = $q_52->rowCount();
    // shop by month
    $q_5 = dd_q("SELECT id FROM boxlog WHERE date > ?",[$date_month]);
    $box_month = $q_5->rowCount();
    // shop by all
    $q_6 = dd_q("SELECT id FROM boxlog");
    $box_all = $q_6->rowCount();

    $boxlogw = dd_q("SELECT * FROM topup_his");
    $mx_count = $boxlogw->rowCount();

    $boxlogw = dd_q("SELECT * FROM boxlog");
    $mv_count = $boxlogw->rowCount();

        // idpass by day
        $a_4 = dd_q("SELECT id FROM service_order WHERE date > ?",[$date_day]);
        $service_day = $a_4->rowCount();
        // idpass by week
        $date_week = date("Y-m-d", strtotime("-7 days"));
        $a_55 = dd_q("SELECT id FROM service_order WHERE date > ?", [$date_week]);
        $service_week = $a_55->rowCount();
        // idpass by month
        $a_5 = dd_q("SELECT id FROM service_order WHERE date > ?",[$date_month]);
        $service_month = $a_5->rowCount();
        // idpass by all
        $a_6 = dd_q("SELECT id FROM service_order");
        $service_all = $a_6->rowCount();

    date_default_timezone_set("Asia/Bangkok");
    $beginning_of_week = strtotime("last Sunday midnight");
    $end_of_week = strtotime("next Sunday midnight") - 1;
    $start_of_week = date('Y-m-d H:i:s', $beginning_of_week);
    $end_of_week = date('Y-m-d H:i:s', $end_of_week);

    $sql = "SELECT SUM(amount) AS total FROM topup_his WHERE date >= ? AND date <= ?";
    $q_1 = dd_q($sql, [$start_of_week, $end_of_week]);
    $week = $q_1->fetch(PDO::FETCH_ASSOC);
    if ($week["total"] === null) {
        $week["total"] = "0.00";
    }

?>
<style>
    .font-bold {
        font-weight: 700;
    }
    .font-semibold {
        font-weight: 600;
    } 
    .font-semiboldx {
        font-weight: 550;
    } 
    .bg-light-primary {
        background-color: var(--main) !important;
    }
    .bg-light-primary {
        background-color: var(--main) !important;
        opacity: 0.8;
    }
    .icon-md {
        width: 2.5rem;
        height: 2.5rem;
        line-height: 2.5rem;
    }
    .icon-shape {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        vertical-align: middle;
    }
    hr{
        border-top: 2px solid var(--main);
        opacity: 1;
    }
</style>



<div class="container-sm mt-0 p-4 mb-4" style="border-radius: 10px;" data-aos="fade-down">
    <div class="row jusify-content-between mt-4">
        <div class="col-lg-12 mb-2">
            <div class="row">

            <div class="col-lg-3 col-6 mb-3">
                <div class="">
                    <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0" style="opacity: 1;">เติมเงินวันนี้</h4>
                            </div>
                            <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                <i class="fa-regular fa-coin fa-lg text-white" style="color: var(--maim);"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $day["total"];?> ฿</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb-3">
                <div class="">
                    <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0" style="opacity: 1;">เติมเงินอาทิตย์นี้</h4>
                            </div>
                            <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                <i class="fa-regular fa-money-bill fa-lg text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $week["total"];?> ฿</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb-3">
                <div class="">
                    <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0" style="opacity: 1;">เติมเงินเดือนนี้</h4>
                            </div>
                            <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                <i class="fa-regular fa-calendar-days fa-lg text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $month["total"];?> ฿</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb-3">
                <div class="">
                    <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0" style="opacity: 1;">เติมเงินทั้งหมด</h4>
                            </div>
                            <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                <i class="fa-regular fa-money-bill fa-lg text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $topup["total"];?> ฿</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
        </div>

        <div class="col-lg-12 mb-2">
            <div class="row">

            <div class="col-lg-3 col-6 mb-3">
                <div class="">
                    <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0" style="opacity: 1;">ซื้อสินค้าวันนี้</h4>
                            </div>
                            <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                <i class="fa-regular fa-box fa-lg text-white" style="color: var(--maim);"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $box_day;?> ชิ้น</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb-3">
                <div class="">
                    <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0" style="opacity: 1;">ซื้อสินค้าอาทิตย์นี้</h4>
                            </div>
                            <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                <i class="fa-regular fa-boxes-stacked fa-lg text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $box_week;?> ชิ้น</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb-3">
                <div class="">
                    <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0" style="opacity: 1;">ซื้อสินค้าเดือนนี้</h4>
                            </div>
                            <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                <i class="fa-regular fa-calendar-days fa-lg text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $box_month;?> ชิ้น</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6 mb-3">
                <div class="">
                    <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h4 class="mb-0" style="opacity: 1;">ซื้อสินค้าทั้งหมด</h4>
                            </div>
                            <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                <i class="fa-regular fa-boxes-stacked fa-lg text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $box_all;?> ชิ้น</h1>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>

        <div class="col-lg-12 mb-2">
            <div class="row">

                <div class="col-lg-3 col-6 mb-3">
                    <div class="">
                        <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0" style="opacity: 1;">สั่งซื้อวันนี้</h4>
                                </div>
                                <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                    <i class="fa-regular fa-box fa-lg text-white" style="color: var(--maim);"></i>
                                </div>
                            </div>
                            <div>
                                <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $service_day;?> ชิ้น</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-3">
                    <div class="">
                        <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0" style="opacity: 1;">สั่งซื้ออาทิตย์นี้</h4>
                                </div>
                                <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                    <i class="fa-regular fa-boxes-stacked fa-lg text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $service_week;?> ชิ้น</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-3">
                    <div class="">
                        <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0" style="opacity: 1;">สั่งซื้อเดือนนี้</h4>
                                </div>
                                <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                    <i class="fa-regular fa-calendar-days fa-lg text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $service_month;?> ชิ้น</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="">
                        <div class="p-3 <?php echo $bg?> shadow-sm" style="border-radius: 10px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-0" style="opacity: 1;">ทั้งหมด</h4>
                                </div>
                                <div class="bg-light-primary ps-3 pe-3 p-2 rounded-2 bg-opacity-25">
                                    <i class="fa-regular fa-box-check fa-lg text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h1 class="fw-bold text-main" style="opacity: 0.8;"><?php echo $service_all;?> ชิ้น</h1>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<script>
    const data = {
    labels: ['รายวัน', 'รายเดือน', 'รวมทั้งหมด'],
      datasets: [{
        label: 'กราฟแสดงผลเติมเงิน',
        data: [<?php echo $day["total"];?>, <?php echo $month["total"];?>, <?php echo $topup["total"];?>],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)'

        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)'
        ],
        borderWidth: 1
      }]
    };

    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    const chartVersion = document.getElementById('chartVersion');
    chartVersion.innerText = Chart.version;
</script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
    })
</script>
<?php
// 1111-01-11 00:00:00.00 ถาวร
    echo '<script>';
    echo 'var countDownDate = ';
    if ($time['date'] === '1111-01-11 00:00:00.00') {
        echo '0;';
    } else {
        echo 'new Date("' . $time['date'] . '").getTime();';
    }
    echo 'var x = setInterval(function() {';
    echo 'var now = new Date().getTime();';
    echo 'var distance = countDownDate - now;';
    echo 'var days = Math.floor(distance / (1000 * 60 * 60 * 24));';
    echo 'var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));';
    echo 'var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));';
    echo 'var seconds = Math.floor((distance % (1000 * 60)) / 1000);';
    echo 'if (countDownDate === 0) {';
    echo 'document.getElementById("timer").innerHTML = "ถาวร";';
    echo '} else {';
    echo 'document.getElementById("timer").innerHTML = days + " : " + hours + " : " + minutes + " : " + seconds + "";';
    echo 'if (distance < 0) {';
    echo 'clearInterval(x);';
    echo 'document.getElementById("timer").innerHTML = "EXPIRED";';
    echo '} else if (days < 1) {';
    echo 'var alreadyNotified = localStorage.getItem("alreadyNotified");';
    echo 'if (!alreadyNotified) {';
    echo '    Toast.fire({';
    echo '        icon: "error",';
    echo '        title: "อายุการใช้งานใกล้หมดแล้ว!"';
    echo '    });';
    echo '    localStorage.setItem("alreadyNotified", true);';
    echo '}';
    echo '}';
    echo '}';
    echo '}, 1000);';
    echo '</script>';
?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    localStorage.removeItem("alreadyNotified");
});
</script>