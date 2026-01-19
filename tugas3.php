<?php
$jumlah_lembar = 158;
$biaya = 100;
if ($jumlah_lembar < 100) {
    $biaya = $jumlah_lembar * 150;
} elseif ($jumlah_lembar >= 100 && $jumlah_lembar <= 200) {
    $biaya = $jumlah_lembar * 100;
} else {
    $biaya = $jumlah_lembar * 100;
}
echo "Biaya fotocopy adalah Rp. " . $biaya;
?>