<!DOCTYPE html>
<html>

<head>
    <title>Edit Barang</title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            padding: 20px;
            max-width: 400px;
            margin: 50px auto;
            text-align: center;
        }

        h2 {
            color: black;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            margin: 0 auto;
        }

        table td {
            padding: 5px;
            text-align: left;
        }

        .btn-kembali {
            display: inline-block;
            margin-top: 15px;
            padding: 5px 12px;
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
        <h2>EDIT DATA BARANG</h2>

        <?php
        include 'koneksi.php';
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE idProduk='$id'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
            <form action="ubah.php" method="POST">
                <input type="hidden" name="idProduk" value="<?php echo $d['idProduk']; ?>">
                <table>
                    <tr>
                        <td>Nama Produk</td>
                        <td><input type="text" name="namaproduk" value="<?php echo ($d['namaproduk']); ?>" required></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="number" name="harga" value="<?php echo ($d['harga']); ?>" required></td>
                    </tr>
                    <tr>
                        <td>Jumlah Produk</td>
                        <td><input type="number" name="stok" value="<?php echo ($d['stok']); ?>" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="UPDATE"></td>
                    </tr>
                </table>
                <br>
                <a href="data_barang.php" class="btn-kembali">KEMBALI</a>
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>

