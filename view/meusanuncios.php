<?php 

    if (!isset($_SESSION['acesso_liberado'])) {

        header('Location: '.BASE_URL.'home/login');
        exit;
    }

?>

<section class="secao-meus-anuncios">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Meus anúncios</h4>
                <hr>
                <a class="btn btn-info" href="<?= BASE_URL ?>meusanuncios/publicar">Publicar Novo Anúncio</a>
                <br><br>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach($meus_anuncios as $dados): ?>
                            <tr>
                                <td>
                                    <?php if (isset($dados['img'])): ?>
                                        <img src="<?= BASE_URL ?>assets/img/anuncios/<?= $dados['img'] ?>" class="img-fluid" width="180">
                                    <?php else: ?>
                                        <img src="<?= BASE_URL ?>assets/img/padrao.jpg" class="img-fluid" width="180">
                                    <?php endif; ?>
                                </td>
                                <td class="titulo-anuncio"><?= $dados['titulo'] ?></td>
                                <td class="valor-anuncio">R$ <?= number_format($dados['valor'], 2, ',', '.') ?></td>
                                <td class="local-anuncio">
                                    <a href="<?= BASE_URL ?>meusanuncios/editar/<?=$dados['id']?>" class="btn btn-info">Editar</a>
                                    <button id-anuncio="<?=$dados['id']?>" class="btn btn-danger btn-exclui-anuncio" data-toggle="modal" data-target="#exampleModal">Excluir</button>
                                </td>
                            </tr>
                       <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header alert-danger">
        <h5 class="modal-title" id="exampleModalLabel">Deletar Anúncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Esse anúncio será deletado!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary btn-exluir-anuncio-modal">Confirmar</button>
      </div>
    </div>
  </div>
</div>