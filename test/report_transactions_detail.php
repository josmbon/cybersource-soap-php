<?php

	error_reporting(0);
	
	require( dirname( __FILE__ ) . '/../vendor/autoload.php' );
	require( dirname( __FILE__ ) . '/config.php' );

	$cr = new CyberSource\Reporting( $merchant_id, $username, $password, CyberSource\Reporting::ENV_TEST );
	
	//$transactions = $cr->transaction_detail(); /* yesterday */
	$transactions = $cr->transaction_detail('20170908'); /* yyyyMMdd */ 

	header("Content-Type: text/plain");

	foreach ($transactions as $txn) {
		echo $txn['transaction_date'] . "\t" . $txn['merchant_ref_number'] . "\t" .
		     $txn['currency'] . ' ' . $txn['amount'] . "\t" . $txn['source'] . PHP_EOL;
	}

	//print_r($transactions) . PHP_EOL;
	print_r(json_encode($transactions, JSON_PRETTY_PRINT)) . PHP_EOL;

// EOL