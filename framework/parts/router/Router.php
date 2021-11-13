<?php
namespace Framework\parts\router;

use Framework\interfaces\RouteInterface;

class Router implements RouteInterface
{
    protected $arrControllers=['doctors','index','patients'];

    public function route(): callable
    {
        $arrPages=array_diff(explode("/",$_SERVER['REQUEST_URI']),array(""));
        $kolUr=count($arrPages);
        if ($kolUr== 0){
            $page='index';
        } else{
            $page=$arrPages[1];
        }
        try {
            if (in_array($page, $this->arrControllers)) {
                $namespace = 'App\controllers';
                $nameController = $namespace . "\\" . ucfirst($page) . "Controller";
                if (class_exists($nameController)) {
                    $controller = new $nameController();
                    if (method_exists($controller, 'view')) {
                        if (($arrPages[2] == 'view' and ($kolUr == 2 or $kolUr == 3)) or $kolUr <=1) {
                            echo $controller->view();
                        } else if ($kolUr == 4 and $arrPages[3] == 'id' and $controller->issetIdArr($arrPages[4]) == true) {
                            echo $controller->view($arrPages[4]);
                        } else {
                            throw new \Exception('Страница не найдена');
                        }

                    }
                }
            } else {
                throw new \Exception('Страница не найдена');
            }

        }
        catch(\Exception $exception) {
            echo $exception->getMessage(); exit();
        }

        return [$controller,'view'];

    }

}