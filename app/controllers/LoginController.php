<?php

namespace app\controllers;
use \vendor\core\auth\Auth;
use \vendor\core\auth\LoginAuth;
use \vendor\core\auth\IpAuth;
use app\models\AdminModels;

class LoginController extends AppController{

	public function indexAction() {		
		
		LoginAuth::checkUser();
		$title = 'Авторизация';
		$ip = REMOTE_ADDR;
		$msg = $this->response(Auth::$msg, 'warning');
		$this->setData(compact('msg', 'title', 'ip'));
    }

    public function logoutAction(){    	
    	$this->layout = false;
    	setcookie('login', '', time()-1000, '/');
        setcookie('password', '', time()-1000, '/');		
		header("Location: /");
		exit;
    }
       
}