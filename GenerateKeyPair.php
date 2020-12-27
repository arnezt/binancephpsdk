<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Crypto\Keystore;
use Binance\Types\Byte;
use Binance\Crypto\Address;

// if (!extension_loaded("secp256k1")) print "skip extension not loaded" . "\n\n";
$keystore = new Keystore();
$privateKey = Byte::init($keystore->createPrivateKey());
$publicKey = $keystore->createPublicKey($privateKey);
$address = $keystore->publicKeyToAddress($publicKey, 'tbnb');
print_r($privateKey) . "\n";
print_r($privateKey->getHex()) . "\n";
print_r(Byte::init(hex2bin($privateKey->getHex()))) . "\n";
print_r($publicKey) . "\n";
print_r($address) . "\n";
