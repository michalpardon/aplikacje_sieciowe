<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\RegisterForm;
use core\SessionUtils;
use app\transfer\User;

class RegisterCtrl {

    private $form;
    private $id;
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new RegisterForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');
        $this->form->confirm = ParamUtils::getFromRequest('confirm');

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty(trim($this->form->login))) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty(trim($this->form->pass))) {
            Utils::addErrorMessage('Nie podano hasła');
        }
        if (empty(trim($this->form->confirm))) {
            Utils::addErrorMessage('Nie potwierdzono hasła');
        }        
        if ($this->form->pass != $this->form->confirm) {
             Utils::addErrorMessage('Podane hasła nie są zgodne');
        }
        if (App::getDB()->has("user", ["login" => $this->form->login])) {
             Utils::addErrorMessage('Użytkownik o tym loginie istnieje już w bazie');
        }
        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;

        $hashed_pass = password_hash($this->form->pass, PASSWORD_DEFAULT);
        App::getDB()->insert("user",[
                        "login" => $this->form->login,
                        "password" => $hashed_pass,
                    ]);
        $this->id = App::getDB()->get("user",
                        "idUser", ["login" => $this->form->login]);
        
            App::getDB()->insert("user_has_role",[
                        "user_idUser" => $this->id,
                        "roles_idRoles" => 2,
                        
                    ]);
        
        return !App::getMessages()->isError();
    }

    public function action_register() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addInfoMessage('Poprawnie zarejestrowano w systemie. Zaloguj się.');
            SessionUtils::storeMessages(); // metoda zapisująca w sesji obiekt messages. loadMessages jest w ctrl.php!
            App::getRouter()->redirectTo('login');
        } else {
            //błędna walidacja => pozostań na stronie rejestracji
            $this->generateView();
        }
    }


    public function generateView() {
        App::getSmarty()->assign('page_title','Zarządzanie rachunkami');
        App::getSmarty()->assign('page_description','System do zarządzania rachunkami');
        App::getSmarty()->assign('page_header','Zarządzanie rachunkami');	
//        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('RegisterView.tpl');
    }

}
