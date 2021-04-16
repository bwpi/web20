<?php
namespace app\controllers;

class PublicController extends AppController{
    public function __construct($route){
        parent::__construct($route);        
    }    
    public function indexAction() {
        $this->layout = '';        
    }
}

