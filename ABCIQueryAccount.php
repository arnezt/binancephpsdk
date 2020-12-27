<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Client\AbciRequest;
use Binance\Crypto\Address;

$server = "https://data-seed-pre-2-s1.binance.org";
// $server = "https://testnet-dex.binance.org";
$address = "tbnb1yeqam4a4y9a3ht7hawzd5vtd4a59mu5j4gdy0v";


$request = new AbciRequest();
$result = $request->GetAppAccount($server, $address);
$sequence = $result->getBase()->getSequence();
echo 'Sequence: ' . $sequence;

// WE HAVE DECODED THE MESSAGE
// NOW ENCODE THE ADDRESS IN BECH32
$rawAddress = $result->getBase()->getAddress();

$address = new Address();
$bech32EncodedAddress = $address->EncodeAddress($rawAddress, "tbnb");
echo 'Bech32 Encoded Address:' . $bech32EncodedAddress;


$DecodedAddress = $address->DecodeAddress($bech32EncodedAddress);
echo 'Bech32 Decoded Address: ' . $DecodedAddress;
