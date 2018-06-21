<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Data produk</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }
	font-family : "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: white;
		background-color: #006400;
		border-bottom: 1px solid #D0D0D0;
		font-size: 25px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.tombol{
		background: #00FF7F;
		color : white;
		border-top: 0;
		border-right: 0;
		border-left: 0;
		padding: 10px 20px;
		border-bottom : 5px solid #98FB98;
		text-decoration: none;
		font-family : sans-serif;
		font-size: 11pt;
	}
	form{
		font-size :20px;
		font-weight : bold;
	}

	input[type=text]{
		font-size: 17px;
		padding: 5px 15px;
	}


	input[type=submit]:hover{
			cursor :pointer;
			}
	input[type=submit]:active{
			cursor :#0044cc;
			}
	</style>
</head>
<body>

<div id="container">
	<h1>Form Edit</h1>

	<div id="body">
		<?php if($dataEdit){
			$id  = $dataEdit->id_produk;
			$name = $dataEdit->nama_produk;
			$frslvl = $dataEdit->fresh_lvl;
			$nmtk = $dataEdit->nama_toko;
			$kat = $dataEdit->kategori;
			$desc = $dataEdit->deskripsi;
			$gambar = $dataEdit->gambar;

		} else{
			$name = "";
			$frslvl = "";
			$nmtk = "";
			$kat = "";
			$desc = "";
			$gambar = "";
		}?>
		<form action="<?php echo site_url('welcome/update/'.$id)?>" method="POST">
			<table align=center>
				<tr>
					<td>Nama produk</td>
					<td><input type="text" name="name" value="<?php echo $name?>"/></td>
				</tr>
				<tr>
					<td>Fresh Level</td>
					<td>
						<select name='lvl' value="<?php echo $frslvl?>">
							<option value='1'> 1 </option>
							<option value='2'> 2 </option>
							<option value='3'> 3 </option>
							<option value='4'> 4 </option>
							<option value='5'> 5 </option>
							<option value='6'> 6 </option>
							<option value='7'> 7 </option>
							<option value='8'> 8 </option>
							<option value='9'> 9 </option>
							<option value='10'> 10 </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Nama Toko</td>
					<td><input type="text" name="toko" value="<?php echo $nmtk?>"/></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>
						<select name='kategori'  value="<?php echo $dept?>">
							<option value='Sayur'> Sayuran </option>
							<option value='Buah'> Buah-buahan </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Deskripsi</td>
					<td><textarea rows=4 cols=30 name="desk" value="<?php echo $desc?>"></textarea></td>
				</tr>
				<tr>
					<td>Masukan Gambar</td>
					<td><input type="file" name="img" value="<?php echo $gambar?>"/></td>
				</tr>
				<tr>
					<td><input type="submit" name="Simpan" value="Save" class="tombol"/></td>
					<td><a href="<?php echo site_url('welcome/index') ?>" class="tombol"> Back </a></td>
				</tr>
			</table>
		</form>
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>