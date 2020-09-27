<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "connection/config.php";
?>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Data Jadwal</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/fullcalendar.min.css" />

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
					<?php
					if($_SESSION['status_pengguna'] == 'admin' || $_SESSION['status_pengguna'] == 'korlay' ){
					?>
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Data</li>
						</ul><!-- /.breadcrumb -->
					</div>
					<?php
					}
					?>
					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container"></div><!-- /.ace-settings-container -->
						
						<?php include "component/page-header.php"?>

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
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
										Data Jadwal
									</strong>
								</div>
								<div class="row">
									<div class="col-sm-9">
										<?php
										if($_SESSION['status_pengguna'] == 'admin'){
										?>
										<a href="form-schedule.php?data=schedule&action=add">
											<button class="btn btn-success">Tambah Data Jadwal</button>
										</a>
										<br>
										<br>
										<form action="proses/schedule.php?action=search" method="post">
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
										<?php
										}elseif($_SESSION['status_pengguna'] == 'korlay'){
										?>
										<form action="proses/schedule.php?action=search" method="post">
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
										<?php
										}
										?>
										<?php
										if (isset($_GET['kode_pengguna'])) {
										?>
										<div class="space"></div>
											<div class="widget-box widget-color-dark light-border" id="widget-box-">
												<div class="widget-header">
													<?php
													if($_SESSION['status_pengguna'] == 'admin' || $_SESSION['status_pengguna'] == 'korlay' ){
													?>
													<h5 class="widget-title smaller">Cari Berdasarkan Identitas</h5>
													<?php
													}else{
													?>
													<h5 class="widget-title smaller">Jadwal Tetap Anda</h5>
													<?php
													}
													?>
												</div>
												<?php
												$kode_pengguna = $_GET['kode_pengguna'];
												if($kode_pengguna == ''){
                                            		$nama_lengkap_pengguna = "";
                                            		$kode_pengguna = "";
                                            		$jabatan = "";
												}else{
                                            		$query_cari = mysqli_query($conn, "SELECT * FROM pengguna WHERE kode_pengguna=".$kode_pengguna."");
                                            		$data_cari = mysqli_fetch_array($query_cari);
                                            		$nama_lengkap_pengguna = $data_cari['nama_lengkap_pengguna'];
                                            		$kode_pengguna = $data_cari['kode_pengguna'];
                                            		$jabatan = $data_cari['jabatan_pengguna'];
												}
												?>
												<div class="widget-body">
													<div class="widget-main padding-6">
														<div class="alert alert-info"> 
														<p>Nama : <?php echo $nama_lengkap_pengguna; ?></p>
														<p>Kode : <?php echo $kode_pengguna?><p>
														<?php
															if($jabatan=='timer'){
																$nama_jabatan = "Karyawan Timer";
															}elseif ($jabatan=='pengawas') {
																$nama_jabatan = "Karyawan Pegawas Angkutan";
															}elseif($jabatan == 'pramujasa'){
																$nama_jabatan = "Karyawan Pramujasa";
															}elseif($jabatan == 'kasir'){
																$nama_jabatan = "Admin Kasir";
															}else{
																$nama_jabatan = "";
															}
														?>
														<p>Jabatan : <?php echo $nama_jabatan; ?></p> 
														</div>
													</div>
												</div>
											</div>
										<?php
										}
										?>
										<div class="space"></div>
										<div id="calendar"></div>
									</div>
								</div>

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
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/fullcalendar.min.js"></script>
		<script src="assets/js/bootbox.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {

