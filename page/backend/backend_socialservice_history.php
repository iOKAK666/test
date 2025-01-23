<div class="container-sm p-4" data-aos="<?php echo $anim; ?>">
    <div class="container-sm <?php echo $bg?> shadow-sm p-4 mb-4" style="border-radius: 1vh;" data-aos="fade-down">
        <center>
            <div class="col-12 col-lg-12 <?php echo $bg?> shadow-sm p-2 mb-2" style="border-radius: 1vh;">
                <div class="d-flex justify-content-between">
                    <div class="text-center text-lg-start">
                    <h3 class=" m-0"><img src="<?php echo $ic_his;?>" class="m-0 mb-2" style="height: 2.5rem;">&nbsp;ประวัติปั้มโซเชียล</h3>
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
                    <th class="text-center"> ลิ้งค์</th>
                    <th class="text-center"> จำนวน</th>
                    <th class="text-center"> ราคา</th>
                    <th class="text-center"> สถานะ</th>
                    <th class="text-center"> ผู้ซื้อ</th>
                    <th class="text-center"> วันที่สั่ง</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_user = dd_q("SELECT * FROM history_social");
                while ($row = $get_user->fetch(PDO::FETCH_ASSOC)) {
                
                ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id']; ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['list']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['link']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['amount']); ?></td>
                        <td class="text-center">สั่งซื้อสำเร็จ</td>
                        <td class="text-center"><?php echo htmlspecialchars($row['username']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($row['timeadd']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>