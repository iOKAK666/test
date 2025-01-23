<div class="container-sm p-4" data-aos="<?php echo $anim; ?>">
    <div class="container-sm <?php echo $bg?> shadow-sm p-4 mb-4" style="border-radius: 1vh;" data-aos="fade-down">
        <center>
            <div class="col-12 col-lg-12 <?php echo $bg?> shadow-sm p-2 mb-2" style="border-radius: 1vh;">
                <div class="d-flex justify-content-between">
                    <div class="text-center text-lg-start">
                    <h3 class=" m-0"><img src="<?php echo $ic_his;?>" class="m-0 mb-2" style="height: 2.5rem;">&nbsp;ประวัติออเดอร์</h3>
                    </div>
                    <button class="btn nav-link align-self-center <?php echo $bg?> shadow-sm border" onclick="window.history.back()" style="border-radius: 1vh;height: fit-content;"><b><i class="fa-solid fa-turn-down-left"></i> ย้อนกลับ</b></button>
                </div>
            </div>
        </center>
        <div class="table-responsive mt-3 ">
        <table id="table" class="table mt-2">
            <thead class="table">
                <tr class="">
                    <th class="text-center sorting sorting_asc"> id</th>
                    <th class="text-center"> สินค้า</th>
                    <th class="text-center"> ชื่อ</th>
                    <th class="text-center"> จำนวน</th>
                    <th class="text-center"> สถานะ</th>
                    <th class="text-center"> วันที่สั่ง</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_user = dd_q("SELECT * FROM service_order WHERE cosid = ? ORDER BY id DESC",  [$_SESSION["id"]]);

                function st($text)
                {
                    if ($text == "no") {
                        return "กำลังดำเนินการ";
                    } elseif ($text == "yes") {
                        return "สำเร็จ";
                    } elseif ($text == "not") {
                        return "ไม่สำเร็จ";
                    }
                }

                function getimg($text)
                {

                    $i = dd_q("SELECT * FROM service_prod WHERE name = ?",  [$text]);
                    $is = $i->fetch(PDO::FETCH_ASSOC);
                    return $is["img"];
                    
                    
                }
                
                while ($row = $get_user->fetch(PDO::FETCH_ASSOC)) {
                
                ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id']; ?></td>
                        <td class="text-center"><img src="<?php echo htmlspecialchars(getimg($row['prod'])); ?>" width="100px" alt=""></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['prod']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['count']); ?> ชิ้น</td>
                        <td class="text-center"><?php echo htmlspecialchars(st($row['status'])); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['date']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>