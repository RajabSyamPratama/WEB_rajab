<?php
$nilai = 78;
if($nilai >= 90 && $nilai <=100){
    $keterangan = "A - Baik Sekali";
} elseif ($nilai >= 76 && $nilai <= 89) {
    $keterangan = "B - Baik";
} elseif ($nilai >= 60 && $nilai <= 75) {
    $keterangan = "C - Cukup";
} elseif ($nilai >= 50 && $nilai <= 59) {
    $keterangan = "D - Hampir Cukup";
} elseif($nilai  <= 49) {
    $keterangan = "E - Kurang";
} else{
    $keterangan = "Nilai Sangat Kurang";
}
echo "nilai; $nilai, keterangan $keterangan";
?>