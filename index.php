<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
    <center>
    <h2>Rental Motor</h2>
    <form action="" method="post">
            <table>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td><input type="nama" name="nama" id="nama" size="25"></td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (per hari)</td>
                    <td>:</td>
                    <td><input type="waktu" name="waktu" id="waktu" size="25"></td>
                </tr>
                <tr>
                    <td>Jenis Motor</td>
                    <td>:</td>
                    <td>
                        <select name="jenis" id="jenis">
                            <option value="Scooter">Scooter</option>
                            <option value="Sport">Sport</option>
                            <option value="Vespa">Vespa</option>
                            <option value="Cross">Cross</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button name="kirim" type="submit">Submit</button></td>
                </tr>
            </table>
        </form>
        <div style="border: 1px solid black; width: 40%; padding: 10px; margin: 10px;">
            <?php
include "proses.php";
if (isset($_POST["kirim"])) {
    $proses = new Rental();
    $proses->setHarga(70000, 90000, 90000, 100000);
    
    
    if (isset($_POST['nama']) && isset($_POST['waktu']) && isset($_POST['jenis'])) {
        $proses->nama = $_POST['nama'];
        $proses->waktu = $_POST['waktu'];
        $proses->jenis = $_POST['jenis'];
        $proses->cetakPembelian();
    } else {
        echo "<center>Silahkan isi form terlebih dahulu</center>";
    }
}

?>
</center>
</body>
</html>

