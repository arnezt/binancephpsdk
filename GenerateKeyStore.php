<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Crypto\Keystore;

$privateKey = 'bb2912559ccbb861b4facd1e2c869bf9882f2ec0e2e40fd0311dff3f51613xxx';
$keystore= new Keystore();
$keystoreData = $keystore->generateKeyStore($privateKey, "Testing");
var_dump($keystoreData);

$keystore->RestoreKeyStore($keystoreData, "Testing", "tbnb");
$privateKey = $keystore->getPrivateKey(); 
$publicKey = $keystore->createPublicKey($privateKey);
$address = $keystore->publicKeyToAddress($publicKey, 'tbnb');

var_dump($privateKey->getHex());

?>
