<?php

class meuperfilController extends controller 
{

    public function index()
    {
        $usuario = new Usuarios();

        $nome         = filter_input(INPUT_POST, 'nome',        FILTER_SANITIZE_STRING);
        $email        = filter_input(INPUT_POST, 'email',       FILTER_VALIDATE_EMAIL);
        $tel          = filter_input(INPUT_POST, 'telefone',    FILTER_VALIDATE_INT);
        $senha_antiga = filter_input(INPUT_POST, 'senhaantiga', FILTER_SANITIZE_STRING);
        $senha_nova   = filter_input(INPUT_POST, 'novasenha',   FILTER_SANITIZE_STRING);

        $dados = [];
        if (!empty($nome) && !empty($email) && !empty($tel) && !empty($senha_antiga) && !empty($senha_nova)) {
            
            $dados = array(
                'atualiza_dados' => $usuario->atualizaDados($nome, $email, $tel, $senha_antiga, $senha_nova),
            );
    
        }

        $this->loadTemplate('meuperfil', $dados);
    }
}