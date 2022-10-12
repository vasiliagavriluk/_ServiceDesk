<?php
class app {
    
    function __construct() {}
    

    public static function run()
     {
            // Получаем URL запроса
            $path = $_SERVER['REQUEST_URI'];
            // Разбиваем URL на части
            $pathParts = explode('/', $path);
            
            if (!isset($_SESSION['user']))
            {
                $controller = 'login';                 
            } 
            else 
            { 
                $controller = 'users'; 
                // Получаем имя контроллера
                if($pathParts[1] != NULL)
                {
                   $controller = $pathParts[1];
                }
                elseif ($pathParts[1] == 'model')
                {
                   $controller = $pathParts[2];
                }                
            }           
            
            $action = 'index';    
            // Получаем имя действия         
            if(isset($pathParts[2]))
            {
                $action = $pathParts[2];             
            }
            // Формируем наименование действия
            $action = 'action' . ucfirst($action);
            // Создаем экземпляр класса контроллера
            $objController = new $controller;
            // Если действия у контроллера не существует, выбрасываем исключение
            if (!method_exists($objController, $action)) 
            {
                header("HTTP/1.1 404 Not Found");
            }
            else
            {
            // Вызываем действие контроллера         
               $objController->$action();
            }
        
     }
     
     

     

}

