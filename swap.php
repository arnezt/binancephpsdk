<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Client\BncClient;
use Binance\Swap\Swap;

$privateKey = 'xxxxx25863bf65727feec21c1c5cb8c455751e14a34e21aa325d5fdb9fe2xxx';
// https://data-seed-pre-2-s1.binance.org
// https://testnet-dex.binance.org
// api.binance.org/bridge
$bncClient = new BncClient('https://data-seed-pre-2-s1.binance.org');
$bncClient->chooseNetwork("testnet"); // or this can be "mainnet"
$bncClient->initChain();
$bncClient->setPrivateKey($privateKey);

$coins = array("denom" => "BNB", "amount" => 1200000);

$timestamp = time();
$timestampToPack = pack('J*', $timestamp);

$randomNumber = random_bytes(32);
echo "Random Number: ". bin2hex($randomNumber) . "\n"; // you will need this in claimHTLT
$randomNumberHash = hash('sha256', $randomNumber.$timestampToPack);

$swapClient = new Swap($bncClient);
$response = $swapClient->HTLT(
    'tbnb1yeqam4a4y9a3ht7hawzd5vtd4a59mu5j4gdy0v', //from
    'tbnb1fndf8afa3zuqr2dxtz4da3prnhzsrg8vgw6ymr', //to
    '', //recipientOtherChain
    '',  //senderOtherChain
    $randomNumberHash, //randomNumberHash
    $timestamp, // timestamp
    $coins, //outAmount array(lihat di $coins)
    "1:BUSD-BAF", //expectedIncome BUSD-6C3 BUSD-BAF
    3600, //heightSpan
    false // crossChain
);
foreach($response as $k => $val){
    echo 'Hash: '. $val->hash . "\n";
    $ekstrak = preg_split('/[\s,]+/', $val->log);
    echo 'Swap ID: '. $ekstrak[3] . "\n";
    echo 'Status: '. $val->ok . "\n";
}
