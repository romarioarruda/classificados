<?php

class Anuncios extends Conexao
{

    public function getTotalAnuncios()
    {
        $cont = 'SELECT COUNT(*) as cont FROM anuncios';
        $resu = $this->conn->query($cont);
        
        if ($resu->rowCount() > 0) {
            $result = $resu->fetch();

            return $result['cont'];

        }

    }

    public function getListaAnuncios($offset, $limit)
    {

        $lista = 'SELECT *, (select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio = anuncios.id limit 1) as imgAll FROM `anuncios` WHERE 1=1 ';
        
        if (isset($_POST['categoria']) && $_POST['categoria'] != 0) {

            $lista .= 'AND id_categoria = :cat ';
        }

        if (isset($_POST['preco']) && $_POST['preco'] != 0) {
        
            $lista .= 'AND valor BETWEEN :preco1 AND :preco2 ';
        }

        if (isset($_POST['local']) && $_POST['local'] != 0) {
        
            $lista .= 'AND localidade = :localidade ';
        }

        if (isset($_POST['estados']) && $_POST['estados'] != 0) {
        
            $lista .= 'AND estado = :estados ';
        }


        $lista .= 'ORDER BY titulo ASC LIMIT '.$offset.', '.$limit;
        
        $res_lista  = $this->conn->prepare($lista);

        if (isset($_POST['categoria']) && $_POST['categoria'] != 0) {

            $cat = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);
            $res_lista->bindValue(':cat', $cat);
        }

        if (isset($_POST['preco']) && $_POST['preco'] != 0) {

            $valor = explode('-', $_POST['preco']);
              
            $res_lista->bindValue(':preco1', $valor[0]);
            $res_lista->bindValue(':preco2', $valor[1]);
        }

        if (isset($_POST['local']) && $_POST['local'] != 0) {
            $local = filter_input(INPUT_POST, 'local', FILTER_VALIDATE_INT);
            $res_lista->bindValue(':localidade', $local);
        }

        if (isset($_POST['estados']) && $_POST['estados'] != 0) {
            $estados = filter_input(INPUT_POST, 'estados', FILTER_VALIDATE_INT);
            $res_lista->bindValue(':estados', $estados);
        }

        $res_lista->execute();

        if ($res_lista->rowCount() > 0) {
            $result = $res_lista->fetchAll();

            return $result;

        }
        
    }

    public function meusAnuncios($id)
    {
        $pega_anuncios = 'SELECT *, (select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncio = anuncios.id limit 1) as img FROM anuncios WHERE anuncios.id_usuario = :usuario';
        $result_pega   = $this->conn->prepare($pega_anuncios);
        $result_pega->bindValue(':usuario', $id);
        $result_pega->execute();

        if ($result_pega->rowCount() > 0) {

            $dados = $result_pega->fetchAll();

            return $dados;
        }

        return false;
        
    }

    public function infoMeuAnuncio($id)
    {

        $info     = 'SELECT * FROM anuncios WHERE id = :id';
        $res_info = $this->conn->prepare($info);
        $res_info->bindValue(':id', $id);
        $res_info->execute();

        if ($res_info->rowCount() > 0) {
            $dados_info = $res_info->fetch();

            return $dados_info;
        }

        return false;
    }

    public function atualizarAnuncio($id, $titulo, $valor, $cat, $estado, $cidade, $descr)
    {

        $update  = 'UPDATE anuncios SET titulo = :titulo, valor = :valor, id_categoria = :cat, estado = :estado, localidade = :cidade, descricao = :descr WHERE id = :id';
        $res_up  = $this->conn->prepare($update);
        $res_up->bindValue(':titulo', $titulo);
        $res_up->bindValue(':valor', $valor);
        $res_up->bindValue(':cat', $cat);
        $res_up->bindValue(':estado', $estado);
        $res_up->bindValue(':cidade', $cidade);
        $res_up->bindValue(':descr', $descr);
        $res_up->bindValue(':id', $id);
        $res_up->execute();

        if ($res_up) {
            
            return true;
        }

        return false;
    }

    public function salvaImagem($id, $name)
    {
        $insert_image = 'INSERT INTO anuncios_imagens SET id_anuncio = :anuncio, url = :img';
        $res_insert   = $this->conn->prepare($insert_image);
        $res_insert->bindValue(':anuncio', $id);
        $res_insert->bindValue(':img', $name);
        $res_insert->execute();
    }

    public function minhasImagens($id)
    {
        $minhas_img = 'SELECT * FROM anuncios_imagens WHERE id_anuncio = :id';
        $res_img    = $this->conn->prepare($minhas_img);
        $res_img->bindValue(':id', $id);
        $res_img->execute();

        if ($res_img->rowCount() > 0) {
            $img = $res_img->fetchAll();

            return $img;
        }

        return false;
    }

    public function publicarAnuncio($usuario, $titulo, $valor, $cat, $estado, $cidade, $descr)
    {
        $public  = 'INSERT INTO anuncios SET id_usuario = :usuario, titulo = :titulo, valor = :valor, id_categoria = :cat, estado = :estado, localidade = :cidade, descricao = :descr';
        $res_pub  = $this->conn->prepare($public);
        $res_pub->bindValue(':usuario', $usuario);
        $res_pub->bindValue(':titulo', $titulo);
        $res_pub->bindValue(':valor', $valor);
        $res_pub->bindValue(':cat', $cat);
        $res_pub->bindValue(':estado', $estado);
        $res_pub->bindValue(':cidade', $cidade);
        $res_pub->bindValue(':descr', $descr);
        $res_pub->execute();

        if ($res_pub) {
            
            return true;
        }

        return false;

    }

}
