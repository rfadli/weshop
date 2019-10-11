<div id="kiri">
	<div id="menu-kategori">
		<ul>
			<?php
			$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
			while ($row = mysqli_fetch_array($query)) {

				if($kategori_id == $row['kategori_id']){

					echo "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
					
				}else{
			 	
			 		echo "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
				}
			}
			?>
		</ul>
	</div>
</div>


<div id="kanan">

	<div id="slides">
		<?php
		$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");

		while ($rowBanner = mysqli_fetch_array($queryBanner)) {

			echo "<a href='".BASE_URL."$rowBanner[link]'><img src='".BASE_URL."images/slide/$rowBanner[gambar]' /></a>";
		}
		?>
	</div>

	<div id="frame-barang">
		<ul>
			<?php
			if($kategori_id){
				$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 9");	
			}else{
				$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
			}
			
			$no = 1;
			while ($row = mysqli_fetch_array($query)) {

				$style = false;
				if($no == 3){
					$style = "style='margin-right:0px;'";
					$no = 0;
				}
			 
			 	echo "<li $style>";
			 	echo "<p class='price'>".rupiah($row['harga'])."</p>";
			 	echo "<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>";
			 	echo "<img src='".BASE_URL."images/barang/$row[gambar]' />";
			 	echo "</a>";

			 	echo "<div class='keterangan-gambar'>";
			 	echo "<p><a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</p>";
			 	echo "<span>Stok : $row[stok]</span>";
			 	echo "</a>";
			 	echo "<div>";

			 	echo "<div class='button-add-cart'>";
			 	echo "<a href='".BASE_URL."tambah_barang.php?barang_id=$row[barang_id]'>+ Add To Cart </a>";
			 	echo "</div>";

			 $no++;
				
			}
			?>
		</ul>
	</div>
</div>