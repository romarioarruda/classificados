<section class="secao-cadastro">

    <div class="container row">

        <div class="col-md-6">

        <?php if (isset($cadastrado) && $cadastrado == true): ?>
            <div class="alert alert-success">Seu cadastro foi realizado com sucesso.</div>
        <?php endif; ?>

        <?php if (isset($cadastrado) && $cadastrado == false): ?>
            <div class="alert alert-danger">O e-mail informado já existe em nosso banco de dados.</div>
        <?php endif; ?>

        <h3>Cadastre-se para publicar</h3>
        <hr>
            <form method="POST">

                <div class="form-group">
                    <input type="text" class="form-control mb-2 mr-sm-2" name="nomeCadastro" id="nomeCadastro" placeholder="Nome" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="TelefoneCadasro" id="TelefoneCadasro" placeholder="Telefone" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="emailCadastro" id="emailCadastro" placeholder="E-mail" required>
                </div>
                
                <div class="form-group">

                    <input type="password" class="form-control" name="senhaCadastro" id="senhaCadastro" placeholder="Senha" required>

                </div>

                <button type="submit" class="btn btn-primary mb-2 col-md-12">CADASTRAR</button>
            </form>
        </div>

    </div>

</section>