<div class="container-sm p-4" data-aos="<?php echo $anim; ?>">
    <div class="container-sm <?php echo $bg?> shadow-sm p-4 mb-4" style="border-radius: 1vh;" data-aos="fade-down">
        <center>
            <div class="col-12 col-lg-12 <?php echo $bg?> shadow-sm p-2 mb-2" style="border-radius: 1vh;">
                <div class="d-flex justify-content-between">
                    <div class="text-center text-lg-start">
                    <h3 class=" m-0"><img src="<?php echo $ic_his;?>" class="m-0 mb-2" style="height: 2.5rem;">&nbsp;ประวัติซื้อสินค้า</h3>
                    </div>
                    <button class="btn nav-link align-self-center <?php echo $bg?> shadow-sm border" onclick="window.history.back()" style="border-radius: 1vh;height: fit-content;"><b><i class="fa-solid fa-turn-down-left"></i> ย้อนกลับ</b></button>
                </div>
            </div>
        </center>
        <div class="table-responsive mt-3 ">
        <table id="table" class="table mt-2">
            <thead class="table">
                <tr class="">
                    <th scope="col" class="text-center">id</th>
                    <th scope="col" class="text-center">ชื่อรายการ</th>
                    <th scope="col" class="text-center">ของรางวัล</th>
                    <th scope="col" class="text-center">วันที่</th>
                    <th scope="col" class="text-center">คัดลอก</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $q = dd_q("SELECT * FROM boxlog WHERE uid = ? ORDER BY id DESC ", [$_SESSION['id']]);
                    $i = 1;
                    while($row = $q->fetch(PDO::FETCH_ASSOC)){  
                ?>
                    <tr>
                    <th scope="row" class="text-center" style="color: var(--font)"><?php echo htmlspecialchars($row['id']);?></th>
                        <td class="text-center" style="color: var(--font)"><?php echo htmlspecialchars($row['category']);?></td>
                        <td class="text-center" style="color: var(--font)" value="<?php echo htmlspecialchars($row['prize_name']);?>"><?php echo htmlspecialchars($row['prize_name']);?></td>
                        <td class="text-center" style="color: var(--font)"><?php echo htmlspecialchars($row['date']);?></td>
                        <td class="text-center" style="color: var(--font)">
                            <button class="btn <?php echo $bg?> shadow-sm border border-1" style="color: var(--font);" onclick="copy_path('<?php echo htmlspecialchars($row['prize_name']);?>')"><i class="fa-regular fa-clipboard" style="color: var(--font);"></i></button>
                        </td>
                    </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
$(document).ready(function() {
$('#table').DataTable();
});
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
})
function copy_path(prize_name) {
    const textarea = document.createElement('textarea');
    textarea.value = prize_name;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    Toast.fire({
        icon: 'success',
        title: 'คัดลอกสำเร็จ'
    })
}
</script>