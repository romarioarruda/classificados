<?php

class Categoria extends Conexao
{

    public function categorias()
    {
        $cat     = 'SELECT * FROM `categorias` ORDER BY nome ASC';
        $res_cat = $this->conn->query($cat);

        if ($res_cat->rowCount() > 0) {
            $result = $res_cat->fetchAll();

            return $result;

        }
    }
}