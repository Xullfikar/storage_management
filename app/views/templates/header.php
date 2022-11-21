<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title><?= $data['judul']; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap core CSS -->
    <link href="<?= BASEURL; ?>/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

    <!-- Custom styles for this template -->
    <link href="<?= BASEURL; ?>/css/header.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/css/detail.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/css/style.css" rel="stylesheet">



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


</head>

<body>

    <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #406882;">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?= BASEURL; ?>/dashboard"> Stelkit</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <input class="form-control form-control-dark w-100 disabled" type="text" placeholder="Search" aria-label="Search"> -->
        <div class="w-100"></div>
        <div class="dropdown  me-5 ps-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle me-2 fa-2x"></i>
                <strong><?= $_SESSION['user']; ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-light text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/loginsystem/logout">Keluar</a></li>
            </ul>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <?php if ($_SESSION['level'] == "User") : ?>
                            <li class="nav-item">
                                <a class="nav-link tombol-sidebar" aria-current="page" href="<?= BASEURL; ?>/dashboard/user">
                                    <span class="me-2">
                                        <i class="fas fas fa-home "></i>
                                    </span>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tombol-sidebar" aria-current="page" href="<?= BASEURL; ?>/reporting" target="blank">
                                    <span class="me-2">
                                        <i class="fas fas fa-print "></i>
                                    </span>
                                    Report
                                </a>
                            </li>
                        <?php endif ?>
                        <?php if ($_SESSION['level'] == "Admin") : ?>
                            <li class="nav-item">
                                <a class="nav-link tombol-sidebar" aria-current="page" href="<?= BASEURL; ?>/dashboard">
                                    <span class="me-2">
                                        <i class="fas fas fa-tachometer-alt "></i>
                                    </span>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tombol-sidebar" href="<?= BASEURL; ?>/dashboard/tambah">
                                    <span class="me-2">
                                        <i class="fas fa-plus-circle "></i>
                                    </span>
                                    Add Item
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tombol-sidebar" href="<?= BASEURL; ?>/reporting" target="blank">
                                    <span class="me-2">
                                        <i class="fas fa-print "></i>
                                    </span>
                                    Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tombol-sidebar" href="<?= BASEURL; ?>/leveluser">
                                    <span class="me-2">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    User
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">