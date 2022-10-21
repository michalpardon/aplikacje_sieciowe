<?php
require_once dirname(__FILE__).'/../config.php';

$amount = $_REQUEST ['amount'];
$interest = $_REQUEST ['interest'];
$years = $_REQUEST ['years'];


if ( ! (isset($amount) && isset($interest) && isset($years))) {
	
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $amount == "") {
	$messages [] = 'Nie podano kwoty kredytu.';
}
if ( $years == "") {
	$messages [] = 'Nie podano liczby lat.';
}
if ( $interest == "") {
	$messages [] = 'Nie podano wartości oprocentowania.';
}

if (empty( $messages )) {
	
	if (! is_numeric( $amount )) {
		$messages [] = 'Podana kwota kredytu nie jest liczbą.';
	}
	
	if (! is_numeric( $years )) {
		$messages [] = 'Podana liczba lat nie jest liczbą.';
	}
	
	if (! is_numeric( $interest )) {
		$messages [] = 'Podane oprocentowanie nie jest liczbą';
	}	
	

}


if (empty ( $messages )) { 
	
	$amount = floatval($amount);
	$interest = floatval($interest);
	$years = floatval($years);
	
	$result = round((($amount * ($interest/100)) + $amount) / ($years * 12),2);
	$total =  $result * $years * 12;
	
}

include 'calc_view_kredytowy.php';