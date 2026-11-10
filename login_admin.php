<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
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
        <h2>LOGIN ADMIN</h2>
        <form action="proses_login_admin.php" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="LOGIN"></td>
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
            $pesan = 'Username dan Password Anda Salah';
        } else if ($error == 'invalid') {
            $pesan = 'Username dan Password Harus Diisi';
        } else if ($error == 'belum_login') {
            $pesan = 'Silakan Login Terlebih Dahulu';
        }

        if ($pesan != '') {
            echo "<p style='color: red; text-align: center; margin-top: 15px;'>$pesan</p>";
        }
        ?>
    </div>
</body>
</html>
