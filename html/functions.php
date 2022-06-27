<?php
$db = "labkom";
$host = "localhost";
$user = "root";
$passwd = "";
$conn = mysqli_connect($host, $user, $passwd, $db);

function query($query)
{
    global $conn;
    // ambil data dari tabel mahasiswa / query data mahasiswa
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $semester = htmlspecialchars($data["semester"]);
    $nohp = htmlspecialchars($data["nohp"]);

    $query = "INSERT INTO laboratorium VALUES (NULL, '$nama', '$semester', '$nohp')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM laboratorium WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $semester = htmlspecialchars($data["semester"]);
    $nohp = htmlspecialchars($data["nohp"]);

    $query = "UPDATE laboratorium SET nama = '$nama', semester = '$semester', nohp = '$nohp' WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM laboratorium WHERE nama LIKE '%$keyword%' OR semester LIKE '%$keyword%' OR nohp LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data) {
    global $conn;
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek apakah username tersedia
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "
        <script>alert('user sudah terdaftar');</script>
        ";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>alert('konfirmasi password tidak sesuai');</script>
        ";
        return false;
    }

    // enskripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    // masukkan username ke database
    mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$username', '$password')");

    mysqli_affected_rows($conn);

}