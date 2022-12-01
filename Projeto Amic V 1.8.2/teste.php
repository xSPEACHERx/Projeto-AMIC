<?php

include("lib/vendor/autoload.php");

$data = 'Você gerou um QR Code!!!';
echo '<img src="'.(new \chillerlan\QRCode\QRCode())->render($data).'" alt="QR Code" />';