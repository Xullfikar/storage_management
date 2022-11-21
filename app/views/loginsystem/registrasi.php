<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Style -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css" />
    <style>
        ::-webkit-input-placeholder {
            color: white !important;
        }
    </style>

    <title>Daftar</title>
</head>

<body style="background-color: #f5f5f5;">
    <!-- Form register -->
    <section id="login" style="margin-top: 5rem;">
        <div class="container">
            <div class="row text-center">
                <div class="col" style="color: #1A374D;">
                    <h1 class="fw-bold">Daftar</h1>
                </div>
                <div class="mt-3">
                    <?php Flasher::flash() ?>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <form action="<?= BASEURL; ?>/loginsystem/daftar" method="POST">
                        <input type="hidden" value="User" name="Level">
                        <div class="mb-3" style="color: #1A374D; ">
                            <label for="namalengkap" class="form-label">NAMA</label>
                            <input type="text" class="form-control" name="Nama_Lengkap" id="namalengkap" placeholder="*Masukkan Nama Anda" aria-describedby="name" autocomplete="off" style="background-color: #406882; color:white;" required />
                        </div>
                        <div class="mb-3" style="color: #1A374D; ">
                            <label for="username" class="form-label">USERNAME</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="*Masukkan Username Anda" aria-describedby="username" autocomplete="off" style="background-color: #406882; color:white;" required />
                        </div>
                        <div class="mb-3" style="color: #1A374D;"></div>
                        <label for="password" class="form-label">PASSWORD</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="*Masukkan Password Anda " aria-describedby="password" style="background-color: #406882; color: white;" required />
                        <div id="passwordHelpBlock" class="form-text"></div>
                        <div class="mb-3" style="color: #1A374D;"></div>
                        <label for="password2" class="form-label">KONFIRMASI PASSWORD</label>
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="*Masukkan Lagi Password Anda" aria-describedby="password" style="background-color: #406882; color: white;" />
                        <div id="passwordHelpBlock" class="form-text"></div>
                        <div class="float-end mt-5 button" style="color:white;">
                            <button class="btn" name="register" type="submit" style="background-color: #406882; color: white; width: 100px;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir form register -->