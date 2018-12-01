<?php 

class controller
{

    public function loadView($view, $dados=array())
    {
        extract($dados);

        require_once "view/".$view.".php";
    }

    public function loadTemplate($view, $dados=array())
    {

        require_once "template/template.php";
    }
}