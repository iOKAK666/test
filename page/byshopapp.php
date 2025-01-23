        <div class="container-sm">
            <div class="">
                <div class="container-fluid">
                <center>
                    <div class="col-12 col-lg-12 p- mb-2" style="border-radius: 1vh;">
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <div class="text-center text-lg-start">
                                <h3 class="mb-0 font-bold"><b class="text-main-gra">ประวัติการซื้อแอพล่าสุด</b></h3>
                                <h6 class=" mb-0" style="color: rgb(156 163 175);">ประวัติการซื้อแอพล่าสุด 10 รายการ</h6>
                            </div>
                        </div>
                    </div>
                </center>
                <div class="bg-glass shadow-sm" style="border-radius: 10px;">
                    <marquee direction="left">
                        <div class="d-flex flex-row ">
                            <?php
                            $curl = curl_init();
                            curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://byshop.me/api/history',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 1,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => array('keyapi' => $byshop_key),  
                            CURLOPT_HTTPHEADER => array(
                                'Cookie: PHPSESSID=u8df3d96ij8re36ld76cl64t3p'
                            ),
                            ));
                                $response = curl_exec($curl);
                                $listbuy = json_decode($response);
                
                                $product_list_buy = '';
                            
                                //กำหนดรายการขายล่าสุด 10 รายการ
                                $limit = count($listbuy);
                                if($limit > 20){
                                    $limit = 20;
                                }
                                for ($i=0; $i < $limit; $i++) {
                                    $product_list_buy .= '
                                    <div class=" d-flex mr-5 mt-3 text-black"> 
                                    <br>  
                                    <img class="img-fluid rounded" style="margin:0 auto;  height: 50px;" src="https://byshop.me/buy/img/img_app/'. substr ($listbuy[$i]->name ,0,2).'.png">
                                    <span><b>&nbsp;&nbsp;&nbsp;'. $listbuy[$i]->name .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                    <br>&nbsp;&nbsp;&nbsp;'. $listbuy[$i]->time .'<br>
                                    <b><p style="font-size: 13px">&nbsp;&nbsp;<span class="rounded-pill badge bg-success">&nbsp;&nbsp;ขายแล้ว !! &nbsp;&nbsp;</span>&nbsp;<span class="rounded-pill badge bg-main text-white">&nbsp;&nbsp;ผู้ซื้อ '. $listbuy[$i]->username_customer .'&nbsp;&nbsp;</span></b></p>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
                                        ';
                                    }
                                echo $product_list_buy;
                                curl_close($curl);
                            ?> 
                        </div>
                    </marquee>
                </div>

                <center>
                    <div class="col-12 col-lg-12 p-2 mb-2" style="border-radius: 1vh;">
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <div class="text-center text-lg-start">
                                <h3 class=" mt-2 mb-0 font-bold"><b class="text-main-gra">บริการขายแอพพรีเมี่ยม</b></h3>
                                <h6 class=" mb-0" style="color: rgb(156 163 175);">บริการขายแอพพรีเมี่ยมราคาถูก</h6>
                            </div>
                        </div>
                    </div>
                </center>
				<div class="row justify-content-center">
					<div class="row" >
                        <?php
                        $find = dd_q("SELECT * FROM products_app WHERE onoroff = 'on'");
                        while ($row = $find->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                    <?php if ($row["stock"] >= 1) {?>
                        <div class="col-12 col-lg-3 mb-4 justify-content-center" data-aos="<?php echo $anim; ?>" data-aos-duration="800">
                            <div class="card-anim">
                                <div class="card-anim-main <?php echo $bg?> zoom border-hov shadow-sm p-1" style="border-radius: 1vh; height: fit-content;">
                                    <div class="p-1">
                                        <a href="">
                                            <div class="view overlay">
                                                <center>
                                                    <img class="img-fluid " src="<?php echo htmlspecialchars($row["img"]); ?>" style="border-radius: 1vh; width: 100%; max-width: 100vh;">
                                                </center>
                                                <a href="#!">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>

                                            <div class="p-3 pt-3 pb-1">
                                                <h5 class="text-strongest mb-1" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="text-main align-self-end pd-sm-font"><strong>คงเหลือ <?php echo htmlspecialchars($row["stock"]); ?> ชิ้น</strong></p>
                                                    <div>
                                                        <p class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="border-radius: 1vh; padding-top: 3px;"><?php echo htmlspecialchars($row["price_web"]); ?> ฿ </p>
                                                    </div>
                                                </div>

                                                <style>
                                                    .btn-main {
                                                        color: var(--main);
                                                        background: var(--main-30);
                                                        border: 1px solid var(--main);
                                                        transition: all .5s ease;
                                                    }
                                                    .btn-main.active {
                                                        color: white;
                                                        background-color: var(--main);
                                                        border: 1px solid var(--main);
                                                    }

                                                    .btn-main.active i {
                                                        color: white !important;
                                                    }

                                                    .btn-main:hover {
                                                        color: white;
                                                        background-color: var(--main);
                                                        border: 1px solid var(--main);
                                                    }
                                                    @media only screen and (max-width: 500px) {
                                                        .pd-sm-font {
                                                            font-size: 13px !important;
                                                        }

                                                        .pd-h-font {
                                                            font-size: 16px;
                                                        }
                                                    }
                                                </style>
                                                <center>
                                                    <a class="btn-main btn w-100 mb-2 pd-sm-font font-semibold" data-bs-toggle="modal" data-bs-target="#product_detail<?php echo htmlspecialchars($row["id"]); ?>" style="border-radius: 10px;">เลือกดูสินค้าชิ้นนี้</a>
                                                </center>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="product_detail<?php echo htmlspecialchars($row["id"]); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-glass" style="border-radius: 10px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-duotone fa-shopping-basket"></i>&nbsp;&nbsp;รายละเอียดสินค้า</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-9 m-cent">
                                            <center>
                                                <img src="<?php echo htmlspecialchars($row["img"]); ?>" class="img-fluid" style="border-radius: 10px;">
                                                <h4 class="mt-4" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h4>
                                            </center>
                                        </div>
                                        <div class="container-fluid ps-3 pe-3">
                                            <h5 class="text-secondary" style=""><?php echo $row["product_info"]; ?></h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">ปิด</button>
                                        <a href="?page=buyapp&amp;id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn bg-main text-white"><i class="fa-regular fa-basket-shopping text-white"></i>&nbsp;สั่งซื้อสินค้า</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php } else {?>
                        <div class="col-12 col-lg-3 mb-4 cc justify-content-center" style="" data-aos="<?php echo $anim; ?>" data-aos-duration="800">
                            <div class="card-anim">
                                <div class="card-anim-main <?php echo $bg?> shadow-sm p-1" style="border-radius: 1vh; height: fit-content;">
                                    <div class="opacity-50 p-1">
                                        <a>
                                            <div class="view overlay">
                                                <center>
                                                    <img class="img-fluid" src="<?php echo htmlspecialchars($row["img"]); ?>" style="border-radius: 1vh; width: 100%; max-width: 100vh;">
                                                </center>
                                                <a href="#!">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                            <div class="p-3 pt-3 pb-1">
                                                <h5 class="text-strongest mb-1" style="word-wrap: break-word;"><?php echo htmlspecialchars($row["name"]); ?></h5>
                                                <div class="d-flex justify-content-between">
                                                    <p class="text-main align-self-end pd-sm-font"><strong>สินค้าหมด</strong></p>
                                                    <div >
                                                        <a class="bg-main ps-2 pe-2 ps-lg-4 pe-lg-4 pd-sm-font text-white text-strongest" style="text-decoration: none;border-radius: 1vh; padding-top: 3px;"><?php echo number_format($row['price']); ?>.00 ฿ </a>
                                                    </div>
                                                </div>
                                                <center>
                                                    <a class="bg-main text-white btn w-100 pd-sm-font mb-2 font-semibold" style="border-radius: 10px;">สินค้าหมดรอเติม <i class="fa-light fa-spinner fa-spin" style="color: #ffffff;"></i></a>
                                                </center>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>

                    <?php } ?>

					</div>
                </div>
            </div>
        </div>