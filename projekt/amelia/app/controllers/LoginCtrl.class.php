<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;
use core\SessionUtils;
use app\transfer\User;

class LoginCtrl {

    private $form;
    private $idUser;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (! (isset ( $this->form->login ) && isset ( $this->form->pass )))
            return false;
        
        if (App::getMessages()->isError())
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty(trim($this->form->login))) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty(trim($this->form->pass))) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        if (App::getMessages()->isError())
            return false;


        if ($this->form->login == App::getDB()->get("user","login", ["login" => $this->form->login])) {
                if(password_verify($this->form->pass,App::getDB()->get("user","password", ["login" => $this->form->login]))){
                    $this->idUser = App::getDB()->get("user","idUser", ["login" => $this->form->login]);
                    $user = new User($this->form->login, $this->idUser);
                    $rola = App::getDB()->select("role", ["[><]user_has_role" => ["role.idRoles" => "roles_idRoles"], "[><]user" => ["user_has_role.user_idUser" => "idUser"]],["role.roleName", "isActive"], ["user.login" => $this->form->login]);     
//                    foreach($rola as $x){
//                        $user->add(implode(",",$x));
//                        
//                    }
//                    foreach($user->role as $y){
//                        RoleUtils::addRole($y);
//                    }
                    $date = date("Y-m-d h:i:s"); //pobieram aktualny czas 
                    foreach($rola as $x){
                        if($x["isActive"] != 0){
                            $user->add($x["roleName"]); //dodaję rolę do tablicy usera
                            App::getDB()->update("role", ["lastActive" => $date], ["roleName" =>$x["roleName"]]); //aktualizuję ostatnie logowanie dla roli
                        }
                    }
                    foreach($user->role as $y){
                        RoleUtils::addRole($y);
                    }

//                 
//                 //                 $where = $this->form->login;
//                 $rola = App::getDB()->query("SELECT <role.roleName> FROM <role> INNER JOIN <user_has_role> ON <role.idRoles> = <user_has_role.roles_idRoles> INNER JOIN <user> ON <user.idUser> = <user_has_role.user_idUser> WHERE <user.login> = "$where'")->fetchAll();
//                 $user = new User($this->form->login, $rola);
//                 RoleUtils::addRole($user->role);
                 SessionUtils::storeObject('user', $user);
                } else {
                    Utils::addErrorMessage('Niepoprawny login lub hasło');
                }
        } else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }

        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addInfoMessage('Poprawnie zalogowano do systemu');
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('MainPage');
        } else {
            //niezalogowany => pozostań na stronie logowania
            $this->generateView();
        }
    }

    public function action_logout() {
        // 1. zakończenie sesji
        session_destroy();
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo('login');
    }

    public function generateView() {
        App::getSmarty()->assign('page_title','Zarządzanie rachunkami');
        App::getSmarty()->assign('page_description','System do zarządzania rachunkami');
        App::getSmarty()->assign('page_header','Zarządzanie rachunkami');	        
        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('LoginView.tpl');
    }

}
