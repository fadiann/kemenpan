<?php
session_start();
$position = 1;

include_once "App/Classes/Login.php";
include_once "App/Libraries/Helper.php";

$Helper = new Helper ();
$logins = new Login ();
$logins->deleteLoginsytem();

if(isset($_GET['user'])){
	$get_user = $Helper->replacetext($_GET['user']);
}else{
	$get_user = '';
}
$index = "index.php";
if (@$_POST ['submit'] == "Login") {

	$username = $Helper->replacetext ( $_POST ['username'] );
	$passwd = $Helper->replacetext ( $_POST ['password'] );
	if ($username != "" && $passwd != "") {
		$rsCek = 0;
		$userStatusAktif = 0;
		$cekLogin = 0;

		$rsCek = $logins->cek_username ( $username, $passwd );
		if (! $rsCek == "0") {
			$rs_user = $logins->data_user ( $username );
			$arr_user = $rs_user->FetchRow ();
			$userStatusAktif = $arr_user ['user_status'];
			if ($userStatusAktif == "1") {
				$cekLogin = $logins->cekLogin ( $arr_user ['user_id'] );
				if ($cekLogin == 1) {
					$date = $Helper->date_db ( date ( "Y-m-d H:i:s" ) );
					$logins->insertStatus ( $arr_user ['user_id'], $date );

					$_SESSION ['ses_userId'] = $arr_user ['user_id'];
					$_SESSION ['ses_userName'] = $arr_user ['user_username'];
					$_SESSION ['ses_groupId'] = $arr_user ['user_id_group'];
					$_SESSION ['ses_id_int'] = $arr_user ['user_id_internal'];
					$_SESSION ['ses_id_eks'] = $arr_user ['user_id_ekternal'];
					echo "<script>location.href='main.php';</script>";
				} else {
					$pending = $logins->cekPending ( $arr_user ['user_id'] );
					echo "<script>alert('$pending'); location.href='" . $index . "';</script>";
				}
			} else {
				echo "<script>alert('Username Anda Telah Dihapus/Inactive, Silahkan Hubungi Administrator'); location.href='" . $index . "';</script>";
			}
		} else {
			$alert = "Verifikasi Username dan Password dengan benar dan coba kembali !!!";
			echo "<script>alert('$alert'); location.href='" . $index . "?user=".$username."';</script>";
		}
	} else {
		echo "<script>alert('Username / Password tidak boleh kosong !!!'); location.href='" . $index . "?user=".$username."';</script>";
	}
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
	<script src="Public/js/actions.js" type="text/javascript"></script>
	<script src="Public/assets/vendor/modernizr/modernizr.js"></script>
	<script src="Public/js/pace.min.js" type="text/javascript"></script>
	<script>
		Pace.on("done", function() {
			$(".preloader").fadeOut(200);
		});
	</script>
	</head>
	<body>
		<!-- start: loader -->
		<div class="preloader"></div>
		<!-- end: loader -->
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="Public/images/emas-logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form action="#" method="POST">
							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="username" type="text" class="form-control input-lg" value="<?=$get_user?>" required />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="#" class="pull-right">Lost Password?</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" required />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12 text-center">
									<input type="submit" name="submit" class="btn btn-primary hidden-xs" value="Login">
								</div>
							</div>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright Kementerian Pendayagunaan Aparatur Negara 2019.</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="Public/assets/vendor/jquery/jquery.js"></script>
		<script src="Public/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="Public/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="Public/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="Public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="Public/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="Public/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="Public/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="Public/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="Public/assets/vendor/select2/select2.js"></script>
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