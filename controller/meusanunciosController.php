<?php

class meusanunciosController extends controller
{

    public function index()
    {  
        $anuncios = new Anuncios();
        
        $dados = array(
            'meus_anuncios' => $anuncios->meusAnuncios($_SESSION['acesso_liberado']),
        );
        $this->loadTemplate('meusanuncios', $dados);
    }

    public function editar($id)
    {
        $categoria  = new Categoria();
        $localidade = new Localidade();
        $anuncios   = new Anuncios();

        $titulo = filter_input(INPUT_POST, 'titulo',    FILTER_SANITIZE_STRING);
        $valor  = filter_input(INPUT_POST, 'valor',     FILTER_SANITIZE_STRING);
        $cat    = filter_input(INPUT_POST, 'cat',       FILTER_VALIDATE_INT);
        $estado = filter_input(INPUT_POST, 'estado',    FILTER_VALIDATE_INT);
        $cidade = filter_input(INPUT_POST, 'cidade',    FILTER_VALIDATE_INT);
        $descr  = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        

        $dados  = array(
            'categorias'    => $categoria->categorias(),
            'local_estado'  => $localidade->estados(),
            'local_cidade'  => $localidade->cidades(),
            'anuncio_info'  => $anuncios->infoMeuAnuncio($id),
            'anuncio_img'   => $anuncios->minhasImagens($id),
        );

        if (!empty($_FILES['arquivos'])) {

            if (count($_FILES['arquivos']['tmp_name']) > 0) {

                for ($files = 0; $files < count($_FILES['arquivos']['tmp_name']); $files++) {
                    $tipo = $_FILES['arquivos']['type'][$files];

                    if (in_array($tipo, array('image/jpeg', 'image/png'))) {

                        $name = md5($_FILES['arquivos']['name'][$files].time().rand(0,999)).'.jpg';

                        move_uploaded_file($_FILES['arquivos']['tmp_name'][$files], 'assets/img/anuncios/'.$name);
                        
                        $anuncios->salvaImagem($id, $name);
                    }
                }
            }
        }
        
        if (isset($id) && !empty($titulo) && !empty($valor) && !empty($cat) && !empty($estado) && !empty($cidade) && !empty($descr)) {

            $dados = array(
                'pub_atualizado' => $anuncios->atualizarAnuncio($id, $titulo, $valor, $cat, $estado, $cidade, $descr)
            );
            header('Location: '.BASE_URL.'/meusanuncios/editar/'.$id.'?atualizado');
        }

        $this->loadTemplate('editar', $dados);
    }

    public function publicar()
    {
        $categoria  = new Categoria();
        $localidade = new Localidade();
        $anuncios   = new Anuncios();

        $titulo = filter_input(INPUT_POST, 'titulo',    FILTER_SANITIZE_STRING);
        $valor  = filter_input(INPUT_POST, 'valor',     FILTER_SANITIZE_STRING);
        $cat    = filter_input(INPUT_POST, 'cat',       FILTER_VALIDATE_INT);
        $estado = filter_input(INPUT_POST, 'estado',    FILTER_VALIDATE_INT);
        $cidade = filter_input(INPUT_POST, 'cidade',    FILTER_VALIDATE_INT);
        $descr  = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

        $dados  = array(
            'categorias'    => $categoria->categorias(),
            'local_estado'  => $localidade->estados(),
            'local_cidade'  => $localidade->cidades(),
        );
        
        if (!empty($titulo) && !empty($valor) && !empty($cat) && !empty($estado) && !empty($cidade) && !empty($descr)) {

            $dados = array(
                'publicado' => $anuncios->publicarAnuncio($_SESSION['acesso_liberado'], $titulo, $valor, $cat, $estado, $cidade, $descr)
            );
        }
        $this->loadTemplate('publicar', $dados);
        
    }
}