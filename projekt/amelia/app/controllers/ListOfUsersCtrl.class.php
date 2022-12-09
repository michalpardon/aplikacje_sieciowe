<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use app\forms\EditUserForm;
use app\forms\ListOfUsersForm;
use core\Utils;
use \core\SessionUtils;




class ListOfUsersCtrl {

    private $records;
    private $form;
    private $filtr;


    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new EditUserForm();
        $this->filtr = new ListOfUsersForm;
    }

    public function action_showAll() {
//        $this->records = App::getDB()->select("role", ["[><]user_has_role" => ["role.idRoles" => "roles_idRoles"], "[><]user" => ["user_has_role.user_idUser" => "idUser"]]);     

        $this->filtr->login = ParamUtils::getFromRequest('login'); 

        
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->filtr->login) && strlen($this->filtr->login) > 0) {
            $search_params['login[~]'] = $this->filtr->login . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }        
        $where ["ORDER"] = ["login", "roleName"]; //SORTOWANIE

        $this->records = App::getDB()->select("role", 
            ["[><]user_has_role" => ["role.idRoles" => "roles_idRoles"], "[><]user" => ["user_has_role.user_idUser" => "idUser"]],
            ["role.roleName", "login", "createdAt", "idRoles", "idUser_has_role", "idRoles", "idUser", "isActive", "creatAt", "deleteAt"], //kolumny do pobrania
            $where);  //sortowanie
        
        
        $this->generateView();
    }
    
    public function validateDelete() {
        $this->form->idUser = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
	return !App::getMessages()->isError();
    }
    
    public function validateAddAdmin() {
        $this->form->idUser = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
	return !App::getMessages()->isError();
    }
    public function validateRoleInactive() {
        $this->form->idUser_has_role = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
	return !App::getMessages()->isError();
    }
    
    public function action_roleInactive() {
        
        if ($this->validateRoleInactive()) {
            try {
                App::getDB()->update("user_has_role", [
                    "isActive" => 0,
                    "deleteAt" => date("Y-m-d h:i:s"),
                ], ["idUser_has_role" => $this->form->idUser_has_role]);
                Utils::addInfoMessage('Pomyślnie zablokowano rolę dla wybranego użytkownika');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        SessionUtils::storeMessages();
        App::getRouter()->forwardTo('showAll');
    }
    
    public function action_userDelete() {
        
        if ($this->validateDelete()) {
            try {
                // usunięcie rekordu
                App::getDB()->delete("user", [
                    "idUser" => $this->form->idUser
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        SessionUtils::storeMessages();
        App::getRouter()->forwardTo('showAll');
    }
    
    public function action_addAdmin() {
        
        if ($this->validateAddAdmin()) {
            try {
                App::getDB()->insert("user_has_role", [
                    "user_idUser" => $this->form->idUser,
                    "roles_idRoles" => 1,
                ]);
                Utils::addInfoMessage('Pomyślnie zwiększono uprawnienia');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        SessionUtils::storeMessages();
        App::getRouter()->forwardTo('showAll');
    }
    
    public function generateView() {
        App::getSmarty()->assign('page_title','Zarządzanie rachunkami');
        App::getSmarty()->assign('page_description','System do zarządzania rachunkami');
        App::getSmarty()->assign('page_header','Zarządzanie rachunkami');	
        App::getSmarty()->assign('view', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('filtr', $this->filtr);  // pola do filtrowania
        App::getSmarty()->assign('user', SessionUtils::loadObject('user', $keep = true));
        App::getSmarty()->display('ListView.tpl');
    }

}
