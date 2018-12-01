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
            <?php if (isset($publicado) && $publicado == true): ?>
                
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Anúncio publicado com sucesso.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>



                <h2>Área de publicação</h2>
                <hr>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-row form-group">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Titulo" name="titulo" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Valor" name="valor" required>
                        </div>
                    </div>
                    
                    <div class="form-row form-group">
                        <div class="col">
                            <select class="custom-select" id="cat" name="cat" required>
                                <option value="0">-- Categoria --</option>
                                <?php foreach($categorias as $cat): ?>
                                    <option value="<?= $cat['id'] ?>"><?= $cat['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="custom-select" id="estado" name="estado" required>
                                <option value="0">-- Estado --</option>
                                <?php foreach($local_estado as $estado): ?>
                                    <option value="<?= $estado['id'] ?>"><?= $estado['estado'] ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                        <div class="col-md-3">
                            <select class="custom-select" id="cidade" name="cidade" required>
                                <option value="0">-- Cidade --  </option>
                                <?php foreach($local_cidade as $cidade): ?>
                                    <option value="<?= $cidade['id'] ?>"><?= $cidade['cidade'] ?></option>
                                <?php endforeach; ?>
                            </select> 
                        </div>
                    </div>

                    <div class="form-row form-group">
                        <div class="col">
                            <textarea class="form-control" name="descricao" placeholder="Descreva o anúncio" style="height:60px" required></textarea>
                        </div>
        
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info col-md-2 btn-publicar">PUBLICAR</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</section>