<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Konfigurasi Email</h3>
		</header>
		<?php 
		include_once "App/Classes/param_class.php";

		$params = new param ( $ses_userId );

		$mail_config = $params->mail_data_list();

		// print_r($mail_config);
		?>
		<form method="post" action="main.php?method=save_mail" class="form-horizontal" id="validation-form">
			<fieldset class="hr">
				<label class="span2">Username</label> <input type="text"
					class="span2" name="username" id="name" value="<?= $mail_config->username ?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Password</label> <input type="text" class="span2"
					name="password" id="link" value="<?= $mail_config->password ?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">SMTP</label> <input type="text" class="span2"
					name="smtp" id="method" value="<?= $mail_config->smtp ?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Security</label> <input type="text" class="span2"
					name="secure" id="method" value="<?= $mail_config->secure ?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Port</label> <input type="text"
					class="span0" name="port" id="file" value="<?= $mail_config->port ?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Batas Waktu (Jml Hari)</label> <input type="text" class="span0" name="batas_waktu" value="<?= $mail_config->batas_waktu ?>" id="batas_waktu">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">CC</label> <input type="text" class="span2"
					name="cc" id="method" value="<?= $mail_config->cc ?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">BCC</label> <input type="text" class="span2"
					name="bcc" id="method" value="<?= $mail_config->bcc ?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Status</label> <select name="status">
					<option value="">Pilih Satu</option>
					<option value="active" <?= $mail_config->status == "active" ? "selected" : "" ?>>Active</option>
					<option value="disactive" <?= $mail_config->status == "disactive" ? "selected" : "" ?>>Disactive</option>
				</select>
			</fieldset>
			<fieldset>
				<center>
					<input
						type="submit" class="blue_btn" value="Simpan">
				</center>
			</fieldset>
		</form>
	</article>
</section>
<script type="text/javascript">
// 	$("#batas_waktu").datepicker({
// 		dateFormat: 'dd-mm-yy',
// 		 nextText: "",
// 		 prevText: "",
// 		 changeYear: true,
// 		 changeMonth: true,
// 	});
</script>