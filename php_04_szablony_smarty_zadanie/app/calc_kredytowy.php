<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

function getParams(&$form){
    $form['amount'] = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $form['interest'] = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
    $form['years'] = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
}

function validate(&$form,&$infos,&$msgs){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($form['amount']) && isset($form['interest']) && isset($form['years']))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}
        $infos [] = 'Przekazano parametry.';
	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['amount'] == "") {
		$msgs [] = 'Nie podano kwoty kredytu.';
	}
	if ( $form['years'] == "") {
		$msgs [] = 'Nie podalno liczby rat.';
	}
        if ( $form['interest'] == "") {
		$msgs [] = 'Nie podano oprocentowania.';
	}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count($msgs) == 0){
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
            if (! is_numeric( $form['amount'] )) {
		$msgs [] = 'Wprowadzona wartość dla kwoty nie jest liczbą.';
            }
	
            if (! is_numeric( $form['years'] )) {
		$msgs [] = 'Wprowadzona ilość lat nie jest liczbą.';
            }	
            if (! is_numeric( $form['interest'] )) {
		$msgs [] = 'Wprowadzone oprocentowanie nie jest liczbą.';
            } 
        }

	if (count ( $msgs ) != 0) return false;
	else return true;
}

function process(&$form,&$infos,&$result, &$total){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	$form['amount'] = floatval($form['amount']);
	$form['years'] = floatval($form['years']);
        $form['interest'] = floatval($form['interest']);
        $result = round((($form['amount'] * ( $form['interest']/100)) + $form['amount']) / ($form['years'] * 12),2);
        $total =  $result * $form['years'] * 12;
}

//definicja zmiennych kontrolera

$form = null;
$infos = array();
$msgs = array();
$result = null;
$total = null; 

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($form);
if ( validate($form,$infos,$msgs) ) { // gdy brak błędów
	process($form,$infos,$result, $total);
}

// Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','Obliczanie miesięcznej raty kredytu.');
$smarty->assign('page_header','Kalkulator');


$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('total',$total);
$smarty->assign('messages',$msgs);
$smarty->assign('infos',$infos);

//Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc_view_kredytowy.html');