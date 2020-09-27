<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "connection/config.php";
?>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Data Pengguna</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

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
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Data</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container"></div><!-- /.ace-settings-container -->
						
						<?php include "component/page-header.php"?>

						<div class="row">
							<div class="col-xs-12">
								<?php
								if(isset($_GET['status'])){
									$status = $_GET['status'];
									if($status == 'succes'){
										$alret = 'success';
										$color = 'green';
										$title = 'Sukses Menghapus ';
										$icon  = 'fa fa-check';
									}else{
										$alret = 'danger';
										$color = 'red';
										$title = 'Gagal Menghapus';
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
									<?php
									if(isset($_GET['sp'])){
										$status_data = $_GET['sp'];
										if($status_data == 'timer'){
											$title_alret = "Timer";
											$value_jabatan = "timer";
										}elseif ($status_data == 'pengawas') {
											$title_alret = "Pengawas Angkutan";
											$value_jabatan = "pengawas";
										}elseif($status_data == 'pramujasa'){
											$title_alret = "Pramujasa";
											$value_jabatan = "pramujasa";
										}elseif($status_data == 'kasir'){
											$title_alret = "Admin Kasir";
											$value_jabatan = "kasir";
										}elseif ($status_data == 'admin') {
											$title_alret = "Admin";
											$value_jabatan = "admin";
										}else{
											$title_alret = "Korlay";
											$value_jabatan = "korlay";
										}
									}else{
										if(isset($_GET['notifikasi'])){
											$notifikasi = $_GET['notifikasi'];
											if($notifikasi == 'succes'){
												$title_alret = "Notifikasi Berhasil Diproses";
											}else{
												$title_alret = "Notifikasi Gagal Diproses";
											}
										}else{
											$title_alret = "Notifikasi";
											$value_jabatan = "";
										}
									}
									?>
										Data <?php echo $title_alret; ?>
									</strong>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<?php
										if(isset($_GET['sp'])){
											if($_GET['sp']=='timer'){
												$title_tambah = "Timer";
											}elseif ($_GET['sp']=='pengawas') {
												$title_tambah = "Data Pegawas Angkutan";
											}elseif($_GET['sp']=='pramujasa'){
												$title_tambah = "Data Pramujasa";
											}elseif($_GET['sp']=='kasir'){
												$title_tambah = "Data Admin Kasir";
											}elseif($_GET['sp']=='admin') {
												$title_tambah = "Data Admin Kantor";
											}else{
												$title_tambah = "Data Korlay";
											}
										}else{
											$title_tambah = "";
										}
										?>
										<?php
										if(isset($_GET['sp']) !=""){
											if($_SESSION['status_pengguna'] == 'admin'){
											?>
											<a href="form-user.php?data=user&action=add&sp=<?php echo $_GET['sp'] ?>">
												<button class="btn btn-success">Tambah <?php echo $title_tambah; ?></button>
											</a>
											<br>
											<br>
											<?php
											}
										}
										?>
										<form action="proses/user.php?action=search" method="post">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="ace-icon fa fa-check"></i>
											</span>
											<input type="text" name="kode_pengguna" class="form-control search-query" placeholder="Kode Pengguna" />
											<span class="input-group-btn">
												<button type="submit" class="btn btn-purple btn-sm">
													<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>Cari
												</button>
											</span>
										</div>
										</form>
										<br>
										<table id="simple-table" class="table  table-bordered table-hover" style="display: block;overflow-x: auto">
											<thead>
												<tr>
													<th class="center">
														No
													</th>
													<th class="center">
														Detail
													</th>
													<th class="center">
														Foto
													</th>

													<th class="center">
														Kode
													</th>
													
													<th class="center">
														Nama
													</th>
													<?php
													if($_SESSION['status_pengguna'] == 'admin'){
													?>
													<th class="center">
														Jadwal
													</th>
													<th class="center">
														Aksi
													</th>
													<?php
													}else{
													?>
													<th class="center">
														Jadwal
													</th>
													<?php
													}
													?>
												</tr>
											</thead>
											<tbody>
												<?php
                                            function tgl_indo($tanggal)
                                            {
                                            $bulan = array(
                                                1 => 'Januari',
                                                'Februari',
                                                'Maret',
                                                'April',
                                                'Mei',
                                                'Juni',
                                                'Juli',
                                                'Agustus',
                                                'September',
                                                'Oktober',
                                                'November',
                                                'Desember'
                                            );
                                            $pecahkan = explode('-', $tanggal);

                                            // variabel pecahkan 0 = tanggal
                                            // variabel pecahkan 1 = bulan
                                            // variabel pecahkan 2 = tahun

                                                return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
                                            }
                                            ?>
                                            <?php
                                            $no = 1;
                                            if(isset($_GET['kode_pengguna'])){
                                            	$kode_pengguna = $_GET['kode_pengguna'];
                                            	$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE kode_pengguna like '%".$kode_pengguna."%'");
                                        	}elseif(isset($_GET['sp'])){
                                        		$jabatan_pengguna = $_GET['sp'];
                                        		if($jabatan_pengguna == 'timer'){
                             						$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE jabatan_pengguna ='timer' AND status_jadwal_pengguna='approve'");
                                        		}elseif($jabatan_pengguna == 'pengawas') {
                                        			$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE jabatan_pengguna ='pengawas' AND status_jadwal_pengguna='approve'");
                                        		}elseif($jabatan_pengguna == 'pramusaja'){
                                        			$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE jabatan_pengguna ='pramujasa' AND status_jadwal_pengguna='approve'");
                                        		}elseif ($jabatan_pengguna == 'kasir') {
                                        			$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE jabatan_pengguna ='kasir' AND status_jadwal_pengguna='approve'");
                                        		}elseif ($jabatan_pengguna == 'admin') {
                                        			$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE jabatan_pengguna ='admin' AND status_jadwal_pengguna='approve'");
                                        		}else{
                                        			$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE jabatan_pengguna ='korlay' AND status_jadwal_pengguna='approve'");
                                        		}
                                        	}else{
                                        		$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE NOT status_jadwal_pengguna='approve'");
                                        	}
                                            $cek = mysqli_num_rows($query);
                                             if ($cek > 0) {
                                                while ($data = mysqli_fetch_array($query)) {
                                            ?>
												<tr>
													<td class="center">
														<?php echo $no++; ?>
													</td>

													<td class="center">
														<div class="action-buttons">
															<?php
																if(isset($_GET['sp']) !=""){
																?>
															<a href="detail-user.php?data=user&sp=<?php echo $_GET['sp'] ?>&id=<?php echo $data['id_pengguna'] ?>" class="green bigger-140 show-details-btn" title="Show Details">
																<i class="ace-icon fa fa-angle-double-down"></i>
																<span class="sr-only">Details</span>
															</a>
															<?php
																}else{
															?>
															<a href="detail-user.php?data=user&id=<?php echo $data['id_pengguna'] ?>" class="green bigger-140 show-details-btn" title="Show Details">
																<i class="ace-icon fa fa-angle-double-down"></i>
																<span class="sr-only">Details</span>
															</a>
															<?php
																}
															?>
														</div>
													</td>

													<td>
														<?php
															if($data['foto_pengguna']==''){
																$src_foto = "assets/images/avatars/profile-pic.jpg";
															}else{
																$src_foto = "upload/".$data['foto_pengguna']."";
															}
															?>
														<div class="user">
															<img alt="Jim Doe's avatar"  src="<?php echo $src_foto ?>" style="width: 50px;height: 50px"/>
														</div>
													</td>

													<td>
														<?php echo $data['kode_pengguna'];?>
													</td>

													<td>
														<?php echo $data['nama_lengkap_pengguna']; ?>
													</td>

													<?php
													if($data['status_jadwal_pengguna'] =='approve'){
														$status_jadwal_1 = "Aktif";
													}elseif ($data['status_jadwal_pengguna'] =='procces') {
														$status_jadwal_1 = "Proses";
													}else{
														$status_jadwal_1 = "Tolak";
													}						
													?>
													<?php
													if($_SESSION['status_pengguna'] == 'admin'){
													?>
													<td><?php echo $status_jadwal_1?></td>
													<td>
														<div class="hidden-md hidden-lg">
															<div class="inline pos-rel">
																<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																	<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
																</button>
																<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
																<?php
																if(isset($_GET['sp']) !=""){
																?>
																	<li>
																		<a href="form-user.php?data=user&action=edit&sp=<?php echo $_GET['sp'] ?>&id=<?php echo $data['id_pengguna'] ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																	<li>
																		<a href="proses/user.php?data=user&action=delete&sp=<?php echo $_GET['sp'] ?>&id=<?php echo $data['id_pengguna'] ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
																			<span class="red">
																				<i class="ace-icon fa fa-trash-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																<?php
																}else{
																?>
																	<li>
																		<a href="proses/user.php?data=user&action=approve&id=<?php echo $data['id_pengguna'] ?>" class="tooltip-success" data-rel="tooltip" title="Setujui">
																			<span class="green">
																				<i class="ace-icon fa fa-check-square-o bigger-120"></i>
																			</span>
																		</a>
																	</li>
																	<li>
																		<a href="proses/user.php?data=user&action=noapprove&id=<?php echo $data['id_pengguna'] ?>" class="tooltip-error" data-rel="tooltip" title="Tolak">
																			<span class="red">
																				<i class="ace-icon fa fa-adjust bigger-120"></i>
																			</span>
																		</a>
																	</li>
																<?php
																}
																?>
																</ul>
															</div>
														</div>
													</td>
													<?php
													}else{
													?>
													<?php
													if($data['status_jadwal_pengguna'] =='approve'){
														$status_jadwal = "Disetujui";
													}elseif ($data['status_jadwal_pengguna'] =='procces') {
														$status_jadwal = "Proses";
													}else{
														$status_jadwal = "Ditolak";
													}						
													?>
													<td class="center"><?php echo $status_jadwal?></td>
													<?php
													}
													?>
												</tr>
												<?php
													}
												}else{
												?>
												<tr>
													<?php
													if(isset($_GET['sp'])){
														if($_GET['sp']=='timer'){
															$data_kosong = "Karyawan";
														}elseif ($_GET['sp']=='pengawas') {
															$data_kosong = "Karyawan";
														}elseif($_GET['sp']=='pramujasa'){
															$data_kosong = "Karyawan";
														}elseif($_GET['sp']=='kasir') {
															$data_kosong = "Karyawan";
														}else{
															$data_kosong = "Pengelola";
														}
													}else{
														$data_kosong = "Notifikasi Biodata";
													}
													?>
                                                    <td colspan="8" class="text-center">Data <?php echo $data_kosong; ?> <?php echo $title_tambah; ?> Kosong</td>
                                                </tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div><!-- /.span -->
								</div><!-- /.row -->
								<div class="hr hr-18 dotted hr-double"></div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->

						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php include "component/footer.php" ?>

			</div>

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
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>
	</body>
</html>