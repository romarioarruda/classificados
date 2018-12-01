<?php 

    if (!isset($_SESSION['acesso_liberado'])) {

        header('Location: '.BASE_URL.'home/login');
        exit;
    }
//header('Location: '.BASE_URL.'meuperfil');
?>

<section class="secao-meu-perfil">

    <div class="container">
        <div class="row">
            <div class="col-md-8">

            <?php if (isset($atualiza_dados) && $atualiza_dados == false): ?>
                    <div class="alert alert-danger">Senha antiga incorreta. Tente novamente!</div>
            <?php endif; ?>

            <?php if (isset($atualiza_dados) && $atualiza_dados == true): ?>
                    <div class="alert alert-success">Dados atualizados com sucesso.</div>
            <?php endif; ?>
                <h2>Meus dados</h2>
                <hr>

                <form method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="E-mail" name="email" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Telefone" name="telefone" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Senha antiga" name="senhaantiga" required>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Nova senha" name="novasenha" required>
                    </div>
                

                    <div class="form-group">
                        <button type="submit" class="btn btn-info col-md-2">ATUALIZAR</button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</section>