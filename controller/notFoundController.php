<?php

class notFoundController extends controller
{
    public function index()
    {
        $dados = array();

        $this->loadView('404', $dados);
    }

    
}