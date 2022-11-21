<?php

class LoginSystem extends Controller
{
    public function register()
    {
        $this->view('loginsystem/registrasi');
        $this->view('templates/footer');
    }

    public function daftar()
    {
        if ($this->model('User_model')->registrasi($_POST) > 0) {
            Flasher::setFlash('User', ' berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/loginsystem/login');
            exit;
        } else {
            Flasher::setFlash('User', ' gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/loginsystem/register');
            exit;
        }
    }

    public function login()
    {
        if (isset($_COOKIE['kunci']) && isset($_COOKIE['key'])) {

            $key = $_COOKIE['key'];

            // ambil username berdasarkan id
            $this->model('User_model')->getUser();
            $row = $this->model('User_model')->getUser();

            // cek cookie dan username
            if ($key === hash('sha256', $row['username'])) {
                $_SESSION['login'] = true;
                $_SESSION['user'] = $row['Nama_Lengkap'];
                $_SESSION['iduser'] = $row['Id_User'];
                $_SESSION['level'] = $row['Level'];
            }
        }

        // if ($_SESSION['level'] == 'Admin') {
        //     header('Location: ' . BASEURL . '/dashboard');
        //     exit;
        // }
        if (isset($_SESSION["login"])) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
        $this->view('loginsystem/login');
        // $this->view('templates/footer');
    }

    public function masuk()
    {
        if ($this->model('User_model')->masukkan($_POST) <= 0) {
            Flasher::setFlash('username/password', ' salah', '', 'danger');
            header('Location: ' . BASEURL . '/loginsystem/login');
            exit;
        }
    }

    public function logout()
    {
        $_SESSION = [];
        session_unset();
        session_destroy();

        setcookie('kunci', '', time() - 3600, '/');
        setcookie('key', '', time() - 3600, '/');

        header('Location: ' . BASEURL . '/loginsystem/login');
        exit;
    }
}
