<div id="frame-data-pengiriman">

	<h3>Alamat Pengiriman Barang</h3>

	<div id="frame-form-pengiriman">
		
		<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
		
			<div class="element-form">
				<label>Nama Penerima</label>
				<span><input type="text" name="nama_penerima" /></span>
			</div>

			<div class="element-form">
				<label>Nomor Telepon</label>
				<span><input type="text" name="nomor_telepon" /></span>
			</div>

			<div class="element-form">
				<label>Alamat Pengiriman</label>
				<span><textarea name="alamat"></textarea></span>
			</div>

			<div class="element-form">
				<label>Kota</label>
				<span>
					<select name="kota">
					<?php
						$query = mysqli_query($koneksi, "SELECT * FROM kota");

						while ($row = mysqli_fetch_assoc($query)) {
							
							echo "<option value='".$row["kota_id"]."'>".$row["kota"]." - ".rupiah($row["tarif"])."</option>";
						}
					?>
					</select>
				</span>
			</div>

			<div class="element-form">
				<span><input type="submit" value="submit"></span>
			</div>

		</form>

	</div>
	
</div>

<div id="freme-data-detail">
	<h3>Detail Order</h3>

	<div id="frame-detail-order">
		<table class="table-list">
			<tr>
				<th class="kiri">Nama Barang</th>
				<th class="tengah">Qty</th>
				<th class="kanan">Total</th>
			</tr>
			<?php
			foreach ($keranjang as $key => $value) {

				$barang_id = $key;

				$nama_barang = $value['nama_barang'];
				$harga = $value['harga'];
				$quantity = $value['quantity'];

				$total = $quantity * $harga;

				echo "<tr>";
				echo "<td class='kiri'>".$nama_barang."</td>";
				echo "<td class='tengah'>".$quantity."</td>";
				echo "<td class='kanan'>".rupiah($total)."</td>";
				echo "</tr>";
			}
			?>
		</table>	
	</div>
	
</div>