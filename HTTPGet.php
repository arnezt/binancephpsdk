<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Client\BncClient;

// $bncClient = new BncClient('https://data-seed-pre-2-s1.binance.org');
$bncClient = new BncClient('https://testnet-dex.binance.org');
// https://data-seed-pre-2-s1.binance.org
// https://testnet-dex.binance.org
$bncClient->chooseNetwork("testnet"); // or this can be "mainnet" testnet

// getAccount
$result = $bncClient->getAccount('tbnb1zka5265vhst0jf4jr3tnwcmxqg8he4myj6yu4u');
print_r($result) . "\n";

//getBalance
//$result = $bncClient->getBalance('tbnb1yqyppmev2m4z96r4svwtjq8eqp653pt6elq33r');
//var_dump($result);

//getMarkets
//$result = $bncClient->getMarkets(10, 0);
//var_dump($result);

//getTransactions
//$result = $bncClient->getTransactions('tbnb1yqyppmev2m4z96r4svwtjq8eqp653pt6elq33r', 0);
//var_dump($result);

//getTx
//$result = $bncClient->getTx('1A7AB4819BA8F9FE8123FDC0395F00D54178A00B204BDC4BACDAF0BFE12B6254');
//var_dump($result);

//getTx
// $result = $bncClient->getDepth();
// var_dump($result);

//getOpenOrders
// $result = $bncClient->getOpenOrders('tbnb1yqyppmev2m4z96r4svwtjq8eqp653pt6elq33r');
// var_dump($result);

//getSwapByID
$result = $bncClient->getSwapByID('a8944acbb96e8a1bdd620a0d4299e608a7b32ef71c08e24a4ac61a6764b2a10d');
print_r($result) . "\n";

//getSwapByCreator
// $result = $bncClient->getSwapByCreator('tbnb1yeqam4a4y9a3ht7hawzd5vtd4a59mu5j4gdy0v', 5);
// print_r($result) . "\n";

//getSwapByCreator
// $result = $bncClient->getSwapByRecipient('tbnb1fndf8afa3zuqr2dxtz4da3prnhzsrg8vgw6ymr', 5);
// print_r($result) . "\n";
