<section class="secao-login">

    <div class="container row">

        <div class="col-md-6">

        <?php
            if (isset($acessar_sistema) && $acessar_sistema == true) {

                header('Location: '.BASE_URL);
            }
        
        ?>

        <?php if (isset($acessar_sistema) && $acessar_sistema == false): ?>
            <div class="alert alert-danger">E-mail ou senha incorretos.</div>
        <?php endif; ?>

        <h2>Formulário de login</h2>
        <hr>
            <form method="POST">

                <div class="form-group">
                    <input type="email" class="form-control" name="emailLogar" id="emailLogar" placeholder="E-mail" required>
                </div>
                
                <div class="form-group">

                    <input type="password" class="form-control" name="senhaLogar" id="senhaLogar" placeholder="Senha" required>

                </div>

                <button type="submit" class="btn btn-primary mb-2 col-md-12">ENTRAR</button>
            </form>
        </div>

    </div>

</section>