<?php
$position = 1;
include_once "App/Libraries/login_history.php";
include_once "App/Libraries/Helper.php";
$Helper			= new Helper();
if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'logout') {
		include_once "App/Classes/Login.php";
		$logins = new Login();
		$logins->log_out($_SESSION['ses_userId']);
		session_destroy();
		header("location: index.php");
	}
}
$notif_show 	= "";
$rs_cek_count 	= $Helper->list_notif($ses_userId);
$rs_notif 		= $Helper->list_notif($ses_userId);
$count_notif 	= $rs_notif->RecordCount();
if($count_notif <> 0){
	$notif_show = ", Anda Memiliki ".$count_notif. " Notifikasi, silahkan direviu";
}
?>
 
<!doctype html>
<html class="fixed">
	<head>
	<!-- Basic -->
	<meta charset="UTF-8">

	<title>e-MAS | Elektronik Manajemen Audit Sistem</title>
	<link rel="stylesheet" href="Public/css/loader.css">
	<link rel="shortcut icon" href="Public/images/emas-logo.png" type="image/x-icon">
	<meta name="author" content="Fadian Adhitya Nugraha">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="Public/assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="Public/assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="Public/assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="Public/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="Public/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
	<link rel="stylesheet" href="Public/assets/vendor/select2/select2.css" />
	<link rel="stylesheet" href="Public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="Public/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
	<link rel="stylesheet" href="Public/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
	<link rel="stylesheet" href="Public/assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
	<link rel="stylesheet" href="Public/assets/vendor/dropzone/css/basic.css" />
	<link rel="stylesheet" href="Public/assets/vendor/dropzone/css/dropzone.css" />
	<link rel="stylesheet" href="Public/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
	<link rel="stylesheet" href="Public/assets/vendor/summernote/summernote.css" />
	<link rel="stylesheet" href="Public/assets/vendor/summernote/summernote-bs3.css" />
	<link rel="stylesheet" href="Public/assets/vendor/codemirror/lib/codemirror.css" />
	<link rel="stylesheet" href="Public/assets/vendor/codemirror/theme/monokai.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="Public/assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="Public/assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="Public/assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	<script src="Public/js/actions.js" type="text/javascript"></script>
	<script src="Public/assets/vendor/modernizr/modernizr.js"></script>
	<script src="Public/js/pace.min.js" type="text/javascript"></script>
	<?php
		$position = 1;
		include_once("App/Libraries/login_history.php");
		$jml_notif = 0;
		$rs_cek_count = $Helper->list_notif($ses_userId);
		$jml_notif = $rs_cek_count->RecordCount();
	?>
	<script>
		function no_framing() {
			if (self != top) {
				window.open(self.document.location, "_top", "");
			}
		}

		function logout() {
			var x = window.confirm("Anda Yakin Akan Keluar System");
			if (x) {
				location.href = "App/Config/Logout.php";
			}
		}
	</script>
	<script>
		Pace.on("done", function() {
			$(".preloader").fadeOut(200);
		});
	</script>

	</head>
	<body>
		<!-- start: loader -->
		<div class="preloader"></div>
		<div class="loading" style="display:none" >Loading&#8230;</div>
		<!-- end: loader -->
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="Public/images/emas-logo.png" height="35" alt="Porto Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<!-- start: search & user box -->
				<div class="header-right">


					<!-- MODAL NOTIFIKASI -->
					<ul class="notifications">
						<li>
							<a class="notification-icon modal-basic " data-toggle="modal" data-target="#notifikasi" style="cursor: pointer;">
								<i class="fa fa-bell"></i>
								<span class="badge"><?=$count_notif?></span>
							</a>
						</li>
					</ul>

					<div class="modal fade" id="notifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content" >
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Notifikasi</h4>
							</div>
							<div class="modal-body" style="overflow-y: scroll; max-height:300px !important;">
							<?php
							if($count_notif <> 0){
							?>
							<table class="table table-bordered table-striped table-condensed mb-none" >
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Catatan Dari</th>
									<th class="text-center">Catatan</th>
									<th class="text-center">Aksi</th>
								</tr>
								<?php
								$no_notif = 0;
								while($arr_notif = $rs_notif->FetchRow()){
									$no_notif++;
								?>
								<tr>
									<td class="text-center"><?=$no_notif?>.</td>
									<td><?=$arr_notif['from_auditor']?></td>
									<td><?=$arr_notif['notif_desc']?></td>
									<td class="text-center">
										<a href="main.php?method=<?=$arr_notif['notif_method']?>" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Lihat</a>
									</td>
								</tr>
								<?php
								}
								?>
							</table>
							<?php } ?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
							</div>
						</div>
					</div>
					<!-- END MODAL NOTIFIKASI -->

					<span class="separator"></span>

					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="Public/Upload/Upload_Foto/no-picture.png" alt="Joseph Doe" class="img-circle" data-lock-picture="Public/Upload/Upload_Foto/no-picture.png" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name"><?= ucwords($ses_userName)?></span>
								<span class="role"><?=ucwords(strtolower($h_groupName))?></span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="main.php?method=change_pass&data_action=getedit"><i class="fa fa-user"></i> Ubah Password</a>
								</li>
								<!-- <li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</!-->
								<li>
									<a role="menuitem" tabindex="-1" href="?action=logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
					<!-- start: menu -->
					<?php include "App/Templates/Pages/Menu.php"; ?>
					<!-- end: menu -->
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<!-- start: breadcumb -->
					<?php include "App/Templates/Pages/Breadcumb.php"; ?>
					<!-- end: breadcumb -->

					<!-- start: page -->
					<?php include "App/Templates/Pages/Main.php"; ?>
					<!-- end: page -->
				</section>
			</div>
		</section>

		<!-- Vendor -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="Public/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="Public/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="Public/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="Public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="Public/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="Public/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="Public/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="Public/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
		<script src="Public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="Public/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="Public/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="Public/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="Public/assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="Public/assets/vendor/fuelux/js/spinner.js"></script>
		<script src="Public/assets/vendor/dropzone/dropzone.js"></script>
		<script src="Public/assets/vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="Public/assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="Public/assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
		<script src="Public/assets/vendor/codemirror/lib/codemirror.js"></script>
		<script src="Public/assets/vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="Public/assets/vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="Public/assets/vendor/codemirror/mode/javascript/javascript.js"></script>
		<script src="Public/assets/vendor/codemirror/mode/xml/xml.js"></script>
		<script src="Public/assets/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="Public/assets/vendor/codemirror/mode/css/css.js"></script>
		<script src="Public/assets/vendor/summernote/summernote.js"></script>
		<script src="Public/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="Public/assets/vendor/ios7-switch/ios7-switch.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="Public/assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="Public/assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="Public/assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="Public/assets/javascripts/forms/examples.advanced.form.js" /></script>
		<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="Public/js/select2/select2.min.js"></script>
		<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="Public/js/responsive-tabs.js"></script>
	</body>
</html>
