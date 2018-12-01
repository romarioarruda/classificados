<?php
session_start();

unset($_SESSION['acesso_liberado']);

header('Location: '.BASE_URL);

session_destroy();

exit;