<?php
require_once '../services/a_func.php';

// status - success
function dd_returnt($status, $message, $img, $name, $reward, $price, $time) {
    $json = [
        'status' => 'success', 
        'message' => $message, 
        'img' => $img, 
        'name' => $name, 
        'reward' => $reward, 
        'price' => $price, 
        'time' => $time
    ];
    http_response_code(200);
    die(json_encode($json));
}
// status - fail
function dd_returnf($status, $message) {
    $json = ['status'=> 'fail','message' => $message];
    http_response_code(200);
    die(json_encode($json));
}

// //////////////////////////////////////////////////////////////////////////

header('Content-Type: application/json; charset=utf-8;');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // if (isset($_SESSION['id'])) {
    if (isset($_POST['keyapi']) AND isset($_POST['id']) AND isset($_POST['username_customer'])) {
        $p = dd_q("SELECT * FROM users WHERE apikey = ? ", [$_POST['keyapi']]);
        $plr = $p->fetch(PDO::FETCH_ASSOC);
        if (preg_match('/^[0-9]+$/', (int)$_POST['id'])) {
            $q_1 = dd_q('SELECT * FROM users WHERE apikey = ?', [$_POST['keyapi']]);
            if ($q_1->rowCount() >= 1) {
                $row_1 = $q_1->fetch(PDO::FETCH_ASSOC);
                $p = dd_q("SELECT * FROM box_product WHERE id = ?",[$_POST['id']]);
                if($p->rowCount() >= 1){
                    $pd = $p->fetch(PDO::FETCH_ASSOC);
                    $point = (int) $row_1['point'];
                    $price = (int) $pd['price'];
                    if($point >= $price){
                        $find_stock = dd_q("SELECT * FROM box_stock WHERE p_id = ? ", [$pd['id']]);
                        if($find_stock->rowCount() >= 1){
                            $stock = $find_stock->fetch(PDO::FETCH_ASSOC);
                            $del = dd_q("DELETE FROM box_stock WHERE id = ? ", [$stock['id']]);
                            $upt = dd_q("UPDATE users SET point = point  - ? WHERE id = ? ",[$price , $_SESSION['id']]);
                            $insert = dd_q("INSERT INTO boxlog (date , username , category , price , prize_name , uid)
                                VALUES ( NOW() , ? , ? , ? , ? , ?  ) 
                                ", [
                                    $_POST['username_customer'],
                                    $pd["name"],
                                    $pd["price"],
                                    $stock["username"],
                                    $row_1["id"]
                                ]);
                            $upt = dd_q("UPDATE id_product SET o_id = ? WHERE id = ? LIMIT 1",[$_SESSION['id'], $pd['id']]);
                            if ($insert and $del) {
                                $date = date('Y-m-d H:i:s');
                                dd_returnt(true, "สั่งซื้อสำเร็จ", $pd["img"], $pd["name"], $stock["username"], $pd["price"], $date);
                            } else {
                                dd_returnf(false, "[ERROR API BUY] โปรดติดต่อเจ้าของเว็บ!");
                            }
                        }else{
                            dd_returnf(false, "สินค้าหมดแล้วครับ");
                        }
                    }else{
                        dd_returnf(false, "คุณมียอดเงินไม่เพียงพอ");
                    }
                }else{
                    dd_returnf(false, "ไม่พบสินค้า");
                }
            }else{
                dd_returnf(false, "ไม่พบผู้ใช้งาน");
            }
        }else{
            dd_returnf(false, "ไอดีสินค้าต้องเป็นตัวเลขเท่านั้น");
        }
    }else{
        dd_returnf(false, "กรุณากรอกข้อมูลให้ครบ");
    }
}else{
    dd_returnf(false, "Method '{$_SERVER['REQUEST_METHOD']}' not allowed!");
}