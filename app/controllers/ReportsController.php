<?php

namespace app\controllers;
use vendor\core\auth\Auth;
use app\views\View;
use app\models\AdminModels;

class ReportsController extends AppController{

	private $reports_list = [];
	private $reports_dir;
    private $report_items = [];
    private $massage = [];
    private $report;
    public $fio;
    public $subject;

    public function __construct($route){
        parent::__construct($route);

        $this->reports_dir = VIEWS . $route['controller'] . '/reports';

        $this->id = 'основной';

        /*
        * Проверка ip адреса, загрузка профиля, группа допуска
        */
        Auth::access();        
    }

    public function indexAction(){
        $model = new AdminModels();

        $teachers = $model->fromJsonToArrayOrJsonStorage('users/teachers');
        $subjects = $model->fromJsonToArrayOrJsonStorage('users/subjects');

    	$this->reports_list = array_slice(scandir($this->reports_dir), 2);    	

        $reports = $this->explodeReportList(array_values($this->reports_list));
        $reports_list = array_slice(scandir(STORAGE . 'users/reports/'), 2);

        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
        }        

        //Загрузка формы отчета редактор/отражение
        if ($_POST) {
            $this->fio = $_POST['fio'];
            $this->subject = $_POST['subject'];
        	$post_in = $this->formWork(compact('teachers', 'subjects'));
            $report = $this->loadReport('_' . $this->id, compact('post_in'));            
        } elseif (isset($_GET['report'])) {
            $post = (explode('_', explode(".", $_GET['report'])[0]));            
            $this->fio = $post[0];
            $this->subject = $post[1];
            $this->report = $_GET['report'];
            $post_in = $this->formWork(compact('teachers', 'subjects'));            
            $report = $this->loadReport('_' . 'основной', compact('post_in'));
        } else {
        	$report = $this->loadReport($this->id, compact('teachers', 'subjects'));
        }

        //Загрузка вида с элементами управления
        $this->setData(compact('reports', 'report', 'reports_list'));    	
    }

    private function loadReport($report, $vars = []){        
    	extract($vars);        
    	$file = $this->reports_dir . "/{$report}_report.php";
    	if (is_file($file)) {
    		ob_start();
	        $widget = include($file);
	        return ob_get_clean();
    	} echo 'Нет такого отчета';        
    }

    private function explodeReportList($input){
    	$reports = [];
    	foreach ($input as $key => $value) {
    		if (strpos($value, '_') !== 0) {
    			array_push($reports, explode('_report.php', $value)[0]);
    		}			
		}
		return $reports;
    }   

    private function formWork($vars = []){
    	extract($vars);
        $report_items = [       
            0 => ["Количество обучающихся",(int)$_POST['number']], //Количество обучающихся
            1 => ["На 5",(int)$_POST['number5']], //На 5
            2 => ["На 4",(int)$_POST['number4']], //На 4
            3 => ["На 3",(int)$_POST['number3']], //На 3
            4 => ["Не успевают",(int)$_POST['number2']], //Не успевают
            5 => ["Не аттестовано",(int)$_POST['number0']], //Не аттестовано
            6 => ["Процент качества",round((((int)$_POST['number5'] + (int)$_POST['number4'])/(int)$_POST['number'])*100, 2)], //Процент качества
            7 => ["Процент успеваимости",round((((int)$_POST['number5'] + (int)$_POST['number4'] + (int)$_POST['number3'])/(int)$_POST['number'])*100, 2)], //Процент успеваимости
            8 => ["СОУ",round((((int)$_POST['number5'] + (int)$_POST['number4']*0.67 + (int)$_POST['number3']*0.35 + (int)$_POST['number2']*0.11 + (int)$_POST['number0']*0.11)/(int)$_POST['number'])*100, 2)
            ], //СОУ
            9 => ["Выполнение программы",(int)$_POST['percent']], //Выполнение программы
            10 => ["Кто не успевает и в каком классе, коментарий к отчету!",htmlspecialchars($_POST['comment'])], //Кто не успевает и в каком классе, коментарий к отчету!            
        ];

        $this->report_items = $report_items;

        $teacher = $teachers[$this->fio]['name'];
        $subject = $subjects[$this->subject];

        $summ = $_POST['number5'] + $_POST['number4'] + $_POST['number3'] + $_POST['number2'] + $_POST['number0'];

        $i = -1;

        if ($_POST['number'] != $summ) {
            $this->massage = ['Обнаружены ошибки!', 'не успешно', 'Cумма значений 2-7 должна быть равна 1', 'danger', 'Печать не возможна', 'disabled'];
        } else {
        	$rep = $this->checkReports();            
        }
        $message = $this->massage;
        return compact('report_items', 'summ', 'i', 'message', 'teacher', 'subject', 'rep');
    }

    private function checkReports(){
        if (file_exists(STORAGE . "users/reports/" . $this->fio . "_" . $this->subject . ".json")) {        	       	
            return $this->checkReportsItems();
        } 

        if (isset($this->fio)&&isset($this->subject)) {            
            file_put_contents(STORAGE . "users/reports/" . $this->fio . "_" . $this->subject . ".json", json_encode([$_POST['quarter'] => [$this->report_items][0]], JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));            
        }
    }

    private function checkReportsItems(){
    	$file = STORAGE . "users/reports/" . $this->fio . "_" . $this->subject . ".json";

    	$file_report_item = json_decode(file_get_contents($file), true);        
    	$report_item = [$this->report_items][0];
        if (isset($_POST['quarter'])) {
            if (empty($file_report_item[$_POST['quarter']])) {          
                $file_report_item[$_POST['quarter']] = $report_item;            
                file_put_contents($file, json_encode($file_report_item, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
                $this->massage = ['Отличная работа! Отчет по данному периоду был обновлен!', 'успешно', 'Верная сумма значений', 'success', 'Распечатать'];
            } elseif (empty(array_diff($file_report_item[$_POST['quarter']], $report_item)) === 1) {
                $this->massage = ['Отличная работа! Отчет по данному периоду был ранее заполнен!', 'успешно', 'Верная сумма значений', 'success', 'Распечатать'];
            } else {
                $file_report_item[$_POST['quarter']] = $report_item;            
                file_put_contents($file, json_encode($file_report_item, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
                $this->massage = ['Отличная работа! Отчет по данному периоду требует обновления!', 'успешно', 'Верная сумма значений', 'success', 'Распечатать'];
            }
        } else {
            $this->massage = ['Отличная работа! Отчет сформирован из ранее сохраненных данных!', 'успешно', 'Верная сумма значений', 'success', 'Распечатать'];
        }    	
        return $file_report_item;    	
    }

}