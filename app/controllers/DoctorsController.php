<?php

namespace App\controllers;

class doctorsController
{
    protected $arr=[1=>"Иванова Екатерина Васильевна",2=>"Петренко Александр Иванович"];
    public function view($value=null)
    {
        if($value==null){
            $message="<h1>Врачи клиники</h1>";
            foreach($this->arr as $key=>$value){
                $message.= "<li><a href='http://mvc-framework/doctors/view/id/$key'>$value</a></li>";
            }
            $message.="</ul>";
        } else{
            $message="<h1>Врач клиники Id=" . $value."," .  $this->arr[$value]."</h1>";
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