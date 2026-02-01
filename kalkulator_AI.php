<?php
session_start();

// 1. Inisialisasi histori jika belum ada
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}

// 2. Logika hapus histori (Diletakkan di atas agar langsung redirect)
if (isset($_POST['clear_history'])) {
    $_SESSION['history'] = [];
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect setelah hapus
    exit;
}

// 3. Logika Perhitungan (Dipindahkan ke atas agar bisa redirect setelah hitung)
$hasil_display = "Hasil:";
if (isset($_POST['operator'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operator = $_POST['operator'];

    if (is_numeric($angka1) && is_numeric($angka2)) {
        $valid = true;
        if ($operator == '/' && $angka2 == 0) {
            echo "<script>alert('Tidak dapat membagi dengan Nol');</script>";
            $valid = false;
        }

        if ($valid) {
            switch ($operator) {
                case '+': $hasil = $angka1 + $angka2; break;
                case '-': $hasil = $angka1 - $angka2; break;
                case 'x': $hasil = $angka1 * $angka2; break;
                case '/': $hasil = $angka1 / $angka2; break;
                default: $hasil = 0; break;
            }
            
            $format_hasil = "$angka1 $operator $angka2 = $hasil";
            
            // Simpan ke Histori
            array_unshift($_SESSION['history'], $format_hasil);
            
            // Simpan hasil terakhir ke session untuk ditampilkan setelah redirect
            $_SESSION['last_result'] = $format_hasil;
            $_SESSION['raw_result'] = $hasil;

            // REDIRECT untuk mencegah double entry saat refresh
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    } else {
        echo "<script>alert('Input harus berupa angka');</script>";
    }
}

// Ambil hasil dari session untuk ditampilkan
if (isset($_SESSION['last_result'])) {
    $hasil_display = $_SESSION['last_result'];
    $hasil = $_SESSION['raw_result'];
    // Hapus data temporary setelah diambil (opsional, tergantung kebutuhan)
    unset($_SESSION['last_result']);
    unset($_SESSION['raw_result']);
}

// Logika hapus hasil (Reset tombol merah)
if (isset($_POST['resethasil'])) {
    $hasil = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana | UKK RPL 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>.btn { width: 100%; }</style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Kalkulator Sederhana</h2>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" class="p-2 border rounded bg-light">
                <label class="form-label">Angka Pertama</label>
                <input type="number" name="angka1" class="form-control" autocomplete="off" autofocus required 
                value="<?php echo isset($_POST['hasil']) ? $_POST['hasil'] : (isset($hasil) ? $hasil : '') ?>">

                <label class="form-label">Angka Kedua</label>
                <input type="number" name="angka2" class="form-control" required>

                <div class="d-flex justify-content-center gap-2 mt-2">
                    <button type="submit" class="btn btn-primary" name="operator" value="+"><i class="fas fa-plus"></i></button>
                    <button type="submit" class="btn btn-secondary" name="operator" value="-"><i class="fas fa-minus"></i></button>
                    <button type="submit" class="btn btn-success" name="operator" value="x"><i class="fas fa-xmark"></i></button>
                    <button type="submit" class="btn btn-info" name="operator" value="/"><i class="fas fa-divide"></i></button>
                    |
                    <button type="reset" class="btn btn-warning"><i class="fa-solid fa-eraser"></i></button>
                </div>
            </form>

            <div class="p-2 border rounded bg-light">
                <h4 class="text-center"><?php echo $hasil_display; ?></h4>
                <div class="row">
                    <div class="col-6">
                        <?php if(isset($hasil)) : ?>
                        <form method="POST">                             
                            <input type="hidden" name="hasil" value="<?php echo $hasil ?>">
                            <button type="submit" class="btn btn-primary">Hasil</button>
                        </form>
                        <?php endif; ?>
                    </div>
                    <div class="col-6">
                        <?php if(isset($hasil)) : ?>
                        <form method="POST">
                            <button type="submit" name="resethasil" class="btn btn-danger">Hapus</button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="p-3 border rounded bg-white shadow-sm mt-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0"><i class="fa-solid fa-history me-2"></i>Histori Perhitungan</h6>
                    <form method="POST">
                        <button type="submit" name="clear_history" class="btn btn-link btn-sm text-danger p-0 text-decoration-none">Hapus History</button>
                    </form>
                </div>
                <hr class="mt-1">
                <div class="history-box" style="max-height: 200px; overflow-y: auto;">
                    <?php if (empty($_SESSION['history'])): ?>
                        <p class="text-muted text-center small">Belum ada riwayat.</p>
                    <?php else: ?>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($_SESSION['history'] as $item): ?>
                                <li class="list-group-item p-1 border-0 small">• <?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>     
                </div>
            </div>
        </div>
    </div>
</div>

<p class="text-center mt-4 text-muted small"><b>&copy; UKK RPL 2026 | RAJAB SYAM PRATAMA | XII RPL 1</b></p> 
</body>
</html>