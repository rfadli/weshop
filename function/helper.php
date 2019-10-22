<?php
    define("BASE_URL", "http://localhost/weshop/");

    $arrayStatusPemesanan[0] = "Menunggu Pembayaran";
    $arrayStatusPemesanan[1] = "Pembayaran Sedang Di Validasi";
    $arrayStatusPemesanan[2] = "Lunas";
    $arrayStatusPemesanan[3] = "Pembayaran Di Tolak";


    function rupiah($nilai = 0){
    	$string = "Rp. ".number_format($nilai);
    	return $string;
    }

    function kategori($kategori_id = false){

	    global $koneksi; //mengambil / menangkap variabel koneksi secara menyeluruh / diluar fungsi
	    	
	    $string ="<div id='menu-kategori'>";
			$string .= "<ul>";
				
				$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
				while ($row = mysqli_fetch_array($query)) {
					$kategori = strtolower($row['kategori']);
					if($kategori_id == $row['kategori_id']){

						$string .= "<li><a href='".BASE_URL."$row[kategori_id]/$kategori.html' class='active'>$row[kategori]</a></li>";
						
					}else{
				 	
				 		$string .= "<li><a href='".BASE_URL."$row[kategori_id]/$kategori.html'>$row[kategori]</a></li>";
					}
				}
				
			$string .= "</ul>";
		$string .= "</div>";

		return $string;
    }

?>