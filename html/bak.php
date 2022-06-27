<?php
require 'functions.php';
$anggota = query("SELECT * FROM laboratorium");
// $id = $_GET["id"];
if (isset($_GET["hapus"])) {
    var_dump($_GET["hapus"]);
    if (hapus($_GET["id"]) > 0) {
        // echo '<script>alert("Berhasil");</script>';
        header('Location: index.php');
        exit;
    } else {
        // echo '<script>alert("Gagal");</script>';
        header('Location: index.php');
        exit;
    }
}

if(isset($_POST["cari"])) {
    $anggota = cari($_POST["keyword"]);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anggota Lab Software Engineer</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
        .container {
            height: 100vh;
        }

        table {
            margin-top: 20px;
            border: 1px solid black;
        }

        .tombol {
            float: left;
        }

        .cari {
            margin-top: 30px;
        }

        .kolom-pencarian {
            max-width: 400px;
            display: inline-block;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="mt-5">Anggota Lab Software Engineer <b>UNPI</b></h1>
        <h4>Tugas CRUD by Muhammad Muslim Abdul Jabbaar</h4>
        <h4>PHP & Bootstrap 5</h4>
        <div class="cari">
            <form action="" method="post">
                <input type="text" name="keyword" class="form-control kolom-pencarian">
                <button type="submit" class="btn btn-primary tombol-cari" name="cari">Cari</button>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Semester</th>
                    <th>No. HP</th>
                    <th>Ubah/Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($anggota as $a) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['semester']; ?></td>
                        <td><?= $a['nohp']; ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $a['id']; ?>">
                                <button type="button" class="btn btn-warning">Ubah</button>
                            </a>
                            <a href="index.php?id=<?= $a['id']; ?>&&hapus=hapus">
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="tombol">
            <a href="tambah.php">
                <button type="button" class="btn btn-success">Tambah Anggota</button>
            </a>
        </div>
    </div>
</body>

</html>