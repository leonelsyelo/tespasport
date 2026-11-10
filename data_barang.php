<!DOCTYPE html>
<html>

<head>
    <title>Data Barang</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            padding: 20px;
            max-width: 650px;
            margin: 40px auto;
            text-align: center;
        }

        h2 {
            color: black;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn-tambah {
            display: inline-block;
            margin-bottom: 15px;
            padding: 6px 12px;
            background-color: #f8efef;
            color: black;
            text-decoration: none;
            border: 1px solid #999;
            border-radius: 3px;
            font-size: 13px;
        }

        .btn-tambah:hover {
            background-color: #ddd;
        }

        table {
            margin: 15px auto;
            border-collapse: collapse;
            width: 100%;
        }

        table th,
        table td {
            border: 1px solid #999;
            padding: 8px 10px;
            text-align: center;
            font-size: 14px;
        }

        table th {
            background-color: #eee;
        }

        .btn-kembali {
            display: inline-block;
            margin-top: 15px;
            padding: 6px 14px;
            background-color: #f8efef;
            color: black;
            text-decoration: none;
            border: 1px solid #999;
            border-radius: 3px;
            font-size: 13px;
        }

        .btn-kembali:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>DATA BARANG</h2>
        <a href="tambah.php" class="btn-tambah">+ Tambah Barang</a>
        <div style="clear: both;"></div>

        <table>
            <tr>
                <th>NO</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah Produk</th>
                <th>Tindakan</th>
            </tr>
            <?php
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($d['namaproduk']); ?></td>
                    <td>Rp <?php echo number_format($d['harga'], 0, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($d['stok']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $d['idProduk']; ?>">Edit</a> |
                        <a href="hapus.php?id=<?php echo $d['idProduk']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <a href="proses_login_admin.php" class="btn-kembali">KEMBALI</a>
    </div>
</body>

</html>
