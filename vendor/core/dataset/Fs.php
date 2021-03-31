<?php

namespace vendor\core\dataset;

class Fs {

    public $json = [];
    private $path = STORAGE;
    private $type = 'json';

    /*
    *Читаем JSON в массив или в JSON fromJsonToArrayOrJson из STORAGE
    */
    public function readFile($filename) {
        if (is_file($this->path . $filename . "." . $this->type)) {            
            $this->json = file_get_contents($this->path . $filename . "." . $this->type);            
            return $this;
        } else {
            echo "нет файла для чтения в массив";            
        }
    }

    public function setPathDefault($path) {
        $this->path = $path;
    }

    public function setFileType($type) {
        $this->type = $type;
    }

    public function array($mode = true) {
        return $this->json = json_decode($this->json, $mode);
    }
    
}