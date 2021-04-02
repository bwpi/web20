<?php

namespace app\controllers;
use vendor\core\auth\Auth;
use vendor\core\dataset\Fs;
// use vendor\core\IpAuth;
use app\views\View;
use app\models\AdminModels;

class AdminController extends AppController{

    public $key_table_col = [];
    public $id = '';
    
    public function __construct($route){
        parent::__construct($route);
        /*
        * Проверка ip адреса, загрузка профиля, группа допуска
        */
        Auth::access(['admin']);
        $this->action_item = $this->getMenuSidebar();        
    }    

    public function indexAction() {
        /*
        * Загрузка данных из модели
        */
        $model = new AdminModels();
        $fs = new Fs();        

        // debug($fs->readfile('users/subjects')->array());
        // debug($fs->setPath(DATA)->setType('txt')->readfile('teach')->data);
        // debug($fs->setPath(STORAGE)->scanDir('users/schedules', true)->dir);
        // debug($fs->scanDirAll('users/schedules')->dir);
        $dataset = $fs->setPath(DATA . 'upload')->setType('csv')->scan();
        debug($dataset);

        $left_menu = $this->action_item;
        
        /*
        * Обработка AJAX запроса
        */        
        
        $rule = Auth::$rule;        
        $title = Auth::$profile->title;        
        $sched = $model->getMainSchedules(
            $model->scanDir(STORAGE . 'users/schedules', true),
            'users/schedules/'
        );
        $data = $model->mergArrays(...$sched);
        $objects = $model->getUserSettings('objects', $rule);
        $cabinet = 'физики';
        $this->layout = 'material';
        $this->setData(compact('left_menu', 'title', 'data', 'objects', 'cabinet'));
    }

    public function scheduleAction() {
        
        /*
        * Загрузка данных из модели
        */
        $model = new AdminModels();
             
        $files_uploaded = $model->scanDirInFiles($this->view . '/');
        
        $rule = Auth::$rule;        
        $title = Auth::$profile->title;
        $main = Auth::$profile->main;
        $set = Auth::$profile->set;
        $auth = Auth::$profile->auth;

        $objects = $model->getUserSettings('objects', $rule);
        $left_menu = $this->action_item;
        
        /*
        *Обработка GET запросов
        */
        if (!isset($_GET['id'])) {
            $this->id = $this->view . '/' . $this->view;
        } else {            
            $this->id = $this->view . '/' . $_GET['id'];
        }
        
        $data = $model->fromJsonToArrayOrJson($this->id);        

        /*
        * Обработка AJAX запроса
        */
        if ($this->isAjax()) {
            if(!empty($_POST['ajax_set'])){
                $model->setAjaxToJson($this->view, $_POST['ajax_data'] , $_POST['ajax_set']);                
                $object = trim(preg_replace("/[\d]/", "", $_POST['ajax_data']));
                $style = (array_key_exists($object, $objects)) ? $objects[$object] : '';
                echo $style;
            } else {
                echo 'нет настроек, не знаем куда писать.';
            }            
            die;
        }        
        
        $this->layout = 'material';        
        $this->setData(compact('left_menu', 'title', 'main', 'set', 'auth', 'ip', 'data', 'objects', 'files_uploaded'));
    }

    public function timeAction() {
        
        /*
        * Загрузка данных из модели
        */
        $model = new AdminModels();        
        $array = $model->fromJsonToArrayOrJson('time');
              $left_menu = $this->action_item;
        /*
        * Обработка AJAX запроса
        */
        if ($this->isAjax()) {            
            if(!empty($_POST['ajax_set'])) {
                $model->setAjaxToJson($this->view, $_POST['ajax_data'] , $_POST['ajax_set']);                
            } else {
                echo 'нет настроек, не знаем куда писать';
            }            
            die;
        }           
        
        $rule = Auth::$rule;        
        $title = Auth::$profile->title;
        $main = Auth::$profile->main;
        $set = Auth::$profile->set;
        $auth = Auth::$profile->auth;        
        
        $this->layout = 'material';        
        $this->setData(compact('left_menu', 'title', 'main', 'set', 'auth', 'array'));
    }

    public function ktpAction() {
        
        /*
        * Загрузка данных из модели
        */
        $model = new AdminModels();

        if (!isset($_GET['id'])) {
            $this->id = $this->view . '/' . $this->view;
        } else {            
            $this->id = $this->view . '/' . $_GET['id'];           
        }        
        
        $left_menu = $this->action_item;

        $theme_plane = $model->fromJsonToArrayOrJson($this->id);
        
        $key_table_col = $model->loadModel($theme_plane);
        /*
        * Обработка AJAX запроса
        */
        if ($this->isAjax()) {            
            if(!empty($_POST['mod'])) {                
                $model->addDataToJson($this->id, $key_table_col, $_POST['ajax_set']);
                $theme_plane = $model->fromJsonToArrayOrJson($this->id);
                $this->loadView($this->view, compact('theme_plane', 'key_table_col'));
            } elseif (!empty($_POST['ajax_set'])) {
                $model->setAjaxToJson($this->id, $_POST['ajax_data'] , $_POST['ajax_set']);                
            } else {
                echo 'нет настроек, не знаем куда писать';
            }            
            die;
        }

        $this->layout = 'material';
        $this->setData(compact('left_menu', 'theme_plane', 'key_table_col'));
    }

