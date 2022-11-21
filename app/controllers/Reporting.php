<?php

class Reporting extends Controller
{
  public function index()
  {
    if (!$_SESSION["login"]) {
      header('Location: ' . BASEURL . '/loginsystem/login');
      exit;
    }

    $data['dashboard'] = $this->model('Cetak_model')->print();
    $date = $this->model('Date_model')->waktu();
    $html = '<style> 
         table, th, td {
             border: 1px solid black;
             border-collapse: collapse;
             text-align: center;
         }

         table{
             width: 100%;
         }

         th, td {
             padding-top: 5px;
             padding-bottom: 5px;
         }

         th{
             color: white;
         }

          th:nth-child(even), th:nth-child(odd){
            background-color: #1a374d;
          }

          p{
            margin-top: 7px;
          }
        </style>

        <h1 style="text-align: center;">Inventory barang IT Telkomsel</h1>
        <p>Tanggal Reporting : ' . $date . '</p>
        <br>
        <table>
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Tipe</th>
                <th>Kondisi</th>
                <th>Jumlah</th>
                <th>User Input</th>
                <th>Waktu Ditambahkan</th>
                <th>Waktu Diubah</th>
            </tr>
            </thead>';


    $no = 1;
    foreach ($data['dashboard'] as $key) {
      $html .= '<tr>
          <td>' . $no++ . ' </td>
          <td>' . $key["Nama"] . '</td>
          <td><img src="' . BASEURL . '/img/' . $key['Gambar'] . '" alt="" width="50px"></td>
          <td>' . $key["Tipe"] . '</td>
          <td>' . $key["Kondisi"] . '</td>
          <td>' . $key["Jumlah"] . '</td>
          <td>' . $key["Nama_Lengkap"] . '</td>
          <td>' . $key["Waktu_Ditambahkan"] . '</td>
          <td>' . $key["Waktu_Diubah"] . '</td>
          </tr>';
    }

    $html .= '</table>
        </div>
        </div>';

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->writeHTML($html);
    $mpdf->output();
  }
}
