<?php
    include_once('config.php');
    $id = isset($_GET['id'])?$_GET['id']:"";
    if($id != ""){
        $sel = mysqli_query($conn,"select * from tbuser where iduser=$id");
        $data = mysqli_fetch_array($sel); 
    }
    if(isset($_POST['simpan'])){
        extract($_POST);
        if($password1 != "" && $password2 != ""){
            if($password1 == $password2){
                //update data
    
                $pass = password_hash($password1,PASSWORD_DEFAULT);
                $up = mysqli_query($conn, "update tbuser set nama_user='$nama',user='$user', password='$pass' where iduser=$iduser");
            }else{
                echo "<script>aleret('update gagal, password tidak sama');location.href='?hal=tampiluser';</script>";
            }
        }else{
            $up = mysqli_query($conn, "update tbuser set nama_user='$nama', user='$user' where iduser=$iduser");
        }
        if($up){

            echo "<script>alert('update berhasil');location.href='?hal=tampiluser'</script>";
        }
    }
?>

<form action="?hal=edituser" method="post">
    <table>
        <input type="hidden" name="iduser" value="<?=$data['iduser']?>">
        <tr>
            <td>Nama User</td>
            <td>
                <input type="text" name="nama" placehorder="Nama User" required value="<?=$data['nama_user']?>">
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="user" placehorder="User" required value="<?=$data['user']?>">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td> 
                <input type="password" name="password1" placehorder="password" >
            </td>      
        </tr>
        <tr>
            <td>konfirmasi password</td>
            <td>
                <input type="password" name="password2" placehorder="password">
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="simpan" value="simpan">Simpan</button>
            </td>
            <td>
                <button type="reset">Reset</button>
            </td>
        </tr>
    </table>
</form>