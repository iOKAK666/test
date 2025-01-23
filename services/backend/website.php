<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../a_func.php';

    function dd_return($status, $message) {
        $json = ['message' => $message];
        if ($status) {
            http_response_code(200);
            die(json_encode($json));
        }else{
            http_response_code(400);
            die(json_encode($json));
        }
    }

    //////////////////////////////////////////////////////////////////////////

    header('Content-Type: application/json; charset=utf-8;');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['id'])) {

        if ($_POST['name'] != "" AND $_POST['bg3'] != "" AND $_POST['discord'] != "" AND $_POST['widget_discord'] != "" AND $_POST['facebook'] != "" AND $_POST['des'] != ""   AND $_POST['posterimg1'] != "" AND $_POST['posterink1'] != "" AND $_POST['posterimg2'] != "" AND $_POST['posterink2'] != "" AND $_POST['posterimg3'] != "" AND $_POST['posterink3'] != "" AND $_POST['posterimg4'] != "" AND $_POST['posterink4'] != "") {
            $q_1 = dd_q('SELECT * FROM users WHERE id = ? AND rank = 1 ', [$_SESSION['id']]);
            if ($q_1->rowCount() >= 1) {
                $des = preg_replace('~\R~u', "\n", $_POST['des']);
                $insert = dd_q("UPDATE setting SET 
                    name = ? , widget_discord = ? , discord = ? , facebook = ? , des = ? , ann = ? , webhook_dc = ? , bg3 = ?  , posterimg1 = ? , posterink1 = ? , posterimg2 = ? , posterink2 = ? , posterimg3 = ? , posterink3 = ? , posterimg4 = ? , posterink4 = ?
                ", [
                    $_POST['name'],
                    $_POST['widget_discord'],
                    $_POST['discord'],
                    $_POST['facebook'],
                    $des,
                    $_POST['ann'],
                    $_POST['webhook_dc'],
                    $_POST['bg3'],
                    $_POST['posterimg1'],
                    $_POST['posterink1'],
                    $_POST['posterimg2'],
                    $_POST['posterink2'],
                    $_POST['posterimg3'],
                    $_POST['posterink3'],
                    $_POST['posterimg4'],
                    $_POST['posterink4']
                ]);
                if($insert){
                    dd_return(true, "บันทึกสำเร็จ");
                }else{
                    dd_return(false, "SQL ผิดพลาด");
                }
            }else{
                dd_return(false, "เซสชั่นผิดพลาด โปรดล็อกอินใหม่");
                session_destroy();
            }
        }else{
            dd_return(false, "กรุณากรอกข้อมูลให้ครบ");
        }
        }else{
        dd_return(false, "เข้าสู่ระบบก่อน");
        }
    }else{
        dd_return(false, "Method '{$_SERVER['REQUEST_METHOD']}' not allowed!");
    }
?>
