<?php

namespace app\models;
/*
* Преобразование JSON файла в объект
*/
class AdminModels extends AppModels{    
    public $schedule = '';
    public $array = [];
    public $array_of_csv = [];
    public $dir_scan = [];
    public $item = [];
    public $objects = [];
    private $path = STORAGE;
    private $type = 'json';

    public function setPath($path) {
      $this->path = $path;
    }
    public function setType($type) {
      $this->type = $type;
    }

	  /*
    *Читаем JSON в массив или в JSON fromJsonToArrayOrJson из DATA
    */
    public function fromJsonToArrayOrJson($filename, $mode = true) {
        if (is_file(DATA . $filename . ".{$this->type}")) {
            $this->array = json_decode(file_get_contents(DATA . $filename . ".{$this->type}"), $mode);            
            return $this->array;
        } else {
            echo "нет файла" . DATA . "$filename.{$this->type} для чтения в массив";            
        }
    }

    /*
    *Читаем JSON в массив или в JSON fromJsonToArrayOrJson из STORAGE
    */
    public function fromJsonToArrayOrJsonStorage($filename, $mode = true) {
        if (is_file($this->path . $filename . ".{$this->type}")) {            
            $this->array = json_decode(file_get_contents($this->path . $filename . ".{$this->type}"), $mode);            
            return $this->array;
        } else {
            echo "нет файла" . $this->path . "$filename.{$this->type} для чтения в массив";            
        }
    }
    
    /*
    *Объендиняем четырехуровневые массивы, расписание
    */
    public function mergingArrays($a1 = [], $a2 = []){
            if (!empty($a1) && !empty($a2)) {
                $output_array = $a1;
                foreach ($a1 as $day_en => $v1) {
                    foreach ($v1 as $day_ru => $v2) {
                        foreach ($v2 as $k1 => $v3) {
                            /*Замена пустых значения в первом массиве на значения из второго*/
                            if (!($a1[$day_en][$day_ru][$k1]) && !empty($a2[$day_en][$day_ru][$k1])) {        
                                $output_array[$day_en][$day_ru][$k1] = $a2[$day_en][$day_ru][$k1];
                            }
                              /*Дополнение значений первого массива значениями из второго*/
                            if (!empty($a1[$day_en][$day_ru][$k1]) && !empty($a2[$day_en][$day_ru][$k1])) {
                                $output_array[$day_en][$day_ru][$k1] = [$a1[$day_en][$day_ru][$k1], $a2[$day_en][$day_ru][$k1]];
                            }
                        }      
                    }
                }
            } else {
                empty($a1) ? debug($a2) : debug($a1);
            }
            return $output_array;
    }

