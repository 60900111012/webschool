<?php
use yii\helpers\Html;
use yii\grid\GridView;
	$this->title = 'Daftar Jadwal Lengkap';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Semua Jadwal';
?>
<div class="box box-primary">
	<div class="box-header with-border">
		Table Jadwal - <?= Html::a("Tampil Format Print",['index'],['target' => '_blank','data-pjax'=>"0",'class' =>'btn btn-primary btn-sm btn-flat']) ?>
		<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
         </div>
	</div>
	
	<?php
					$sn = 0; $sl = 0; $rb = 0; $km = 0; $jm = 0; $sb = 0;
					foreach ($model as $k)
					{
	?>
						<h2><?= $k->idKelas->nama_kelas ?></h2>
						<div class="row">
								<div class="col-lg-4">
											<table class="table">
												<tr>
													<th>Jam</th>
													<th>Senin</th>
												</tr>
												<?php
									 				$data = $f->find()->where(['id_kelas' => $k->id_kelas])->orderBy(['jam_masuk'=>'ASC'])->all();
													foreach ($data as $d)
													{
														if ($d->hari == 'Senin')
														{
															if ($sn != 0) echo "<tr>";
															echo "<td>".$d->jam_masuk.' - '.$d->jam_keluar."</td>";
															echo "<td>".$d->idPelajaran->nama_mapel."</td>";
															$sn++;
															echo "</tr>";
														}
													}
												?>
														<!-- </tr> -->
											</table>
								</div>

								<div class="col-lg-4">
									<table class="table">
													<tr>
														<th>Jam</th>
														<th>Selasa</th>
													</tr>
													<?php
										 				$data = $f->find()->where(['id_kelas' => $k->id_kelas])->orderBy(['jam_masuk'=>'ASC'])->all();
														foreach ($data as $d)
														{
															if ($d->hari == 'Selasa')
															{
																if ($sl != 0) echo "<tr>";
																echo "<td>".$d->jam_masuk.' - '.$d->jam_keluar."</td>";
																echo "<td>".$d->idPelajaran->nama_mapel."</td>";
																$sl++;
																echo "</tr>";
															}
														}
													?>
													<!-- </tr> -->
									</table>
								</div>

								<div class="col-lg-4">
									<table class="table">
												<tr>
													<th>Jam</th>
													<th>Rabu</th>
												</tr>
										<?php
							 				$data = $f->find()->where(['id_kelas' => $k->id_kelas])->orderBy(['jam_masuk'=>'ASC'])->all();
											foreach ($data as $d){
												if ($d->hari == 'Rabu'){
													if ($sl != 0) echo "<tr>";
													echo "<td>".$d->jam_masuk.' - '.$d->jam_keluar."</td>";
													echo "<td>".$d->idPelajaran->nama_mapel."</td>";
													$sl++;
													echo "</tr>";
												}
											}
										?>
										<!-- </tr> -->
									</table>
								</div>
						</div>
						<div class="row">
								<div class="col-lg-4">
									<table class="table">
											<tr>
												<th>Jam</th>
												<th>Kamis</th>
											</tr>
											<?php
								 				$data = $f->find()->where(['id_kelas' => $k->id_kelas])->orderBy(['jam_masuk'=>'ASC'])->all();
												foreach ($data as $d){
													if ($d->hari == 'Kamis'){
														if ($km != 0) echo "<tr>";
														echo "<td>".$d->jam_masuk.' - '.$d->jam_keluar."</td>";
														echo "<td>".$d->idPelajaran->nama_mapel."</td>";
														$km++;
														echo "</tr>";
													}
												}
											?>
										<!-- </tr> -->
									</table>
								</div>

								<div class="col-lg-4">
									<table class="table">
										<tr>
											<th>Jam</th>
											<th>Jum'at</th>
										</tr>
											<?php
								 				$data = $f->find()->where(['id_kelas' => $k->id_kelas])->orderBy(['jam_masuk'=>'ASC'])->all();
												foreach ($data as $d){
													if ($d->hari == 'Jumat'){
														if ($km != 0) echo "<tr>";
														echo "<td>".$d->jam_masuk.' - '.$d->jam_keluar."</td>";
														echo "<td>".$d->idPelajaran->nama_mapel."</td>";
														$km++;
														echo "</tr>";
													}
												}
											?>
										<!-- </tr> -->
									</table>
								</div>

								<div class="col-lg-4">
									<table class="table">
										<tr>
											<th>Jam</th>
											<th>Sabtu</th>
										</tr>
								<?php
					 				$data = $f->find()->where(['id_kelas' => $k->id_kelas])->orderBy(['jam_masuk'=>'ASC'])->all();
									foreach ($data as $d){
										if ($d->hari == 'Sabtu'){
											if ($sl != 0) echo "<tr>";
											echo "<td>".$d->jam_masuk.' - '.$d->jam_keluar."</td>";
											echo "<td>".$d->idPelajaran->nama_mapel."</td>";
											$sb++;
											echo "</tr>";
										}
									}
								?>
										<!-- </tr> -->
									</table>
								</div>
						</div>
					<?php
					}
					?>

		<!-- </div> -->
	</div>
