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