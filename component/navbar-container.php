			<div class="navbar-container ace-save-state" id="navbar-container">
				<?php
				if($_SESSION['status_pengguna'] == 'admin' || $_SESSION['status_pengguna'] == 'korlay' ){
				?>
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
				<?php
				}else{
				?>
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<a href="dashboard.php?data=home&menu=home"><i class="fa fa-home bigger-230"></i></a>
				</button>
				<?php
				}
				?>
				<div class="navbar-header pull-left">
					<?php
					if($_SESSION['status_pengguna'] == 'admin' || $_SESSION['status_pengguna'] == 'korlay' ){
							$index = "dashboard.php?data=home";
					}else{
							$index = "dashboard.php?data=home&menu=home";
					}
					?>
					<a href="<?php echo $index ?>" class="navbar-brand">
						<?php
						$data = $_GET['data'];
						if($data == 'home'){
							if($_SESSION['status_pengguna'] == 'admin' || $_SESSION['status_pengguna'] == 'korlay' ){
								$page_title = "Dashboard";
							}else{
								if(isset($_GET['menu'])){
									$menu_2 = $_GET['menu'];
									if($menu_2 == 'home'){
										$page_title = "Data Karyawan";		
									}elseif ($menu_2 == 'schedule') {
										$page_title = "Jadwal Karyawan";
									}elseif ($menu_2 == 'user') {
										$page_title = "Biodata Karyawan";
									}else{
										$page_title = "Info Aplikasi";
									}
								}else{
									$page_title = "Data Karyawan";
								}
							}
						}elseif($data == 'user'){
							if(isset($_GET['sp'])){
								if($_GET['sp']=='timer'){
									$page_title = "Data Timer";
								}elseif ($_GET['sp']=='pengawas') {
									$page_title = "Data Pegawas";
								}elseif($_GET['sp']=='pramujasa'){
									$page_title = "Data Karyawan Pramujasa";
								}elseif($_GET['sp']=='kasir'){
									$page_title = "Data Admin Kasir";
								}elseif ($_GET['sp']=='admin') {
									$page_title = "Data Admin Kantor";
								}else{
									$page_title = "Data Korlay";
								}
							}else{
								$page_title = "Notifikasi Biodata";
							}						
						}elseif ($data == 'schedule') {
							$page_title = "Data Jadwal";
						}elseif ($data == 'transaction'){
							if(isset($_GET['stj'])){
								if($_GET['stj']=='lambung'){
									$page_title = "Data Tukar Lambung";
								}elseif ($_GET['stj']=='shift') {
									$page_title = "Data Tukar Shift";
								}else{
									$page_title = "Data Tukar Libur";
								}
							}
						}else{
							$page_title = "Data Tukar Jadwal";
						}
						?>
						<small>
							<?php echo $page_title; ?>
						</small>
					</a>

					<button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons">
						<span class="sr-only">Toggle user menu</span>
						<?php
						if($_SESSION['foto_pengguna'] == ''){
						?>
						<img src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
						<?php
						}else{
						$query_pengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna=".$_SESSION['id_pengguna']."");
						$data_pengguna = mysqli_fetch_array($query_pengguna);
						?>
						<img src="upload/<?php echo $data_pengguna['foto_pengguna']; ?>" alt="Jason's Photo" />
						<?php
						}
						?>
					</button>
				</div>

				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">
						<?php
						if($_SESSION['status_pengguna'] == 'karyawan' || $_SESSION['status_pengguna'] == 'admin' ){
						?>
						<li class="purple dropdown-modal">
							<?php
							if($_SESSION['status_pengguna'] == 'karyawan'){
							    $query_notif = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_pengguna=".$_SESSION['id_pengguna']."");
							}else{
							    $query_notif = mysqli_query($conn, "SELECT * FROM transaksi WHERE status_transaksi='noapprove'");
							}
							$jml_data = mysqli_num_rows($query_notif);
							?>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"><?php echo $jml_data; ?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
								    <?php
								    if($_SESSION['status_pengguna'] == 'karyawan'){
        							    $ket = " Data Tukar Jadwal";
        							}else{
        							    $ket = " Data Tukar Status Proses";
        							}
								    ?>
									<i class="ace-icon fa fa-info"></i>
									<?php echo $jml_data; ?> <?php echo $ket; ?>
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
									<?php
                                    $cek_notif = mysqli_num_rows($query_notif);
                                     	 if ($cek_notif > 0) {
										while ($data_notifikasi = mysqli_fetch_array($query_notif)){
										if($data_notifikasi['status_jadwal_transaksi'] == 'lambung'){
											$tukar = "Tukar Lambung";
										}elseif ($data_notifikasi['status_jadwal_transaksi'] == 'shift') {
											$tukar = "Tukar Shift";
										}else{
											$tukar = "Tukar Libur";
										}
											$query_jadwal_asli = mysqli_query($conn, "SELECT * FROM jadwal WHERE id_jadwal=".$data_notifikasi['id_jadwal_asli']."");
											$data_jadwal_asli = mysqli_fetch_array($query_jadwal_asli);
											$tanggal_jadwal_asli = $data_jadwal_asli['tanggal_jadwal'];
											$query_jadwal_tukar = mysqli_query($conn, "SELECT * FROM jadwal WHERE id_jadwal=".$data_notifikasi['id_jadwal_tukar']."");
											$data_jadwal_tukar = mysqli_fetch_array($query_jadwal_tukar);
											$tanggal_jadwal_tukar = $data_jadwal_tukar['tanggal_jadwal'];
												if($data_notifikasi['status_transaksi'] == 'approve'){
													$label = "success";
													$nama = "Disetuji";
												}elseif ($data_notifikasi['status_transaksi'] == 'procces') {
													$label = "warning";
													$nama = "Proses";
												}else{
													$label = "danger";
													$nama = "Tidak Disetuji";
											}
											?>
											<li>
												<a href="#">
													<div class="clearfix">
													    <?php
													    if($_SESSION['status_pengguna'] == 'karyawan'){
													    ?>
														<span class="badge badge-<?php echo $label ?>"><?php echo $nama; ?></span>
														<?php
													    }else{
													        $query_pengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna=".$data_notifikasi['id_pengguna']."");
													        $data_pengguna = mysqli_fetch_array($query_pengguna);
													        $nama_pengguna_notif = $data_pengguna['nama_lengkap_pengguna'];
													    ?>
													    <span class="badge badge-warning"><?php echo "$nama_pengguna_notif"; ?></span>
													    <?php
													    }
														?>
														<span class="pull-left">
															<?php echo $tukar; ?>  /  <?php echo tgl_indo($tanggal_jadwal_asli);?> > <?php echo tgl_indo($tanggal_jadwal_tukar);?>
														</span>
													</div>
												</a>
											</li>
										<?php
										}
									}else{
									?>
									<li>
										<a href="#">
											<div class="clearfix">
												<span class="pull-left">
													<?php echo $ket ?> Kosong
												</span>
											</div>
										</a>
									</li>
									<?php
									}
									?>
									</ul>
								</li>
							</ul>
						</li>
						<?php
						}
						?>
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php
								if($_SESSION['foto_pengguna'] == ''){
								?>
								<img src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<?php
								}else{
								?>
								<img src="upload/<?php echo $data_pengguna['foto_pengguna']; ?>" alt="Jason's Photo" style="height: 30px;width: 25px" />
								<?php
								}
								?>
								<span class="user-info">
									<small>Nama : <?php echo $_SESSION['nama_lengkap_pengguna']; ?></small>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="proses/logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->