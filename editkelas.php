<?php
    require_once('config.php');
    //ini proses select data
    $id = isset($_GET['id'])?$_GET['id']:"";
    if($id == ""){
        echo "<script>alert('data tidak ditemukan');location.href=?hal=tampilkelas';</script>";
    }else{
        $query = mysqli_query($conn,"select * from tblkelas where idkelas=$id");
        $baris = mysqli_fetch_array($query);
    }
    //ini proses update data
    if(isset($_POST['update'])){
        extract($_POST);
        $update = mysqli_query($conn,"update tblkelas set nama_kelas='$nama_kelas',jurusan='$jurusan' where idkelas=$id");
        if($update){
            ?>
            <script>
                alert('simpan berhasil')
                location.href='?hal=tampilkelas';
            </script>
                <?php
        }else{
            echo"<script>alert('simpan GAGAL'</script>";
            header("location:?hal=tampilkelas");
        }
    }
?>
<html>
    <head>
        <title>Edit Data</title>
    </head>
    <body>
        <a href="?hal=tampilkelas">Kembali ke Tampil Kelas</a>
        <br>
        <br>
        <form action="?hal=editkelas" method="post">
            <table>
                <input type="hidden" name="id" value="<?=$baris['idkelas']?>">
                <tr>
                    <td>Nama Kelas</td>
                    <td><input type="text" name="nama_kelas" placehorder="Nama Kelas" maxlength="10"value="<?=$baris['nama_kelas']?>"required></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>
                        <select name="jurusan"required>
                        <option <?=$baris['jurusan']=='MP'?'selected':''?> value="MP">MP</option>
                        <option <?=$baris['jurusan']=='AK'?'selected':''?> value="AK">AK</option>
                        <option <?=$baris['jurusan']=='BD'?'selected':''?> value="BD">BD</option>
                        <option <?=$baris['jurusan']=='RPL'?'selected':''?> value="RPL">RPL</option>
                        <option <?=$baris['jurusan']=='DKV'?'selected':''?> value="DKV">DKV</option>
                        </select>       
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="update" value="simpan">Simpan</button>
                    </td>
                    <td>
                        <button type="reset">Reset</button>
                    </td>
                </tr>
            </tr>
            </tr>
        </table>
    </body>
</html>