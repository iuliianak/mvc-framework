<?php

namespace App\controllers;

class patientsController
{ protected $arr=[1=>"Логинова Марина Александровна",2=>"Нестеренко Ирина Валерьевна"];
    public function view($value=null)
    {
        if ($value == null) {
            $message= "<h1>Пациенты клиники</h1><ul>";
            foreach($this->arr as $key=>$value){
                $message.= "<li><a href='http://mvc-framework/patients/view/id/$key'>$value</a></li>";
            }
            $message.="</ul>";
        } else {
            $message = "<h1>Пациент клиники Id=" . $value . "," . $this->arr[$value] . "</h1>";
        }
        return $message;
    }
        public function issetIdArr($id)
    {
        return array_key_exists($id,$this->arr);
    }

    public function getArr()
    {
        return $this->arr;
    }
}