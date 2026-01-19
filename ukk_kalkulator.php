<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana | UKK RPL 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style type="text/css">
        .btn {
            width: 100%;
        }
    </style>
</head>
<body>
 <div class="container mt-5">
   <h2 class="text-center">kalkulator sederhana</h2>  
   <div class="row justify-content-center">
    <div class="col-md-4">
        <form method="POST" class="p-2 border rounded bg-light">
            <label class="form-label">Angka Pertama</label>
            <input type="number" name="angka1" class="form-control" autocomplete="off" min="0" autofocus
            required onkeypress="return event.charCode >= 48 && event.charCode <= 57"- 
            value="<?php echo isset($_POST['hasil']) ? $_POST['hasil'] : '' ?>">
            <label class="form-label">Angka Kedua</label>
            <input type="number" name="angka2" class="form-control" required>
             <div class="d-flex justify-content-center gap-2 mt-2">
                <button type="submit" class="btn btn-primary" name="operator"
                value="+" title="nambah"><i class="fas fa-plus"></i></button>
                <button type="submit" class="btn btn-secondary" name="operator"
                value="-" title="Kurang"><i class="fas fa-minus"></i></button>
                <button type="submit" class="btn btn-success" name="operator"
                value="*" title="Kali"><i class="fas fa-xmark"></i></button>
                <button type="submit" class="btn btn-info" name="operator"
                value="/" title="Bagi"><i class="fas fa-divide"></i></button>
                
                <button type="reset" name="reset" class="btn btn-warning" value="reset" title="Clear Entry">CE</button>
             </div>
        </form>

         <div class=" p-2 border rounded bg-light ">
            <h4 class="text-center">
              <?php
              if (isset($_POST['operator'])) {
                 $angka1 = $_POST['angka1'];
                 $angka2 = $_POST['angka2'];
                 $operator = $_POST['operator'];

                 if (!is_numeric($angka1) || !is_numeric($angka2)) {
                   echo  "<script>alert('Input harus berupa angka')</script>";
                 }elseif($operator == '/' && $angka2 == 0){
                    echo  "<script>alert('Tidak dapat membagi dengan Nol')</script>";
                 }else{
                    switch ($operator) {
                        case '+':
                            $hasil = $angka1 + $angka2;
                            break;
                        case '-':
                            $hasil = $angka1 - $angka2;
                            break;
                         case '*':
                            $hasil = $angka1 * $angka2;
                             break;
                         case '/':
                            $hasil = $angka1 / $angka2;
                             break; 

                        default:
                            echo "operator tidak valid";
                            break;
                    }
                    echo "$angka1 $operator $angka2 = $hasil";
                 }
              }else{
                echo "Hasil : ";
              }
               ?>
            </h4>


            <div class="row">
                <div class="col-6">
                    <?php if(!empty($hasil)) : ?>
                        <form method="POST">                         
                             <input type="hidden" name="hasil" value="<?php echo $hasil ?>">
                        <button type="submit" class="btn btn-primary" title="Memory Entry">Hasil</button>
                    </form>
                    <?php endif; ?>
                    </div>
                <div class="col-6">
                    <?php if(isset($hasil) && $hasil !== null) : ?>
                        <form method="POST">
                <button type="submit" name="resethasil" class="btn btn-danger" title="Memory Entry">Hapus</button>
                    </form>
                    <?php endif; ?>

            </div>
        </div>
    </div>
   </div>
 </div>

 <p class="text-center"> UKK RPL 2025 RAJAB SYAM PRATAMA RPL 1</p>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</body>
</html>