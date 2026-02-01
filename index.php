<?php
session_start();

if (!isset($_SESSION['histori'])) {
    $_SESSION['histori'] = [];
}

if (isset($_POST['operator'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operator = $_POST['operator'];

    if (is_numeric($angka1) && is_numeric($angka2)) {
        $n1 = (float)$angka1;
        $n2 = (float)$angka2;

        if ($operator == '/' && $n2 == 0) {
            $_SESSION['error'] = "Tidak dapat membagi dengan Nol";
        } else {
            switch ($operator) {
                case '+': $hasil = $n1 + $n2; break;
                case '-': $hasil = $n1 - $n2; break;
                case 'x': $hasil = $n1 * $n2; break;
                case '/': $hasil = $n1 / $n2; break;
            }
            
            // Format angka ke format Indonesia (koma untuk desimal)
            // format: number_format(angka, jumlah_desimal, pemisah_desimal, pemisah_ribuan)
            $n1_fmt = str_replace('.', ',', (string)$n1);
            $n2_fmt = str_replace('.', ',', (string)$n2);
            $hasil_fmt = str_replace('.', ',', (string)$hasil);
            
            $_SESSION['last_result'] = "$n1_fmt $operator $n2_fmt = $hasil_fmt";
            array_unshift($_SESSION['histori'], $_SESSION['last_result']);
        }
    } else {
        $_SESSION['error'] = "Input harus berupa angka";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['clear_history'])) {
    $_SESSION['histori'] = [];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$tampil_hasil = isset($_SESSION['last_result']) ? $_SESSION['last_result'] : "Hasil : ";
$tampil_error = isset($_SESSION['error']) ? $_SESSION['error'] : null;
unset($_SESSION['last_result']);
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana | UKK RPL 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style type="text/css">
        .btn { width: 100%; }
        .list-histori { max-height: 200px; overflow-y: auto; font-size: 0.9rem; }
    </style>
</head>
<body>
<div class="container mt-5">
   <h2 class="text-center">Kalkulator Sederhana</h2>  
   <div class="row justify-content-center">
    <div class="col-md-4">
        <?php if ($tampil_error): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $tampil_error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST" class="p-2 border rounded bg-light">
            <label class="form-label">Angka Pertama</label>
            <input type="number" step="any" name="angka1" class="form-control" autofocus required>
            
            <label class="form-label">Angka Kedua</label>
            <input type="number" step="any" name="angka2" class="form-control" required>
            
             <div class="d-flex justify-content-center gap-2 mt-2">
                <button type="submit" class="btn btn-primary" name="operator" value="+" title="Tambah"><i class="fas fa-plus"></i></button>
                <button type="submit" class="btn btn-secondary" name="operator" value="-" title="Kurang"><i class="fas fa-minus"></i></button>
                <button type="submit" class="btn btn-success" name="operator" value="x" title="Kali"><i class="fas fa-xmark"></i></button>
                <button type="submit" class="btn btn-info" name="operator" value="/" title="Bagi"><i class="fas fa-divide"></i></button>
                <button type="reset" class="btn btn-warning" title="Hapus"><i class="fa-solid fa-eraser"></i></button>
             </div>
        </form>

         <div class="p-2 border rounded bg-light mt-2">
            <h4 class="text-center"><?php echo $tampil_hasil; ?></h4>
            <hr>
            <div class="mt-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="fw-bold mb-0"><i class="fas fa-history"></i> Histori:</h6>
                    <?php if (!empty($_SESSION['histori'])): ?>
                        <a href="?clear_history=1" class="btn btn-danger btn-sm" style="width: auto; padding: 2px 8px;">
                            <i class="fas fa-trash-can"></i> Hapus Histori  
                        </a>
                    <?php endif; ?>
                </div>
                
                <ul class="list-group list-histori shadow-sm">
                    <?php if (!empty($_SESSION['histori'])): ?>
                        <?php foreach ($_SESSION['histori'] as $h): ?>
                            <li class="list-group-item p-1"><?php echo $h; ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item text-muted text-center small">Belum ada histori</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
   </div>
</div>

<p class="text-center mt-4 text-muted small"> <b> &copy; UKK RPL 2026 | RAJAB SYAM PRATAMA | XII RPL 1 </b> </p> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>