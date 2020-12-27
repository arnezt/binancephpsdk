<?php

require_once __DIR__ . '/vendor/autoload.php';

use Binance\Types\Byte;
use Binance\Crypto\Keystore;

use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Crypto\Random\Random;
use BitWasp\Bitcoin\Key\Factory\HierarchicalKeyFactory;
use BitWasp\Bitcoin\Mnemonic\Bip39\Bip39Mnemonic;
use BitWasp\Bitcoin\Mnemonic\Bip39\Bip39SeedGenerator;
use BitWasp\Bitcoin\Mnemonic\MnemonicFactory;

$network = Bitcoin::getNetwork();

// Generate a mnemonic
$random = new Random();
$entropy = $random->bytes(Bip39Mnemonic::MAX_ENTROPY_BYTE_LEN);

$bip39 = MnemonicFactory::bip39();
$seedGenerator = new Bip39SeedGenerator();
$mnemonic = $bip39->entropyToMnemonic($entropy);
print_r($mnemonic) . "\n";
echo PHP_EOL;
// Derive a seed from mnemonic/password
$seed = $seedGenerator->getSeed($mnemonic, '');
echo $seed->getHex() . "\n";

$hdFactory = new HierarchicalKeyFactory();
$bip32 = $hdFactory->fromEntropy($seed);

$derivedPath = $bip32->derivePath("44'/714'/0'/0/0 ");
echo PHP_EOL;
$privateKey = $derivedPath->getPrivateKey()->getHex();
print_r("Private Key: " . $privateKey) . "\n";
echo PHP_EOL;
$publicKey = $derivedPath->getPublicKey()->getHex();
print_r("Public Key: " . $publicKey) . "\n";
echo PHP_EOL;
$keystore = new Keystore();
$address = $keystore->mnemonicPublicKeyToAddress(Byte::init($publicKey), 'bnb');
print_r("Address: " . $address) . "\n";
