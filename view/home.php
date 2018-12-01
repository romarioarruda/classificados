<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Sistema de anúncios</h1>
    <p class="lead">Mais de <?= $totalAnuncios ?> anúncios publicados e já temos <?= $totalUsuarios ?> usuários cadastrados.</p>
  </div>
</div>

<section class="secao-anuncio">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h4>Pesquisa Avançada</h4>
                <hr>
                <form method="POST">
                    <div class="form-group">
                        <select class="custom-select" name="categoria">
                            <option value="0">Pesquise por categoria</option>
                            <?php foreach($categorias as $cat): ?>

                                <option value="<?= $cat['id'] ?>" ><?= $cat['nome'] ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="custom-select" name="preco">
                            <option value="0">Pesquise por valor</option>
                            <option value="1-100">1 - 100</option>
                            <option value="100-500">100 - 500</option>
                            <option value="500-1000">500 - 1000</option>
                            <option value="1000-5000">1000 - 5000</option>
                            <option value="5000-10000">5000 - 10000</option>
                            <option value="10000-20000">10000 - 20000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="custom-select" name="local">
                            <option value="0">Pesquise por cidade</option>
                            <?php foreach($localidade as $local): ?>

                                <option value="<?= $local['id'] ?>" ><?= $local['cidade'] ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="custom-select" name="estados">
                            <option value="0">Pesquise por estado</option>
                            <?php foreach($estados as $estado): ?>

                                <option value="<?= $estado['id'] ?>" ><?= $estado['estado'] ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary col-md-12">Pesquisar</button>
                    </div>

                </form>
            </div>
        
            <div class="col-md-8" id="listaHome">
                <h4>Anúncios</h4>
                <hr>
                <?php if (@count($listaAnuncios) > 0): ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Preview</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Localidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listaAnuncios as $dados): ?>

                                <tr>
                                    <td>
                                        <?php if (isset($dados['imgAll'])): ?>
                                            <img class="img-fluid" src="<?= BASE_URL ?>assets/img/anuncios/<?= $dados['imgAll'] ?>" width="180">
                                        <?php else: ?>
                                            <img class="img-fluid" src="<?= BASE_URL ?>assets/img/padrao.jpg" width="180">
                                        <?php endif; ?>
                                    </td>
                                    <td class="titulo-anuncio"><?= $dados['titulo'] ?></td>
                                    <td class="valor-anuncio">R$ <?= number_format($dados['valor'], 2, ',', '.') ?></td>
                                    <td class="local-anuncio">
                                    <?php foreach($localidade as $local): ?>
                                        <?= ($dados['localidade'] == $local['id']) ? $local['cidade']:'' ?>

                                    <?php endforeach; ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            
                            <li class="page-item <?= ($paginaAtual > 1) ? '':'disabled'; ?>">
                                <a class="page-link" href="<?= BASE_URL ?>?p=<?= $paginaAtual -1 ?>">Anterior</a>
                            </li>
                            
                            <?php for($q = 1; $q <= $totalPaginas; $q++): ?>
                                <?php if ($q > $paginaAtual - 2 && $q < $paginaAtual + 2): ?>
                                    <li class="page-item <?= ($paginaAtual == $q) ? "active":""; ?>">
                                        <a class="page-link" href="<?= BASE_URL ?>?p=<?= $q ?>"><?= $q ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <li class="page-item <?= ($paginaAtual < $totalPaginas) ? '':'disabled'; ?>">
                                <a class="page-link" href="<?= BASE_URL ?>?p=<?= $paginaAtual +1 ?>">Próximo</a>
                            </li>
                            
                        </ul>
                    </nav>
                
                <?php else: ?>
                    <div class="alert alert-danger">Nenhum resultado encontrado.</div>
                <?php endif; ?>

            </div>
            
        </div>
    </div>

</section>