<?php

$mahasiswa = [
    "Ahmad" => 85,
    "Budi" => 92,
    "Citra" => 78,
    "Dewi" => 88,
    "Eko" => 80
];

echo "Array Asli:<br>";
foreach ($mahasiswa as $nama => $nilai) {
    echo "$nama: $nilai<br>";
}
echo "<br>";

echo "Urutkan berdasarkan nilai (asort):<br>";
asort($mahasiswa);
foreach ($mahasiswa as $nama => $nilai) {
    echo "$nama: $nilai<br>";
}
echo "<br>";

echo "Urutkan berdasarkan nilai (arsort):<br>";
arsort($mahasiswa);
foreach ($mahasiswa as $nama => $nilai) {
    echo "$nama: $nilai<br>";
}
echo "<br>";

echo "Urutkan berdasarkan kunci (ksort):<br>";
ksort($mahasiswa);
foreach ($mahasiswa as $nama => $nilai) {
    echo "$nama: $nilai<br>";
}
echo "<br>";

echo "Urutkan berdasarkan kunci (krsort):<br>";
krsort($mahasiswa);
foreach ($mahasiswa as $nama => $nilai) {
    echo "$nama: $nilai<br>";
}
echo "<br>";


echo "Urutkan nilai tanpa mempertahankan kunci (sort):<br>";
$nilai = array_values($mahasiswa);
sort($nilai);
foreach ($nilai as $val) {
    echo "$val<br>";
}
echo "<br>";

echo "Urutkan nilai tanpa mempertahankan kunci (rsort):<br>";
$nilai = array_values($mahasiswa);
rsort($nilai);
foreach ($nilai as $val) {
    echo "$val<br>";
}
echo "<br>";
?>
