<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\Utils;
use app\forms\MainPageForm;
use app\forms\SearchMyBillsForm;
use core\ParamUtils;
use core\Validator;

class MainPageCtrl {
    
    private $person; //pod usera
    private $table; //załadowanie rachunków
    private $form;  //płatność
    private $searchForm; //filtr
    
    public function __construct() {
        $this->form = new MainPageForm();
        $this->searchForm = new SearchMyBillsForm();
    }

    public function action_mainPage(){
            
            $this->generateView();
    }

    public function validatePay() {
        $this->form->bill_idBill = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->form->user_idUser = ParamUtils::getFromCleanURL(2, true, 'Błędne wywołanie aplikacji');
        //sprawdzam, czy w ogóle jest w bazie
        if(!App::getDB()->has("user_has_bill",[
                "user_idUser" => $this->form->user_idUser,
                "bill_idBill" => $this->form->bill_idBill
            ])){
            Utils::addErrorMessage('Błędne wywowołanie aplikacji');
            }
	return !App::getMessages()->isError();
    }
    
    public function action_payBill(){
        if ($this->validatePay()) {
            try {          
                App::getDB()->update("user_has_bill",["isPaid" => 1, "paymentDay" => date("Y-m-d")],[
                    "user_idUser" => $this->form->user_idUser,
                    "bill_idBill" => $this->form->bill_idBill
                            ]);
                Utils::addInfoMessage('Pomyślnie zmieniono status rachunku');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zmiany statusu rachunku');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        SessionUtils::storeMessages();
        App::getRouter()->forwardTo('MainPage');
    }
    
    public function userBills(){
        $this->person = SessionUtils::loadObject('user', $keep = true);
        
        $date = date("Y-m-01");
        $this->searchForm->dateStart = date('Y-m-d', strtotime($date. ' - 1 months'));
        
        $this->searchForm->billName = ParamUtils::getFromRequest('billName'); 
        $this->searchForm->billState = ParamUtils::getFromRequest('billState');
        
        $v = new Validator();
        
        if(isset($this->searchForm->billState)){
            if($v->validateFromRequest('dateA',[
                'date_format' => 'Y-m-d',
                'validator_message' => 'Zły format daty',
                'required' => true,
                'required_message' => 'Wprowadź datę "od"'])){

                $this->searchForm->dateA = ParamUtils::getFromRequest('dateA');
            }

            if($v->validateFromRequest('dateB',[
                'date_format' => 'Y-m-d',
                'validator_message' => 'Zły format daty',
                'required' => true,
                'required_message' => 'Wprowadź datę "do"'])){

                $this->searchForm->dateB = ParamUtils::getFromRequest('dateB');

            }
        }
        
        $search_params=[];

        if (isset($this->searchForm->billName)) {
            $search_params['name'] = $this->searchForm->billName;
        }
        if (isset($this->searchForm->dateA) && isset($this->searchForm->dateB) && isset($this->searchForm->billState)) {
            if($this->searchForm->dateB >= $this->searchForm->dateA){
                $search_params['isPaid'] = $this->searchForm->billState;
                $search_params['month[<>]'] = [$this->searchForm->dateA,$this->searchForm->dateB];
            } else {
                Utils::addErrorMessage('Błędny zakres dat');
            }
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        
        $search_params["idUser"] = $this->person->idUser; //szukam tylko rachunków zalogowanego usera
        $where ["ORDER"] = ["month" => "DESC"]; //SORTOWANIE

        
        $this->table = App::getDB()->select("bill",
            ["[><]bill_name" => ["bill_name_idName" => "idName"],
                "[><]bill_type" => ["bill_type_idType" => "idType"],
                "[><]user_has_bill" => ["idBill" => "bill_idBill"],
                "[><]user" => ["user_has_bill.user_idUser" => "idUser"],
                "[><]bill_state" => ["bill_state_idBill_state" => "idBill_state"]],
            ["amount", "month", "name","state", "type", "who", "idBill", "idUser", "login", "participation", "paymentDay", "isPaid", "bill_idBill", "user_idUser"], //kolumny do pobrania
            $where   //szukam tylko rachunków zalogowanego usera + ORDER
            ); //od najnowszych
        
        
   
    }

    /**
     * Wygenerowanie widoku
     */
    public function generateView(){
            $this->userBills();
            App::getSmarty()->assign('page_title','Zarządzanie rachunkami');
            App::getSmarty()->assign('page_description','System do zarządzania rachunkami');
            App::getSmarty()->assign('page_header','Zarządzanie rachunkami');	
            App::getSmarty()->assign('user', SessionUtils::loadObject('user', $keep = true));
            App::getSmarty()->assign('table', $this->table);
            App::getSmarty()->assign('form', $this->searchForm);
            
            App::getSmarty()->display('MainPage.tpl');
    }
}
