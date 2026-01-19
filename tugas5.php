<?php
$bln = date("M");
switch($bln)
{
   case "Jan" : $namaBln = "Januari";
   break;
   case "mar" : $namaBln = "maret";
   break;
   case "may" : $namaBln = "mei";
   break;
   case "jul" : $namaBln = "juli";
 break;
   case "agu" : $namaBln = "agustus";
   break;
   case "okt" : $namaBln = "oktober";
   break;
   case "des" : $namaBln = "desember";
$jumlah_hari = 31;
   break;
 case "apr" : $namaBln = "april";
break;
 case "jun" : $namaBln = "juni";
 break;
case "sep" : $namaBln = "septembrt";
  break;
 case "Nov" : $namaBln = "November";
$jumlah_hari = 30;
break;
case "nov". $jumlah_hari = "" .$namaBln = "";
    }
    echo "sekarang bulan : ".$namaBln ;
    echo "<br>hari  ".$jumlah_hari ;

?>