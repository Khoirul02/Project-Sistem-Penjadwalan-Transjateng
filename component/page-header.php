						<?php
						$data = $_GET['data'];
						if($data == 'home'){
							$page_title = "Dashborad";
						}elseif($data == 'user'){
							if(isset($_GET['sp'])){
								if($_GET['sp']=='timer'){
									$page_title = "Data Karyawan Timer";
								}elseif ($_GET['sp']=='pengawas') {
									$page_title = "Data Karyawan Pegawas";
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
								$page_title = "Notifikasi Biodata Karyawan";
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
							<?php
							if($_SESSION['status_pengguna'] == 'admin' || $_SESSION['status_pengguna'] == 'korlay' ){
							?>
							<div class="page-header">
								<h1>
									Menu
									<small>
										<i class="ace-icon fa fa-angle-double-right"></i>
										<?php echo $page_title; ?>
									</small>
								</h1>
							</div><!-- /.page-header -->
							<?php
							}
							?>