<?php

class Cetak_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function print()
    {
        $query = "SELECT 	table_barang.Id_Barang,
        table_barang.Nama,
        table_barang.Gambar,
        table_tipe_barang.Tipe,
        table_kondisi_barang.Kondisi,
        table_barang.Jumlah,
        table_barang.Waktu_Ditambahkan,
        table_barang.Waktu_Diubah,
        table_user.Nama_Lengkap
FROM table_barang
LEFT JOIN table_tipe_barang ON table_barang.Id_Tipe = table_tipe_barang.Id_Tipe
LEFT JOIN table_kondisi_barang ON table_barang.Id_Kondisi = table_kondisi_barang.Id_Kondisi
LEFT JOIN table_user ON table_barang.Id_User = table_user.Id_User";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}
