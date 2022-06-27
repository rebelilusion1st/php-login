<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
        form {
            max-width: 540px;
        }

        .kembali {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container-sm mt-5 ms-auto mb-5">

        <h1>Tambah data mahasiswa</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleInputName" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputSemester" class="form-label">Semester</label>
                <input type="text" class="form-control" id="exampleInputSemester" name="semester" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputHP" class="form-label">No. HP</label>
                <input type="text" class="form-control" id="exampleInputHP" name="nohp" required>
            </div>
            <div class="kondisi">
                <?php if (isset($_POST["submit"])) : ?>
                    <?php if (tambah($_POST) > 0) : ?>
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Menambahkan <b><?= $_POST["nama"]; ?></b> berhasil!</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente autem adipisci dolor. Laborum fuga labore perspiciatis, repudiandae corporis ipsam.</p>
                            <hr>
                            <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae, assumenda?</p>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Menambahkan gagal!</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente autem adipisci dolor. Laborum fuga labore perspiciatis, repudiandae corporis ipsam repellendus ipsum explicabo distinctio. Earum molestiae illum tempora. Quos, nobis quo.50</p>
                            <hr>
                            <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae, assumenda?</p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
            <a href="crud.php" class="kembali">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
        </form>

        <!-- <form action="" method="post">
            <label for="nama">Nama : </label>
            <input type="text" name="nama" required id="nM">
            <br>
            <label for="semester">Semester : </label>
            <input type="text" name="semester" id="semester">
            <br>
            <label for="nohp">No. HP : </label>
            <input type="text" name="nohp" id="nohp">
            <br>
            <button type="submit" name="submit">Tambah Data</button>
        </form> -->
    </div>
</body>

</html>