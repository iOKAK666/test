<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'a_func.php';

function dd_return($status, $message) {
    if ($status) {
        $json = ['status'=> 'success','message' => $message];
        http_response_code(200);
        die(json_encode($json));
    }else{
        $json = ['status'=> 'fail','message' => $message];
        http_response_code(200);
        die(json_encode($json));
    }
}

//////////////////////////////////////////////////////////////////////////

header('Content-Type: application/json; charset=utf-8;');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!isset($_SESSION['id'])) {
    $user_login = $_POST['user'];
    $pwd_login = $_POST['pass'];

        if ($user_login != "" AND $pwd_login != "") {

                $q = dd_q("SELECT * FROM users WHERE username = ? AND password = ?  ", [
                    $_POST['user'],
                    md5($pwd_login)
                ]);
                if($q->rowCount() == 1){
                  $dt = $q->fetch(PDO::FETCH_ASSOC);
                  $_SESSION['id'] = $dt['id'];
                  dd_return(true, "เข้าสู่ระบบสำเร็จ");
                  
                }else{
                  $q = dd_q("SELECT * FROM users WHERE username = ? AND password = ?  ", [
                      $_POST['user'],
                      $password = hash("sha256", hash("sha256", $pwd_login))
                  ]);
                  if($q->rowCount() == 1){
                    $dt = $q->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id'] = $dt['id'];
                    dd_return(true, "เข้าสู่ระบบสำเร็จ");
                  }else{
                    dd_return(false, "ไม่พบผู้ใช้นี้ / รหัสผ่านไม่ถูกต้อง");
                  }
                }

        }
            dd_return(false, "กรุณากรอกข้อมูลให้ครบ");

    }
  dd_return(false, "ออกจากระบบก่อน");
}
dd_return(false, "Method '{$_SERVER['REQUEST_METHOD']}' not allowed!");
?>