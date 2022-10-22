<?php
require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';

function getParams(&$amount,&$years,&$interest){
    $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
    $years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
}

function validate(&$amount,&$years,&$interest,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($amount) && isset($years) && isset($interest))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $amount == "") {
		$messages [] = 'Nie podano kwoty kredytu.';
	}
	if ( $years == "") {
		$messages [] = 'Nie podalno liczby rat.';
	}
        if ( $interest == "") {
		$messages [] = 'Nie podano oprocentowania.';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $amount )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą.';
	}
	
	if (! is_numeric( $years )) {
		$messages [] = 'Druga wartość nie jest liczbą.';
	}	
	if (! is_numeric( $interest )) {
		$messages [] = 'Druga wartość nie jest liczbą.';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$amount,&$interest,&$years,&$messages,&$result, &$total){
	global $role;
	
	//konwersja parametrów na int
	$amount = floatval($amount);
	$years = floatval($years);
        $interest = floatval($interest);
	

	if ($role == 'admin'){
            $result = round((($amount * ($interest/100)) + $amount) / ($years * 12),2);
            $total =  $result * $years * 12;
        }
        if ($role == 'user' && $amount <= 4000){
            $result = round((($amount * ($interest/100)) + $amount) / ($years * 12),2);
            $total =  $result * $years * 12;
        }
        if ($role == 'user' && $amount > 4000){
            $messages [] = 'Tylko administrator może obliczyć ratę dla kwoty powyżej 4000 zł!';
        }
        

}

//definicja zmiennych kontrolera
$amount = null;
$years = null;
$interest = null;
$result = null;
$messages = array();
$total = null; 

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($amount,$years,$interest);
if ( validate($amount,$years,$interest,$messages) ) { // gdy brak błędów
	process($amount,$years,$interest,$messages,$result,$total);
}

// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view_kredytowy.php';