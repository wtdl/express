<?php
//
require_once 'vendor/autoload.php';


// 253088580082

//804183146837337041

$result = \Wtdl\Express\Express::query('804183146837337041');
print_r($result);

$type = \Wtdl\Express\Express::queryType('804183146837337041');
print_r($type);


$result = \Wtdl\Express\Express::query('253088580082');
print_r($result);

$type = \Wtdl\Express\Express::queryType('253088580082');
print_r($type);