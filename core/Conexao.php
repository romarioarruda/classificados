<?php

class Conexao
{

    protected $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
}