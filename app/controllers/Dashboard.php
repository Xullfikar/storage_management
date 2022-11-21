<?php

class Dashboard extends Controller
{
    public function index()
    {
        if (!$_SESSION["login"]) {
            header('Location: ' . BASEURL . '/loginsystem/login');
            exit;
        }
        $data['judul'] = 'Dashboard';
        $data['dashboard'] = $this->model('Dashboard_model')->getAllDashboard();
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function detail()
    {
        echo json_encode($this->model('Dashboard_model')->getDetailbyId($_POST['id']));
    }

    public function user()
    {
        if (!$_SESSION["login"]) {
            header('Location: ' . BASEURL . '/loginsystem/login');
            exit;
        }
        $data['judul'] = 'Home';
        $data['dashboard'] = $this->model('Dashboard_model')->getAllDashboard();

        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if (!$_SESSION["login"]) {
            header('Location: ' . BASEURL . '/loginsystem/login');
            exit;
        }
        $tipe = $this->model('Tipe_model')->findAll();
        $kondisi = $this->model('Kondisi_model')->findAll();
        $date = $this->model('Date_model')->waktu();

        $data = [
            'judul' => 'Tambah Barang',
            'tipe' => $tipe,
            'kondisi' => $kondisi,
            'date' => $date
        ];
        $this->view('templates/header', $data);
        $this->view('dashboard/tambah', $data);
        $this->view('templates/footer');
    }

    public function simpan()
    {
        if ($this->model('Dashboard_model')->tambahDashboard($_POST) > 0) {
            Flasher::setFlash('Data', ' berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            Flasher::setFlash('Data', ' gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function upload()
    {
        $namaFile = $_FILES['Gambar']['name'];
        $ukuranFile = $_FILES['Gambar']['size'];
        $error = $_FILES['Gambar']['error'];
        $tmpName = $_FILES['Gambar']['tmp_name'];

        // cek apakah tidak ada gambar yang di upload
        if ($error === 4) {
            Flasher::setFlash('Pilih', ' Gambar', 'terlebih dahulu', 'danger');
            header('Location: ' . BASEURL . '/dashboard/tambah');
            exit;
        }

        // cek yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            Flasher::setFlash('Yang anda', ' Upload', 'bukan gambar', 'danger');
            header('Location: ' . BASEURL . '/dashboard/tambah');
            exit;
        }

        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 2097152) {
            Flasher::setFlash('Ukuran', ' Gambar', 'terlalu besar', 'danger');
            header('Location: ' . BASEURL . '/dashboard/tambah');
            exit;
        }

        //lolos pengecekan gambar siap diupload

        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    public function delete($Id_Barang)
    {
        if ($this->model('Dashboard_model')->deleteDashboard($Id_Barang) > 0) {
            Flasher::setFlash('Data', ' berhasil', 'dihapus', 'warning');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            Flasher::setFlash('Data', ' gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function update($Id_Barang)
    {
        if (!$_SESSION["login"]) {
            header('Location: ' . BASEURL . '/loginsystem/login');
            exit;
        }
        $tipe = $this->model('Tipe_model')->findAll();
        $kondisi = $this->model('Kondisi_model')->findAll();
        $dashboard = $this->model('Dashboard_model')->getDashboardbyId($Id_Barang);
        $date = $this->model('Date_model')->waktu();

        $data = [
            'judul' => 'Update Barang',
            'dashboard' => $dashboard,
            'tipe' => $tipe,
            'kondisi' => $kondisi,
            'date' => $date
        ];
        $this->view('templates/header', $data);
        $this->view('dashboard/update', $data);
        $this->view('templates/footer');
    }

    public function change()
    {
        if ($this->model('Dashboard_model')->ubahDashboard($_POST) > 0) {
            Flasher::setFlash('Data', ' berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            Flasher::setFlash('Data', ' gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function cari($halaman = '1')
    {
        $data['judul'] = 'Dashboard';
        $data['halaman'] = $this->model('Dashboard_model')->halaman();
        $data['halamanAktif'] = $this->model('Dashboard_model')->halamanAktif($halaman);
        $data['dashboard'] = $this->model('Dashboard_model')->cariDashboard($halaman);
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
