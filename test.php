<?php

function generateSignature($operatorCode, $providerCode, $secretKey)
{
    $signatureString = strtolower($operatorCode) . strtoupper($providerCode) . $secretKey;
    $signature = strtoupper(md5($signatureString));

    return $signature;
}

// Example usage:
$operatorCode = 'r8bm';
$providerCode = 'AG';
$secretKey = 'cb9d7680c24e1d501a9a393b0698e522';

$signature = generateSignature($operatorCode, $providerCode, $secretKey);

echo "Signature: " . $signature;
$token = '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';