<?php

class Kondisi_model
{
    private $db;
    private $table = 'table_kondisi_barang';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}
