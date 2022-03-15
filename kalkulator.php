<?php
    //Belajar membuat kalkulator dengan php
    //tampung inputan textfield ke dalam variabel
    $angka1 = @$_POST['tangka1'];
    $angka2 = @$_POST['tangka2'];
    $hasil = @$_POST['hasil'];

    //uji jika tombol tambah diklik
    if(isset($POST['btambah']))
    {
        $hasil = $angka1 + $angka2;

    }


?>

<!DOCTYPE html>
<html>
<head>
    <title> Belajar membuat kalkulator sederhan</title>
<head>
<body>

<form method="post">
    <table align="center" border="1">
        <tr>
            <td colspan="3" bgcolor="yellow">kalkulator sederhana</td>
        </tr>
        <tr>
            <td colspan="3"> <hr> </td>
        </tr>
        <tr>
            <td>Angka 1</td>
            <td>:</td>
            <td>
                <input type="text" name="tangka1"> 
            </td>
        </tr>
        <tr>
            <td>Angka 2</td>
            <td>:</td>
            <td>
                <input type="text" name="tangka2">
            </td>
         </tr>
         <tr>
            <td></td>
            <td></td>
            <td>
                <input type="submit" name="btambah" value="+">
                <input type="submit" name="bkurang" value="-">
                <input type="submit" name="bkali" value="*">
                <input type="submit" name="bbagi" value="/">
            </td>
        </tr>
        <tr>
            <td>Hasil</td>
            <td>:</td>
            <td>
                <input type="text" name="thasil" value="<?=$hasil?">
            </td>
            </td>
        </tr>
        <tr>
            <td colspan="3"> <hr> </td>
        </tr>
    </table>
</form>


</body>
</html>