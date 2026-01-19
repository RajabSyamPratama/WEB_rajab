<?php
$a="9";
$b="2.5";
$komentar="selamat datang";
echo ("nilai variabel a adalah = $a <br>");
//variabel bertipe integer
echo ("nilai variabel b adalah = $b <br>");
//variabel.bertipe.real.
echo ("nilai variabel komentar adalah = $komentar<br>");
//variabel bertipe string
//===============================================
//rumus penjualan
$tambah = $a + $b;
//rumus pengurangan
$kurang = $a - $b;
//rumus pembagian
$bagi = $a / $b;
//rumus perkalian
$kali = $a * $b;

echo ("hasil perjualan a dan b adalah =$tambah <br>");
echo ("hasil pengurangan a dan b adalah =$kurang <br>");
echo ("hasil perkalian a dan b adalah =$kali<br>");
echo ("hasil pembagian a dan b adalah =$bagi<br>");
$nama = "eko";
$garis="========================================";
echo "<p>";
echo $garis."<br>";
echo $komentar. "di lab".$nama."<br>selamat belajar pemrograman web <br>";
echo $garis."<br>";
?>