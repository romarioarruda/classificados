<?php

class Usuarios extends Conexao
{

    public function getTotalUsuarios()
    {
        $cont = 'SELECT COUNT(*) as cont FROM usuarios';
        $resu = $this->conn->query($cont);
        
        if ($resu->rowCount() > 0) {
            $result = $resu->fetch();

            return $result['cont'];

        }
    }

    public function cadastraUsuario($nome, $telefone, $email, $senha)
    {
        $verifica_email = 'SELECT email FROM usuarios WHERE email = :email';
        $res_ver_email  = $this->conn->prepare($verifica_email);
        $res_ver_email->bindValue(':email', $email);
        $res_ver_email->execute();

        if ($res_ver_email->rowCount() <= 0) {

            $cadastro       = 'INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone';
            $res_cadastro   = $this->conn->prepare($cadastro);
            $res_cadastro->bindValue(':nome', $nome);
            $res_cadastro->bindValue(':email', $email);
            $res_cadastro->bindValue(':senha', md5($senha));
            $res_cadastro->bindValue(':telefone', $telefone);
            $res_cadastro->execute();

            return true;
        }

        return false;

    }

    public function logar($email, $senha)
    {
        $verifica_dados = 'SELECT id, nome, email, senha FROM usuarios WHERE email = :email AND senha = :senha';
        $result_dados   = $this->conn->prepare($verifica_dados);
        $result_dados->bindValue(':email', $email);
        $result_dados->bindValue(':senha', md5($senha));
        $result_dados->execute();

        if ($result_dados->rowCount() > 0) {
            $retorno = $result_dados->fetch();

            $_SESSION['acesso_liberado'] = $retorno['id'];

            return true;
        }

        return false;
    }

    public function atualizaDados($nome, $email, $tel, $senha_antiga, $senha_nova)
    {
        $verifica_senha_antiga = 'SELECT senha FROM usuarios WHERE id = :id AND senha = :senha';
        $res_ver_senha_antiga  = $this->conn->prepare($verifica_senha_antiga);
        $res_ver_senha_antiga->bindValue(':id', $_SESSION['acesso_liberado']);
        $res_ver_senha_antiga->bindValue(':senha', md5($senha_antiga));
        $res_ver_senha_antiga->execute();

        if ($res_ver_senha_antiga->rowCount() > 0) {

            $atualiza = 'UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone WHERE id = :id';
            $res_atu  = $this->conn->prepare($atualiza);
            $res_atu->bindValue(':nome', $nome);
            $res_atu->bindValue(':email', $email);
            $res_atu->bindValue(':senha', md5($senha_nova));
            $res_atu->bindValue(':telefone', $tel);
            $res_atu->bindValue(':id', $_SESSION['acesso_liberado']);
            $res_atu->execute();

            return true;
        }

        return false;

    }
}