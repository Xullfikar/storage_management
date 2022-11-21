<!-- Table -->
<div class="mt-xl-4">
    <h1 class="h2">Data User</h1>
    <div class="col-lg-6">
        <?php Flasher::flash() ?>
    </div>
    <hr>
    <div class="table-responsive">
        <table id="dataTables" class="table table-striped display nowrap text-center" style="width:100%">
            <thead class="tableData">
                <tr>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($data['leveluser'] as $key) : ?>
                    <tr>
                        <td><?= $key['Nama_Lengkap']; ?></td>
                        <td><?= $key['username']; ?></td>
                        <td><?= $key['Level']; ?></td>
                        <td>
                            <form action="<?= BASEURL; ?>/leveluser/update" method="POST">
                                <input type="hidden" value="<?= $key['Id_User']; ?>" name="Id_User">
                                <?php if ($key['Level'] == "Admin") : ?>
                                    <input type="hidden" value="User" name="Level">
                                    <button type="submit" class="btn btn-outline-warning" onclick="return confirm('Yakin Ingin mengubah Admin menjadi User?')">
                                        Jadikan User Biasa
                                    </button>
                                <?php endif ?>
                                <?php if ($key['Level'] == "User") : ?>
                                    <input type="hidden" value="Admin" name="Level">
                                    <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Yakin Ingin mengubah User menjadi Admin?')">
                                        Jadikan Admin
                                    </button>
                                <?php endif ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Table -->