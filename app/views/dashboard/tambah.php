<!-- Main content -->
<section class="content">
  <div class="row mt-5 mb-5">
    <div class="col-md-6 mx-auto">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Data</h3>
        </div>
        <div class="mt-3">
          <!-- Flasher -->
          <?php Flasher::flash() ?>
          <!-- Flasher -->
        </div>
        <form action="<?= BASEURL; ?>/dashboard/simpan" method="post" enctype="multipart/form-data">
          <input type="hidden" name="Waktu_Ditambahkan" id="Waktu_Ditambahkan" value="<?= $data['date']; ?>">
          <input type="hidden" name="Waktu_Diubah" id="Waktu_Diubah" value="<?= $data['date']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label for="Nama">Nama Barang</label>
              <input type="text" id="Nama" name="Nama" autocomplete="off" class="form-control mt-2">
            </div>
            <div class="form-group mt-2">
              <label for="Gambar">Gambar Barang</label>
              <div class="mt-2">
                <input type="file" class="form-control mt-2" id="Gambar" name="Gambar" />
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="Id_Tipe">Tipe Barang</label>
              <div class="col sm-8 mt-2">
                <select class="form-select" aria-label="Id_Tipe" id="Id_Tipe" name="Id_Tipe">
                  <option value="" hidden></option>
                  <?php foreach ($data['tipe'] as $key) : ?>
                    <option value="<?= $key['Id_Tipe'] ?>"><?= $key['Tipe'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="Id_Kondisi">Kondisi Barang</label>
              <div class="col sm-8 mt-2">
                <select class="form-select" aria-label="Id_Kondisi" id="Id_Kondisi" name="Id_Kondisi">
                  <option value="" hidden></option>
                  <?php foreach ($data['kondisi'] as $key) : ?>
                    <option value="<?= $key['Id_Kondisi'] ?>"><?= $key['Kondisi'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="Jumlah">Jumlah Barang</label>
              <input type="number" id="Jumlah" name="Jumlah" min="0" class="form-control mt-2">
            </div>
            <div class="mt-3 d-flex justify-content-between align-item-center">
              <a href="<?= BASEURL; ?>/dashboard" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="Create new Data" class="btn btn-success">
            </div>
          </div>
          <!-- /.card-body -->
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
<!-- /.content -->