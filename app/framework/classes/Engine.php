<?php

namespace app\framework\classes;

use Exception;

class Engine
{
    public function test(){
        return 'This is a test.';
    }
    
    public function render(string $view, array $data = [])
    {
        $view = dirname(__FILE__, 2) . "\\resources\\views\\{$view}.php";    
        //dd($view);
        if(!file_exists($view)){
            throw new Exception("The view {$view} does not exist.");
        }
    
        ob_start();

        extract($data);

        require $view;

        $content = ob_get_contents();

        ob_end_clean();

        return $content;
    }        
    
}
