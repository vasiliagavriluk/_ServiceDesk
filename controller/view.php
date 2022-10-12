<?php

class view {

    function __construct() {
        
    }
    
    public static function render(string $controller, string $path, array $data = [])
    {
        // Получаем путь, где лежат все представления
        $fullPath = PathList::GetPath(PathList::FILE_PATH_VIEW) . $controller. '/' . $path . '.php';
        // Если представление не было найдено, выбрасываем исключение
        if (!file_exists($fullPath)) {
           header("HTTP/1.1 404 Not Found");
        }

        // Если данные были переданы, то из элементов массива
        // создаются переменные, которые будут доступны в представлении
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $key = $value;
            }
        }

         // Отображаем представление
         include($fullPath);
    }

}

