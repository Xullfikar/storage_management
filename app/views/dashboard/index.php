<!-- Table -->
<div class="mt-xl-4">
  <h1 class="h2">Data Barang</h1>
  <div class="col-lg-6">
    <?php Flasher::flash() ?>
  </div>
  <hr>
  <div class="table-responsive">
    <table id="dataTables" class="table table-striped display nowrap text-center" style="width:100%">
      <thead class="tableData">
        <tr>
          <th>Nama</th>
          <th>Tipe</th>
          <th>Kondisi</th>
          <th>Tanggal Ditambahkan</th>
          <th>Option</th>
        </tr>
      </thead>

      <tbody>
        <?php $no = 1 ?>
        <?php foreach ($data['dashboard'] as $key) : ?>
          <tr>
            <td><?= $key['Nama']; ?></td>
            <td><?= $key['Tipe']; ?></td>
            <td><?= $key['Kondisi']; ?></td>
            <td><?= $key['Waktu_Ditambahkan']; ?></td>
            <td>
              <button type="button" class="btn btn-primary p-0 text-white text-decoration-none tampilModalDetail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $key['Id_Barang']; ?>" style="width: 50px;">
                detail
              </button>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Table -->

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header warna_navbar">
        <h5 class="modal-title text-center" id="Nama_Barang"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body warna-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-6 mx-auto ">
              <img class="rounded-3" id="Gambar" src="" width="100%">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-3">
              <h6>Tipe </h6>
            </div>
            <div class="col-1">
              <h6>:</h6>
            </div>
            <div class="col">
              <p id="Tipe"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <h6>Kondisi</h6>
            </div>
            <div class="col-1">
              <h6>:</h6>
            </div>
            <div class="col">
              <p id="Kondisi"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <h6>Jumlah</h6>
            </div>
            <div class="col-1">
              <h6>:</h6>
            </div>
            <div class="col">
              <p id="Jumlah"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <h6>User Input</h6>
            </div>
            <div class="col-1">
              <h6>:</h6>
            </div>
            <div class="col">
              <p id="User_Input"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <h6>Tanggal Ditambahkan</h6>
            </div>
            <div class="col-1">
              <h6>:</h6>
            </div>
            <div class="col">
              <p id="Waktu_Ditambahkan"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <h6>Tanggal Terakhir Diubah</h6>
            </div>
            <div class="col-1">
              <h6>:</h6>
            </div>
            <div class="col">
              <p id="Waktu_Diubah"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer tombol_sidebar">
        <div class="row mx-auto">
          <div class="col">

            <a href="" class="text-white text-decoration-none" id="Edit">
              <button type="button" class="btn btn-success p-2" style="width: 50px;">
                <i class="fas fa-edit"></i>
              </button>
            </a>
            <a href="" class="text-white text-decoration-none" id="Delete" onclick="return confirm('Yakin Ingin Menghapus Item Ini ?')">
              <button type="button" class="ms-2 btn btn-danger p-2" style="width: 50px;">
                <i class="fas fa-trash-alt"></i>
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>