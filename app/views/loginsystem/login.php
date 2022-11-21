<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login || Storage Management</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= BASEURL; ?>/css/loginsystem.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="<?= BASEURL; ?>/loginsystem/masuk" method="POST">
            <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <div class="judul mb-5">
                <h1 class="h2 mb-3 fw-bold">Silahkan Masuk</h1>
            </div>

            <div class="mt-3">
                <?php Flasher::flash() ?>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
                <label class="floatingInputJudul" for="floatingInput">Nama Pegguna</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label class="floatingPasswordJudul" for="floatingPassword">Kata Sandi</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember"> Ingat Saya
                </label>
            </div>
            <div class="tombol">
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">MASUK</button>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2022–2022</p>
        </form>
    </main>



</body>

</html>