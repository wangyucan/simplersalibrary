<?php
	require_once "lib/simplersa/RSAToolFactory.class.php";
	
	$rsa_tool = RSAToolFactory::getRSATool();
	
	$publicKey = $rsa_tool->loadPublicKey('public.pem');
	$privateKey = $rsa_tool->loadPrivateKey('private.pem');
	
	$encoded = $rsa_tool->encryptWithKey('Hello World!', $publicKey);
	echo "encoded: $encoded<br/>";
	
	$decoded = $rsa_tool->decryptWithKey($encoded, $privateKey);
	echo "decoded: $decoded<br/>";
	
	$signature = $rsa_tool->signWithKey('Hello World!', $privateKey);
	echo "signature: $signature<br/>";
	
	echo "verify: " . $rsa_tool->verifyWithKey('Hello World!', $signature, $publicKey);
?>