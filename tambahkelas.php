<?php
    require_once('config.php');
    if(isset($_POST['simpan'])){
        extract($_POST);
        $insert = mysqli_query($conn,"insert into tblkelas values(null,'$nama_kelas','$jurusan')");
        if($insert){
            ?>
            <script>
                alert('simpan berhasil');
                location.href='?hal=tampilkelas';
            </script>
            <?php
        }
    }
?>
        <a href="?hal=tampilkelas">Lihat Data</a><br></br>
        <br>
        <br>
        <form action="?hal=tambahkelas"method="post">
            <table>
                <tr>
                    <td>Nama Kelas</td>
                    <td>
                        <input type="text"name="nama_kelas"placehorder="Nama Kelas"maxlength="20"required>
                    </td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                <td>
                    <select name="jurusan"requered>
                        <option value="">==pilih jurusan==</option>
                        <option values="MP">MP</option>
                        <option value="AK">AK</option>
                        <option value="BD">BD</option>
                        <option value="RPL">RPL</option>
                        <option value="DKV">DKV</option>
                    </select>
                </td>
                <tr>
                <td>
                    <input type="radio"name="jk"value="L"> Laki-Laki    
                    <input type="radio"name="jk" value="P">Perempuan
                </td>
                </tr>
                <tr>
                    <td><button type="submit" name="simpan" value="simpan">Simpan</button></td>
                    <td><button type="reset" name="reset">Reset</button></td>
                </tr>
               </tr>  
        </table>
    </form>