</div>




















































<!-- <div class="box-body">
		 <table class="table" >
		 	<tbody>
		 		<?php
		 			$sn = 0;
		 			$km = 0;
		 			foreach ($model as $k){
		 				?>
		 				<tr>
		 			<td rowspan="7"><?= $k->idKelas->nama_kelas ?></td>
		 			<td>
		 				<tr>
		 					<th>Jam / Hari</th>
		 					<th>Senin</th>
		 					<th>Jam / Hari</th>
		 					<th>Selasa</th>
		 					<th>Jam / Hari</th>
		 					<th>Rabu</th>
		 				</tr>
		 				<tr>
		 				<?php
		 				$data = $f->find()->where(['id_kelas' => $k->id_kelas])->orderBy(['jam_masuk'=>'ASC'])->all();
						foreach ($data as $d){
							if ($d->hari == 'Senin'){
								if ($sn != 0)
									echo "<tr>";
								echo "<td>".$d->jam_masuk.' - '.$d->jam_keluar."</td>";
								echo "<td>".$d->idPelajaran->nama_mapel."</td>";
								$sn++;
							}
							if ($d->hari == 'Selasa') {
								echo "<td>".$d->jam_masuk.' - '.$d->jam_keluar."</td>";
								echo "<td>".$d->idPelajaran->nama_mapel."</td>";
									
							}
							if ($d->hari == 'Rabu') {
								echo "<td>".$d->jam_masuk.' - '.$d->jam_keluar."</td>";
								echo "<td>".$d->idPelajaran->nama_mapel."</td>";
									
							}
							
						}
		 				?>
							</tr>
							<tr>
		 					<th>Jam / Hari</th>
		 					<th>Kamis</th>
		 					<th>Jam / Hari</th>
		 					<th>Jum'at</th>
		 					<th>Jam / Hari</th>
		 					<th>Sabtu</th>
		 					<tr>
		 						<?php
		 						foreach ($data as $k){
		 							if ($k->hari == 'Kamis') {
		 								if ($km != 0)
		 									echo "<tr>";
								echo "<td>".$k->jam_masuk.' - '.$k->jam_keluar."</td>";
								echo "<td>".$k->idPelajaran->nama_mapel."</td>";
									
							}
							if ($k->hari == 'Jumat') {
								echo "<td>".$k->jam_masuk.' - '.$k->jam_keluar."</td>";
								echo "<td>".$k->idPelajaran->nama_mapel."</td>";
									
							}
							if ($k->hari == 'Sabtu') {
								echo "<td>".$k->jam_masuk.' - '.$k->jam_keluar."</td>";
								echo "<td>".$k->idPelajaran->nama_mapel."</td>";									
							}
		 						}
		 						?>
		 					</tr>
		 				</tr>

		 			</td>
		 		</tr>
		 				<?php
		 			}
		 		?>
		 	</tbody>
		 </table> -->