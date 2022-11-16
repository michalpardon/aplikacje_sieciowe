<?php
require_once 'init.php';

getConf()->login_action = 'login'; 

switch ($action) {
	default :
		control('app\\controllers', 'CalcCtrl', 'generateView', ['user','admin']);
	case 'login': 
		control('app\\controllers', 'LoginCtrl', 'doLogin');
	case 'calcCompute' : 
		//zamiast pierwszego parametru można podać null lub '' wtedy zostanie przyjęta domyślna przestrzeń nazw dla kontrolerów
		control(null, 'CalcCtrl', 'process', ['user','admin']);
	case 'logout' : 
		control(null, 'LoginCtrl', 'doLogout', ['user','admin']);
}
