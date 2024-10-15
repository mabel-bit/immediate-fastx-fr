<?php

$phone = $_POST['phone'];
if (!preg_match('/^\+33/', $phone) && !preg_match('/^33/', $phone)) {
    $phone = '33' . $phone;
}

$data = array(
    'ai' => '2958048',
    'ci' => '1',
    'gi' => '31',
    'userip' => $_SERVER['REMOTE_ADDR'],
    'firstname' => $_POST['first_name'],
    'lastname' => $_POST['last_name'],
    'email' => $_POST['email'],
    'password' => 'ABCabc123',
    'phone' => $phone,
    'so' => 'Immediate FastX',
    'sub' => $_POST['subid'],
    'ad' => 'Sandra',
    'term' => 'Immediate FastX',
    'campaign' => 'FR'
);
$curl = curl_init('https://ag.arbgroup.shop/api/signup/procform');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));  // Передаем данные в JSON формате
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'x-trackbox-username: Sandra',
    'x-trackbox-password: wdH9Jiid4F!ru_9Ck*eU',
    'x-api-key: 2643889w34df345676ssdas323tgc738'
));

$result = curl_exec($curl);
echo $result;
curl_close($curl);

// Постбэк URL для отслеживания результата
$url = 'http://188.166.84.168/d4409bf/postback?status=lead&subid=' . urlencode($_POST['subid']) . '&sub_id_20=' . urlencode($_POST['first_name']) . '&sub_id_21=' . urlencode($_POST['last_name']) . '&sub_id_23=' . urlencode($_POST['email']) . '&sub_id_22=' . urlencode($phone);
file_get_contents($url);

die;
?>
