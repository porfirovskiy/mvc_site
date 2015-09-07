<?php
namespace SiteMicroEngine\App\Views;

class View
{
    function generate($className, $fileView, $data = null) {
        
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            //extract($data);
        }
        include 'app/views/site.php';
    }
}

?>