    /*
    *Объендиняем трехуровневые массивы, расписание
    */    
    public function mergArrays(...$arrays){
      $out = $arrays[0];

      foreach ($arrays as $key => $array) {       
        if (!empty($out) && !empty($arrays[$key+1])) {            
            foreach ($out as $day => $v1) {
                foreach ($v1 as $k1 => $v2) {
                  if (!empty($arrays[$key+1][$day][$k1])) {
                    if (!$out[$day][$k1]) {
                      $out[$day][$k1] = [$arrays[$key+1][$day][$k1]];
                    } elseif (count($out[$day][$k1], COUNT_RECURSIVE) == 2) {
                      $out[$day][$k1] = [$out[$day][$k1], $arrays[$key+1][$day][$k1]];
                    } else {
                      array_push($out[$day][$k1], $arrays[$key+1][$day][$k1]);
                    }                  
                  }                
                }
            }
        } else {
            return empty($out) ? $arrays[$key+1] : $out;
        }        
      }     
      return $out;
    }
    /**
     * Функция рекурсивный обработчик
     */
    public function getMainSchedules($arr, $param = '') {
    	  $out = [];        
        foreach ($arr as $k => $v) {
          array_push($out, $this->fromJsonToArrayOrJsonStorage($param . $v));            
        }
        return $out;
    }	
    /*
    *Вносим изменения в JSON файл
    */
    public function setAjaxToJson($filename, $data, $set='') {
        $path = explode('/', $set);    	
        if (count($path)==3) {
            if (is_file(DATA . $filename. ".json")) {
                $file_data = $this->fromJsonToArrayOrJson($filename, false);
                $file_data->$path[0]->$path[1]->$path[2] = $data;			
                file_put_contents(DATA . $filename. ".json", json_encode($file_data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT)); //, JSON_UNESCAPED_UNICODE
                unset($file_data);
            } else {
                  echo "нет файла $filename.json для записи";
            }
        } else {    		
            if (is_file(DATA . $filename. ".json")) {
            $file_data = $this->fromJsonToArrayOrJson($filename);				
            $file_data[$path[0]][$path[1]] = $data;				
            file_put_contents(DATA . $filename. ".json", json_encode($file_data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
            unset($file_data);
        } else {
            echo "нет файла $filename.json для записи";
        }
        }
    }	
	/*
    *Вносим изменения в JSON файл
    */
    public function addDataToJson($filename, $mod, $set='') {
    	$file_data = $this->fromJsonToArrayOrJson($filename);
    	foreach ($mod as $key => $value) {
    		$arr[$value] = $value;
    	}
    	array_push($file_data, $arr);    	
    	file_put_contents(DATA . $filename. ".json", json_encode($file_data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
		unset($file_data);        
    }
    /*
    *Читаем CSV файл
    */
    public function parseCsv($data, $mod, $separator = ";") {
    	$data = explode(PHP_EOL, $data);
    	$array_in_data = [];
    	$array_out = [];
    	//Разбираем входящий массив данных из CSV
    	foreach ($data as $key => $value) {
    		$out = explode($separator, $value);
    		array_push($array_in_data, $out);    		
	    }	    
	    //Переименовываем ключи по модели данных
	    foreach ($array_in_data as $key => $value) {	    	
	    	foreach ($value as $key1 => $value1) {
	    		for ($i=0; $i < count($mod); $i++) { 
	    			$array_out[$key][$mod[$i]] = $array_in_data[$key][$i];
	    		}	    		
	    	}
	    }
	    return $this->array_of_csv = $array_out;    	
    }

    /*
    *Создаем JSON файл
    */
    public function createJson($filename, $data) {        
	    file_put_contents(DATA . $filename. ".json", json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
	    unset($data);
    }

    /*
    *Сканируем каталог на наличие файлов
    */
    public function scanDirInFiles($dir = '') {
    	if (is_dir(DATA . $dir)) {
            $dir_scan = array_slice(scandir(DATA . $dir), 2);            
            return $dir_scan;
        } else {
        	echo 'no dir' . DATA . $dir;
        }
    }
    /*
    *Сканируем каталог на наличие файлов
    */
    public function scanDir($dir = '', $type = false) {
    	  if (is_dir($dir)) {
            $dir_scan = array_slice(scandir($dir), 2);
            if (!$type) {
              return $dir_scan;
            } else {
              $out = [];
              foreach ($dir_scan as $key => $value) {
                array_push($out, pathinfo($value, PATHINFO_FILENAME));
              }
              return $out;
            }
        } else {
        	  echo 'no dir' . $dir;
        }
    }

    /*
    *Получение модели или заголовков таблицы
    */
    public function loadModel($input_data) {
        foreach ($input_data as $key => $value) {            
            $output_data = array_keys($value);            
        }
        return $output_data;
    }

    /*
    *Получение пользовательских настроек
    */
    public function getUserSettings($filename, $user) {
        $this->objects = $this->fromJsonToArrayOrJson("settings/$filename", false);
        $this->objects = $this->objects->$user;
        return json_decode(json_encode($this->objects), true);
    }
    /**
     * Сортировка меню
     */
    public function sortMenu($menu = [], $key = '', $value = '') {
      $out = [];
      foreach ($menu as $k => $v) {
        if (gettype($v) == 'object') {
          if ($v->$key===$value) {
            array_push($out, $v);
          }
        } else {
          if ($v[$key]===$value) {
            array_push($out, $v);
          }
        }        
      }
      return $out;
    }
    /*
    *Получение пунктов меню
    */
    public function getMenuItems($filename) {
        $this->item = $this->fromJsonToArrayOrJson($filename);
        return $this->item;
    }
    /*
    *Обновление пунктов меню
    */
    public function setSettings() {
        
    }

    /*
    * Функция создания пути для доступа или редактирования файла вывод в JSON или Массив
    */
    public function createPathObject($value='', $array=[], $mode = false) {
        $b = $value;
        krsort($array);
        foreach ($array as $k => $v) {
            $b='{"' .$v. '":' .$b. '}';
        }
        return json_decode($b, $mode);
    }

    /*
    *Построение пути из пути вида one(two(tree))
    */
    public function SplitStr($string) {
        $pieces = array(); $bracketState = 0;  
        $startPos = 0; $checkBracketState = false;
        for ($i=$startPos; $i<strlen($string); $i++) {
            if ($string[$i] == '(') {
              $checkBracketState = true;
              $bracketState += 1;
            }
            if ($string[$i] == ')') $bracketState -= 1;
            // if we have empty array element (bracket was not opened yet)
            if ((!$checkBracketState)and($string[$i] == ',')) {
              $pieces[] = substr($string, $startPos, $i-$startPos);
              $startPos = $i+1;
            }
            // if we have empty array element at the end of string
            if ((!$checkBracketState)and($i+1 == strlen($string))) {
              $pieces[] = substr($string, $startPos, $i-$startPos+1);
            }
            if (($checkBracketState)and($bracketState == 0)) {
              $pieces[] = substr($string, $startPos, $i-$startPos+1);
              // increase starPos with two to skip "),"
              $startPos = $i+2; $checkBracketState = false; $i += 1;      
            }
          }
        return $pieces;
    }
 
    public function StrToArray($string) {
        $subArray = array();
          // split string to array elements
        $arrayPieces = $this->SplitStr($string);

          // extract each elements name and its value
        foreach ($arrayPieces as $arrayPeice) {
            if (preg_match('#(\w*)(?:\((.*)\)|)#', $arrayPeice, $matches)) {
              $subArray[$matches[1]] = isset($matches[2]) ? StrToArray($matches[2]) : array();
            }
        }  
        return $subArray;
    }

}

/*$testLine = 'one(two(tree))';
 
function SplitStr($string) {
  $pieces = array(); $bracketState = 0;  
  $startPos = 0; $checkBracketState = false;
  for ($i=$startPos; $i<strlen($string); $i++) {
    if ($string[$i] == '(') {
      $checkBracketState = true;
      $bracketState += 1;
    }
    if ($string[$i] == ')') $bracketState -= 1;
    // if we have empty array element (bracket was not opened yet)
    if ((!$checkBracketState)and($string[$i] == ',')) {
      $pieces[] = substr($string, $startPos, $i-$startPos);
      $startPos = $i+1;
    }
    // if we have empty array element at the end of string
    if ((!$checkBracketState)and($i+1 == strlen($string))) {
      $pieces[] = substr($string, $startPos, $i-$startPos+1);
    }
    if (($checkBracketState)and($bracketState == 0)) {
      $pieces[] = substr($string, $startPos, $i-$startPos+1);
      // increase starPos with two to skip "),"
      $startPos = $i+2; $checkBracketState = false; $i += 1;      
    }
  }
  return $pieces;
}
 
function StrToArray($string) {
  $subArray = array();
  // split string to array elements
  $arrayPieces = SplitStr($string);

  // extract each elements name and its value
  foreach ($arrayPieces as $arrayPeice) {
    if (preg_match('#(\w*)(?:\((.*)\)|)#', $arrayPeice, $matches)) {
      $subArray[$matches[1]] = isset($matches[2]) ? StrToArray($matches[2]) : array();
    }
  }  
  return $subArray;
}
$obj = json_decode(json_encode(StrToArray($testLine)));
debug($obj->one->two = '3');*/