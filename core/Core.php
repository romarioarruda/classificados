<?php

class Core 
{

    public function run()
    {
        $url = '/';
    

        if (isset($_GET['url'])) {
            
            $url .= addslashes($_GET['url']);
        }

        $params = array();
        if (isset($url) && $url != '/') {

            $url = explode('/', $url);
            array_shift($url);

            $controller = $url[0].'Controller';
            array_shift($url);
            
            if (isset($url[0]) && !empty($url[0])) {
                
                $action = $url[0];
                array_shift($url);

            } else {
                $action = 'index';
            }

            if (count($url) > 0) {
                $params = $url;
            }

        } else {

            $controller = 'homeController';
            $action     = 'index';
        }
        
        if (!file_exists('controller/'.$controller.'.php') || !method_exists($controller, $action)) {
            $controller = 'notFoundController';
            $action     = 'index';
        }

        $control = new $controller();
        
        call_user_func_array(array($control, $action), $params);
    }
}