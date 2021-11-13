<?php
namespace Framework;

use Framework\interfaces\RouteInterface;

class Application
{protected $router;
    public function __construct(RouteInterface $router){
        $this->router=$router;
   }

    public function run()
    {
        try {
            $action = $this->router->route();
            $action();
        }
        catch(\Trowable $exception){
            echo "Страница не найдена";
        }
    }
}