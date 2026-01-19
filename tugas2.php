<h4>Menghitung Nilai</h4>
<form method="post">
    <input type="number" name= "r" placeholder="Masukan nilai R"> <br> <br>
    <input type = "number" name="s" placeholder="Masukkan Nilai S"> <br> <br>
<label for="Pilihan">Pilih Operasi Yang Diinginkan: </label> <br>
<select name="operasi" id="operas">
<option value="LuasAlas"> Luas Alas </option>
<option value="LuasPermukaan"> Luas Permukaan </option>
<option value="keduanya"> Keduanya </option>
</select> <br> <br>
<input type="submit" name="submit" value="Tampilkan Data"> <br>
</form>
<?php
if(isset($_POST['submit'])){
$r = $_POST['r'];
$s=$_POST['s'];
$operasi = $_POST['operasi'];
$pi = "3.14";
$garis = "============================";
$luasAlas = $pi * $r * $r;
$luasPermukaan = $luasAlas + ($pi * $r * $s);

echo "Nilai Pi adalah $pi <br>";
echo "Nilais adalah = $s <br>";

echo ($garis . "<br>");
    if($operasi=="LuasAlas") {
        echo "jadi luas alas nya adalah = $luasAlas <br>";

    }
    elseif ($operator=="luaspermukaan") {
        echo "jadi luas permukaan adalah = $luasPermukaan <br>";

    }
    else {
        echo "jadi luas alasnya adalah = $luasAlas <br>";
        echo "jadi luas permukaan adalah = $luasPermukaan <br>";
    }
    echo ($garis);
}
?>