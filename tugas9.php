
<?php
// Membuat array asosiatif dengan nama orang sebagai kunci
$data = [
    "Jack" => 75,
    "Cela" => 85,
    "Morgan" => 78,
    "Ridho" => 83,
];

// Fungsi untuk menampilkan hasil sorting ke bawah menggunakan <br>
function tampilkanHasil(string $namaFungsi, array $data): void {
    echo "<strong>Menggunakan $namaFungsi:</strong><br>";
    foreach ($data as $kunci => $nilai) {
        echo "$kunci: $nilai<br>";
    }
    echo "<br>";
}

// Array asli
tampilkanHasil("Array Asli", $data);

// Mengurutkan berdasarkan nilai (ascending) tanpa mempertahankan kunci
$sorted = $data; // Salin array asli
sort($sorted);
tampilkanHasil("sort()", $sorted);

// Mengurutkan berdasarkan nilai (ascending) dengan mempertahankan kunci
$sorted = $data;
asort($sorted);
tampilkanHasil("asort()", $sorted);

// Mengurutkan berdasarkan nilai (descending) dengan mempertahankan kunci
$sorted = $data;
arsort($sorted);
tampilkanHasil("arsort()", $sorted);

// Mengurutkan berdasarkan kunci (ascending)
$sorted = $data;
ksort($sorted);
tampilkanHasil("ksort()", $sorted);

// Mengurutkan berdasarkan kunci (descending)
$sorted = $data;
krsort($sorted);
tampilkanHasil("krsort()", $sorted);
?>