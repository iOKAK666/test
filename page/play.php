<?php
if (isset($_GET['wheel'])) {
    $find = dd_q("SELECT * FROM wheel WHERE id = ? ", [$_GET['wheel']]);
    if ($find->rowCount() == 1) {
        $wheel = $find->fetch(PDO::FETCH_ASSOC);
?>
        <script src="/assets/easywheel/easywheel.js"></script>
        <link rel="stylesheet" href="/assets/easywheel/easywheel.css">
        <style>
            img.asdas {
                width: 110px;
                transform: rotate(-260deg) translate(-16px, -20%);
                max-width: 190px !important;
                margin-top: 23px;
                height: auto !important;
            }

            @media screen and (max-width: 767px) {
                img.asdas {
                    width: 120px;
                    /* width: 140px; */
                    transform: rotate(-272deg) translate(3px, -43%);
                }
            }

            @media screen and (max-width: 577px) {
                img.asdas {
                    width: 140px;
                    /* width: 160px; */
                }
            }

            @media screen and (max-width: 460px) {
                img.asdas {
                    width: 125px;
                    /* width: 145px; */

                    margin: 15px;
                }
            }

            @media screen and (max-width: 430px) {
                img.asdas {
                    width: 120px;
                    /* width: 140px; */
                    transform: rotate(-272deg) translate(3px, -49%);
                    padding: 10px;
                    margin: 15px;
                }
            }

            @media screen and (max-width: 400px) {
                img.asdas {
                    width: 105px;
                    /* width: 125px; */
                    margin: 15px;
                    padding: 10px;
                }
            }

            @media screen and (max-width: 370px) {
                img.asdas {
                    width: 95px;
                    /* width: 115px; */
                    transform: rotate(-272deg) translate(3px, -51%);
                    margin: 15px;
                    padding: 10px;
                }
            }

            @media screen and (max-width: 350px) {
                img.asdas {
                    width: 80px;
                    margin: 15px;
                    padding: 10px;
                    /* width: 80px; */
                }
            }

        </style>
        <style>
            img.spin-reward {
                transform: rotate(-260deg) translate(-16px, -20%) translateY(-10px) !important;
                max-height: 150px;
                width: auto;
            }

            @media only screen and (max-width: 770px) {
                img.spin-reward {
                    max-height: 130px;
                }
            }

            @media only screen and (max-width: 420px) {
                img.spin-reward {
                    max-height: 100px;
                }
            }
        </style>
        <div class="container-fluid p-0">
            <div class="container-sm m-auto p-4 pt-0">
                <div class="container-fluid p-4" style="border-radius: 1vh;">
                    <center>
                        <div class="col-12 col-lg-12 p-2 mb-2" style="border-radius: 1vh;">
                            <div class="d-lg-flex">
                                <div class="text-center text-lg-start">
                                    <h3 class=" mt-2 mb-0 font-bold"><b class="text-main-gra"><?= $wheel['name'] ?></b></h3>
                                    <h6 class="mt-1">
                                        <a href="?page=home" class="text-main" style="text-decoration: none;">หน้าหลัก</a>
                                            <a style="color: rgb(156 163 175);"> / </a>
                                        <a style="color: rgb(156 163 175);">หมวดหมู่วงล้อ</a>
                                            <a style="color: rgb(156 163 175);"> / </a>
                                        <a style="color: rgb(156 163 175);"><?= $wheel['name'] ?></a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </center>
                    <div class="spinner"></div>
                    <div class="col-lg-4 m-auto">
                        <div class="row">   
                            <center>
                                <h5 class="text-muted" style="white-space: pre-wrap; width: 100%;">ราคารอบละ : <span class="text-main"><?php echo number_format($wheel["price"])?> บาท</span></h5>
                                <a class="btn bg-main w-100 justify-content-center align-items-center text-white mb-2" id="random" style="border-radius: 10px;">เริ่มสุ่ม ( <?php echo number_format($wheel["price"], 2)?> บาท)</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function() {
                var tick = new Audio('/assets/easywheel/tick.mp3');
                $('.spinner').easyWheel({
                    items: [
                        <?php 
                            $find = dd_q("SELECT * FROM wheel_item WHERE w_id = ? ", [$wheel['id']]);
                            while($item = $find->fetch(PDO::FETCH_ASSOC)){
                        ?>
                            {
                                id: '<?= $item['id'] ?>',
                                name: "<img src='<?= htmlspecialchars($item['img'])?>' class='spin-reward'></img>",
                                message: '<?= htmlspecialchars($item['name'])?>',
                                color: '#212529',
                            },

                        <?php
                            }    
                        ?>


                    ],
                    centerBackground: '#fff',
                    button: '.btn',
                    type: 'spin',
                    frame: 1,
                    outerLineColor: 'var(--main)',
                    centerLineColor: 'var(--main)',
                    selectedSliceColor: 'var(--main)',
                    sliceLineColor: 'var(--main)',
                    centerImage: '<?php echo $config['logo']; ?>',
                    markerAnimation: true,
                    centerClass: 0,
                    width: 600,
                    textOffset: 10,
                    textLine: "v",
                    textArc: false,
                    sliceLineWidth: 1,
                    shadowOpacity: 0,
                    fontSize: 18,
                    centerWidth: 35,
                    centerImageWidth: 30,
                    outerLineWidth: 4,
                    ajax: {
                        url: '/services/spin.php', 
                        type: 'POST',
                        data: {'wheel': '<?= $wheel['id'] ?>'},
                        nonce: true,
                        success: function(msg) {
                        },
                        error: function(msg) {
                            msg = msg.responseJSON;
                            Swal.fire({
                                icon: 'error',
                                title: 'ขออภัย',
                                text: msg.message,
                            }).then(function() {
                                window.location.reload();
                            })

                        }
                    },
                    onStart: function(results, spinCount, now) {


                    },
                    onStep: function(results, slicePercent, circlePercent) {
                        if (typeof tick.currentTime !== 'undefined')
                            tick.currentTime = 0;
                        tick.play();
                    },
                    onProgress: function(results, spinCount, now) {
                        $(".spin-button").attr("disabled", true);
                        $(".spin-button").html("รอสักครู่...");
                    },

                    onComplete: function(results, count, now) {
                        console.log(results)
                        Swal.fire({
                            icon: 'success',
                            title: 'ยินดีด้วยคุณได้รับ',
                            text: results.message,
                        }).then(function() {
                            window.location.reload();
                        })

                    }
                });
            });
        </script>
<?php
    }
}
?>