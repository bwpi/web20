<?php

namespace vendor\core\dataset;

class Fs {

    public $data = [];
    private $path = STORAGE;
    private $type = 'json';
    /**
     * Читаем файл JSON
     */
    public function readFile($filename) {
        if (is_file($this->path . $filename . "." . $this->type)) {            
            $this->data = file_get_contents($this->path . $filename . "." . $this->type);            
            return $this;
        } else {
            echo "нет файла для чтения в массив";            
        }
    }    

    public function setPath($path) {
        $this->path = $path;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function array($mode = true) {
        return $this->data = json_decode($this->data, $mode);
    }

    public function json($mode = true) {
        return $this->data = json_encode($this->data, $mode);
    }
    
}