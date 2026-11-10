<!DOCTYPE html>
<html>

<head>
    <title>Login Pelanggan</title>
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
            text-align: center;
            font-size: 20px;
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
        <h2>LOGIN PELANGGAN</h2>
        <form action="proses_login_pelanggan.php" method="POST">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td>No Telephone</td>
                    <td><input type="number" name="nomer"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Masuk"></td>
                </tr>
            </table>
            <br>
            <a href="home.html" class="btn-kembali">KEMBALI</a>
        </form>

        <?php
        $error = '';
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        }

        $pesan = '';

        if ($error == 'login') {
            $pesan = 'Data yang Anda masukkan salah';
        } else if ($error == 'invalid') {
            $pesan = 'Nama, Alamat, dan No Telephone harus diisi!';
        }

        if ($pesan != '') {
            echo "<p style='color: red; text-align: center; margin-top: 15px;'>$pesan</p>";
        }
        ?>
    </div>
</body>

</html>
