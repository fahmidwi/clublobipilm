<?php
if (!function_exists('bulan')) {
    function bulan($bulan){
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

if (!function_exists('changeDate')) {
    function changeDate($date) {
        $date = explode('-',$date);
        $tanggal = $date[2];
        $bulan = $date[1];
        $tahun = $date[0];
        $date = $tanggal. " " .bulan($bulan). " ".$tahun;
        return $date;
    }
}
?>