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

            <?php if (isset($_GET['atualizado'])): ?>
                
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Anúncio atualizado com sucesso.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

                <h2>Formulário de edição</h2>
                <hr>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-row form-group">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Titulo" name="titulo" value="<?= $anuncio_info['titulo'] ?> " required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Valor" name="valor" value="<?= $anuncio_info['valor'] ?> " required>
                        </div>
                    </div>
                    
                    <div class="form-row form-group">
                        <div class="col">
                            <select class="custom-select" id="cat" name="cat" required>
                                <option value="0">-- Categoria --</option>
                                <?php foreach($categorias as $cat): ?>
                                    <option value="<?= $cat['id'] ?>" <?= ($anuncio_info['id_categoria'] == $cat['id']) ? 'selected':''; ?> ><?= $cat['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="custom-select" id="estado" name="estado" required>
                                <option value="0">-- Estado --</option>
                                <?php foreach($local_estado as $estado): ?>
                                    <option value="<?= $estado['id'] ?>" <?= ($anuncio_info['estado'] == $estado['id']) ? 'selected':''; ?> ><?= $estado['estado'] ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                        <div class="col-md-3">
                            <select class="custom-select" id="cidade" name="cidade" required>
                                <option value="0">-- Cidade --  </option>
                                <?php foreach($local_cidade as $cidade): ?>
                                    <option value="<?= $cidade['id'] ?>" <?= ($anuncio_info['localidade'] == $cidade['id']) ? 'selected':''; ?> ><?= $cidade['cidade'] ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-row form-group">
                        <div class="col">
                            <textarea class="form-control" name="descricao" placeholder="Descreva o anúncio" style="height:40px" required><?= $anuncio_info['descricao'] ?></textarea>
                        </div>
                        <div class="col">
                
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="arquivos[]" id="arquivo" multiple>
                                <label class="custom-file-label" for="inputGroupFile01">Imagens (JPG ou PNG)</label>
                            </div>
                        </div>
                    </div>

                    <div class="card form-group">
                        <div class="card-header">
                            <h5>Imagens salvas</h5>
                        </div>
                        <div class="card-body">
                            <?php if (isset($anuncio_img) && $anuncio_img == true): ?>
                                <div class="img-salva">
                                    <?php foreach($anuncio_img as $imgs): ?>
                                        <img src="<?= BASE_URL ?>assets/img/anuncios/<?= $imgs['url']?>" class="img-fluid imagem-salva" width="180">
                                        <button type="button" id-img="<?= $imgs['id']?>" class="btn btn-danger btn-exclui-img" id="btn-exclui-img">excluir imagem</button>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info col-md-2 btn-atualiza">SALVAR</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</section>