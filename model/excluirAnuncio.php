<?php
require_once "../config.php";


if (isset($_GET['id']) && $_GET['acao'] == 'deletar_anuncio') {
    global $conn;
    $id = intval($_GET['id']);

    $pega_todas_imagens = 'SELECT * FROM anuncios_imagens WHERE id_anuncio = :id';
    $res_img  = $conn->prepare($pega_todas_imagens);
    $res_img->bindValue(':id', $id);
    $res_img ->execute();

    if ($res_img->rowCount() > 0) {
        $img = $res_img->fetchAll();

        foreach($img as $url) {

            unlink('../assets/img/anuncios/'.$url['url']);
        }

        $excluir_img = 'DELETE FROM anuncios_imagens WHERE id_anuncio = :id';
        $res_exclui  = $conn->prepare($excluir_img);
        $res_exclui->bindValue(':id', $id);
        $res_exclui->execute();
    }

    $excluir = 'DELETE FROM anuncios WHERE id = :id';
    $resExc  = $conn->prepare($excluir);
    $resExc->bindValue(':id', $id);
    $resExc->execute();

    if ($resExc) {
        echo 'anuncio_excluido';
    }

}