    public function patternAction(){
        /*
        * Загрузка данных из модели
        */
        $model = new AdminModels();

        $theme_plane = $model->fromJsonToArrayOrJson('ktp');
        $files_uploaded = $model->scanDirInFiles('upload/');        
        $left_menu = $this->action_item;
        
        $key_table_col = $model->loadModel($theme_plane);

        $theme_plane = $model->parseCsv($model->pattern, $key_table_col);
        /*
        * Обработка AJAX запроса
        */
        if ($this->isAjax()) {
            
            if(!is_file(DATA . 'ktp/' . $_POST['ajax_set'] . '.json')){
                $model->createJson('ktp/' . $_POST['ajax_set'], $theme_plane);
                echo "Файл {$_POST['ajax_set']} успешно создан!";                
            } else {
                echo "Файл {$_POST['ajax_set']} не создан или существует!";
            }
            die;
        }

        if(isset($_GET['id'], $_GET['method'])&&$_GET['method']=='delete'){
            if (is_file(DATA . 'ktp/' . $_GET['id'])) {
                unlink(DATA . 'ktp/' . $_GET['id']);
                $msg = $this->response("Файл 'ktp/'{$_GET['id']} успешно удален", 'success');
            } else {
                $msg = $this->response("Файл 'ktp/'{$_GET['id']} не существует", 'warning');
            }            
        }

        if ($_POST) {            
            foreach ($_POST as $key => $v) {
                $name = str_replace('_csv', '.csv', $key);                
            }
            $data = file_get_contents(DATA . 'upload/' . $name);
            $data = iconv("WINDOWS-1251", "UTF-8", $data);
            $theme_plane = $model->parseCsv($data, $key_table_col);
        }

        $this->layout = 'material';
        $msg = (isset($msg)) ? $msg : '';
        $this->setData(compact('left_menu', 'msg', 'theme_plane', 'key_table_col', 'files_uploaded'));
    }

    public function csvAction(){
        /*
        * Загрузка данных из модели
        */
        $model = new AdminModels();

        $theme_plane = $model->fromJsonToArrayOrJson('ktp');
        $files_uploaded = $model->scanDirInFiles('upload/');

        $key_table_col = $model->loadModel($theme_plane);
        $left_menu = $this->action_item;
        
        /*
        * Обработка AJAX запроса
        */
        if ($this->isAjax()) {
            
        }
        
        if (!empty($_POST)) {
            foreach ($_POST as $key => $v) {
                $name = str_replace('_csv', '.csv', $key);
                $data = file_get_contents(DATA . 'upload/' . $name);
                $data = iconv("WINDOWS-1251", "UTF-8", $data);
                $data = $model->parseCsv($data, $key_table_col);
            }
        }        

        
        
        if (isset($_FILES['file']['name'])) {
            if ($_FILES['file']['type'] == 'application/vnd.ms-excel') {
                if (!is_dir(DATA . 'upload/')) {
                    mkdir(DATA . 'upload/', 0777);
                    die;
                }                
                move_uploaded_file($_FILES['file']['tmp_name'], DATA . 'upload/' . $_FILES['file']['name']);
                $msg = $this->response("Файл {$_FILES['file']['name']} успешно загружен", 'success');
            } else {
                $msg = $this->response('Не правильный формат файла, допустимые файлы .csv', 'warning');                
            }                
        } else {
            $msg = $this->response('Файл для загрузки отсутствует, поворите попытку', 'danger');
        }        
        $data = (isset($data)) ? $data : '';
        $this->layout = 'material';
        $this->setData(compact('left_menu', 'msg', 'files_uploaded', 'data', 'key_table_col'));
        
    }

    public function testAction(){

        $model = new AdminModels();
        $left_menu = $this->action_item;
        //$test = $model->StrToArray('one(two(tree))');        
        //$res = foreachArray($data);
        
        /*
        * Загрузка данных из модели
        */
        if (!isset($_GET['id'])) {
            $msg = $this->response('Нет файла для обработки', 'warning');
        } else {            
            $model = new AdminModels();
            $out = json_decode(file_get_contents(DATA . $_GET['id'] . '.json'));        
            $out = json_encode($out, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            // file_put_contents(DATA . $_GET['id'] . '.json', $out);
            // unset($out);
        }        

        /*
        * Обработка AJAX запроса
        */
        if ($this->isAjax()) {
            
        }
        
        $this->layout = 'material';
        $this->setData(compact('left_menu', 'out', 'msg', 'test'));
        
    }

    public function menuAction(){
        $model = new AdminModels();
             
        $left_menu = $this->action_item;
        $item = $model->getMenuItems('settings/item');
        $objects = $model->getUserSettings('objects', Auth::$rule);
        $this->layout = 'material';
        $msg = (isset($msg)) ? $msg : '';
        $this->setData(compact('left_menu', 'msg', 'item', 'objects'));
    }
    
    public function funcAction()
    {
        # code...
    }

}