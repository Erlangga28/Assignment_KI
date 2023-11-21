<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "db_masyarakat");


function isAdmin()
{
        if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
                return true;
        }else{
                return false;
        }
}
// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}


// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $nik = htmlspecialchars($data['nik']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $gol_darah = htmlspecialchars($data['gol_darah']);
    

    $sql = "INSERT INTO masyarakat(nik, nama, alamat, gol_darah) VALUES ('$nik','$nama','$alamat','$gol_darah')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($nik)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM masyarakat WHERE nik = $nik");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $nik = htmlspecialchars($data['nik']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $gol_darah = htmlspecialchars($data['gol.darah']);
    

    $sql = "UPDATE masyarakat SET nama = '$nama', alamat = '$alamat', gol.darah = '$gol_darah' WHERE nik = $nik";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

