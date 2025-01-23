<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'a_func.php';

function rt($status, $message)
{
    if ($status) {
        $json = ['status' => 'success', 'message' => $message];
        http_response_code(200);
        die(json_encode($json));
    } else {
        $json = ['status' => 'fail', 'message' => $message];
        http_response_code(400);
        die(json_encode($json));
    } 
}

//////////////////////////////////////////////////////////////////////////

header('Content-Type: application/json; charset=utf-8;');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_SESSION['id'])) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apikey.byshop.me/api/product.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        if ($response === false) {
            rt(false, "ไม่สามารถเรียกข้อมูลจาก API ได้!");
        }

        $load_packz = json_decode($response);

        foreach ($load_packz as $data) {
            $check_stock = $data->stock;
            $shop_status = $data->status;
            $shop_point = $data->price;
            $shop_img = $data->img;
            $shop_name = $data->name;
            $shop_id = $data->id;

            $query = "UPDATE `products_app` SET `price` = '{$shop_point}', 
                    `stock` = '{$check_stock}',  
                    `status` = '{$shop_status}'";

            $query .= " WHERE product_id = '{$shop_id}';";

            $result = $conn->query($query);

            if (!$result) {
                rt(false, "ไม่สามารถอัปเดตข้อมูลร้านค้าได้!");
            }
        }

        rt(true, "อัปเดตข้อมูลสำเร็จ!!", "ข้อมูลสินค้าของคุณเป็นข้อมูลล่าสุดแล้ว");
    } else {
        // rt(false, "โปรดเข้าสู่ระบบก่อนดำเนินการ");
        rt(false, "save ipinfo.");
    }
} else {
    rt(false, "Method '{$_SERVER['REQUEST_METHOD']}' not allowed!");
}
?>