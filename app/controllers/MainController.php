<?php

namespace app\controllers;
use \vendor\core\auth\Auth;
use vendor\core\IpAuth;
use app\views\View;
use app\models\AdminModels;

class MainController extends AppController{

    public $data = [];
    public $menu = [];

    public function __construct($route){
        parent::__construct($route);
        /*
        * Проверка ip адреса, загрузка профиля, группа допуска
        */
        Auth::access();        
    }    

    public function indexAction() {
        /*
        * Загрузка данных из модели
        */
        $model = new AdminModels();
        
        $this->data = $model->fromJsonToArrayOrJson('time');
        $array = $model->fromJsonToArrayOrJson('time');        
        /**
         * Получение списка пунктов меню для дальнейшей обработки на фронте или SSR на беке
         */
        $menu = $model->fromJsonToArrayOrJsonStorage('menu/menu');        
        array_push($this->menu, $model->sortMenu($menu, 'category', 'ktp_inf')); //0
        array_push($this->menu, $model->sortMenu($menu, 'category', 'ktp_fiz')); //1
        array_push($this->menu, $model->sortMenu($menu, 'category', 'gia')); //2
        array_push($this->menu, $model->sortMenu($menu, 'category', 'ege')); //3
        array_push($this->menu, $model->sortMenu($menu, 'category', 'main')); //4
        array_push($this->menu, $model->sortMenu($menu, 'category', 'admin')); //5
        array_push($this->menu, $model->sortMenu($menu, 'category', 'education')); //6
        array_push($this->menu, $model->sortMenu($menu, 'category', 'is')); //7
        array_push($this->menu, $model->sortMenu($menu, 'category', 'sdo')); //8
        $menu = $this->menu;        
        
        /*
        * Обработка AJAX запроса
        */
        if ($this->isAjax()) {
            if (!empty($_POST['ajax_time'])) {
                // echo json_encode($this->data);                
            } else {            
                $this->loadView($this->view, compact('array'));                
            }
            die;
        }
        
        $rule = Auth::$rule;
        $profile = Auth::$profile;
        $this->view = $profile->rules;
        $ip = $rule . ' - ' . REMOTE_ADDR;
        $title = $profile->title;
        $main = $profile->main;
        $set = $profile->set;
        $auth = $profile->auth;
        $rules = $profile->rules;
        $navbar = $this->loadView('_navbar', compact('menu', 'ip'));
        $left_bar = $this->loadView('_left_bar', compact('menu', 'rules'));
        $content = $this->loadView('_main', compact('menu'));
        $this->setData(compact('title', 'main', 'set', 'auth', 'ip', 'menu', 'rules', 'navbar', 'left_bar', 'content'));
    }

    public function scheduleAction() {
        /*
        * Загрузка данных из модели
        */
        $model = new AdminModels();
                
        //проверка ip адреса
        $ip = $rule . ' - ' . REMOTE_ADDR;
        $rule = Auth::$rule;

        $array = $model->fromJsonToArrayOrJson('schedule');
        $objects = $model->getUserSettings('objects', $rule);
        /*
        * Обработка AJAX запроса
        */
        if ($this->isAjax()) {            
            $this->loadView($this->view, compact('array', 'objects'));
            die;
        }        
        $this->setData(compact('array', 'objects'));
    }

    public function timeAction() {
        /*
        * Загрузка данных из модели
        */
        $model = new AdminModels();
        $this->data = $model->fromJsonToArrayOrJson('time');
        $array = $model->fromJsonToArrayOrJson($this->view);        
        /*
        * Обработка AJAX запроса
        */
        if ($this->isAjax()) {
            if (!empty($_POST['ajax_time'])) {
                echo json_encode($this->data);                
            } else {            
                $this->loadView($this->view, compact('array'));
            }
            die;
        }
        $this->setData(compact('array'));
        
    }   
    
}