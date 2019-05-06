<?php
$notif_show="";
$rs_notif = $Helper->list_notif($ses_userId);
$count_notif = $rs_notif->RecordCount();
if($count_notif<>0) $notif_show = ", Anda Memiliki ".$count_notif. " Notifikasi, silahkan direviu";
include_once "App/Classes/param_class.php";
$params = new param()
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?="Hi ".$ses_userName.", Selamat datang di Aplikasi E-MAS (Elektronik Manajemen Audit Sistem)".$notif_show?></h3>
			<ul class="tabs">
				<li><a href="main.php?method=change_pass&data_action=getedit">Ubah Password</a></li>
			</ul>
		</header>
        <?php
		if($count_notif<>0){
		?>
		<table class="table_grid" cellspacing="0" cellpadding="0">
			<tr>
				<th>No</th>
				<th>Catatan Dari</th>
				<th>Catatan</th>
				<th>Aksi</th>
			</tr>
			<?php
			$no_notif = 0;
			while($arr_notif = $rs_notif->FetchRow()){
				$no_notif++;
			?>
			<tr>
				<td><?=$no_notif?></td>
				<td><?=$arr_notif['from_auditor']?></td>
				<td><?=$arr_notif['notif_desc']?></td>
				<td>Reviu</td>
			</tr>
			<?
			}
			?>
		</table>
		<?
		}
		?>
	</article>
</section>
<script>
$("#slideshow > div:gt(0)").hide();
	setInterval(function() {
	  $('#slideshow > div:first')
		.fadeOut(1000)
		.next()
		.fadeIn(1000)
		.end()
		.appendTo('#slideshow');
	}, 3000);
</script>
