<table class="table table-striped table-bordered text-center table-sm">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Kondisi</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1 ?>
        <?php foreach ($data['dashboard'] as $key) : ?>
            <tr>
                <th><?= $no++; ?></th>
                <td><?= $key['Nama']; ?></td>
                <td><?= $key['Tipe']; ?></td>
                <td><?= $key['Kondisi']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary p-0 text-white text-decoration-none tampilModalDetail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $key['Id_Barang']; ?>" style="width: 50px;">
                        detail
                    </button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>