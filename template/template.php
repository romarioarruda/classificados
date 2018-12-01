<?php

$page = $_SERVER['REQUEST_URI'];

$home = '/classificados_mvc/';
$cadastro = '/classificados_mvc/home/cadastro';
$login = '/classificados_mvc/home/login';

$meus_anuncios = '/classificados_mvc/meusanuncios';
$publicar = '/classificados_mvc/meusanuncios/publicar';

preg_match('#/classificados_mvc/meusanuncios/editar/\d+#is', $_SERVER['REQUEST_URI'], $editar);

$meu_perfil = '/classificados_mvc/meuperfil';

?>

<!doctype html>
<html lang="pt-br">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/template.css" type="text/css">

    <title>Classificados</title>
  </head>
  <body>
    
    <ul class="nav nav-pills mb-3 navbar-dark bg-dark" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link navbar-brand <?= ($page == $home) ? 'active':''; ?>" href="<?= BASE_URL ?>" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
        </li>

        <?php if (isset($_SESSION['acesso_liberado'])): ?>
            <li class="nav-item">
              <a class="nav-link meuanu <?= ($page == $meus_anuncios || $page == $publicar || $page == $editar[0]) ? 'active':''; ?>" href="<?= BASE_URL ?>meusanuncios" role="tab" aria-controls="pills-profile" aria-selected="false">Meus anúncios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($page == $meu_perfil) ? 'active':''; ?>" href="<?= BASE_URL ?>meuperfil" role="tab" aria-controls="pills-profile" aria-selected="false">Meu perfil</a>
            </li>
            <li class="nav-item btn-sair">
              <a class="nav-link" href="<?= BASE_URL ?>home/sair" role="tab" aria-controls="pills-contact" aria-selected="false">Sair</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
              <a class="nav-link <?= ($page == $cadastro) ? 'active':''; ?>" href="<?= BASE_URL ?>home/cadastro" role="tab" aria-controls="pills-profile" aria-selected="false">Cadastro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($page == $login) ? 'active':''; ?>" href="<?= BASE_URL ?>home/login" role="tab" aria-controls="pills-contact" aria-selected="false">Login</a>
            </li>
        <?php endif; ?>
        
    </ul>
 
    <div class="container-fluid">
          
          <?= $this->loadView($view, $dados) ?>
          
    </div>
    




    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL ?>assets/js/template.js"></script>
    <script src="<?= BASE_URL ?>assets/js/meusanuncios.js"></script>

  </body>
</html>