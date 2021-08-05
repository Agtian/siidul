<?php 

	function formatNamaBulan($bulan) {
	 
		switch($bulan){
			case '1':
				$formatNamaBulan = "Januari";
			break;
	 
			case '2':			
				$formatNamaBulan = "Februari";
			break;
	 
			case '3':
				$formatNamaBulan = "Maret";
			break;
	 
			case '4':
				$formatNamaBulan = "April";
			break;
	 
			case '5':
				$formatNamaBulan = "Mei";
			break;
	 
			case '6':
				$formatNamaBulan = "Juni";
			break;
	 
			case '7':
				$formatNamaBulan = "Juli";
			break;

			case '8':
				$formatNamaBulan = "Agustus";
			break;

			case '9':
				$formatNamaBulan = "September";
			break;

			case '10':
				$formatNamaBulan = "Oktober";
			break;

			case '11':
				$formatNamaBulan = "November";
			break;

			case '12':
				$formatNamaBulan = "Desember";
			break;
			
			default:
				$formatNamaBulan = "Tidak di ketahui";		
			break;
		}
		return $formatNamaBulan;
	}

	function formatHariKeAngkaIndo($hari) {
	 
		switch($hari){
			case 'Min':
				$formatHariKeAngka = "7";
			break;
	 
			case 'Sen':			
				$formatHariKeAngka = "1";
			break;
	 
			case 'Sel':
				$formatHariKeAngka = "2";
			break;
	 
			case 'Rab':
				$formatHariKeAngka = "3";
			break;
	 
			case 'Kam':
				$formatHariKeAngka = "4";
			break;
	 
			case 'Jum':
				$formatHariKeAngka = "5";
			break;
	 
			case 'Sab':
				$formatHariKeAngka = "6";
			break;
			
			default:
				$formatHariKeAngka = "Tidak di ketahui";		
			break;
		}
		return $formatHariKeAngka;
	}

	function formatHariKeAngka($hari) {
	 
		switch($hari){
			case 'Sun':
				$formatHariKeAngka = "7";
			break;
	 
			case 'Mon':			
				$formatHariKeAngka = "1";
			break;
	 
			case 'Tue':
				$formatHariKeAngka = "2";
			break;
	 
			case 'Wed':
				$formatHariKeAngka = "3";
			break;
	 
			case 'Thu':
				$formatHariKeAngka = "4";
			break;
	 
			case 'Fri':
				$formatHariKeAngka = "5";
			break;
	 
			case 'Sat':
				$formatHariKeAngka = "6";
			break;
			
			default:
				$formatHariKeAngka = "Tidak di ketahui";		
			break;
		}
		return $formatHariKeAngka;
	}

	function formatHari($hari) {
	 
		switch($hari){
			case 'Sun':
				$formatHari = "Minggu";
			break;
	 
			case 'Mon':			
				$formatHari = "Senin";
			break;
	 
			case 'Tue':
				$formatHari = "Selasa";
			break;
	 
			case 'Wed':
				$formatHari = "Rabu";
			break;
	 
			case 'Thu':
				$formatHari = "Kamis";
			break;
	 
			case 'Fri':
				$formatHari = "Jumat";
			break;
	 
			case 'Sat':
				$formatHari = "Sabtu";
			break;
			
			default:
				$formatHari = "Tidak di ketahui";		
			break;
		}
		return $formatHari;
	}

	function formatHariTanggal($waktu) {
		$hari_array = [
			'Minggu',
			'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu'
		];

		$hr = date('w', strtotime($waktu));
		$hari = $hari_array[$hr];

		$tanggal = date('j', strtotime($waktu));

		$bulan_array = [
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember',
		];

		$bl = date('n', strtotime($waktu));
		$bulan = $bulan_array[$bl];
		$tahun = date('Y', strtotime($waktu));

		return "$hari, $tanggal $bulan $tahun";
	}

	function formatTanggalKeHari($waktu) {
		$hari_array = [
			'Minggu',
			'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu'
		];

		$hr = date('w', strtotime($waktu));
		$hari = $hari_array[$hr];

		$tanggal = date('j', strtotime($waktu));

		$bulan_array = [
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember',
		];

		$bl = date('n', strtotime($waktu));
		$bulan = $bulan_array[$bl];
		$tahun = date('Y', strtotime($waktu));

		return "$hari";
	}

	function formatTanggal($waktu) {
		$tanggal = date('j', strtotime($waktu));

		$bulan_array = [
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember',
		];

		$bl = date('n', strtotime($waktu));
		$bulan = $bulan_array[$bl];
		$tahun = date('Y', strtotime($waktu));

		return "$tanggal $bulan $tahun";
	}

	function selisihHari($tglAwal, $tglAkhir) {
	    // list tanggal merah selain hari minggu
	    $libur_nasional = array("2020-01-01", "2020-01-25", "2020-03-25", "2020-04-10", "2020-05-01", "2020-05-07", "2020-05-21", "2020-05-22", "2020-05-21", "2020-05-23", "2020-05-25", "2020-05-26", "2020-05-27", "2020-06-01", "2020-07-31", "2020-08-20", "2020-10-29", "2020-10-30", "2020-12-24", "2020-12-25", "2020-12-28", "2020-10-29", "2020-10-30", "2020-10-31");
	 
	    $awal 	= strtotime($tglAwal);
		$akhir  = strtotime($tglAkhir);
		
		//set awal jumlah hari kerja
 		$hari_kerja= 0;

 		//looping dari tgl awal sampai tgl akhir dengan increment 1 hari (60 * 60 * 24 second)
		 for ($i=$awal; $i <= $akhir; $i += (60 * 60 * 24)) {
		      //ubah format time ke date
		    $i_date=date("Y-m-d",$i);
		    //cek apakah hari sabtu, minggu atau hari libur nasional, Jika bukan maka tambahkan hari kerja
		    if (date("w",$i) !="0" AND !in_array($i_date,$libur_nasional)) {
		        $hari_kerja++;
		    }
		}

		return $hari_kerja;
	}

	function rupiah($angka){
	 	// $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		$hasil_rupiah = number_format($angka,0,',','.');
		return $hasil_rupiah;
	}

	function jumlahHari($bln)
    {
        $kalender   = CAL_GREGORIAN;
        $bulan      = $bln;
        $tahun      = date('Y');

        $hari = cal_days_in_month($kalender, $bulan, $tahun);
        return $hari;
    }

    function convertTime($dec)
    {
        // start by converting to seconds
        $seconds = ($dec * 3600);
        // we're given hours, so let's get those the easy way
        $hours = floor($dec);
        // since we've "calculated" hours, let's remove them from the seconds variable
        $seconds -= $hours * 3600;
        // calculate minutes left
        $minutes = floor($seconds / 60);
        // remove those from seconds as well
        $seconds -= $minutes * 60;
        // return the time formatted HH:MM:SS
        return lz($hours).":".lz($minutes).":".lz($seconds);
    }

    // lz = leading zero
    function lz($num)
    {
        return (strlen($num) < 2) ? "0{$num}" : $num;
    }

    function roundDecimal($val)
    {
    	$x = substr($val, 0, 1);
    	$y = substr($val, 2, 1);

    	$result = "$x.$y";
    	return $result;
    }