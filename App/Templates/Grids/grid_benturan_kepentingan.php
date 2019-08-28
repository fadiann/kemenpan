<div class="table-responsive mt-md">
	<table class="table table-bordered table-striped table-condensed mb-none">
	<tr>
		<?
		$jmlHeader = count ( $gridHeader );
		echo ("<th width='5%' class='text-center'>No</th>");
		for($j = 0; $j < $jmlHeader; $j ++) {
			echo ("<th class='text-center' width='" . $gridWidth [$j] . "%'>" . $gridHeader [$j] . "</th>");
		}
		if ($widthAksi != "0") {
			echo ("<th class='text-center' width='" . $widthAksi . "%'>Aksi</th>");
		}
		?>
	</tr>
    <?php
    if ($recordcount != 0) {
        $i = 0;
        while ($arr = $rs->FetchRow()) :
            //var_dump($arr);
            $i++;
    ?>
            <tr>
                <td class="text-center"><?= $i + $offset ?>.</td>

                <?php for ($j = 0; $j < count($gridDetail); $j++) : ?>

                    <?php if ($gridHeader[$j] == "Tahun") : ?>

                        <td align="center"><?= $arr[$gridDetail[$j]] ?></td>

                    <?php else : ?>

                        <td><?= $arr[$gridDetail[$j]] ?></td>

                    <?php endif ?>

                <?php endfor; ?>
                <td class="text-center">
                    <?php if ($iconDetail) : ?>
                        <button class="btn btn-info btn-circle btn-sm" title="Rincian Data" Onclick="return set_action('getdetail', '<?=$arr[0]?>')"><i class="fa fa-info-circle"></i></button>
                    <?php endif ?>
					<?php if ($iconEdit) : ?>
						<button class="btn btn-warning btn-circle btn-sm" title="Ubah Data" Onclick="return set_action('getedit', '<?= $arr['benturan_kepentingan_id'] ?>')"><i class="fa fa-pencil"></i></button>
                    <?php endif ?>
                    <?php if ($iconDel) : ?>
						<button class="btn btn-danger btn-circle btn-sm" title="Hapus Data" Onclick="return set_action('getdelete', '<?= $arr['benturan_kepentingan_id'] ?>', '<?= $arr['uraian'] ?>')"><i class="fa fa-trash-o"></i></button>
                    <?php endif ?>
                </td>
            </tr>
        <?php endwhile; ?>
<?php } else { ?>
        <td colspan="<?= $jmlHeader + 2 ?>">Tidak Ada Data</td>
<?php } ?>
</table>

<table width="100%">
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="center" class="td_paging">
	<?
	$showPage = "";
	$jumPage = ceil ( $recordcount / $num_row );
	if ($noPage > 1)
		echo "<a href='" . $paging_request . "&page=" . ($noPage - 1) . "' class='btn btn-sm btn-circle btn-primary'> <<d </a>";
	for($page = 1; $page <= $jumPage; $page ++) {
		if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
			if (($showPage == 1) && ($page != 2))
				echo "<span class='titik_titik'>...</span>";
			if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
				echo "<span class='titik_titik'>...</span>";
			if ($page == $noPage)
				echo "<span class='btn btn-sm btn-circle btn-default'>" . $page . "</span> ";
			else
				echo " <a href='" . $paging_request . "&page=" . $page . "' class='btn btn-sm btn-circle btn-primary'>" . $page . "</a> ";
			$showPage = $page;
		}
	}
	if ($noPage < $jumPage)
		echo "<a href='" . $paging_request . "&page=" . ($noPage + 1) . "' class='btn btn-sm btn-circle btn-primary'> > </a>";
	?>
	</td>
	</tr>
	</table>
</div>
