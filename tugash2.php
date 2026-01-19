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

echo "Cek apakah kunci 'Budi' ada di array:<br>";
if (array_key_exists("Budi", $mahasiswa)) {
    echo "Kunci 'Budi' ditemukan!<br>";
} else {
    echo "Kunci 'Budi' tidak ditemukan!<br>";
}
echo "<br>";

echo "Cari kunci dari nilai 88:<br>";
$kunci = array_search(88, $mahasiswa);
if ($kunci !== false) {
    echo "Nilai 88 ditemukan pada kunci: $kunci<br>";
} else {
    echo "Nilai 88 tidak ditemukan!<br>";
}
echo "<br>";


echo "Gabungkan nama dan nilai menjadi array baru:<br>";
$nama_mahasiswa = ["Fajar", "Gita", "Hadi"];
$nilai_mahasiswa = [75, 89, 90];
$mahasiswa_baru = array_combine($nama_mahasiswa, $nilai_mahasiswa);
foreach ($mahasiswa_baru as $nama => $nilai) {
    echo "$nama: $nilai<br>";
}
echo "<br>";


echo "Ambil 3 elemen pertama dari array:<br>";
$mahasiswa_slice = array_slice($mahasiswa, 0, 3, true);
foreach ($mahasiswa_slice as $nama => $nilai) {
    echo "$nama: $nilai<br>";
}
echo "<br>";


echo "Selisih nilai antara array awal dan array tambahan:<br>";
$nilai_tambahan = [92, 88, 75];
$nilai_beda = array_diff(array_values($mahasiswa), $nilai_tambahan);
foreach ($nilai_beda as $beda) {
    echo "$beda<br>";
}
echo "<br>";
?>
