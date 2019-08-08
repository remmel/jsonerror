<?php


$f = "/fine_lviv.json";
echo "______ $f ______\n";
$json = file_get_contents(__DIR__ . $f);
echo "encoding: " . mb_detect_encoding($json) . "\n";
echo "content: " . $json, "\n";
$a = json_decode($json, false, 512, JSON_THROW_ON_ERROR);
print_r($a);

$f = "/wrong_lviv.json";
echo "______ $f ______\n";
$json = file_get_contents(__DIR__ . $f);
echo "encoding: " . mb_detect_encoding($json) . "\n";
echo "content: " . $json, "\n";
$a = json_decode($json, false, 512, JSON_THROW_ON_ERROR);
//json_last_error_msg() // Syntax error
print_r($a);
//        $encoding = mb_check_encoding($json);
//        $json = mb_convert_encoding($json, 'ascii');
//$json = iconv("UTF-8", "ASCII//TRANSLIT", $json);
