<?php

	 function namaBulan($bulan){
        $nama_bulan = array(" ","Januari", "Februari", "Maret","April","Mei", "Juni" , "Juli", "Agustus", "September","Oktober","November", "Desember");
        return $nama_bulan[$bulan];
    }

      function namaBulanSingkat($bulan){
        $bulan = (int)$bulan;
        $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
        return $nama_bulan[$bulan];
    }

     function rupiah($nilai){
        return number_format($nilai, "0", ",", ".");
    }

      function cuttext($text){
        if (strlen($text)> 70){
            return substr($text, 0,70)."...";
        }else{
            return $text;
        }
    }

     function cuttext50($text){
        if (strlen($text)> 50){
            return substr($text, 0,50)."...";
        }else{
            return $text;
        }
    }

    function cuttext120($text){
        if (strlen($text)> 120){
            return substr($text, 0,120)."...";
        }else{
            return $text;
        }
    }
    function generate_url($text){
        $text = strtolower(trim($text));
        $txt = str_replace(" ","-",$text);
        return $txt;
    }

     function tanggalIndo($tgl_en){
        $tgl = explode("-", $tgl_en);
        return $tgl[2]."/".$tgl[1]."/".$tgl[0];
    }

     function tanggalSystem($tgl_en){
        $tgl = explode("/", $tgl_en);
        return $tgl[2]."-".$tgl[1]."-".$tgl[0];
    }

    function timestamp_indo($timestamp){
        $timestamp = trim($timestamp);
        $time = explode(" ", $timestamp);
        $tanggal = explode("-", $time[0]);
        $jam = $time[1];
        $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
        return $tanggal[2]." ".$nama_bulan[(int)$tanggal[1]]. " ". $tanggal[0] ." ". $jam;
    }

     function tanggal_singkat_indo($date){
        $date = explode("-", $date);
        $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
        return $date[2]." ".$nama_bulan[(int)$date[1]]. " ". $date[0];
    }

    function tanggal_indo2($date){
         $date = explode("-", $date);
         $nama_bulan = array(" ","Januari", "Februari", "Maret","April","Mei", "Juni" , "Juli", "Agustus", "September","Oktober","November", "Desember");
        return $date[2]." ".$nama_bulan[(int)$date[1]]. " ". $date[0];
    }

    function get_tanggal($date){
            $date = explode("-", $date);
            return $date[2];
    }

    function tanggal_timestamp($date){
        $date2 = explode(" ", $date);
        $date = explode("-", $date2[0]);
        $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
        return $date[2]." ".$nama_bulan[(int)$date[1]]. " ". $date[0];
    }

    function get_bulan($date){
            $date = explode("-", $date);
            $bulan = (int) $date[1];
            $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
            return $nama_bulan[$bulan];
    }

     function bulantahun($date){
            $date = explode("-", $date);
            $bulan = (int) $date[1];
            $tahun = (int) $date[0];
             $nama_bulan = array(" ","Januari", "Februari", "Maret","April","Mei", "Juni" , "Juli", "Agustus", "September","Oktober","November", "Desember");
            return $nama_bulan[$bulan] . " ". $tahun;
    }

    function tanggalSystemAwalBulan($tgl){
        $tgl = explode("/", $tgl);
        return $tgl[2]."-".$tgl[1]."-01";
    }

    function tanggalSystemAkhirBulan($tgl){
        $tgl = explode("/", $tgl);
        $a_date = $tgl[2]."-".$tgl[1]."-".$tgl[0];
        
        return  date("Y-m-t", strtotime($a_date));
    }

    function removeTags($string){
        return strip_tags($string,"<br>");
    }

    function bulantanggal($date){
            $date = explode("-", $date);
            $bulan = (int) $date[1];
             $nama_bulan = array(" ","Januari", "Februari", "Maret","April","Mei", "Juni" , "Juli", "Agustus", "September","Oktober","November", "Desember");
            return $nama_bulan[$bulan];
    }


    function tanggal_indo3($date){
         $date = explode("-", $date);
         $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
        return $date[2]." ".$nama_bulan[(int)$date[1]];
    }

    function tanggal_sampai_dengan($date1, $date2){
        $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
        if($date1==$date2){
            $date1 = explode("-", $date1);
            return $date1[2]." ".$nama_bulan[(int)$date1[1]];
        }else{
            $date1 = explode("-", $date1);
            $date2 = explode("-", $date2);
            return $date1[2]." ".$nama_bulan[(int)$date1[1]]." s.d ".$date2[2]." ".$nama_bulan[(int)$date2[1]] ;
        }
    }

    function tanggal_indo4($date){
         $date = explode("-", $date);
         $nama_bulan = array(" ","01", "02", "03","04","05", "06" , "07", "08", "09","10","11", "12");
        return "<small>".$date[2]."/".$nama_bulan[(int)$date[1]]."</small>";
    }


    function terbilang($x)
    {
      $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
      if ($x < 12)
        return " " . $abil[$x];
      elseif ($x < 20)
        return Terbilang($x - 10) . " Belas";
      elseif ($x < 100)
        return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
      elseif ($x < 200)
        return " Seratus" . Terbilang($x - 100);
      elseif ($x < 1000)
        return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
      elseif ($x < 2000)
        return " Seribu" . Terbilang($x - 1000);
      elseif ($x < 1000000)
        return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
      elseif ($x < 1000000000)
        return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
    }


    function URLGroup($route=""){
        $prefix =session('app.group');
        $route = trim($route);
        if($route){
            return URL::to($prefix."/".$route);
        }
        return URL::to($prefix);
    }
    