/* initialize the external events
	-----------------------------------------------------------------*/

	$('#external-events div.external-event').each(function() {

		// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};

		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);

		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});
	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();


	var calendar = $('#calendar').fullCalendar({
		//isRTL: true,
		//firstDay: 1,// >> change first day of week 
		
		buttonHtml: {
			prev: '<i class="ace-icon fa fa-chevron-left"></i>',
			next: '<i class="ace-icon fa fa-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			// right: 'month,agendaWeek,agendaDay'
			right: 'month'
		},
		<?php
		if(isset($_GET['kode_pengguna'])){
			$kode_pengguna = $_GET['kode_pengguna'];
			$cari = "?kode_pengguna=".$kode_pengguna."";
		}else{
			$cari = "";
		}
		?>
		events: 'proses/calendar/read.php<?php echo $cari?>' 
		
		// [
		//   {
		// 	title: 'All Day Event',
		// 	date: new Date(y, m, 1),
		// 	className: 'label-important'
		//   },
		//   {
		// 	title: 'Some Event',
		// 	date: new Date(y, m, d-3, 16, 0),
		// 	className: 'label-success'
		//   }
		// ]
		,
		
		/**eventResize: function(event, delta, revertFunc) {

			alert(event.title + " end is now " + event.end.format());

			if (!confirm("is this okay?")) {
				revertFunc();
			}

		},*/
		
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			var $extraEventClass = $(this).attr('data-class');
			
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = false;
			if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
			
		}
		,
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			
			// bootbox.prompt("New Event Title:", function(title) {
			// 	if (title !== null) {
			// 		calendar.fullCalendar('renderEvent',
			// 			{
			// 				title: title,
			// 				start: start,
			// 				end: end,
			// 				allDay: allDay,
			// 				className: 'label-info'
			// 			},
			// 			true // make the event "stick"
			// 		);
			// 	}
			// });
			

			calendar.fullCalendar('unselect');
		}
		,
		eventClick: function(calEvent, jsEvent, view) {

			//display a modal
			var modal = 
			'<div class="modal fade">\
			  <div class="modal-dialog">\
			   <div class="modal-content">\
				 <div class="modal-body">\
				   <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
				   						<table id="simple-table" class="table  table-bordered table-hover">\
											<thead>\
											</thead>\
												<tr>\
													<th class="center">Detail Data Jadwal</th>\
												</tr>\
											   <tbody>\
												<tr class="detail-row open">\
													<td colspan="8">\
														<div class="table-detail">\
															<div class="row">\
																<div class="col-xs-12 col-sm-2">\
																	<div class="text-center">\
																		<img height="150" class="thumbnail inline no-margin-bottom" alt="" src="upload/' + calEvent.photos + '">\
																		<br />\
																		<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">\
																			<div class="inline position-relative">\
																				<a class="user-title-label" href="#">\
																					<span class="white">' + calEvent.name + '</span>\
																				</a>\
																			</div>\
																		</div>\
																	</div>\
																</div>\
																<div class="col-xs-12 col-sm-7">\
																	<div class="space visible-xs"></div>\
																	<div class="profile-user-info profile-user-info-striped">\
																		<div class="profile-info-row">\
																			<div class="profile-info-name"> Kode Pengguna </div>\
																			<div class="profile-info-value">\
																				' + calEvent.code + '</div>\
																		</div>\
																		<div class="profile-info-row">\
																			<div class="profile-info-name"> Tanggal Jadwal </div>\
																			<div class="profile-info-value">\
																				<i class="fa fa-calendar light-orange bigger-110"></i>\
																				<span>' + calEvent.date + '</span>\
																			</div>\
																		</div>\
																		<div class="profile-info-row">\
																			<div class="profile-info-name"> Status Jadwal </div>\
\
																			<div class="profile-info-value">\
																				<span>' + calEvent.title + '</span>\
																			</div>\
																		</div>\
																		<div class="profile-info-row">\
																			<div class="profile-info-name"> Keterangan Waktu </div>\
\
																			<div class="profile-info-value">\
																				<span>' +  calEvent.time +'</span>\
																			</div>\
																		</div>\
																		<div class="profile-info-row">\
																			<div class="profile-info-name"> Jabatan </div>\
																			<div class="profile-info-value">\
																				<i class="fa fa-user light-orange bigger-110"></i>\
																				<span>' + calEvent.position + '</span>\
																			</div>\
																		</div>\
																		<div class="profile-info-row">\
																			<div class="profile-info-name"> Keterangan Lain </div>\
																			<div class="profile-info-value">\
																				<span>' + calEvent.etc + '</span>\
																			</div>\
																		</div>\
																	</div>\
																	<div class="col-xs-12 col-sm-3">\
																	<div class="space visible-xs"></div>\
																	<?php
																	if($_SESSION['status_pengguna'] == 'admin'){
																	?>\
																	<div class="space-6"></div>\
																		<div class="hr hr-dotted"></div>\
																		<a href="form-schedule.php?data=schedule&action=edit&id=' + calEvent.id + '"><button class="btn btn-warning">Edit</button></a>\
																		&nbsp; &nbsp; &nbsp;\
																		<a href="proses/schedule.php?data=schedule&action=delete&id=' + calEvent.id + '"><button class="btn btn-danger">Hapus</button></a>\
																	</div>\
																	<?php
																	}
																	?>\
																</div>\
															</div>\
														</div>\
													</td>\
												</tr>\
											</tbody>\
										</table>\
			  </div>\
			 </div>\
			</div>';
		
		
			var modal = $(modal).appendTo('body');
			// modal.find('form').on('submit', function(ev){
			// 	ev.preventDefault();

			// 	calEvent.title = $(this).find("input[type=text]").val();
			// 	calendar.fullCalendar('updateEvent', calEvent);
			// 	modal.modal("hide");
			// });
			modal.find('button[data-action=delete]').on('click', function() {
				calendar.fullCalendar('removeEvents' , function(ev){
					return (ev._id == calEvent._id);
				})
				modal.modal("hide");
			});
			
			modal.modal('show').on('hidden', function(){
				modal.remove();
			});


			//console.log(calEvent.id);
			//console.log(jsEvent);
			//console.log(view);

			// change the border color just for fun
			//$(this).css('border-color', 'red');

		}
		
	});


})
		</script>
	</body>
</html>