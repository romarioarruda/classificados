<?php
require_once "../config.php";


if (isset($_GET['id']) && $_GET['acao'] == 'deletar_imagem') {
    global $conn;
    $id = intval($_GET['id']);
    
    $pega_img = 'SELECT * FROM anuncios_imagens WHERE id = :id';
    $resPega  = $conn->prepare($pega_img);
    $resPega->bindValue(':id', $id);
    $resPega->execute();

    if ($resPega->rowCount() > 0) {
        $url = $resPega->fetch();

        unlink('../assets/img/anuncios/'.$url['url']);

        $excluir = 'DELETE FROM anuncios_imagens WHERE id = :id';
        $resExc  = $conn->prepare($excluir);
        $resExc->bindValue(':id', $id);
        $resExc->execute();

        if ($resExc) {
            echo 'imagem_excluida';
        }
    }

}
