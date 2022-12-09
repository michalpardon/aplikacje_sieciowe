<?php

namespace app\transfer;

class User{
	public $login;
        public $idUser;
	public $role = [];
	
	public function __construct($login, $idUser){
		$this->login = $login;
                $this->idUser = $idUser;
				
	}
        
        public function add ($role){
            array_push($this->role, $role);
        }
}