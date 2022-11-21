<?php

class Tipe_model
{
    private $db;
    private $table = 'table_tipe_barang';

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
