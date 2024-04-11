<?php 
// https://api.telegram.org/bot5735509513:AAG_KSYHWA6rbXCct5qWqW2tGZ6NJZqut_8/getUpdates

$headline = $_POST['headline'];
$name = $_POST['u-name'];
$phone = $_POST['u-phone'];
$type = $_POST['u-type'];
$price = $_POST['u-price'];
$year = $_POST['u-year'];
$volume = $_POST['u-volume'];
$power = $_POST['u-power'];
$engine = $_POST['u-engine'];
// $totalPrice = $_POST['totalPrice'];

$token = "5735509513:AAG_KSYHWA6rbXCct5qWqW2tGZ6NJZqut_8";
$chat_id = "-1001844882677";

$arr = array(
    'Форма: ' => $headline,
    'Имя: ' => $name,
    'Телефон: ' => $phone,
    'Запрос на: ' => $type,
    'Стоимость Авто: ' => $price,
    'Возраст автомобиля: ' => $year,
    'Объем двигателя: ' => $volume,
    'Мощность двигателя: ' => $power,
    'Тип двигателя: ' => $engine,
    // 'Итоговая цена: ' => $totalPrice,
);

foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
    
if ($sendToTelegram) {
    return true;
} else {
    echo 'Error';
}
?>