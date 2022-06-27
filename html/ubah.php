<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$id = $_GET['id'];

$ang = query("SELECT * FROM laboratorium WHERE id = $id")[0];

if (!isset($_GET["id"])) {
    // header("Location: index.php");
    echo "error";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
        .container-sm {
            margin-top: 20px;
            /* border: 1px solid; */
        }

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
    <div class="container-sm ms-auto">
        <h1>Ubah data mahasiswa</h1>


        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $ang["id"]; ?>">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleInputName" name="nama" value="<?= $ang["nama"]; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputSemester" class="form-label">Semester</label>
                <input type="text" class="form-control" id="exampleInputSemester" name="semester" value="<?= $ang["semester"]; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputHP" class="form-label">No. HP</label>
                <input type="text" class="form-control" id="exampleInputHP" name="nohp" value="<?= $ang["nohp"]; ?>">
            </div>
            <div class="kondisi">
                <?php if (isset($_POST["submit"])) : ?>
                    <?php if (ubah($_POST) > 0) : ?>
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Mengubah <b><?= $_POST["nama"]; ?></b> berhasil!</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente autem adipisci dolor. Laborum fuga labore perspiciatis, repudiandae corporis ipsam.</p>
                            <hr>
                            <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae, assumenda?</p>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Mengubah gagal!</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente autem adipisci dolor. Laborum fuga labore perspiciatis, repudiandae corporis ipsam repellendus ipsum explicabo distinctio. Earum molestiae illum tempora. Quos, nobis quo.50</p>
                            <hr>
                            <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae, assumenda?</p>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
            <a href="crud.php" class="kembali">
                <button type="button" class="btn btn-danger">Kembali</button>
            </a>
        </form>
    </div>
</body>

</html>