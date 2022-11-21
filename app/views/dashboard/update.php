<!-- Main content -->
<section class="content">
    <div class="row mt-5 mb-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data</h3>
                </div>
                <form action="<?= BASEURL; ?>/dashboard/change" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="Id_Barang" id="Id_Barang" value="<?= $data['dashboard']['Id_Barang']; ?>">
                    <input type="hidden" name="Gambar_Lama" id="Gambar" value="<?= $data['dashboard']['Gambar']; ?>">
                    <input type="hidden" name="Waktu_Ditambahkan" id="Waktu_Ditambahkan" value="<?= $data['dashboard']['Waktu_Ditambahkan']; ?>">
                    <input type="hidden" name="Waktu_Diubah" id="Waktu_Diubah" value="<?= $data['date']; ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Nama">Nama Barang</label>
                            <input type="text" id="Nama" name="Nama" autocomplete="off" class="form-control mt-2" value="<?= $data['dashboard']['Nama']; ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label for="Gambar">Gambar Barang</label>
                            <img src="<?= BASEURL; ?>/img/<?= $data['dashboard']['Gambar']; ?>" class="img-thumbnail rounded-3 mx-auto d-block" style="width: 200px;" alt="Gambar Belum Ada">
                            <div class=" mt-3">
                                <input type="file" class="form-control" id="Gambar" name="Gambar" />
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="Id_Tipe">Tipe Barang</label>
                            <div class="mt-2">
                                <select class="form-select" aria-label="Default select example" id="Id_Tipe" name="Id_Tipe">
                                    <option hidden></option>
                                    <?php foreach ($data['tipe'] as $key) : ?>
                                        <option value="<?= $key['Id_Tipe'] ?>" <?= $data['dashboard']['Id_Tipe'] == $key['Id_Tipe'] ? 'selected' : null; ?>>
                                            <?= $key['Tipe']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="Id_Kondisi">Kondisi Barang</label>
                            <div class="mt-2">
                                <select class="form-select" aria-label="Default select example" id="Id_Kondisi" name="Id_Kondisi">
                                    <option hidden></option>
                                    <?php foreach ($data['kondisi'] as $key) : ?>
                                        <option value="<?= $key['Id_Kondisi'] ?>" <?= $data['dashboard']['Id_Kondisi'] == $key['Id_Kondisi'] ? 'selected' : null; ?>>
                                            <?= $key['Kondisi']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="Jumlah">Jumlah Barang</label>
                            <input type="number" id="Jumlah" name="Jumlah" min="0" class="form-control mt-2" value="<?= $data['dashboard']['Jumlah']; ?>">
                        </div>
                        <div class="mt-3 d-flex justify-content-between align-item-center">
                            <a href="<?= BASEURL; ?>/dashboard" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="Save new Data" class="btn btn-success">
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