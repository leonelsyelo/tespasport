<?php
session_start();
include 'koneksi.php';


if (isset($POST['status'])) {
    $nama   = isset($POST['nama']) ? mysqli_real_escape_string($koneksi, trim($POST['nama'])) : '';
    $ukuran = isset($POST['kelas']) ? mysqli_real_escape_string($koneksi, trim($POST['kelas'])) : '';
    $status = isset($POST['status']) ? mysqli_real_escape_string($koneksi, trim($POST['status'])) : '';

    if ($nama != '' && $ukuran != '' && $status != '') {
        $namaproduk = "$nama ($ukuran)";
        $stok_awal  = ($status == 'Ada' || $status == 'READY') ? 10 : 0;
        $harga      = ($nama == 'Sepatu') ? 150000 : 25000;

        mysqli_query($koneksi, "INSERT INTO produk (namaproduk, harga, stok) VALUES ('$namaproduk', '$harga', '$stok_awal')");

        header("Location: data_barang.php");
        exit;
    }
}


if (isset($POST['username']) && isset($POST['password'])) {
    $username = mysqli_real_escape_string($koneksi, trim($POST['username']));
    $password = mysqli_real_escape_string($koneksi, trim($POST['password']));

    if ($username == '' || $password == '') {
        header('Location: login_admin.php?error=invalid');
        exit;
    }

    $data = mysqli_query($koneksi, "SELECT * FROM admin WHERE (username ='$username' OR nama='$username') AND password='$password'");
    $cek  = mysqli_num_rows($data);


    if ($cek == 0) {
        header('Location: login_admin.php?error=login');
        exit;
    }

    $tampil['username'] = $username;
    $tampil['status']   = 'login';
} else if (!isset($tampil['status']) || $tampil['status'] != 'login') {

    header('Location: login_admin.php?error=belum_login');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Input Barang Admin Kasir</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f1f5f9;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            max-width: 400px;
            margin: 40px auto;
        }

        h2 {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            color: black;
            font-size: 18px;
            margin-bottom: 20px;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid #1e3a8a;
        }

        table td {
            padding: 12px 10px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            font-weight: bold;
            font-size: 14px;
        }

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #94a3b8;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .tabel-barang {
            margin: 15px auto;
            border-collapse: separate;
            border-spacing: 0 10px;
            background: transparent;
            border: none;
            box-shadow: none;
            width: 100%;
        }

        .tabel-barang td {
            padding: 0;
            border: none;
        }

        .tabel-barang button {
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            width: 100%;
            padding: 12px 10px;
            transition: all 0.2s;
            border: none;
        }

        .btn-Ada {
            background-color: #dcfce7;
            color: #15803d;
            border: 2px solid #86efac;
        }

        .btn-Ada:hover {
            background-color: #bbf7d0;
        }

        .btn-Kosong {
            background-color: #fee2e2;
            color: #b91c1c;
            border: 2px solid #fca5a5;
        }

        .btn-Kosong:hover {
            background-color: #fecaca;
        }

        .menu-bawah {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn-kembali {
            display: inline-block;
            padding: 6px 14px;
            background-color: #ffffff;
            color: #0062ff;
            text-decoration: none;
            border: 1px solid #94a3b8;
            border-radius: 4px;
            font-size: 13px;
            font-weight: bold;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-kembali:hover {
            background-color: #f1f5f9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>PILIH YANG INGIN DI INPUT BARANGNYA</h2>

        <form action="proses_login_admin.php" method="POST">
            <table>
                <tr>
                    <td>Nama Produk</td>
                    <td>
                        <select name="nama" required>
                            <option value="">Pilih produk</option>
                            <option value="Sepatu">Sepatu</option>
                            <option value="Kaos kaki">Kaos kaki</option>
                            <option value="Sandal">Sandal</option>
                            <option value="Tas">Tas</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ukuran</td>
                    <td>
                        <select name="kelas" required>
                            <option value="">Pilih Ukuran</option>
                            <option value="Kecil SZ (30-38)">Kecil</option>
                            <option value="Besar SZ (39-46)">Besar</option>
                        </select>
                    </td>
                </tr>
            </table>

            <h2>Status Barang :</h2>
            <table class="tabel-barang">
                <tr>
                    <td><button type="submit" name="status" value="Ada" class="btn-Ada">READY</button></td>
                </tr>
                <tr>
                    <td><button type="submit" name="status" value="Kosong" class="btn-Kosong">KOSONG</button></td>
                </tr>
            </table>
        </form>

        <div class="menu-bawah">
            <a href="data_barang.php" class="btn-kembali">CEK DATA</a>
            <a href="logout.php" class="btn-kembali">LOGOUT</a>
        </div>
    </div>
</body>

</html>