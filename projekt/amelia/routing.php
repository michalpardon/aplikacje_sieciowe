<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('mainPage'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('mainPage',    'MainPageCtrl', 	['admin', 'user']);
Utils::addRoute('login',         'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl', ['admin', 'user']);
Utils::addRoute('register',        'RegisterCtrl');
Utils::addRoute('showAll',        'ListOfUsersCtrl', 	['admin']); //lista użytkowników z rolami
Utils::addRoute('userDelete',        'ListOfUsersCtrl', ['admin']); //usuń usera
Utils::addRoute('addAdmin',        'ListOfUsersCtrl',['admin']); //nadaj rolę admina
Utils::addRoute('roleInactive',        'ListOfUsersCtrl',['admin']); //deaktywuj rolę
Utils::addRoute('addBill',        'AddBillCtrl',['user']); //dodaj rachunek
Utils::addRoute('showAddBill',        'AddBillCtrl',['user']); //lista rachunków
Utils::addRoute('payBill',        'MainPageCtrl',['user']); //rachunki indywidualne
