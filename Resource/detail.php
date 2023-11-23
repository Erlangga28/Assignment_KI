<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika Data Mahasiswa diklik maka
if (isset($_POST['dataPeople'])) {
    $output = '';

    // mengambil data Mahasiswa dari nim 
    $sql = "SELECT * FROM masyarakat WHERE nik = '" . $_POST['dataPeople'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '
                        <tr>
                            <th width="40%">NIK</th>
                            <td width="60%">' . $row['niK'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Alamat</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Gol.Darah</th>
                            <td width="60%">' . $row['gol_darah'] . '</td>
                        </tr>
                        
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
