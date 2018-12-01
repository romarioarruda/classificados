<?php

class Localidade extends Conexao
{

    public function cidades()
    {
        $local     = 'SELECT * FROM `cidades` ORDER BY id_estado';
        $res_local = $this->conn->query($local);

        if ($res_local->rowCount() > 0) {
            $resultado = $res_local->fetchAll();

            return $resultado;

        }
    }

    public function estados()
    {
        $estado     = 'SELECT * FROM `estados` ORDER BY estado ASC';
        $res_estado = $this->conn->query($estado);

        if ($res_estado->rowCount() > 0) {
            $result = $res_estado->fetchAll();

            return $result;

        }
    }
}