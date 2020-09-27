<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "connection/config.php";
?>
<?php
$jumlah_data_pengguna = mysqli_query($conn, "select * from pengguna");
$jumlah_data_jadwal = mysqli_query($conn, "select * from jadwal");
$jumlah_data_transaksi = mysqli_query($conn, "select * from transaksi");
?>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/img.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default navbar-collapse       ace-save-state">
			<?php include "component/navbar-container.php"?>
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<?php include "component/nav-list.php"?>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<?php
					if($_SESSION['status_pengguna'] == 'admin' || $_SESSION['status_pengguna'] == 'korlay' ){
					?>
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container"></div><!-- /.ace-settings-container -->
						
						<?php include "component/page-header.php"?>

						<div class="row">
							<div class="col-xs-12">
								<?php
								if($_SESSION['status_pengguna']=='admin'){
									$selamat = "Admin,";
								}elseif ($_SESSION['status_pengguna']=='korlay') {
									$selamat = "Korlay, ";
								}else{
									$selamat = "Karyawan, ";
								}
								?>
								<!-- PAGE CONTENT BEGINS -->
								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Selamat Datang <?php echo $selamat; ?>
									<strong class="green">
										<?php echo $_SESSION['nama_lengkap_pengguna']; ?>.
									</strong>
								</div>

								<div class="row">
									<div class="space-6"></div>

									<div class="col-sm-7 infobox-container">
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-user"></i>
											</div>
											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo mysqli_num_rows($jumlah_data_pengguna); ?></span>
												<div class="infobox-content">Data Pengguna</div>
											</div>
										</div>

										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-calendar"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo mysqli_num_rows($jumlah_data_jadwal); ?></span>
												<div class="infobox-content">Data Jadwal</div>
											</div>
										</div>

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-shopping-cart"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo mysqli_num_rows($jumlah_data_transaksi); ?></span>
												<div class="infobox-content">Data Transaksi</div>
											</div>
										</div>
									</div>
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-shopping-cart orange"></i>
													Data Transaksi
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>name
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Tukar
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>status
																</th>
															</tr>
														</thead>

														<tbody>
															<?php
															$query = mysqli_query($conn, "SELECT * FROM transaksi limit 3");
															while ($data = mysqli_fetch_array($query)) {
															?>
															<tr>
																<td>
																<?php
																$query_pengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna=".$data['id_pengguna']."");
																$data_pengguna = mysqli_fetch_array($query_pengguna);
																$nama_pengguna = $data_pengguna['nama_lengkap_pengguna'];
																?>
																<?php echo $nama_pengguna;?>
																</td>
																<td>
																<?php					
																	if($data['status_jadwal_transaksi'] == 'lambung'){
																		$title_jadwal = "Lambung";
																	}elseif ($data['status_jadwal_transaksi'] == 'shift') {
																		$title_jadwal = "Shift";
																	}else{
																		$title_jadwal = "Libur";
																	}
																?>
																<?php echo $title_jadwal; ?>
																</td>
																<td>
																	<?php					
																	if($data['status_transaksi'] == 'approve'){
																		$label = "label-success";
																		$title_status = "Disetujui";
																	}elseif ($data['status_transaksi'] == 'procces') {
																		$label = "label-warning";
																		$title_status = "Proses";
																	}else{
																		$label = "label-danger";
																		$title_status = "Tidak Disetujui";
																	}
																	?>
																	<span class="label <?php echo $label ?> arrowed-right arrowed-in"><?php echo $title_status;?>
																	</span>
																</td>
															</tr>
															<?php
															}
															?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="row">
									<div class="col-sm-6">
										<div class="widget-box transparent" id="recent-box">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">
													<i class="ace-icon fa fa-calendar orange"></i>Status Jadwal Pengguna
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<div class="tab-content padding-8">
															<div class="clearfix">
																<?php
																$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE status_pengguna='karyawan' limit 3");
																while ($data = mysqli_fetch_array($query)) {
																if($data['status_jadwal_pengguna'] == 'approve'){
																	$label = "label-success";
																}elseif ($data['status_jadwal_pengguna'] == 'procces') {
																	$label = "label-warning";
																}else{
																	$label = "label-danger";
																}
																?>
																<div class="itemdiv memberdiv">
																	<?php
																		if($data['foto_pengguna']==''){
																			$src_foto = "assets/images/avatars/profile-pic.jpg";
																		}else{
																			$src_foto = "upload/".$data['foto_pengguna']."";
																		}
																		?>
																	<div class="user">
																		<img alt="Jim Doe's avatar"  src="<?php echo $src_foto ?>" style="width: 50px;height: 40px"/>
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#"><?php echo $data['nama_lengkap_pengguna']; ?></a>
																		</div>

																		<div>
																			<?php 
																			if($data['status_jadwal_pengguna'] == 'approve'){
																				$data_status_jadwal = "Disetujui";
																			}elseif ($data['status_jadwal_pengguna'] == 'noapprove') {
																				$data_status_jadwal = "Tidak Disetujui";
																			}else{
																				$data_status_jadwal = "Proses";
																			}
																			?>
																			<span class="label <?php echo $label ?> label-sm"><?php echo $data_status_jadwal; ?></span>
																		</div>
																	</div>
																</div>
																<?php
																}
																?>
															</div>

															<div class="space-4"></div>

															<div class="hr hr-double hr8"></div>
													</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
					<?php
					}else{
					?>
						<div class="page-content">
							<div class="ace-settings-container" id="ace-settings-container"></div><!-- /.ace-settings-container -->
							<?php include "component/page-header.php"?>
							<?php 
							if(isset($_GET['menu'])){
							$menu = $_GET['menu'];
							if ($menu !='user') {
								if($menu == 'info'){
								?>
								<div class="row">
								<div class="center">
									<img src="assets/images/upgris.png" style="width: 70px;height: 80px">
									<img src="assets/images/logo_transjateng.png" style="width: 90px;height: 90px">
								</div>
								</div>
								<br>
								<?php
								}else{
								?>
								<div class="row">
								<div class="center">
									<img src="assets/images/logo_transjateng.png" style="width: 90px;height: 90px">
								</div>
								</div>
								<br>
								<?php
								}
							}
							}
							?>
							<?php
							if(isset($_GET['menu'])){
							$menu = $_GET['menu'];
							if($menu == 'home'){
							?>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-sm-7 infobox-container">
										<div class="infobox-data">
										<a href="dashboard.php?data=home&menu=user" class="btn btn-block btn-success">
										<i class="ace-icon fa fa-user bigger-230"></i>
										Biodata Karyawan
										</a>
										</div>
									</div>
								</div>
								<br>
							</div>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-sm-7 infobox-container">
										<div class="infobox-data">
										<a href="dashboard.php?data=home&menu=schedule" class="btn btn-block btn-success">
										<i class="ace-icon fa fa-calendar bigger-230"></i>
										Jadwal Karyawan
										</a>
										</div>
									</div>
								</div>
								<br>
							</div>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-sm-7 infobox-container">
										<div class="infobox-data">
										<a href="dashboard.php?data=home&menu=info" class="btn btn-block btn-success">
										<i class="ace-icon fa fa-users bigger-230"></i>
										Info Aplikasi
										</a>
										</div>
									</div>
								</div>
							</div>
							<?php
							}elseif($menu == 'schedule'){
							$query_pengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna like ".$_SESSION['id_pengguna']."");
							$data_pengguna = mysqli_fetch_array($query_pengguna);
							if ($data_pengguna['status_jadwal_pengguna'] == 'approve') {
							?>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-sm-7 infobox-container">
										<div class="infobox-data">
										<a href="list-schedule.php?data=schedule&kode_pengguna=<?php echo $_SESSION['kode_pengguna'] ?>" class="btn btn-block btn-success">
										<i class="ace-icon fa fa-calendar bigger-230"></i>
										Jadwal Tetap
										</a>
										</div>
									</div>
								</div>
								<br>
							</div>
							<div class="col-xs-12">
								<div class="row">
									<div class="col-sm-7 infobox-container">
										<div class="infobox-data">
										<a href="#my-modal" class="btn btn-block btn-success" data-toggle="modal">
										<i class="ace-icon fa fa-users bigger-230"></i>
										Tukar Jadwal
										</a>
										</div>
									</div>
								</div>
								<br>
								<p style="text-align: center;">
								<a href="dashboard.php?data=home&menu=home">
									<button class="btn btn-warning">Kembali</button>
								</a>
								</p>
							</div>
							<div id="my-modal" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin">Tukar Jadwal</h3>
											</div>

											<div class="modal-body">
												<?php
												if($_SESSION['jabatan_pengguna'] == 'pramujasa'){
												?>
												<div class="infobox-data">
													<a href="form-transaction.php?data=transaction&action=add&stj=lambung" class="btn btn-block btn-success" data-toggle="modal">
													<i class="ace-icon fa fa-users bigger-230"></i>
													Tukar Jadwal Lambung
													</a>
												</div>
												<br>
												<div class="infobox-data">
													<a href="form-transaction.php?data=transaction&action=add&stj=shift" class="btn btn-block btn-success" data-toggle="modal">
													<i class="ace-icon fa fa-users bigger-230"></i>
													Tukar Jadwal Shift
													</a>
												</div>
												<br>
												<div class="infobox-data">
													<a href="form-transaction.php?data=transaction&action=add&stj=libur" class="btn btn-block btn-success" data-toggle="modal">
													<i class="ace-icon fa fa-users bigger-230"></i>
													Tukar Jadwal Libur
													</a>
												</div>
												<?php
												}else {
												?>
												<div class="infobox-data">
													<a href="form-transaction.php?data=transaction&action=add&stj=shift" class="btn btn-block btn-success" data-toggle="modal">
													<i class="ace-icon fa fa-users bigger-230"></i>
													Tukar Jadwal Shift
													</a>
												</div>
												<br>
												<div class="infobox-data">
													<a href="form-transaction.php?data=transaction&action=add&stj=libur" class="btn btn-block btn-success" data-toggle="modal">
													<i class="ace-icon fa fa-users bigger-230"></i>
													Tukar Jadwal Libur
													</a>
												</div>
												<?php
												}
												?>
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
								<?php
								}else{
								?>
								<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													<small>Cek Data Diri Anda di Menu Biodata Karyawan</small>
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<p style="text-align: center;" class="muted">
														Maaf, biodata belum terisi dengan lengkap. Silahkan
														isi biodata terlebih dahulu untuk membuka
														menu jadwal karyawan. Kemudian lakukan konfirmasi
														ke bagian Admin Kantor.
													</p>

													<hr />

													<p>
													<a href="dashboard.php?data=home&menu=home">
														<span class="btn btn-warning btn-block tooltip-warning" data-rel="tooltip">Kembali</span>
													</a>
													</p>
												</div>
											</div>
										</div>
							<?php
								}
							}elseif($menu == 'user'){
								$sql = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna = ".$_SESSION['id_pengguna']."");
                                $data = mysqli_fetch_array($sql);
								$id_pengguna = $data['id_pengguna']; 
								$kode_pengguna = $data['kode_pengguna'];
								$foto_pengguna = $data['foto_pengguna'];
								$nama_lengkap_pengguna = $data['nama_lengkap_pengguna'];
								$tempat_lahir_pengguna = $data['tempat_lahir_pengguna'];
								$tanggal_lahir_pengguna = $data['tanggal_lahir_pengguna'];
								$jabatan_pengguna = $data['jabatan_pengguna'];
							?>
							<?php
								if(isset($_GET['status'])){
									$status = $_GET['status'];
									if($status == 'succes'){
										$alret = 'success';
										$color = 'green';
										$title = 'Sukses Memproses';
										$icon  = 'fa fa-check';
									}elseif($status == 'two-succes'){
										$alret = 'success';
										$color = 'green';
										$title = 'Sukses Memproses dan Gambar Tidak di Proses ';
										$icon  = 'fa fa-user';
									}elseif($status == 'warning'){
										$alret = 'warning';
										$color = 'yellow';
										$title = 'Format foto tidak mendukung';
										$icon  = 'fa fa-user';
									}elseif($status == 'failed'){
										$alret = 'danger';
										$color = 'red';
										$title = 'Gagal Memproses';
										$icon  = 'fa fa-user';
									}
								}else{
									$alret = 'success';
									$color = 'green';
									$title = '';
									$icon  = 'fa fa-user';
								}
								?>
								
								<div class="alert alert-block alert-<?php echo $alret ?>">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon <?php echo $icon ?> <?php echo $color ?>"></i>
									 	<?php echo $title ?>
									<strong class="<?php echo $color ?>">
										Biodata Karyawan
									</strong>
								</div>
							<form class="form-horizontal" role="form" action="proses/user.php?action=editdata" method="post" enctype="multipart/form-data">
								<div class="center">
								<?php
								if($foto_pengguna ==''){
									$src_foto = "assets/images/avatars/profile-pic.jpg";
								}else{
									$src_foto = "upload/".$foto_pengguna."";
								}
								?>
								<img height="150" id="imgshow" class="thumbnail inline no-margin-bottom" alt="" src="<?php echo $src_foto; ?>">
								</div>
								<br>
								<input type="hidden" id="id_pengguna" name="id_pengguna" placeholder="ID Pengguna" class="form-control" value="<?php echo $id_pengguna?>" readonly/>
								<div class="form-group">
									<div class="col-sm-9">
										<input type="text" id="nama_lengkap_pengguna" name="nama_lengkap_pengguna" placeholder="Nama Lengkap" class="form-control" value="<?php echo $nama_lengkap_pengguna?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-9">
										<input type="text" id="tempat_lahir_pengguna" name="tempat_lahir_pengguna" placeholder="Tempat Lahir" class="form-control" value="<?php echo $tempat_lahir_pengguna ?>"/>
									</div>
								</div>
								<div class="form-group">
										<div class="col-sm-9">
											<input class="form-control date-picker" id="tanggal_lahir_pengguna" name="tanggal_lahir_pengguna" placeholder="Tanggal Lahir" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $tanggal_lahir_pengguna ?>"/>
										</div>
								</div>

								<div class="form-group">
									<p style="text-align: center;"><label class="col-sm-3 control-label no-padding-right" for="nama_lengkap_pengguna"> Jabatan </label>
									</p>
									<div class="col-sm-9">
										<input type="text" id="jabatan_pengguna" name="jabatan_pengguna" placeholder="Nama Lengkap" class="form-control" value="<?php echo $jabatan_pengguna ?>" readonly/>
									</div>
								</div>

								<div class="form-group">
									<p style="text-align: center;"><label class="col-sm-3 control-label no-padding-right" for="foto_pengguna"> Foto Pengguna </label>
									</p>
									 <div class="col-xs-12">
										 <input type="file" id="id-input-file-2" name="foto_pengguna" />
									 </div>
								 </div>

								<div class="clearfix form-actions">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-save bigger-110"></i>
												Simpan
										</button>

										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
										</button>
									</div>
								</div>
							</form>
							<br>
							<?php
							}else{
							?>
								<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													<small>Tentang</small>
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<p style="text-align: center;" class="muted">
														Aplikasi Penjadwalan Karyawan ini yang memudahkan
														karyawan BTR TRANS JATENG untuk mendapatkan informasi
														jadwal.<br>
														Nama : Ade Fitri Ayu Risky<br>
														NPM : 16340047<br>

														Terimakasih.
													</p>

													<hr />

													<p>
													<a href="dashboard.php?data=home&menu=home">
														<span class="btn btn-warning btn-block tooltip-warning" data-rel="tooltip">Kembali</span>
													</a>
													</p>
												</div>
											</div>
										</div>
							<?php
							}
							?>
						</div>
					<?php
						}
					}
					?>
				</div>
			</div><!-- /.main-content -->

			<?php include "component/footer.php" ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$('document').ready(function () {
		    $("#id-input-file-2").change(function () {
		        if (this.files && this.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function (e) {
		                $('#imgshow').attr('src', e.target.result);
		            }
		            reader.readAsDataURL(this.files[0]);
		        }
		    });
		    });

			jQuery(function($) {
			   $('#sidebar2').insertBefore('.page-content');
			   
			   $('.navbar-toggle[data-target="#sidebar2"]').insertAfter('#menu-toggler');
			   
			   
			   $(document).on('settings.ace.two_menu', function(e, event_name, event_val) {
				 if(event_name == 'sidebar_fixed') {
					 if( $('#sidebar').hasClass('sidebar-fixed') ) {
						$('#sidebar2').addClass('sidebar-fixed');
						$('#navbar').addClass('h-navbar');
					 }
					 else {
						$('#sidebar2').removeClass('sidebar-fixed')
						$('#navbar').removeClass('h-navbar');
					 }
				 }
			   }).triggerHandler('settings.ace.two_menu', ['sidebar_fixed' ,$('#sidebar').hasClass('sidebar-fixed')]);
			})
			$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
			jQuery(function($) {
				$('.modal.aside').ace_aside();
				
				$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
				
				//$('#top-menu').modal('show')
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove before leaving page
					$('.modal.aside').remove();
					$(window).off('.aside')
				});
				
				
				//make content sliders resizable using jQuery UI (you should include jquery ui files)
				//$('#right-menu > .modal-dialog').resizable({handles: "w", grid: [ 20, 0 ], minWidth: 200, maxWidth: 600});
			})

		</script>
	</body>
</html>
