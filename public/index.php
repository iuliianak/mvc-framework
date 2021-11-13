<?php
ini_set('display_errors', 2);error_reporting(1);

include ("../vendor/autoload.php");

$router= new \Framework\parts\router\Router();
$hospital=new \Framework\Application($router);

$hospital->run();?>
<br><h2>Страницы сайта:</h2>
<ul>
    <li><a href='http://mvc-framework/'>Главная</a></li>
    <li><a href='http://mvc-framework/doctors/view'>Врачи клиники</a></li>
    <?php
    $patients=new \App\controllers\PatientsController();
    $doctors=new \App\controllers\DoctorsController();
    foreach($patients->getArr() as $key=>$value){
      echo "<li><a href='http://mvc-framework/doctors/view/id/$key'>$value</a></li>";
    }
    ?>
        <li><a href='http://mvc-framework/patients/view'>Пациенты</a></li>
    <?php
    foreach($patients->getArr() as $key=>$value){
    echo "<li><a href='http://mvc-framework/patients/view/id/$key'>$value</a></li>";
    }
    ?>
   </ul>