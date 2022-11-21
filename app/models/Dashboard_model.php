<?php

class Dashboard_model
{
    private $db;
    private $dashboard;

    public function __construct()
    {
        $this->db = new Database;
        $this->dashboard = new Dashboard;
    }

    public function getAllDashboard()
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

    public function tambahDashboard($data)
    {
        // upload gambar
        $gambar = $this->dashboard->upload();
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO table_barang
                    VALUES
                    ('', :Nama, '$gambar', :Id_Tipe, :Id_Kondisi, :Jumlah, :Id_User, :Waktu_Ditambahkan, :Waktu_Diubah)";

        $this->db->query($query);
        $this->db->bind('Nama', $data['Nama']);
        $this->db->bind('Id_Tipe', $data['Id_Tipe']);
        $this->db->bind('Id_Kondisi', $data['Id_Kondisi']);
        $this->db->bind('Jumlah', $data['Jumlah']);
        $this->db->bind('Id_User', $_SESSION['iduser']);
        $this->db->bind('Waktu_Ditambahkan', $data['Waktu_Ditambahkan']);
        $this->db->bind('Waktu_Diubah', $data['Waktu_Diubah']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteDashboard($Id_Barang)
    {
        $query = "DELETE FROM table_barang WHERE Id_Barang = :Id_Barang";
        $this->db->query($query);
        $this->db->bind('Id_Barang', $Id_Barang);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDetailbyId($Id_Barang)
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
LEFT JOIN table_user ON table_barang.Id_User = table_user.Id_User
WHERE Id_Barang = :Id_Barang";
        $this->db->query($query);
        $this->db->bind('Id_Barang', $Id_Barang);
        return $this->db->single();
    }

    public function getDashboardbyId($Id_Barang)
    {
        $this->db->query('SELECT * FROM table_barang WHERE Id_Barang=:Id_Barang');
        $this->db->bind('Id_Barang', $Id_Barang);
        return $this->db->single();
    }

    public function ubahDashboard($data)
    {
        $Gambar_Lama = $data['Gambar_Lama'];

        // cek user pilih gambar baru atau tidak
        if ($_FILES['Gambar']['error'] === 4) {
            $gambar = $Gambar_Lama;
        } else {
            $gambar = $this->dashboard->upload();
        }

        $query = "UPDATE table_barang SET
                    Nama = :Nama,
                    Gambar = '$gambar',
                    Id_Tipe = :Id_Tipe,
                    Id_Kondisi = :Id_Kondisi,
                    Jumlah = :Jumlah,
                    Id_User = :Id_User,
                    Waktu_Ditambahkan = :Waktu_Ditambahkan,
                    Waktu_Diubah = :Waktu_Diubah
                WHERE Id_Barang = :Id_Barang";

        $this->db->query($query);
        $this->db->bind('Nama', $data['Nama']);
        $this->db->bind('Id_Tipe', $data['Id_Tipe']);
        $this->db->bind('Id_Kondisi', $data['Id_Kondisi']);
        $this->db->bind('Jumlah', $data['Jumlah']);
        $this->db->bind('Id_User', $_SESSION['iduser']);
        $this->db->bind('Waktu_Ditambahkan', $data['Waktu_Ditambahkan']);
        $this->db->bind('Waktu_Diubah', $data['Waktu_Diubah']);
        $this->db->bind('Id_Barang', $data['Id_Barang']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
