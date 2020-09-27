				<?php
				$data = $_GET['data'];
				if ($data == 'home') {
					$class1 = "active";
					$class2 = "";
					$class3 = "";
					$class4 = "";
					$class5 = "";
					$class6 = "";
					$class7 = "";
				}elseif($data == 'user'){
					if(isset($_GET['sp'])){
						$sp = $_GET['sp'];
						if($sp == 'admin'){
							$class1 = "";
							$class2 = "";
							$class3 = "";
							$class4 = "";
							$class5 = "";
							$class6 = "";
							$class7 = "active";
							$class8 = "";
						}elseif ($sp == 'korlay') {
							$class1 = "";
							$class2 = "";
							$class3 = "";
							$class4 = "";
							$class5 = "";
							$class6 = "";
							$class7 = "";
							$class8 = "active";
						}else{
							$class1 = "";
							$class2 = "";
							$class3 = "";
							$class4 = "";
							$class5 = "";
							$class6 = "active";
							$class7 = "";
							$class8 = "";
						}
					}else{
						$class1 = "";
						$class2 = "";
						$class3 = "";
						$class4 = "active";
						$class5 = "";
						$class6 = "";
						$class7 = "";
						$class8 = "";
					}
				}elseif ($data == 'schedule') {
					$class1 = "";
					$class2 = "";
					$class3 = "";
					$class4 = "";
					$class5 = "active";
					$class6 = "";
					$class7 = "";
					$class8 = "";
				}elseif ($data == 'transaction') {
					$class1 = "";
					$class2 = "active";
					$class3 = "";
					$class4 = "";
					$class5 = "";
					$class6 = "";
					$class7 = "";
					$class8 = "";
				}else{
					$class1 = "";
					$class2 = "";
					$class3 = "active";
					$class4 = "";
					$class5 = "";
					$class6 = "";
					$class7 = "";
					$class8 = "";
				}
				?>
				<?php
				if($_SESSION['status_pengguna'] == 'admin'){
				?>
				<ul class="nav nav-list">
					<li class="<?php echo $class1 ?>">
						<a href="dashboard.php?data=home">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php echo $class2 ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Notifikasi Tukar
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="list-transaction.php?data=transaction&stj=lambung">
									<i class="menu-icon fa fa-caret-right"></i>
									Lambung
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="list-transaction.php?data=transaction&stj=shift">
									<i class="menu-icon fa fa-caret-right"></i>
									Shift
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="list-transaction.php?data=transaction&stj=libur">
									<i class="menu-icon fa fa-caret-right"></i>
									Libur
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					
					<li class="<?php echo $class3 ?>">
						<a href="list-transaction.php?data=transaction-2">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">Data Tukar Jadwal</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php echo $class4 ?>">
						<a href="list-user.php?data=user">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text">Notifikasi Biodata</span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php echo $class5 ?>">
						<a href="list-schedule.php?data=schedule">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Jadwal Karyawan
							</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo $class6 ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Data Karyawan
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="list-user.php?data=user&sp=timer">
									<i class="menu-icon fa fa-caret-right"></i>
									Timer
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="list-user.php?data=user&sp=pengawas">
									<i class="menu-icon fa fa-caret-right"></i>
									Pengawas Angkutan
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="list-user.php?data=user&sp=pramujasa">
									<i class="menu-icon fa fa-caret-right"></i>
									Pramujasa
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="list-user.php?data=user&sp=kasir">
									<i class="menu-icon fa fa-caret-right"></i>
									Admin Kasir
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="<?php echo $class7 ?>">
						<a href="list-user.php?data=user&sp=admin">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Data Admin Kantor </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo $class8 ?>">
						<a href="list-user.php?data=user&sp=korlay">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Data Korlay </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->
				<?php 
				}if($_SESSION['status_pengguna'] == 'korlay'){
				 ?>
				 <ul class="nav nav-list">
					<li class="<?php echo $class1 ?>">
						<a href="dashboard.php?data=home">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php echo $class4 ?>">
						<a href="list-schedule.php?data=schedule">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Jadwal Karyawan
							</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo $class5 ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Data Karyawan
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="list-user.php?data=user&sp=timer">
									<i class="menu-icon fa fa-caret-right"></i>
									Timer
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="list-user.php?data=user&sp=pengawas">
									<i class="menu-icon fa fa-caret-right"></i>
									Pengawas Angkutan
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="list-user.php?data=user&sp=pramusaja">
									<i class="menu-icon fa fa-caret-right"></i>
									Pramusaja
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="list-user.php?data=user&sp=kasir">
									<i class="menu-icon fa fa-caret-right"></i>
									Pramusaja
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->
				<?php
				} 
				?>