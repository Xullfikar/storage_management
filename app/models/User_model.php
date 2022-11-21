<?php
// session_start();

class User_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function registrasi($data)
    {
        $username = strtolower(stripslashes($data["username"]));
        $password = $data["password"];
        $password2 = $data["password2"];
        $nama = $data["Nama_Lengkap"];
        $level = $data["Level"];

        // Cek Nama_Lengkap sdh ada atau belum 
        $this->db->query("SELECT Nama_Lengkap FROM table_user WHERE Nama_Lengkap = '$nama'");
        $this->db->execute();
        $result = $this->db->single();

        if ($result) {
            Flasher::setFlash('Nama Lengkap', ' sudah', 'terdaftar', 'danger');
            header('Location: ' . BASEURL . '/loginsystem/register');
            exit;
        }

        // Cek username sdh ada atau belum 
        $this->db->query("SELECT username FROM table_user WHERE username = '$username'");
        $this->db->execute();
        $result = $this->db->single();

        if ($result) {
            Flasher::setFlash('Username', ' sudah', 'terdaftar', 'danger');
            header('Location: ' . BASEURL . '/loginsystem/register');
            exit;
        }

        // Cek konfirmasi password
        if ($password !== $password2) {
            Flasher::setFlash('Konfirmasi', ' password', 'tidak sesuai', 'danger');
            header('Location: ' . BASEURL . '/loginsystem/register');
            exit;
        }

        // Enkripsi Password
        $password = password_hash($password, PASSWORD_DEFAULT);


        $query = "INSERT INTO table_user
                    VALUES
                    ('', :Nama_Lengkap, :username, :password, :Level)";

        $this->db->query($query);
        $this->db->bind('Nama_Lengkap', $data['Nama_Lengkap']);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('Level', $level);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function masukkan($data)
    {
        $username = $data["username"];
        $password = $data["password"];

        // Cek pengguna sdh terdaftar ada atau belum 
        $this->db->query("SELECT * FROM table_user WHERE username = '$username'");
        $this->db->single();

        // cek username
        if ($this->db->single()) {

            // cek password
            $row = $this->db->single();
            if (password_verify($password, $row["password"])) {

                if (isset($data["remember"])) {
                    // buat cookie
                    setcookie('kunci', $row['Id_User'], time() + (60 * 60), '/');
                    setcookie('key', hash('sha256', $row['username']), time() + (60 * 60), '/');
                }

                // cek jika pengguna login sebagai admin
                if ($row['Level'] === "Admin") {
                    // set session
                    $_SESSION["login"] = true;
                    $_SESSION['user'] = $row['Nama_Lengkap'];
                    $_SESSION['iduser'] = $row['Id_User'];
                    $_SESSION['level'] = $row['Level'];

                    header('Location: ' . BASEURL . '/dashboard');
                    exit;

                    // cek jika pengguna login sebagai user biasa
                } else if ($row['Level'] === "User") {
                    // set session
                    $_SESSION["login"] = true;
                    $_SESSION['user'] = $row['Nama_Lengkap'];
                    $_SESSION['iduser'] = $row['Id_User'];
                    $_SESSION['level'] = $row['Level'];

                    header('Location: ' . BASEURL . '/dashboard/user');
                    exit;
                }
            }
        }
        $this->db->execute();

        $this->db->rowCount();
    }

    public function getUser()
    {
        $kunci = $_COOKIE['kunci'];
        $this->db->query("SELECT * FROM table_user WHERE Id_User = '$kunci'");
        return $this->db->single();
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM table_user ");
        return $this->db->resultSet();
    }

    public function levelUser($data)
    {
        $query = "UPDATE table_user SET
                    Level = :Level
                WHERE Id_User = :Id_User";

        $this->db->query($query);
        $this->db->bind('Level', $data['Level']);
        $this->db->bind('Id_User', $data['Id_User']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
