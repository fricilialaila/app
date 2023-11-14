<?php
    require_once('config.php');

    if(isset($_POST['update'])){
        extract($_POST);
        $update = mysqli_query($conn,"update tblsiswa set nis='$nis',nisn='$nisn',nama_siswa='$nama',alamat='$alamat', jk='$jk' where id=$id");
        if($update){
            ?>
            <script>
                alert('simpan berhasil')
                location.href='?hal=tampil';
            </script>
                <?php
        }else{
            echo"<script>alert('update GAGAL'</script>";
            header("location:?hal=tampil");
        }
    }
$id = isset($_GET['id'])?$_GET['id']:"";
if($id == ""){
    echo "<script>alert('data tidak ditemukan');location.href=?hal=tampil';</script>";
}else{
    $query = mysqli_query($conn,"select * from tblsiswa where id=$id");
    $baris = mysqli_fetch_array($query);
}
?>
<html>
    <head>
        <title>Edit Data</title>
    </head>
    <body>
        <a href="?hal=tampil">Lihat Data</a>
        <br>
        <br>
        <form action="?hal=edit" method="post">
            <table>
                <input type="hidden" name="id" value="<?=$baris['id']?>">
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="nis" placehorder="Nomor Induk Siswa" maxlength="20"value="<?=$baris['nis']?>"></td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td><input type="text" name="nisn" placehorder="Nomor Induk Siswa Nasional"maxlength="10"value="<?=$baris['nisn']?>"></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td><input type="text" name="nama"placehorder="Nama siswa"maxlength="50"value="<?=$baris['nama_siswa']?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"placehorder="Alamat" value="<?=$baris['alamat']?>"></td>
                </tr>  
                <tr>
                    <td>HP</td>
                    <td><input type="text" name="hp"placehorder="Nomor HP" maxlength="15"value="<?=$baris['hp']?>"></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>
                        <select name="agama">
                        <option <?=$baris['agama']=='islam'?'selected':''?> value="islam">Islam</option>
                        <option <?=$baris['agama']=='kristen'?'selected':''?> value="kristen">Kristen</option>
                        <option <?=$baris['agama']=='katholik'?'selected':''?> value="katholik">Katholik</option>
                        <option <?=$baris['agama']=='hindu'?'selected':''?> value="hindu">Hindu</option>
                        <option <?=$baris['agama']=='budha'?'selected':''?> value="budha">Budha</option>
                        <option <?=$baris['agama']=='konghucu'?'selected':''?> value="konghucu">Konghucu</option>
                        </select>       
                    </td>
                </tr>
                <tr>
                <td>Jenis kelamin</td>
                <td>
                    <input <?=$baris['jk']=='L'?'checked':''?> type="radio" name="jk" value="L">laki-Laki 
                    <input <?=$baris['jk']=='p'?'checked':''?> type="radio" name="jk" value="p">Perempuan 
                </td>
                <tr>
                    <td><button type="submit" name="update" value="update">Update</button></td>
                    <td></td>
                </tr>
            </tr>
            </tr>
        </table>
    </form>
    </body>
</html>