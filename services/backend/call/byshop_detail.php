<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../../a_func.php';

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

        if ($_POST['id'] != "") {
            $q_1 = dd_q('SELECT * FROM users WHERE id = ? AND rank = 1 ', [$_SESSION['id']]);
            if ($q_1->rowCount() >= 1) {
                $get_user = dd_q("SELECT *  FROM products_app WHERE id = ? ", [$_POST['id']]);
                if($get_user->rowCount() == 1){
                    $row = $get_user->fetch(PDO::FETCH_ASSOC);
                    $data = [
                        "name" => $row['name'],
                        "img" => $row['img'],
                        "price_web" => $row['price_web'],
                        "product_info" => $row['product_info'],
                        "onoroff" => $row['onoroff'],
                    ];
                    http_response_code(200);
                    die(json_encode($data));
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