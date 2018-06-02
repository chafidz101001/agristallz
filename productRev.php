<?php
	$id = $n;
	#echo $id;
	#include "session.php";
	$query = "SELECT * FROM barang WHERE id_barang = $id";
					    $result = mysqli_query($db, $query);
					    $rowBar = mysqli_fetch_array($result);
?>
<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="tag"></div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="single.php?id=<?php echo $n ?>"><img title=" " alt=" " src="getImage.php?id=<?php echo $n ?>" /></a>
											<br>
											<span class="label label-success"><?php echo $rowBar['nama_toko']?></span>
											<p><?php echo $row['nama_barang']; ?></p>

											<h4>Rp <?php echo $row['harga_barang']; ?>/kg</h4>
										</div>

									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
