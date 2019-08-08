<?php

$json = file_get_contents(__DIR__ . '/wrong_empty.json');
echo "content: " . $json, "\n"; //"content: ﻿[]"
echo "encoding: " . mb_detect_encoding($json) . "\n"; //"encoding: UTF-8"
//$json = mb_convert_encoding($json, 'UTF-8');
$a = json_decode($json);
echo json_last_error_msg()."\n"; //"Syntax error"