<?php

class LevelUser extends Controller
{
    public function index()
    {
        if (!$_SESSION["login"]) {
            header('Location: ' . BASEURL . '/loginsystem/login');
            exit;
        }

        $data = [
            'judul' => 'Data User',
            'leveluser' => $this->model('User_model')->getAllUser()
        ];
        $this->view('templates/header', $data);
        $this->view('leveluser/index', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('User_model')->levelUser($_POST) > 0) {
            Flasher::setFlash('Level User', ' berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/leveluser');
            exit;
        } else {
            Flasher::setFlash('Level User', ' gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/leveluser');
            exit;
        }
    }
}
