<?php

class homeController extends controller
{
    public function index()
    {
        $usuario    = new Usuarios();
        $anuncios   = new Anuncios();
        $categoria  = new Categoria();
        $localidade = new Localidade();

        $limit    = 10;
        $total    = $anuncios->getTotalAnuncios();
        
        $dados['totalUsuarios'] = $usuario->getTotalUsuarios();
        $dados['totalAnuncios'] = $anuncios->getTotalAnuncios();
        $dados['totalPaginas']  = ceil($total/$limit);
        $dados['paginaAtual']   = 1;

        if (!empty($_GET['p'])) {
            
            $dados['paginaAtual'] = intval($_GET['p']);
            
        }
        
        $offset = ($dados['paginaAtual'] * $limit) - $limit;
        $dados['listaAnuncios'] = $anuncios->getListaAnuncios($offset, $limit);
        $dados['categorias']    = $categoria->categorias();
        $dados['localidade']    = $localidade->cidades();
        $dados['estados']       = $localidade->estados();

        $this->loadTemplate('home', $dados);
    }


    public function cadastro()
    {
        $usuario  = new Usuarios();
        
        $nome     = filter_input(INPUT_POST, 'nomeCadastro', FILTER_SANITIZE_STRING);
        $telefone = filter_input(INPUT_POST, 'TelefoneCadasro', FILTER_SANITIZE_STRING);
        $email    = filter_input(INPUT_POST, 'emailCadastro', FILTER_VALIDATE_EMAIL);
        $senha    = filter_input(INPUT_POST, 'senhaCadastro', FILTER_SANITIZE_STRING);

        $dados = [];
        if (isset($nome) && isset($telefone) && isset($email) && isset($senha)) {
            $dados = array(
            
                'cadastrado' => $usuario->cadastraUsuario($nome, $telefone, $email, $senha),
                
            );
        }

        $this->loadTemplate('cadastro', $dados);


    }

    public function login()
    {
        $usuario  = new Usuarios();

        $email    = filter_input(INPUT_POST, 'emailLogar', FILTER_VALIDATE_EMAIL);
        $senha    = filter_input(INPUT_POST, 'senhaLogar', FILTER_SANITIZE_STRING);

        $dados = [];
        if (isset($email) && isset($senha)) {
            $dados = array(
                'acessar_sistema' => $usuario->logar($email, $senha),
            );
        }

        $this->loadTemplate('login', $dados);
    }

    public function sair()
    {
        $dados = [];
        $this->loadTemplate('sair', $dados);
    }

    
}