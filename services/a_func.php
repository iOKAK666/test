<?php

session_start();
$host = "localhost";
$db_user = "xdnvstor_demo";
$db_pass = "HtWrZak4Janr43Em7B2G";
$db =  "xdnvstor_demo";
//connect to database
$conn = new PDO("mysql:host=$host;dbname=$db", $db_user, $db_pass);
$conn->exec("set names utf8mb4");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//end connect to database
//function query
function dd_q($str, $arr = [])
{
    global $conn;
    try {
        $exec = $conn->prepare($str);
        $exec->execute($arr);
    } catch (PDOException $e) {
        return false;
    }
    return $exec;
}
//end function query

//function check login
function check_login()
{
    if (!isset($_SESSION['id'])) {
        return false;
    } else {
        return true;
    }
}
function checknull($var = [])
{
    foreach ($var as $key => $value) {
        if ($value == "" || empty($value) || !isset($value)) {
            return false;
        }
    }
    return true;
}
function gen($l) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $randomString = '';

    for ($i = 0; $i < $l; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
$conf['sitekey'] = "6LdmDFkkAAAAAEKni0zQPY4MEtv2nxLodGLEQvVO";
$conf['secretkey'] = "6LdmDFkkAAAAAAFYBGr37VPuRl-L1hfwraFwO5pW";
function base_url()
{
    return "";
}

$get_setting = dd_q("SELECT * FROM setting");
$config = $get_setting->fetch(PDO::FETCH_ASSOC);

$timedate = dd_q("SELECT * FROM date");
$time = $timedate->fetch(PDO::FETCH_ASSOC);

$byshop = dd_q("SELECT * FROM byshop")->fetch(PDO::FETCH_ASSOC);
$byshop_status = $byshop["status"];
$byshop_key = $byshop["apikey"];

$pdb = dd_q("SELECT * FROM products_app")->fetch(PDO::FETCH_ASSOC);
$statuspd = $pdb["status"];

if (isset($_SESSION['id'])) {
    $q1 = dd_q("SELECT * FROM users WHERE id = ? LIMIT 1", [$_SESSION['id']]);
    $user = $q1->fetch(PDO::FETCH_ASSOC);
}